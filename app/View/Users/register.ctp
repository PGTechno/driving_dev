		<div class="modal-dialog" width="50%;" > 
			<div class="modal-content p-0">
				<div class="modal-body"> 
					<a href="" >
						<?php echo $this->Html->image('front/close_popup.png', array('class'=>'close-btn-reg'));?>
					</a>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">			
						<?php echo $this->Html->image('front/close_popup_black.png', array('class'=>''));?>
					</button> 
					<h2 class="h2-reg-now" ><b>REGISTER NOW</b></h2>
				<!--	<p class="reg-para" >Nulla eu urna elementum nunc lacinia egestas.Quisque interdum ,<br><span>dolor a eleifend imperdiet.</span></p>-->
					
					<div class="btn-registers">
							<div class="btn-group  btn-lg btn-round" >
								<ul class="nav nav-pills" style="border:#56c243 0px solid; border-top-left-radius: 5em;border-bottom-left-radius: 5em;border-top-right-radius: 5em;border-bottom-right-radius: 5em;">
								   <li class="active role"><a data-toggle="pill" href="#home" style="border:#56c243 1px solid; border-top-left-radius: 5em;border-bottom-left-radius: 5em;" class="left" data-role="2">INSTRUCTOR</a></li>
								   <li class="right1 role"><a data-toggle="pill" href="#menu1" class="right" style="border:#56c243 1px solid;border-top-right-radius: 5em;border-bottom-right-radius: 5em;" data-role="3">STUDENT</a></li>
								</ul>
							</div>
					</div><br>
					
					<div  class="tab-content tab-reg-con">
						<?php  echo $this->Form->create('User',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
					 	<?php 
					 		echo $this->Form->hidden('role',array('value'=>2));
					 		echo $this->Form->hidden('id');
					 	?>
						<div id="home" class="tab-pane fade in active">
							<!-- <form action="instructor_dashboard.html" method="post" > -->
								<div class="row"> 
										<div class="col-md-6"> 
										
											<div class="form-group"> 
												<div class="input-group">
														<span class="input-group-addon input-color-text" >
														<?php echo $this->Html->image('front/email_address.png', array('class'=>''));?>
														</span>
														<?php echo $this->Form->input('fname',array('label'=>false,'div'=>false,'placeholder'=>'Full Name','style'=>'border-radius:3%;background-color: #e5e5e5;width:90%;','error'=>false,'class'=>'fname form-control add-input-reg'));?>
												</div>
												<?php echo $this->Form->error('fname', null, array('class' => 'error-message'));?>
											</div> 
										</div> 
										<div class="col-md-6"> 
											<div class="form-group"> 
												<div class="input-group">
														<span class="input-group-addon input-color-text" >
															<?php echo $this->Html->image('front/email_address.png', array('class'=>''));?>
														</span>
														<?php echo $this->Form->input('email',array('label'=>false,'div'=>false,'placeholder'=>'Email Address','style'=>'border-radius:3%;background-color: #e5e5e5;width:90%','error'=>false,'class'=>'form-control email'));?>
												</div>
												<?php echo $this->Form->error('email', null, array('class' => 'error-message'));?>
											</div> 
										</div> 
										</div> 
									
									<div class="row" > 
										<div class="col-md-6"> 
											<div class="form-group"> 
												<div class="input-group">
														<span class="input-group-addon input-color-text" >
														<?php echo $this->Html->image('front/password.png', array('class'=>''));?>
														</span>
														<?php echo $this->Form->input('password',array('label'=>false,'div'=>false,'placeholder'=>'Password','style'=>'border-radius:3%;background-color: #e5e5e5;width:90%;','error'=>false,'class'=>'form-control password'));?>
												</div>
												<?php echo $this->Form->error('password', null, array('class' => 'error-message'));?>
											</div> 
										</div> 
										<div class="col-md-6"> 
											<div class="form-group"> 
												<div class="input-group">
														<span class="input-group-addon input-color-text" >
														<?php echo $this->Html->image('front/password.png', array('class'=>''));?>
														</span>
														<?php echo $this->Form->input('cpassword',array('label'=>false,'type'=>'password','div'=>false,'placeholder'=>'Confirm Password','style'=>'border-radius:3%;background-color: #e5e5e5;width:90%;','error'=>false,'class'=>'form-control'));?>
												</div>
												<?php echo $this->Form->error('cpassword', null, array('class' => 'error-message'));?>
											</div> 
										</div> 
									</div> 
									<br>
									
									<button type="submit" class="btn btn-default btn-lg btn-block btn-reg1" >Register</button>
							<!-- </form> -->
						</div>
						<?php echo $this->Form->end();?> 
				    </div>
				</div><br><br>
			</div> 
		</div>
	</div><!-- /.modal -->
</div>	


<script type="text/javascript">
	var form = $("#UserRegisterForm");
	var isUser = "<?php echo isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == 3 ? true : false; ?>";
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
	            beforeSend: function (XMLHttpRequest) {
	            },
	            complete: function (XMLHttpRequest, textStatus) {
	                $("#reset_button").click();
	            },
	            success : function(data){
	                try {
					    var res = JSON.parse(data);
					    if(res.err ==0 ) {    
	                    	window.location = '<?php echo $this->Html->url(array("controller" => "pages","action" => "home","full_base"=>false));?>';
		                }else {
		                	
		                }
					} catch(error) {
					    $('#myModal').html(data);
					}
	            }
	        });	
        }
    });
	
	$(".role").click(function(){
		$('#UserRole').val($(this).find('a').data('role'));
	})

	if(isUser) $('.right1 .right').click();

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
	       
