<div class="modal-dialog ">
   <div class="modal-content" style="width:130%;">
      <div class="row">
         <div class="col-sm-12">  
            <div class="modal-body">
                

                <!-- ----------------------- -->
                <?php  echo $this->Form->create('Booking',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box white" id="form_wizard_1">
                                <div class="portlet-body form">
                                    <form action="#" class="form-horizontal" id="submit_form" method="POST">
                                        <div class="form-wizard">
                                            <div class="form-body">
                                            
                                                <div class="">
                                                    <!-- TAb 3 start -->
                                                    <!-- TAb 4 -->
                                                    <div class="" id="tab5">
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
                                                                        <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 0px #72c35d">
                                                                            <i class="glyphicon glyphicon-ok"></i>
                                                                        </div>
                                                                        <div class="timeline-body">
                                                                                  <h4 style="font-size:18px;font-weight:500;color:gray;">Selected Instructor</h4>
                                                               <div class="timeline-content">
                                                                                <img class="timeline-img pull-left" alt="64x64" src="<?php echo $this->Custom->imageUrl($booking['Instructor']['image'],WWW_ROOT.'images/users/');?>" style="width: 70px; height: 70px; "> 
<span class="dname">garbanzo.</span>
<br><span style="color:gray; font-size:10px;">Mon-Sat  | 9:00 AM</span>
  </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="timeline-white stepdone">
                                                                        <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 0px #72c35d">
                                                                            <i class="glyphicon glyphicon-ok"></i>
                                                                        </div>
                                                                        <div class="timeline-body">
                                                                       <h3 class="notdone" style="font-size:18px;color:gray;">Selected Packages</h3>
                                                                       <div class="timeline-content" >
                                                                                <h4 style="color:green; font-size:16px;">Silver PACKAGE</h4>
                                                                                60 Minutes (6 lesson) <span style="color:#72c35d;">$555.00</span>
                                                                                    <br><span><a href="">Change package </a></span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="timeline-white stepdone">
                                                                        <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 0px #72c35d">
                                                                            <i class="glyphicon glyphicon-ok"></i>
                                                                        </div>
                                                                        <div class="timeline-body">
                                                                                              <h3 class="notdone" style="font-size:16px;color:gray;">Selected Date & Time</h3>
                                                       <div class="timeline-content">
                                                                             <h4 style="color:black;width:25%;">Date<span class="pul-right">Time</h4>
                                                                             <h5 style="color:black;width:25%;">07/09/2016  <span class="pul-right">21:00</h5>
                                                                                    <br><span><a href="">Change package </a></span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="timeline-white steppdone">
                                                                        
                                                                        <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 0px #72c35d">
                                                                            <i class="glyphicon glyphicon-ok"></i>
                                                                        </div>
                                                                        <div class="timeline-body">
                                                                            <h3 style="font-size:16px;color:gray;">Select Payment</h2>
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
                                                            <a href="javascript:;" class="btn blue button-next">
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo $this->Form->end(); ?>

               
            </div>
         </div>
      </div>
   </div>
   <?php $paymentUrl = Router::url(array('controller' => 'Bookings', 'action' => 'payment'));
         $homeUrl = Router::url(array('controller' => 'pages', 'action' => 'home'));   
         $duration = Router::url(array('controller' => 'bookings', 'action' => 'duration'));   
         $duration = Router::url(array('controller' => 'bookings', 'action' => 'thanks'));   
    ?> 
</div>  
<script type="text/javascript">
    var paymntUrl ="<?php echo $paymentUrl;?>";
    var homeUrl ="<?php echo $homeUrl;?>";
    var duration ="<?php echo $duration;?>";
    $(document).on('submit','#BookingPaymentForm',function(e){
        e.preventDefault();
        $.ajax({
            url : paymntUrl,
            type: "POST",
            dataType : 'JSON',
            async: true,
            data : $(this).serialize(),
            success : function(data){ 
                if(data.err ==1 ) {    
                    addMsg(data.msg,"alert alert-danger");
                }else {
                    addMsg(data.msg,"alert alert-success");
                    //window.location.href = homeUrl;
                    /*$.get( duration+"/"+data.data.id, function( data ) {
                        $( ".modal-dialog " ).html( data );                        
                    });*/
                }
            }
        });  
    });
</script> 