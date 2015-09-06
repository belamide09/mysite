<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright	 Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link		  http://cakephp.org CakePHP(tm) Project
 * @package	   app.Model
 * @since		 CakePHP(tm) v 0.2.9
 * @license	   http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package	   app.Model
 */
class AppModel extends Model {

	function save($data = null, $validate = true, $fieldList = array()) {
		try {
			$now = date('Y-m-d H:i:s');
			// set created_at field before creation
			if (!isset($this->data[$this->name]) || !isset($this->data[$this->name]['id'])) {
				$data[$this->name]['created'] = $now;
				$data[$this->name]['created_ip'] = $_SERVER['REMOTE_ADDR'];
			}
			// set updated_at field value before each save
			$data[$this->name]['updated'] = $now;
			$data[$this->name]['modified_ip'] = $_SERVER['REMOTE_ADDR'];
			return parent::save($data, $validate, $fieldList);
		} catch (Exception $e) {
			CakeLog::write('error', $e->getMessage());
			CakeLog::write('error', $e->queryString);
		}
	}

	public function saveAllAtOnce($data) {
		try {
			if(count($data) > 0 && !empty($data[0])) {
				$value_array = array();
				$fields = array_keys($data[0][$this->name]);
				foreach ($data as $key => $value) {
					$value_array[] = "('" . implode('\',\'', $value[$this->name]) . "')";
				}
				$sql = "INSERT INTO " . $this->table . " (" . implode(', ', $fields) . ") VALUES " . implode(',', $value_array);
				$this->query($sql, false);
				return true;
			}
			return false;
		} catch (Exception $e) {
			CakeLog::write('error', $e->getMessage());
			CakeLog::write('error', $e->queryString);
		}
	}

	public function alphaNumeric($check) {
		$value = array_values($check);  // 配列の添字を数値添字に変換
		$value = $value[0];	 // 最初の値を取る
		return preg_match('/^[a-zA-Z0-9]+$/', $value);
	}

}
