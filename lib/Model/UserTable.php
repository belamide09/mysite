<?php
class UserTable {

	public function __construct($data) {
		foreach($data as $key => $row) {
			$this->$key = $row;
		}
	}

	public function getName() {
		return $this->first_name.' '.$this->last_name;
	}

	public function getImage() {
		return $this->image;
	}

}