 $(document).ready(function() {   
 usertypetrigger();  
$(".addnewuniqueusers").click(function(){

		$("#uniqueuseradd")[0].reset();

		$('#editID').val(''); 

});



 var foldvalidator =$("#uniqueuseradd").validate({
  rules: {
	  userType:{
		   required: true,
	  },
	  'customercheckID[]':{
		    required: function(element){
            return $('.customercheckID:checked').length<1;
        }
	  },
	   OfficeFactoryName:{
		 required:true,  
	   },
	  
	   firstName: {
      required: true,
    },
	 lastName: {
      required: true,
    },
	 phoneNumber: {
      required: true,
    },
	email:{
		 required: true,
		 email:true
	},
	userName:{
		 required:true,	
	}
  }
});	
		
		
 		

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
	


		
$("input[name='region']").change(function(){

var radioVal = $("input[name='region']:checked").val();

var editID = $('#editID').val();
if(radioVal==1) {
	
$('.marketing').show();
$('.production').hide();

} else if(radioVal==2) {
	
$('.marketing').hide();
$('.production').show();

}
if(editID!='') {
if(radioVal==1) {
	
$('.marketing1').show();
$('.production1').hide();
} else if(radioVal==2) {
	
$('.marketing1').hide();
$('.production1').show();

}
}
});


	

	   $('.dataTables-example').DataTable({
        dom: 'Bfrtip',
       buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });


$('#rigionsshow').hide();
//$('#ddregions2').hide();
});


/*function countryChange()
  { 
	
	var selecthref=$("select[name='country'] option:selected").attr('drop-data');

	$.ajax({			   
				url      : selecthref,
				type     : 'POST',
				cache    : false,
				success  : function(data){	
				var message = JSON.parse(data);			
				$('#state').val(message[0]['id']);
				}
	 });
  }*/
  //Defect: new users.pdf
//Name: Bala-PHP Team
//hide the factory name and customer name depends upon usertypes
  $(".usertype_dropdown").change(function() {
          if($(this).val() == "9")
          {
              $(".customerlist_check").show();
			  $(".factorylist_check").show();
            
          }else if($(this).val() == "14")
          {
            $(".customerlist_check").show();
			 $(".factorylist_check").show();
          }
		  else
		  {
			   $(".customerlist_check").hide();
			   $(".factorylist_check").hide();
			  
		  }
   
});
function usertypetrigger()
{
 var usertypeid=$("#userType").val();
  if(usertypeid == "9")
          {
              $(".customerlist_check").show();
			  $(".factorylist_check").show();
            
          }else if(usertypeid == "14")
          {
            $(".customerlist_check").show();
			 $(".factorylist_check").show();
          }
		  else
		  {
			   $(".customerlist_check").hide();
			   $(".factorylist_check").hide();
			  
		  }
	
}
    $(".regions").change(function() {
								  
								  $('#rigionsshow').show();
			if(this.checked) {
				//Do stuff
				//alert("Testing");
				var id=$(this).val();
				//alert(id);
				if(id==1)
				{
				$("#ddregions1").css("display","block");	
				$("#ddregions2").css("display","none");
				}
				else if (id==2)
				{
			    $("#ddregions1").css("display","none");
				$("#ddregions2").css("display","block");
			
				}
				
			}
		});


 $(".activatuniqueuser").click(function(){
	 //alert("activated");

	   var href=$(this).data("href");	   
	   var activateval = [];
 		$('.hobbies_class:checked').each(function() {
   		activateval.push($(this).val());
	  });
	    if(activateval=="")
	   {
	   swal({
                
                title: "Please select the UniqueUser(s) to activate",
				 type: "error"
            });
	   }
	   
	   else 
	   {
	   swal({
  		title: "Are you sure to activate the selected UniqueUser(s)?",
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
	
	$(".deactivateuniqueuser").click(function(){
		
		//alert("deactivated");

		var href=$(this).data("href");
	   var deactivateval = [];
	   $('.hobbies_class:checked').each(function() {
   		deactivateval.push($(this).val());
	  });
	    if(deactivateval=="")
	   {
	   swal({
                
                title: "Please select the Unique user(s) to deactivate",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
	   	swal({
  		title: "Are you sure to deactivate the selected Unique user(s)?",
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
	
	$(".deleteuniqueuser").click(function(){
											

		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	    if(deleteval=="")
	   {
	   swal({
                
                title: "Please select the UniqueUser(s) to delete",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected UniqueUser(s)?",
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
	
$(".deletefacility").click(function(){ 
	 
	 var href=$(this).data("href");

	 
	    if(href!="")
	   
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected Unique Facility?",
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

$(".deleteuniqueusers").click(function(){  
	 
	 var href=$(this).data("href");
	 
	    if(href!="")
	   
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected Unique User?",
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

	 /*  $(document).ready(function() {
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