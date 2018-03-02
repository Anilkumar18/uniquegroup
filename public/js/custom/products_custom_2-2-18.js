 $(document).ready(function() { 
							
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
	     minlength: 3,
       lettersonly: true
	 },
	 StatusName: {
		 required:true 
	 },
	 ProductProcess: {
		 required:true 
	 },
    ProductionRegions: {
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
	UnitofMeasurement:{
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
	sellingprice:{
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
var productinventorydetails =$("#productinventoryadd").validate({
  rules: {
     factoryName : {
    required: true
  },
 Maximumpiecesonstock: {
	  required: true
 },
Minimumpiecesonstock:{
	required:true
},
	
  }
});

var productquoteinfodetails =$("#productsquoteinfoadd").validate({
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
},
imgInp:{
	required:true
},
	
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
	
	function dateval()
	{
	//alert("calendar");
	debugger;
	$('.search_upload').datepicker({
                  todayBtn: "linked",
                 startDate: new Date(),
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
				
            });	
			
			 
	}
	
	
	
	
	 $(document).ready(function() {
        $('select[name="ProductGroup"]').on('change', function() {
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
							$(".productsubgroupnotification").html("<h5>Subgroups Not Available for This Products</h5>");
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
        });
		
        $('select[name="ProductionRegions"]').on('change', function() {
		   //alert("productionregionsselections");
            var ProductionRegions = $('#ProductionRegions').val();
			//alert(ProductionRegions);
			
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
        });
    
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
            alert(textStatus);
            alert(errorThrown);
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
				var pscodehtml3='<div class="form-group"><div class="col-lg-5"><select id="season" name="season" class="form-control" style="width:210%">';
				for (i=0;i<pLen;i++){
					//alert(message[0][i]['Season']);
					if(message[0][i]['Season']!='') {
					pscodehtml3+='<option value="'+message[0][i]['id']+'">'+message[0][i]['Season']+'</option>';
					}     
				}
				pscodehtml3+='</select></div></div>';
				
				
				
				
				}
				
				
                $('.addr_field3').html(pscodehtml3);  
				$('#season').val(id);
				
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
			event.preventDefault();
        	}
				
		});
												 
												 });
			//quantitydetails
			$("#quantitysubmit").click(function(){
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
												  
		
												 
												 });									 
												 
	 $('select[name="StatusName"]').on('change', function() {
															  
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
													  
													  });
	
	 
	 
	  
	 function add_productionregion()
	 {
		//alert("Test"); 
		//event.preventDefault();
		 $("#myModal1").modal({
							   show:true
							 });
		 event.preventDefault();
																 
	 }
	function add_more()
	{
	   alert("Unique factory details");	
	   event.preventDefault();
		
	}
	
	function ordervalue(t)
	{
		var value=$(t).val();
		
		if(value!="")
		{
		  value=value*1000;	
		  alert(value);
		 
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
													$("#sellingprice").val(money_name);
													}
													else if(id==2)
													{
													var money_name="C$ ";
													//alert(money_name);
													$("#sellingprice").val(money_name);
													}
													else if(id==3)
													{
													var money_name="Rs ";
													//alert(money_name);
													$("#sellingprice").val(money_name);
													}
													else if(id==4)
													{
													var money_name="RMB ";
													//alert(money_name);
													$("#sellingprice").val(money_name);
													}
													else if(id==5)
													{
													var money_name="TRY ";
													//alert(money_name);
													$("#sellingprice").val(money_name);
													}
													else if(id==6)
													{
													var money_name="GBP ";
													//alert(money_name);
													$("#sellingprice").val(money_name);
													}
													else if(id==7)
													{
													var money_name="HKD ";
													//alert(money_name);
													$("#sellingprice").val(money_name);
													}
													
													  });