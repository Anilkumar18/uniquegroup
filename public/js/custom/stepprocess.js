 $(document).ready(function() { 


var productgroups=$('#productgroups');
productgroups.find('input').each(function(){
var processid=$(this).attr('id');

$(this).attr("disabled", "disabled");
});
productgroups.find('select').each(function(){
var processid=$(this).attr('id');

$(this).attr("disabled", "disabled");
});
productgroups.find('img').each(function(){
var processid=$(this).attr('id');

$(this).attr("disabled", "disabled");
});

debugger;
//Defect:Validation
//Vidhya:PHP
//Validation for development fields
$("#Hook_Width").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });
$("#Hook_Length").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
                
            }
                   });
$("#tissuepaper_Width").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });
$("#tissuepaper_Length").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });
$("#package_Width").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });
$("#package_Length").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });
$(".quantitychkdiv").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
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

		

		$('.regionselect').change(function(){

var ProductionRegions = $(this).val();
var pp=$(this).parent().parent().parent().next('.frmgroup');
			var selectname=pp.find('select').attr('name');	
			if(ProductionRegions!="")
			{
			var href=$("#productsubgroupurl").val()+'/add_productsdetails/ajax/'+ProductionRegions;
		  $.ajax({
                    url: href,
                    type: "GET",
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
				pscodehtml+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory1" name="'+selectname+'" class="form-control  productionregion2 uniquefactory"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml+='</select>';
				
				pscodehtml+='</div></div>';
				
				}
				
				
			
				
pp.find('.factoryselect').html('');
pp.find('.factoryselect').html(pscodehtml);
				
				
				
				 //$('.uniquefactory1').html(pscodehtml);
				//$('#uniquefactory1').val(id);
				
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

});

		$("#imgInp3").change(function(){ 
        readURL3(this);
		
		
    });

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

		$('select[name="Currency"]').on('change', function() {
													
													//alert("testing");
													var id=$(this).val();
													//alert(id);
													
													if(id==1)
													{
													var money_name="$ ";
													
													}
													else if(id==2)
													{
													var money_name="CAD ";
													
													}
													else if(id==3)
													{
													var money_name="Rs ";
													
													}
													else if(id==4)
													{
													var money_name="RMB ";
													
													}
													else if(id==5)
													{
													var money_name="TRY ";
													
													}
													else if(id==6)
													{
													var money_name="GBP ";
													
													}
													else if(id==7)
													{
													var money_name="HKD ";
													
													}
													$(".currencytype").html(money_name);
													
													  });

		$('.inventoryprice').change(function(){
        var suggestedprice=$(this).val();
 var pp=$(this).parent().index();

 var inventorypricechk=$('.inventorypricechk:eq('+pp+')');
inventorypricechk.find(':checkbox').attr('checked','checked');
var margin=$('#input0').val();
var costblk=$('.costblock:eq('+pp+')');
costblk.find(':text').val(suggestedprice);

var quantitychkdiv=$('.sellingquantitychkdiv:eq('+pp+')');
quantitychkdiv.find(':checkbox').attr('checked','checked');

var onefactor=1-(margin/100);
var calcper=(suggestedprice/onefactor).toFixed(2); 
if(margin==''){calcper=0;}
$('.suggestedpriceblock:eq('+pp+')').find('.suggestedprice').val(calcper);

var marginpriceblk=$('.marginpriceblock:eq('+pp+')');
marginpriceblk.find('.margin').val(margin)

    });

		$('.cost').change(function(){

			var costprice=$(this).val();debugger;
        // Rajesh 05032018 For new tab design
 var pp=$(this).parent().parent().index();

var marginpriceblk=$('.marginpriceblock:eq('+pp+')');
var sellingpriceblk=$('.suggestedpriceblock:eq('+pp+')');
var marginprice=marginpriceblk.find(':text').val();
 var sellingprice=0;
if(marginprice){
var amentprice= (1-(marginprice/100)).toFixed(2);

 sellingprice=(costprice/amentprice).toFixed(2);

}else{
	var marginprice=$('#input0').val();
	var amentprice= (1-(marginprice/100)).toFixed(2);
marginpriceblk.find('.margin').val(marginprice);
 sellingprice=(costprice/amentprice).toFixed(2);
}
sellingpriceblk.find(':text').val(sellingprice);

		});

		$('.margin').change(function(){

			var tt=$(this).val();
   var pindex=$(this).index();
    var pp=$('.suggestedpriceblock:eq('+pindex+')');

    var costblk=$('.costblock:eq('+pindex+')');
	var price=costblk.find('.cost').val();
var onefactor=1-(tt/100);
var calcper=(price/onefactor).toFixed(2); 
if(tt==''){calcper=0;}
pp.find('.suggestedprice').val(calcper);

		});



		$(".costotherprice").change(function() {
			 
			 
		 });

		$(".otherqtyclass").change(function() {
			 var quantitychkblock=$('.quantitychkblock');
					quantitychkblock.find('.sellingquantitychkdiv:last').append($(this).val());
			 });
		$(".otherqtycost").change(function() {
			 var quantitychkblock=$('.quantitychksec');
				quantitychkblock.find('.costblock:last').find(':text').val($(this).val());
				var marginprice=$('#input0').val();
				var amentprice= (1-(marginprice/100)).toFixed(2);
				quantitychkblock.find('.marginpriceblock:last').find(':text').val(marginprice);
				var sellingprice=($(this).val()/amentprice).toFixed(2);


				quantitychkblock.find('.suggestedpriceblock:last').find(':text').val(sellingprice);
				var pp=$(this).parent().index();
var quantitychkdiv=$('.sellingquantitychkdiv:eq('+pp+')');
quantitychkdiv.find(':checkbox').attr('checked','checked');

			 });



$('#ProductSubGroupName').change(function(){

var selecthref=$("#ProductSubGroupName option:selected").text(); 
  
      //alert(selecthref);
      if(selecthref!=0){
      	document.getElementById("demoname").innerHTML = ' /  '+selecthref;
	  }
var productgroup = $("#ProductGroup").val();
var productsubgroupid = $("#ProductSubGroupName").val();

			
			var href=$("#productsubgroupurl").val()+'/getproductdetails/'+productgroup+'/'+productsubgroupid;
			

			$.ajax({
                    url: href,
                    type: "GET",
                    dataType: "html",
                    success:function(data) {


$('.productdetailsblock').html(data);
//Defect:Validation
//Vidhya:PHP
//Validation for development fields
$("#Width").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });
$("#Height").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;

            }
                   });
          $("#Length").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });

           $(".mmspecific").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });

          $('.mmspecific').on('keyup',function(e){
	
			var oldstr=$(this).val();
			var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
			$(this).val(tokens+suffix);
			
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
				$("#print_color1").attr("disabled","disabled");$("#print_color2").attr("disabled","disabled");$("#print_color3").attr("disabled","disabled");$("#print_color4").attr("disabled","disabled");$("#print_color5").removeAttr("disabled");$("#print_color6").removeAttr("disabled");$("#print_color7").removeAttr("disabled");$("#print_color8").removeAttr("disabled");
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
			$("#print_color1").removeAttr("disabled");$("#print_color2").removeAttr("disabled");$("#print_color3").removeAttr("disabled");$("#print_color4").removeAttr("disabled");$("#print_color5").attr("disabled","disabled");$("#print_color6").attr("disabled","disabled");$("#print_color7").attr("disabled","disabled");$("#print_color8").attr("disabled","disabled");
			
				}
				
			}
			
		});

		$("#SampleRequestedDate").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            var curchr = this.value.length;
            var curval = $(this).val();
            
            if (curchr == 2) {
                $(this).val(curval + "/");
            } else if (curchr == 5) {
                $(this).val(curval + "/");
            }
            $(this).attr('maxlength', '10');
        });

