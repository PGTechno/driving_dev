<div class="modal-dialog ">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times; </span>
      <?php echo $this->Html->image('front/close_popup.png', array("class"=>"img-reg"));?>
    </button>
    <?php  //echo $this->Form->create('Review',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
    <div class="modal-content" style="width:130%;">
        <div class="row">
               <?php //prd($data);?>       
        </div>

        <div class="row">
            <center>
                <!-- <a href="#aboutModal" data-toggle="modal">
                    <img alt="" width="140" height="140" src="<?php echo $this->Custom->imageUrl($data['Package']['Trainer']['image'],WWW_ROOT.'images/users/');?>" class="img-circle" style="height:4em;" >
                </a>
                <h3><?php echo ucfirst($data['Package']['Trainer']['fname']);?></h3> -->
                
                <div class="form-group">
                   <div class="col-sm-5">
                        <img alt="" width="140" height="140" src="<?php echo $this->Custom->imageUrl($data['Instructor']['image'],WWW_ROOT.'images/users/');?>" class="img-circle" style="height:4em;" > 
                        <h3><?php echo ucfirst($data['Instructor']['fname']);?></h3>   
                   </div> 
                </div>
                
                <div class="form-group">
                   <div class="col-sm-6">
                      <?php echo $this->Form->input('rating',array('class'=>'form-control rating','div'=>false,'label'=>false));?>
                   </div>
                </div>

                <br>

                <div class="form-group">
                   <div class="col-sm-6">
                      <?php echo $this->Form->textarea('description',array('class'=>'form-control','placeholder'=>'Description','div'=>false,'label'=>false));?>
                   </div>
                </div>

                <div class="form-group">
                   <div class="col-sm-6">
                        <button id="rate-it" class="myCustbtn" style="display:none;">Click here to rate this booking</button>   
                   </div>
                </div>

                <!-- <input id="rating" name="rating" value="" class="rating" size="sm"> -->
                
                <!-- <em>click my face for more</em>
                <p>By the way,<br><a target="_blank" href="http://bootsnipp.com/TXTCLASS/snippets/25zz">there's a fresh 3.1.0 version ready</a></p> -->
            </center>
        </div>
    </div>
    <?php //echo $this->Form->end();?> 
</div>

<style type="text/css">
.rating-container .filled-stars{
   color: #72c35d;   
}


</style>

<script type="text/javascript">
   var rate = $('.rating').val();
   $('.rating').rating('create', {disabled: false, showClear: false, showCaption: false,size:'sm',step:1});
   $(document).on('change','.rating',function(){
        if($(this).val()){
            rate = $(this).val();
            $('#rate-it').show();
        }else{
            $('#rate-it').hide();
        }
   });
   
   $(document).on('click','#rate-it',function(){
        var booking_id = "<?php echo $data['Booking']['id'];?>";
        var description = $("#description").val();
        if(rate){
            var URL = '<?php echo $this->Html->url(array("controller" => "bookings","action" => "review",$data["Booking"]["id"],"full_base"=>false));?>';
            $.ajax({
                url : URL,
                type: "POST",
                data : {booking_id:booking_id,rate:rate,description:description},
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
        } else{
            alert("Please select rating.");
        }
   })
</script>