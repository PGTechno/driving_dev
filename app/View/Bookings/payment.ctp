<div class="modal-dialog ">
   <?php  //echo $this->Form->create('Booking',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
   <div class="modal-content" style="width:130%;">
      <div class="row">
         <div class="col-sm-12">  
            <div class="modal-body">
               <?php pr($mydata);?>
               <form action="/your-charge-code" method="POST" id="payment-form">
                  <span class="payment-errors"></span>

                  <div class="form-row">
                   <label>
                     <span>Card Number</span>
                     <input type="text" size="20" data-stripe="number">
                   </label>
                  </div>

                  <div class="form-row">
                   <label>
                     <span>Expiration (MM/YY)</span>
                     <input type="text" size="2" data-stripe="exp_month">
                   </label>
                   <span> / </span>
                   <input type="text" size="2" data-stripe="exp_year">
                  </div>

                  <div class="form-row">
                   <label>
                     <span>CVC</span>
                     <input type="text" size="4" data-stripe="cvc">
                   </label>
                  </div>

                  <div class="form-row">
                   <label>
                     <span>Billing ZIP Code</span>
                     <input type="text" size="6" data-stripe="address_zip">
                   </label>
                  </div>

                  <input type="submit" class="submit" value="Submit Payment">
               </form>
            </div>
         </div>
      </div>
   </div>
   <?php //echo $this->Form->end(); ?> 
</div>  
<script type="text/javascript">
   
   $(document).on('change','#BookingPackageId, #BookingLessionId',function(){
      setCost($(this));
   })

   
</script> 