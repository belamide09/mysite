<?php
App::uses('AppModel', 'Model');
class Chapter extends AppModel {
	public $belongsTo = array(
		'Category',
		'Admin'
	);
}