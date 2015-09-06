<?php

class VjNexmoApp {

	// --- main logic method group ------------------------------------------

	/**
	 * Nexmo SMS APIへのリクエストを送信します。Nexmoからは引数で指定した電話番号へSMSが送信されます。<br />
	 * メソッドが正常終了した場合は空文字、エラーの場合はエラー文字列を返します。
	 *  @see https://docs.nexmo.com/index.php/sms-api/send-message
	 */
	function sendSMS($phone_number, $user_id, $from, $sign) {
		$err_msg = $this->validateSMSAuth($user_id, $phone_number);
		if ($err_msg) { return $err_msg; }

		$base_url  = 'https://rest.nexmo.com/sms/json';
		$auth_code = $this->generateAuthCode(4); // 4桁の数字認証コードを生成する
#		$to        = $this->toInternationalNumFormat($phone_number);
		$text      = '認証コード:'. $auth_code            . "\n"
		           . 'この番号を画面に入力してください。' . "\n"
		           . $sign                                . "\n";

		$params = array(
			'api_key'    => '29c2ebb1',
			'api_secret' => 'cad83dd2',
			'from'       => $from,
#			'to'         => $to,
			'to'         => $phone_number,
			'type'       => 'unicode',
			'text'       => $this->encodeText($text),
			'client-ref' => $user_id
		);
		$url      = $base_url . '?' . $this->getQueryStringByParamArray($params);
		$response = $this->curlRequestAndGetResponse($url);
		$result   = $this->parseSmsJsonResponse($response);
		$send_ok  = $result['status'] === '0';
		$this->insertSendLog($result);

		if ($send_ok) {
			$err_msg = $this->registerAuthCode($user_id, $phone_number, $auth_code);
		} else {
			$err_msg = $result['error-text'];
		}

		return $err_msg;
	}

	/**
	 * Nexmo SMS APIへのリクエストを送信します。Nexmoからは引数で指定した電話番号へSMSが送信されます。<br />
	 * メソッドが正常終了した場合は空文字、エラーの場合はエラー文字列を返します。
	 *  @see https://docs.nexmo.com/index.php/sms-api/send-message
	 */
	function sendSMSToMember($phone_number, $user_id, $from, $sign) {
		$err_msg = $this->validateSMSAuth($user_id, $phone_number);
		if ($err_msg) { return $err_msg; }

		$base_url  = 'https://rest.nexmo.com/sms/json';
		$auth_code = $this->generateAuthCode(4); // 4桁の数字認証コードを生成する
#		$to        = $this->toInternationalNumFormat($phone_number);
		$text      = '認証コード:'. $auth_code            . "\n"
		           . 'この番号を画面に入力してください。' . "\n"
		           . $sign                                . "\n";

		$params = array(
			'api_key'    => '29c2ebb1',
			'api_secret' => 'cad83dd2',
			'from'       => $from,
#			'to'         => $to,
			'to'         => $phone_number,
			'type'       => 'unicode',
			'text'       => $this->encodeText($text),
			'client-ref' => $user_id
		);
		$url      = $base_url . '?' . $this->getQueryStringByParamArray($params);
		$response = $this->curlRequestAndGetResponse($url);
		$result   = $this->parseSmsJsonResponse($response);
		$send_ok  = $result['status'] === '0';
		$this->insertSendLog($result);

		if ($send_ok) {
			$err_msg = $this->registerAuthCodeToMember($user_id, $phone_number, $auth_code);
		} else {
			$err_msg = $result['error-text'];
		}

		return $err_msg;
	}

	/**
	 * Nexmo SMS APIへのリクエストを送信します。Nexmoからは引数で指定した電話番号へSMSが送信されます。<br />
	 * メソッドが正常終了した場合は空文字、エラーの場合はエラー文字列を返します。
	 *  @see https://docs.nexmo.com/index.php/sms-api/send-message
	 */
	function sendSMSTo2FA($phone_number, $user_id, $from, $sign) {
		$err_msg = $this->validateSMSAuth($user_id, $phone_number);
		if ($err_msg) { return $err_msg; }

		$base_url  = 'https://rest.nexmo.com/sc/us/2fa/json';
		$auth_code = $this->generateAuthCode(4); // 4桁の数字認証コードを生成する

		$params = array(
			'api_key'    => '29c2ebb1',
			'api_secret' => 'cad83dd2',
			'to'         => $phone_number,
			'pin'        => $auth_code
		);
		$url      = $base_url . '?' . $this->getQueryStringByParamArray($params);
		$response = $this->curlRequestAndGetResponse($url);
		$result   = $this->parseSmsJsonResponse($response);
		// エラー時に取れない場合がある
		if (empty($result['to'])) $result['to'] = $phone_number;
		$send_ok  = $result['status'] === '0';
		$this->insertSendLog($result);

		if ($send_ok) {
			$err_msg = $this->registerAuthCode($user_id, $phone_number, $auth_code);
		} else {
			$err_msg = $result['error-text'];
		}

		return $err_msg;
	}

