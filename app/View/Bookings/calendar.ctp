
<?php
   echo $this->Html->css(array(
      'fullcalendar',
   ));

   echo $this->Html->script(array(
      'fullcalendar.min',
      'jquery.fullcalendar'
   ));

   echo $this->fetch('css');
   echo $this->fetch('script');
?>
<div class="tab-content">
   <div id="menu4" class="tab-pane fade in active">
      <br>        
      <div class="card-box" style="width:90%;padding:absolute;padding-left:5%;padding-top:5%;font-size:15px;">
         <div id="calendar"  >
            <!-- BEGIN MODAL -->
            <!-- <div class="modal fade none-border" id="event-modal">
               <div class="modal-dialog" >
                  <div class="modal-content"  >
                     <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><strong>Add Event</strong></h4>
                     </div>
                     <div class="modal-body"></div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                     </div>
                  </div>
               </div>
            </div> -->
         </div>
      </div>
      <!-- Modal Add Category -->
      <!-- <div class="modal fade none-border" id="add-category">
         <div class="modal-dialog" >
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title"><strong>Add</strong> a category</h4>
               </div>
               <div class="modal-body">
                  <form role="form" >
                     <div class="row" style="font-size:35px;">
                        <div class="col-md-6" >
                           <label class="control-label">Category Name</label>
                           <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                        </div>
                        <div class="col-md-6">
                           <label class="control-label">Choose Category Color</label>
                           <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                              <option value="success">Success</option>
                              <option value="danger">Danger</option>
                              <option value="info">Info</option>
                              <option value="pink">Pink</option>
                              <option value="primary">Primary</option>
                              <option value="warning">Warning</option>
                              <option value="inverse">Inverse</option>
                           </select>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
               </div>
            </div>
         </div>
      </div> -->
      <br><br><br>               <!-- END MODAL -->
   </div>
</div>   

<script type="text/javascript">
/*var source = [
   {id:1,title:"My Event 1",start:"2016-10-22",end:"2016-10-23",className:"my_event ",color:"#72c35d"},
   {id:1,title:"My Event 2",start:"2016-10-24",end:"2016-10-26",className:"my_event ",color:"#72c34d"}
];*/
var source = '<?php echo $events;?>';
var curruntEvent ; 
source = JSON.parse(source);
$('#calendar').fullCalendar({
    events: source,
    header: {
        left: '',
        center: 'prev title next',
        right: 'month,agendaWeek,agendaDay'
    },
    eventRender: function (event, element) {
        console.log(element);
        /*element.click(function() {
            $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
            $("#endTime").html(moment(event.end).format('MMM Do h:mm A'));
            $("#eventInfo").html(event.description);
            $("#eventLink").attr('href', event.url);
            $("#eventContent").dialog({ modal: true, title: event.title, width:350});
        });*/
    },
    dayClick: function(date, jsEvent, view) {
      //alert(date)
      //setEvent();
    },
    eventClick: function(calEvent, jsEvent, view) {
      setEvent(calEvent.id);
      curruntEvent = calEvent;
      /*console.log(calEvent)*/
      //calEvent.title ="dd";
       //$('#calendar').fullCalendar('updateEvent', calEvent);
      /*alert('Event: ' + calEvent.title);
      alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
      alert('View: ' + calEvent.id);
      console.log(jsEvent);
      */
      // change the border color just for fun
      //$(this).css('border-color', 'red');

    }
});

function setEvent(id){
   id = id || '';
   $.ajax({
      url : '<?php echo $this->Html->url(array("controller" => "bookings","action" => "add","full_base"=>false));?>/'+id,
      type: "POST",
      //data : params,
      //dataType : 'JSON',
      /*beforeSend: function (XMLHttpRequest) {
      },
      complete: function (XMLHttpRequest, textStatus) {
          $("#reset_button").click();
      },*/
      success : function(data){ 
          $('#myModal').append(data);
          $('#myModal').modal();
          /*if(data.err ==1 ) {    
              addMsg(data.msg,"alert alert-danger");
          }else {
            window.location = '<?php echo $this->Html->url(array("controller" => "bookings","action" => "dashboard","full_base"=>false));?>';
          }*/
      }
   });
}   
</script>