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
	<?php echo $this->element('header');?>
	<div class="errDiv"><?=$this->Session->Flash();?></div>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('footer');?>
	<?php echo $this->element('modal');?>
<!-- Modal Start -->


<script>
$(document).ready(function() {
 
  var owl = $("#owl-demo");
  owl.trigger('owl.play');
  owl.owlCarousel({
      items :10, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });
 
  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })
  $(".play").click(function(){
    owl.trigger('owl.play'); //owl.play event accept autoPlay speed as second parameter
  })
  $(".stop").click(function(){
    owl.trigger('owl.stop');
  })
 
});

function onclick() {
	document.getElementById('one').style.cssText = 'background-color: red; color: white; font-size: 44px';
}
</script>
</body>
</html>
