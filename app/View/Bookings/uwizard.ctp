<div class="modal-dialog ">
<!-- Modal content-->
    <?php  echo $this->Form->create('Booking',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
    <div class="modal-content" style="width:130%;">
        <div class="row">
            <div class="col-sm-12">  
                <div class="modal-body">
                    <?php //pr($data);?>
                    <?php 
                      echo $this->Form->input('package_id',array('options' => $data['Package'],'class'=>'form-control','empty'=>'Select Package','div'=>false,'label'=>false));

                      echo $this->Form->input('lession_id',array('options' => $data['LessionData'],'class'=>'form-control','empty'=>'Select Lession','div'=>false,'label'=>false));

                      echo $this->Form->input('amount',array('class'=>'form-control','value'=>'','div'=>false,'label'=>false,'readonly'=>'readonly'));

                      echo $this->Form->submit('Save',array('class'=>'form-control','div'=>false,'label'=>false));
                    ?>         
                </div>
            </div>
        </div>
    </div>
   <?php 
        echo $this->Form->end(); 
        $paymentUrl = Router::url(array('controller' => 'Bookings', 'action' => 'payment'));
   ?> 
   
<script type="text/javascript">
   var PackageData = '<?php echo $data["PackageData"];?>';
   PackageData = JSON.parse(PackageData,true);
   var paymntUrl ="<?php echo $paymentUrl;?>";
   

   $(document).on('change','#BookingPackageId, #BookingLessionId',function(){
      setCost($(this));
   });        

   function setCost(thisObj){
      var price=0.0;
      var currAttr = thisObj.attr('id');
      if(currAttr=='BookingPackageId'){
         $('#BookingLessionId').val('');
         if(thisObj.val()){
            price = PackageData[thisObj.val()].price;
         }
      }else if(currAttr=='BookingLessionId'){
         $('#BookingPackageId').val('');
         var hourlyRate = "<?php echo $data['UserData']['hourly_rate'];?>";
         if(thisObj.val()){
            price = hourlyRate * thisObj.val();
         }
      }

      $('#BookingAmount').val(price);
   }
</script> 

</div>  
