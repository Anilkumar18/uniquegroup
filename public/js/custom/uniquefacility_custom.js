 $(document).ready(function() {   
$(".uniquefacility").click(function(){
		$("#addnewfacility")[0].reset();
		$('#editID').val(''); 
});

 var foldvalidator =$( "#addnewfacility" ).validate({
  rules: {
	  
	  factoryname:{
		   required: true,
	  },
	  regions:{
		  required:true,
	  },
	  marketingregions:{
		    require_from_group: [1, ".regions-group"]
	  },
	  productionregions:{
		   require_from_group: [1, ".regions-group"]
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

	  /* $(document).ready(function() {
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