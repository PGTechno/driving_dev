<div class="modal-dialog ">
<!-- Modal content-->
   <?php  echo $this->Form->create('Booking',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
   <div class="modal-content" style="width:130%;">
      <div class="row">
         <div class="col-sm-12">  
            <div class="modal-body">
               <?php //pr($data);?>
               <?php 
                  echo $this->Form->input('package_id',array('options' => $data['Package'],'class'=>'form-control','empty'=>'Select','div'=>false,'label'=>false));

                  echo $this->Form->input('lession_id',array('options' => $data['LessionData'],'class'=>'form-control','empty'=>'Select','div'=>false,'label'=>false));

                  echo $this->Form->input('amount',array('class'=>'form-control','value'=>'','div'=>false,'label'=>false,'readonly'=>'readonly'));

                  echo $this->Form->submit('Save',array('class'=>'form-control','div'=>false,'label'=>false));
               ?>
               <!-- <h3>LOGIN </h3>
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
               </div>    -->            
            </div>
         </div>
      </div>
   </div>
   <?php echo $this->Form->end(); ?> 
</div>  
<script type="text/javascript">
   var PackageData = '<?php echo $data["PackageData"];?>';
   PackageData = JSON.parse(PackageData,true);
   $(document).ready(function(){

   })

   $(document).on('change','#BookingPackageId, #BookingLessionId',function(){
      setCost($(this));
   });

   $(document).on('submit','#BookingUwizardForm',function(e){
      e.preventDefault();
      $.ajax({
         url : $(this).attr('action'),
         type: "POST",
         data : $(this).serialize(),
         //dataType : 'JSON',
         // beforeSend: function (XMLHttpRequest) {
         // },
         // complete: function (XMLHttpRequest, textStatus) {
         //     $("#reset_button").click();
         // },
         success : function(data){ 
             if(data.err ==1 ) {    
                 addMsg(data.msg,"alert alert-danger");
             }else {
               alert("s")
               $('.modal-dialog').html(data);
             }
         }
      });
   })

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