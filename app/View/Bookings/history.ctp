<div class="tab-content">
   <div id="home" class="tab-pane fade in active" style="margin-left:5%;width:90%;">
      <div class="row">
         <div class="col-sm-12">
            <div class="card-box">
               <div class="pull-right" style="margin-top:7%;">
                  <!-- <a><img src="<?php echo $this->webroot?>img/front/delete.png"></a> -->
               </div>
            </div>
            <table id="bookingGrid" class="display responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>USER NAME</th>
                    <th>PACKAGE NAME</th>
                    <th>TRAINING HOURS</th>
                    <th>DATE & TIME </th>
                    <th>ACTION </th>
                  </tr>
                </thead>
                <!-- <tfoot>
                  <tr class="filter" width="100%">
                    <td></td>
                    <td> <input class="search_init" type="text" value="" placeholder="Title" name="title"> </td>
                    <td> <input class="search_init" type="text" value="" placeholder="Duration  (In minutes)" name="duration"> </td>
                    <td > <input class="search_init" type="text" value="" placeholder="Price ($)" name="price"> </td>
                    <td> <input class="search_init" type="text" value="" placeholder="User" name="fname"> </td>
                    <td > <input class="search_init" type="text" value="" placeholder="Date" name="start_time"> </td>
                    <td>
                        <select class="search_init" type="text" value="" name="status"> 
                            <option value="" selected="selected">Select</option>
                            <option value="0">Inactive</option>
                            <option value="1" >Active</option>
                        </select> 
                    </td>
                    <td valign="top">
                        <input type="button" id="search_button" class="btn btn-success btn-xs margin-bottom-5" value="Search">
                        <input type="button" id="reset_button" class="btn btn-danger btn-xs" value="Reset">
                    </td>
                  </tr>
                </tfoot>    -->
            </table> 
         </div>
      </div>
   </div>
   <br><br>
</div>

<script type="text/javascript">
   $(document).ready(function() {
       table = $('#bookingGrid').DataTable( {
           "processing": true,
           "serverSide": true,
           "responsive":true,
           //"lengthMenu": [10,20,50, 100],
           "pageLength": "<?=Configure::read('Site.admin_rec_per_pg');?>",
           //"filter":false,        
           "ajax": '<?php echo $this->Html->url(array("controller" => "bookings","action" => "history"));?>',
           "columns": [
                           { "name": "User.fname", "orderable":false,"searchable":false,'width':'10%', 'sClass': 'text-center'},
                           { "name": "Package.title", "orderable":false,"searchable":false,'width':'20%', 'sClass': 'text-center'},
                           { "name": "Package.duration", "orderable":false,"searchable":false,'width':'10%', 'sClass': 'text-center'},
                           { "name": "Booking.created", "orderable":false,"searchable":false,'width':'20%', 'sClass': 'text-center'},
                           { "name": "Booking.common" ,"orderable":false,"searchable":false,'width':'20%', 'sClass': 'text-center'}
                       ],
           "order": [[3, "desc"]],  
       });
       
       $(".dataTables_filter").remove(); 
   });
</script>