	/**
	 * Nexmo SMS APIへのリクエストを送信します。Nexmoからは引数で指定した電話番号へSMSが送信されます。<br />
	 * メソッドが正常終了した場合は空文字、エラーの場合はエラー文字列を返します。
	 *  @see https://docs.nexmo.com/index.php/sms-api/send-message
	 */
	function sendSMSToMemberTo2FA($phone_number, $user_id, $from, $sign) {
		$err_msg = $this->validateSMSAuth($user_id, $phone_number);
		if ($err_msg) { return $err_msg; }

		$base_url  = 'https://rest.nexmo.com/sc/us/2fa/json';
		$auth_code = $this->generateAuthCode(4); // 4桁の数字認証コードを生成する

		$params = array(
			'api_key'    => '29c2ebb1',
			'api_secret' => 'cad83dd2',
			'to'         => $phone_number,
			'pin'        => $auth_code
		);
		$url      = $base_url . '?' . $this->getQueryStringByParamArray($params);
		$response = $this->curlRequestAndGetResponse($url);
		$result   = $this->parseSmsJsonResponse($response);
		// エラー時に取れない場合がある
		if (empty($result['to'])) $result['to'] = $phone_number;
		$send_ok  = $result['status'] === '0';
		$this->insertSendLog($result);

		if ($send_ok) {
			$err_msg = $this->registerAuthCodeToMember($user_id, $phone_number, $auth_code);
		} else {
			$err_msg = $result['error-text'];
		}

		return $err_msg;
	}

	/**
	 * phone_sms_authテーブルにauth_codeの値を記録します。<br />
	 * 不可の場合はメッセージ文字列を、可の場合は空文字を返します。
	 */
	function registerAuthCodeToMember($user_id, $phone_number, $auth_code) {
		$auth_info = $this->getAuthInfo($user_id);
		$err_msg   = '';

		if (!$auth_info) {
			// 未登録の場合は新規レコードを登録する
			$this->insertPhoneSmsAuth($user_id, $phone_number, $auth_code);
		} else {
			// 登録があるが未認証の場合は電話番号・認証用番号を更新する
			$this->updateAuthCode($user_id, $phone_number, $auth_code);
		}

		// 認証コードの入力試行制限回数をリセット
		$this->isCodeInputLimitationOver(/* $reset = */ true);

		return $err_msg;
	}
	/**
	 * phone_sms_authテーブルにauth_codeの値を記録します。<br />
	 * 不可の場合はメッセージ文字列を、可の場合は空文字を返します。
	 */
	function registerAuthCode($user_id, $phone_number, $auth_code) {
		$auth_info = $this->getAuthInfo($user_id);
		$err_msg   = '';

		if (!$auth_info) {
			// 未登録の場合は新規レコードを登録する
			$this->insertPhoneSmsAuth($user_id, $phone_number, $auth_code);
		} elseif (!$auth_info['is_authed']) {
			// 登録があるが未認証の場合は電話番号・認証用番号を更新する
			$this->updateAuthCode($user_id, $phone_number, $auth_code);
		} else {
			$err_msg = '既に認証済みです。';
		}

		// 認証コードの入力試行制限回数をリセット
		$this->isCodeInputLimitationOver(/* $reset = */ true);

		return $err_msg;
	}

	/**
	 * 認証コードを照合して、認証処理を実行します。<br />
	 * 不可の場合はメッセージ文字列を、可の場合は空文字を返します。
	 */
	function auth($user_id, $auth_code) {
		$user      = $this->getUserInfo($user_id);
		$auth_info = $this->getAuthInfo($user_id);
/*
		if (isset($auth_info['phone_number'])) {
			// 0から始まっていない場合は0から始める（原因不明の念のため処理）
			if (!preg_match("/^0[0-9]{10}/", $auth_info['phone_number'])) {
				$auth_info['phone_number'] = '0' . $auth_info['phone_number'];
			}
		}
*/
		if     (!$user)                                 { $err_msg = 'ユーザー情報が取得できませんでした。'; }
		elseif (!$auth_info)                            { $err_msg = 'データが不正です。'; }
		elseif ($this->isCodeInputLimitationOver())     { $err_msg = '認証コードの入力試行制限回数を超えました。もう一度最初からお手続きをやり直して下さい。'; }
		elseif ($auth_code !== $auth_info['auth_code']) { $err_msg = '認証コードが一致しません。'; }
		else                                            { $err_msg = $this->validateSMSAuth($user_id, $auth_info['phone_number']); }

		if ($err_msg) { return $err_msg; }

		// SMS認証済みに更新
		$this->updateStateAuthed($user_id);

		return ''; // OK
	}

