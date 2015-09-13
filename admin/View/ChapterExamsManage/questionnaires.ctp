
<style>

#table-wrapper {
	margin-top: 10px;
}
#table-wrapper table {
	width: 96%;
	margin: 0px auto;
}
.dataTables_paginate {
	margin-right: 20px;
}
#chapter-title {
	margin-left: 30px;
}

</style>

<div id="table-wrapper" class="dataTables_wrapper no-footer">

	<div id="chapter-title">
	    <h2>Chapter Title : <?php echo $chapterDetail->title; ?> </h2>
  </div>

	<?php echo $this->element('pagination'); ?>
	
	<table class="table table-bordered table-striped table-hover table-sortable" id="table-users">
	  <thead>
		  <tr>
	      <th>ID</th>
	      <th>Question</th>
	      <th>Choises</th>
	      <th>Created By</th>
	      <th>Created</th>
	      <th>Created Ip</th>
	      <th><center>Options</center></th>
		  </tr>
	  </thead>                               
	  <tbody>
	    <?php foreach($data as $question): ?>

			<?php 
				$questionDetail 					= new QuestionTable($question['Question']);
				$createdBy 								= new AdminTable($question['Admin']);
				$choise 									= $question['Choise'];
				$answer 									= $question['Answer'];
				$questionDetail->answers 	= $answer;
			?>

			<tr>
				<td> <?php echo $questionDetail->id; ?> </td>
				<td> <?php echo $questionDetail->question; ?> </td>
				<td>

					<?php for($x = 0,$c = 1; $x < count($choise) ; $x++,$c++) {?>

						<?php if ($questionDetail->isCorrectAnswer($choise[$x]['id'])): ?>
						
							<div>
									Choise <?php echo $c; ?> : <u> <?php echo nl2br($choise[$x]['choise']); ?> </u>
							</div>

						<?php else: ?>

							<div>
								Choise <?php echo $c; ?> : <?php echo nl2br($choise[$x]['choise']); ?>
							</div>

						<?php endif; ?>

					<?php } ?>

				</td>
				<td> <?php echo myTools::adminProfileLink($createdBy->getName(),$createdBy->id); ?> </td>
				<td> <?php echo myTools::adminDatetime($questionDetail->created); ?> </td>
				<td> <?php echo $questionDetail->created_ip; ?> </td>
				<td>
					<center>
		    		<a href="<?php echo Router::url('/Questionnaires/detail'); ?>/<?php echo $questionDetail->id; ?>" class="btn btn-primary" title="View profile"> 
		    			<i class="fa fa-info-circle"> Detail</i>  
		    		</a>
		    	</center>
				</td>
			</tr>

			<?php endforeach; ?>

	  </tbody>
	</table>

	<?php echo $this->element('pagination'); ?>

</div>