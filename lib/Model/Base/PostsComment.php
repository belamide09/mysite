<?php
App::uses('AppModel', 'Model');
class PostsComment extends AppModel{
	public $belongsTo = array(
		'User'
	);
	public $hasMany = array(
		'PostsCommentsFile'
	);

}