
<?php
App::uses('AppModel', 'Model');
class Question extends AppModel{
  public $belongsTo = array(
    'Chapter',
    'Admin'
  );
  public $hasMany = array(
  	'Choise',
  	'Answer',
    'UsersQuestionAnswer'
  );

  public $validate = array(
  	'question' 		=> array(
  		'rule-1' => array(
	  		'rule' 					=> 'notEmpty',
	  		'message'				=> 'Question must not empty'
	  	),
	  	'rule-2' => array(
	  		'rule'					=> 'isUniqueQuestion',
	  		'message'				=> 'This question is already exist in this chapter exam'
	  	)
  	)
  );

  public function isUniqueQuestion() {
  	return true;
  }

  
}
