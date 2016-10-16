<style type="text/css">
    .header-btn{
        float: right;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title_for_layout."   (".$trainer['User']['fname'].")";?>

      </h1>
     </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-lg-12" style="overflow:scroll">
                                <?php 
                                //echo $this->Html->link('Add', array('controller' => 'bookings','action' => 'add_booking','full_base' => true,$uid),array('class'=>'btn btn-primary btn-flat header-btn'));
                                echo $this->Html->link('Back', array('controller' => 'users','action' => 'users','full_base' => true),array('class'=>'btn btn-warning btn-flat header-btn'));
                                ?>
                                <!-- START -->
                                <table id="userGrid" class="display responsive nowrap" cellspacing="0" width="100%">
                                  <thead>
                                  <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tfoot>
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
                                </tfoot> 
                                </table>  
                                <!--  END-->
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
      </div>
    </section>
  </div>

<script type="text/javascript">
var table;
$.extend( $.fn.dataTable.defaults, {
    responsive: true
} );
$(document).ready(function() {
    table = $('#userGrid').DataTable( {
        "processing": true,
        "serverSide": true,
        "responsive":true,
        //"lengthMenu": [10,20,50, 100],
        "pageLength": "<?=Configure::read('Site.admin_rec_per_pg');?>",
        //"filter":false,        
        "ajax": '<?php echo $this->Html->url(array("controller" => "bookings","action" => "admin_index_data","full_base"=>TRUE,$uid));?>',
        "columns": [
                        { "name": "Package.id", "orderable":false,"searchable":false,'width':'5%', 'sClass': 'text-center'},
                        { "name": "Package.title", 'width':'10%'},
                        { "name": "Package.duration", 'width':'5%'},
                        { "name": "Package.price", 'width':'5%'},
                        { "name": "User.fname", 'width':'10%'},
                        { "name": "Booking.start_time", 'width':'10%'},
                        { "name": "Package.status" ,"orderable":false,"searchable":true,'width':'8%', 'sClass': 'text-center'},
                        { "name": "Package.common" ,"orderable":false,"searchable":false,'width':'10%', 'sClass': 'text-center'}
                        
                    ],
        "order": [[1, "desc"]],  
        //"sScrollX": '100%'
    });
    
    $(".dataTables_filter").remove(); 
});

$("#search_button").click(function(){
  table.columns().eq( 0 ).each( function ( colIdx) {
    if($( 'input,select', table.column( colIdx ).footer().length )){
         table
        .column( colIdx )
        .search( $( 'input,select', table.column( colIdx ).footer() ).val());
    } 
  });
  table.draw();
});


 //reset search 
$("#reset_button").click(function(){
  table.columns().eq( 0 ).each( function ( colIdx) {
    if($( 'input', table.column( colIdx ).footer().length )){
      $( '.search_init', table.column( colIdx ).footer() ).val("");
           table
          .column( colIdx )
          .search("");
    } 
  });
  table.draw();
});   
     //to remove default filter


/*function changeUserStatus(id,status){
    URL = '<?php echo $this->Html->url(array("controller" => "users","action" => "change_status","admin"=>TRUE));?>';
    $.ajax({
        url : URL,
        type: "POST",
        data : ({id:id,status:status}),
        beforeSend: function (XMLHttpRequest) {
        },
        complete: function (XMLHttpRequest, textStatus) {
            $("#reset_button").click();
        },
        success : function(data){
            if(data ==1 ) {    
                $("#list").trigger("reloadGrid");
            }else {
                bootbox.alert("Error while changing the user status.", function() { });
            }
        }
    });
}*/

function change_status(id,status){
    var model = 'User';
    var field = 'status';
    status = status || 2;
    URL = '<?php echo $this->Html->url(array("controller" => "users","action" => "change_status","full_base"=>TRUE));?>';
    bootbox.confirm("Are you sure to do this action ?", function(res) {
        if(res){
            $.ajax({
                url : URL,
                type: "POST",
                data : ({id:id,status:status,model:model,field:field}),
                beforeSend: function (XMLHttpRequest) {
                },
                complete: function (XMLHttpRequest, textStatus) {
                    $("#reset_button").click();
                },
                success : function(data){
                    if(data ==1 ) {    
                        $("#userGrid").trigger("reloadGrid");
                    }else {
                        bootbox.alert("Error while changing the user status.");
                    }
                }
            });
        }
    });
    
}   
  
</script>


