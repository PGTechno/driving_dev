<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title_for_layout;?>
        <!-- <small>Preview</small> -->
      </h1>
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!--<div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div> -->
            <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-users fa-fw"></i> Edit User
                                </h3>
                            </div> -->
                            <div class="panel-body">
                                <div class="col-lg-10">
                                  <?php  echo $this->Form->create('Booking',array('class'=>'form-horizontal style-form','enctype'=>'multipart/form-data','validate'));?>
                                    
                                            <?php echo $this->Form->hidden('id'); //echo $this->Form->hidden('user_id');?>
                                            <div class="form-group">
                                                <?php echo $this->Form->label('Package',null,array('class'=>'col-md-3 control-label'));?>
                                                <div class="col-md-7">
                                                    <?php echo $this->Form->input('package_id',array('options'=>$packageOptions,'class'=>'form-control','required'=>false,'label'=>false,'div'=>false));?>
                                                </div>    
                                            </div>

                                            <div class="form-group">
                                                <?php echo $this->Form->label('User',null,array('class'=>'col-md-3 control-label'));?>
                                                <div class="col-md-7">
                                                    <?php echo $this->Form->input('user_id',array('options'=>$userOptions,'class'=>'form-control','required'=>false,'label'=>false,'div'=>false));?>
                                                </div>    
                                            </div>

                                            <div class="form-group">
                                                <?php echo $this->Form->label('Start Time',null,array('class'=>'col-md-3 control-label'));?>
                                                <div class="col-md-7">
                                                    <?php echo $this->Form->input('start_time',array('type'=>'text','class'=>'form-control','label'=>false,'div'=>false));?>
                                                </div>    
                                            </div>
                                            
                                            
                                             <div class="form-group">
                                                <?php echo $this->Form->label('Price',null,array('class'=>'col-md-3 control-label'));?>
                                                <div class="col-md-7">
                                                    <?php echo $this->Form->input('booking_amount',array('class'=>'form-control','label'=>false,'div'=>false));?>
                                                </div>    
                                            </div>
                                            
                                            

                                            <div class="form-group">
                                                <?php $options=array(0=>'Inactive',1=>'Active')?>
                                                <?php echo $this->Form->label('Status',null,array('class'=>'col-md-3 control-label'));?>
                                                <div class="col-md-7">
                                                    <?php echo $this->Form->input('status',array('options'=>$options,'class'=>'form-control','required'=>false,'label'=>false,'div'=>false));?>
                                                </div>    
                                            </div>

                                    </div> 
                                    <div class="col-lg-10">
                                      <div class="form-group">
                      <?php //echo $this->Form->label('',null,array('class'=>'col-md-3 control-label'));?>
                                            <div  class="col-md-3 control-label"></div>
                                            <div class="col-md-7">
                                                <?php echo $this->Form->submit('Save',array('class'=>'btn btn-primary','label'=>false,'div'=>false));?>
                                                <?php
                                                echo $this->Html->link('Cancel',array('controller'=>'bookings','action'=>'index','full_base'=>true,$uId),array('class'=>'btn btn-warning')
                          //'Are You sure to do that ? '
                        );
                        ?>
                                            </div>    
                                        </div>
                                    </div> 
                                    <?php echo $this->Form->end();?>  
                            </div>
                        </div>
                    </div>
            </div>        
                  
          </div>
          <!-- /.box -->
          
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
      $(document).ready(function(){
          //$('#BookingStartTime').Datepicker();
      })
      $('#PackageAdminAddPackageForm').validate({ // initialize the plugin
          rules: {
              // "data[Package][title]": {
              //     required: true,
              //     minlength: 5
              // },
              // "data[Package][description]": {
              //     required: true,                  
              // },
              // "data[Package][price]": {
              //   required: true,
              //   money : true
              // },
              /*"data[User][user_image]": {
                required: true,
              }*/
          },
          messages: {
            /*"data[Package][title]": {required:"This field is required.",minlength:"Field should have minimum 5 charecter."},
            "data[Package][description]": {required: "This field is required."},
            "data[Package][price]": {required: "This field is required.",money:"Please enter valid price value."},*/
            //"data[User][user_image]": {required: "This field is required."},
          },
          /*errorElement:'div',
          errorClass:'form-error',
          validClass:'form-success',
          errorPlacement: function(error, element) {
            error.insertAfter(element);
          },
          highlight: function (element, errorClass, validClass) { 
            $(element).parents("div.control-group").addClass(errorClass).removeClass(validClass); 
          }, 
          unhighlight: function (element, errorClass, validClass) { 
            $(element).parents(".error").removeClass(errorClass).addClass(validClass); 
          },*/
      });
       $('#PackageAdminAddPackageForm').validate();
  </script>