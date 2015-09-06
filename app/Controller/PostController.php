<?php
App::uses('AppController', 'Controller');
class PostController extends AppController {
	public $uses = array(
		'Post',
		'PostsFiles',
		'PostsComment',
		'PostsCommentsFile',
		'PostsCommentsLike'
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','getPost');
	}
	
	public function index() {
		$this->autoRender = false;

		$data = $this->Post->find('all');
		pr($data);
		
	}

	public function getPost($offset) {

		if (isset($offset)) {

			$this->layout = false;

			$conditions = array(
				'Post.status'		=> 1
			);

			if ( $this->Session->read('Auth.User') ) {

				$conditions['Post.user_id']	= $this->Session->read('Auth.User.id');

			}

			$rankOrder = '(Select count(*) from `posts_comments` where post_id=Post.id) DESC';

			$data = $this->Post->find('all',array(
				'conditions' 	=> $conditions,
				'order'				=> array('Post.id DESC,'.$rankOrder)
				)
			);

			$this->set(compact('data'));
			$this->render('list');

		} else {
			$this->redirect(FULL_BASE_PATH);
		}

	}

	public function addPost() {
		$this->autoRender = false;

		if ($this->request->is('post')) {

			$data = array(
				'user_id' 		=> $this->Session->read('Auth.User.id'),
				'title'				=> $this->request->data['title'],
				'category_id'	=> 3,
				'content'			=> $this->request->data['content'],
				'status'			=> 1,
				'created'			=> myTools::dateTimeNow(),
				'created_ip'	=> $this->request->clientIp(),
				'modified'		=> myTools::dateTimeNow(),
				'modified_ip'	=> $this->request->clientIp()
			);

			$files = $this->request->data['files'];

			// Files should be like this
			// $files = array(
			// 	array(
			// 		'name'				=> 'name1.txt',
			// 		'type'				=> 'text/txt'
			// 	),
			// 	array(
			// 		'name'				=> 'name2.txt',
			// 		'type'				=> 'text/txt'
			// 	),
			// 	array(
			// 		'name'				=> 'name3.txt',
			// 		'type'				=> 'text/txt'
			// 	)
			// );

			$this->Post->set($data);
			if ( $this->Post->save($data) ) {

				$this->uploadFiles($files,$this->Post->id);
				$response['success'] = true;

			} else {

				$errors = $this->Post->validationErrors;
				$keys = array_keys($errors);

				$response['success'] = false;
				$response['error'] = $errors ? $errors[$keys[0]][0] : 'Error Occured';
				
			}

			echo json_encode($response);

		} else { 
			$this->redirect(FULL_BASE_PATH);
		}

	}

	private function uploadFiles($files,$post_id) {
		
		$data = array();

		for($x = 0 ; $x < count($files) ; $x++) {
			
			$row = $files[$x];

			$type = split('/',$row['type']);
			$type = $type[0];

			$ext = pathinfo($row['name'],PATHINFO_EXTENSION);

			$data[] = array(
				'post_id'		=> $post_id,
				'file_name'	=> myTools::generateFileName($ext,$post_id,$x),
				'name'			=> $row['name'],
				'type'			=> $type
			);

		}

		$this->PostsFiles->saveAll($data);

	}

	public function addComment() {

		if ($this->request->is('post')) {

			$this->autoRender = false;

			$data = array(
				'post_id' 		=> $this->request->data['post_id'],
				'user_id' 		=> $this->Session->read('Auth.User.id'),
				'content'			=> $this->request->data['content'],
				'created'			=> myTools::dateTimeNow(),
				'created_ip'	=> $this->request->clientIp(),
				'modified'		=> myTools::dateTimeNow(),
				'modified_ip'	=> $this->request->clientIp()
			);

			if (!empty($_FILES['file'])) {

				$file = $_FILES['file'];
			
			}

			$this->PostsComment->set($data);

			if ( $this->PostsComment->save() ) {

				if (isset($file)) {
					$this->addCommentFile($this->PostsComment->id,$file);
				}

				$response['success'] = true;

			} else {
				$response['success'] = false;
			}

			echo json_encode($response);

		} else {
			$this->redirect(FULL_BASE_PATH);
		}

	}

	private function addCommentFile($comment_id,$file) {

		$ext = pathinfo($file['name'],PATHINFO_EXTENSION);

		$type = split('/',$file['type']);
		$type = $type[0];

		$data = array(
			'posts_comment_id' 	=> $comment_id,
			'file_name'					=> myTools::generateFileName($ext,$comment_id,null),
			'name'							=> $file['name'],
			'type'							=> $type
		);

		$this->PostsCommentsFile->set($data);
		$this->PostsCommentsFile->save();

	}

	public function togglePostLike() {

		if ($this->request->is('post')) {
			
			$this->autoRender = false;

			$liked = $this->request->data['liked'];

			$my_id = $this->Session->read('Auth.User.id');
			$comment_id = $this->request->data['comment_id'];

			$conditions = array(
				'posts_comments_id' 	=> $comment_id,
				'user_id'							=> $my_id
			);

			$exist = $this->PostsCommentsLike->find('first',array(
				'conditions' => $conditions
				)
			);

			if ( $liked == 1 && !$exist ) {

				$this->PostsCommentsLike->set($conditions);
				$this->PostsCommentsLike->save();
			
			} else if ( $liked == 0 && $exist) {

				$this->PostsCommentsLike->id = $exist['PostsCommentsLike']['id'];
				$this->PostsCommentsLike->delete();

			}

		} else {
			$this->redirect(FULL_BASE_PATH);
		}

	}

}