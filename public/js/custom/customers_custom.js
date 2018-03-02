 $(document).ready(function() {        	

$(".addnewcustomer").click(function(){
		$("#customersadd")[0].reset();
		$('#editID').val(''); 
});


var foldvalidator =$( "#customersadd" ).validate({
  rules: {
    customername: {
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
	 email: {
      required: true,
	  email:true
	  
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
	  
    },
    Warehouse_Name: {
      required: true,
    },
    Warehouse_Suite: {
      required: true,
    },
    Warehouse_street: {
      required: true,
    },
    Warehouse_city: {
      required: true,
    },
    Warehouse_CountryID: {
      required: true,
    },
    Warehouse_StateID: {
      required: true,
    },
    Warehouse_Zipcode: {
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

$(".deletecustomers").click(function(){ 
	 
	 var href=$(this).data("href");
	 
	    if(href!="")
	   
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected Customer?",
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
  function countryChanges()
  { 
    
  
  var selecthref=$("select[name='Warehouse_CountryID'] option:selected").attr('drop-data'); 
  
      $.ajax({         
        url      : selecthref,
        type     : 'post',        
        cache    : false,
        success  : function(data){
        var message = JSON.parse(data);   

        var pLen,i;
        pLen=message[0].length;
        var pscodehtml=' <div class="col-md-3"><select id="Warehouse_StateID" name="Warehouse_StateID" class="form-control"><option value=""> Please Select State</option>';
        for (i=0;i<pLen;i++){
          if(message[0][i]['StateName']!='') {
          pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['StateName']+'</option>';
          }     
        }
        pscodehtml+='</select></div>';
        
                $('.statedisplay1').html(pscodehtml);
                       
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