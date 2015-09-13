<?php
App::uses('AppController', 'Controller');
class CategoryManageController extends AppController {
	public $uses = array(
		'Category',
		'Chapter',
		'Question'
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'authorize';
	}

	public function detail($id = '') {

		if (!$id) {
			$this->redirect('/');
		}


		$data = $this->Category->findById($id);

		$condition 	= array('conditions' => array('Chapter.id'	=> $id));
		$chapters 	= $this->Chapter->find('count',$condition);
		$questions 	= $this->Question->find('count',$condition);

		$detail['Category']['chapters'] 	= $chapters;
		$detail['Category']['questions'] 	= $questions;


		$createdBy 	= new AdminTable($data['Admin']);
		$detail 		= new CategoryTable($data['Category']);

		die();

	}

}