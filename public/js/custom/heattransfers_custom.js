 $(document).ready(function() {        	
		
		var productheattransfer =$("#productsheattransferadd").validate({
  rules: {
     customername : {
    required: true
  },
  productgroup: {
      required: true
	 },
  productsubgroup: {
      required: true
	 },
	product_name: {
      required: true
	 },
	 product_code: {
		 required: true
	 },
	 unique_productcode: {
		 required: true
	 },
	  decription: {
		required: true,
	     minlength: 3,
       lettersonly: true
	 },
	 product_process: {
		 required:true 
	 },
	 product_status: {
		 required:true 
	 },
	 
    productionregion1: {
	     required:true	
	},
	uniquefactory1: {
	    required:true	
	},
	pricing_method: {
		 required:true
	},
	currency:{
	required:true	
	},
	unit_measurement:{
		required:true
	},
	Min_Quantity:{
		required:true
	},
	Min_ordervalue:{
		required:true
	},
	pack_size:{
		required:true
	},
	selling_price:{
		required:true
	}
	
	
  }
});
		
var heattransfer =$("#heattransferadd").validate({
  rules: {
     typeoflabel : {
    required: true
  },
  typeofheattransfer: {
      required: true
	 },
  finish: {
      required: true
	 },
	heattransfer_width: {
      required: true
	 },
	 product_code: {
		 required: true
	 },
	 heattransfer_width: {
		 required: true
	 },
	  printcolor1: {
		 required: true
	 },
	 application:{
		required:true 
	 }
	
	
	
  }
  
});

var productheattransfer =$("#addproductinventory").validate({
  rules: {
     unique_product_code : {
    required: true
     },
	  inventory : {
    required: true,
	number:true
     },
	 uniquefactory1 : {
    required: true,
	number:true
     },
	  max_stock : {
    required: true,
	number:true
     },
	 min_stock : {
    required: true,
	number:true
     },
	
	
  }
  
});
 		

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
		
		
$("#addinvoiceaddress").click(function(){
								
								//alert("Testing");
								 $('#myModal').modal({
												show: true
												
											});
								
								});
$("#adddeliveryaddress").click(function(){
								
								//alert("Testing");
								 $('#myModal').modal({
												show: true
												
											});
								
								});
$("#addcountryofoperations").click(function(){
								
								//alert("Testing");
								 $('#countryModal').modal({
												show: true
												
											});
								
								});

 
	

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
 
 	function ordervalue(t)
	{
		var value=$(t).val();
		
		if(value!="")
		{
		  value=value*1000;	
		  //alert(value);
		 
		  //$(#Min_ordervalue).val(value);
			$("#Min_ordervalue").val(value);
            //$("#Min_ordervalue").trigger('change');
		}
		
		
	}
	

	$(".deletevendors").click(function(){
										

		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	    if(deleteval=="")
	   {
	   swal({
                
                title: "Please select the vendors(s) to delete",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the selected vendor(s)?",
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



	 $(document).ready(function() {
        $('select[name="country1"]').on('change', function() {
			//alert("Testing");
            var countryid = $(this).val();
		   // alert(countryid);
			
			debugger;
            if(countryid) {
                $.ajax({
                    url: '../admin/addvendors/ajax/'+countryid,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
						//alert("test");
                          
                         //alert(data);
						    $('select[name="state1"]').empty();
                        $.each(data, function(key, value) {
                            /*$('select[name="productsubgroup"]').append('<option value="'+ key +'">'+ value +'</option>');*/
							
							
							
							 $('select[name="state1"]').append(''+'<option value="'+ key +'">'+ value +'</option>');
                        });
                     

                    }
					,
					error: function (jqXHR, textStatus, errorThrown) {
					alert(textStatus);
					alert(errorThrown);
        }
                });
            }else{
                $('select[name="state"]').empty();
            }
        });
		
		  $('select[name="country"]').on('change', function() {
			//alert("Testing");
            var countryid = $(this).val();
		   // alert(countryid);
			
			debugger;
            if(countryid) {
                $.ajax({
                    url: '../admin/addvendors/ajax/'+countryid,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
						//alert("test");
                          
                         //alert(data);
						    $('select[name="state"]').empty();
                        $.each(data, function(key, value) {
                            /*$('select[name="productsubgroup"]').append('<option value="'+ key +'">'+ value +'</option>');*/
							
							
							
							 $('select[name="state"]').append(''+'<option value="'+ key +'">'+ value +'</option>');
                        });
                     

                    }
					,
					error: function (jqXHR, textStatus, errorThrown) {
					alert(textStatus);
					alert(errorThrown);
        }
                });
            }else{
                $('select[name="state"]').empty();
            }
        });
		  
		
		  
		
		  $("#officesubmit").click(function(){
											//alert("testing");
											
											var season_url=$("#season_url").val();
											//alert(season_url);
											
											var office_name1=$("#office_name1").val();
											var marketing_regions1=$("#marketing_regions1").val();
											var production_regions1=$("#production_regions1").val();
											var firstname1=$("#firstname1").val();
											var lastname1=$("#lastname1").val();
											var phonenumber1=$("#phonenumber1").val();
											var email1=$("#email1").val();
											var suite1=$("#suite1").val();
											var street1=$("#street1").val();
											var city1=$("#city1").val();
											var country1=$("#country1").val();
											var state1=$("#state1").val();
											var zipcode1=$("#zipcode1").val();
											
											 var datastring='office_name1='+office_name1+'&marketing_regions1='+marketing_regions1+
											 '&production_regions1='+production_regions1+'&firstname1='+firstname1+'&lastname1='+lastname1+'&phonenumber1='+phonenumber1+
											 '&email1='+email1+'&suite1='+suite1+'&street1='+street1+'&city1='+city1+'&country1='+country1+'&state1='+state1+'&zipcode1='+zipcode1;
											 
											 //alert(datastring);
    //alert(datastring);

										   $.ajax({
												url: season_url,
												type: "GET",
												data:datastring,
												success:function(data) {
													
													//alert(data);
													debugger;
													var message = JSON.parse(data);	
													var pLen,i;
													pLen=message.length;	
													//alert(pLen);
													//alert("test");
													//alert(message[0]);
													if(message=='OfficeFactoryName is already there!') {
													$('.uniquefactory1').show();
													//$('.addr_field1').show();
													$('.logoutSucc').text('OfficeFactoryName is already there!');
													$(".logoutSucc").addClass("box_warning");
													$(".logoutSucc").removeClass("box-success");
													} else {
													$('.logoutSucc').text('OfficeFactoryName added successfully');
													$(".logoutSucc").addClass("box-success");
													$(".logoutSucc").removeClass("box_warning");
													$('.uniquefactory1').empty();
													//$('.addr_field1').empty();
													var pscodehtml='<div class="form-group clsformelements"><div class="col-lg-3 countryoperation"><select id="invoice_address" name="invoice_address" class="form-control countryselect" style=" border: 1px solid #aaa;width:175px">';
													for (i=0;i<pLen;i++){
														//alert(message[0][i]['ProductionRegions']);
														if(message[i]['Factory1OfficeFactoryName']!='') {
														pscodehtml+='<option value="'+message[i]['id']+'">'+message[i]['Factory1OfficeFactoryName']+'</option>';
														}     
													}
													
													pscodehtml+='</select></div></div>';
													
														var pscodehtml1='<div class="form-group clsformelements"><div class="col-lg-3 countryoperation"><select id="delivery_address" name="delivery_address" class="form-control countryselect" style=" border: 1px solid #aaa;width:175px">';
													for (i=0;i<pLen;i++){
														//alert(message[0][i]['ProductionRegions']);
														if(message[i]['Factory1OfficeFactoryName']!='') {
														pscodehtml1+='<option value="'+message[i]['id']+'">'+message[i]['Factory1OfficeFactoryName']+'</option>';
														}     
													}
													
													pscodehtml1+='</select></div></div>';
													
													
													
													
													
													
													}
													
													
													$('.uniquefactory1').html(pscodehtml);  
													$('.uniquefactory2').html(pscodehtml1);  
													$('#invoice_address').val(id);
													$('#delivery_address').val(id);
													
													
													//event.preventDefault();
													
										
												 }
									
											});
											
													  
													  
													  });
		  
		    $("#countryofoperationssubmit").click(function(){
											
											var site_url=$("#site_url").val();
											//alert(site_url);
											
											var countryofoperation=$("#addcountryofoperation").val();
											
											
											 var datastring='countryofoperation='+countryofoperation;
											 
											 //alert(datastring);
    //alert(datastring);

										   $.ajax({
												url: site_url,
												type: "GET",
												data:datastring,
												success:function(data) {
													
													//alert(data);
													debugger;
													var message = JSON.parse(data);	
													var pLen,i;
													pLen=message.length;	
													//alert(pLen);
													//alert("test");
													//alert(message[0]);
													if(message=='countryofoperation is already there!') {
													$('.addr_countryfield').show();
													//$('.addr_field1').show();
													$('.logoutSucc').text('countryofoperation is already there!');
													$(".logoutSucc").addClass("box_warning");
													$(".logoutSucc").removeClass("box-success");
													} else {
													$('.logoutSucc').text('countryofoperation added successfully');
													$(".logoutSucc").addClass("box-success");
													$(".logoutSucc").removeClass("box_warning");
													$('.addr_countryfield').empty();
													//$('.addr_field1').empty();
													var pscodehtml='<div class="form-group clsformelements"><div class="col-lg-3 countryoperation"><select id="countryofoperation" name="countryofoperation" class="form-control countryselect" style="width:187px"> <option value="">Please select</option>';
													for (i=0;i<pLen;i++){
														//alert(message[0][i]['ProductionRegions']);
														if(message[i]['Country']!='') {
														pscodehtml+='<option value="'+message[i]['id']+'">'+message[i]['Country']+'</option>';
														}     
													}
													
													pscodehtml+='</select></div></div>';
													
											
													}
													
													
													$('.addr_countryfield').html(pscodehtml);  
													$('#countryofoperations').val(id);
													
													
													
													//event.preventDefault();
													
										
												 }
									
											});
											
													  
													  
													  });
			 $("#productionregionsubmit").click(function(){
												  var regions=$("#regions").val();
													//alert(regions);
													var href=$("#productionregion_url").val();
													//alert(href);
		$.ajax({			   
				url      : href,
				type     : 'GET',
				data: {regions:regions},
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);	
				
				//alert(data);

				var pLen,i;
				pLen=message[0].length;	
				//alert(pLen);
				//alert("test");
				if(message[0]=='ProductionRegions is already there!') {
				$('.addr_field').show();
				//$('.addr_field1').show();
				$('.logoutSucc').text('ProductionRegions is already there!');
				$(".logoutSucc").addClass("box_warning");
				$(".logoutSucc").removeClass("box-success");
				} else {
				$('.logoutSucc').text('ProductionRegions added successfully');
				$(".logoutSucc").addClass("box-success");
				$(".logoutSucc").removeClass("box_warning");
				$('.addr_field').empty();
				//$('.addr_field1').empty();
				var pscodehtml='<div class="form-group clsformelements"><div class="col-lg-3"><select id="productionregion1" name="productionregion1" class="form-control">';
				for (i=0;i<pLen;i++){
					//alert(message[0][i]['ProductionRegions']);
					if(message[0][i]['ProductionRegions']!='') {
					pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['ProductionRegions']+'</option>';
					}     
				}
				pscodehtml+='</select></div></div>';
				
				
				
				
				
				
				}
				
				
                $('.addr_field').html(pscodehtml);  
				$('#productionregion1').val(id);
				$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
			event.preventDefault();
        	}
				
		});
												 
												 });
			 $('select[name="product_status"]').on('change', function() {
															  
															 //alert("testing");
															  var statusid=$(this).val();
															 // alert(statusid);
															 var version=$("#version").val();
															  //alert(version+"version");
															 
															 if(statusid==1)
															 {
																 //alert("New");
															  $.ajax({           
																			url: '../admin/addheattransfers/'+version,
																			type: "GET",
																			dataType: "json",
																			success:function(data) {
																				  
																				//alert(data);
																				 
																				var message = JSON.parse(data);
																				
																				//alert(message);
																				$('#version').val(message);
																			 
															
																			}
																			,
																			error: function (jqXHR, textStatus, errorThrown) {
																			alert(textStatus);
																			alert(errorThrown);
																}
																		});
															 }
													  
													  });
		
		
	/*$('#heattransfer_width').keypress(function(){
			//alert($(this).val().length);		
			var width=$(this).val();
			alert(width);

	});*/
$('#heattransfer_width').on('keyup',function(e){
			var oldstr=$('#heattransfer_width').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#heattransfer_width').val(tokens+suffix);
			
		});

$('#heattransfer_length').on('keyup',function(e){
			var oldstr=$('#heattransfer_length').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#heattransfer_length').val(tokens+suffix);
			
		});
      
    
    });
	 	function imageselect()
{
	var fileName = $('.fbfile').val();
	//alert(fileName);
    var allowed_extensions = new Array("jpg","jpeg","JPG","JPEG","png","PNG","GIF","gif","bmp","BMP");
    var file_extension = fileName.split('.').pop(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.
	//alert(file_extension);
	var valid=false;
    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
		valid=true;	
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
			 
			var imageurl='<img id="blah" src="" alt="your image" width="80" height="80" />';
				var text=$('#selimage').html(imageurl);
				//alert(text);
				$('#blah').attr('src', e.target.result).width(80).height(80);
				 //$('#selectimage').attr(e.name);
				 $('input[name=selectimage]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
  
    $("#imgInp").change(function(){
        readURL(this);
    }); 
	 $('select[name="currency"]').on('change', function() {
													
													//alert("testing");
													var id=$(this).val();
													//alert(id);
													
													if(id==1)
													{
													var money_name="$";
													//alert(money_name);
													//$("#selling_price").html(money_name);
													$("#selling_price").val(money_name);
													}
													else if(id==2)
													{
													var money_name="C$";
													//alert(money_name);
													$("#selling_price").val(money_name);
													}
													else if(id==3)
													{
													var money_name="Rs";
													//alert(money_name);
													$("#selling_price").val(money_name);
													}
													else if(id==4)
													{
													var money_name="RMB";
													//alert(money_name);
													$("#selling_price").val(money_name);
													}
													else if(id==5)
													{
													var money_name="TRY";
													//alert(money_name);
													$("#selling_price").val(money_name);
													}
													else if(id==6)
													{
													var money_name="GBP";
													//alert(money_name);
													$("#selling_price").val(money_name);
													}
													else if(id==7)
													{
													var money_name="HKD";
													//alert(money_name);
													$("#selling_price").val(money_name);
													}
													
													  });
	  $('select[name="inventory"]').on('change', function() {
														 
														  var inventoryid=$(this).val();
														// alert(inventoryid);
														  
														  if(inventoryid==1)
														  {
															$("#inventoryblock").css("display","block");  
														  }
														  else
														  {
															  $("#inventoryblock").css("display","none"); 
														  }
														 
														 });
	 $(document).ready(function() {
     
      $("#phonenumber1").keypress(function (e) {
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

      $("#phonenumber1").blur(function (e) {
      		debugger;
      		var curchr = this.value.length;
var pp=$(this).parent().parent().parent().parent().parent();
      		if(curchr<16){

      			$('#phoneerror').show();
      			pp.find("#officesubmit").attr("disabled", "disabled");
    			pp.find("#officesubmit").css('background-color','#2f75bb');
      		}else{
      			pp.find("#officesubmit").removeAttr("disabled");
      			$('#phoneerror').hide();
      		}

      });





});
	 