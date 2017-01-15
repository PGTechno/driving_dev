<script type="text/javascript">
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '537066419745678',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  
</script>
<?php
$login = Router::url(array('controller' => 'users', 'action' => 'login'));
$register = Router::url(array('controller' => 'users', 'action' => 'register'));
?>




	<div class="modal-dialog ">
	<!-- Modal content-->
		<?php  echo $this->Form->create('User',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
		<div class="modal-content" style="width:130%;">
			<div class="row">
				<div class="col-sm-6"   >	
					<div class="modal-body" style="margin-left:5%;"><br>
						<h3>LOGIN </h3>
						<p>In Maximus justo aliquet rise efficitur in por ttitor nisl fsucibus.</p>
					
							<div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" style="background-color:#3d556d;">
                                    <?php echo $this->Html->image('front/email_address.png', array());?>
                                    </span>
                                    <?php echo $this->Form->input('email',array('class'=>'form-control','label'=>false,'div'=>false,'placeholder'=>'Email Address','style'=>'border-radius:3%'));?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <span class="input-group-addon" style="background-color:#3d556d;">
                                    <i ><?php echo $this->Html->image('front/password.png', array());?></i>
                                    </span>
                                    <?php echo $this->Form->input('password',array('class'=>'form-control','label'=>false,'div'=>false,'placeholder'=>'Password'));?>
                                </div>
                            </div>
						
					<div > 
					<button type="submit" class="btn btn-default btn-lg btn-login" >LOGIN</button> 
					<br><br>
					<h6 style="text-align:center;"><b>OR</b></h6>
					<button type="button" class="btn btn-info btn-fab" onclick="chkLoginStatus()" style="background-color:#3d556d;color:#fff;">
						<?php echo $this->Html->image('front/login_with_facebook.png', array());?>&nbsp;&nbsp;LOGIN WITH FACEBOOK
					</button>
					
					</div>
					</div>
				</div>
				<div class="col-sm-6"  >
					<div class="carousel-inner" role="listbox" >
						  <div class="item active"  >
							<div class="slide" style="background-image: url('<?=$this->webroot?>img/front/popup_background.jpg');background-repeat:no-repeat;">
								<a href="" >
									<?php echo $this->Html->image('front/close_popup.png', array("class"=>"img-reg"));?>
								</a>
								
								<div style="margin-top:35%;">	
									<h4 class="reg-heading" ><b>REGISTER  NOW</b></h4>
									<p class="reg-p" style="height:10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
									<button type="button" class="openRegister btn btn-default btn-lg btn-reg ins"><b>REGISTER AS AN INSTRUCTOR</b></button><br><br>
									<button type="button" class="openRegister btn btn-default btn-lg btn-reg std"><b>REGISTER AS A STUDENT</b></button>
								</div><br><br>
							</div>
						 </div>
						 <div>
						
					</div>
					</div>
					
				</div>
			</div>
		</div>
		<?php echo $this->Form->end();?> 
	</div>	


<script type="text/javascript">
	$("#UserLoginForm").submit(function(e){
		e.preventDefault();
		var paramss = $(this).serialize();
		var URL = '<?php echo $this->Html->url(array("controller" => "users","action" => "login","full_base"=>false));?>';
		$.ajax({
            url : URL,
            type: "POST",
            data : paramss,
            dataType : 'JSON',
            /*beforeSend: function (XMLHttpRequest) {
            },
            complete: function (XMLHttpRequest, textStatus) {
                $("#reset_button").click();
            },*/
            success : function(data){ 
                if(data.err ==1 ) {    
                    addMsg(data.msg,"alert alert-danger");
                }else {
                	window.location = '<?php echo $this->Html->url(array("controller" => "users","action" => "dashboard","full_base"=>false));?>';
                }
            }
        });	
	})

	$(".openRegister").click(function(){
		var url = "<?php echo $register?>";

		if($(this).hasClass('std')){ url = url+'/3'; }

		$.get(url)
		.done(function(data) {
	    	$('#myModal').html(data);	    	
	  	});

	})
</script>
