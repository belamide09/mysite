<?php

class Googleplus {
	
	public function __construct() {
		require CAKE_CORE_INCLUDE_PATH.'/Vendor/google-api-php-client/src/Google_Client.php';
		require CAKE_CORE_INCLUDE_PATH .'/Vendor/google-api-php-client/src/contrib/Google_PlusService.php';
		
		/*$GLOBALS['apiConfig']['ioFileCache_directory'] = ($cache_path == '') ? APPPATH .'cache/' : $cache_path;*/
		
		$this->client = new Google_Client();
    $this->client->setApprovalPrompt('auto');
		$this->client->setApplicationName(Configure::read('my.google_application_name'));
		$this->client->setClientId(Configure::read('my.google_client_id'));
		$this->client->setClientSecret(Configure::read('my.google_client_secret'));
		$this->client->setRedirectUri(Configure::read('my.google_redirect_uri'));
		$this->client->setDeveloperKey(Configure::read('my.google_api_key'));
		
		$this->plus = new Google_PlusService($this->client);
		
	}
	
	public function __get($name) {
		
		if(isset($this->plus->$name)) {
			return $this->plus->$name;
		}
		return false;
		
	}
	
	public function __call($name, $arguments) {
		
		if(method_exists($this->plus, $name)) {
			return call_user_func(array($this->plus, $name), $arguments);
		}
		return false;
		
	}
	
}
?>