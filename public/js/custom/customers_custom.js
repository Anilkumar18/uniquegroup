 $(document).ready(function() {        	

$(".addnewcustomer").click(function(){
		$("#customersadd")[0].reset();
		$('#editID').val(''); 
});

//purushothaman 30_03_2018 changes
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
}
}
});

//purushothaman 30_03_2018 changes
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

/*Vidhya:27-03-2018
    //Add zipper color insert code*/
     

     $("#productImage").change(function(){
        readURL(this);
    });



     $(".editzippers").click(function(){
      
      var id=$(this).data("valueid");
      var public_path=$(this).data("href");
      var selecthref=$(this).data("selecthref");
      
      //alert(selecthref);
      
       $.ajax({        
        url      : selecthref,
        type     : 'POST',
        cache    : false,
        success  : function(data){
        debugger;
        var message = JSON.parse(data);
        //alert(message[0]['id']);
        $('#editid').val(message[0]['id']);
        $('#edit_value').val(message[0]["1"]);
        $('#chainname').val(message[0]['customerID']);
        $('#color').val(message[0]['zipperColor']);
        $('#itemdesc').val(message[0]['zipperDescription']);
        //alert(message[0]['productID']);
        $('#productcode').val(message[0]['productID']);
        
        $('#productCost').val(message[0]['productCost']);
        $('#sellingPrice').val(message[0]['sellingPrice']);
        $('#packSize').val(message[0]['packSize']);
        $('#siteurl').attr("value","editlabelprint");
                $('#selectimage').val(message[0]['productImage']);
                $('#productImage').val(message[0]['productImage']);
        $('#chainID').val(message[0]['customerID']);
        if(message[0]['productID']==0){message[0]['productID']='';}
        
        $('select[name="customerID"]').attr("disabled","disabled");
        
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
        
      });


  });
  $(".fillpricesticker").click(function(){
                     
    var id=$(this).data("id");
   // alert(id);
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
	
	$(".productpricesticker").click(function(){
    $("#productgroupsmaintenanceadd")[0].reset();
   $('#editID').val(''); 
 
});
   
     $(".deletezippercolor").click(function(){  
   
   var href=$(this).attr("data-href");
   //alert(href);
      if(href!="")
     
     {      
        swal({
        title: "Are you sure to delete the selected Zipper color?",
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

     $(".activatezip").click(function(){

   var href=$(this).find('a').attr("data-href");
      //alert(href);
   if(href)
   {
     swal({
      title: "Are you sure to activate the selected Zipper color?",
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
     $(".deactivatezip").click(function(){
                       
     //alert("fgfh");                 

    var href=$(this).find('a').attr("data-href");
    //alert(href);
    if(href)
    {
    swal({
      title: "Are you sure to deactivate the selected Zipper color?",
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


function subbrandimage()
{
var fileName = $('.fbfile').val();
    var allowed_extensions = new Array("jpg","jpeg","JPG","JPEG","png","PNG","GIF","gif","bmp","BMP");
    var file_extension = fileName.split('.').pop(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.
  //alert(file_extension);
  var valid=false;
    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
    valid=true;
    /*alert(fileName); 
    $('#selectimage').val(this.fileName[0].name);*/
    return true;
        }
    }
  
  if(valid==false){
    $('.fbfile').val('');
    alert('Please upload valid image file!');
    return false;
  }
  
  }
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
      
            reader.onload = function (e) {
       $('#selimage').empty();
       $('#selectimageid').val('');
       
      var imageurl='<img id="blah" src="" alt="your image" width="150" height="150" />';
        $('#selimage').html(imageurl);
        $('#blah').attr('src', e.target.result).width(150).height(150);
         //$('#selectimage').attr(e.name);
         $('input[name=selectimage]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
        }
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