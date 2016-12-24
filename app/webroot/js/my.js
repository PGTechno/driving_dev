$(function () { 
	/*$('#example2').DataTable({
	  "paging": true,
	  "lengthChange": false,
	  "searching": false,
	  "ordering": true,
	  "info": true,
	  "autoWidth": false
	});*/

	/*$.validator.setDefaults({
	  highlight: function(element) {
	      $(element).closest('.form-group').addClass('has-error');
	  },
	  unhighlight: function(element) {
	      $(element).closest('.form-group').removeClass('has-error');
	  },
	  errorElement: 'div',
	  errorClass: 'error-message',
	  errorPlacement: function(error, element) {
	      if(element.parent('.input-group').length) {
	          error.insertAfter(element.parent());
	      } else {
	          error.insertAfter(element);
	      }
	  }
	});*/

	$(document).on('click','.openModal',function(){
        var url = $(this).data('url');
        $.get(url)
        .done(function(data) {
            $('#myModal').html(data);
        });
    });

    $(document).on('submit','#BookingUwizardForm',function(e){
        e.preventDefault();
        //alert($(this).attr('action')); exit;
        var URL = $(this).attr('action');
        $.ajax({
            url : URL,
            type: "POST",
            data : $(this).serialize(),
            dataType : 'JSON',
            success : function(data){ 
                if(data.err ==1 ) {    
                    addMsg(data.msg,"alert alert-danger");
                }else {
                    $.ajax({
                        url : paymntUrl,
                        type: "GET",
                        data : data.data,
                        success : function(data){ 
                            $('#myModal').html('');
                            $('#myModal').html(data);
                            //$('#myModal').modal();
                            
                        }
                    });               
                }
            }
        });
    })
    /**/


	$('#myModal').on('hidden.bs.modal', function (e) {
    $('#myModal .modal-dialog').remove();
	})
	
	selectLeftBar();
	hideAlert();

  calcHeight();
  $(window).resize(function() {
     calcHeight();
  }).load(function() {
     calcHeight();
  });

  $('.date, .modal .date').datetimepicker();
  $('.time,.modal .time').datetimepicker({
      format: 'LT'
  });

  $(document).on('focus','.date',function(){
      $(this).datetimepicker();
  })
  
  $('.file_upload').click(function(){
      $('.file_upload_hidden').click();
  })

  $('.file_upload_hidden').change(function(){
      imagePreview(this);  
  })

});



function getPartialView(obj){
	var url = $(obj).data('url');
	$.get(url)
	.done(function(data) {
    	$('#myModal').html(data);
  	});
}

function selectLeftBar(){
	$(".sidebar-menu li").removeClass('active');
	$(".sidebar-menu li").find('a[href*="'+window.location.href+'"]').parents('.treeview').click();
	$(".sidebar-menu li").find('a[href*="'+window.location.href+'"]').parents('.treeview').addClass('active');
	$(".sidebar-menu li").find('a[href*="'+window.location.href+'"]').parent('li').addClass('active');
}

function hideAlert(){
	$(".alert").fadeTo(2000, 500).slideUp(500, function(){
	    $("#success-alert").alert('close');
	});
}

function imagePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.file_upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

/*--------------FB function start-------------------*/
  function chkLoginStatus() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  function statusChangeCallback(response) {
    if (response.status === 'connected') {
    	fetchUserInfo();
    }else{
        callLogin();
    }
  }

  function fetchUserInfo(){
     FB.api('/me', {fields: 'name, email'}, function(response) {
       	var URL = '/driving/users/fblogin';
       	$.ajax({
       		url:URL,
       		type:'POST',
       		dataType: "json",
       		data : response,
       		success : function(data){
       			if(data.err==0){
       				window.location = "/driving/users/dashboard";//'<?php echo $this->Html->url(array("controller" => "users","action" => "dashboard","full_base"=>false));?>';
       			}else{
       				alert(data.msg);	
       			}
       			//console.log(data);
       		}
        })
     });
  }

  function callLogin(){
    FB.login(function(response) {
        if (response.authResponse) {
          fetchUserInfo();
         /*FB.api('/me', function(response) {
           console.log('Good to see you, ' + response.name + '.');
         });*/
        } else {
          console.log('User cancelled login or did not fully authorize.');
        }
    },{scope: 'email,user_likes'});
  }
/*--------------FB function end-------------------*/
//addMsg("Test messages","alert alert-success")
 
function addMsg(msg,cls){ 
    var msg = '<div class="'+cls+'"> <a href="#" class="close" data-dismiss="alert" >&times;</a><strong></strong>'+msg+'</div>';
    var ele = $('.errDiv').append(msg);
    window.setTimeout(function() {
        $(".alert").fadeTo(1500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 3000);
}

var calcHeight = function() {
   var headerDimensions = $('.preview__header').height();
   $('.full-screen-preview__frame').height($(window).height() - headerDimensions);
}

/*///////////////////*/

