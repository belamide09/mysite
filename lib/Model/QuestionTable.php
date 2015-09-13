<?php

class QuestionTable {

	public $answers;

	public function __construct($data) {

		foreach($data as $key => $val) {
			$this->$key = $val;
		}

	}

	public function isCorrectAnswer($choise) {

		$flag = false;

		foreach($this->answers as $val) {
			if ($choise == $val['id']) {
				$flag = true;
			}
		}

		return $flag;

	}

}