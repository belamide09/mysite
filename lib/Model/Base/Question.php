
<?php
App::uses('AppModel', 'Model');
class Question extends AppModel{
  public $hasMany = array(
  	'choises',
  	'answers',
    'users_question_answers'
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
