 $(document).ready(function() {        	

$(".addnewcustomerusers").click(function(){
		$("#customeruseradd")[0].reset();
		$('#editID').val(''); 
});
							
var userhref=$('#customeruseradd :input[name="userName"]').attr('data');

var foldvalidator =$( "#customeruseradd" ).validate({
  rules: {
	  
    customerName: {
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
         return $('#customeruseradd :input[name="userName"]').val();
         }
       	}
       }
    },
	 password: {
      required: true,
    },
	userType: {
      required: true,
    },
	suite: {
      required: true,
    },
	street: {
      required: true,
    },
	city: {
      required: true,
    },
	country: {
      required: true,
    },
	state: {
      required: true,
    },
	zipcode: {
      required: true,
    }
  }
		});	


 		

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
		
		


	

	/*$("#example1").DataTable();	

	$('#example1 thead input[name="select_all"]').on('click', function(e){
	      if(this.checked){
	         $('#example1 tbody input[type="checkbox"]:not(:checked)').trigger('click');
	      } else {
	         $('#example1 tbody input[type="checkbox"]:checked').trigger('click');
	      }

	      e.stopPropagation();
   		});*/
	$('.dataTables-example').DataTable({
        dom: 'Bfrtip',
       buttons: [
             'csv', 'excel', 'pdf', 'print'
        ]
    });


$(".deletecustomerusers").click(function(){ 
	 
	 var href=$(this).data("href");
	 
	    if(href!="")
	   
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected Customer User?",
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



function customerChange()
  { 
	
	var selecthref=$("select[name='customerName'] option:selected").attr('drop-data');
			$.ajax({			   
				url      : selecthref,
				type     : 'POST',
				cache    : false,
				success  : function(data){	
				var message = JSON.parse(data);			
				$('#suite').val(message[0]['Suite']);
				$('#street').val(message[0]['Street']);
				$('#city').val(message[0]['City']);
				$('#state').val(message[0]['StateID']);
				$('#country').val(message[0]['CountryID']);
				$('#zipcode').val(message[0]['ZIPcode']);
				},
				error: function (jqXHR, textStatus, errorThrown) {
				alert(textStatus);
				alert(errorThrown);
        	}
	 });
  }
  
  function countryChange()
  { 
	var selecthref=$("select[name='country'] option:selected").attr('drop-data');	
	
			$.ajax({			   
				url      : selecthref,
				type     : 'post',				
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);		

				var pLen,i;
				pLen=message[0].length;
				var pscodehtml=' <div class="col-md-3"><select id="state" name="state" class="form-control"><option value=""> Please Select State</option>';
				for (i=0;i<pLen;i++){
					if(message[0][i]['StateName']!='') {
					pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['StateName']+'</option>';
					}     
				}
				pscodehtml+='</select></div>';
				
                $('.statedisplay').html(pscodehtml);
				               
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        	}
				
		});
  }
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

 //Defect: 27-03-18 & 29-03-18
//Name: Bala-Uniquegroup Team
//Active and deactive account

 $(".activatcustomeruser").click(function(){
	 //alert("activated");

	  // var href=$(this).data("href");	
	   var href=$(this).find('a').data("href"); 
	   
	   if(href)
	   {
	    swal({
  		title: "Are you sure to activate the selected CustomerUser(s)?",
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
	  /* var activateval = [];
 		$('.hobbies_class:checked').each(function() {
   		activateval.push($(this).val());
	  });
	    if(activateval=="")
	   {
	   swal({
                
                title: "Please select the CustomerUser(s) to activate",
				 type: "error"
            });
	   }
	   
	   else 
	   {
	   swal({
  		title: "Are you sure to activate the selected CustomerUser(s)?",
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
	}*/
 	
 	}); 
	
	$(".deactivatecustomeruser").click(function(){
		
		//alert("deactivated");

		//var href=$(this).data("href");
		 var href=$(this).find('a').data("href"); 
		 if(href)
		 {
		 	swal({
  		title: "Are you sure to deactivate the selected Customer user(s)?",
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
		 
	   /*var deactivateval = [];
	   $('.hobbies_class:checked').each(function() {
   		deactivateval.push($(this).val());
	  });
	    if(deactivateval=="")
	   {
	   swal({
                
                title: "Please select the Customer user(s) to deactivate",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
	   	swal({
  		title: "Are you sure to deactivate the selected Customer user(s)?",
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
		}*/
 	});
	
	$(".deletecustomeruser").click(function(){
											

		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	    if(deleteval=="")
	   {
	   swal({
                
                title: "Please select the CustomerUser(s) to delete",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected CustomerUser(s)?",
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
	
 //Defect: 39
//Name: Vidhya-PHP Team
//Phone number validation-accept 11 digit
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
      		if(curchr<15){

      			$('#phoneerror').show();
      			pp.find("#addcustomers").attr("disabled", "disabled");
    			pp.find("#addcustomers").css('background-color','#2f75bb');
      		}else{
      			pp.find("#addcustomers").removeAttr("disabled");
      			$('#phoneerror').hide();
      		}

      });


});
  

