<nav class="menu-side">
	<?php
		echo $this->Html->image('hide-toggle.png',array(
			'id' 	=>	'hidenavbarbtn'
			)
		);
	?>
  <div id="profilepic">
  	<?php
		echo $this->Html->image('hide-toggle.png',array(
			'id' 	=>	'hidenavbarbtn'
			)
		);
	?>
  </div>
  <ul>
      <li><a href=""> Home </a></li>
      <li><a href=""> Profile </a></li>
      <li><a href="<?php echo FULL_BASE_PATH.'logout' ?>"> Log out </a></li>
  </ul>
</nav>