<?php
App::uses('AppController', 'Controller');
class ExamController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	public function index() {
		$chapter_id = 2;

		$this->set('title_for_layout', 'Exam');
	}

}