$('.regionselect').change(function(){

var ProductionRegions = $(this).val();
var pp=$(this).parent().parent().next('.printcolorhidden');
		var selectname=pp.find('select').attr('name');	
			if(ProductionRegions!="")
			{
			var href=$("#productsubgroupurl").val()+'/add_productsdetails/ajax/'+ProductionRegions;
		  $.ajax({
                    url: href,
                    type: "GET",
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
				pscodehtml+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory1" name="'+selectname+'" class="form-control  productionregion2 uniquefactory"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					//alert(data[0][i]['OfficeFactoryName']);
					
					pscodehtml+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
					
				}
					   
				pscodehtml+='</select>';
				
				pscodehtml+='</div></div>';
				
				}
				
				
			
				
pp.find('.factoryselect').html('');
pp.find('.factoryselect').html(pscodehtml);
				
				
				
				 //$('.uniquefactory1').html(pscodehtml);
				//$('#uniquefactory1').val(id);
				
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

});


		$("#imgInp3").change(function(){ 
        readURL3(this);
		
		
    });
		$('#hookform').addClass('hideblock');
		$('#tissuepaperform').addClass('hideblock');
		$('#Packagingstickersform').addClass('hideblock');
//Hook

$('#Hook').change(function(){ 
var productgroups=$('#hookform');
if(this.checked) {
	$('#hookform').removeClass('hideblock');
	var productnamenew=$('#Hook:checked').val();
//alert(productnamenew);
document.getElementById("productchecked").innerHTML = ' / '+productnamenew;
productgroups.find('input').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('select').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('img').each(function(){
$(this).removeAttr('disabled');
});
}else{
$('#hookform').addClass('hideblock');
var productnamenew=$('#Hook:checked').val();

document.getElementById("productchecked").innerHTML = "";
	
productgroups.find('input').each(function(){
$(this).attr('disabled','disabled');
});
productgroups.find('select').each(function(){
$(this).attr('disabled','disabled');
});
productgroups.find('img').each(function(){
$(this).attr('disabled','disabled');
});



}


});
//Tissue
$('#TissuePaper').change(function(){
var productgroups=$('#tissuepaperform');
if(this.checked) {
	$('#tissuepaperform').removeClass('hideblock');
	var productnamenew=$('#TissuePaper:checked').val();
//alert(productnamenew);
document.getElementById("productchecked1").innerHTML = ' / '+productnamenew;
productgroups.find('input').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('select').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('img').each(function(){
$(this).removeAttr('disabled');
});
}else{

	$('#tissuepaperform').addClass('hideblock');
	var productnamenew=$('#TissuePaper:checked').val();

document.getElementById("productchecked1").innerHTML = "";
productgroups.find('input').each(function(){
$(this).attr('disabled','disabled');
});
productgroups.find('select').each(function(){
$(this).attr('disabled','disabled');
});
productgroups.find('img').each(function(){
$(this).attr('disabled','disabled');
});

}


});
//Stickers
//Tissue
$('#PackagingStickers').change(function(){
var productgroups=$('#Packagingstickersform');
if(this.checked) {
	$('#Packagingstickersform').removeClass('hideblock');
	var productnamenew=$('#PackagingStickers:checked').val();
//alert(productnamenew);
document.getElementById("productchecked2").innerHTML = ' /  '+productnamenew;
productgroups.find('input').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('select').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('img').each(function(){
$(this).removeAttr('disabled');
});
}else{

	$('#Packagingstickersform').addClass('hideblock');
	var productnamenew=$('#PackagingStickers:checked').val();

document.getElementById("productchecked2").innerHTML = "";
productgroups.find('input').each(function(){
$(this).attr('disabled','disabled');
});
productgroups.find('select').each(function(){
$(this).attr('disabled','disabled');
});
productgroups.find('img').each(function(){
$(this).attr('disabled','disabled');
});

}


});

$(".languagename").change(function() { 
processcaredetails();

 });
$('#TypeofLabels').change(function() {
$('.careinformation').html('');
processcaredetails();
});
$('#TypeofLabels1').change(function() {
	var selecthref=$("#TypeofLabels option:selected").text().toLowerCase();
	
var productgroup = 2;
var productsubgroupid = 13;

			
			var href=$("#productsubgroupurl").val()+'/getcaredetails/'+productgroup+'/'+productsubgroupid;
			

			$.ajax({
                    url: href,
                    type: "GET",
                    dataType: "html",
                    success:function(data) {
$('.careinformation').html(data);
var labelprocess=0;
var selecthref=$("#TypeofLabels option:selected").text().toLowerCase();
	if(selecthref.indexOf('size') == -1){ labelprocess=labelprocess+1;
			var careinfblk=$('.careinformation');
careinfblk.find('.printcolorhidden').each(function(){
	if($(this).hasClass('processdiv')){
		careinfblk.find('.label_font').each(function(){
					var kk=$(this).html();
						if(kk.indexOf('Sizes') != -1){
							$(this).parent().remove();
		                }
		});
	}
});
}
if(selecthref.indexOf('coo') == -1){ labelprocess=labelprocess+1;
			var careinfblk=$('.careinformation');
careinfblk.find('.printcolorhidden').each(function(){
	if($(this).hasClass('processdiv')){
		careinfblk.find('.label_font').each(function(){
					var kk=$(this).html();
						if(kk.indexOf('Country of Origin') != -1){
							$(this).parent().remove();
		                }
		});
	}
});
}
if(selecthref.indexOf('care') == -1){ labelprocess=labelprocess+1;
			var careinfblk=$('.careinformation');
careinfblk.find('.printcolorhidden').each(function(){
	if($(this).hasClass('processdiv')){
		careinfblk.find('.label_font').each(function(){
					var kk=$(this).html();
						if(kk.indexOf('Care') != -1){
							$(this).parent().remove();
		                }
		});
	}
});
}

if(labelprocess==3){
	$('.careinformation').html('');
}

var fabriccompositiondiv=$('.fabriccompositiondiv').html();
$(".languagename").change(function() { fnprocesslanguage(); });

$(".instruction").change(function() { fnprocesslanguage();});



    

$('.GarmentComponents').change(function() {
	var lang=$(this).attr('data-lang');
	var fabrichref=$("#productsubgroupurl").val()+'/getgarmentfabric/'+lang;

 $.ajax({
                    url: fabrichref,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
debugger;
var message=data;

var fabrichtml='<div class="row garmentfabricblk"><div class="col-md-12"><span class="garment_title col-md-5">GarmentComponents:</span><h4 class="col-md-5">'+$(".GarmentComponents option:selected").text()+'<input type="hidden" name="GarmentComponentID[]" value="'+$(".GarmentComponents option:selected").val()+'"></h4><span class="cleargarment col-md-2">clear</span></div><label class="col-lg-12 control-label font-noraml text-left label_font">Fabric Composition - '+lang.toUpperCase()+'<span class="required">*</span></label><div class="col-lg-12"><div class="col-md-5 listbox listleft">';
var fabriclength=message[0]['fabricinfo']['fabric'].length;
for(var i=0;i<fabriclength;i++){
	var fabricID=message[0]['fabricinfo']['fabricID'][i];
	var fabric=message[0]['fabricinfo']['fabric'][i];
	fabrichtml+='<div class="col-lg-12"><label><input type="checkbox" value="'+fabricID+'" name="garmentfabric'+lang+'[]" id="moveleft" class="moveLeftblk">'+fabric+'</label><input type="text" name="garmentfabriccomposition'+lang+'[]" class="compositionblk"></div>';
}

fabrichtml+='</div><div class="subject-info-arrows text-center col-md-2"><input type="button" id="moveAllRight" class="1moveAllRight" onclick="fillmoveAllRight(this)" value=">>"><br><input type="button" id="moveRight" class="1moveRight" onclick="fillmoveRight(this)" value=">"><br><input type="button" id="moveLeft" class="1moveLeft" onclick="fillmoveLeft(this)" value="<"><br><input type="button" id="moveAllLeft" class="1moveAllLeft" onclick="fillmoveAllLeft(this)" value="<<"></div><div class="col-md-5 listbox listright"></div></div><div class="col-lg-12"><div class="col-lg-6"></div><div class="col-lg-6">Total<input type="text" name="totalcompositionpercenatge" id="totalcompositionpercenatge" class="form-control totalcompositionpercenatge" value="">%<input type="hidden" id="percen100" class="percen100" value="100"></div></div></div>';


$('.garmentcomponentsblk').append(fabrichtml);

$('.cleargarment').click(function(){
$(this).parent().parent().remove();

});
                    	}
                    });
			
/*var garmenthtml='<div class="row garmentfabricblk"><div class="col-md-12">GarmentComponents:<h4>'+$(".GarmentComponents option:selected").text()+'</h4></div>'+fabriccompositiondiv+'</div>';*/
	
	
});
$(".dropdownwidth").select2({
                placeholder: "Please Select"
            });

						}
                    });

});
$(".dropdownwidth").select2({
                placeholder: "Please Select"
            });

                    }
                });

});


