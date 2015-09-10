<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

	public function login() {
		$this->layout = 'unauthorize';

		if ($this->request->is('post')) {
			
			$data = $this->request->data;
			
			$username = $data['username'];
			$password = AuthComponent::password($data['password']);

			$user = ClassRegistry::init('Admin')->find('first',array(
				'fields'			=> array(
					'Admin.id',
					'Admin.status'
				),
				'conditions'	=> array(
					'Admin.username'	=> $username,
					'Admin.password'	=> $password
				)
				)
			);

			if ($user) { 

				$this->Auth->login($user['Admin']); 
        return $this->redirect('' != $referrerVal ? $referrerVal : '/');

			} else {
				$this->Session->setFlash(__('Incorrect email and password combination'),'default',array(),'auth');
			}

			$this->set(compact('data'));

		}

	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

}