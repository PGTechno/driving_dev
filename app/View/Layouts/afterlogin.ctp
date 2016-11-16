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
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo Configure::read('Site.title')." : ".$title_for_layout;//$cakeDescription ?>
		<?php //echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array(
			'front/bootstrap.min',
			'front/font-awesome.min',
			'front/ionicons.min',
			'front/flexslider',
			'front/owl.carousel',
			'front/owl.theme.default',
			'front/jquery.nouislider.min',
			'front/style',
			'bootstrap-datetimepicker',
			'jquery.dataTables',
			'star-rating',
			'my'
		));

		echo $this->Html->script(array(
			'front/jquery-1.11.2.min',
			'front/scripts',
			'front/bootstrap.min',
			'front/jquery.inview.min',
			'front/jquery.flexslider-min',
			'front/owl.carousel.min',
			'front/isotope.pkgd.min',
			'front/imagesloaded.pkgd.min',
			'front/jquery.nouislider.all.min',
			'jquery.validate',
			'moment.min',
			'bootstrap-datetimepicker.min',
			'jquery.dataTables',
			'star-rating',
			//'dataTables.bootstrap',
			//'bootstrap-table.min',
			'my'
		));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" style="">
	<?php 
		$currentUrl = Router::url(array('controller' => $this->request->params['controller'], 'action' => $this->request->params['action']));
		$dashboard = Router::url(array('controller' => 'users', 'action' => 'dashboard'));
		$profile   = Router::url(array('controller' => 'users', 'action' => 'profile'));
		$inbox 	   = Router::url(array('controller' => 'inbox', 'action' => 'index'));
		$calender  = Router::url(array('controller' => 'bookings', 'action' => 'calendar'));
		$booking   = Router::url(array('controller' => 'bookings', 'action' => 'index'));
		$history   = Router::url(array('controller' => 'bookings', 'action' => 'history'));
		$review    = Router::url(array('controller' => 'users', 'action' => 'review'));
		//echo $currentUrl.'<br>'.$dashboard; exit;
	?>
	<?php //echo $this->element('sql_dump'); ?>
	<div class="errDiv"><?=$this->Session->Flash();?></div>
	<?php echo $this->element('al_header');?>
	<section class="section light" >
	   <div class="inner" >
	   		<div class="container" height="">
	   			<?php if($this->Session->read('Auth.User')){ ?>
	   				<div id="package" class="dash-container" >
	   				   	<?php if($authData['role']==2){ ?>
	   				   		<ul class="nav nav-tabs nav-tabs-sets" >
						      	<li  class="<?php echo $currentUrl==$dashboard ? 'active' : '';?>"><a href="<?php echo $dashboard;?>">DASHBOARD</a></li>
						      	<li  class="<?php echo $currentUrl==$profile ? 'active' : '';?>"><a href="<?php echo $profile;?>">MANAGE PROFILE</a></li>
						      	<li  class="<?php echo $currentUrl==$inbox ? 'active' : '';?>"><a href="<?php echo $inbox;?>">INBOX MESSAGE</a></li>
						      	<li  class="<?php echo $currentUrl==$calender ? 'active' : '';?>"><a href="<?php echo $calender;?>">MANAGE CALENDAR</a></li>
						      	<li  class="<?php echo $currentUrl==$booking ? 'active' : '';?>"><a href="<?php echo $booking;?>">MANAGE BOOKING</a></li>
						   	</ul>	
	   				   	<?php }else{ ?> 
	   				   		<ul class="nav nav-tabs nav-tabs-sets" >
								<li  class="<?php echo $currentUrl==$dashboard ? 'active' : '';?>"><a href="<?php echo $dashboard;?>">DASHBOARD</a></li>
								<li  class="<?php echo $currentUrl==$profile ? 'active' : '';?>"><a href="<?php echo $profile;?>">MANAGE PROFILE</a></li>
								<li  class="<?php echo $currentUrl==$inbox ? 'active' : '';?>"><a href="<?php echo $inbox;?>">INBOX MESSAGE</a></li>
								<li  class="<?php echo $currentUrl==$history ? 'active' : '';?>"><a href="<?php echo $history;?>">HISTORY</a></li>
								<li  class="<?php echo $currentUrl==$review ? 'active' : '';?>"><a href="<?php echo $review;?>">REVIEWS</a></li>
							</ul>
	   				   	<?php }?>
	   				   	
	   				   <?php echo $this->fetch('content'); ?>
	   				</div>	
	   			<?php }else {?>
	   				<div class="page-container" >
	   					<?php echo $this->fetch('content'); ?>	
	   				</div>
	   			<?php } ?>
	   			
   			</div>
   		</div>		   
	</section>
	<?php echo $this->element('al_footer');?>
	<?php echo $this->element('modal');?>
</body>
</html>
