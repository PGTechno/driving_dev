<div class="tab-content">
   <div id="home" class="tab-pane fade in active" style="margin-left:5%;width:90%;">
      <div class="row">
         <div class="col-sm-12">
            <div class="card-box">
               <div class="pull-right" style="margin-top:7%;">
                  <a><img class="del" src="<?php echo $this->webroot?>img/front/delete.png"></a>
               </div>
            </div>
            <table id="userGrid" class="display responsive nowrap" cellspacing="0" width="100%">
            </table> 
         </div>
      </div>
   </div>
   <br><br>
</div>

<script type="text/javascript">
var searchIDs = [];
var delUrl = '<?php echo $this->Html->url(array("controller" => "inbox","action" => "deleteMessage"));?>';
   $(document).ready(function() {
       table = $('#userGrid').DataTable( {
           "processing": true,
           "serverSide": true,
           "responsive":true,
           //"lengthMenu": [10,20,50, 100],
           "pageLength": "<?=Configure::read('Site.admin_rec_per_pg');?>",
           //"filter":false,        
           "ajax": '<?php echo $this->Html->url(array("controller" => "inbox","action" => "index"));?>',
           "columns": [
                           { "name": "Message.id", "orderable":false,"searchable":false,'width':'2%', 'sClass': 'text-center'},
                           { "name": "Message.subject", "orderable":false,"searchable":false,'width':'20%', 'sClass': 'text-center'},
                           { "name": "Message.message", "orderable":false,"searchable":false,'width':'65%', 'sClass': 'text-center'},
                           //{ "name": "Message.lname", 'width':'13%'},
                           { "name": "Message.created", "orderable":false,"searchable":false,'width':'10%', 'sClass': 'text-center'},
                           
                       ],
           "order": [[3, "desc"]],  
       });
       
       $(".dataTables_filter").remove(); 

        $(document).on('click','.del',function(){
            searchIDs = $("#userGrid input:checkbox:checked").map(function(){
              return $(this).data('id');
            }).get();

            if(searchIDs !=[]){
               if(confirm("Are you sure to delete messages ?")){
                   $.ajax({
                      url : delUrl,
                      type: "POST",
                      data : JSON.stringify(searchIDs),
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
            }
            console.log(searchIDs);
        })
   });
</script>