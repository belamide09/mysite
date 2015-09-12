<?php
App::uses('AppController', 'Controller');
class UsersManageController extends AppController {
	public $uses = array(
		'User'
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'authorize';
	}

	public function index() {

		$conditions = array();

		if ($this->request->is('post')) {
			$data = $this->request->data;
			$conditions = array(
				'OR'	=> array(
					"concat(User.first_name,'',User.last_name) LIKE '%" => $data['search'].'%',
					"concat('User.nickname') LIKE '%" 									=> $data['search'].'%' 
				)
			);

		}


		$fields = array(
			'User.id',
			'User.email',
			'User.first_name',
			'User.last_name',
			'User.nickname',
			'User.image',
			'User.gender',
			'User.birthdate',
			'User.created',
			'User.created_ip',
			'User.modified',
			'User.modified_ip',
			'User.last_login_time',
			'User.last_login_ip',
		);

		$this->paginate = array(
			'fields'			=> $fields,
			'conditions'	=> $conditions,
			'limit'				=> 10
		);

		$data = $this->paginate('User');
		$this->set(compact('data'));

	}

	public function detail($id = '') {

		if (!$id) {
			$this->redirect('/');
		}

		$data = $this->User->findById($id);
		$user = new UserTable($data['User']);

		$this->set(compact('user'));

	}

}
