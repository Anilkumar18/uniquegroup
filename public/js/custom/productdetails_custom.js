 $(document).ready(function() {        	
		
	


 		$(".addproductdetailsbutton").click(function(){
	  		$("#add_productdetailsadd")[0].reset();			
			$('#editID').val('');
	  		});	

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
		
		$(".editproductdetailscategory").click(function(){
			
			//alert("Testing");
			var id=$(this).data("valueid");
			var public_path=$(this).data("href");
			var selecthref=$(this).data("selecthref");
			
			/*$("#marketingregionadd")[0].reset();*/
			//alert(selecthref);
			 $.ajax({			   
				url      : selecthref,
				type     : 'POST',
				cache    : false,
				success  : function(data){
				//alert("Testing3");
				var message = JSON.parse(data);
				$('#editID').val(message[0]['id']);
				$('#fieldname').val(message[0]['fieldname']);
    
    $('select[name="productdetailcategory"] option[value="'+message[0]['categoryID']+'"]').attr("selected","selected");
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        	}
				
		});


	});
	



	 $(".activatmarketingregion").click(function(){

	   var href=$(this).data("href");	   
	   var activateval = [];
 		$('.hobbies_class:checked').each(function() {
   		activateval.push($(this).val());
	  });
	    if(activateval=="")
	   {
	   swal({
                
                title: "Please select the Marketing/region(s) to activate",
				 type: "error"
            });
	   }
	   
	   else 
	   {
	   swal({
  		title: "Are you sure to activate the selected Marketing/region(s)?",
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


	$(".deactivatemarketingregion").click(function(){

		var href=$(this).data("href");
	   var deactivateval = [];
	   $('.hobbies_class:checked').each(function() {
   		deactivateval.push($(this).val());
	  });
	    if(deactivateval=="")
	   {
	   swal({
                
                title: "Please select the Marketing/region(s) to deactivate",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
	   	swal({
  		title: "Are you sure to deactivate the selected Marketing/region(s)?",
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

	$(".deleteproductdetailscategory").click(function(){
											
		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	   	   	
		   	swal({
	  		title: "Are you sure to hide the field from product details?",
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
 	});

	

	

	

});




