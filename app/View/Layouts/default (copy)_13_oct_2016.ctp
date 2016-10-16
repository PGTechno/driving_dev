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
			'bootstrap.min',
			'font-awesome.min',
			'ionicons.min',
			/*'flexslider',
			'owl.carousel',
			'owl.theme.default',
			'jquery.nouislider.min',
			'owl.theme.default',*/
			'style',//*
			'my'
		));

		echo $this->Html->script(array(
			'jQuery-2.2.0.min',
			'bootstrap.min',
			'jquery.inview.min',//*,
			'jquery.validate',
			//'scripts',//*
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

</body>
</html>
