<?php
App::uses('AppController', 'Controller');
class QuestionnairesController extends AppController {
	public $uses = array(
		'Question',
		'Category'
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'authorize';
	}

	public function index() {

	}

	public function detail($id = '') {

		if (!$id) {
			$this->redirect('/');
		}

		$this->Question->unbindModel(array(
			'hasMany' => array('UsersQuestionAnswer')
			)
		);

		$data 		= $this->Question->findById($id);
		$category = $this->Category->findById($data['Chapter']['category_id']);

		$this->set(compact('data'));
		$this->set(compact('category'));

	}
}