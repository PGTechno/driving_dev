<div class="modal-dialog ">
   <div class="modal-content" style="width:130%;">
      <div class="row">
         <div class="col-sm-12">  
            <div class="modal-body">
                

                <!-- ----------------------- -->
                <?php //pr($booking);?>
                <?php  echo $this->Form->create('Schedule',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
                <div class="row">
                <div class="col-md-12">
                    <div class="portlet box white" id="form_wizard_1">
                        <div class="portlet-body form">
                            <!-- <form action="#" class="form-horizontal" id="submit_form" method="POST"> -->
                                <div class="form-wizard">
                                    <div class="form-body">
                                        <div class="">
                                            
                                            <!-- TAb 3 start -->
                                            <div class="" id="tab3">
                                            
                                                <h3 class="block">SELECT DATE & TIME</h3>
                                                
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-offset-1" style="border-left:1px grove gray;">
                                                        <div class="row">
                                                                    <div class="form-group">
                                                                        <label class="col-sm-offset-1">SELECT DATE</label>
                                                                        <div class="input-group">
                                                                            <div class="col-md-11 col-sm-offset-1">
                                                                                <?php echo $this->Form->hidden('booking_id',array('value'=>$booking['Booking']['id']));?>
                                                                                <?php echo $this->Form->input('date',array('class'=>'form-control date','placeholder'=>'Date','div'=>false,'label'=>false));?>
                                                                            </div>
                                                                            <!-- <div class="col-md-5">
                                                                                <input type="date" class="form-control">
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-offset-1">SELECT  DURATION</label>
                                                                        <div class="input-group">
                                                                            <div class="col-md-11 col-sm-offset-1">
                                                                                <?php 
                                                                                $available_hours = [];
                                                                                for ($i=1;$i <= $booking['Booking']['hours_count'];$i++ ) {
                                                                                    $available_hours[$i] = $i." Hour";
                                                                                }
                                                                                echo $this->Form->input('duration',array('class'=>'form-control','div'=>false,'label'=>false,'empty'=>'Select Duration','options'=>$available_hours));?>
                                                                            </div>
                                                                            <!-- <div class="col-md-5">
                                                                                <input type="time" class="form-control" >
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                    


                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5 ">
                                                    
                                                    <blockquote>
                                                        <ul class="timeline">
                                                            <li class="timeline-white stepdone">
                                                                <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 0px #72c35d">
                                                                    <i class="glyphicon glyphicon-ok"></i>
                                                                </div>
                                                                <div class="timeline-body">
                                                                    <h2>Selected Instructor</h2>
                                                                    <div class="timeline-content">
                                                                        <img class="timeline-img pull-left" alt="64x64" src="<?php echo $this->Custom->imageUrl($booking['Instructor']['image'],WWW_ROOT.'images/users/');?>" style="width: 150px; height: 170px; ">  onion corn plantain garbanzo.
                                                                            <br><span><a href="">Change Instructor  </a></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="timeline-white stepdone">
                                                                <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 0px #72c35d">
                                                                    <i class="glyphicon glyphicon-ok"></i>
                                                                </div>
                                                                <div class="timeline-body">
                                                                <h2>Selected PACKAGE</h2>
                                                                    <div class="timeline-content">
                                                                      onion corn plantain garbanzo.
                                                                            <br>
                                                                    <h6 style="width:30%;">     
                                                                        <span>
                                                                            <!-- <a href="">Change package </a> -->
                                                                            <?php echo $this->Html->link(
                                                                                "Change package",
                                                                                'javascript:void(0)',
                                                                                array('onclick' => "chkLogin('book',".$booking['Instructor']['id'].")") // This line will parse rather then output HTML
                                                                            ); ?>
                                                                        </span>
                                                                    </h6>
                                                                    </div>
                                                                    </div>
                                                            </li>
                                                            <li class="timeline-white stepdone">
                                                                <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 0px #72c35d">
                                                                    <i class="glyphicon glyphicon-ok"></i>
                                                                </div>
                                                                <div class="timeline-body">
                                                                    <h2>Payment Done</h2>
                                                                    <div class="timeline-content">
                                                                      onion corn plantain garbanzo.
                                                                            <br>
                                                                    <h6 style="width:30%;">     <span><a href="">Change package </a></span>
                                                                    </h6>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="timeline-white steppend">
                                                                
                                                                <div class="timeline-icon">
                                                                    <i class="glyphicon glyphicon-ok"></i>
                                                                </div>
                                                                <div class="timeline-body">
                                                                    <h2>Selected Date & Time</h2>
                                                                </div>
                                                            </li>
                                                            
                                                        </ul>
                                                    </blockquote>
                                                                    
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            
                                            <div class="tab-pane" id="tab5">
                                            </div>
                                    </div>
                                    <div class="form-actions fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <!-- <a href="javascript:;" class="btn default button-previous">
                                                    <i class="m-icon-swapleft"></i> Back </a>
                                                    <a href="javascript:;" class="btn blue button-next">
                                                    Continue <i class="m-icon-swapright m-icon-white"></i>
                                                    </a> -->
                                                    <!-- <a href="javascript:;" class="btn green button-submit">
                                                    Submit <i class="m-icon-swapright m-icon-white"></i>
                                                    </a> -->
                                                    <?php echo $this->Form->submit('Submit',array('class'=>'btn green button-submit','div'=>false,'label'=>false));
                                                            ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </form> -->
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
         $durationUrl = Router::url(array('controller' => 'Bookings', 'action' => 'duration',$booking['Booking']['id']));
          $thanksUrl = Router::url(array('controller' => 'Bookings', 'action' => 'thanks',$booking['Booking']['id']));   
    ?> 
</div>  
<script type="text/javascript">
    var paymntUrl ="<?php echo $paymentUrl;?>";
    var homeUrl ="<?php echo $homeUrl;?>";
    var durationUrl ="<?php echo $durationUrl;?>";
    var thanksUrl ="<?php echo $thanksUrl;?>";
    $(document).on('submit','#ScheduleDurationForm',function(e){
        e.preventDefault();
        $.ajax({
            url : durationUrl,
            type: "POST",
            dataType : 'JSON',
            data : $(this).serialize(),
            success : function(data){ 
                if(data.err ==1 ) {    
                    addMsg(data.msg,"alert alert-danger");
                }else {
                    addMsg(data.msg,"alert alert-success");
                    $.get( thanksUrl, function( data ) {
                        $( ".modal-dialog " ).html( data );                        
                    });
                    //window.location.href = homeUrl;
                }
            }
        });  
    });
</script> 