$('#Inventory').change(function() {
var inventoryid=$(this).val();
	 
	 var productgroups=$(".inventorycontent"); 
	  if(inventoryid==1)
	  {
		//$(".inventorycontent").css("display","block");  


		  productgroups.find('input').each(function(){
		$(this).removeAttr("disabled");
		});
		productgroups.find('select').each(function(){
		$(this).removeAttr("disabled");
		});

		
	  }
	  else
	  {
		 productgroups.find('input').each(function(){
		$(this).attr("disabled", "disabled");
		});
		productgroups.find('select').each(function(){
		$(this).attr("disabled", "disabled");
		});
	  }

});

$(".dropdownwidth").select2({
                placeholder: "Please Select"
            });
 });

 function imageselect3()
{
	 
	var fileName = $('.fbfile3').val();
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
		$('.fbfile3').val('');
		alert('Please upload valid image file!');
		return false;
	}
	
	    
}


function readURL3(input) {
	
	
        if (input.files && input.files[0]) {
            var reader = new FileReader();
			
            reader.onload = function (e) {
			 $('#selimage3').empty();
			 $('#selectimageid3').val('');
			 //$('#blahimg').hide();
			 
			var imageurl='<img id="blah3" src="" alt="your image" width="80" height="80" />';
				var text=$('#selimage3').html(imageurl);
				//alert(text);
				$('#blah3').attr('src', e.target.result).width(80).height(80);
				 //$('#selectimage').attr(e.name);
				 $('input[name=selectimage3]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
			
			
        }
    }

    function uploadimageselect(input,type){

	var typeid='#'+type;
	
        if (input.files && input.files[0]) {
            var reader = new FileReader();
			
            reader.onload = function (e) {
			 $('#selimage3').empty();
			 $('#selectimageid3').val('');
			 //$('#blahimg').hide();
			 
			var imageurl='<img id="blah3" src="" alt="your image" width="80" height="80" />';
				var text=$('#selimage3').html(imageurl);
				//alert(text);
				$(typeid).attr('src', e.target.result).width(80).height(80);
				 //$('#selectimage').attr(e.name);
				 $('input[name=selectimage3]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
			
			
        }
    
    }
// Task for Language 
//DONE: Rajesh on 19032018
    function fnprocesslanguage(){ 
    	var careinfblk=$('.careinformation');
careinfblk.find('.printcolorhidden').each(function(){
if($(this).hasClass('processdiv')){
				$(this).hide();
			}
});
$.each($("input[name='LanguageName[]']:checked"), function(){
var pp=$(this).parent().parent().parent().parent();

var processlan=$(this).attr('data-lang').split('/');
for(var kk=0;kk<processlan.length;kk++){
var lan=processlan[kk];
			
	pp.find('.label_font').each(function(){
		var kk=$(this).html();
		if(kk.indexOf(lan) != -1){
			
			if($("input[name='Instruction[]']:checked").length >0){
			$.each($("input[name='Instruction[]']:checked"), function(){
				var pp=$(this).parent().parent().parent().parent();            
                var ht=$(this).parent().find('p').html().replace(/\s+/g, '_');
                pp.find('.label_font').each(function(){
					var kk=$(this).html();
					if(kk.indexOf('Fabric') != -1){
						if(kk.indexOf(lan) != -1){
    						$(this).parent().show();
    						$(this).parent().addClass('underprocess');
    						}	
					}else if(kk.indexOf('Garment') != -1){
						if(kk.indexOf(lan) != -1){
    						$(this).parent().show();
    						$(this).parent().addClass('underprocess');	
    					}
					}else if(kk.indexOf(ht) != -1){
						if(kk.indexOf(lan) != -1){
    						$(this).parent().show();
    						$(this).parent().addClass('underprocess');
    					}
    				}
				});


            });
		}else{
							$(this).parent().show();
    						$(this).parent().addClass('underprocess');
		}
		}
	});
}
});

$('.compositionblk').change(function(){  alert('EEEEE');
	var compositionpercentage=0;
$(this).parent().find('.compositionblk').each(function(){ 
if($(this).val()){
	var valper=Math.ceil($(this).val()/10)*10;
	$(this).val(valper);
	compositionpercentage=parseInt(valper)+parseInt(compositionpercentage)
}
});

	$('.totalcompositionpercenatge').val(compositionpercentage);

});

    }

     function fillmoveAllRight(t){
	var pp=$(t).parent().parent().find('.listleft');
      var movepp=$(t).parent().parent().find('.listright');  

        pp.find("input[type='checkbox']").each(function(){
var selectedOpts_pare=$(this).parent().parent();
movepp.append($(selectedOpts_pare).clone());
$(selectedOpts_pare).remove();
});
$('.compositionblk').change(function(){  
	var compositionpercentage=0;
$(this).parent().parent().find('.compositionblk').each(function(){ 
if($(this).val()){
	var valper=Math.ceil($(this).val()/10)*10;
	$(this).val(valper);
	compositionpercentage=parseInt(valper)+parseInt(compositionpercentage)
}
});

$(this).parent().parent().parent().parent().find('.totalcompositionpercenatge').val(compositionpercentage);

});
        
    }

     function fillmoveRight(t){ debugger;
        var pp=$(t).parent().parent().find('.listleft');
        var movepp=$(t).parent().parent().find('.listright');
        var selectedOpts = pp.find("input:checked");
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            
        }

        pp.find("input:checked").each(function(){
var selectedOpts_pare=$(this).parent().parent();
movepp.append($(selectedOpts_pare).clone());
$(selectedOpts_pare).remove();
});

        $('.compositionblk').change(function(){ 
	var compositionpercentage=0;
$(this).parent().parent().find('.compositionblk').each(function(){ 
if($(this).val()){
	var valper=Math.ceil($(this).val()/10)*10;
	$(this).val(valper);
	compositionpercentage=parseInt(valper)+parseInt(compositionpercentage)
}
});

$(this).parent().parent().parent().parent().find('.totalcompositionpercenatge').val(compositionpercentage);

});
        
    }
    
    function fillmoveLeft(t){
         var pp=$(t).parent().parent().find('.listright');
         var movepp=$(t).parent().parent().find('.listleft');
        var selectedOpts = pp.find("input:checked");
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            
        }

        pp.find("input:checked").each(function(){
var selectedOpts_pare=$(this).parent().parent();
movepp.append($(selectedOpts_pare).clone());
$(selectedOpts_pare).remove();
});
       
    }
    function fillmoveAllLeft(t){
         var pp=$(t).parent().parent().find('.listright');
        var movepp=$(t).parent().parent().find('.listleft');

        pp.find("input[type=checkbox]").each(function(){
var selectedOpts_pare=$(this).parent().parent();
movepp.append($(selectedOpts_pare).clone());
$(selectedOpts_pare).remove();
});
       
    }	

    function processcaredetails() {
var lanlen=$("input[name='LanguageName[]']:checked").length;
var selecthref=$("#TypeofLabels option:selected").text().toLowerCase();
var pptxt=$('.languagenameblk');
if(lanlen>0){
	$('.careinformation').html('');var co='';
    	$.each($("input[name='LanguageName[]']:checked"), function(){
    		co+=$(this).attr('data-lang')+',';

    	});
    	co = co.replace(/,\s*$/, "");
    	var pststus=0;
if(selecthref.indexOf('size') != -1){ pststus=1;
	var type='sizes';pptxt.show();pptxt.find('input').removeAttr('disabled');
	

	var href=$("#productsubgroupurl").val()+'/getcaredetails/'+type+'/'+co;
			

			$.ajax({
                    url: href,
                    type: "GET",
                    dataType: "html",
                    success:function(data) {

var messagedet = JSON.parse(data);
var plen=messagedet[0]['details'].length;
var phtml='<div class="printcolorhidden underprocess" style=""><label class="col-lg-2 control-label font-noraml text-left label_font">Sizes:<span class="required">*</span></label><div class="col-lg-10">';
for(var i=0;i<plen;i++){
	phtml+='<div class="col-lg-12"><input type="checkbox" name="sizemaintenance[]" id="sizemaintenance" value="'+messagedet[0]['sizemaintenanceID'][i]+'" data-sizemaintenance="'+messagedet[0]['details'][i].split(' ').join('_').toLowerCase()+'" class="sizemaintenance"><p class="spanval label_font">'+messagedet[0]['details'][i]+'</p></div>';
}
phtml+='</div></div>';
$('.careinformation').append(phtml);
$(".sizemaintenance").change(function() {
if($(this).is(':checked')){ 
	var parentdiv=$(this).parent();
var maintenancetype=$(this).val();
var sizename=$(this).attr("data-sizemaintenance");
var href=$("#productsubgroupurl").val()+'/sizemaintenancedetails/'+maintenancetype+'/'+co;
$.ajax({
                    url: href,
                    type: "GET",
                    dataType: "html",
                    success:function(data) {

var messagedet = JSON.parse(data);
var plen=messagedet[0]['details'].length;
var phtml='<div class="printcolorhidden sizemaintenancedetails" style=""><label class="col-lg-2 control-label font-noraml text-left label_font">Sizes:<span class="required">*</span></label><div class="col-lg-10"><select id="SizesName" required="" multiple="multiple" name="'+sizename+'[]" class="form-control dropdownwidth"><option value="">Please Select</option>';
for(var i=0;i<plen;i++){
	phtml+='<option value="'+messagedet[0]['details'][i]+'">'+messagedet[0]['details'][i]+'</option>';
}
phtml+='</select></div></div>';
parentdiv.append(phtml);
$(".dropdownwidth").select2({
                placeholder: "Please Select"
            });

                    }
    });

}
if(!$(this).is(':checked')){
	$(this).parent().find('.sizemaintenancedetails').remove();
}
 });


                    }
                });


}
if(selecthref.indexOf('coo') != -1){ pststus=1;
	var type='countryoforigin';pptxt.show();pptxt.find('input').removeAttr('disabled');
	
debugger;
	var href=$("#productsubgroupurl").val()+'/getcaredetails/'+type+'/'+co;
			

			$.ajax({
                    url: href,
                    type: "GET",
                    dataType: "html",
                    success:function(data) {

var messagedet = JSON.parse(data);
var plen=messagedet[0]['details'].length;
var phtml='<div class="printcolorhidden underprocess" style=""><label class="col-lg-2 control-label font-noraml text-left label_font">CountryofOriginName:<span class="required">*</span></label><div class="col-lg-10"><select id="CountryofOriginName" required="" name="CountryofOriginName" class="form-control dropdownwidth"><option value="">Please Select</option>';
for(var i=0;i<plen;i++){
	phtml+='<option value="'+messagedet[0]['details'][i]+'">'+messagedet[0]['details'][i]+'</option>';
}
phtml+='</select></div></div>';
$('.careinformation').append(phtml);
$(".dropdownwidth").select2({
                placeholder: "Please Select"
            });
                    }
                });


}
if(selecthref.indexOf('care') != -1){ 
    	var phtml='<div class="printcolorhidden"><label class="col-lg-2 control-label font-noraml text-left label_font">Exclusive of Trimmings</label><div class="col-lg-5 checkboxdiv"><input type="checkbox" name="ExclusiveofTrimmings" id="ExclusiveofTrimmings" value="1"></div></div><div class="printcolorhidden"><label class="col-lg-2 control-label font-noraml text-left label_font">Exclusive of Decoration</label><div class="col-lg-5 checkboxdiv"><input type="checkbox" name="ExclusiveofDecoration" id="ExclusiveofDecoration" value="1"></div></div><div class="printcolorhidden"><label class="col-lg-2 control-label font-noraml text-left label_font">Exclusive of Findings</label><div class="col-lg-5 checkboxdiv"><input type="checkbox" name="ExclusiveofFindings" id="ExclusiveofFindings" value="1"></div></div><div class="printcolorhidden"><label class="col-lg-2 control-label font-noraml text-left label_font">Fire Warning Label</label><div class="col-lg-5 checkboxdiv"><input type="checkbox" name="FireWarningLabel" id="FireWarningLabel" value="1"></div></div>';
    	$('.careinformation').append(phtml);
    }
if(pststus==0){
	pptxt.find('input').attr('disabled','disabled');
    	pptxt.hide();
}

    }else{
    	var selecthref=$("#TypeofLabels option:selected").text().toLowerCase();

if(selecthref.indexOf('size') == -1 && selecthref.indexOf('coo') == -1){
    	pptxt.find('input').attr('disabled','disabled');
    	pptxt.hide();
    }else if(selecthref.indexOf('care') != -1){ $('.careinformation').html('');
    	var phtml='<div class="printcolorhidden"><label class="col-lg-2 control-label font-noraml text-left label_font">Exclusive of Trimmings</label><div class="col-lg-5 checkboxdiv"><input type="checkbox" name="ExclusiveofTrimmings" id="ExclusiveofTrimmings" value="1"></div></div><div class="printcolorhidden"><label class="col-lg-2 control-label font-noraml text-left label_font">Exclusive of Decoration</label><div class="col-lg-5 checkboxdiv"><input type="checkbox" name="ExclusiveofDecoration" id="ExclusiveofDecoration" value="1"></div></div><div class="printcolorhidden"><label class="col-lg-2 control-label font-noraml text-left label_font">Exclusive of Findings</label><div class="col-lg-5 checkboxdiv"><input type="checkbox" name="ExclusiveofFindings" id="ExclusiveofFindings" value="1"></div></div><div class="printcolorhidden"><label class="col-lg-2 control-label font-noraml text-left label_font">Fire Warning Label</label><div class="col-lg-5 checkboxdiv"><input type="checkbox" name="FireWarningLabel" id="FireWarningLabel" value="1"></div></div>';
    	$('.careinformation').append(phtml);
    }else{
    	pptxt.find('input').removeAttr('disabled');
    	pptxt.show();
    }
    }
}
