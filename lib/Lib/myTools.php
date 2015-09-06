<?php

class myTools{

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

}
