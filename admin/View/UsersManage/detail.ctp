<style>
.row-wider {
	width: 96%;
	margin-left: 20px;
}
</style>
<div class="page-title">
  <h1>User Profile</h1>
</div>

<div class="row row-wider" style="margin: 10px;">
  <div class="col-md-3">
    <div class="profile margin-bottom-0">
      <div class="profile-image">
          <img src="http:/mysite/admin/assets/images/users/user_2.jpg">
          <div class="profile-status offline"></div>
      </div>
      <div class="profile-info text-left">
          Profile complete on <strong>70%</strong>
          <div class="progress progress-bar-xs">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
          </div>
      </div>
    </div>
        
    </div>
    <div class="col-md-9">
        
        <div class="form-group-one-unit margin-bottom-40">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-custom">
                        <label>Email Address</label>
                        <input type="text" class="form-control" value="<?php echo $user->email; ?>">
                    </div>
                </div>
            </div>                                                              
        </div>
        
        
        <div class="page-subtitle margin-bottom-0">
            <h3>Personal information</h3>
            <p>This information is important for us</p>
        </div>
        <div class="form-group-one-unit margin-bottom-40">
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group form-group-custom">
                      <label>First Name</label>
                      <input type="text" class="form-control" value="<?php echo $user->first_name; ?>">                                            
                  </div>                        
              </div>
              <div class="col-md-6">
                  <div class="form-group form-group-custom">
                      <label>Last Name</label>
                      <input type="text" class="form-control" value="<?php echo $user->last_name; ?>">
                  </div>                        
              </div>
              <div class="col-md-6">
                  <div class="form-group form-group-custom">
                      <label>Nick Name</label>
                      <input type="text" class="form-control" value="<?php echo $user->nickname; ?>">
                  </div>                        
              </div>
              <div class="col-md-6">
                  <div class="form-group form-group-custom">
                      <label>Rank(Level)</label>
                      <div> <input class="form-control" value="Veteran(2)"></div>
                  </div>                        
              </div>
          </div>
          <div class="row">                                            
              <div class="col-md-4">
                  <div class="form-group" style="margin-left:10px;">
                    <label>Gender</label>

                    <select class="form-control selectpicker" data-live-search="true">
                      <option value="" <?php if (empty($user->gender)) echo 'selected'; ?>> </option>
                      <option value="1" <?php if ($user->gender == 1) echo 'selected'; ?>>Male</option>
                      <option value="2" <?php if ($user->gender == 2) echo 'selected'; ?>>Female</option>
                  	</select>

                  </div>                        
              </div>
              <div class="col-md-4">
                <div class="form-group" style="margin-left:20px;">
	                <label>Birth Date </label>                            
	                <input type="text" class="form-control datepicker" value="<?php echo $user->getBirthDate(); ?>" placeholder="Enter Birth Date">
	              </div>            
              </div>
          </div>    
        </div>
        
        <div class="page-subtitle margin-bottom-0">
            <h3>About</h3>
            <p>Some information about yourself</p>
        </div>
        <div class="form-group-one-unit margin-bottom-40">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-custom">
                        <label>University</label>
                        <input type="text" class="form-control" value="National Aviation University">
                    </div>                        
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-custom">
                        <label>Profession</label>
                        <input type="text" class="form-control" value="System Programmer">
                    </div>                        
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-custom">
                        <label>About</label>
                        <textarea class="form-control" rows="5">After reading the January 1975 issue of Popular Electronics that demonstrated the Altair 8800, Gates contacted Micro Instrumentation and Telemetry Systems (MITS), the creators of the new microcomputer, to inform them that he and others were working on a BASIC interpreter for the platform.</textarea>
                    </div>                        
                </div>                                            
            </div>
        </div>
        <div class="col-md-12">                                            
          <button class="btn btn-primary pull-right">Save</button>
        </div>   
    </div>
</div>