<?php
class UserTable {

	public function __construct($data) {
		foreach($data as $key => $row) {
			$this->$key = $row;
		}
	}

	public function getName() {
		$name = $this->first_name.' '.$this->last_name;
		if ($this->nickname) {
			$name .= '('.$this->nickname.')';
		}
		return $name;
	}

	public function getImage() {
		return '/img/users_images/'.$this->image;
	}

	public function getGender() {
		$data = array('','Male','Female');
		return $data[$this->gender];
	}

	public function getBirthDate() {
		return myTools::adminDatetime($this->birthdate);
	}

}