<?php

App::uses('AppController', 'Controller');
class myMailer{

  public Static function testMail($user){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('sample');
    $email->viewVars(array('user' => $user));
    $email->to($user['email']);
    $email->subject('About1');
    $email->send();
  }
  
  public Static function activationMail($user,$hash){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('account_activation');
    $email->viewVars(array('user' => $user,'hash'=>$hash));
    $email->to($user['email']);
    $email->bcc(Configure::read('my.admin_email'));
#    $email->subject(__('Account Activation').' - '.Configure::read('my.site_name'));
    $email->subject("★＜ネイティブキャンプ英会話＞無料体験コースお申込ありがとうございます★");
    $email->returnPath('return@nativecamp.net', 'NativeCamp運営事務局');
    $email->send();
  }
	
	public static function preRegistrantActivation($data) {
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();
		$email->config('default');
		$email->emailFormat('text');
		$email->template('sp_account_activation');
		$email->viewVars(array('data' => $data));
		$email->to($data['email']);
		$email->from($data['from']);
		$email->subject($data['subject']);
		$email->returnPath('return@nativecamp.net', 'NativeCamp運営事務局');
		$email->send();
	}
	


  public Static function accountCompleteMail($user){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->domain('nativecamp.net');
    $email->emailFormat('text');
    $email->template('account_complete');
    $email->viewVars(array('name' => $user['nickname']));
    $email->to($user['email']);
    $email->from('info@nativecamp.net', 'NativeCamp運営事務局');
    $email->replyTo('info@nativecamp.net');
    $email->returnPath('return@nativecamp.net', 'NativeCamp運営事務局');
#    $email->subject(__('Account Activation').' - '.Configure::read('my.site_name'));
    $email->subject("ネイティブキャンプ：事前登録完了メール");
    $email->send();
  }
  
  public Static function changeEmailAddress($user,$hash){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('change_email_address');
    $email->viewVars(array('user' => $user,'hash'=>$hash));
    $email->to($user['new_email']);
    $email->subject('★＜ネイティブキャンプ英会話＞メールアドレスの変更完了しました★');
    $email->returnPath('return@nativecamp.net', 'NativeCamp運営事務局');
    $email->send();
  }
    
  public Static function forgotMail($user,$hash){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('forgot');
    $email->viewVars(array('user' => $user,'hash'=>$hash));
    $email->to($user->email);
    $email->bcc(Configure::read('my.admin_email'));
#    $email->subject(__('Forgot Password').' - '.Configure::read('my.site_name'));
    $email->subject("★＜＜＜ネイティブキャンプ英会話＞パスワード再確認メール＞＞＞★");
    $email->returnPath('return@nativecamp.net', 'NativeCamp運営事務局');
    $email->send();
  }
  
  public Static function forgotTeacherMail($teacher,$hash){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('forgot');
    $email->viewVars(array('teacher' => $teacher,'hash'=>$hash));
    $email->to($teacher->email);
    $email->bcc(Configure::read('my.admin_email'));
    $email->subject(__('Forgot Password').' - '.Configure::read('my.site_name'));
    $email->returnPath('return@nativecamp.net', 'NativeCamp運営事務局');
    $email->send();
  }
  
  public Static function inquiryMail($userNickname,$inquiryData,$id){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('inquiry');
    $email->viewVars(array('userNickname' => $userNickname ,'inquiryData' => $inquiryData,'id'=>$id));
    $email->to($inquiryData['email']);
    $email->from('info@nativecamp.net');
    $email->subject('★＜ネイティブキャンプ英会話＞お問い合わせ受付完了しました★');
    $email->returnPath('return@nativecamp.net', 'NativeCamp運営事務局');
    $email->send();
  }

