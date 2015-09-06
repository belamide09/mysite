<?php
App::uses('AppModel', 'Model');
class PostTable {

	public function __construct($data) {
		foreach($data as $key => $row) {
			$this->$key = $row;
		}
	}

	public function getLatestComments() {
		$data = array();

		$fields = array(
			'PostsComment.id',
			'PostsComment.content',
			'PostsComment.created',
			'User.id',
			'User.image',
			'User.first_name',
			'User.last_name',
			'User.gender',
			'(Select count(*) from `posts_comments_likes` where `post_id` = PostsComment.id) as `likes`'
		);

		$data['comments'] = CLassRegistry::init('PostsComment')->find('all',array(
			'fields' 			=> $fields,
			'conditions'	=> array(
				'post_id' 		=> $this->id
			),
			'limit'				=> 10
			)
		);

		$next = CLassRegistry::init('PostsComment')->find('first',array(
			'conditions'	=> array(
				'post_id' 		=> $this->id
			),
			'offset'			=> 10
			)
		);

		$data['has_next'] = ($next) ? true : false;

		return $data;
	}

	public function countAnswers() {
		$conditions = array('post_id' => $this->id);
		$count = CLassRegistry::init('PostsComment')->find('count',array(
			'conditions'	=> $conditions
			)
		);
		return $count;
	}

	public function getDuration() {
		return "1 min";
	}

	public function countImageFiles() {
		return 10;
	}

	public function countTextFiles() {
		return 5;
	}

}