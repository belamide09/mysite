<div class="page_wrap login_wrap cf">
	<div class="page_inner">
		<div class="container">

			<div class="page_breadcrumbs_2 cf">
				<ul>
					<li>
						<span class="page_ttl">Login Form</span>
					</li>
				</ul>
			</div>

			<?php 
				echo $this->Form->create('User',array(
					'class'	=> 'form-horizontal top'
					)
				); 
			?>
			<?php $authFlash = $this->Session->flash('auth'); ?>
			<?php if($authFlash): ?>
			<div class="error_wrap" style="width:800px;">
				<span class='btn-close'>✖</span>
				<?php echo $authFlash?>
			</div>
			<?php endif; ?>
			<div class="sec_wrap sec_login first">
				<div class="sub_sec">
					<label class="t_1">Email</label>
					<?php 
						echo $this->Form->input('email', array(
							'label' 				=> false,
							'class'					=> 'size_1', 
							'placeholder'		=> 'Enter Email Address',
							'required'
							)
						)
					?>
				</div>
				<div class="sub_sec">
					<label class="t_1">Password</label>
					<?php 
						echo $this->Form->input('password',array(
							'label' 				=> false,
							'class' 				=> 'size_1',
							'placeholder'		=> 'Enter Password',
							'required'
							)
						) 
					?>
					<div class="btn_wrap btn_center">
						<ul>
							<li><button type="submit" class="btn_style btn_blue">Log in</button></li>
						</ul>
						<label class="check"><?php echo $this->Form->checkbox('rememberMe', array('hiddenField' => false)); ?><?php echo 'Keep me sign in';?></label>
					</div>
				</div>
			</div>
			<div class="sec_wrap sec_register">
				<h3 class="t_1 t_center">Dont have an account yet?</h3>
				<div class="btn_wrap btn_center">
					<ul>
						<li>
							<a class="btn_style btn_red" href="<?php echo $this->Html->url('/register'); ?>">
								Sign Up
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="sec_wrap sec_verisign cf">
				<div class="sec_inner">
				
				</div>
			</div>
		</div>
	</div><!-- // .page_inner -->
</div><!-- // .page_wrap -->
