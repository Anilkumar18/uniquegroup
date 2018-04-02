 $(document).ready(function() { 
 
 productsubgroup();
 dateval();
							
/*var productgroup =$("#productsadd").validate({
  rules: {
     CustomerName : {
    required: true
  },
  ProductGroup: {
      required: true
	 },
  ProductSubGroupName: {
      required: true
	 },
	productname: {
      required: true
	 },
	 productcode: {
		 required: true
	 },
	 uniqueproductcode: {
		 required: true
	 },
	  description: {
		required: true,
	 },
	 StatusName: {
		 required:true 
	 },
	 ProductProcess: {
		 required:true 
	 },
    ProductionRegions1: {
	     required:true	
	},
	factoryName: {
	    required:true	
	},
	PricingMethod: {
		 required:true
	},
	Currency:{
	required:true	
	},
	packsize:{
		required:true
	},
	sellingprice:{
		required:true
	},
	samplequote:{
		required:true
	},
	
	
  }
});*/
var productgroup =$("#productsadd").validate({
  rules: {
     CustomerName : {
    required: true
  },
  ProductGroup: {
      required: true
	 },
  ProductSubGroupName: {
      required: true
	 },
	 Warehouse_Name:{
		required:true 
	 },
	productname: {
      required: true
	 },
	 productcode: {
		 required: true
	 },
	 uniqueproductcode: {
		 required: true
	 },
	  description: {
		required: true,
	 },
	 StatusName: {
		 required:true 
	 },
	 ProductProcess: {
		 required:true 
	 },
	samplequote:{
		required:true
	},
	
	
  }
});

var productgroup =$("#productdetailsadd").validate({
  rules: {
     RawMaterial : {
    required: true
  },
  Thickness:{
	   required: true
  },
  Width:{
	  required: true  
  },
  Height:{
	    required:true  
  },
  Length:{
	    required:true  
  },
  PrintType:{
	required:true  
  },
  printcolor:{
	required:true  
  },
  print_color1:{
	  required:true
  },
  CuttingName:{
	 required:true  
  },
  PricingMethod:{
	 required:true  
  },
   UnitofMeasurement:{
	 required:true  
  },
   Currency:{
	 required:true  
  },

	
  }
});
/*var productinventorydetails =$("#productinventoryadd").validate({
  rules: {
     Inventory : {
    required: true
  }
	
  }
});*/

/*Defect: 16-6
         //Name: bala-Uniquegroup Team
         //Desc.uniquegroup/public/addproductgroups
           Inventory information page validation not working*/
var productinventorydetails =$("#productinventoryadd").validate({
  rules: {
     Inventory : {
    required: true
  },
  ProductionRegions1:{
	required:true  
  },
  uniquefactory1: {
	required:true  
  },
  Maximumpiecesonstock : {
	 required:true  
  },
  Minimumpiecesonstock:{
	  required:true 
  }
	
  }
});



/*var productquoteinfodetails =$("#productsquoteinfoadd").validate({
  rules: {
     SampleRequestedDate : {
    required: true
  },
 SampleNumber: {
	  required: true
 },
NumberOfSamplesRequired:{
	required:true
},
NumberOfSamplesRequired:{
	required:true
},
quoterequired:{
required:true	
},
SampleLeadTime:{
	required:true
},
ProductionLeadTime:{
	required:true
}
	
  }
});*/

var productquoteinfodetails =$("#productsquoteinfoadd").validate({
  rules: {
     PricingMethod : {
    required: true
  },
   "quantitychk[]":{
	   required:true
   },
   UnitofMeasurement:{
	required:true   
   },
   Currency:{
	 required:true  
   },
   MinQuantity:{
	required:true   
   },
   Minordervalue:{
	required:true   
   },
   packsize:{
	required:true   
   },
   samplecost:{
	required:true   
   }
   
	
  }
});

var productssellingpriceinfoadd =$("#productssellingpriceinfoadd").validate({
  rules: {
     input0 : {
    required: true
	 }
   
	
  }
});

var productquoteinfodetails =$("#productscostinfoadd").validate({
  rules: {
     SampleRequestedDate : {
    required: true
  },
 SampleNumber: {
	  required: true
 },
NumberOfSamplesRequired:{
	required:true
},
SampleLeadTime:{
	required:true
},
ProductionLeadTime:{
	required:true
},
imgInp:{
  required:true	
}
	
  }
});
     

		 $(".quantitychk").change(function() {
			 
			 //alert("Testing");
			 
			 var quantitydetails=$(this).val();
			 //alert(quantitydetails);
			 //Rajesh 05032018 onchange vevent
			 if(quantitydetails=="Other")
			 {
			 	if($(this).prop("checked") == true){
									  $("#otherqty").css("display","block");
				$("#othercost").css("display","block");  
									}else{
									  $("#otherqty").css("display","none");
				$("#othercost").css("display","none");  

									}
				
			 }
			 
		 });
		 
		 
		  $(".chkbox").change(function() {
			if(this.checked) {
				//Do stuff
				//alert("Testing");
				var id=$(this).val();
				//alert(id);
				if(id==1)
				{
			    $("#printcolor1").css("display","none");
				$("#printcolor2").css("display","none");
				$("#printcolor3").css("display","none");
				$("#printcolor4").css("display","none");
				$("#printcolor5").css("display","block");
				$("#printcolor6").css("display","block");
				$("#printcolor7").css("display","block");
				$("#printcolor8").css("display","block");
				}
				else if (id==0)
				{
			     $("#printcolor1").css("display","block");
				$("#printcolor2").css("display","block");
				$("#printcolor3").css("display","block");
				$("#printcolor4").css("display","block");
				$("#printcolor5").css("display","none");
				$("#printcolor6").css("display","none");
				$("#printcolor7").css("display","none");
				$("#printcolor8").css("display","none");
			
				}
				
			}
			
		});
     
	    $(".radiobtn").change(function() {
			
			if(this.checked) {
				
				var id=$(this).val();
				//alert(id);
				
				if(id==1)
				{
					$(".quotediv").css("display","block");
				}
				else if(id==0)
				{
					$(".quotediv").css("display","none");
				}
			}
			
		});
		$(".quantitychk").change(function() {
			
			//alert("testingQK");
			  var otherquantity=$(this).val();
				//alert(otherquantity);
									  
									  if(otherquantity=="Other")
									  {
									
									  $(".otherquantitydiv").css("display","block");  
										  
									  }
									  else
									  {
										 $(".otherquantitydiv").css("display","none");    
									  }
			
		});
	 
	    $('select[name="Season"]').on('change', function() {
															 //alert("Testing");
															 var season=$(this).val();
															// alert(season);
															 
															 if(season==5)
															 {
																 $("#myModal").modal({
																					   show:true
																					 });
																 
															 }
															 
															 
															 
															 });

	 /* $('select[name="selectItem"]').on('change', function() {
											 	
									var selectItemid=$(this).val();
									//alert(selectItemid);
						            
									if(selectItemid==1)
									{
									$('#myModal').modal({
															show: true
														});
									}
											
								   });   */
	  
		$("#ProductGroup").change(function(){
										  var productgroup=$(this).val();
										  //alert(productgroup);
										  
										  if(productgroup==4)
										  {
											$('#myModal4').modal({
																 
																 show:true
																 
																 });
																 
										  }
										  else if(productgroup==3)
										  {
											  //alert("hash tags");
											  $('#myModal7').modal({
																   
																   show:true
																   });
											  
										  }
										  else if(productgroup==12)
										  {
											  
											  $("#myModal9").modal({
																   
																   show:true
																   });
											  
										  }
										   
										   });
	  
	  $('select[name="ProductSubGroupName"]').on('change',function(){
															   
															   var productsubgroup=$(this).val();
															   //alert(productsubgroup);
															   
															  /* if(productsubgroup==11)
															   {
																  /*$('#myModal').modal('hide');
																  $('#myModal1').modal({
																			show: true
																		});*/
																  ///$('#search').attr('display','block');
																  /*$("#search").css("display", "block");   
																   
															   }*/
															  
																  /*$('#myModal').modal('hide');
																  $('#myModal1').modal({
																			show: true
																		});*/
																  ///$('#search').attr('display','block');
																  $("#search").css("display", "inline-block");   
																   
															 
															   
															   });
	 
	  
	  $("#search").click(function(){
								  
								 // alert("Testing"); 
								
								       
							  var productsubgroup=$("#productsubgroup").val();
										 //alert(productsubgroup);
								  
								  if(productsubgroup==11)
								  {
									   $('#myModal2').modal({
												show: true
												
											});
								  }
								  else if(productsubgroup==9)
								  {
									   $('#myModal5').modal({
												show: true
												
											});
								  }
								 
									
								
						});
						$(document).ready(function() {
                                    $('#Inventory').change(function() {
														 
														  var inventoryid=$(this).val();
														// alert(inventoryid);
														  
														  if(inventoryid==1)
														  {
															$(".inventorycontent").css("display","block");  
														  }
														  else
														  {
															  $(".inventorycontent").css("display","none"); 
														  }
														 
  });
  
     $('#quote').change(function(){
		 
		                            var quoteid=$(this).val();
									//alert(quoteid);
									if(quoteid==1)
									{
										$('#QuoteModal1').modal({
												show: true
												
											});
									}
									
		 
	 });
	 
	 $('#Quantity').change(function(){
		 
		                              var otherquantity=$(this).val();
									 // alert(otherquantity);
									  
									  if(otherquantity=="Other")
									  {
									
									  $(".otherquantitydiv").css("display","block");  
										  
									  }
									  else
									  {
										 $(".otherquantitydiv").css("display","none");    
									  }
									  
		 
	 });
 });
 
     $('#quoterequiredchk').change(function() {  
	                         // alert("Testng");
	 
	 });
	  /*$("#add").click(function(){
							   
							   $("#heattransferadd")[0].reset();
							   
							   $('#myModal3').modal({
													show:true
													});
							   
							   });
	  $("#addwoven").click(function(){
									
									$("#myModal6").modal({
														  show:true
														 });
									
									});
	  $("#addhangtags").click(function(){
									   $("#myModal8").modal({
															show:true
															});
									   
									   });
	  
	  $("#refreshangtags").click(function(){
										  
										  alert("TestRefresh page");
										  
										  //$("#myModal7").modal("hide");
										  
										 location.reload();
										 
										 $('#myModal').modal({
															show: true
														});
										  
										
										  
										  });*/
	  
	  /* $( "form" ).submit(function() {
			  //event.preventDefault();
			    alert("Tetsing");
				$("#myModel3").modal(hide);
			
			});*/
	  /*$("#heattransferbtn").click(function(){
										   alert("Testing");
										  
						   
						   });*/
	 
				  
	
	  
	  $.ajaxSetup({
			  headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			})
	
	  
	  /*$("#myModal3").on('hidden',function(){
										  
										  alert("testing");
								 
								// document.location.reload();
								 
										 });*/
	  
	  
	  
	
		
 });
			
	function imageselect()
{
	 //alert("Testing");
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
//Defect: newpdf no:6
         //Name: Vidhya-PHP Team
         //Working for the change warehouse for particular customer
function CustomerChange()
  { 
    
	//alert("customerchange");
  var selecthref=$("select[name='CustomerName'] option:selected").attr('drop-data');  
  
      $.ajax({         
        url      : selecthref,
        type     : 'post',        
        cache    : false,
        success  : function(data){
          debugger;
          //alert(data);
        var message = JSON.parse(data);   

        var pLen,i;
        pLen=message[0].length;
        var pscodehtml=' <div class="col-md-3"><select id="Warehouse_Name" name="Warehouse_Name" class="form-control"><option value=""> Please Select</option>';
        for (i=0;i<pLen;i++){
          if(message[0][i]['Warehouse_Name']!='') {
          pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['Warehouse_Name']+'</option>';
          }     
        }
        pscodehtml+='</select></div>';
        
                $('.statedisplay').html(pscodehtml);
                       
        },
          error: function (jqXHR, textStatus, errorThrown) {
            
          }
        
    });
  }  
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
			
            reader.onload = function (e) {
			 $('#selimage').empty();
			 $('#selectimageid').val('');
			 //$('#blahimg').hide();
			 
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
	
	/*tissuepaper*/
			function imageselect1()
{
	 //alert("Testing");
	var fileName = $('.fbfile1').val();
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
		$('.fbfile1').val('');
		alert('Please upload valid image file!');
		return false;
	}
	
	    
}
function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
			
            reader.onload = function (e) {
			 $('#selimage1').empty();
			 $('#selectimageid1').val('');
			 //$('#blahimg').hide();
			 
			var imageurl='<img id="blah1" src="" alt="your image" width="80" height="80" />';
				var text=$('#selimage1').html(imageurl);
				//alert(text);
				$('#blah1').attr('src', e.target.result).width(80).height(80);
				 //$('#selectimage').attr(e.name);
				 $('input[name=selectimage1]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
  
    $("#imgInp1").change(function(){
        readURL1(this);
    });
	
	function dateval()
	{
	//alert("calendar");
	debugger;
	$('#SampleRequestedDate').datepicker({
                  todayBtn: "linked",
                 startDate: new Date(),
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
				
            });	
			
			 
	}
	
	 
	function productsubgroup()
		 {
			//alert("productionregions"); 
			
			//alert("Testing");
            var productgroup = $("#ProductGroup").val();
			//alert(productgroup);
			
			var href=$("#productsubgroupurl").val();
			//alert(href);
			
			debugger;
            if(productgroup) {
                $.ajax({
                    url: href+'/productdetails/ajax/'+productgroup,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                          
                        // alert(data);
						 var data=data;
						 
						 if(data!="")
						 {
							 $(".productsubgroup").show(); 
							 $(".productsubgroupnotification").html("");
                            $('select[name="ProductSubGroupName"]').empty();
					   
					   
					   
                        $.each(data, function(key, value) {
                        
							 $('select[name="ProductSubGroupName"]').append(''+'<option value="'+ key +'">'+ value +'</option>');
                        });
						 }
						 else
						 {
							$(".productsubgroup").hide(); 
							$(".productsubgroupnotification").html("<h5>Subgroup Not Available for This Product</h5>");
						 }

                    }
                });
            }else{
                $('select[name="ProductSubGroupName"]').empty();
            }
        
		 }
	
	
	
	 $(document).ready(function() {
		 
		 
		 
		 
		 
		 
        /*$('select[name="ProductGroup"]').on('change', function() {
			//alert("Testing");
            var productgroup = $(this).val();
			//alert(productgroup);
			
			debugger;
            if(productgroup) {
                $.ajax({
                    url: 'newproducts/ajax/'+productgroup,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                          
                         //alert(data);
						 var data=data;
						 
						 if(data!="")
						 {
							 $(".productsubgroup").show(); 
							 $(".productsubgroupnotification").html("");
                       $('select[name="ProductSubGroupName"]').empty();
                        $.each(data, function(key, value) {
                        
							 $('select[name="ProductSubGroupName"]').append(''+'<option value="'+ key +'">'+ value +'</option>');
                        });
						 }
						 else
						 {
							$(".productsubgroup").hide(); 
							$(".productsubgroupnotification").html("<h5>Subgroup Not Available for This Product</h5>");
						 }

                    }
					,
					error: function (jqXHR, textStatus, errorThrown) {
					alert(textStatus);
					alert(errorThrown);
        }
                });
            }else{
                $('select[name="ProductSubGroupName"]').empty();
            }
        });*/
		
       /* $('select[name="ProductionRegions"]').on('change', function() {
		   alert("productionregionsselections");
            var ProductionRegions = $('#ProductionRegions').val();
			alert(ProductionRegions);
			
			debugger;
            if(ProductionRegions) {
                $.ajax({
                    url: 'add_productsdetails/ajax/'+ProductionRegions,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                          
                        // alert(data);
                       $('select[name="factoryName"]').empty();
                        $.each(data, function(key, value) {
                            
							
							 $('select[name="factoryName"]').append(''+'<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
					,
					error: function (jqXHR, textStatus, errorThrown) {
					alert(textStatus);
					alert(errorThrown);
        }
                });
            }else{
                $('select[name="factoryName"]').empty();
            }
        });*/
	
		
    
    });
	
	
	
	 
	  $("#productionregionsubmit").click(function(){
												  //alert("Testing");
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
				var pscodehtml='<div class="form-group"><div class="col-lg-5"><select id="productionregion1" name="productionregion1" class="form-control" style="width:210%">';
				for (i=0;i<pLen;i++){
					//alert(message[0][i]['ProductionRegions']);
					if(message[0][i]['ProductionRegions']!='') {
					pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['ProductionRegions']+'</option>';
					}     
				}
				pscodehtml+='</select></div></div>';
				
				
				
				
				
				
				}
				
                $('.addr_field').html(pscodehtml);  
				$('#productionregion2').val(id);
				
				
				//$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            
			event.preventDefault();
        	}
				
		});
												 
												 });
												 
		$('select[name="ProductionRegions1"]').on('change', function() {
						//alert("newproductionregionsselections-products_custom.js");
            var ProductionRegions = $('#ProductionRegions1').val();
			//alert(ProductionRegions);
		  $.ajax({
                    url: 'add_productsdetails/ajax/'+ProductionRegions,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i,j;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
				var pscodehtml='';
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory[]" class="form-control  productionregion2"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml+='</select>';
				
				pscodehtml+='</div></div>';
				
				}
				
				
			
				
				
				
				
				 $('.uniquefactory1').html(pscodehtml);  
				//$('#uniquefactory1').val(id);
				
				//$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            
			event.preventDefault();
        	}
				
		});
												 
												 });		
												 
	   $('select[name="ProductionRegions2"]').on('change', function() {
						//alert("newproductionregionsselections");
            var ProductionRegions = $('#ProductionRegions2').val();
			//alert(ProductionRegions);
		  $.ajax({
                    url: 'add_productsdetails/ajax/'+ProductionRegions,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
				var pscodehtml1='';
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml1+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory2[]" class="form-control  productionregion2"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml1+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml1+='</select>';
				
				pscodehtml1+='</div></div>';
				
				}
				
				 $('.uniquefactory2').html(pscodehtml1);  
				//$('#uniquefactory2').val(id);
				
				
				
				
				//$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            
			event.preventDefault();
        	}
				
		});
												 
												 });	
												 
		//production region3
		 $('select[name="ProductionRegions3"]').on('change', function() {
						//alert("newproductionregionsselections");
            var ProductionRegions = $('#ProductionRegions3').val();
			//alert(ProductionRegions);
		  $.ajax({
                    url: 'add_productsdetails/ajax/'+ProductionRegions,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
				
				var pscodehtml2='';
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml2+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory3[]" class="form-control  productionregion2"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml2+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml2+='</select>';
				
				pscodehtml2+='</div></div>';
				
				}
				
				
				
				
				
				
				
				 $('.uniquefactory3').html(pscodehtml2);  
				//$('#uniquefactory3').val(id);
				
				//$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
           
			event.preventDefault();
        	}
				
		});
												 
												 });		
												 
		//production region4
		
		$('select[name="ProductionRegions4"]').on('change', function() {
						//alert("newproductionregionsselections");
            var ProductionRegions = $('#ProductionRegions4').val();
			//alert(ProductionRegions);
		  $.ajax({
                    url: 'add_productsdetails/ajax/'+ProductionRegions,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
			
				
				var pscodehtml3='';
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml3+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory4[]" class="form-control  productionregion2"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml3+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml3+='</select>';
				
				pscodehtml3+='</div></div>';
				
				}
				
				
				 $('.uniquefactory4').html(pscodehtml3);  
				$('#uniquefactory4').val(id);
				
				//$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            
			event.preventDefault();
        	}
				
		});
												 
												 });		
			
		//production region5
		
		$('select[name="ProductionRegions5"]').on('change', function() {
						//alert("newproductionregionsselections");
            var ProductionRegions = $('#ProductionRegions5').val();
			//alert(ProductionRegions);
		  $.ajax({
                    url: 'add_productsdetails/ajax/'+ProductionRegions,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
				
				var pscodehtml4='';
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml4+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory5[]" class="form-control  productionregion2"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml4+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml4+='</select>';
				
				pscodehtml4+='</div></div>';
				
				}
				
				
				
				
				
				 $('.uniquefactory5').html(pscodehtml4);  
				$('#uniquefactory5').val(id);
				
				//$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            
			event.preventDefault();
        	}
				
		});
												 
												 });
												 
		//production region6
		
		$('select[name="ProductionRegions6"]').on('change', function() {
						//alert("newproductionregionsselections");
            var ProductionRegions = $('#ProductionRegions6').val();
			//alert(ProductionRegions);
		  $.ajax({
                    url: 'add_productsdetails/ajax/'+ProductionRegions,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
				
				var pscodehtml5='';
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml5+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory6[]" class="form-control  productionregion2"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml5+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml5+='</select>';
				
				pscodehtml5+='</div></div>';
				
				}
				
				
				 $('.uniquefactory6').html(pscodehtml5);  
				$('#uniquefactory6').val(id);
				
				//$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            
			event.preventDefault();
        	}
				
		});
												 
												 });		
												 
		//production region7										 				 						 								 									 
		$('select[name="ProductionRegions7"]').on('change', function() {
						//alert("newproductionregionsselections");
            var ProductionRegions = $('#ProductionRegions7').val();
			//alert(ProductionRegions);
		  $.ajax({
                    url: 'add_productsdetails/ajax/'+ProductionRegions,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
				var pscodehtml6='';
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml6+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory7[]" class="form-control  productionregion2"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml6+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml6+='</select>';
				
				pscodehtml6+='</div></div>';
				
				}
				
				
				
				
				
				 $('.uniquefactory7').html(pscodehtml6);  
				$('#uniquefactory7').val(id);
				
				//$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
           
			event.preventDefault();
        	}
				
		});
												 
												 });	
		
		//prodction region 8										 						 
												 							 								 
				$('select[name="ProductionRegions8"]').on('change', function() {
						//alert("newproductionregionsselections");
            var ProductionRegions = $('#ProductionRegions8').val();
			//alert(ProductionRegions);
		  $.ajax({
                    url: 'add_productsdetails/ajax/'+ProductionRegions,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
				for(j=0;j<pLen;j++)
				{
				var pscodehtml7='<div class="form-group"><div class="col-lg-5">';
				for (i=0;i<pLen;i++){
					
					
					pscodehtml7+='<select style="margin-bottom:10px;" id="uniquefactory'+[i]+'" name="uniquefactory8[]" class="form-control  productionregion2"><option value="">Please select</option><option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					   
				pscodehtml7+='</select>';
				}
				pscodehtml7+='</div></div>';
               
				}
				
				
				 $('.uniquefactory8').html(pscodehtml7);  
				$('#uniquefactory8').val(id);
				
				//$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            
			event.preventDefault();
        	}
				
		});
												 
												 });									 
											 
	  
	  $("#seasonsubmit").click(function(){
										//alert("seasontesting");
												  var season=$("#season").val();
													//alert(season);
													var href=$("#season_url").val();
													//alert(href);
													debugger;
		      $.ajax({			   
				url      : href,
				type     : 'GET',
				data: {season:season},
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);	
				
				//alert(data);

				var pLen,i;
				pLen=message[0].length;	
				//alert(pLen);
				//alert("test");
				if(message[0]=='Season is already there!') {
				$('.addr_field3').show();
				$('.logoutSucc').text('Season is already there!');
				$(".logoutSucc").addClass("box_warning");
				$(".logoutSucc").removeClass("box-success");
				} else {
				$('.logoutSucc').text('Season added successfully');
				$(".logoutSucc").addClass("box-success");
				$(".logoutSucc").removeClass("box_warning");
				$('.addr_field3').empty();
				var pscodehtml3='<div class="form-group"><div class="col-lg-5"><select id="Season" name="Season" class="form-control" style="width:210%">';
				var optionstatus=0;
				for (i=0;i<pLen;i++){ 
					//alert(message[0][i]['Season']);
					if(message[0][i]['Season']!='') {
						if(optionstatus==0){ var strseleect='selected="selected"';optionstatus++;}else{var strseleect='';}
					pscodehtml3+='<option value="'+message[0][i]['id']+'" '+strseleect+' >'+message[0][i]['Season']+'</option>';
					}     
				}
				pscodehtml3+='</select></div></div>';
				
				
				
				
				}
				
				
                $('.addr_field3').html(pscodehtml3);  
				$('#season').val(id);
				
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            
			event.preventDefault();
        	}
				
		});
												 
												 });
												 
												 /*boxes insertions*/	
												 
			 $("#addboxesdetails").click(function(){
										//alert("boxestesting");
							  var RawMaterial=$("#RawMaterial").val();
							  var PrintType=$("#PrintType").val();
							   var CuttingName=$("#CuttingName").val();
								var PrintingFinishingProcessName=$("#PrintingFinishingProcessName").val();
								var Hook=$("#Hook").val();
								 var TissuePaper=$("#TissuePaper").val();
								  var PackagingStickers=$("#PackagingStickers").val();
								var PricingMethod=$("#PricingMethod").val();
								var UnitofMeasurement=$("#UnitofMeasurement").val();
								var Currency=$("#Currency").val();
								var Thickness=$("#Thickness").val();
								var pt=$("#pt").val();
								var gms=$("#gms").val();
								var mm=$("#mm").val();
								var qty_ref=$("#qty_ref").val();
								var qty_chk=$("#qty_chk").val();
								 var Width=$("#Width").val();
								 var Height=$("#Height").val();
								 var Length=$("#Length").val();
								 var cmykyes=$("#cmykyes").val();
								 //alert(cmykyes);
								 
								 var print_color1=$("#print_color1").val();
								 var print_color2=$("#print_color2").val();
								 var print_color3=$("#print_color3").val();
								  var print_color4=$("#print_color4").val();
								  var print_color5=$("#print_color5").val();
								var print_color6=$("#print_color6").val();
								var print_color7=$("#print_color7").val();
								var print_color8=$("#print_color8").val();
									   
								
								var href=$("#addboxurl").val();
								//alert(href);
								debugger;
		      $.ajax({			   
				url      : href,
				type     : 'POST',
				data: {'RawMaterial':RawMaterial,'PrintType':PrintType,'CuttingName':CuttingName,'PrintingFinishingProcessName':PrintingFinishingProcessName,'Hook':Hook,'TissuePaper':TissuePaper,'PackagingStickers':PackagingStickers,'PricingMethod':PricingMethod,'UnitofMeasurement':UnitofMeasurement,'Currency':Currency,'Thickness':Thickness,'pt':pt,'gms':gms,'mm':mm,'qty_ref':qty_ref,'qty_chk':qty_chk,'Width':Width,'Height':Height,'Length':Length,'cmykyes':cmykyes,'print_color1':print_color1,'print_color2':print_color2,'print_color3':print_color3,'print_color4':print_color4,'print_color5':print_color5,'print_color6':print_color6,'print_color7':print_color7,'print_color8':print_color8},
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);	
				
				//alert(data);
               $('#productgroups').css("display","block");
				if($("#Hook").is(':checked'))
				{
				// alert("yes hook");	
				
				 $("#hookform").css("display","block");
				 
				 
				
				 
				}
				if($("#TissuePaper").is(':checked'))
				{
					//alert("yes tissuepaper");	
				 
				 $("#tissuepaperform").css("display","block");
				 
				}
				$("#boxform").css("display","none");
				//alert(pLen);
				//alert("test");
				
				
				
              
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            
			event.preventDefault();
        	}
				
		});
												 
												 });									 
			//quantitydetails
			/*$("#quantitysubmit").click(function(){
										//alert("quantity details");
												  var quantity=$("#otherquantity").val();
												//alert(quantity);
												   //var quantitychk=$('.quantitychk').val();
												  var chkId = '';
													  $('.quantitychk:checked').each(function () {
														chkId += $(this).val() + ",";
													  });
													var qtychk = chkId.slice(0, -1);
													//alert(chkId);
												
												var href=$("#quote_url").val();
												//alert(href);
													
													
		        $.ajax({			   
				url      : href,
				type     : 'GET',
				data: {'quantity':quantity,'qtychk':qtychk},
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);	
				
				//alert(data);

				var pLen,i;
				pLen=message[0].length;	
				//alert(pLen);
				if(message[0]=='Quantity is already there!') {
				$('.addr_field4').show();
				$('.logoutSucc').text('Quantity is already there!');
				$(".logoutSucc").addClass("box_warning");
				$(".logoutSucc").removeClass("box-success");
				} else {
				$('.logoutSucc').text('Quantity added successfully');
				$(".logoutSucc").addClass("box-success");
				$(".logoutSucc").removeClass("box_warning");
				$('.addr_field4').empty();
				$('#otherquantity').val("");
				debugger;
				var pscodehtml4=' <div class="form-group><div class="col-sm-12"> <label class="col-sm-4 control-label font-noraml text-left">Quantity(MOQ):</label> <div class="col-sm-8">';
				for (i=0;i<pLen;i++){
					//alert(message[0][i]['Quantity']);
					if(message[0][i]['Quantity']!='') {
					//pscodehtml4+='<option value="'+message[0][i]['id']+'">'+message[0][i]['Quantity']+'</option>';
					pscodehtml4+='<div class="col-sm-12 quantitychkdiv">'+message[0][i]['Quantity']+'<input type="checkbox" id="'+message[0][i]['id']+'" value="'+message[0][i]['Quantity']+'" /></div>';
					}     
				}
				pscodehtml4+='</div></div>';
				
				
				debugger;
				
				}
				
				
                $('.addr_field4').html(pscodehtml4);  
				$('#Quantity').val(id);
				
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
			event.preventDefault();
        	}
				
		});
												  
		
												 
												 });		*/							 
												 
	 /*$('select[name="StatusName"]').on('change', function() {
															  
															// alert("testing");
															  var statusid=$(this).val();
															  //alert(statusid);
															 var version=$("#version").val();
															//alert(version+"version");
															 
															 if(statusid==1)
															 {
																 //alert("New");
															  $.ajax({
																			url: 'add_products/'+version,
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
													  
													  });*/
	
	 
	 
	  
	 function add_productionregion()
	 {
		//alert("Test"); 
		//event.preventDefault();
		 $("#myModal1").modal({
							   show:true
							 });
		 event.preventDefault();
																 
	 }
	
	/*$('.addmorebtn').click(function(){
		
		$('.productionregionlabel').clone().insertAfter(".productionregionlabel");
		
	});*/
	$(".productionaddmore").click(function(){
    // $('.production2').clone().insertAfter(".production2");
	$('.productionid').css('display','block');
	$('.uniquefactoryid').css('display','block');
    });
	
	function ordervalue(t)
	{
		var value=$(t).val();
		
		if(value!="")
		{
		  value=value*1000;	
		  //alert(value);
		 
		  //$(#Min_ordervalue).val(value);
			$("#Minordervalue").val(value);
            //$("#Min_ordervalue").trigger('change');
		}
		
		
	}
	$('#Width').on('keyup',function(e){
			var oldstr=$('#Width').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#Width').val(tokens+suffix);
			
		});
		$('#Height').on('keyup',function(e){
			var oldstr=$('#Height').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#Height').val(tokens+suffix);
			
		});
		$('#Length').on('keyup',function(e){
			var oldstr=$('#Length').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#Length').val(tokens+suffix);
			
		});
	
