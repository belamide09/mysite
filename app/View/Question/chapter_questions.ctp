

<div id="questions">
<?php

for($x = 0 ; $x < count($data) ; $x++) {

	$event = 'onclick="SelectQuestion('.$data[$x]['Question']['id'].')"';

	if ($data[$x]['users_question_answers']) {
		echo "<div class='questionnobtn' $event>$x</div>";
	} else {
		echo "<div class='questionnobtn unanswered' $event>$x</div>";
	}

}

?>
</div>