
<style>

table {
	width: 96%;
	margin: 10px;
}

</style>

<?php 

$question 					= new QuestionTable($data['Question']);
$category 					= new CategoryTable($category['Category']);
$chapter 						= new ChapterTable($data['Chapter']);
$createdBy 					= new AdminTable($data['Admin']);
$question->answers 	= $data['Answer'];
$choises 						= $data['Choise'];

?>

<table class="table table-bordered">

	<tr>
		<th>ID</th>
		<td><?php echo $question->id; ?></td>
	</tr>
	<tr>
		<th> Category </th>
		<td>
			<a href="<?php echo $this->webroot.'CategoryManage/detail/'.$chapter->id; ?>">
				<?php echo $category->category; ?>
			</a>
		</td>
	</tr>
	<tr>
		<th> Chapter </th>
		<td>
			<a href="<?php echo $this->webroot.'ChapterExamsManage/detail/'.$category->id; ?>">
				<?php echo $chapter->title; ?>
			</a>
		</td>
	</tr>
	<tr>
		<th>Question</th>
		<td><?php echo $question->question; ?></td>
	</tr>
	<tr>
		<th> Choises </th>
		<td>
			<?php for($x = 0,$c = 1;$x < count($choises); $x++, $c++) { ?>

				<div>
					
					Choise <?php echo $c; ?>

					<?php if ($question->isCorrectAnswer($choises[$x]['id'])): ?>

						<u> <?php echo $choises[$x]['choise']; ?> </u>

					<?php else: ?>

								<?php echo $choises[$x]['choise']; ?> 
					
					<?php endif; ?>

				</div>

			<?php } ?>
		</td>
	</tr>
	<tr>
		<th> Created By </th>
		<td> <?php echo myTools::adminProfileLink($createdBy->getName(),$createdBy->id); ?> </td>
	</tr>
	<tr>
		<th> Created </th>
		<td> <?php echo myTools::adminDatetime($question->created); ?> </td>
	</tr>
	<tr>
		<th> Created Ip </th>
		<td> <?php echo $question->created_ip; ?> </td>
	</tr>

</table>