<?php

class myTools{


	public function getWebsiteName() {

		return "Sample WEBSITE";
	}

	/**
	* Get Datetime now
	* @return string date now
	*/
	public static function dateTimeNow() {
		return date('Y-m-d H:i:s');
	}

	/**
	* Generate random unique file name
	* @param string $ext, int $post_id, int $x
	* @return $file_name
	*/
	public static function generateFileName($ext,$post_id,$x) {
		$file_name = date('YmdHis').$post_id.$x.'.'.$ext;
		return $file_name;
	}

	/**
	* Convert datetime to 01/01/2015 (Monday) 12:00 Format
	* @param string $datetime
	* @return string $dateRet
	*/
	public function adminDatetime($datetime) {
		$dateRet = "";
		if ($datetime) {
			$stamp = strtotime($datetime);
			$dateRet = date('m/d/Y (D) H:i');
			$dateRet = "<strong>$dateRet</strong>";
		}
		return $dateRet;
	}

	/**
	* Get website full base url
	* @return url
	*/
	public function getBaseUrl() {
		return 'http://mysite.com/';
	}

	public function adminProfileLink($name,$id) {

		$name = "<a href='http://localhost/mysite/admin/AdminManage/detail/$id'>$name</a>";
		return $name;

	}

}
