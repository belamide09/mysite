<?php

/*********************************
*                                *
* PayPal PHP Manager             *
* By Jeremy Desvaux              *
* June 2010                      *
* Creative Commons               *
*                                *
**********************************/

class telecomcheckout {
#	public $clientip='00309'; // テスト用
	public $clientip='80771'; // 本番用
	public $sendid;
	public $money;
	public $redirect_url;
	public $redirect_back_url;
	public $rebill_param_id;
	public $sendpass;
	public $send_pass_bool;
	public $usrtel = '09011112222';
	public $auth_url = 'https://secure.telecomcredit.co.jp/inetcredit/adult/order.pl';
	public $quick_url= 'https://secure.telecomcredit.co.jp/inetcredit/secure/one-click-order.pl';
	public $change_member_url= 'https://secure.telecomcredit.co.jp/inetcredit/secure/change_member_info-order.pl';
	

	//=======================================================================//
	//==> Class constructor, with default settings that can be overridden <==//
	//=======================================================================//
	public function __construct($config=""){
	}

	public function set($key, $val) {
		$this->{$key} = $val;
		if ($key=='sendpass') {
			$this->send_pass_bool='yes';
		}
	}

	public function setParams($params) {
		if (is_array($params)) {
			foreach ($params as $key => $val) {
				$this->set($key, $val);
			}
		}
	}

	public function getParams() {
		return array(
			'clientip'           => $this->clientip,
			'sendid'             => $this->sendid,
			'money'              => $this->money,
			'usrmail'            => $this->usrmail,
			'usrtel'             => $this->usrtel,
			'sendpass'           => $this->sendpass,
			'redirect_url'       => $this->redirect_url,
			'redirect_back_url'  => $this->redirect_back_url,
			'option'             => $this->option,
			'send_pass_bool'     => $this->send_pass_bool,
			'non_duplication_id' => '',
			'rebill_param_id'    => $this->rebill_param_id,
		);
	}

	public function getForm() {

		$param = $this->getParams();

		$form='
		<form id="paypal_checkout" action="https://secure.telecomcredit.co.jp/inetcredit/secure/order.pl" method="post">';

		foreach ($param as $key => $value) {
			$form.='
			<input type="hidden" name="'.$key.'" value="'.$value.'" />';
		}
		$form.='
		<input id="ppcheckoutbtn" type="submit" value="決済手続きへ" class="btn_style green" />
		</form>';

		return $form;

	}


	public function getQuickForm() {

		$param = $this->getParams();

		$form='
		<form id="paypal_checkout" action="' . $this->quick_url . '" method="post">';

		foreach ($param as $key => $value) {
			$form.='
			<input type="hidden" name="'.$key.'" value="'.$value.'" />';
		}
		$form.='
		<input id="ppcheckoutbtn" type="submit" value="決済手続きへ" class="btn_style green" />
		</form>';

		return $form;

	}

	public function getChangeMemberForm($sendid) {
		$form='
		<form id="telecom_change_member_form" action="' . $this->change_member_url . '" method="post">
		<input type="hidden" name="clientip" value="'.$this->clientip.'" />
		<input type="hidden" name="sendid" value="'.$sendid.'" />
		<input type="hidden" name="usrtel" value="'.$this->usrtel.'" />
		</form>';

		return $form;
	}

	public function setDeactivation() {

		$params = array(
			'clientip'           => $this->clientip,
			'member_id'          => $this->sendid,
			'password'           => $this->sendpass,
			'mode'               => 'link'
		);
		$param_str = http_build_query($params);

		$response = @file_get_contents("https://secure.telecomcredit.co.jp/inetcredit/secure/member.pl?" . $param_str);

		return $response;

	}


}

