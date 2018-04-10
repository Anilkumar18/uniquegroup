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

/*$(document).ready(function() {
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


});*/


  //Defect: new users.pdf
         //Name: Bala-php Team
         //change customer name depends upon change vendor and factory names as alphabetic order
  
  function customerChange()
  { 
  	//alert("customerchange");
	
	var selecthref=$("select[name='customerName'] option:selected").attr('drop-data');	
	
	//alert(selecthref);
	
			$.ajax({			   
				url      : selecthref,
				type     : 'post',				
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);
				
					

				var pLen,i,j;
				pLen=message[0].length;
				var selecturl=$(".spandiv").html();
				
				debugger;
				var pscodehtml=' <div class="col-md-3"><select id="companyName" name="companyName" class="form-control" onchange="vendorChange();"><option value=""> Please select a Vendor</option>';
				for (i=0;i<pLen;i++){
					if(message[0][i]['CompanyName']!='') {
						
					pscodehtml+='<option value="'+message[0][i]['id']+'" drop-data="'+selecturl+'/'+message[0][i]['Factory1ID']+'">'+message[0][i]['CompanyName']+'</option>';
					}     
				}
				pscodehtml+='</select></div>';
				
				
                $('.vendordisplay').html(pscodehtml);
				               
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        	}
				
		});
  }
  
  function vendorChange()
  {
	  
	// alert("vendorchange");  
	 var selecthref=$("select[name='companyName'] option:selected").attr('drop-data');	
	
	  // alert(selecthref);
	
			$.ajax({			   
				url      : selecthref,
				type     : 'post',				
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);
				
					

				var pLen,i,j;
				pLen=message[0].length;
				var pscodehtml=' <div class="col-md-3"><select id="factoryName" name="factoryName" class="form-control"><option value=""> Please select a Factory</option>';
				for (i=0;i<pLen;i++){
					if(message[0][i]['factoryName']!='') {
						
					pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['factoryName']+'</option>';
					}     
				}
				pscodehtml+='</select></div>';
				
				
                $('.factorydisplay').html(pscodehtml);
				               
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        	}
				
		});
  }
//vidhya-02-04-2018
//show password
  function showpwd() {

var a=document.getElementById("pwd");
var b=document.getElementById("EYE");
if (a.type=="password")  {
a.type="text";
b.src="https://i.stack.imgur.com/waw4z.png";
}
else {
a.type="password";
b.src="https://i.stack.imgur.com/Oyk1g.png";
}
} 
  
   $(".activatvendoruser").click(function(){
	 //alert("activated");

	   //var href=$(this).data("href");	
	   var href=$(this).find('a').data("href"); 
	   if(href!="")
	   
	   {
	   swal({
  		title: "Are you sure to activate the selected VendorUser(s)?",
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
	  /*var activateval = [];
 		$('.hobbies_class:checked').each(function() {
   		activateval.push($(this).val());
	  });
	    if(activateval=="")
	   {
	   swal({
                
                title: "Please select the VendorUser(s) to activate",
				 type: "error"
            });
	   }
	   
	   else 
	   {
	   swal({
  		title: "Are you sure to activate the selected VendorUser(s)?",
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
	
	$(".deactivatevendoruser").click(function(){
		
		//alert("deactivated");

		//var href=$(this).data("href");
		 var href=$(this).find('a').data("href"); 
		 
		 if(href)
		 {
			swal({
  		title: "Are you sure to deactivate the selected VendorUser(s)?",
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
		 
	  /* var deactivateval = [];
	   $('.hobbies_class:checked').each(function() {
   		deactivateval.push($(this).val());
	  });
	    if(deactivateval=="")
	   {
	   swal({
                
                title: "Please select the VendorUser(s) to deactivate",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
	   	swal({
  		title: "Are you sure to deactivate the selected VendorUser(s)?",
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
	
	$(".deletevendoruser").click(function(){
											

		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	    if(deleteval=="")
	   {
	   swal({
                
                title: "Please select the VendorUser(s) to delete",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected VendorUser(s)?",
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