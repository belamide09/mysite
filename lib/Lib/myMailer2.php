<?php

App::uses('AppController', 'Controller');
class myMailer2{

  public Static function activationMail($user,$hash){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->domain('nativecamp.net');
    $email->emailFormat('text');
    $email->template('account_activation');
    $email->viewVars(array('user' => $user,'hash'=>$hash));
    $email->to($user['email']);
    $email->from('info@nativecamp.net', 'NativeCamp運営事務局');
    $email->replyTo('info@nativecamp.net');
    $email->returnPath('info@nativecamp.net', 'NativeCamp運営事務局');
#    $email->subject(__('Account Activation').' - '.Configure::read('my.site_name'));
    $email->subject("ネイティブキャンプ：会員登録認証メール");
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
    $email->returnPath('info@nativecamp.net', 'NativeCamp運営事務局');
#    $email->subject(__('Account Activation').' - '.Configure::read('my.site_name'));
    $email->subject("ネイティブキャンプ：事前登録完了メール");
    $email->send();
  }

}