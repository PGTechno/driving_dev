<style>
    .timeline-content{
    color:black;
    }
    .timeline > li .timeline-body {
    margin: 0 0 15px 28%;}
    .timeline-body h2{color:black;font-size:15px;}
    .timeline-body h4{font-size:12px;color:black;}
</style>
<div class="modal-dialog ">
<!-- Modal content-->
    <?php //pr($data);?>
    <?php  echo $this->Form->create('Booking',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
    <div class="modal-content" style="width:130%;"style="z-index:1500;">
        <div class="row">
            <div class="col-sm-12">  
                <div class="modal-body" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet box white" id="form_wizard_1">
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="">
                                                <div class="" id="">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-offset-1">
                                                                <h5 class="block">SELECT PACKAGES</h5>
                                                                    <div class="panel-body">
                                                                        <?php echo $this->Form->input('package_id',array('options' => $data['Package'],'class'=>'form-control','empty'=>'Select Package','div'=>false,'label'=>false));
                                                                        ?>
                                                                    </div>
                                                                <br>
                                                                <h5 class="text-center">----- Or ----- </h5>
                                                                <h5> Select lesson</h5>
                                                                    <div class="panel-body">
                                                                        <?php echo $this->Form->input('lession_id',array('options' => $data['LessionData'],'class'=>'form-control','empty'=>'Select Lession','div'=>false,'label'=>false));

                                                                            echo $this->Form->input('amount',array('class'=>'form-control','value'=>'','div'=>false,'label'=>false,'readonly'=>'readonly','style'=>'display:none;'));
                                                                        ?>
                                                                    <h3 id="priceHeading"> </h3>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5 col-sm-offset-0">
                                                                <blockquote>
                                                                    <ul class="timeline">
                                                                        <li class="timeline-white stepdone">
                                                                            <div class="timeline-icon comp" style="background:#72c35d;box-shadow: 0 0 0 0px #72c35d">
                                                                                <i class="glyphicon glyphicon-ok" style="top:-5px;"></i>
                                                                            </div>
                                                                            <div class="timeline-body">
                                                                                <h4 style="font-size:18px;font-weight:500;color:gray;">Selected Instructor</h4>
                                                                                <div class="timeline-content">
                                                                                    <img class="timeline-img pull-left" alt="64x64" src="<?php echo $this->Custom->imageUrl($data['UserData']['image'],WWW_ROOT.'images/users/');?>" style="width: 70px; height: 70px; ">
<span class="dname"><?php echo ucfirst($data['UserData']['fname'].' '.$data['UserData']['lname']);?></span>
<br><span style="color:gray; font-size:10px;"><?php echo date('H: A',strtotime($data['UserData']['start_time'])).' | '.date('H: A',strtotime($data['UserData']['end_time']));?></span>

                                                                                </div>

                                                                            </div>
                                                                        </li>
                                                                        <li class="timeline-white steppend">
                                                                            <div class="timeline-icon">
                                                                                <i class="glyphicon glyphicon-ok"style="top:-5px;"></i>
                                                                            </div>
                                                                            <div class="timeline-body">
                                                                                <h3 class="notdone" style="font-size:18px;color:gray;">Selected Packages</h3>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- TAb 3 start -->
                                            </div>
                                            <div class="form-actions fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <?php echo $this->Form->submit('Next',array('class'=>'btn blue button-next','div'=>false,'label'=>false));
                                                            ?>
                                                            <!-- <a href="javascript:;" class="btn blue button-next">
                                                            Next <i class="m-icon-swapright m-icon-white"></i>
                                                            </a> -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAGE CONTENT-->
                        </div>
                   
                    <?php //pr($data);?>
                    <?php 
                      /*echo $this->Form->input('package_id',array('options' => $data['Package'],'class'=>'form-control','empty'=>'Select Package','div'=>false,'label'=>false));

                      echo $this->Form->input('lession_id',array('options' => $data['LessionData'],'class'=>'form-control','empty'=>'Select Lession','div'=>false,'label'=>false));

                      echo $this->Form->input('amount',array('class'=>'form-control','value'=>'','div'=>false,'label'=>false,'readonly'=>'readonly'));

                      echo $this->Form->submit('Save',array('class'=>'form-control','div'=>false,'label'=>false));*/
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
      $('#priceHeading').text(price);
   }
</script> 

</div>  