	// --- /main logic method group ------------------------------------------


	// --- validate method group ---------------------------------------------

	/** 電話番号がSMS認証に使用済みかどうかを確認し、真偽値を返します。*/
	function isUsedSMSNumber($phone_number) {
// ここの処理は外側で行う（会員登録時・会員登録後どちらにもSMSを送るため
return ;
#		$res = ClassRegistry::init('PhoneSmsAuth')->find('first', array('conditions' => array('PhoneSmsAuth.phone_number' => $phone_number, 'PhoneSmsAuth.is_authed' => 1)));
#		return (!empty($res['PhoneSmsAuth']));
	}

	/** ユーザーがSMS認証済みかどうかを確認し、真偽値を返します。*/
	function isSMSAuthedUser($user_id) {
// ここの処理は外側で行う（会員登録時・会員登録後どちらにもSMSを送るため
return ;
#		$res = ClassRegistry::init('PhoneSmsAuth')->find('first', array('conditions' => array('PhoneSmsAuth.user_id' => $user_id, 'PhoneSmsAuth.is_authed' => 1)));
#		return (!empty($res['PhoneSmsAuth']));
	}

	/**
	 * 認証コードの入力試行制限回数を超えている場合に true を、超えていない場合に false を返します。<br />
	 * メソッド呼び出しごとにカウントを+1加算してセッションに記録します。<br />
	 * 引数resetにtrueを渡した場合はカウントを0に戻します。このメソッドは総当りによる認証を防止します。
	 */
	function isCodeInputLimitationOver($reset = false) {
		$limit = 20;
		$key   = 'SMS_CODE_INPUT_COUNT';
		if ($reset || !isset($_SESSION[$key])) {
			$_SESSION[$key] = 0;
			return false;
		} else {
			$_SESSION[$key] = (int)$_SESSION[$key] + 1;
			return $limit < (int)$_SESSION[$key];
		}
	}

	/** SMS認証の試行制限回数を超えている場合に true を、超えていない場合に false を返します。*/
	function isRetryLimitationOver($user_id) {
		$limit = 20;
		$auth_info = $this->getAuthInfo($user_id);
		if (!$auth_info) { return false; }

		return $limit < $auth_info['retry_count'];
	}

	/**
	 * 電話番号の入力を確認し、
	 * 不可の場合はメッセージ文字列を、可の場合は空文字を返します。
	 */
	function varidatePhoneNumber($phone_number) {
		$msg = '';
/* 
		if ($phone_number === '') { $msg = '電話番号を入力してください。'; }
		elseif (strlen($phone_number) !== 11) { $msg = '電話番号は11桁で入力してください。';}
		else {
			preg_match('/^\d+$/', $phone_number, $m);
			if (count($m) !== 1) { $msg = '電話番号は数字のみ入力してください。'; }
		}
*/
		return $msg;
	}

	/**
	 * SMS認証によるポイント追加が可能なユーザーかどうかを判定し、
	 * 不可の場合はメッセージ文字列を、可能な場合は空文字を返します。
	 */
	function validateSMSAuth($user_id, $phone_number) {
		$user = $this->getUserInfo($user_id);

		$msg = '';
		if     (!$user)                                  { $msg = 'ユーザー情報を取得できませんでした。'; }
		elseif ($this->isSMSAuthedUser($user_id))        { $msg = 'お客さまは既にSMS認証が完了しています。'; }
		elseif ($this->isRetryLimitationOver($user_id))  { $msg = 'SMS認証の試行制限回数を超えたため、手続きができませんでした。'; }
		elseif ($this->isUsedSMSNumber($phone_number))   { $msg = '入力された電話番号は既にSMS認証に登録されており、認証することができませんでした。'; }
		else                                             { $msg = $this->varidatePhoneNumber($phone_number); }

		return $msg;
	}

	// --- /validate method group ---------------------------------------------


	// --- DB reference method group ------------------------------------------

	/** ユーザーの登録情報をuser_idを使って取得します。*/
	function getUserInfo($user_id) {
		$user =  ClassRegistry::init('User')->findByid($user_id); 
		if (isset($user['User'])) {
			return $user['User'];
		} else {
			return false;
		}
	}

