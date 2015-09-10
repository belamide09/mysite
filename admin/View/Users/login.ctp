<div id="wrap" class="container_24">

	<div class="login">
		
	<div class="notice info">

		<?php 

			$authFlash = $this->Session->flash('auth'); 
			
			if ($authFlash) {
				echo "<p> $authFlash </p>";
			} else {
				echo " <p>Just press the <b>login button</b> 
							on the right, or focus a field and enter to login.</p>";
			}

		?>

	</div>
	
		<div id="header">
				
			<a href="#" id="logo">Simplpan - Admin Panel</a>
			
			<?php echo $this->Form->create('User',array('id'	=> 'login'))?>
				
				<label for="username" class="label_username">User</label>
				<?php
					echo $this->Form->input(' ',array(
						'name'				=> 'username',
						'value'				=> (isset($data)) ? $data['username'] : '',
						'placeholder'	=> 'Enter username',
						'class'				=> 'password tip-stay validate',
						'title'				=> 'Enter your username',
						'div'					=> false,
						'label'				=> false
						)
					);
				?>

				<label for="password" class="label_password">Password</label>
				<?php 
					echo $this->Form->input(' ',array(
						'type'				=> 'password',
						'name'				=> 'password',
						'value'				=> (isset($data)) ? $data['password'] : '',
						'placeholder'	=> 'Enter password',
						'class'				=> 'password tip-stay validate',
						'title'				=> 'Enter you password',
						'div'					=> false,
						'label'				=> false
						)
					);
				?>

				<?php echo $this->Form->submit('login',array(
								'value'	=> 'login',
								'class'	=> 'tip',
								'title'	=> 'login',
								'div'		=> false
								)
							);
				?>
				
			<?php echo $this->Form->end()?>
			
		</div>
		
	</div>

</div>