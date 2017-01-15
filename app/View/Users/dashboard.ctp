   <div class="tab-content">
         <div id="home" class="tab-pane fade in active" style="margin-left:5%;">
            <div class="fixed" style="margin-top:-6%;">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card-box">
                        <div class="row">
                           <br>
                           <!-- Users tab -->
                           <div class="tab-pane" id="users">
                              <div class="tab-pane" id="users">
                                 <div class="search-item">
                                    <div style="margin-left:80%;margin-top:6%;">
<!--
                                       <img src="<?=$this->webroot?>img/front/facebook_dash.png">&nbsp;&nbsp;<img src="<?=$this->webroot?>img/front/google_plus_dash.png">&nbsp;&nbsp;<img src="<?=$this->webroot?>img/front/twitter_dash.png">-->
                                    </div>
                                    <div class="media" style="margin-top:-7%;">
                                       <div class="media-body" >
                                          <div class="media-left">
                                             <a href="#"> <img class="media-object img-thumbnail" alt="64x64" src="<?php echo $this->Custom->imageUrl($authData['image'],WWW_ROOT.'images/users/');?>" style="width: 150px; height: 170px; "> </a>
                                          </div>
                                          <div class="media-left" >
                                             <h4 class="media-heading" ><a href="#" class="text-muted" style="color: #124b6d;" ><?php echo $authData['fname'].' '.$authData['lname'];?></a></h4>
                                             <p>
                                                <b>Email:</b> 
                                                <span><a href="#" class="text-muted"><?php echo $authData['email'];?></a></span><br>
                                                <b>Location:</b> 
                                                <span><a href="#" class="text-muted"><?php echo $authData['address']." ".$authData['state'];?></a></span><br>
                                                <b>Member Since</b>
                                                <span class="text-muted"><?php echo date('M Y',strtotime($authData['created']));?></span><br>
                                                <?php if($authData['role']==2){ ?>
                                    <b>Working Hours</b> 
                                                <span class="text-muted"><?php echo date('h:i A',strtotime($authData['start_time']))." to ".date('h:i A',strtotime($authData['end_time']))?></span>
<?php }?>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                    <br><br>
                                    <?php if($authData['role']==2){ ?>
                                       <div class="row">
                                          <div class="col-md-7">
                                             <h4 class="" style="color: #124b6d;"><b>Stats</b></h4>
                                             <hr class="hr-line1">
                                             <div class="row">
                                                <div class="col-sm-4">
                                                   <div class="panel panel-default">
                                                      <div class="panel-body">
                                                         <div class="media">
                                                            <h5>
                                                               <img src="<?=$this->webroot?>img/front/total_booking.png"><span style="color:#124b6d;font-size:22px;margin-left:5%;"><b>115</b></span>
                                                               <p style="margin-top:5%;color:#124b6d;"><b>Total Bookings</b></p>
                                                            </h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-sm-4">
                                                   <div class="panel panel-default">
                                                      <div class="panel-body">
                                                         <div class="media" >
                                                            <h5>
                                                               <img src="<?=$this->webroot?>img/front/happy_customer.png"><span style="color:#124b6d;font-size:22px;margin-left:5%;"><b>56</b></span>
                                                               <p style="margin-top:5%;color:#124b6d;"><b>Happy Customer</b></p>
                                                            </h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-sm-4">
                                                   <div class="panel panel-default">
                                                      <div class="panel-body">
                                                         <div class="media">
                                                            <h5>
                                                               <img src="<?=$this->webroot?>img/front/customer_review.png"><span style="color:#124b6d;font-size:22px;margin-left:5%;"><b>513</b></span>
                                                               <p style="margin-top:5%;color:#124b6d;"><b> Customers Reviews</b></p>
                                                            </h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <h4 class="" style="color:#124b6d;"><b>Reviews</b></h4>
                                             <hr class="hr-line1">
                                             <div class="media" style="width:95%;">
                                                <a href="#" class="pull-left">
                                                <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:5em;" >
                                                </a>
                                                <div >
                                                   <h5  style="color: #124b6d;"><b>Johnman Gray</b> <span class="pull-right">
                                                      April 25 | 2:30 PM
                                                      </span>
                                                   </h5>
                                                   <ul class="list-inline" >
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors star-colors" ></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors star-colors"></i>
                                                      </li>
                                                   </ul>
                                                   <br>
                                                   <p>
                                                      Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                                   </p>
                                                </div>
                                                <hr style="height: 0;
                                                   border: 0;
                                                   border-top: 1px solid #eee;
                                                   margin: 20px 0;">
                                             </div>
                                             <div class="media" style="width:95%;">
                                                <a href="#" class="pull-left">
                                                <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:5em;" >
                                                </a>
                                                <div >
                                                   <h5  style="color: #124b6d;"><b>Johnman Gray</b> <span class="pull-right">
                                                      April 25 | 2:30 PM
                                                      </span>
                                                   </h5>
                                                   <ul class="list-inline">
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors fa fa-star fa fa-star star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors fa fa-star fa fa-star star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors fa fa-star fa fa-star star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors fa fa-star fa fa-star star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors fa fa-star fa fa-star star-colors"></i>
                                                      </li>
                                                   </ul>
                                                   <br>
                                                   <p>
                                                      Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                                   </p>
                                                </div>
                                                <hr style="height: 0;border: 0;border-top: 1px solid #eee;margin: 20px 0;">
                                             </div>
                                             <div class="media" style="width:95%;">
                                                <a href="#" class="pull-left">
                                                <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:5em;" >
                                                </a>
                                                <div >
                                                   <h5  style="color: #124b6d;"><b>Johnman Gray</b> <span class="pull-right">
                                                      April 25 | 2:30 PM
                                                      </span>
                                                   </h5>
                                                   <ul class="list-inline">
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors"></i>
                                                      </li>
                                                      <li>
                                                         <i class="fa fa-star fa fa-star star-colors"></i>
                                                      </li>
                                                   </ul>
                                                   <br>
                                                   <p>
                                                      Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="" style="color:#124b6d;"><b>Notification</b></h4>
                                             <hr style="height: 0;border: 0;border-top: 1px solid #eee;margin: 20px 0;">
                                             <div class="row">
                                                <div class="panel panel-default" >
                                                   <div class="panel-body" style="border-radius: 10px;">
                                                      <div class="media" >
                                                         <a href="#" class="pull-left">
                                                         <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:2em;" >
                                                         </a>
                                                         <div>
                                                            <h5 class="note-color text-note-color">Johnman Gray<span class="pull-right" style="color:gray">
                                                               05/05/2016
                                                               </span>
                                                            </h5>
                                                            <p style="font-size:15px;">
                                                               Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="panel panel-default">
                                                   <div class="panel-body">
                                                      <div class="media" >
                                                         <a href="#" class="pull-left">
                                                         <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:2em;" >
                                                         </a>
                                                         <div >
                                                            <h5 class="note-color text-note-color">Johnman Gray <span class="pull-right"style="color:gray">
                                                               05/05/2016
                                                               </span>
                                                            </h5>
                                                            <p style="font-size:15px;">
                                                               Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="panel panel-default">
                                                   <div class="panel-body">
                                                      <div class="media" >
                                                         <a href="#" class="pull-left">
                                                         <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:2em;" >
                                                         </a>
                                                         <div >
                                                            <h5 class="note-color text-note-color">Johnman Gray<span class="pull-right" style="color:gray">
                                                               05/05/2016
                                                               </span> 
                                                            </h5>
                                                            <p style="font-size:15px;">
                                                               Donec id elit non mi porta gravida at eget metus.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    <?php }else{ ?>
                                       <div class="row">
                                             <div class="col-md-7">
                                                <h4 class="" style="color:#124b6d;"><b>About me</b></h4>
                                                <hr style="height: 0;
                                                   border: 0;
                                                   border-top: 1px solid #eee;
                                                   margin: 20px 0;">
                                                <div class="row">
                                                   <div class="col-sm-12">
                                                      <div class="media">
                                                         <?php echo $authData['aboutme'];?>
                                                         <!-- <p>   
                                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                                         </p>
                                                         <p>   
                                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                                            Donec sed odio dui.
                                                         </p> -->
                                                         </h4>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-sm-4">
                                                <h4 class="" style="color:#124b6d;"><b>Notification</b></h4>
                                                <hr style="height: 0;border: 0;border-top: 1px solid #eee;margin: 20px 0;">
                                                <div class="row pull-left" style="margin-left:4%;">
                                                   <div class="panel panel-default" >
                                                      <div class="panel-body" style="border-radius: 10px;">
                                                         <div class="media" >
                                                            <a href="#" class="pull-left">
                                                            <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:2em;" >
                                                            </a>
                                                            <div >
                                                               <h5 class="note-color text-note-color">Johnman Gray<span class="pull-right" style="color:gray">
                                                                  05/05/2016
                                                                  </span>
                                                               </h5>
                                                               <p style="font-size:15px;">
                                                                  accept your request for lesson. 2/22/2016
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="panel panel-default" >
                                                      <div class="panel-body" style="border-radius: 10px;">
                                                         <div class="media" >
                                                            <a href="#" class="pull-left">
                                                            <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:2em;" >
                                                            </a>
                                                            <div >
                                                               <h5 class="note-color text-note-color">Johnman Gray<span class="pull-right" style="color:gray">
                                                                  05/05/2016
                                                                  </span>
                                                               </h5>
                                                               <p style="font-size:15px;">
                                                                  Send you a message.05/05/2016
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="panel panel-default" >
                                                      <div class="panel-body" style="border-radius: 10px;">
                                                         <div class="media" >
                                                            <a href="#" class="pull-left">
                                                            <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:2em;" >
                                                            </a>
                                                            <div>
                                                               <h5 class="note-color text-note-color">Johnman Gray<span class="pull-right" style="color:gray">
                                                                  05/05/2016
                                                                  </span>
                                                               </h5>
                                                               <p style="font-size:15px;">
                                                                  accept your request for lesson 2/22/2016
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="panel panel-default">
                                                      <div class="panel-body">
                                                         <div class="media" >
                                                            <a href="#" class="pull-left">
                                                            <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:2em;" >
                                                            </a>
                                                            <div >
                                                               <h5 class="note-color text-note-color">Johnman Gray <span class="pull-right"style="color:gray">
                                                                  05/05/2016
                                                                  </span>
                                                               </h5>
                                                               <p style="font-size:15px;">
                                                                  accept your request for lesson 2/22/2016
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="panel panel-default">
                                                      <div class="panel-body">
                                                         <div class="media" >
                                                            <a href="#" class="pull-left">
                                                            <img alt="" src="<?=$this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:2em;" >
                                                            </a>
                                                            <div >
                                                               <h5 class="note-color text-note-color">Johnman Gray<span class="pull-right" style="color:gray">
                                                                  05/05/2016
                                                                  </span> 
                                                               </h5>
                                                               <p style="font-size:15px;">
                                                                  Send you a message.05/05/2016
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                       </div>
                                    <?php }?>
                                    
                                 </div>
                              </div>
                           </div>
                           <!----USER END------>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
   </div>