$('select[name="Currency"]').on('change', function() {
													
													//alert("testing");
													var id=$(this).val();
													//alert(id);
													
													if(id==1)
													{
													var money_name="$ ";
													//alert(money_name);
													//$("#selling_price").html(money_name);
													$("#samplecost").val(money_name);
													$("#Minordervalue").val(money_name);
													}
													else if(id==2)
													{
													var money_name="C$ ";
													//alert(money_name);
													$("#samplecost").val(money_name);
													$("#Minordervalue").val(money_name);
													}
													else if(id==3)
													{
													var money_name="Rs ";
													//alert(money_name);
													$("#samplecost").val(money_name);
													$("#Minordervalue").val(money_name);
													}
													else if(id==4)
													{
													var money_name="RMB ";
													//alert(money_name);
													$("#samplecost").val(money_name);
													$("#Minordervalue").val(money_name);
													}
													else if(id==5)
													{
													var money_name="TRY ";
													//alert(money_name);
													$("#samplecost").val(money_name);
													$("#Minordervalue").val(money_name);
													}
													else if(id==6)
													{
													var money_name="GBP ";
													//alert(money_name);
													$("#samplecost").val(money_name);
													$("#Minordervalue").val(money_name);
													}
													else if(id==7)
													{
													var money_name="HKD ";
													//alert(money_name);
													$("#samplecost").val(money_name);
													$("#Minordervalue").val(money_name);
													}
													
													  });
													  
													  
