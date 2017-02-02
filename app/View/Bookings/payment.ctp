<div class="modal-dialog ">
   <div class="modal-content" style="width:130%;">
      <div class="row">
         <div class="col-sm-12">  
            <div class="modal-body">
                <?php //pr($mydata); pr($data);
                    $month = array();
                    $year = array();
                    for($m=1,$y=date('y'); $m<=12;$m++,$y++){
                        $month[$m]= $m;
                        $year[$y]= $y;
                    }
                ?>
                <?php  //echo $this->Form->create('Booking',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
                    
                    <?php //echo $this->Form->input('card',array('class'=>'form-control','placeholder'=>'xxxxxxxxxxxxxxxx','div'=>false,'label'=>false,'maxlength'=>16,'value'=>'4242424242424242'));?>

                    <?php //echo $this->Form->input('month',array('class'=>'form-control','div'=>false,'label'=>false,'empty'=>'Month','options'=>$month));?>

                    <?php //echo $this->Form->input('year',array('class'=>'form-control','div'=>false,'label'=>false,'empty'=>'Year','options'=>$year));?>

                    <?php //echo $this->Form->input('cvv',array('class'=>'form-control','placeholder'=>'CVV','div'=>false,'label'=>false,'maxlength'=>4,'value'=>123));?>

                    <?php //echo $this->Form->hidden('package_id',array('value'=>$data['package_id']));?>
                    <?php //echo $this->Form->hidden('lession_id',array('value'=>$data['lession_id']));?>
                    <?php //echo $this->Form->hidden('u_id',array('value'=>$data['u_id']));?>
                    <?php //echo $this->Form->hidden('amount',array('value'=>$data['amount']));?>
                    <?php //echo $this->Form->submit('Submit',array());?>                    
                <?php //echo $this->Form->end(); ?>

                <!-- ----------------------- -->
                <?php  echo $this->Form->create('Booking',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
                <?php echo $this->Form->hidden('package_id',array('value'=>$data['package_id']));?>
                <?php echo $this->Form->hidden('lession_id',array('value'=>$data['lession_id']));?>
                <?php echo $this->Form->hidden('u_id',array('value'=>$data['u_id']));?>
                <?php echo $this->Form->hidden('amount',array('value'=>$data['amount']));?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box white" id="form_wizard_1">
                            <div class="portlet-body form">
                                <form action="#" class="form-horizontal" id="submit_form" method="POST">
                                    <div class="form-wizard">
                                        <div class="form-body">
                                            <div class="">
                                                <div class="tab-pane" id="tab4">
                                                    <div class="row">
                                                        <div class="col-sm-5 col-sm-offset-0">
                                                            <div class="row">
                                                                
                                                                <div class="form-group">
<h4 class="block" style="color:gray;font-size:18px;margin-left:20px;">SELECT PAYMENT</h4>
                                                    
                                                                    <label class="col-sm-offset-1">Card Number</label>
                                                                    <label class="col-sm-offset-1">Security Code</label>
                                                                    <div class="input-group">
                                                                        <div class="col-md-5 col-sm-offset-1">
                                                                            <?php echo $this->Form->input('card',array('class'=>'form-control','placeholder'=>'xxxxxxxxxxxxxxxx','div'=>false,'label'=>false,'maxlength'=>16,'value'=>'4242424242424242'));?>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <?php echo $this->Form->input('cvv',array('class'=>'form-control','placeholder'=>'CVV','div'=>false,'label'=>false,'maxlength'=>4,'value'=>123));?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-offset-1">Expiry Month & Year</label>
                                                                    <div class="input-group">
                                                                        <div class="col-md-5 col-sm-offset-1">
                                                                            <?php echo $this->Form->input('month',array('class'=>'form-control','div'=>false,'label'=>false,'empty'=>'Month','options'=>$month));?>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <?php echo $this->Form->input('year',array('class'=>'form-control','div'=>false,'label'=>false,'empty'=>'Year','options'=>$year));?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 ">
                                                            <blockquote>
                                                                <ul class="timeline">
                                                                    <li class="timeline-white stepdone">
                                                                        <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                                            <i class="glyphicon glyphicon-ok" style="top:-5px;"></i>
                                                                            </div>
                                                                        <div class="timeline-body">
                                                                               <h4 style="font-size:18px;font-weight:500;color:black">Selected Instructor</h4>
                                                                            <div class="timeline-content">
                                                                                <img class="timeline-img pull-left" alt="64x64" src="<?php echo $this->Custom->imageUrl($data['instructor']['image'],WWW_ROOT.'images/users/');?>" style="width: 70px; height: 70px; ">
<span class="dname"><?php echo ucfirst($data['instructor']['fname'].' '.$data['instructor']['lname']);?></span>
<br><span style="color:gray; font-size:10px;"><?php echo date('H: A',strtotime($data['instructor']['start_time'])).' | '.date('H: A',strtotime($data['instructor']['end_time']));?></span>
<br>
<span style="color:black;font-size:14px;">   
                                                                                <?php echo $this->Html->link(
                                                                                    "Change Package",
                                                                                    'javascript:void(0)',
                                                                                    array('onclick' => "chkLogin('book',".$data['instructor']['id'].")") // This line will parse rather then output HTML
                                                                                ); ?>
                                                                                
                                                                            </span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="timeline-white stepdone">
                                                                        <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 8px #72c35d">
                                                                            <i class="glyphicon glyphicon-ok" style="top:-5px;"></i>
                                                                        </div>
                                                                        <div class="timeline-body">
                                                                            <h4 style="font-size:18px;font-weight:500;color:black">Selected PACKAGE</h2>
                                                                            <div class="timeline-content">
                                                                                <h4 style="color:gray;"><?php echo ucfirst($mydata['title']);?></h4>
                                                                                <!-- <span style="color:gray">60 Minutes (6 lesson)</span> --><br> <span style="color:#72c35d;">£ <?php echo $mydata['price'];?></span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="timeline-white steppend">
                                                                        <div class="timeline-icon">
                                                                            <i class="glyphicon glyphicon-ok"></i>
                                                                        </div>
                                                                        <div class="timeline-body">
                                                                            <h4 style="font-size:18px;color:gray;font-weight:500;">Select Payment</h2>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab5">
                                                    <div class="row">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <?php echo $this->Form->submit('Next',array('class'=>'btn blue button-next','div'=>false,'label'=>false));
                                                            ?>
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
                </div>
                <?php echo $this->Form->end(); ?>

               
            </div>
         </div>
      </div>
   </div>
   <?php $paymentUrl = Router::url(array('controller' => 'Bookings', 'action' => 'payment'));
         $homeUrl = Router::url(array('controller' => 'pages', 'action' => 'home'));   
         $duration = Router::url(array('controller' => 'bookings', 'action' => 'duration'));   
         
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
                    $.get( duration+"/"+data.data.id, function( data ) {
                        $( ".modal-dialog " ).html( data );                        
                    });
                }
                return true;
            }
        });  
    });
</script> 