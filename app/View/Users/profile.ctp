<div class="tab-content">
   <div id="menu1" class="tab-pane fade fade in active">
      <div id="home" class="tab-pane fade in active ">
         <div class="fixed-left" style="margin-left:5%;margin-top:1%; width:90%;">
            <div class="row">
               <div class="col-sm-12">
                  <div class="card-box">
                     <div class="row">
                        <div >
                           <!-- Users tab -->
                           <div class="tab-pane" id="users">
                              <div class="search-item">
                                 <div style="margin-left:85%;margin-top:6%;">
                                    <img src="<?php echo $this->webroot?>img/front/facebook_dash.png">&nbsp;&nbsp;<img src="<?php echo $this->webroot?>img/front/google_plus_dash.png">&nbsp;&nbsp;<img src="<?php echo $this->webroot?>img/front/twitter_dash.png">
                                 </div>
                                 <div class="media" style="margin-top:-7%;margin-left:2%;">
                                    <div class="media-body" >
                                       <div class="media-left">
                                          <a href="#"> 
                                             <img class="media-object img-thumbnail file_upload" alt="64x64" src="<?php echo $this->Custom->imageUrl($this->request->data['User']['image'],WWW_ROOT.'images/users/');?>" style="width: 150px; height: 170px; ">                                              
                                          </a>
                                       </div>
                                       <div class="media-left" >
                                          <h4 class="media-heading" ><a href="#" class="text-muted" style="color: #124b6d;"><?php echo $this->request->data['User']['fname'];?></a></h4>
                                          <p>
                                             <b>Email:</b> 
                                             <span><a href="#" class="text-muted"><?php echo $this->request->data['User']['email'];?></a></span><br>
                                             <b>Location:</b> 
                                             <span><a href="#" class="text-muted"><?php echo $this->request->data['User']['address'].' '.$this->request->data['User']['state'];?></a></span><br>
                                             <b>Member Since</b>
                                             <span class="text-muted"><?php echo date('M Y',strtotime($this->request->data['User']['created']));?></span><br>
                                             <b>Working Hours</b> 
                                             <span class="text-muted"><?php echo date('h:i A',strtotime($this->request->data['User']['start_time']))." to ".date('h:i A',strtotime($this->request->data['User']['end_time']))?></span>
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <hr class="hr-line1">
            <div class ="container">
               <div class="row">
                  <br>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card-box">
                           <div class="row">
                              <?php echo $this->Form->create('User',array('class'=>'form-horizontal','enctype'=>'multipart/form-data')); ?>
                              <div class="col-lg-6">
                                 <!-- <form class="form-horizontal group-border-dashed" action="#"> -->
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>First Name</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('fname',array('class'=>'form-control','placeholder'=>'First Name','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Last Name</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('lname',array('class'=>'form-control','placeholder'=>'Last Name','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>E-Mail Address</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'Email','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Gender</b></label>
                                       <div class="col-sm-6">
                                          <?php 
                                          echo $this->Form->input('gender',array('options' => array(1=>'Male',2=>'Female'),'class'=>'form-control','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Address</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('address',array('class'=>'form-control','placeholder'=>'Line 1','div'=>false,'label'=>false));?>
                                          <br>
                                          <?php echo $this->Form->input('address1',array('class'=>'form-control','placeholder'=>'Line 2','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>City</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('city',array('class'=>'form-control','placeholder'=>'City','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Country</b></label>
                                       <div class="col-sm-6">
                                          <?php 
                                          echo $this->Form->input('country',array('options' => $country,'class'=>'form-control','placeholder'=>'Name','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Postcode</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('zip',array('class'=>'form-control','placeholder'=>'Postcode','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Phone</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('phone',array('class'=>'form-control','placeholder'=>'Phone','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>About Me</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('aboutme',array('class'=>'form-control','type'=>'textarea','placeholder'=>'Abount Me','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-offset-3 control">
                                          <div class="col-sm-6">
                                             <input type="submit" value="Update"  style="background-color:#72c35d; color:white;width:60%;border-radius:5%;margin-left:2%;border:none;">
                                          </div>
                                       </div>
                                    </div>
                                 <!-- </form> -->
                              </div>
                              <div class="col-lg-6">
                                 <!-- <form class="form-horizontal group-border-dashed" action="#"> -->
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Cars</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('Car', array(
                                             'multiple' => 'multiple',
                                             'type' => 'select',
                                             'options'=>$cars,
                                             'div'=>false,'label'=>false
                                          ));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Service</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('Service', array(
                                             'multiple' => 'multiple',
                                             'type' => 'select',
                                             'options'=>$services,
                                             'div'=>false,'label'=>false
                                          ));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Drive Experience</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('DriveExperience', array(
                                             'multiple' => 'multiple',
                                             'type' => 'select',
                                             'options'=>$drive_experiences,
                                             'div'=>false,'label'=>false
                                          ));?>
                                       </div>
                                    </div>

                                    <?php if($authData['role']==2) {?>
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Company Name</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('company_name',array('class'=>'form-control','placeholder'=>'Company Name','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Working Hours</b></label>
                                       <div class="col-sm-3">
                                          <?php echo $this->Form->input('start_time',array('class'=>'form-control time','type'=>'text','placeholder'=>'From','div'=>false,'label'=>false));?>
                                       </div>
                                       <div class="col-sm-3">
                                          <?php echo $this->Form->input('end_time',array('class'=>'form-control time','type'=>'text','placeholder'=>'To','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Hourly Rate</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('hourly_rate',array('class'=>'form-control','placeholder'=>'Hourly Rate','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Facebook URL</b></label>
                                       <div class="col-sm-6">
                                          <!-- <input parsley-type="url" type="url" class="form-control" required placeholder="www.facebook.com/chadengle" /> -->
                                          <?php echo $this->Form->input('fburl',array('class'=>'form-control','placeholder'=>'www.facebook.com/chadengle','div'=>false,'label'=>false,'parsley-type'=>"url"));?>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Twitter URL</b></label>
                                       <div class="col-sm-6">
                                          <!-- <input parsley-type="url" type="url" class="form-control" required placeholder="www.twitter.com/chadengle" /> -->
                                          <?php echo $this->Form->input('twitterurl',array('class'=>'form-control','placeholder'=>'www.facebook.com/chadengle','div'=>false,'label'=>false,'parsley-type'=>"url"));?>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Google+ URL</b></label>
                                       <div class="col-sm-6">
                                          <!-- <input parsley-type="url" type="url" class="form-control" required placeholder="www.google.com/chadengle" /> -->
                                          <?php echo $this->Form->input('googleurl',array('class'=>'form-control','placeholder'=>'www.facebook.com/chadengle','div'=>false,'label'=>false,'parsley-type'=>"url"));?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Website</b></label>
                                       <div class="col-sm-6">
                                          <!-- <input parsley-type="url" type="url" class="form-control" required placeholder="www.google.com/chadengle" /> -->
                                          <?php echo $this->Form->input('website',array('class'=>'form-control','placeholder'=>'http://www.xyz.com','div'=>false,'label'=>false,'parsley-type'=>"url"));?>
                                       </div>
                                    </div>


                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>ADI Certificate</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->file('adi_certificate_file',array('class'=>'form-control','div'=>false,'label'=>false));
                                             echo $this->Form->hidden('adi_certificate',array());
                                             echo $this->Form->error('User.adi_certificate_file', null, array('class' => 'error-message'));
                                          ?>
                                       </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>D/L</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->file('driving_licence_file',array('class'=>'form-control','div'=>false,'label'=>false));
                                             echo $this->Form->hidden('driving_licence',array());
                                             echo $this->Form->error('User.driving_licence_file', null, array('class' => 'error-message'));
                                          ?>
                                       </div>
                                    </div>

                                   

                                    

                                    

                                    
                                    <div class="form-group">
                                       <label class="col-sm-3 control">Picture</label>
                                       <div class="col-sm-6">
                                          <a href="#"><img  src="<?php echo $this->Custom->imageUrl($this->request->data['User']['image'],WWW_ROOT.'images/users/');?>" alt="image" class="img-responsive img-rounded file_upload" width="150"/></a>
                                          <?php echo $this->Form->error('User.user_image', null, array('class' => 'error-message'));?>
                                       </div>                                       
                                    </div>
                              </div>
                              <?php 
                              echo  $this->Form->hidden('image');
                              echo  $this->Form->hidden('state');
                              echo  $this->Form->hidden('created');
                              echo  $this->Form->file('user_image',array('style'=>'display:none','class'=>'file_upload_hidden'));
                              echo $this->Form->end(); ?>
                              <!-- </form> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>            
</div>

