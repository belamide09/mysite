
<?php
App::uses('AppModel', 'Model');
class Post extends AppModel{
	public $belongsTo = array(
		'Category'	=> array(
			'className'					=> 'Category'
		),
		'User'				=> array(
			'alias'					=> 'User'
		)
	);
	public $hasMany = array(
		'PostsFile'
  );

  public $validate = array(
  	'title' 	=> array(
  		'rule'			=> array('between', 5, 20)
  	),
  	'content'	=> array(
  		'rule'			=> array('minLength', 10)
  	),
  	'category' => array(
  		'rule'	=> array('notEmpty','numeric')
  	)
  );

  
  
}
