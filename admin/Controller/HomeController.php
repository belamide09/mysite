<?php
App::uses('AppController', 'Controller');
class HomeController extends AppController {

	public function beforeFilter() {

	}

	public function index() {
		$this->layout = 'authorize';

	}

}