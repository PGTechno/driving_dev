<?php
$login = Router::url(array('controller' => 'users', 'action' => 'login'));
$register = Router::url(array('controller' => 'users', 'action' => 'register'));
?>
<header class="header" >
	<div class="container">
		<div class="navigation clearfix">
			<div class="logo" style="background-color:#72c35d;">
			<a href="#">
			<img src="img/front/header_logo.png" alt="" class="img-responsive">
			</a>
			</div> <!-- end .logo -->
			
			<nav class="main-nav">
				<ul class="list-unstyled">
					<li><a href="#home">HOME</a></li>
					<li><a href="#about">ABOUT US</a></li>
					<li><a href="#faq">FAQ</a></li>
					<li><a href="#contact">CONTACT US</a></li>
				    <li>
				    	<div class="item">
				    		<!-- <button type="submit" class="button solid light-green"  data-toggle="modal" data-target="#myModal">LOGIN</button> -->
				    		<button class="openModal button solid light-green"  data-toggle="modal" data-target="#myModal" data-url="<?php echo $login;?>">LOGIN</button>
				    	</div> 
				    </li>
				    <li>
				    	<div class="item">
				    		<!-- <button type="submit" class="button solid light-green-solid" data-toggle="modal" data-target="#con-close-modal">REGISTER</button> -->
				    		<button class="openModal button solid light-green-solid" data-toggle="modal" data-target="#myModal" data-url="<?php echo $register;?>">REGISTER</button>
				    	</div>
				    </li>       
				</ul>
			</nav> <!-- end .main-nav -->
			<a href="" class="responsive-menu-open"><i class="fa fa-bars"></i></a>
		</div> <!-- end .navigation -->
		
	</div> <!-- end .container -->
</header> <!-- end .header -->

<div class="responsive-menu">
	<a href="" class="responsive-menu-close"><i class="ion-android-close"></i></a>
	<nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
</div> <!-- end .responsive-menu -->