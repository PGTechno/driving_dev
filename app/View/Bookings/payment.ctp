<div class="modal-dialog ">
   <div class="modal-content" style="width:130%;">
      <div class="row">
         <div class="col-sm-12">  
            <div class="modal-body">
                <?php pr($mydata);
                    $month = array();
                    $year = array();
                    for($m=1,$y=date('y'); $m<=12;$m++,$y++){
                        $month[$m]= $m;
                        $year[$y]= $y;
                    }
                ?>
                <?php  echo $this->Form->create('Booking',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
                    
                    <?php echo $this->Form->input('card',array('class'=>'form-control','placeholder'=>'xxxxxxxxxxxxxxxx','div'=>false,'label'=>false,'maxlength'=>16,'value'=>'4242424242424242'));?>

                    <?php echo $this->Form->input('month',array('class'=>'form-control','div'=>false,'label'=>false,'empty'=>'Month','options'=>$month));?>

                    <?php echo $this->Form->input('year',array('class'=>'form-control','div'=>false,'label'=>false,'empty'=>'Year','options'=>$year));?>

                    <?php echo $this->Form->input('cvv',array('class'=>'form-control','placeholder'=>'CVV','div'=>false,'label'=>false,'maxlength'=>4,'value'=>123));?>

                    <?php echo $this->Form->hidden('package_id',array('value'=>$data['package_id']));?>
                    <?php echo $this->Form->hidden('lession_id',array('value'=>$data['lession_id']));?>
                    <?php echo $this->Form->hidden('u_id',array('value'=>$data['u_id']));?>
                    <?php echo $this->Form->hidden('amount',array('value'=>$data['amount']));?>
                    <?php echo $this->Form->submit('Submit',array());?>                    
                <?php echo $this->Form->end(); ?>
               
            </div>
         </div>
      </div>
   </div>
   <?php $paymentUrl = Router::url(array('controller' => 'Bookings', 'action' => 'payment'));
         $homeUrl = Router::url(array('controller' => 'pages', 'action' => 'home'));   
    ?> 
</div>  
<script type="text/javascript">
    var paymntUrl ="<?php echo $paymentUrl;?>";
    var homeUrl ="<?php echo $homeUrl;?>";
    $(document).on('submit','#BookingPaymentForm',function(e){
        e.preventDefault();
        $.ajax({
            url : paymntUrl,
            type: "POST",
            dataType : 'JSON',
            data : $(this).serialize(),
            success : function(data){ 
                if(data.err ==1 ) {    
                    addMsg(data.msg,"alert alert-danger");
                }else {
                    addMsg(data.msg,"alert alert-success");
                    window.location.href = homeUrl;
                }
            }
        });  
    });
</script> 