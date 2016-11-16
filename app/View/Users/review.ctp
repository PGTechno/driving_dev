<?php $paginator = $this->Paginator;
?>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active" style="margin-left:5%;width:90%;">
      <div class="row" style="margin-top:8%;">
         <div class="col-sm-12" style="margin-bottom:10%;">
            <div class="card-box">
               <?php foreach($data as $k=>$v){ //prd($v);?>
                   <div class="media" style="width:95%;">
                     <a href="#" class="pull-left" >
                     <img alt="" src="<?php echo $this->Custom->imageUrl($v['Booking']['Package']['Trainer']['image'],WWW_ROOT.'images/users/');?>" class="img-circle" style="height:5em;" >
                     </a>
                     <div >
                        <h5  style="color: #124b6d;"><b><?php echo ucfirst($v['Booking']['Package']['Trainer']['fname']);?></b> <span class="pull-right">
                           <?php echo date('M d | H:i A',strtotime($v['Review']['created']))?>
                           </span>
                        </h5>
                        <div class="list-inline">
                               <!-- <input id="input-id" readonly="readonly" name="input-name" type="number" class="rating list-inline" min=1 max=5 step=1 data-size="sm" data-rtl="false" showClear="false" showCaption="false" value="2"> -->
                               <input id="input-3" name="input-3" value="<?php echo $v['Review']['rating']?>" class="rating" size="sm">
                        </div>
                        <!-- <ul class="list-inline" >
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
                        </ul> -->
                        <br>
                        <p>
                           <?php echo $v['Review']['description'];?>
                        </p>
                     </div>
                     <hr style="height: 0;
                        border: 0;
                        border-top: 1px solid #eee;
                        margin: 20px 0;">
                  </div>    
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