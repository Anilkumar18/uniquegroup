 $(document).ready(function() {        	
$(".addnewcustomer").click(function(){
		$("#customersadd")[0].reset();
		$('#editID').val(''); 
});


var symbolvalidator =$( "#productgroupsmaintenanceadd" ).validate({
  rules: {
     englishDesc : {
    required: true
  },
 
   poName : {
    required: true
  },

 colorCode: {
      required: true
  
    },

 basicColor: {
      required: true
  
    },
frenchColor:{
   required: true
},
/*
fallallColour:{
   required: true
},
outerWear:{
   required: true
},
activeColor:{
   required: true
},
sleepWear:{
   required: true
},
healthWear:{
   required: true
}*/
}
});


   $(".activatsymbol").click(function(){
   var href=$(this).find('a').data("href");
   if(href)
   {
     swal({
      title: "Are you sure to activate the selected Symbol(s)?",
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


  $(".deactivatesymbol").click(function(){
    var href=$(this).find('a').data("href");
    if(href)
    {
    swal({
      title: "Are you sure to deactivate the selected Symbol(s)?",
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





 		

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
		
		
$(".fillpricesticker").click(function(){
                   
    var id=$(this).data("id");

    var selecthref=$(this).data("selecthref");  
    
    //alert(selecthref);
    $("#productgroupsmaintenanceadd")[0].reset(); 
   
    $.ajax({         
        url      : selecthref,
        type     : 'get',
        cache    : false,
        success  : function(data){
         
        var message = JSON.parse(data);
        $('#editID').val(message[0]['id']);
        $('#poName').val(message[0]['poName']);
        $('#colorCode').val(message[0]['colorCode']);
        $('#basicColor').val(message[0]['basicColor']);
        $('#frenchColor').val(message[0]['frenchColor']);
        $('#fallallColour').val(message[0]['fallallColour']);
        $('#outerWear').val(message[0]['outerWear']);
        $('#activeColor').val(message[0]['activeColor']);
        $('#sleepWear').val(message[0]['sleepWear']);
        $('#healthWear').val(message[0]['healthWear']);
        },
    error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
        
    });
    });


    
$(".viewspricesticker").click(function(){

       
    var id=$(this).data("id");
       
   
    var selecthref=$(this).data("selecthref");  
 
    $.ajax({         
        url      : selecthref,
        type     : 'get',
        cache    : false,
        success  : function(data){
         
        var message = JSON.parse(data); 
        debugger;
        $('#viewponame').val(message[0]['poName']);
        $('#viewcolorcode').val(message[0]['colorCode']);
        $('#viewbasiccolor').val(message[0]['basicColor']);
        $('#viewfrenchcolor').val(message[0]['frenchColor']);
        $('#viewfallallcolour').val(message[0]['fallallColour']);
        $('#viewouterwear').val(message[0]['outerWear']);
        $('#viewactivecolor').val(message[0]['activeColor']);
        $('#viewsleepwear').val(message[0]['sleepWear']);
        $('#viewhealthwear').val(message[0]['healthWear']);
        },
    error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
        
    });
    });




	$(".productpricesticker").click(function(){
    $("#productgroupsmaintenanceadd")[0].reset();
   $('#editID').val(''); 
 
});


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

/*function countryChange()
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


});*/