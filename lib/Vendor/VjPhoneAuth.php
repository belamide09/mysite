<?php

class VjPhoneAuth {
	const PREFIX    = 'ph_au';
	const ENCRYPTOR = 'cftvgynjip';

	public  $clientip = '';
	private $model    = null;

	public function __construct(PhoneAuth $model) {
		$is_production  = env('SERVER_NAME') === 'nativecamp.net';
		$this->clientip = $is_production ? '80771' : '00309';
		$this->model    = $model;
	}

	/** 電話番号認証APIへのリクエストを実行し、認証用の電話番号を取得します。*/
	public function getPhoneAuthNumber($user_id, $telno) {
		$user   = $this->model->getUserInfoByUserId($user_id);
		$params = array(
			'clientip' => $this->clientip,
			'telno'    => $telno,
			'sendid'   => self::createSendidFromUserId($user_id),
			'username' => $user_id,
			'email'    => 'info@nativecamp.net'
		);
		$query_string = $this->getQueryStringByParamArray($params);
		$request_url  = 'https://total.telecomcredit.co.jp/certify/secure.cgi' . '?' . $query_string;
		$response     = $this->curlRequestAndGetResponse($request_url);
		$is_matched   = preg_match('/ctsv_phone_no=(\d+)$/', $response, $m);
		if ($is_matched) {
			$result = $m[1];
		} else {
			$result = false;
		}
		return $result;
	}

	/** telecomからの戻りパラメータを受取り、処理を実行します。*/
	public function receive($params) {
		if (self::isPhoneAuthSuccessData($params)) {
			$telno   = $params['telno'];
			$user_id = self::getUserIdFromSendId($params['sendid']);
			$user    = $this->model->getUserInfoByUserId($user_id);
			if ($user) {
				$this->receiveSuccessData($user['id'], $telno);
			} else {
				echo "\n" . 'invalid data.';
			}
		}
	}

	/** telecomからの認証済みデータを受取り、電話番号認証用の処理を実行します。*/
	private function receiveSuccessData($user_id, $telno) {
		$err_msg = $this->validatePhoneAuth($user_id, $telno);
		if ($err_msg) {
			echo "\n" . $err_msg;
		} else {
			$this->model->create();
			$this->model->set(array(
				'user_id'      => $user_id,
				'phone_number' => $telno
			));
			$this->model->save();
			echo "\n" . 'The process has been completed. : ' . env('SERVER_NAME');
		}
	}

	// --- /main logic method group ------------------------------------------


	// --- validate method group ---------------------------------------------

	/**
	 * 電話番号の入力を確認し、
	 * 不可の場合はメッセージ文字列を、可の場合は空文字を返します。<br />
	 * ※telecomの電話番号認証サービスで使用可能な電話番号は11桁までです。
	 */
	private function varidateTelno($telno) {
		$msg = '';
		if     ($telno === '')       { $msg = '電話番号を入力してください。'; }
		elseif (strlen($telno) > 11) { $msg = '電話番号が長すぎます。'; } // The telecom limits a phone number by 11 columns.
		elseif (strlen($telno) < 5)  { $msg = '電話番号が短かすぎます。'; }

		return $msg;
	}

	/**
	 * 電話番号認証が可能なユーザーかどうかを判定し、
	 * 不可の場合はメッセージ文字列を、可能な場合は空文字を返します。
	 */
	public function validatePhoneAuth($user_id, $telno) {
		$user = $this->model->getUserInfoByUserId($user_id);

		$msg = '';
		if     (!$user)                                    { $msg = 'ユーザー情報を取得できませんでした。'; }
		elseif ($this->model->isSMSAuthedUser($user_id))   { $msg = 'お客さまは既にSMS認証が完了しています。'; }
		elseif ($this->model->isPhoneAuthedUser($user_id)) { $msg = 'お客さまは既に電話認証が完了しています。'; }
		elseif ($this->model->isUsedPhoneNumber($telno))   { $msg = 'ご登録電話番号は過去に既に登録されており、認証することができませんでした。'; }
		elseif ($this->model->isUsedSMSNumber($telno))     { $msg = '入力された電話番号は既にSMS認証に登録されており、認証することができませんでした。'; }
		else                                               { $msg = $this->varidateTelno($telno); }

		return $msg;
	}

	// --- /validate method group ---------------------------------------------


	// --- utility method group ------------------------------------------------

	/** 連想配列からクエリ文字列を生成します。*/
	private function getQueryStringByParamArray($params) {
		$query = array();
		foreach ($params as $k => $v) {
			$query[] = $k . '=' . $v;
		}
		return join('&', $query);
	}

	/** リクエストを送信し、結果を返します。*/
	private function curlRequestAndGetResponse($request_url) {
		$ch = curl_init( $request_url );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HEADER, true );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );

		$result = curl_exec( $ch );
		curl_close( $ch );

		return $result;
	}

	// --- /utility method group ---------------------------------------------


	// --- static method group -----------------------------------------------

	/** 引数に渡されたデータが電話番号認証成功の通知のデータであるかどうかの真偽値を返します。 */
	public static function isPhoneAuthSuccessData($params) {
		if (empty($params['telno']) || empty($params['sendid'])) { return false; }
		$user_id = self::getUserIdFromSendId($params['sendid']);
		return ($user_id ? true : false);
	}

	/** user_idの値からsendidの値を生成します。*/
	private static function createSendidFromUserId($user_id) {
		return rawurlencode(self::PREFIX . '=' . self::encryptUserId($user_id));
	}

	/** sendidの値からuser_idの値を取得します。*/
	private static function getUserIdFromSendId($sendid) {
		$decoded    = rawurldecode($sendid);
		$is_matched = preg_match('/' . self::PREFIX . '=(.+)$/', $decoded, $m);
		return ($is_matched ? self::decryptUserId($m[1]) : false);
	}

	/** 数字をアルファベット文字列に変換します。*/
	private static function encryptUserId($source) {
		$divided = str_split((string)$source);
		$enc     = str_split(self::ENCRYPTOR);
		$buf     = array();
		foreach ($divided as $idx) {
			$buf[] = isset($enc[$idx]) ? $enc[$idx] : '';
		}
		return join('', $buf);
	}

	/** アルファベット文字列を数字に変換します。*/
	private static function decryptUserId($source) {
		$divided = str_split($source);
		$enc     = str_split(self::ENCRYPTOR);
		$dec     = array_flip($enc);
		$buf     = array();
		foreach ($divided as $key) {
			$buf[] = isset($dec[$key]) ? $dec[$key] : '';
		}
		return join('', $buf);
	}

	// --- /static method group ----------------------------------------------

} // end of class VjTelecomApp
