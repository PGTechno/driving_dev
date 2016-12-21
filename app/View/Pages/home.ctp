<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo Configure::read('GoogleKey');?>"
    async defer></script>
<?php $paginator = $this->Paginator;?>
<?php if(isset($this->request->data['User']['response'][0])){ ?>
		<section class="section white no-padding-bottom text-center">
			<div class="inner">
				<div class="container">
					<?php foreach ($this->request->data['User']['response'] as $k => $v) { ?>
						<div class="row">
							<div class="col-sm-12">
						      <div class="card-box">
						         <div style="width:95%; margin-top:5%;" class="media">
						            <a class="pull-left" href="#">
						            <img style="height:5em;" class="img-circle" alt="64x64" src="<?php echo $this->Custom->imageUrl($v['User']['image'],WWW_ROOT.'images/users/');?>">
						            </a>
						            <div>
						               <h5 class="h51">
						                  <b><?php echo ucfirst($v['User']['fname'])?></b> <span>| <?php echo $v['User']['email'];?></span>
						                  <ul class="list-inline pull-right">
						                     <li>Today, 11:03 AM ,</li>
						                     <li><p>Reply </p></li>
						                  </ul>
						               </h5>
						               <br>
						            </div>
						            <hr style="height: 0;border: 0;border-top: 1px solid #eee;margin: 7px 0;">
						            <?php 
						            	echo $this->Form->button('Message',array('class'=>'','div'=>false,'label'=>false,'onclick'=>"chkLogin('message',".$v['User']['id'].")"));
						            	echo $this->Form->button('Book',array('class'=>'','div'=>false,'label'=>false,'onclick'=>"chkLogin('book',".$v['User']['id'].")"));
						            ?>
						         </div>
						         <div>
					               	<p class="text-muted m-b-30 font-13">
					                  	<?php echo $v['User']['aboutme'];?>
					               	</p>						            
						         </div>
						         <!-- <form class="form-group">
						            <textarea class="form-control">Reply Message</textarea>
						            <button style="width:10%; font:white;margin-top:3%;margin-bottom:10%;" class="btn-success pull-right form-control">SEND </button>
						         </form> -->
						         <br>
						      </div>
						   </div>
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
				</div> <!-- end .container -->				
			</div> <!-- end .inner -->			
		</section> <!-- end .section -->						
<?php }else{ ?>
	<section class="section white no-padding-bottom text-center">
		<div class="inner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<h1 class="font-set" >Welcome To Driving Masters</h1>
							<p class="font-set1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem eriam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
						<img src="<?=$this->webroot?>img/front/car.png" alt="car" class="img-responsive center-block featured-image">
					</div> <!-- end .col-sm-8 -->
				</div> <!-- end .row -->
			</div> <!-- end .container -->
		</div> <!-- end .inner -->
	</section> <!-- end .section -->	
		
	<section class="section light">
		<div class="inner">
			<div class="container">
				<h2 class=" font-margin" >How It Works</h2>
				<div class="services clearfix" width="30%">
					<div class="service yellow">
						<div class="icon">
							<img src="<?=$this->webroot?>img/front/find_instructor.png">
							<i class=""></i>
							 <!-- end .sub-icon -->
							<br><br>
							<h4><b>FIND AN INSTRUCTOR</b></h4>
							<h6>Campare instructors based on their ratings and reviews and find the perfect instructor who meets all your specific requirements.</h6>					
						</div> <!-- end .icon -->					
					</div> <!-- end .service -->
					
					<div class="service orange">
						<div class="icon">
							<i ><img src="<?=$this->webroot?>img/front/book_lesson.png"></i>
							<br><br>
							<h4><b>BOOK YOUR LESSONS</b></h4>
							<h6>Check the working hours and availability of your instructor and your lessons  which suit your schedule and lifestyle.<h6>					
						</div> <!-- end .sub-icon -->
					</div> <!-- end .icon -->
												
					<div class="service orange"style="margin-top:2%;" >
						<div class="icon">
							<i><img src="<?=$this->webroot?>img/front/start_learning.png"></i>
							<br><br>
							<h4><b>START LEARNING</b></h4>
							<h6>Take as many lessons on as you need,with the instructor of yourschoice to help you bacome as prepared as you can be to pass yours with flying colors</h6>
						</div> <!-- end sub icon -->
					</div> <!-- end service icon -->
				</div>	
			</div> <!-- end .container -->
		</div> <!-- end .inner -->
	</section> <!-- end .section -->
<?php } ?>		
<!---end footer-->

<script type="text/javascript">
var isUser = "<?php echo ($this->Session->read('Auth.User.role')==3) ? true : false; ?>";

function chkLogin(from,inst_id){
	if($('.main-nav .light-green').length){
		$('.main-nav .light-green').click();
	}else{
		if(from=='message'){
			var URL = '<?php echo $this->Html->url(array("controller" => "inbox","action" => "messages"));?>/'+inst_id;
			window.location.href = URL;
		}

		if(from=='book'){
			if(!isUser){
				addMsg('Sorry, Please login as student to booking.',"alert alert-danger");
				return false;
			}
			$.ajax({
				url : '<?php echo $this->Html->url(array("controller" => "bookings","action" => "uwizard","full_base"=>false));?>/'+inst_id,
				type: "GET",
				//data : params,
				//dataType : 'JSON',
				/*beforeSend: function (XMLHttpRequest) {
				},
				*/
				success : function(data){ 
					$('#myModal').append(data);
					$('#myModal').modal();
					/*if(data.err ==1 ) {    
					  addMsg(data.msg,"alert alert-danger");
					}else {
					window.location = '<?php echo $this->Html->url(array("controller" => "bookings","action" => "dashboard","full_base"=>false));?>';
					}*/
				}
			});
		}
	}	
}
</script>

	