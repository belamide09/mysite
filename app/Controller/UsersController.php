<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login');
	}
	
	public function login() {
		$this->layout = 'membership';
		$this->set('title_for_layout','Login');
		
		if ($this->request->is('post')) {
			
			$email 		= $this->request->data['User']['email'];
			$password = $this->request->data['User']['password'];

			$conditions = array(
				'User.email' 		=> $email,
				'User.password'	=> AuthComponent::password($password),
				'status' 				=> 1
			);

			$data = $this->User->find('first',array(
				'conditions'	=> $conditions
				)
			);

			if (isset($data['User'])) {

				$this->Auth->login($data['User']);
				return $this->redirect($this->Auth->redirectUrl());

			} else {

				$this->Session->setFlash(__('Incorrect email and password combination'),'default',array(),'auth');

			}

		}
		
	}


	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

}