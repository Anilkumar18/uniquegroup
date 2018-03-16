 $(document).ready(function() { 
 
 inventoryregiontrigger();
							

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
  
  
	 
	
 });
 
   

				  
	
	  
	  $.ajaxSetup({
			  headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			})
	
	  
	 
	  
	  
	
		
 });
 

			 function inventoryregiontrigger()
			 {
				//alert("inventorytrigger");
				
				 var inventoryid=$("#Inventory").val();
				  // alert(inventoryid);
				  
				  if(inventoryid==1)
				  {
					$(".inventorycontent").css("display","block");  
					 var ProductionRegions1 = $('#ProductionRegions1').val();
				 
				 //alert(ProductionRegions1+"id");
				 
				  var ProductionRegions2 = $('#ProductionRegions2').val();
				  
				   //alert(ProductionRegions2+"id");
				  
				   var ProductionRegions3 = $('#ProductionRegions3').val();
				   
				  
						
						
				  
				
				 var href=$("#region_url").val();
				 
				 if(ProductionRegions1!="")
				 {
				   $.ajax({
                    url:href+'/update_productsdetails/ajax/'+ProductionRegions1,
				    type     : 'GET',
                    dataType: "json",
                    success:function(data) {
						
							//alert(data+"data");
						
                  
					
					var pLen,i,j;
					pLen=data[0].length;
					var k=1;	
				//alert(pLen+"Length");
				//alert("test");
				var pscodehtml='';
				
				var proc_res = $('#SelUniquefactory1').val().split(",");
				//alert(proc_res);
					debugger;
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[k]+'" name="uniquefactory1[]" class="form-control  productionregion2 uniquefactory1"><option value="">Please select</option>';
				
				var selectedvalue=proc_res[j];
					
					
				for (i=0;i<pLen;i++){
					
					if(data[0][i]['id']==selectedvalue){ var selectedtxt='selected="selected"';}else{var selectedtxt='';}
					
					pscodehtml+='<option value="'+data[0][i]['id']+'" '+selectedtxt+'>'+data[0][i]['OfficeFactoryName']+'</option>';
					
					
				}
					   
				pscodehtml+='</select>';
				
				pscodehtml+='</div></div>';
				
				}
				
				
				 $('.uniquefactory1').html(pscodehtml);  
				//$('#uniquefactory').val(id);
				
				//$('#productionregion2').val(id);
				
				
				event.preventDefault();
				                 
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
			event.preventDefault();
        	}
				
		});
				 }
				 
				 if(ProductionRegions2!="")
				 {
					 
					 //alert("productionregion2");
						//alert("newproductionregionsselections");
            //var ProductionRegions2 = $('#ProductionRegions2').val();
			//alert(ProductionRegions2);
			//var href=$("#region_url").val();
			//alert(href);
			
		  $.ajax({
                    url:href+'/update_productsdetails/ajax/'+ProductionRegions2,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
				var pscodehtml1='';
				var proc_res = $('#SelUniquefactory2').val().split(",");
				//alert(proc_res);
			
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml1+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory2[]" class="form-control  productionregion2 uniquefactory2"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					var selectedvalue=proc_res[j];
					
					
					
					if(data[0][i]['id']==selectedvalue){ var selectedtxt='selected="selected"';}else{var selectedtxt='';}
					
					pscodehtml1+='<option value="'+data[0][i]['id']+'" '+selectedtxt+'>'+data[0][i]['OfficeFactoryName']+'</option>';
					
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
            alert(textStatus);
            alert(errorThrown);
			event.preventDefault();
        	}
				
		});
												 
												 
					 
					 
					 
				 }
				 
				 if(ProductionRegions3!="")
				 {
					 
			
			var href=$("#region_url").val();
			
		  $.ajax({
                    url:href+'/update_productsdetails/ajax/'+ProductionRegions3,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
				
				var pscodehtml2='';
				var proc_res = $('#SelUniquefactory3').val().split(",");
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml2+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory3[]" class="form-control  productionregion2 uniquefactory3"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					var selectedvalue=proc_res[j];
					
					
					
					if(data[0][i]['id']==selectedvalue){ var selectedtxt='selected="selected"';}else{var selectedtxt='';}
					pscodehtml2+='<option value="'+data[0][i]['id']+'" '+selectedtxt+'>'+data[0][i]['OfficeFactoryName']+'</option>';
					
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
            alert(textStatus);
            alert(errorThrown);
			event.preventDefault();
        	}
				
		});
												 
												 
					 
				 }
				  }
				  else
				  {
					  $(".inventorycontent").css("display","none"); 
				  }
							 
							 
				
				 
				
				 
				 
				 
													 
													 									 
													 
			}
			
			
			/*when production regions change*/
			$('select[name="ProductionRegions1"]').on('change', function() {
						//alert("updateproductregions1");
            var ProductionRegions = $('#ProductionRegions1').val();
			//alert(ProductionRegions);
			var href=$("#region_url").val();
			//alert(href);
		  $.ajax({
                    url:href+'/update_productsdetails/ajax/'+ProductionRegions,
				    type     : 'GET',
                    dataType: "json",
                    success:function(data) {
						
							//alert(data);
						
                  
					
					var pLen,i,j;
					pLen=data[0].length;	
				//alert(pLen+"Length");
				//alert("test");
				var k=1;
				var pscodehtml='';
				for(j=0;j<pLen;j++)
				{ 
				pscodehtml+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory[]" class="form-control  productionregion2 uniquefactory1"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml+='</select>';
				
				pscodehtml+='</div></div>';
				
				}
				
				
			
				
				
				
				
				 $('.uniquefactory1').html(pscodehtml);  
				$('#uniquefactory').val(id);
				
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
												 
												 
			 $('select[name="ProductionRegions2"]').on('change', function() {
						//alert("newproductionregionsselections");
            var ProductionRegions = $('#ProductionRegions2').val();
			//alert(ProductionRegions);
			var href=$("#region_url").val();
			
		  $.ajax({
                    url:href+'/update_productsdetails/ajax/'+ProductionRegions,
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
				pscodehtml1+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory2[]" class="form-control  productionregion2 uniquefactory2"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml1+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml1+='</select>';
				
				pscodehtml1+='</div></div>';
				
				}
				
				 $('.uniquefactory2').html(pscodehtml1);  
				$('#uniquefactory2').val(id);
				
				
				
				
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
												 
												 
			$('select[name="ProductionRegions3"]').on('change', function() {
						//alert("newproductionregionsselections");
            var ProductionRegions = $('#ProductionRegions3').val();
			//alert(ProductionRegions);
			var href=$("#region_url").val();
			
		  $.ajax({
                    url:href+'/update_productsdetails/ajax/'+ProductionRegions,
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
				pscodehtml2+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory'+[j]+'" name="uniquefactory3[]" class="form-control  productionregion2 uniquefactory3"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml2+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml2+='</select>';
				
				pscodehtml2+='</div></div>';
				
				}
				
				
				
				
				
				
				
				 $('.uniquefactory3').html(pscodehtml2);  
				$('#uniquefactory3').val(id);
				
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
												 
												 
			
										 
								
	 
	

	
										