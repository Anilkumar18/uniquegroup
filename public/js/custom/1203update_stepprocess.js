 $(document).ready(function() { 

 productionregiontrigger();
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

if($("#PackagingStickers").prop('checked') == true){ 
    var productgroups=$('#Packagingstickersform');
$('#hookform').removeClass('hideblock');
    productgroups.find('input').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('select').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('img').each(function(){
$(this).removeAttr('disabled');
});

}
if($("#TissuePaper").prop('checked') == true){ 
    var productgroups=$('#tissuepaperform');
$('#hookform').removeClass('hideblock');
    productgroups.find('input').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('select').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('img').each(function(){
$(this).removeAttr('disabled');
});

}

if($("#Hook").prop('checked') == true){ 
    var productgroups=$('#hookform');
$('#hookform').removeClass('hideblock');
    productgroups.find('input').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('select').each(function(){
$(this).removeAttr('disabled');
});
productgroups.find('img').each(function(){
$(this).removeAttr('disabled');
});

}

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

		$('.inventoryregionselect').change(function(){

var ProductionRegions = $(this).val();
var pp=$(this).parent().parent().next('.printcolorhidden');
			
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
				pscodehtml+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory1" name="uniquefactory1[]" class="form-control  productionregion2 uniquefactory"><option value="">Please select</option>';
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
													var money_name="C$ ";
													
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

			var costprice=$(this).val();
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

		$("#imgInp3").change(function(){ 
        readURL3(this);
		
		
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
	var typeval='#'+type+'_selectimage';
	
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
				 $('input[name="'+typeval+'""]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
			
			
        }
    
    }
    function productionregiontrigger()
			 {
$('.regionselect').each(function(){

var ProductionRegions = $(this).val();
var pp=$(this).parent().parent().parent().next('.frmgroup');
			var href=$("#productsubgroupurl").val()+'/add_productsdetails/ajax/'+ProductionRegions;

			if(ProductionRegions!="")
			{
			
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
				var proc_res=pp.find('.SelUniquefactory').val()?pp.find('.SelUniquefactory').val().split(","):0;

				for(j=0;j<pLen;j++)
				{ 
				pscodehtml+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory1" name="uniquefactory1[]" class="form-control  productionregion2 uniquefactory"><option value="">Please select</option>';
				for (i=0;i<pLen;i++){
					
var selectedvalue=proc_res[j];
					if(data[0][i]['id']==selectedvalue){ var selectedtxt='selected="selected"';}else{var selectedtxt='';}
					pscodehtml+='<option value="'+data[0][i]['id']+'" '+selectedtxt+'>'+data[0][i]['OfficeFactoryName']+'</option>';
					
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

$('.inventoryprice').each(function(){
        var suggestedprice=$(this).val();
if(suggestedprice!=''){
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
}
    });

$('select[name="Currency"]').trigger('change')
$('select[name="Inventory"]').trigger('change')

			 }