$('#Width').on('keyup',function(e){
			var oldstr=$('#Width').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#Width').val(tokens+suffix);
			
		});
		$('#Height').on('keyup',function(e){
			var oldstr=$('#Height').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#Height').val(tokens+suffix);
			
		});
		$('#Length').on('keyup',function(e){
			var oldstr=$('#Length').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#Length').val(tokens+suffix);
			
		});

  $( document ).ready(function() {
    $('.suggestedprice').change(function(){
        var suggestedprice=$(this).val();debugger;
        // Rajesh 05032018 For new tab design
 var pp=$(this).parent().parent().index();

 var costblk=$('.costblock:eq('+pp+')');
var cost=costblk.find('.cost').val();
if(cost){
var amentprice= suggestedprice-cost;

var calcper=Math.round((amentprice/suggestedprice)*100);
calcper=calcper?calcper:0;
var marginpriceblk=$('.marginpriceblock:eq('+pp+')');
}else{
	var calcper=0;
	var marginpriceblk=$('.marginpriceblock:eq('+pp+')');
}
marginpriceblk.find('.margin').val(calcper);

    });
    /* Rajesh 02032018 Ends here */
});


function calc(t) {
    /*var textValue1 = document.getElementById('input1').value;
    var textValue2 = document.getElementById('input2').value;
    var textValue3 = document.getElementById('input0').value;

    document.getElementById('output').value = (((textValue2 - textValue1)/ (textValue2))*100).toFixed(2);*/

    //$(".calculate").each(function() {
    
debugger;
    var tt=t.value;
    var pp=$(t).parent().parent().parent().index();
   if(tt!=''){ 
    
    var price=pp.find('#input1').val();  
var calcper=(((tt-price)/(tt))*100).toFixed(2); 
pp.find('#output').val(calcper);
}else{
  pp.find('#output').val(0);
}
//pp.find('#output').val(tt);
//});
}
/*  Rajesh 02032018 starts */
function margin(t) {

$(".marginpriceblock").each(function() {
    debugger;
    var tt=t.value;
    var pp=$(this);
   var pindex=$(this).index();

   var costblk=$('.costblock:eq('+pindex+')');
var price=costblk.find('.cost').val();

var calcper='';
if(price!=''){calcper=tt;} 

pp.find('#output').val(calcper);


});

$(".suggestedpriceblock").each(function() {
    var tt=t.value;
    var pp=$(this);
   var pindex=$(this).index();

    var costblk=$('.costblock:eq('+pindex+')');
	var price=costblk.find('.cost').val();
var onefactor=1-(tt/100);
var calcper=(price/onefactor).toFixed(2); 
if(tt==''){calcper=0;}
pp.find('.suggestedprice').val(calcper);

});


  
    
}
/*Rajesh 02032018 Ends */