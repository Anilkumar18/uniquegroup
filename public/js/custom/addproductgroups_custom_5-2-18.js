 $(document).ready(function() { 
						
$("#productdetailsadd").validate({
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
  
})



$('#addboxesdetails').on('click', function() {
    $("#productdetailsadd").valid();
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
		
		$(".tissuechkbox").change(function() {
			if(this.checked) {
				//Do stuff
				//alert("Testing");
				var id=$(this).val();
				//alert(id);
				if(id==1)
				{
			    $("#tissueprintcolor1").css("display","none");
				$("#tissueprintcolor2").css("display","none");
				$("#tissueprintcolor3").css("display","none");
				$("#tissueprintcolor4").css("display","none");
				$("#tissueprintcolor5").css("display","block");
				$("#tissueprintcolor6").css("display","block");
				$("#tissueprintcolor7").css("display","block");
				$("#tissueprintcolor8").css("display","block");
				}
				else if (id==0)
				{
			     $("#tissueprintcolor1").css("display","block");
				$("#tissueprintcolor2").css("display","block");
				$("#tissueprintcolor3").css("display","block");
				$("#tissueprintcolor4").css("display","block");
				$("#tissueprintcolor5").css("display","none");
				$("#tissueprintcolor6").css("display","none");
				$("#tissueprintcolor7").css("display","none");
				$("#tissueprintcolor8").css("display","none");
			
				}
				
			}
			
		});
		
		$(".packagechkbox").change(function() {
			if(this.checked) {
				//Do stuff
				//alert("Testing");
				var id=$(this).val();
				//alert(id);
				if(id==1)
				{
			    $("#packageprintcolor1").css("display","none");
				$("#packageprintcolor2").css("display","none");
				$("#packageprintcolor3").css("display","none");
				$("#packageprintcolor4").css("display","none");
				$("#packageprintcolor5").css("display","block");
				$("#packageprintcolor6").css("display","block");
				$("#packageprintcolor7").css("display","block");
				$("#packageprintcolor8").css("display","block");
				}
				else if (id==0)
				{
			     $("#packageprintcolor1").css("display","block");
				$("#packageprintcolor2").css("display","block");
				$("#packageprintcolor3").css("display","block");
				$("#packageprintcolor4").css("display","block");
				$("#packageprintcolor5").css("display","none");
				$("#packageprintcolor6").css("display","none");
				$("#packageprintcolor7").css("display","none");
				$("#packageprintcolor8").css("display","none");
			
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
	//packaging stickers
	
			function imageselect2()
{
	// alert("Testing");
	var fileName = $('.fbfile2').val();
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
		$('.fbfile2').val('');
		alert('Please upload valid image file!');
		return false;
	}
	
	    
}
function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
			
            reader.onload = function (e) {
			 $('#selimage2').empty();
			 $('#selectimageid2').val('');
			 //$('#blahimg').hide();
			 
			var imageurl='<img id="blah2" src="" alt="your image" width="80" height="80" />';
				var text=$('#selimage2').html(imageurl);
				//alert(text);
				$('#blah2').attr('src', e.target.result).width(80).height(80);
				 //$('#selectimage').attr(e.name);
				 $('input[name=selectimage2]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
  
    $("#imgInp2").change(function(){
        readURL2(this);
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
								if(RawMaterial!="" && Thickness!="" && Width!="" && Height!="" && Length!="" && PrintType!=""  && print_color1!="" 
								   && CuttingName!="")
								{
									alert("ok");
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
				 //alert("yes hook");	
				 
				 $("#hookform").css("display","block");
				  test();
				 
				}
				if($("#TissuePaper").is(':checked'))
				{
					//alert("yes tissuepaper");
				 
				 $("#tissuepaperform").css("display","block");
				  test1();
				
				}
				if($("#PackagingStickers").is(':checked'))
				{
					//alert("yes packaging stickers");	
				 
				 $("#Packagingstickersform").css("display","block");
				 test2();
				 
				 
				}
				
				$("#boxform").css("display","none");
				//alert(pLen);
				//alert("test");
				
				
				
              
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
			event.preventDefault();
        	}
				
		});
			  
								}
												 
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
													  
													  
$('#Hook_Width').on('keyup',function(e){
			var oldstr=$('#Hook_Width').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#Hook_Width').val(tokens+suffix);
			
		});
		
		$('#Hook_Length').on('keyup',function(e){
			var oldstr=$('#Hook_Length').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#Hook_Length').val(tokens+suffix);
			
		});
		
		$('#tissuepaper_Width').on('keyup',function(e){
			var oldstr=$('#tissuepaper_Width').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#tissuepaper_Width').val(tokens+suffix);
			
		});
		
		$('#tissuepaper_Length').on('keyup',function(e){
			var oldstr=$('#tissuepaper_Length').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#tissuepaper_Length').val(tokens+suffix);
			
		});
		$('#package_Width').on('keyup',function(e){
			var oldstr=$('#package_Width').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#package_Width').val(tokens+suffix);
			
		});
		
		$('#package_Length').on('keyup',function(e){
			var oldstr=$('#package_Length').val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$('#package_Length').val(tokens+suffix);
			
		});
		
		function test()
		{
		//alert("validate");	
		var hookdetails =$("#hooksadd").validate({
		  rules: {
			 HooksMaterial : {
			required: true
		  },
		  Color: {
			 required:true  
		  },
		  Thickness:{
			 required:true  
		  },
		  Hook_Width:{
			required:true  
		  },
		  Hook_Length:{
			required:true  
		  },
           MoldCostingCurrency:{
			required:true   
		   },
		   MoldCosting:{
			   required:true
		   },
		   Hook_UniqueProductCode:{
			 required:true  
		   },
		   Hook_factoryName:{
			required:true   
		   },
		   Hook_StatusName:{
			 required:true  
		   },
          imgInp:{
			required:true  
		  }
	
  }
});
		}
		function test1()
		{
		//alert("validate");	
		var hookdetails =$("#hooksadd").validate({
		  rules: {
			 Tissuepaper_RawMaterial : {
			required: true
		  },
		  Tissuepaper_Thickness:{
			required:true  
		  },
		  tissuepaper_Width:{
			required:true  
		  },
		  tissuepaper_Length:{
			required:true  
		  },
		  GroundPaperColor:{
			required:true  
		  },
		  Tissuepaper_PrintType:{
			required:true  
		  },
		  tissueprintcolor:{
			required:true  
		  },
		  tissuepaper_print_color1:{
			required:true  
		  },
		  Tissuepaper_Cutting:{
			  required:true
		  },
		  Tissuepaper_UniqueProductCode:{
			 required:true  
		  },
		 Tissuepaper_factoryName:{
			required:true 
		 },
		 Tissuepaper_StatusName:{
			 required:true 
		 },
        imgInp1:{
		       required:true	
		}
	
  }
});
		}
		function test2()
		{
			
		//alert("validate");	
		var hookdetails =$("#hooksadd").validate({
		  rules: {
			 PackagingStickersTypes : {
			required: true
		  },
		    PackageThickness:{
			required:true  
		  },
		   PackageThickness:{
			required:true  
		  },
		  package_Width:{
			required:true  
		  },
		  package_Width:{
			required:true  
		  },
		  package_Length:{
			required:true  
		  },
		  TypeofAdhesive:{
			required:true  
		  },
		  Shape:{
			required:true  
		  },
		  Package_PrintType:{
			required:true  
		  },
		  packageprintcolor:{
			required:true  
		  },
		  packageprint_color1:{
			required:true  
		  },
		  Package_Cutting:{
			required:true  
		  },
		  Package_UniqueProductCode:{
			  required:true
		  },
		  Package_factoryName:{
			required:true  
		  },
		  Package_StatusName:{
			required:true  
		  },
		  imgInp2:{
			required:true  
		  }
			  

	
  }
});
		
			
		}
		