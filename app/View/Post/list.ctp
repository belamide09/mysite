<?php 
	// Preparation for data only
?>

<?php foreach($data as $row): ?>

<?php 

$me 			= $this->Session->read('Auth.User');
$me 			=  ($me) ? new UserTable($me) : null;

$user 		= new UserTable($row['User']);
$post 		= new PostTable($row['Post']);
$comments = $post->getLatestComments();

?>


<?php foreach ($comments['comments'] as $comment):?>

<?php $user = new UserTable($comment['User']) ?>

<?php endforeach ?>


<?php endforeach ?>