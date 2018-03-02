 $(document).ready(function() {        	
		
		var chainvalidator =$( "#usertypeadd" ).validate({
		  rules: {
		    userType: {
		      required: true,
			   minlength:3
		    }
			
		  }
		});


 		$(".addnewusertype").click(function(){
	  		$("#usertypeadd")[0].reset();			
			$('#editID').val('');
	  	});	

		$.ajaxSetup({
  			headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			}
		})
		
		$(".editusertype").click(function(){
			
			var id=$(this).data("valueid");
			var public_path=$(this).data("href");
			var selecthref=$(this).data("selecthref");
			
			$("#usertypeadd")[0].reset();
			
			 $.ajax({			   
				url      : selecthref,
				type     : 'POST',
				cache    : false,
				success  : function(data){
				
				var message = JSON.parse(data);
				
				$('#editID').val(message[0]['id']);
				$('#userType').val(message[0]['userType']);
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        	}
				
		});


	});
	



	 $(".activatusertype").click(function(){

	   var href=$(this).data("href");	   
	   var activateval = [];
 		$('.hobbies_class:checked').each(function() {
   		activateval.push($(this).val());
	  });
	    if(activateval=="")
	   {
	   swal({
                
                title: "Please select the usertype(s) to activate",
				 type: "error"
            });
	   }
	   
	   else 
	   {
	   swal({
  		title: "Are you sure to activate the selected usertype(s)?",
  		type: "warning",
  		showCancelButton: true,
  		confirmButtonColor: "#DD6B55",
  		confirmButtonText: "Yes, do it!",
  		closeOnConfirm: false
		},
		function(){
  		document.thisForm.action=href;
		document.thisForm.submit();
		});
	}
 	
 	}); 


	$(".deactivateusertype").click(function(){

		var href=$(this).data("href");
	   var deactivateval = [];
	   $('.hobbies_class:checked').each(function() {
   		deactivateval.push($(this).val());
	  });
	    if(deactivateval=="")
	   {
	   swal({
                
                title: "Please select the usertype(s) to deactivate",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
	   	swal({
  		title: "Are you sure to deactivate the selected usertype(s)?",
  		type: "warning",
  		showCancelButton: true,
  		confirmButtonColor: "#DD6B55",
  		confirmButtonText: "Yes, do it!",
  		closeOnConfirm: false
		},
		function(){
  		document.thisForm.action=href;
		document.thisForm.submit();
		});
		}
 	});

	$(".deleteusertype").click(function(){

		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	    if(deleteval=="")
	   {
	   swal({
                
                title: "Please select the usertype(s) to delete",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected usertype(s)?",
	  		type: "warning",
	  		showCancelButton: true,
	  		confirmButtonColor: "#DD6B55",
	  		confirmButtonText: "Yes, do it!",
	  		closeOnConfirm: false
			},
			function(){
	  		document.thisForm.action=href;
			document.thisForm.submit();
			});
			}
 	});

	

	$("#example1").DataTable();	

	$('#example1 thead input[name="select_all"]').on('click', function(e){
	      if(this.checked){
	         $('#example1 tbody input[type="checkbox"]:not(:checked)').trigger('click');
	      } else {
	         $('#example1 tbody input[type="checkbox"]:checked').trigger('click');
	      }

	      e.stopPropagation();
   		});


});




