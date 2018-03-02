 $(document).ready(function() {        	
		
		var regionvalidator =$( "#marketingregionadd" ).validate({
  rules: {
 regionName: {
      required: true,
   minlength:2
  
    }
 
  }
});


 		$(".marketingregions").click(function(){
	  		$("#marketingregionadd")[0].reset();			
			$('#productioneditID').val('');
	  		});	

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
		
		$(".editregion").click(function(){
			
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
				//alert(message[0]['MarketingRegions']);
				$('#editID').val(message[0]['id']);
				$('#regionName').val(message[0]['MarketingRegions']);
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        	}
				
		});


	});
	


	$(".deletemarketingregion").click(function(){
											
		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	   	   	
		   	swal({
	  		title: "Are you sure to delete the selected Marketing/region(s)?",
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




