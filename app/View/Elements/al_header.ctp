<?php 
$logout = Router::url(array('controller' => 'users', 'action' => 'logout'));
$home = Router::url(array('controller' => 'pages', 'action' => 'home'));

$home = Router::url(array('controller' => 'pages', 'action' => 'home'));
$about = Router::url(array('controller' => 'pages', 'action' => 'about'));
$faq = Router::url(array('controller' => 'pages', 'action' => 'faq'));
$contact = Router::url(array('controller' => 'pages', 'action' => 'contact'));
?>
<header class="header" >
 <div class="container">
    <div class="navigation clearfix">
       <div class="logo" style="background-color:#72c35d;">
          <a href="<?php echo $home;?>">
          <img src="<?=$this->webroot?>img/front/header_logo.png" alt="" class="img-responsive">
          </a>
       </div>
       <!-- end .logo -->
       <nav class="main-nav">
          <ul class="list-unstyled">
              <li><a href="<?php echo $about;?>"><b>ABOUT US</b></a></li>
              <li><a href="#"><b>TEST BOOKING</b></a></li>
              <li><a href="<?php echo $faq;?>"><b>FAQ</b></a></li>
              <li><a href="<?php echo $contact;?>"><b>CONTACT US</b></a></li>
               <!-- BEGIN USER LOGIN DROPDOWN -->
             <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <img alt="" src="<?php echo $this->Custom->imageUrl(WWW_ROOT.'images/users/'.$authData['image']);?>" class="img-circle" style="height:4em;" ><b><?php echo $authData['fname'];?></b><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                   <li><a href="<?php echo $logout; ?>"><b>LOGOUT</b></a></li>
                </ul>
             </li>
             <!-- END USER LOGIN DROPDOWN -->
          </ul>
       </nav>
       <!-- end .main-nav -->
       <a href="" class="responsive-menu-open"><i class="fa fa-bars"></i></a>
    </div>
    <!-- end .navigation -->
 </div>
 <!-- end .container -->
</header>
<!-- end .header -->
<div class="responsive-menu">
    <a href="" class="responsive-menu-close"><i class="ion-android-close"></i></a>
    <nav class="responsive-nav"></nav>
</div>
<!-- end .responsive-menu -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?=$this->webroot?>img/front/header_background.jpg" alt="" width="" height="100" class="img-responsive center-block ">
      </div>
    </div>
</div>