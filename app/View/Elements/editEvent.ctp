<div class="modal-dialog" >
   <?php  echo $this->Form->create('Booking',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate','method'=>'post'));?>
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title"><strong>Edit</strong> schedule</h4>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col-lg-12">
               <div class="media">
                  <a class="pull-left" href="#">
                     <img class="media-object dp img-circle" src="<?php echo $this->Custom->imageUrl($this->request->data['User']['image'],WWW_ROOT.'images/users/');?>" style="width: 100px;height:100px;">
                  </a>
                  <div class="media-body">
                      <h4 class="media-heading"><?php echo ucfirst($this->request->data['User']['fname']);?> <!-- <small> India</small> --></h4>
                      <!-- <h5>Software Developer at <a href="http://gridle.in">Gridle.in</a></h5> -->
                      <hr style="margin:8px auto">

                      <span class="label label-default"><?php echo ucfirst($this->request->data['Package']['title']);?></span>
                      <span class="label label-default"><?php echo ucfirst($this->request->data['Package']['duration']).' Minutes';?></span>
                      <span class="label label-info"><?php echo date(Configure::read('Site.front_date_time_format'),strtotime($this->request->data['Booking']['start_time']));?></span>
                      <!-- <span class="label label-default">Android</span> -->
                      <?php 
                        echo $this->Form->hidden('Booking.id');
                        echo $this->Form->input('Booking.start_time',array('type'=>'text','class'=>'date','value'=>date(Configure::read('Site.front_date_time_format'),strtotime($this->request->data['Booking']['start_time']))));
                      ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-danger waves-effect waves-light save-category">Save</button>
         <!-- <button type="submit" class="btn btn-default btn-lg btn-login" >Save</button>  -->
      </div>
   </div>
   <?php echo $this->Form->end();?>
</div>

<script type="text/javascript">
$("#BookingAddForm").submit(function(e){
   e.preventDefault();
   var paramss = $(this).serialize();
   var URL = '<?php echo $this->Html->url(array("controller" => "bookings","action" => "add",$this->request->data["Booking"]["id"]));?>';
   $.ajax({
         url : URL,
         type: "POST",
         data : paramss,
         dataType : 'JSON',
         /*beforeSend: function (XMLHttpRequest) {
         },
         complete: function (XMLHttpRequest, textStatus) {
             $("#reset_button").click();
         },*/
         success : function(data){ 
             //console.log(data)
             if(data.err ==1 ) {    
                 addMsg(data.msg,"alert alert-danger");
             }else {
                curruntEvent.start = data.event.start;
                curruntEvent.end = data.event.end;
                $('#calendar').fullCalendar('updateEvent', curruntEvent);
                $('#myModal').modal('toggle');
             }
         }
     }); 
})
</script>