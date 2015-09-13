<?php
class CategoryTable {

	public function __construct($data) {

		foreach($data as $key => $val) {
			$this->$key = $val;
		}

	}

}