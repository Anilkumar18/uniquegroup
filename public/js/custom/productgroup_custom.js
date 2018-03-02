 $(document).ready(function() {        	
		
	var garmentvalidator =$( "#productgroupsmaintenanceadd" ).validate({
  rules: {
     chainID : {
    required: true
  },

    fibreContentsID : {
    required: true
  },
	groupCode: {
      required: true,
	  minlength:2
	 
    }
	
  }
});
 		

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
		
		



	 $(".activatproductgroup").click(function(){
											  
	   var href=$(this).data("href");	
	   alert(href);
	   var activateval = [];
 		$('.hobbies_class:checked').each(function() {
   		activateval.push($(this).val());
	  });
	    if(activateval=="")
	   {
	   swal({
                
                title: "Please select the Product group(s) to activate",
				 type: "error"
            });
	   }
	   
	   else 
	   {
	   swal({
  		title: "Are you sure to activate the Product group(s)?",
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


	$(".deactivateproductgroup").click(function(){
												
												alert("terstingh");
		var href=$(this).data("href");
	   var deactivateval = [];
	   $('.hobbies_class:checked').each(function() {
   		deactivateval.push($(this).val());
	  });
	    if(deactivateval=="")
	   {
	   swal({
                
                title: "Please select the Product Group(s) to deactivate",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
	   	swal({
  		title: "Are you sure to deactivate the selected Product Group(s)?",
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

	$(".deleteproductgroup").click(function(){
										alert("terstingh");	

		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	    if(deleteval=="")
	   {
	   swal({
                
                title: "Please select the Product Group(s) to delete",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the Product Group(s)?",
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

      // Prevent click event from propagating to parent
      e.stopPropagation();
   	});

});

	

	
		$(".addnewproductgroup").click(function(){
	   $("#productgroupsmaintenanceadd")[0].reset();
	   $('#editID').val('');	
	  

	  });	
		 	
			
	  $(".editproductgroup").click(function(){
											//alert("trestoing");
	  var id=$(this).data("id");
	 // alert(id);
	  var selecthref=$(this).data("selecthref");	
	  
	  //alert(selecthref);
	  $("#productgroupsmaintenanceadd")[0].reset(); 
	 
	  $.ajax({			   
				url      : selecthref,
				type     : 'post',
				cache    : false,
				success  : function(data){
				 
				var message = JSON.parse(data);
				$('#editID').val(message[0]['id']);
				$('#groupCode').val(message[0]['ProductGroup']);
				$('select[name="chainID"] option[value="'+message[0]['chainID']+'"]').attr("selected","selected");
				$('select[name="chainID"]').attr("disabled","disabled");
				},
		error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
				
		});
	  });
	