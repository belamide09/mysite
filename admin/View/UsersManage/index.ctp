
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
	      <th>Name (Code Name)</th>
	      <th>Email</th>
	      <th>Type</th>
	      <th>Organization</th>
	      <th>Created</th>
	      <th>Created Ip</th>
	      <th>Last time login</th>
	      <th>Last time login IP</th>
	      <th><center>Options</center></th>
		  </tr>
	  </thead>                               
	  <tbody>
	    <?php foreach($data as $user):?>
	    <?php $user = new UserTable($user['User'])?>
	    <tr>
	    	<td> <?php echo $user->id; ?> </td>
	    	<td>
	    		<div class="panel-body list-contacts" style="border-bottom: 0px;">
			    	<div class="list-contacts-item">
			    		<?php
			    			echo $this->Html->image($user->getImage(),array(
			    				'class'	=> 'mCS_img_loaded',
			    				'div'	=> false,
			    				'label'	=> false
			    				)
			    			);
			    			echo $user->getName(); 
			    		?>
		        </a>
		      </div>
	    	</td>
	    	<td> <?php echo $user->email; ?> </td>
	    	<td> Student (BSIT) </td>
	    	<td> Harvard </td>
	    	<td> <?php echo myTools::adminDatetime($user->created); ?> </td>
	    	<td> <?php echo $user->created_ip; ?> </td>
	    	<td> <?php echo myTools::adminDatetime($user->last_login_time); ?> </td>
	    	<td> <?php echo $user->last_login_ip; ?> </td>
	    	<td>
	    		<center>
		    		<a href="<?php echo Router::url('/UsersManage/detail'); ?>/<?php echo $user->id; ?>" class="btn btn-primary" title="View profile"> 
		    			<i class="fa fa-user"></i> Profile 
		    		</a>
		    	</center>
	    	</td>
	    </tr>
		  <?php endforeach; ?>
	  </tbody>
	</table>

	<?php echo $this->element('pagination'); ?>

</div>