<?php
$login = Router::url(array('controller' => 'users', 'action' => 'login'));
$register = Router::url(array('controller' => 'users', 'action' => 'register'));
$dashboard = Router::url(array('controller' => 'users', 'action' => 'dashboard'));

$home = Router::url(array('controller' => 'pages', 'action' => 'home'));
$about = Router::url(array('controller' => 'pages', 'action' => 'about'));
$faq = Router::url(array('controller' => 'pages', 'action' => 'faq'));
$contact = Router::url(array('controller' => 'pages', 'action' => 'contact'));
?>
<link href='http://fonts.googleapis.com/css?family=Buenard:700' rel='stylesheet' type='text/css'>
<script src="http://pupunzi.com/mb.components/mb.YTPlayer/demo/inc/jquery.mb.YTPlayer.js"></script>

<style>
.video-section .pattern-overlay {
background-color: rgba(71, 71, 71, 0.59);
padding: 110px 0 32px;
min-height: 496px; 
/* Incase of overlay problems just increase the min-height*/
}
.video-section h1, .video-section h3{
text-align:center;
color:#fff;
}
.video-section h1{
font-size:110px;
font-family: 'Buenard', serif;
font-weight:bold;
text-transform: uppercase;
margin: 40px auto 0px;
text-shadow: 1px 1px 1px #000;
-webkit-text-shadow: 1px 1px 1px #000;
-moz-text-shadow: 1px 1px 1px #000;
}
.video-section h3{
font-size: 25px;
font-weight:lighter;
margin: 0px auto 15px;
}
.video-section .buttonBar{display:none;}
.player {font-size: 1px;}
</style>
<script>
$(document).ready(function () {

    $(".player").mb_YTPlayer();

});
</script>
<header class="header" >
	<div class="container">
		<div class="navigation clearfix">
			<div class="logo" style="background-color:#72c35d;">
			<a href="<?php echo $dashboard;?>">
			<img src="<?=$this->webroot?>img/front/header_logo.png" alt="" class="img-responsive">
			</a>
			</div> <!-- end .logo -->
			
			<nav class="main-nav">
				<ul class="list-unstyled">
					 <li><a href="<?php echo $home;?>"><b>HOME</b></a></li>
						<li><a href="<?php echo $about;?>"><b>ABOUT US</b></a></li>
						<li><a href="#"><b>TEST BOOKING</b></a></li>
						<li><a href="<?php echo $faq;?>"><b>FAQ</b></a></li>
						<li><a href="<?php echo $contact;?>"><b>CONTACT US</b></a></li>
					    <?php if(empty($authData)) {?>
						    <li><div class="item"><button type="submit" class="openModal button solid light-green"  data-toggle="modal" data-target="#myModal" data-url="<?=$login?>">LOGIN</button></div> </li>
						    <li><div class="item"><button type="submit" class="openModal button solid light-green-solid"  data-toggle="modal" data-target="#myModal" data-url="<?=$register?>">REGISTER</button></div></li>
					    <?php } ?>

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

<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Warming Up -->
<link href='http://fonts.googleapis.com/css?family=Buenard:700' rel='stylesheet' type='text/css'>
<script src="http://pupunzi.com/mb.components/mb.YTPlayer/demo/inc/jquery.mb.YTPlayer.js"></script>

<!--Video Section-->
<section class="content-section video-section">
  <div class="pattern-overlay">
  <a id="bgndVideo" class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=fdJc1_IBKJA',containment:'.video-section', quality:'large', autoPlay:true, mute:true, opacity:1}">bg</a>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <!--<h1>Full Width Video</h1> --> 
<br>
        <h1>Learn Driving</h1>
	   </div>
      </div>
    </div>
  </div>
</section>
<!--Video Section Ends Here-->


</div> 


<!-- end .welcome -->
<!-- end .welcome -->
					
<section class="section dark tiny">
	<div class="inner"  style="background-color:#72c35d;">
		<div class="container" >
			<div class="tabpanel border section-tab" role="tabpanel">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="search-cars">
						<!-- <form action="" method="post" class="banner-form"> -->
						<?php  echo $this->Form->create('User',array('url'=>array('controller'=>'pages','action'=>'home'),
						'class'=>'banner-form','enctype'=>'multipart/form-data','validate'));?>	
							<div class="item" style="border:none;" >
								<div class="select-wrapper"  >
								<div class="section-tab-headingstyle" >I am a</div>
									<?php 
									echo $this->Form->input('drive',array('options' => $drive_dxperience,'class'=>'selectpicker','div'=>false,'label'=>false));
									?>									
								</div> <!-- end .select-wrapper -->
							</div> <!-- end .item -->
							
							<div class="item" style="border:none;">
							<div class="section-tab-headingstyle">Seeking</div>
								<div class="select-wrapper">
									<?php 
									echo $this->Form->input('service',array('options' => $service,'class'=>'selectpicker','div'=>false,'label'=>false));
									?>									
								</div> <!-- end .select-wrapper -->
							</div> <!-- end .item -->
							<div class="item" style="border:none;">
								<div class="section-tab-headingstyle">In a</div>
								
								<div class="select-wrapper" >
									<?php 
									echo $this->Form->input('car',array('options' => $car,'class'=>'selectpicker','div'=>false,'label'=>false));
									?>																		
								</div> <!-- end .select-wrapper -->
							</div> <!-- end .item -->
							<div class="item" style="border:none;">
								<div class="section-tab-headingstyle" >Near by</div>
									<?php 
									echo $this->Form->input('pincode',array('class'=>'','div'=>false,'label'=>false,'placeholder'=>'Postal Code'));
									?>
								</div> <!-- end .item --><br><br>
							<div class="item">
								<button type="submit" class="button solid light-blue">Search</button>
							</div> <!-- end .item -->
						<!-- </form> --> <!-- end .banner-form -->
						<?php echo $this->Form->end();?> 
					</div> <!-- end .tab-panel -->
					<div role="tabpanel" class="tab-pane fade" id="sell-car">
						<form action="" method="post" class="banner-form">
							<div class="item">
								<input type="text" placeholder="Brand">
							</div> <!-- end .item -->
							<div class="item">
								<input type="text" placeholder="Model">
							</div> <!-- end .item -->
							<div class="item">
								<input type="text" placeholder="Year">
							</div> <!-- end .item -->
							<div class="item">
								<input type="text" placeholder="Price">
							</div> <!-- end .item -->
							<div class="item">
								<button type="submit" class="button solid light-blue">Submit</button>
							</div> <!-- end .item -->
						</form> <!-- end .banner-form -->
					</div> <!-- end .tab-panel -->
				</div> <!-- end .tab-content -->
			</div> <!-- end .tabpanel -->
		</div> <!-- end .container -->
	</div> <!-- end .inner -->
</section> <!-- end .section -->