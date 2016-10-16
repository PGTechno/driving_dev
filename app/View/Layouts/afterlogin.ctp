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
			'my'
		));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" style="">
	<?php //echo $this->element('sql_dump'); ?>
	<div class="errDiv"><?=$this->Session->Flash();?></div>
	<?php echo $this->element('al_header');?>
	<section class="section light" >
	   <div class="inner" >
	   		<div class="container" height="">
	   			<div id="package" class="dash-container" >
   				   	<?php if($authData['role']==2){ ?>
   				   		<ul class="nav nav-tabs nav-tabs-sets" >
					      	<li  class="active"><a href="instructor_dashboard.html">DASHBOARD</a></li>
					      	<li><a href="instructor_manage_profile.html">MANAGE PROFILE</a></li>
					      	<li><a href="instructor_manage_inbox.html">INBOX MESSAGE</a></li>
					      	<li><a href="instructor_manage_calender.html">MANAGE CALENDAR</a></li>
					      	<li><a href="instructor_manage_booking.html">MANAGE BOOKING</a></li>
					   	</ul>	
   				   	<?php }else{ ?> 
   				   		<ul class="nav nav-tabs nav-tabs-sets" >
							<li class="active"><a href="user_dashboard.html">DASHBOARD</a></li>
							<li><a href="user_manage_profile.html">MANAGE PROFILE</a></li>
							<li><a href="user_inbox.html">INBOX MESSAGE</a></li>
							<li><a href="user_history.html">HISTORY</a></li>
							<li><a href="user_review.html">REVIEWS</a></li>
						</ul>
   				   	<?php }?>
   				   	
   				   <?php echo $this->fetch('content'); ?>
   				</div>
   			</div>
   		</div>		   
	</section>
	<?php echo $this->element('al_footer');?>
	<?php //echo $this->element('modal');?>
</body>
</html>
