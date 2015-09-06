<?php echo $this->Html->css('activities-selection') ?>
<div id="activities">
	<center>
		<div>
		<?php 
			echo $this->Html->image('sliding.png',array(
				'id' => 'marker-img'
				)
			);
		?>
		</div>
		<?php
			echo $this->Form->button('Activities');
			echo $this->Form->button('Examinations');
			echo $this->Form->button('Conference Rooms');
			echo $this->Form->button('Questions');
		?>
	</center>
</div>

<div class="buttons">
	<center>
	<?php 
		echo $this->Form->button('Tutorials');
		echo $this->Form->button('Ask Questions');
		echo $this->Form->button('Source Codes');
	?>
	</center>
</div>
