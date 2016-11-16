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
                                       <label class="col-sm-3 control"><b>Full Name</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('fname',array('class'=>'form-control','placeholder'=>'Name','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>E-Mail Address</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'Email','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Address</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('address',array('class'=>'form-control','placeholder'=>'Address','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Country</b></label>
                                       <div class="col-sm-6">
                                          <?php 
                                          echo $this->Form->input('country',array('options' => $country,'class'=>'form-control','placeholder'=>'Name','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>
                                    <!----<div class="form-group">
                                       <label class="col-sm-3 control-label">Country</label>
                                       <div class="col-sm-6">
                                          <select class="form-control select2"> &nbsp;&nbsp;&nbsp;&nbsp;
                                          <option  >Select</option>
                                          <optgroup label="Alaskan/Hawaiian Time Zone">
                                             <option value="AK">Alaska</option>
                                             <option value="HI">Hawaii</option>
                                          </optgroup>
                                          <optgroup label="Pacific Time Zone">
                                             <option value="CA">California</option>
                                             <option value="NV">Nevada</option>
                                             <option value="OR">Oregon</option>
                                             <option value="WA">Washington</option>
                                          </optgroup>
                                          <optgroup label="Mountain Time Zone">
                                             <option value="AZ">Arizona</option>
                                             <option value="CO">Colorado</option>
                                             <option value="ID">Idaho</option>
                                             <option value="MT">Montana</option>
                                             <option value="NE">Nebraska</option>
                                             <option value="NM">New Mexico</option>
                                             <option value="ND">North Dakota</option>
                                             <option value="UT">Utah</option>
                                             <option value="WY">Wyoming</option>
                                          </optgroup>
                                          <optgroup label="Central Time Zone">
                                             <option value="AL">Alabama</option>
                                             <option value="AR">Arkansas</option>
                                             <option value="IL">Illinois</option>
                                             <option value="IA">Iowa</option>
                                             <option value="KS">Kansas</option>
                                             <option value="KY">Kentucky</option>
                                             <option value="LA">Louisiana</option>
                                             <option value="MN">Minnesota</option>
                                             <option value="MS">Mississippi</option>
                                             <option value="MO">Missouri</option>
                                             <option value="OK">Oklahoma</option>
                                             <option value="SD">South Dakota</option>
                                             <option value="TX">Texas</option>
                                             <option value="TN">Tennessee</option>
                                             <option value="WI">Wisconsin</option>
                                          </optgroup>
                                          <optgroup label="Eastern Time Zone">
                                             <option value="CT">Connecticut</option>
                                             <option value="DE">Delaware</option>
                                             <option value="FL">Florida</option>
                                             <option value="GA">Georgia</option>
                                             <option value="IN">Indiana</option>
                                             <option value="ME">Maine</option>
                                             <option value="MD">Maryland</option>
                                             <option value="MA">Massachusetts</option>
                                             <option value="MI">Michigan</option>
                                             <option value="NH">New Hampshire</option>
                                             <option value="NJ">New Jersey</option>
                                             <option value="NY">New York</option>
                                             <option value="NC">North Carolina</option>
                                             <option value="OH">Ohio</option>
                                             <option value="PA">Pennsylvania</option>
                                             <option value="RI">Rhode Island</option>
                                             <option value="SC">South Carolina</option>
                                             <option value="VT">Vermont</option>
                                             <option value="VA">Virginia</option>
                                             <option value="WV">West Virginia</option>
                                          </optgroup>
                                       </select>
                                       
                                       
                                       </div>
                                       </div>---->
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Postcode</b></label>
                                       <div class="col-sm-6">
                                          <?php echo $this->Form->input('zip',array('class'=>'form-control','placeholder'=>'Postcode','div'=>false,'label'=>false));?>
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
                                    <?php if($authData['role']==2) {?>
                                    <div class="form-group">
                                       <label class="col-sm-3 control"><b>Working Hours</b></label>
                                       <div class="col-sm-3">
                                          <?php echo $this->Form->input('start_time',array('class'=>'form-control time','type'=>'text','placeholder'=>'From','div'=>false,'label'=>false));?>
                                       </div>
                                       <div class="col-sm-3">
                                          <?php echo $this->Form->input('end_time',array('class'=>'form-control time','type'=>'text','placeholder'=>'To','div'=>false,'label'=>false));?>
                                       </div>
                                    </div>
                                    <?php } ?>
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
                                       <label class="col-sm-3 control">Picture</label>
                                       <div class="col-sm-6">
                                          <a href="#"><img  src="<?php echo $this->Custom->imageUrl($this->request->data['User']['image'],WWW_ROOT.'images/users/');?>" alt="image" class="img-responsive img-rounded file_upload" width="150"/></a>
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

