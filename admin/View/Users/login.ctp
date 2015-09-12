
<style>.dev-page{visibility: hidden;}</style>
                
<!-- page wrapper -->
<div class="dev-page dev-page-login">
              
  <div class="dev-page-login-block">
    <div class="dev-page-login-block__form">
      
      <?php $flash = $this->Session->flash('auth') ?>
      <?php if ($flash):?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Error!</strong> <?php echo $flash?>
        </div>
      <?php endif; ?>
      
      <?php echo $this->Form->create()?>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <?php
            echo $this->Form->input(' ',array(
              'class'       => 'form-control',
              'name'        => 'username',
              'value'       => isset($data) ? $data['username'] : '',
              'placeholder' => 'Enter username',
              'required'
              )
            );
          ?>
        </div>
      </div>                        
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <?php
            echo $this->Form->password(' ',array(
              'name'        => 'password',
              'class'       => 'form-control',
              'value'       => isset($data) ? $data['password'] : '',
              'placeholder' => 'Enter password',
              'required'
              )
            );
          ?>
        </div>
      </div>
      <div class="form-group no-border margin-top-20">
        <button class="btn btn-success btn-block">Login</button>
      </div>       
      <?php echo $this->Form->end()?>
    </div>
    <div class="dev-page-login-block__footer">                    
        © 2015 <strong>Website Name</strong>. All rights reserved.
    </div>
  </div>
    
</div>
<!-- ./page wrapper -->                

<!-- javascript -->





