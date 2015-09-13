<?php
class ChapterTable {

	public function __construct($data) {
		foreach($data as $key => $val) {
			$this->$key = $val;
		}
	}

	// 1: secs, 2: mins
	public function getDuration($type) {
		$duration = ($type == 1) ? $this->no_of_questions * 60 : $this->no_of_questions;
		return $duration;
	}

}