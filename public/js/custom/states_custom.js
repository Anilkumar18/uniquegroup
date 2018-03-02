 $(document).ready(function() {        	
		
$(".addnewstate").click(function(){
		$("#statesadd")[0].reset();
		$('#editID').val(''); 
		});

var foldvalidator =$( "#statesadd" ).validate({
  rules: {
    stateName: {
      required: true,
	  
    },
	country: {
      required: true,
	  
    }
  }
		});	


$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
	

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

   
