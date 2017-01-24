<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo Configure::read('GoogleKey');?>"
    async defer></script>
<style>
blockquote {
    padding: 10px 20px;
    margin: 0 0 20px;
    font-size: 17.5px;
    border-left: 5px solid #eee;
    line-height: 26px;
}
hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #eee;
}
.rating-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px 15px 20px 15px;
	border-radius:3px;
}

.review-block-name{
	font-size:12px;
	margin:10px 0;
}
.review-block-date{
	font-size:12px;
}
.review-block-rate{
	font-size:13px;
	margin-bottom:15px;
}
.review-block-title{
	font-size:15px;
	font-weight:700;
	margin-bottom:10px;
}
.review-block-description{
	font-size:13px;
}

.rate{
margin-left:25px;
font-size:18px;
font-weight:550;
}
.Service{
font-weight:600;
font-size:19px;
}
</style>
<?php $paginator = $this->Paginator;?>
<?php if(isset($this->request->data['User']['response'][0])){ ?>
		<section class="section white no-padding-bottom">
			<div class="inner">
				<div class="container">

<div class="row">
			<div class="col-sm-12">
										<div class="review-block">
		
				
					<?php foreach ($this->request->data['User']['response'] as $k => $v) { ?>
								<div class="row">
<div class="col-sm-2 text-center">
							<img style="height:5em;width:5em;" class="img-circle" alt="64x64" src="<?php echo $this->Custom->imageUrl($v['User']['image'],WWW_ROOT.'images/users/');?>">
							<div class="review-block-name"><?php if($v['User']['gender']==1)echo "Male";
else echo "Female";?></div>
							<div class="review-block-date"><?php echo ucfirst($v['User']['city']).",  ".ucfirst($v['User']['zip'])?></div>
						</div>
										<div class="col-sm-7">
							<div class="review-block-rate">
								<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>
								<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>
								<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>
								<button type="button" class="btn  btn-grey btn-xs" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>
								<button type="button" class="btn  btn-grey btn-xs" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button> 
<span class="Service" style="
margin-left:25px;">Hourly Rate:</span><span class="rate">  &#8364; <?php echo ucfirst($v['User']['hourly_rate']);?></span>
							</div>
							<div class="review-block-title"><?php echo ucfirst($v['User']['fname'])." ".ucfirst($v['User']['lname'])?></div>
							<div class="review-block-description">
							<blockquote>
<span class="Service">Car type:</span>
<span class="rate" style="padding:71px;"> <?php foreach($v['Car'] as $g=>$h)echo ucfirst($h['name'].'  ');?></span><br>
<span class="Service">Student type:</span>
<span class="rate" style="margin-left:60px;">  Fresher</span><br>
<span class="Service">Services Offered:</span><span class="rate">  All Type</span>
					
</blockquote>
							</div>
						</div>
		<div class="col-sm-3">
							<?php 
						            	echo $this->Form->button('Message',array('class'=>'','div'=>false,'label'=>false,'onclick'=>"chkLogin('message',".$v['User']['id'].")"));
						            	echo $this->Form->button('Book',array('class'=>'','div'=>false,'label'=>false,'onclick'=>"chkLogin('book',".$v['User']['id'].")"));
						            ?>
<br>
<!--  <small>Company Name<br> <cite title="Source Title">www.Website.com </cite></small>-->
						</div>
						</div>
<hr>
					<?php } ?>
</div>
</div>

</div>

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
							<h6>Find the perfect instructor by quickly and easily comparing location, popularity, price, and service offering.</h6>					
						</div> <!-- end .icon -->					
					</div> <!-- end .service -->
					
					<div class="service orange">
						<div class="icon">
							<i ><img src="<?=$this->webroot?>img/front/book_lesson.png"></i>
							<br><br>
							<h4><b>BOOK YOUR LESSONS</b></h4>
							<h6>Check the working hours and availability of our instructors before making a booking to ensure they suit your schedule and lifestyle.<h6>					
						</div> <!-- end .sub-icon -->
					</div> <!-- end .icon -->
												
					<div class="service orange"style="margin-top:2%;" >
						<div class="icon">
							<i><img src="<?=$this->webroot?>img/front/start_learning.png"></i>
							<br><br>
							<h4><b>START LEARNING</b></h4>
							<h6>Take as many lessons as you need with the instructor of your choice to ensure that you are fully prepared to drive with confidence</h6>
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
					$('#myModal').html('');
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

	