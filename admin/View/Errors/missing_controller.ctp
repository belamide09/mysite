
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- meta section -->
        <title>Intuitive - Admin Dashboard Template</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" >
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" >
        <!-- ./meta section -->
        
        <!-- css styles -->
        <link rel="stylesheet" type="text/css" href="css/default-blue-white.css" id="dev-css">
        <!-- ./css styles -->                               
        
        <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="css/dev-other/dev-ie-fix.css">
        <![endif]-->
        
        <!-- javascripts -->
        <script type="text/javascript" src="js/plugins/modernizr/modernizr.js"></script>
        <!-- ./javascripts -->
        
        <style>.dev-page{visibility: hidden;}</style>
    </head>
    <body>
        
        <div class="dev-page-error">
            
            <div class="dev-page-error-block">
                <div class="code">404</div>
                <div class="title">It looks like you have been lost...</div>
                
                <div class="buttons">
                    <div class="row">
                        <div class="col-md-6">
                            <button onclick="history.back();" class="btn btn-primary btn-block"><i class="fa fa-angle-left pull-left"></i> Go back</button>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo $this->webroot?>" class="btn btn-danger btn-block">Go Home <i class="fa fa-angle-right pull-right"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Try to find something that you need:</label>
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter keyword...">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                
                <!-- Copyright -->
                <div class="copyright">
                    <div>
                        &copy; 2015 <strong>Aqvatarius</strong>. All rights reserved.
                    </div>
                    <div>
                        <a href="#">Terms of use</a> / <a href="#">Privacy Policy</a>
                    </div>
                </div>
                <!-- ./Copyright -->
                
            </div>
            
        </div>
        
        
        <!-- javascript -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>       
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        
        
        <script type="text/javascript" src="js/dev-loaders.js"></script>
        <script type="text/javascript" src="js/dev-layout-default.js"></script>
        <script type="text/javascript" src="js/dev-app.js"></script>        
        <!-- ./javascript -->        
    </body>
</html>






