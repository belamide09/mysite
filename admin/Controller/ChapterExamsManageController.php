<?php
App::uses('AppController', 'Controller');
class ChapterExamsManageController extends AppController {
	public $uses = array(
		'Chapter',
		'Question'
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'authorize';
	}

	public function index() {

		$fields = array(
			'Chapter.id',
			'Chapter.title',
			'Chapter.no_of_questions',
			'Chapter.limit_questions',
			'Chapter.status',
			'Chapter.admin_id',
			'Chapter.created',
			'Chapter.created_ip',
			'Chapter.modified',
			'Chapter.modified_ip',
			'Category.id',
			'Category.category',
			'Admin.id',
			'Admin.first_name',
			'Admin.last_name'
		);

		$this->paginate = array(
			'fields'	=> $fields,
			'limit'		=> 30
		);


		$data = $this->paginate('Chapter');

		$this->set(compact('data'));

	}

	public function questionnaires($chapter = '') {
		
		if (!$chapter) {
			$this->redirect('/');
		}

		$chapterDetail 	= $this->Chapter->findById(2);

		$chapterDetail 	= new ChapterTable($chapterDetail['Chapter']);

		$conditions 		= array(
			'Chapter.id'	=> $chapter
		);

		$fields = array(
			'Question.id',
			'Question.question',
			'Question.no_of_choises',
			'Question.status',
			'Admin.id',
			'Admin.first_name',
			'Admin.last_name',
			'Question.created',
			'Question.created_ip'
		);

		$this->paginate = array(
			'conditions'	=> $conditions,
			'fields'			=> $fields,
			'limit'				=> 10
		);

		$this->Question->unbindModel(array('hasMany' => array('UsersQuestionAnswer')));
		$data = $this->paginate('Question');

		$this->set(compact('chapterDetail'));
		$this->set(compact('data'));

	}
}
