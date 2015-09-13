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

</style>

<div id="table-wrapper" class="dataTables_wrapper no-footer">

	<?php echo $this->element('pagination'); ?>
	
	<table class="table table-bordered table-striped table-sortable" id="table-users">
	  <thead>
		  <tr>
	      <th>ID</th>
	      <th>Title</th>
	      <th>Category</th>
	      <th>Questions</th>
	      <th>Duration</th>
	      <th>Added By</th>
	      <th>Created</th>
	      <th>Created Ip</th>
	      <th><center>Options</center></th>
		  </tr>
	  </thead>                               
	  <tbody>
	    <?php foreach($data as $chapter): ?>

			<?php 

					$chapterDetail 	= new ChapterTable($chapter['Chapter']);
					$category 			= new CategoryTable($chapter['Category']);
					$createdBy 			= new AdminTable($chapter['Admin']);

			?>

			<tr> 
				<td> <?php echo $chapterDetail->id; ?> </td>
				<td> <?php echo $chapterDetail->title; ?> </td>
				<td>
					<a href="<?php echo $this->webroot.'CategoryManage/detail/'.$category->id; ?>">
						<?php echo $category->category; ?>
					</a>
				</td>
				<td> 
					<a href="<?php echo $this->webroot.'ChapterExamsManage/Questionnaires/'.$chapterDetail->id; ?>" >
						<center> 
							<?php echo $chapterDetail->no_of_questions; ?> 
							<i class="fa fa-question-circle"></i> 
						</center>
					</a>
				</td>
				<td> <?php echo $chapterDetail->getDuration(2); ?> Mins </td>
				<td> <?php echo myTools::adminProfileLink($createdBy->getName(),$createdBy->id); ?> </td>
				<td> <?php echo myTools::adminDatetime($chapterDetail->created); ?> </td>
				<td> <?php echo $chapterDetail->created_ip; ?> </td>
				<td> 
					<center>
		    		<a href="<?php echo Router::url('/ChapterExamsManage/detail'); ?>/<?php echo $chapterDetail->id; ?>" class="btn btn-primary" title="View profile"> 
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