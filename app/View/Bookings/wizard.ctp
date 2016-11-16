<?php
//prd($authData);
echo $this->Html->css(array(
   //'front/style',
   'front/timeline',
   'front/components',
   'front/plugins'  
));

echo $this->Html->script(array(
  //'front/jquery-1.11.2.min',
   'front/jquery.bootstrap.wizard.min',
   'front/metronic',
   'front/layout',
   'front/quick-sidebar',
   'front/form-wizard'
));

echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>

<style>
         .comp{
         background: #428bca;
         border-radius: 50%;
         box-shadow: 0 0 0 8px #428bca;
         }
         .stepdone:before {
         content: '';
         position: absolute;
         top: 0;
         bottom: 0;
         width: 10px;
         background: #72c35d;
         left: 20%;
         margin-left: -10px;
         }
         .steppend:before {
         content: '';
         position: absolute;
         top: 0;
         bottom: 0;
         width: 10px;
         background: white;
         left: 20%;
         margin-left: -10px;
         }
         .timeline-content{
         color:black;
         }
         .timeline > li .timeline-body {
         margin: 0 0 15px 28%;}
         .timeline-body h2{color:black;font-size:15px;}
         .timeline-body h4{font-size:12px;color:black;}
      </style>
<div class="page-content">
   <div class="row">
      <div class="col-md-12">
         <div class="portlet box white" id="form_wizard_1">
            <div class="portlet-body form">
               <!-- <form action="#" class="form-horizontal" id="submit_form" method="POST"> -->
                  <div class="form-wizard">
                     <div class="form-body">
                        <ul class="nav nav-pills nav-justified steps">
                           <li>
                              <a href="#tab1" data-toggle="tab" class="step">
                              <span class="number">
                              1 </span>
                              <span class="desc">
                              <i class="fa fa-check"></i> YOUR DETAIL </span>
                              </a>
                           </li>
                           <li>
                              <a href="#tab2" data-toggle="tab" class="step">
                              <span class="number">
                              2 </span>
                              <span class="desc">
                              <i class="fa fa-check"></i> PACKAGES </span>
                              </a>
                           </li>
                           <li>
                              <a href="#tab3" data-toggle="tab" class="step active">
                              <span class="number">
                              3 </span>
                              <span class="desc">
                              <i class="fa fa-check"></i> DATE & TIME </span>
                              </a>
                           </li>
                           <li>
                              <a href="#tab4" data-toggle="tab" class="step">
                              <span class="number">
                              4 </span>
                              <span class="desc">
                              <i class="fa fa-check"></i> PAYMENT </span>
                              </a>
                           </li>
                           <li>
                              <a href="#tab5" data-toggle="tab" class="step">
                              <span class="number">
                              5 </span>
                              <span class="desc">
                              <i class="fa fa-check"></i> THANK YOU </span>
                              </a>
                           </li>
                        </ul>
                        <div id="bar" class="progress progress-striped" role="progressbar">
                           <div class="progress-bar progress-bar-success">
                           </div>
                        </div>
                        <div class="tab-content">
                           <!-- <div class="alert alert-danger display-none">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                           </div>

                           <div class="alert alert-success display-none">
                              <button class="close" data-dismiss="alert"></button>
                              Your form validation is successful!
                           </div> -->

                           <div class="tab-pane active" id="tab1">
                              <div class="row">
                                 <?php if(isset($authData['role']) && $authData['role']!=""){ //pr($authData);?>
                                     <!--Wanna Call Someone :P -->
                                     <!-- <div class="col-sm-4 col-md-4 user-details"> -->
                                     <div class="col-md-4 col-md-offset-4 user-details">
                                       <div class="user-image">
                                           <img alt="" src="<?php echo $this->Custom->imageUrl($authData['image'],WWW_ROOT.'images/users/');?>" class="img-circle" style="height:4em;" >
                                       </div>
                                       <div class="user-info-block">
                                           <div class="user-heading">
                                               <h3><?php echo ucfirst($authData['fname']);?></h3>
                                               <span class="help-block"><?php echo ucfirst($authData['address']);?></span>
                                           </div>
                                           
                                           <!-- <div class="user-body">
                                               <div class="tab-content">
                                                   <div id="information" class="tab-pane active">
                                                       <h4>Account Information</h4>
                                                   </div>
                                                   <div id="settings" class="tab-pane">
                                                       <h4>Settings</h4>
                                                   </div>
                                                   <div id="email" class="tab-pane">
                                                       <h4>Send Message</h4>
                                                   </div>
                                                   <div id="events" class="tab-pane">
                                                       <h4>Events</h4>
                                                   </div>
                                               </div>
                                           </div> -->
                                       </div>
                                     </div> 
                                 <?php }else{ ?>
                                    <div class="col-sm-6" style="margin-left:5%;">
                                       <?php  
                                          echo $this->Form->create('User',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));
                                          echo $this->Form->hidden('role',array('value'=>3));
                                          echo $this->Form->hidden('from',array('value'=>"wizard"));
                                          echo $this->Form->hidden('id');
                                       ?>
                                       <h3 class="block">NEW STUDENT</h3>
                                       <div class="form-group">
                                          <label class="col-sm-offset-1">Detail Of Person taking lesson<span class="required">
                                          * </span></label>
                                          <div class="input-group">
                                             <div class="col-md-5 col-sm-offset-1">
                                                <!-- <input type="text" class="form-control" name="username" placeholder="Enter User Name"/> -->
                                                <?php echo $this->Form->input('fname',array('label'=>false,'div'=>false,'placeholder'=>'Full Name','class'=>'fname form-control'));?>
                                             </div>
                                             <div class="col-md-5">
                                                <!-- <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name"/> -->
                                                <?php echo $this->Form->input('email',array('label'=>false,'div'=>false,'placeholder'=>'Email','class'=>'lname form-control'));?>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- <div class="form-group">
                                          <label class="col-sm-offset-1">Email <span class="required">
                                          * </span>
                                          </label>
                                          <div class="input-group col-sm-offset-1 col-md-8">
                                             <?php echo $this->Form->input('email',array('label'=>false,'div'=>false,'placeholder'=>'Email','class'=>'fname form-control'));?>
                                          </div>
                                       </div> -->
                                       <div class="form-group">
                                          <label class="col-sm-offset-1">Password <span class="required">
                                          * </span>
                                          </label>
                                          <div class="input-group col-sm-offset-1 col-md-8">
                                             <?php echo $this->Form->input('password',array('label'=>false,'div'=>false,'placeholder'=>'Password','class'=>'form-control'));?>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <label class="col-sm-offset-1">Confirm Password 
                                          </label>
                                          <div class="input-group col-sm-offset-1 col-md-8">
                                             <!-- <input type="text" class="form-control" name="address"/> -->
                                             <?php echo $this->Form->input('cpassword',array('label'=>false,'div'=>false,'placeholder'=>'Password','class'=>'form-control','type'=>'password'));?>
                                          </div>
                                       </div>
                                       <!-- <div class="form-group">
                                          <div class="row ">
                                             <div class="input-group  col-sm-offset-1">
                                                <div class="col-md-6">
                                                   <input type="text" class="form-control" name="username" placeholder="Street Address Line 2"/>
                                                </div>
                                                <div class="col-md-5">
                                                   <input type="text" class="form-control" name="lastname" placeholder="State / Province"/>
                                                </div>
                                             </div>
                                          </div>
                                       </div> -->
                                       <?php echo $this->Form->end();?> 
                                    </div>
                                    <div class="col-sm-5">
                                       <blockquote>
                                          <?php  
                                            echo $this->Form->create('User',array('id'=>'UserWizardFormLogin','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));
                                          ?>
                                          <h3 class="block">Existing Student</h3>
                                          <div class="">
                                             <div class="form-group">
                                                <label class="col-sm-offset-1">Email 
                                                </label>
                                                <div class="input-group col-sm-offset-1 col-md-8">
                                                   <!-- <input type="text" class="form-control" name="email"/> -->
                                                   <?php 
                                                   echo $this->Form->hidden('role',array('value'=>3));
                                                   echo $this->Form->input('email',array('label'=>false,'div'=>false,'placeholder'=>'Email','class'=>'lname form-control'));?>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="col-sm-offset-1">Password                                    </label>
                                                <div class="input-group col-sm-offset-1 col-md-8">
                                                   <!-- <input type="password" class="form-control"  placeholder="password"/> -->
                                                   <?php echo $this->Form->input('password',array('label'=>false,'div'=>false,'placeholder'=>'Password','class'=>'form-control'));?>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="input-group col-sm-offset-1 col-md-8">
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <a href="javascript:;" class="btn green login">
                                                         Login <i class="m-icon-swapright m-icon-white"></i>
                                                         </a>
                                                      </div>
                                                      <div class="col-sm-6 pul-right">
                                                         <a href="javascript:;" style="color:green;font-size:12px;">
                                                         Forget Password
                                                         </a>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <?php echo $this->Form->end();?> 
                                       </blockquote>
                                    </div>
                                 <?php }?>
                                 
                              </div>
                           </div>

                           <div class="tab-pane" id="tab2">
                              <?php $change_trainer = Router::url(array('controller' => 'bookings', 'action' => 'change_trainer'));?>
                              <h3 class="block">SELECT PACKAGES</h3>
                              <div class="form-group">
                                 <div class="row">
                                    <div class="col-md-4 col-sm-offset-1">
                                       <?php foreach($driverData['Package'] as $k=>$v){ ?>
                                          <div class="panel panel-default">
                                             <div class="panel-body">
                                                <h4><input type="radio" name="radio" /> <?php echo $v['title'];?> - <span><?php echo $v['duration'];?> minutes</span></h4>
                                             </div>
                                          </div>
                                       <?php  } ?>
                                       <!-- <div class="panel panel-default">
                                          <div class="panel-body">
                                             <h4><input type="radio" name="radio" /> Gold PACKAGES - <span>90 minutes</span></h4>
                                          </div>
                                       </div>
                                       <div class="panel panel-default">
                                          <div class="panel-body">
                                             <h4><input type="radio" name="radio" /> Gold PACKAGES - <span>90 minutes</span></h4>
                                          </div>
                                       </div>
                                       <div class="panel panel-default">
                                          <div class="panel-body">
                                             <h4><input type="radio" name="radio" /> Gold PACKAGES - <span>90 minutes</span></h4>
                                          </div>
                                       </div>
                                       <div class="panel panel-default">
                                          <div class="panel-body">
                                             <h4><input type="radio" name="radio" /> Gold PACKAGES - <span>90 minutes</span></h4>
                                          </div>
                                       </div>
                                       <div class="panel panel-default">
                                          <div class="panel-body">
                                             <h4><input type="radio" name="radio" /> Gold PACKAGES - <span>90 minutes</span></h4>
                                          </div>
                                       </div>
                                       <div class="panel panel-default">
                                          <div class="panel-body">
                                             <h4><input type="radio" name="radio" /> Gold PACKAGES - <span>90 minutes</span></h4>
                                          </div>
                                       </div> -->
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                       <blockquote>
                                          <ul class="timeline">
                                             <li class="timeline-white stepdone">
                                                <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                   <i class="glyphicon glyphicon-ok"></i>
                                                </div>
                                                <div class="timeline-body">
                                                   <h2>Selected Instructor</h2>
                                                   <div class="timeline-content">
                                                      <img alt="" src="<?php echo $this->Custom->imageUrl($driverData['User']['image'],WWW_ROOT.'images/users/');?>" class="timeline-img pull-left" style="" >  <?php echo ucfirst($driverData['User']['fname']);?>
                                                      <!-- <img class="timeline-img pull-left" src="<?php echo $this->webroot?>img/front/avatar-1.jpg" alt="">  onion corn plantain garbanzo. -->
                                                      <br><span><a href="<?php echo $change_trainer;?>">Change Instructor </a></span>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="timeline-white steppend">
                                                <div class="timeline-icon">
                                                   <i class="glyphicon glyphicon-ok"></i>
                                                </div>
                                                <div class="timeline-body">
                                                   <h3>Selected PACKAGES</h3>
                                                </div>
                                             </li>
                                          </ul>
                                       </blockquote>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- TAb 3 start -->
                           <div class="tab-pane" id="tab3">
                              <h3 class="block">SELECT DATE & TIME</h3>
                              <div class="row">
                                 <div class="col-md-4 col-sm-offset-1" style="border-left:1px grove gray;">
                                    <div class="row">
                                       <div class="form-group">
                                          <label class="col-sm-offset-1">SELECT DATE</label>
                                          <div class="input-group">
                                             <div class="col-md-6 col-sm-offset-1">
                                                <input type="DATE" class="form-control">
                                             </div>
                                             <div class="col-md-5">
                                                <input type="date" class="form-control">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-offset-1">SELECT  TIME</label>
                                          <div class="input-group">
                                             <div class="col-md-5 col-sm-offset-1">
                                                <input type="time" class="form-control" >
                                             </div>
                                             <div class="col-md-5">
                                                <input type="time" class="form-control" >
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-5 ">
                                    <blockquote>
                                       <ul class="timeline">
                                          <li class="timeline-white stepdone">
                                             <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Selected Instructor</h2>
                                                <div class="timeline-content">
                                                   <img class="timeline-img pull-left" src="<?php echo $this->webroot?>img/front/avatar-1.jpg" alt="">  onion corn plantain garbanzo.
                                                   <br><span><a href="">Change Instructor  </a></span>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="timeline-white stepdone">
                                             <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Selected PACKAGE</h2>
                                                <div class="timeline-content">
                                                   onion corn plantain garbanzo.
                                                   <br>
                                                   <h6 style="width:30%;">   <span><a href="">Change package </a></span>
                                                   </h6>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="timeline-white steppend">
                                             <div class="timeline-icon">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Selected Date & Time</h2>
                                             </div>
                                          </li>
                                       </ul>
                                    </blockquote>
                                 </div>
                              </div>
                           </div>
                           <!--  end TAb 3 -->
                           <!-- TAb 4 -->
                           <div class="tab-pane" id="tab4">
                              <h3 class="block">SELECT PAYMENT</h3>
                              <div class="row">
                                 <div class="col-sm-5 col-sm-offset-1">
                                    <div class="row">
                                       <div class="form-group">
                                          <label class="col-sm-offset-1">Name On Credit Card  
                                          </label>
                                          <div class="input-group col-sm-offset-1 col-md-8">
                                             <input type="text" class="form-control" name="Name"/>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-offset-1">Card Number</label>
                                          <label class="col-sm-offset-1">Security Code</label>
                                          <div class="input-group">
                                             <div class="col-md-5 col-sm-offset-1">
                                                <input type="text" class="form-control">
                                             </div>
                                             <div class="col-md-5">
                                                <input type="text" class="form-control">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-offset-1">Expiry Month & Year</label>
                                          <div class="input-group">
                                             <div class="col-md-5 col-sm-offset-1">
                                                <select>
                                                   <option>Jan(01)</option>
                                                   <option>Feb(02)</option>
                                                   <option>Mar(03)</option>
                                                   <option>Apr(04)</option>
                                                   <option>May(05)</option>
                                                   <option>Jun(06)</option>
                                                   <option>Jul(07)</option>
                                                   <option>Aug(08)</option>
                                                   <option>Sep(09)</option>
                                                   <option>Oct(10)</option>
                                                   <option>Nov(11)</option>
                                                   <option>Dec(12)</option>
                                                </select>
                                             </div>
                                             <div class="col-md-5">
                                                <select>
                                                   <option>2016</option>
                                                   <option>2017</option>
                                                   <option>2018</option>
                                                   <option>2019</option>
                                                   <option>2020</option>
                                                   <option>2021</option>
                                                   <option>2022</option>
                                                   <option>2023</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-5 ">
                                    <blockquote>
                                       <ul class="timeline">
                                          <li class="timeline-white stepdone">
                                             <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Selected Instructor</h2>
                                                <div class="timeline-content">
                                                   <img class="timeline-img pull-left" src="<?php echo $this->webroot?>img/front/avatar-1.jpg" alt="">  onion corn plantain garbanzo.
                                                   <br><span><a href="">Change Instructor  </a></span>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="timeline-white stepdone">
                                             <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Selected PACKAGE</h2>
                                                <div class="timeline-content">
                                                   <h4>Silver PACKAGE</h4>
                                                   60 Minutes (6 lesson) <span style="color:#72c35d;">$555.00</span>
                                                   <br><span><a href="">Change package </a></span>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="timeline-white stepdone">
                                             <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Selected Date & Time</h2>
                                                <div class="timeline-content">
                                                   <h3 style="color:black;width:10%;">Date<span class="pul-right">Time</h3>
                                                   <h5 style="color:black;width:10%;">07/09/2016  <span class="pul-right">21:00</h5>
                                                   <br><span><a href="">Change package </a></span>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="timeline-white steppend">
                                             <div class="timeline-icon">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Select Payment</h2>
                                             </div>
                                          </li>
                                       </ul>
                                    </blockquote>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="tab-pane" id="tab5">
                              <div class="row">
                                 <div class="col-md-5 col-sm-offset-1">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">THANK YOU</label>
                                       <div class="col-md-4">
                                          <center>
                                             <h2>CONGRATULATION</h2>
                                             <h5>Your Booking has been submitted successfully</h5>
                                             <a href="#" class="btn btn-success">INBOX</a>
                                          </center>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-5">
                                    <blockquote>
                                       <ul class="timeline">
                                          <li class="timeline-white stepdone">
                                             <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Selected Instructor</h2>
                                                <div class="timeline-content">
                                                   <img class="timeline-img pull-left" src="<?php echo $this->webroot?>img/front/avatar-1.jpg" alt="">  onion corn plantain garbanzo.
                                                   <br><span><a href="">Change Instructor  </a></span>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="timeline-white stepdone">
                                             <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Selected PACKAGE</h2>
                                                <div class="timeline-content" >
                                                   <h4>Silver PACKAGE</h4>
                                                   60 Minutes (6 lesson) <span style="color:#72c35d;">$555.00</span>
                                                   <br><span><a href="">Change package </a></span>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="timeline-white stepdone">
                                             <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Selected Date & Time</h2>
                                                <div class="timeline-content">
                                                   <h4 style="color:black;width:25%;">Date<span class="pul-right">Time</h4>
                                                   <h5 style="color:black;width:25%;">07/09/2016  <span class="pul-right">21:00</h5>
                                                   <br><span><a href="">Change package </a></span>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="timeline-white steppdone">
                                             <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                <i class="glyphicon glyphicon-ok"></i>
                                             </div>
                                             <div class="timeline-body">
                                                <h2>Select Payment</h2>
                                             </div>
                                          </li>
                                       </ul>
                                    </blockquote>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                        <div class="form-actions fluid">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="col-md-offset-3 col-md-9">
                                    <a href="javascript:;" class="btn default button-previous">
                                    <i class="m-icon-swapleft"></i> Back </a>
                                    <a href="javascript:;" class="btn blue button-next continue">
                                    Continue <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                    <a href="javascript:;" class="btn green button-submit">
                                    Submit <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>                        
                     </div>
                  </div>   
               <!-- </form> -->
            </div>
         </div>
      </div>
   </div>
         <!-- END PAGE CONTENT-->
</div>
      

<script type="text/javascript">
      $(document).ready(function() {       
         // initiate layout and plugins
         /*Metronic.init(); // init metronic core components
         Layout.init(); // init current layout
         QuickSidebar.init() // init quick sidebar
         FormWizard.init();*/

         $(document).on('click','.continue',function(){
            $("#UserWizardForm").submit();
         })
         $(document).on('click','.btn.green.login',function(){
            $("#UserWizardFormLogin").submit();
         })
      });
</script>

<script type="text/javascript">
   var form = $("#UserWizardForm");
   var formLogin = $("#UserWizardFormLogin");
   //var isUser = "<?php echo isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == 3 ? true : false; ?>";
   //form.validate();
   form.on('submit', function(e){
        e.preventDefault();
        var isvalidate = form.valid();
        if(isvalidate)
        {
            //alert("Submited"); return false;
            var paramss = $(this).serialize();
         var URL = '<?php echo $this->Html->url(array("controller" => "users","action" => "register","full_base"=>false));?>';
         $.ajax({
               url : URL,
               type: "POST",
               data : paramss,
               dataType: 'json',
               beforeSend: function (XMLHttpRequest) {
               },
               complete: function (XMLHttpRequest, textStatus) {
                   //$("#reset_button").click();
               },
               success : function(data){
                  //console.log(data);
                  if(data.err ==0 ) {    
                     window.location = '<?php echo $this->Html->url(array("controller" => "bookings","action" => "wizard","full_base"=>false));?>';
                  }else{
                     var errorStr = '';
                     $.each(data.data,function(k,v){
                        errorStr += v+"<br><br>";
                     })
                     if(errorStr ) addMsg(errorStr,"alert alert-danger"); else addMsg(data.msg,"alert alert-danger"); 
                     //addMsg(data.msg,"alert alert-danger"); 
                  }
                   /*try {
                   var res = JSON.parse(data);
                      if(res.err ==0 ) {    
                           window.location = '<?php echo $this->Html->url(array("controller" => "pages","action" => "home","full_base"=>false));?>';
                      }else {
                      
                      } 
                   catch(error) {
                      $('#myModal').html(data);
                  }*/
               }
           }); 
        }
    });

   formLogin.on('submit', function(e){
        e.preventDefault();
        var isvalidate = formLogin.valid();
        if(isvalidate)
        {
            //alert("Submited"); return false;
            var paramss = $(this).serialize();
         var URL = '<?php echo $this->Html->url(array("controller" => "users","action" => "login","full_base"=>false));?>';
         $.ajax({
               url : URL,
               type: "POST",
               data : paramss,
               dataType: 'json',
               beforeSend: function (XMLHttpRequest) {
               },
               complete: function (XMLHttpRequest, textStatus) {
                   //$("#reset_button").click();
               },
               success : function(data){
                  //console.log(data);
                  if(data.err ==0 ) {    
                     window.location = '<?php echo $this->Html->url(array("controller" => "bookings","action" => "wizard","full_base"=>false));?>';
                  }else{
                     var errorStr = '';
                     $.each(data.data,function(k,v){
                        errorStr += v+"<br><br>";
                     })
                     if(errorStr ) addMsg(errorStr,"alert alert-danger"); else addMsg(data.msg,"alert alert-danger"); 
                     //addMsg(data.msg,"alert alert-danger"); 
                  }
                   /*try {
                   var res = JSON.parse(data);
                      if(res.err ==0 ) {    
                           window.location = '<?php echo $this->Html->url(array("controller" => "pages","action" => "home","full_base"=>false));?>';
                      }else {
                      
                      } 
                   catch(error) {
                      $('#myModal').html(data);
                  }*/
               }
           }); 
        }
    });
   
   $(".role").click(function(){
      $('#UserRole').val($(this).data('role'));
   })

   //if(isUser) $('.right1 .right').click();

   /*$('form').validate({ // initialize the plugin
       rules: {
           "data[User][fname]": {
               required: true,
               minlength: 5
           },
       },
       messages: {
         "data[User][fname]": {required:"This field is required.",minlength:"Field should have minimum 5 charecter."},
       }
   });*/

   /*$("form").validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: "div",
        errorPlacement: function(error, element) {
            error.appendTo("div.error-message");
        }, 
        rules: {
         ".fname":{
            required :true,
            minlength :5
         },
         ".email":{
            required :true,
            email :true
         },
         ".password" :{
            required :true
         }  
       },       
       messages: {
           ".fname":{
            required :"Please enter name",
            minlength :5
         },
         ".email":{
            required :"Please enter email",
            email : "Please enter valida email address."
         },
         ".password" :{
            required : "Please enter password"        
         }
       }
   });*/
</script>
