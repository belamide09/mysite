<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
		'Session',
		'Cookie',
		'Auth' => array(
			'authenticate'=>array(
				'Form'=>array(
					'fields'=>array('username'=>'email','password'=>'password')
				)
			),
			'loginRedirect' 	=> array('controller' => 'users', 'action' => 'login'),
			'logoutRedirect' 	=> array('controller' => 'login', 'action' => 'index'),
			'loginAction' 		=> '/login',
			'authError' 			=> 'You have no access to this page'
		)
	);

	public function beforeFilter() {
		/*Configure Path*/
		App::build(array(
			'Model'=>array(CAKE_CORE_INCLUDE_PATH.'/Model/Base/',CAKE_CORE_INCLUDE_PATH.'/Model/',APP_DIR.'/Model/',CAKE_CORE_INCLUDE_PATH.'/Model/Form/'),
			'Lib'=>array(CAKE_CORE_INCLUDE_PATH.'/Lib/'),
			'Vendor'=>array(CAKE_CORE_INCLUDE_PATH.'/Vendor/')
		));

		/*Autoload Model*/
		App::import('Model',array('CommonTable'));

		/*Autoload Lib*/
		App::uses('myTools','Lib');
		App::uses('myMailer','Lib');
		App::uses('myError','Lib');

		/*Autoload table class*/
		spl_autoload_register(function($class){
			$classFile1 = CAKE_CORE_INCLUDE_PATH.'/Model/'.$class.'.php';
			$classFile2 = CAKE_CORE_INCLUDE_PATH.'/Model/Form/'.$class.'.php';
			if(is_file($classFile1)){ require_once($classFile1); }
			if(is_file($classFile2)){ require_once($classFile2); }
		});

		// /*Autoload Lib*/
		// Configure::load('my');
		// Configure::load('const');

	}
}
