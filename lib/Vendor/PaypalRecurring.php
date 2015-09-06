<?php
/*
  Paypal Recurring Payment Express Checkout
  Author: Richmond Alaba
  
*/
class PaypalRecurring{
  var $user = '';
  var $pass = '';
  var $signature = '';
  var $environment = 'sandbox';
  var $billingType = 'RecurringPayments';
  var $startDate = ''; //gmdate("Y-m-d\TH:i:s\Z")
  var $billingPeriod = 'Month'; // or "Day", "Week", "SemiMonth", "Year"
  var $billingFreq = '1'; // combination of this and billingPeriod must be at most a year
  var $currency = 'JPY';
  var $country = 'JP';
  var $amount = '';
  var $desc = 'Subscription';
  var $maxFailed = 3;
  var $version = 86;
  var $returnURL = '';
  var $cancelURL = '';
  var $noShipping = 1;
  
  public function __construct($config=array()){
    if($config){
      foreach($config as $key => $val){
        $this->$key = $val;
      }
    }
  }

  public function checkout($token){
    $data['details'] = $this->getPayerId($token);
    $data['checkout'] = $this->createRecurring($data['details']['PAYERID'],$token);
    return array_merge($data);
  }

  /*
   @return token
  */
  public function getToken(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->getEndpoint());
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    $nvData = array(
      'USER' => $this->user,
      'PWD' => $this->pass,
      'SIGNATURE' => $this->signature,
      'METHOD' => 'SetExpressCheckout',
      'VERSION' => $this->version,
      'L_BILLINGTYPE0' => $this->billingType,
      'L_BILLINGAGREEMENTDESCRIPTION0' => $this->desc,
      'cancelUrl' => $this->cancelURL,
      'returnUrl' => $this->returnURL
    );
    $nvpreq = http_build_query($nvData);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
    $httpResponse = curl_exec($ch);
    if(!$httpResponse) {
      exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
    }
    $httpResponseAr = explode("&", $httpResponse);
    $httpParsedResponseAr = array();
    foreach ($httpResponseAr as $i => $value) {
      $tmpAr = explode("=", $value);
      if(sizeof($tmpAr) > 1) {
        $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
      }
    }
    if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
      exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
    }

    if(strtoupper($httpParsedResponseAr["ACK"]) == "SUCCESS" || strtoupper($httpParsedResponseAr["ACK"]) == "SUCCESSWITHWARNING"){
      $token = urldecode($httpParsedResponseAr["TOKEN"]);
      $payPalURL = "https://www.paypal.com/webscr&cmd=_express-checkout&token=$token";
      if($this->environment == "sandbox" || $this->environment == "beta-sandbox") {
        $payPalURL = "https://www.$this->environment.paypal.com/webscr&cmd=_express-checkout&token=$token";
      }
      header("Location: $payPalURL");
      exit;
    }else{
      echo '<pre>';
      exit('SetExpressCheckout failed: ' . print_r($httpParsedResponseAr, true));
    }
    
  }//end getToken
  
  /*
   @return payerId
  */
  public function getPayerId($token){
    $this->token = $token;
    if(!$this->token){
      exit('Token is not received.');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->getEndpoint());
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    $nvData = array(
      'USER' => $this->user,
      'PWD' => $this->pass,
      'SIGNATURE' => $this->signature,
      'METHOD' => 'GetExpressCheckoutDetails',
      'VERSION' => $this->version,
      'TOKEN' => $this->token,
      'cancelUrl' => $this->cancelURL,
      'returnUrl' => $this->returnURL
    );
    $nvpreq = http_build_query($nvData);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
    $httpResponse = curl_exec($ch);
    
    if(!$httpResponse) {
      exit("$methodName_ failed: '.curl_error($ch).'('.curl_errno($ch).')");
    }

    $httpResponseAr = explode("&", $httpResponse);

    $httpParsedResponseAr = array();
    foreach ($httpResponseAr as $i => $value) {
      $tmpAr = explode("=", $value);
      if(sizeof($tmpAr) > 1) {
        $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
      }
    }

    if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
      exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
    }
      
    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
      // Extract the response details.
      return $httpParsedResponseAr;
    }
  }
  
  public function createRecurring($payerId,$token){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->getEndpoint());
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    $nvData = array(
      'USER' => $this->user,
      'PWD' => $this->pass,
      'SIGNATURE' => $this->signature,
      'METHOD' => 'CreateRecurringPaymentsProfile',
      'VERSION' => $this->version,
      'TOKEN' => $token,
      'PAYERID' => $payerId,
      'PROFILESTARTDATE' => gmdate("Y-m-d\TH:i:s\Z"),
      'DESC' => $this->desc,
      'BILLINGPERIOD' => $this->billingPeriod,
      'BILLINGFREQUENCY' => $this->billingFreq,
      'AMT' => $this->amount,
      'CURRENCYCODE' => $this->currency,
      'COUNTRYCODE' => $this->country,
      'MAXFAILEDPAYMENTS' => $this->maxFailed,
      'NOSHIPPING' => $this->noShipping
    );
    
    $nvpreq = http_build_query($nvData);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
    $httpResponse = curl_exec($ch);
    if(!$httpResponse) {
      exit('$methodName_ failed: '.curl_error($ch).'('.curl_errno($ch).')');
    }
    $httpResponseAr = explode("&", $httpResponse);
    $httpParsedResponseAr = array();
    foreach ($httpResponseAr as $i => $value) {
      $tmpAr = explode("=", $value);
      if(sizeof($tmpAr) > 1) {
        $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
      }
    }
    if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
      exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
    }
    
    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){
      return $httpParsedResponseAr;
    }else{
      exit('DoExpressCheckoutPayment failed: ' . print_r($httpParsedResponseAr, true));
    }
    
  }//createRecurring
  
  private function getEndpoint(){
    if($this->environment == 'sandbox' || $this->environment == 'beta-sandbox') {
      return "https://api-3t.$this->environment.paypal.com/nvp";
    }else{
      return "https://api-3t.paypal.com/nvp";
    }
  }

  public function getDetails($profileId){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->getEndpoint());
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    $nvData = array(
      'USER' => $this->user,
      'PWD' => $this->pass,
      'SIGNATURE' => $this->signature,
      'VERSION' => $this->version,
      'METHOD' => 'GetRecurringPaymentsProfileDetails',
      'PROFILEID' => $profileId,
    );
    
    $nvpreq = http_build_query($nvData);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
    $httpResponse = curl_exec($ch);
    if(!$httpResponse) {
      exit("$methodName_ failed: '.curl_error($ch).'('.curl_errno($ch).')");
    }
    $httpResponseAr = explode("&", $httpResponse);
    $httpParsedResponseAr = array();
    foreach ($httpResponseAr as $i => $value) {
      $tmpAr = explode("=", $value);
      if(sizeof($tmpAr) > 1) {
        $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
      }
    }
    if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
      exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
    }
    
    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){
      return $httpParsedResponseAr;
    }else{
      exit($nvData['METHOD'].' failed: <pre>'.print_r($httpParsedResponseAr, true));
    }
    
  }//createRecurring
  
  public function changeStatus($profileId,$action='cancel'){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->getEndpoint());
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    $nvData = array(
      'USER' => $this->user,
      'PWD' => $this->pass,
      'SIGNATURE' => $this->signature,
      'VERSION' => $this->version,
      'METHOD' => 'ManageRecurringPaymentsProfileStatus',
      'PROFILEID' => $profileId,
      'ACTION' => $action //Cancel, Suspend, Reactivate
    );
    
    $nvpreq = http_build_query($nvData);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
    $httpResponse = curl_exec($ch);
    if(!$httpResponse) {
      exit("$methodName_ failed: '.curl_error($ch).'('.curl_errno($ch).')");
    }
    $httpResponseAr = explode("&", $httpResponse);
    $httpParsedResponseAr = array();
    foreach ($httpResponseAr as $i => $value) {
      $tmpAr = explode("=", $value);
      if(sizeof($tmpAr) > 1) {
        $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
      }
    }
    if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
      exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
    }
    
    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){
      return $httpParsedResponseAr;
    }else{
      exit($nvData['METHOD'].' failed: <pre>'.print_r($httpParsedResponseAr, true));
    }
  }
  
}