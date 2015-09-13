<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	
		echo $this->Html->css('default-blue-white.css',array('id'	=> 'dev-css'));

		echo $this->Html->script('jquery-latest.min');

		echo $this->Html->script('sidebar-footer');

	?>

<style>.dev-page{visibility: hidden;}</style>

</head>
<body>

  <div class="dev-page-loading preloader"></div>
  
  <!-- page wrapper -->
  <div class="dev-page" id="page-sidebar">
      
    <?php echo $this->element('header'); ?>
    
    <div class="dev-page-container"> 

      <?php echo $this->element('side-bar'); ?>

      <div class="dev-page-content">     
        
          <div class="container">

            <?php echo $this->fetch('content'); ?>

            <?php echo $this->element('copy-right'); ?>
              
          </div>

      </div>     

     </div>  

    <?php echo $this->element('right-bar'); ?>


    <?php echo $this->element('footer'); ?>

	
	</div>
     

</body>

<?php 


	echo $this->Html->script('plugins/jquery/jquery.min');
	echo $this->Html->script('plugins/bootstrap/bootstrap.min');
	echo $this->Html->script('plugins/mcustomscrollbar/jquery.mCustomScrollbar.min');
	echo $this->Html->script('plugins/moment/moment');
	echo $this->Html->script('plugins/knob/jquery.knob.min');
	echo $this->Html->script('plugins/sparkline/jquery.sparkline.min');
	echo $this->Html->script('plugins/bootstrap-select/bootstrap-select');
	echo $this->Html->script('plugins/bootstrap-datetimepicker/bootstrap-datetimepicker');
	echo $this->Html->script('plugins/modernizr/modernizr');

	echo $this->Html->script('plugins/nvd3/d3.min');
	echo $this->Html->script('plugins/nvd3/nv.d3.min');
	echo $this->Html->script('plugins/nvd3/lib/stream_layers');
	echo $this->Html->script('plugins/waypoint/waypoints.min');
	echo $this->Html->script('plugins/counter/jquery.counterup.min');

	echo $this->Html->script('dev-settings');
	echo $this->Html->script('dev-loaders');
	echo $this->Html->script('dev-layout-default');
	echo $this->Html->script('dev-app');

?>

</html>