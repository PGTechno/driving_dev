<?php $paginator = $this->Paginator;
?>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active" style="margin-left:5%;width:90%;">
      <div class="row" style="margin-top:8%;">
         <div class="col-sm-12" style="margin-bottom:10%;">
            <div class="card-box">
               <?php foreach($data as $k=>$v){ 
                    
                    if($v['Message']['isSender']==1){
                        $imgUrl = $this->Custom->imageUrl($v['Sender']['image'],WWW_ROOT.'images/users/');
                        $class = 'pull-right';
                        $uname = $v['Sender']['fname'];
                    }else{
                        $imgUrl = $this->Custom->imageUrl($v['Receiver']['image'],WWW_ROOT.'images/users/');
                        $class = 'pull-left';
                        $uname = $v['Receiver']['fname'];
                    }    
                ?>
                    <div class="message col-md-12">
                        <div class="col-md-5 <?php echo $class;?>">    
                            <div class="user_icon">
                                <img alt="" src="<?php echo $imgUrl;?>" class="img-circle" style="height:5em;" >
                                <?php echo $uname;?>
                            </div>
                            <div class="user_msg"><?php echo $v['Message']['message'];?></div>
                            <div class="msg_date"><?php echo date('M d | H:i A',strtotime($v['Message']['created']))?></div>
                        </div>    
                    </div>

                    <!-- <div class="media" style="width:95%;" class="<?php echo $class;?>">
                        <a href="#" class="pull-left" >
                            <img alt="" src="<?php echo $imgUrl;?>" class="img-circle" style="height:5em;" >
                        </a>
                    <div >
                    
                    <h5  style="color: #124b6d;"><b><?php echo ucfirst($uname);?></b> <span class="pull-right">
                       <?php echo date('M d | H:i A',strtotime($v['Message']['created']))?>
                       </span>
                    </h5>
                        <div class="list-inline">
                            fsdf       
                        </div>
                        
                        <br>
                        <p class="col-md-6">
                           <?php echo $v['Message']['message'];?>
                        </p>
                     </div>
                     <hr style="height: 0;
                        border: 0;
                        border-top: 1px solid #eee;
                        margin: 20px 0;">
                  </div>     -->
               <?php } ?>

               <div class="pagination pagination-large" style="float:right;">
    <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
    </div>
               

               <!-- <div class="media" style="width:95%;">
                  <a href="#" class="pull-left" >
                  <img alt="" src="<?php echo $this->webroot?>img/front/avatar-1.jpg" class="img-circle" style="height:5em;" >
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
                  <hr style="height: 0;border: 0;border-top: 1px solid #eee;margin: 20px 0;">
               </div>

               <div class="media" style="width:95%;">
                  <a href="#" class="pull-left" >
                  <img alt="" src="<?php echo $this->webroot?>img/front/avatar-4.jpg" class="img-circle" style="height:5em;" >
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
                  <hr style="height: 0;border: 0;border-top: 1px solid #eee;margin: 20px 0;">
               </div>

               <div class="media" style="width:95%;">
                  <a href="#" class="pull-left" >
                  <img alt="" src="<?php echo $this->webroot?>img/front/avatar-4.jpg" class="img-circle" style="height:5em;" >
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
                  <hr style="height: 0;border: 0;border-top: 1px solid #eee;margin: 20px 0;">
               </div>

               <div class="media" style="width:95%;">
                    <a href="#" class="pull-left" >
                      <img alt="" src="<?php echo $this->webroot?>img/front/avatar-5.jpg" class="img-circle" style="height:5em;" >
                    </a>
                    <div >
                      <h5  style="color: #124b6d;"><b>Johnman Gray</b> <span class="pull-right"> April 25 | 2:30 PM </span> </h5>
                      <ul class="list-inline" >
                          <li><i class="fa fa-star fa fa-star star-colors star-colors" ></i></li>
                          <li><i class="fa fa-star fa fa-star star-colors star-colors"></i></li>
                          <li><i class="fa fa-star fa fa-star star-colors star-colors"></i></li>
                          <li><i class="fa fa-star fa fa-star star-colors star-colors"></i></li>
                          <li><i class="fa fa-star fa fa-star star-colors star-colors"></i></li>
                      </ul>
                      <br>
                      <p>
                          Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                      </p>
                  </div>
                  <hr style="height: 0;border: 0;border-top: 1px solid #eee;margin: 20px 0;">
                </div>

            <div class="media" style="width:95%;">
               <a href="#" class="pull-left" >
               <img alt="" src="<?php echo $this->webroot?>img/front/avatar-5.jpg" class="img-circle" style="height:5em;" >
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
               <hr style="height: 0;border: 0;border-top: 1px solid #eee;margin: 20px 0;">
            </div>

            <div class="media" style="width:95%;">
               <a href="#" class="pull-left" >
               <img alt="" src="<?php echo $this->webroot?>img/front/avatar-5.jpg" class="img-circle" style="height:5em;" >
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
            </div> -->
         </div>
      </div>
  </div>
</div>

<style type="text/css">
.rating-container .filled-stars{
   color: #72c35d;
   
}
</style>

<script type="text/javascript">
   $('.rating').rating('create', {disabled: true, showClear: false, showCaption: false,size:'sm'});
</script>