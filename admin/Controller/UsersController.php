<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

	public function login() {
		$this->layout = 'unauthorize';

	}

}