	/** ユーザーのSMS認証情報をuser_idを使って取得します。*/
	function getAuthInfo($user_id) {
		$user =  ClassRegistry::init('PhoneSmsAuth')->findByUserId($user_id); 
		if (isset($user['PhoneSmsAuth'])) {
			return $user['PhoneSmsAuth'];
		} else {
			return false;
		}
	}

	// --- /DB reference method group -----------------------------------------


	// --- DB action method group ---------------------------------------------

	/** Nexmo SMS APIのレスポンスをログとしてDBに書き込みます。*/
	function insertSendLog($params) {
		ClassRegistry::init('PhoneSmsSendLog')->create();
		ClassRegistry::init('PhoneSmsSendLog')->set(array(
			'status'            => $params['status'],
			'message_id'        => $params['message-id'],
			'to'                => $params['to'],
			'user_id'           => $params['client-ref'],
			'remaining_balance' => $params['remaining-balance'],
			'message_price'     => $params['message-price'],
			'network'           => $params['network'],
			'error_text'        => $params['error-text'],
		));
		ClassRegistry::init('PhoneSmsSendLog')->save();
	}

	/** phone_sms_authテーブルへのデータ追加処理を行います。*/
	function insertPhoneSmsAuth($user_id, $phone_number, $auth_code) {
		$params = array(
			'user_id' => $user_id,
			'phone_number' => $phone_number,
			'auth_code' => $auth_code,
			'is_authed' => '0',
		);
		ClassRegistry::init('PhoneSmsAuth')->create();
		ClassRegistry::init('PhoneSmsAuth')->set($params);
		ClassRegistry::init('PhoneSmsAuth')->save();
	}

	/**
	 * phone_sms_authテーブルのphone_number,auth_codeの値を更新します。 <br />
	 * また、retry_countの値が+1加算されます。
	 *
	 */
	function updateAuthCode($user_id, $phone_number, $auth_code) {
		$params = array(
			'phone_number' => $phone_number,
			'auth_code' => $auth_code,
			'retry_count' => 'retry_count + 1',
		);
		ClassRegistry::init('PhoneSmsAuth')->updateAll($params, array('PhoneSmsAuth.user_id' => $user_id));

	}

	/** phone_sms_authテーブルのis_authedの値を1(認証済み)に更新します。*/
	function updateStateAuthed($user_id) {
		$params = array(
			'is_authed' => '1',
		);
		ClassRegistry::init('PhoneSmsAuth')->updateAll($params, array('PhoneSmsAuth.user_id' => $user_id));
	}

	// --- /DB action method group ------------------------------------------


	// --- utility method group ---------------------------------------------

	/**
	 *  Nexmo SMS API からのレスポンスを連想配列に変換します。 このメソッドは1通づつのメールのみを想定しています。<br />
	 *  @see https://docs.nexmo.com/index.php/sms-api/send-message
	 */
	function parseSmsJsonResponse($response) {
		$response_keys = array(
			'status',
			'message-id',
			'to',
			'client-ref',
			'remaining-balance',
			'message-price',
			'network',
			'error-text'
		);
		$raw = json_decode($response, /* $assoc = */ true);
		$msg = $raw['messages'][0];
		// 連想配列が期待されるキーを持たない場合は追加する。
		foreach ($response_keys as $key) {
			if (!isset($msg[$key])) { $msg[$key] = ''; }
		}

		return $msg;
	}

	/** 連想配列からクエリ文字列を生成します。*/
	function getQueryStringByParamArray($params) {
		$query = array();
		foreach ($params as $k => $v) {
			$query[] = $k . '=' . $v;
		}
		return join('&', $query);
	}

	/** 引数に字数を指定して、認証に使用する確認コードを生成します。 */
	function generateAuthCode($num_chars) {
		$chars = array();
		for($i = 0; $i < $num_chars; $i++) {
			$chars[] = (string)rand(0, 9);
		}
		return join('', $chars);
	}

	/** 携帯電話番号を受け取って、日本への国際電話形式に変換して返します。 */
	function toInternationalNumFormat($phone_number) {
		return '+81' . preg_replace('/^0/', '', $phone_number);
	}

	/** 文字コードUTF8・URLエンコードされた文字列を返します。*/
	function encodeText($s) {
		return rawurlencode($s);
	}

	/** リクエストを送信し、結果を返します。*/
	function curlRequestAndGetResponse($request_url) {
		$ch = curl_init($request_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER,         false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

}