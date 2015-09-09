<?php
App::uses('AppController', 'Controller');
class QuestionController extends AppController {
	public $uses = array(
		'Question',
		'UsersQuestionAnswer'
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','detail');
	}
	
	public function index() {

		if ($this->Session->read('chapter_id')) {
		
			$chapter_id = $this->Session->read('chapter_id');
			$this->getChapterQuestions($chapter_id);

		} else {
			$this->redirect(FULL_BASE_PATH);
		}

	}

	/**
	* Get All question no in a chapter
	* @param 	$chapter_id
	*/
	public function ChapterQuestions($chapter_id) {

		$data = $this->Question->find('all',array(
			'fields'			=> array(
				'Question.id'
				),
			'conditions' 	=> array(
				'Question.chapter_id' => $chapter_id,
				'Question.status'			=> 1
				),
			'order'				=> array('rand()')
			)
		);

		$this->set(compact('data'));

	}

	/**
	* Get Question Detail
	* @param $question_id
	*/
	public function detail($question_id) {
		$data = $this->Question->find('first',array(
			'conditions' => array('Question.id' => $question_id)
			)
		);

		$this->set(compact('data'));
	}

	/**
	* Answer selected question
	*/
	public function addAnswer() {

		if ($this->request->is('ajax')) {
			$this->autoRender = false;

			$question_id	= $this->request->data['question_id'];

			$answers 			= $this->request->data['answers'];

			$data 				= array();

			foreach($answers as $val) {
				$answer = array(
					'UsersQuestionAnswer' => array(
						'user_id'			=> $this->Session->read('Auth.User.id'),
						'question_id'	=> $question_id,
						'choise_id' 	=> $val
					)
				);
				$data[] = $answer;
			}
			
			$this->UsersQuestionAnswer->deleteAll(array(
				'UsersQuestionAnswer.question_id' => $question_id
				)
			);


			if (!$this->UsersQuestionAnswer->saveAll($data)) {

				$response['succes'] = false;

			} else {

				$response['succes'] = true;

			}

			echo json_encode($response);

		} else {
			return $this->redirect(FULL_BASE_PATH);
		}

	}

}