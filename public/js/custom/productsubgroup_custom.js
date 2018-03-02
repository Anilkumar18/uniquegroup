 $(document).ready(function() {        	
		
	var garmentvalidator =$( "#productsubgroupsmaintenanceadd" ).validate({
  rules: {
    productgroup : {
    required: true
  },
	subgroupCode: {
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
		
		


	$(".deleteproductsubgroup").click(function(){
										//alert("terstingh");	

		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	      	
		   	swal({
	  		title: "Are you sure to delete the Product Sub Group(s)?",
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




	$("#example1").DataTable();	
	
  // $("#subgroup").dataTable().api();
   //new $.fn.dataTable.Api("#subgroup");
	/*oTable = $('#subgroup').DataTable();   
	//pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})*/

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

	

	
		$(".productsubgroup").click(function(){
	   $("#productsubgroupsmaintenanceadd")[0].reset();
	   $('#editID1').val('');	
	  

	  });	
		 	
			
	  $(".editproductsubgroup").click(function(){
										//alert("subgroup");
	  var id=$(this).data("id");
	  //alert(id);
	  var selecthref=$(this).data("selecthref");	
	  
	 // alert(selecthref);
	  $("#productsubgroupsmaintenanceadd")[0].reset(); 
	 
	  $.ajax({			   
				url      : selecthref,
				type     : 'post',
				cache    : false,
				success  : function(data){
				 
				var message = JSON.parse(data);
				
				//alert(message[0]['id']);
				$('#editID1').val(message[0]['id']);
				
				//alert(message[0]['ProductSubGroupName']);
				$('#subgroupCode').val(message[0]['ProductSubGroupName']);
				
				$('select[name="productgroup"] option[value="'+message[0]['Product_groupID']+'"]').attr("selected","selected");
				
				},
		error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
				
		});
	  });
	