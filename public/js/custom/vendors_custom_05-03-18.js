 $(document).ready(function() {      
							
$(".addnewvendor").click(function(){
		$("#vendorsadd")[0].reset();
		$("#officeadd")[0].reset();
		$('#editID').val(''); 
});

		
var vendor =$( "#vendorsadd" ).validate({
 	 rules: {
	  customername:{
		   required: true,
	  },
	  companyname:{
		   required: true,
	  },
	  countryofoperations1:{
		   required: true,
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
	factoryname:{
	   required:true,	
	},
	suite:{
		 required:true,	
	},
	street:{
		required:true,	
	},
	city:{
		required:true,	
	},
	country:{
		required:true,	
	},
	state:{
		required:true,	
	},
	zipcode:{
		required:true,	
	},
	factory1:{
		required:true,
	},
	invoice_address:{
		required:true,
	},
	delivery_address:{
		required:true,
	},
	deliverymethod:{
		required:true,
	}
	
  }
});	
 
  var factoryhref=$('#officeadd :input[name="OFfactoryName"]').attr('data');
  
  var officeAddress =$( "#officeadd" ).validate({
  rules: {
	  
	 OFfactoryName:{
      required: true,
	  remote: {  
         url: factoryhref,
         type: "post",
		 data: {
         factorycheck: function() { 
         return $('#officeadd :input[name="OFfactoryName"]').val();
         }
       	}
       }
    },
	  companyname:{
		   required: true,
	  },
	  OFproductionRegion:{
		   required: true,
	  },
	 OFfirstName: {
      required: true,
	  
     },
	 OFlastName: {
      required: true,
	  
    },
	 OFphno: {
      required: true,
	  
    },
	OFemail:{
		 required: true,
		 email:true
	},
	OFsuite:{
	   required:true,	
	},
	OFstreet:{
		 required:true,	
	},
	OFcity:{
		required:true,	
	},
	OFcountry:{
		required:true,	
	},
	OFstate:{
		required:true,	
	},
	OFzipcode:{
		required:true,	
	}
	
  }
 }); 

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
		
		
/*$("#addcountryofoperations").click(function(){
								
								$('.countryLabel').html('Country of Operation 1<span class="mandatory_fields">*</span>');
								$('.showCountry1').show();
								$('#addcountryofoperations').hide();
								
								});*/
$("#addfactory").click(function(){
								$("#officeadd")[0].reset();
								 $('#myModal').modal({
												show: true
												
											});
								});
	

	   $('.dataTables-example').DataTable({
        dom: 'Bfrtip',
       buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });

$(".deletevendors").click(function(){ 
	 
	 var href=$(this).data("href");
	 
	    if(href!="")
	   
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected Vendor?",
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
  
  function OFcountryChange()
  { 
  	
	
	var selecthref=$("select[name='OFcountry'] option:selected").attr('drop-data');	
	
			$.ajax({			   
				url      : selecthref,
				type     : 'post',				
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);		
				var pLen,i;
				pLen=message[0].length;
				
				var pscodehtml='<select id="OFstate" name="OFstate" class="form-control"><option value=""> Please Select State</option>';
				for (i=0;i<pLen;i++){
					if(message[0][i]['StateName']!='') {
					pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['StateName']+'</option>';
					}     
				}
				pscodehtml+='</select>';
				
                $('.OFstatedisplay').html(pscodehtml);
				               
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        	}
				
		});
  }
         //Defect: New_pdf no:2
         //Name: Vidhya-php Team
         //Phone number validation length
  
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

      $("#OFphno").keypress(function (e) {
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

      $("#OFphno").blur(function (e) {
      		debugger;
      		var curchr = this.value.length;
var pp=$(this).parent().parent().parent().parent().parent();
      		if(curchr<16){

      			$('#OFphoneerror').show();
      			pp.find("#logosubmit").attr("disabled", "disabled");
    			pp.find("#logosubmit").css('background-color','#2f75bb');
      		}else{
      			pp.find("#logosubmit").removeAttr("disabled");
      			$('#OFphoneerror').hide();
      		}

      });

      var fruits = [];

$("#factory1 option").each(function()
{
    
fruits.push(parseInt($(this).val()));
});

$("#officesubmit").click(function(){ 
	
	var href=$('#officeURL').val();  
	
	var OFfactoryName=$('#OFfactoryName').val();
	
	var OFproductionRegion=$('#OFproductionRegion').val();
	
	var OFfirstName=$('#OFfirstName').val();
	
	var OFlastName=$('#OFlastName').val();
	
	var OFphno=$('#OFphno').val();
	
	var OFemail=$('#OFemail').val();
	
	var OFsuite=$('#OFsuite').val();
	
	var OFstreet=$('#OFstreet').val();
	
	var OFcity=$('#OFcity').val();
	
	var OFcountry=$('#OFcountry').val();
	
	var OFstate=$('#OFstate').val();
	
	var OFzipcode=$('#OFzipcode').val();
	
	

	$.ajax({			   
				url      : href,
				type     : 'post',
				data: {OFfactoryName:OFfactoryName,OFproductionRegion:OFproductionRegion,OFfirstName:OFfirstName,OFlastName:OFlastName,OFphno:OFphno,OFemail:OFemail,OFsuite:OFsuite,OFstreet:OFstreet,OFcity:OFcity,OFcountry:OFcountry,OFstate:OFstate,OFzipcode:OFzipcode},
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);		
				var pLen,i;
				pLen=message[0].length;				
				$('.logoutSucc').text('Office / Factory address added successfully');
				$(".logoutSucc").addClass("box-success");
				$(".logoutSucc").removeClass("box_warning");
				

debugger;
				$('.addr_field1').empty();
				var pscodehtml='<select name="factory1" id="factory1" class="form-control"><option value="">Please Select Factory1</option>';
				for (i=0;i<pLen;i++){
					if(message[0][i]['factoryName']!='') {
						if($.inArray( message[0][i]['id'], fruits)==-1){
							pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['factoryName']+'</option>';
						}
	//pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['factoryName']+'</option>';
					}     
				}
				pscodehtml+='</select>';
                $('.addr_field1').html(pscodehtml);
				
				$('.addr_field2').empty();
				var pscodehtml='<select name="factory2" id="factory2" class="form-control"><option value="">Please Select Factory2</option>';
				for (i=0;i<pLen;i++){
					if($.inArray( message[0][i]['id'], fruits)==-1){
							pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['factoryName']+'</option>';
						}     
				}
				pscodehtml+='</select>';
                $('.addr_field2').html(pscodehtml);
				
				$('.addr_field3').empty();
				var pscodehtml='<select name="invoice_address" id="invoice_address" class="form-control"><option value="">Please Select Invoice Address</option>';
				for (i=0;i<pLen;i++){
					if($.inArray( message[0][i]['id'], fruits)==-1){
							pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['factoryName']+'</option>';
						}    
				}
				pscodehtml+='</select>';
                $('.addr_field3').html(pscodehtml);
				
				$('.addr_field4').empty();
				var pscodehtml='<select name="delivery_address" id="delivery_address" class="form-control"><option value="">Please Select Delivery Address</option>';
				for (i=0;i<pLen;i++){
					if($.inArray( message[0][i]['id'], fruits)==-1){
							pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['factoryName']+'</option>';
						}     
				}
				pscodehtml+='</select>';
                $('.addr_field4').html(pscodehtml);
				                 
				}
				
		});

	});


    var counter = 2;

    $("#addButton").click(function () {
									
	var selecthref=$(this).attr('data');	
		$.ajax({			   
				url      : selecthref,
				type     : 'post',				
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);		
				var pLen,i;
				pLen=message[0].length;
	
	$('.countryLabel').html('Country of Operation 1<span class="mandatory_fields">*</span>');
	if(counter>3){
            $('#addButton').hide();
	}

	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);

var pscodehtml='<row class="col-md-12"><div class="form-group clsformelements"><label for="countryofoperations'+ counter + '" class="col-md-3">Country of Operation '+ counter + '</label><div class="col-md-3"><select  id="countryofoperations'+ counter + '" name="countryofoperations'+ counter + '" class="form-control"><option value="">Please Select Country</option>';
				for (i=0;i<pLen;i++){
					pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['Country']+'</option>';
				}
				pscodehtml+='</select></div></div></row>';
				
				newTextBoxDiv.html(pscodehtml);
				
				newTextBoxDiv.appendTo("#TextBoxesGroup");


			counter++;
				               
				}
				
		});							
									

     });

$("#removeButton").click(function () { 
	if(counter==3){
		$('.countryLabel').html('Country of Operation<span class="mandatory_fields">*</span>');
         $('#addButton').show();
		 $('#removeButton').show();
       }
	counter--;

        $("#TextBoxDiv" + counter).remove();

     });

});
