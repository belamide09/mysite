<?php
class AdminTable {

	public function __construct($data) {

		foreach($data as $key => $val){ 
			$this->$key = $val;
		}

	}

	public function getName() {
		return $this->first_name.' '.$this->last_name;
	}

}