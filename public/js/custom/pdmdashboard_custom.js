 $(document).ready(function() {        	
		
	var garmentvalidator =$( "#productgroupsmaintenanceadd" ).validate({
  rules: {
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
		
	$(".deleteproductgroup").click(function(){	

		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	   	   	
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
			
 	});	
	
	
	$(".productgroup").click(function(){
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
				},
		error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
				
		});
	  });
		
		
});




