 $(document).ready(function() {        	

$(".addnewvendorusers").click(function(){
		$("#vendoruseradd")[0].reset();
		$('#editID').val(''); 
});
		
 var userhref=$('#vendoruseradd :input[name="userName"]').attr('data');

 var foldvalidator =$( "#vendoruseradd" ).validate({
  rules: {
	 
	customerName: {
      required: true,
    }, 
    companyName: {
      required: true,
    },
	factoryName: {
      required: true,
    },
	firstName: {
      required: true,
    },
	lastName: {
      required: true,
    },
	 email: {
      required: true,
	  email:true
    },
	phoneNumber: {
      required: true,
    },
	 userName: {
      required: true,
	  remote: {  
         url: userhref,
         type: "post",
		 data: {
         usercheck: function() {
         return $('#vendoruseradd :input[name="userName"]').val();
         }
       	}
       }
    },
	 password: {
      required: true,
    },
	userType: {
      required: true,
    }
  }
		});	


 		

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
		
		


	

	  $('.dataTables-example').DataTable({
        dom: 'Bfrtip',
       buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });

$(".deletevendorusers").click(function(){  
	 
	 var href=$(this).data("href");
	 
	    if(href!="")
	   
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected Vendor User?",
	  		type: "warning",
	  		showCancelButton: true,
	  		confirmButtonColor: "#00ADEF",
	  		confirmButtonText: "Yes, do it!",
	  		closeOnConfirm: false
			},
			function(){
	  		document.thisForm.action=href;
			document.thisForm.submit();
			});
			}
 	});

});

$(document).ready(function() {
      $("#phoneNumber").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            var curchr = this.value.length;
            var curval = $(this).val();
            if(curchr==0){ 
            	var tt='+'+$(this).val();
            	$(this).val(tt);
            }
            if (curchr == 3) {
                $(this).val(curval + " ");
            } else if (curchr == 7) {
                $(this).val(curval + " ");
            }else if (curchr == 11) {
                $(this).val(curval + " ");
            }
            $(this).attr('maxlength', '16');
        });

      $("#phoneNumber").blur(function (e) {
      		debugger;
      		var curchr = this.value.length;
var pp=$(this).parent().parent().parent().parent().parent();
      		if(curchr<16){

      			$('#phoneerror').show();
      			pp.find("#addcustomers").attr("disabled", "disabled");
    			pp.find("#addcustomers").css('background-color','#2f75bb');
      		}else{
      			pp.find("#addcustomers").removeAttr("disabled");
      			$('#phoneerror').hide();
      		}

      });


});