  public Static function sendMailMagazin($from_email,$to_email, $subject, $body, $userData){
    App::uses('CakeEmail', 'Network/Email');

		$activationHash = ClassRegistry::init('UsersEmailConfirms')->find('first',array(
				'conditions' => array(
					'user_id' => $userData["id"]
				),
				'fields' => array('UsersEmailConfirms.hash'),
				'order' => array('UsersEmailConfirms.created DESC')
			)
		);

		$urlActivate = Configure::read('base_url').'user/register/activate-email/'.$activationHash['UsersEmailConfirms']['hash'];

    // 文字置換
    $search  = array('/--id--/','/--nickname--/','/--activate_email_url--/', '/--email--/');
    $replace = array($userData["id"], $userData["nickname"], $urlActivate, $userData["email"]);
    $subject = str_replace($search, $replace, $subject);
    $body    = str_replace($search, $replace, $body);

    $email = new CakeEmail();

    $email->config('default');
    $email->from($from_email, 'NativeCamp運営事務局');
    $email->to($to_email);
    $email->replyTo('info@nativecamp.net');
    $email->returnPath('return@nativecamp.net', 'NativeCamp運営事務局');
    $email->subject($subject);
    $email->send($body);

  }
	public Static function sendTemplateMail($mail_id, $to_email, $user){
		App::uses('CakeEmail', 'Network/Email');
		App::uses('MailTemplate', 'Model');

		// 宛先がない
		if (empty($to_email)) {
			return ;
		}

		// テンプレート取得
		$mailbase = ClassRegistry::init('MailTemplate')->findByIdAndStatus($mail_id, 1);
		if (empty($mailbase['MailTemplate'])) {
			return ;
		}
		$mail_template = $mailbase['MailTemplate'];

		// FROMがない
		if (empty($mail_template['from_email'])) {
			return ;
		}

		$search       = array('/--id--/','/--nickname--/', '/--email--/');
		$replace      = array($user['id'], $user['nickname'], $user['email']);
		$mail_subject = str_replace($search, $replace, $mail_template['subject']);
		$mail_body    = str_replace($search, $replace, $mail_template['body']);

		switch ($mail_id) {
			case Configure::read('site_in_mail.student_changed_email'):
				$mail_body = str_replace(array('/--new_email--/', '/--url--/'), array($user['new_email'], $user['active_url']), $mail_body);
				break;

			case Configure::read('site_in_mail.student_changed_password'):
				$mail_body = str_replace(array('/--url--/'), array($user['active_url']), $mail_body);
				break;


			case Configure::read('site_in_mail.student_reserved'):
			case Configure::read('site_in_mail.student_cancel_reservation'):
                $mail_body = str_replace(array('/--teacherName--/','/--appointmentDate--/', '/--startTime--/'), array($user['teacherName'], $user['appointmentDate'], $user['startTime']), $mail_body);
                break;

			case Configure::read('site_in_mail.admin_student_reserved'):
			case Configure::read('site_in_mail.admin_student_cancel'):
                $mail_body = str_replace(array('/--teacherName--/','/--appointmentDate--/', '/--startTime--/', '/--endTime--/'), array($user['teacherName'], $user['appointmentDate'], $user['startTime'], $user['endTime']), $mail_body);
                break;

			case Configure::read('site_in_mail.teacher_cancel_reservation'):
                $mail_body = str_replace(array('/--teacherName--/','/--appointmentDate--/', '/--startTime--/', '/--endTime--/'), array($user['teacherName'], $user['appointmentDate'], $user['startTime'], $user['endTime']), $mail_body);
				break;


            case Configure::read('site_in_mail.student_reservedlesson_before_30minutes'):
                $mail_body = str_replace(array('/--teacherName--/','/--appointmentDate--/', '/--startTime--/'), array($user['teacherName'], $user['appointmentDate'], $user['startTime']), $mail_body);
                break;
            case Configure::read('site_in_mail.admin_reservedlesson_before_30minutes'):
                $mail_body = str_replace(array('/--email--/','/--teacherName--/','/--appointmentDate--/', '/--startTime--/', '/--endTime--/'), array($user['email'], $user['teacherName'], $user['appointmentDate'], $user['startTime'], $user['endTime']), $mail_body);
                break;

            case Configure::read('site_in_mail.student_inquiry'):
                break;
            case Configure::read('site_in_mail.student_inquiry_reply'):
				$mail_body = str_replace(array('/--replymessage--/'), array($user['replymessage']), $mail_body);
                break;

            case Configure::read('site_in_mail.admin_student_inquiry'):
                $mail_body = str_replace(array('/--inquiry_message--/'), array($user['inquiry_message']), $mail_body);
                break;

            case Configure::read('site_in_mail.student_regist_email_confirm'):
                $mail_body = str_replace(array('/--url--/'), array($user['active_url']), $mail_body);
                break;

            case Configure::read('site_in_mail.purchase_book_confirm_user'):
                $mail_subject = str_replace('/--books--/', $user['books'], $mail_subject);
                $mail_body = str_replace(array('/--tax--/','/--nickname--/','/--name--/', '/--address--/', '/--contact--/', '/--email--/', '/--products--/', '/--price--/', '/--quantity--/', '/--subtotal--/', '/--total--/', '/--account--/'), array($user['tax'], $user['nickname'], $user['name'], $user['address'], $user['contact'], $user['email'], $user['products'], $user['price'], $user['qty'], $user['subtotal'], $user['total'], $user['account']), $mail_body);
                break;

            case Configure::read('site_in_mail.purchase_book_confirm_admin'):
                $mail_body = str_replace(array('/--tax--/', '/--name--/', '/--address--/', '/--contact--/', '/--email--/', '/--products--/', '/--price--/', '/--quantity--/', '/--subtotal--/', '/--total--/'), array($user['tax'], $user['name'], $user['address'], $user['contact'], $user['email'], $user['products'], $user['price'], $user['qty'], $user['subtotal'], $user['total']), $mail_body);
                break;
		}

		$email = new CakeEmail();
        $email->config('default');
		$email->from($mail_template['from_email'], 'NativeCamp運営事務局');
		$email->to($to_email);
		$email->replyTo('info@nativecamp.net');
		$email->returnPath('return@nativecamp.net', 'NativeCamp運営事務局');
		$email->subject($mail_subject);
		$email->send($mail_body);
	}	

}