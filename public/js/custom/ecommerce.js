 $(document).ready(function() { 

var deliveryvalidator =$( "#deliveryinstradd" ).validate({
  rules: {
     customerOrdernum : {
    required: true
  },
 
   payingParty : {
    required: true
  },
deliveryTo : {
    required: true
  },
  billtoAddress : {
    required: true
  },
  contact : {
    required: true
  },
 emailAddress : {
    required: true
  },
  deliveryMethod : {
    required: true
  },
  confirmdetails : {
    required: true
  },
  acceptTerms : {
    required: true
  },

deliveryDate:{
   required: true
}
}
}); 

$(".dropdownwidth").select2({
                placeholder: "Please Select"
            });

$('#example1').DataTable({
            "pageLength": 25
        });

$('.quantitycls').change(function(){
	var tt=$(this).val();
	if(tt<100){
		tt=100
	}else{
		tt=Math.round(tt / 50) * 50;
	}
$(this).val(tt);
});

$('.producttype').click(function(){  
	var pval=$(this).val();
	if($('#imgsrc').length){
	var phtm=$('#imgsrc').html()+'/'+$(this).val();
	image = new Image();
    image.src = phtm;
    image.onload = function () {
        $('#productimg').empty().append(image);
    };
    image.onerror = function () {
        $('#productimg').empty().html('That image is not available.');
    }

    $('#productimg').empty().html('Loading...');

$('.productitemcode').html($(this).attr('data-producttxt'));
}
if($('#zipperimgsrc').length){

$('.productitemcode').html($(this).attr('data-producttxt'));
var href=$("#pageurl").val()+'/getzippercolorId/ajax/'+$(this).val();
		  $.ajax({
                    url: href,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
var messagedet=data;

var plen=messagedet[0]['zipcolorid'].length;
var phtml='<table id="colortable" class="table table-bordered" style="background-color: white;"><thead><tr><th style="background-color: white;">Picture</th><th style="background-color: white;width: 350px;">Colour</th><th style="background-color: white;">Quantity</th></tr></thead><tbody>';
for(var i=0;i<plen;i++){
var phtm=$('#zipperimgsrc').html()+'/'+messagedet[0]['zipcolorid'][i];
	
	phtml+='<tr class="gradeX"><td class="zippercolorimg colorimg" id="colorimg"><img width="200px" height="30px" src="'+phtm+'"></td><td><input id="zipperColor" name="zipperColor[]" type="hidden" class="form-control" value="1">'+messagedet[0]['zipcolorcolor'][i]+'</td><td><input id="quantity" name="sizeQuanity[]" type="text" class="form-control quantitycls"></td></tr>';


}
phtml+='</tbody></table>';

$('#productimg').html(phtml);

$('.quantitycls').change(function(){
	var tt=$(this).val();
	if(tt<100){
		tt=100
	}else{
		tt=Math.round(tt / 50) * 50;
	}
$(this).val(tt);
});
                    }
                });

}

if(('#careenable').length){
    fngetfabriccompositiondetails($(this).val());
    var href=$("#pageurl").val()+'/getcaredetails/ajax/'+$(this).val();
          $.ajax({
                    url: href,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
var messagedet=data;
var Exclusive='';
if(messagedet[0]['CountryofOriginID']){
var phtml='<option></option>';
for(var i=0;i<data[0]['CountryofOriginID'].length;i++){

    
    phtml+='<option value="'+data[0]['CountryofOriginID'][i]+'">'+data[0]['CountryofOriginID'][i]+'</option>';


}
}
$('#countryOfOrigin').html(phtml);

//$('#countryoforigin').val(messagedet[0]['CountryofOriginID']);
if(messagedet[0]['ExclusiveofTrimmings']!=''){
Exclusive+='<div class="col-sm-6"><div class="form-group" style="padding-left:0px;"><label class="col-lg-4 control-label font-bold" style="margin-left: -14px;"><strong>Exclusive Of Trims</strong></label><div class="col-lg-2"><input type="hidden" id="trim" name="ExclusiveofTrimmings" value="1"><input type="text" id="trimval" name="trimval" value="YES" disabled="disabled" class="form-control trimtxtbox"></div></div></div>';
}
if(messagedet[0]['ExclusiveofDecoration']!=''){
Exclusive+='<div class="col-sm-6"><div class="form-group" style="padding-left:0px;"><label class="col-lg-4 control-label font-bold" style="margin-left: -14px;"><strong>Exclusive Of Decoration</strong></label><div class="col-lg-2"><input type="hidden" id="trim" name="ExclusiveofDecoration" value="1"><input type="text" id="trimval" name="trimval" value="YES" disabled="disabled" class="form-control trimtxtbox"></div></div></div>';
}

if(messagedet[0]['ExclusiveofFindings']!=''){
Exclusive+='<div class="col-sm-6"><div class="form-group" style="padding-left:0px;"><label class="col-lg-4 control-label font-bold" style="margin-left: -14px;"><strong>Exclusive Of Findings</strong></label><div class="col-lg-2"><input type="hidden" id="trim" name="ExclusiveofFindings" value="1"><input type="text" id="trimval" name="trimval" value="YES" disabled="disabled" class="form-control trimtxtbox"></div></div></div>';
}

if(messagedet[0]['FireWarningLabel']!=''){
Exclusive+='<div class="col-sm-6"><div class="form-group" style="padding-left:0px;"><label class="col-lg-4 control-label font-bold" style="margin-left: -14px;"><strong>Fire Warning Label</strong></label><div class="col-lg-2"><input type="hidden" id="trim" name="FireWarningLabel" value="1"><input type="text" id="trimval" name="trimval" value="YES" disabled="disabled" class="form-control trimtxtbox"></div></div></div>';
}

$('.exclusivecontent').html(Exclusive);

var phtml='<table id="colortable" class="table table-bordered" style="background-color: white;"><thead><tr><th style="background-color: white;">Size</th><th style="background-color: white;width: 350px;">Quantity</th></tr></thead><tbody>';
if(messagedet[0]['SizebyLetter']){
var letersizearray = messagedet[0]['SizebyLetter'].split('#');
if(letersizearray.length>0){phtml+='<tr class="gradeX"><td class="" id="" colspan="2"><b>Size By Letter</b></td></tr>';}
for(var i=0;i<letersizearray.length;i++){

    
    phtml+='<tr class="gradeX"><td class="" id="">'+letersizearray[i]+'</td><td><input id="quantity" name="sizeQuanity[]" type="text" class="form-control quantitycls"></td></tr>';


}
}
if(messagedet[0]['SizebyNumber']){
var numbersizearray = messagedet[0]['SizebyNumber'].split('#');
if(numbersizearray.length>0){phtml+='<tr class="gradeX"><td class="" id="" colspan="2"><b>Size By Number</b></td></tr>';}
for(var i=0;i<numbersizearray.length;i++){

    
    phtml+='<tr class="gradeX"><td class="" id="">'+numbersizearray[i]+'</td><td><input id="quantity" name="sizeQuanity[]" type="text" class="form-control quantitycls"></td></tr>';


}
}
if(messagedet[0]['BraSizes']){
var brasizearray = messagedet[0]['BraSizes'].split('#');
if(brasizearray.length>0){phtml+='<tr class="gradeX"><td class="" id="" colspan="2"><b>Bra Size</b></td></tr>';}
for(var i=0;i<brasizearray.length;i++){

    
    phtml+='<tr class="gradeX"><td class="" id="">'+brasizearray[i]+'</td><td><input id="quantity" name="sizeQuanity[]" type="text" class="form-control quantitycls"></td></tr>';


}
}
if(messagedet[0]['ToddlerSizes']){
var toddlersizearray = messagedet[0]['ToddlerSizes'].split('#');
if(toddlersizearray.length>0){phtml+='<tr class="gradeX"><td class="" id="" colspan="2"><b>Toddler Size</b></td></tr>';}
for(var i=0;i<toddlersizearray.length;i++){

    
    phtml+='<tr class="gradeX"><td class="" id="">'+toddlersizearray[i]+'</td><td><input id="quantity" name="sizeQuanity[]" type="text" class="form-control quantitycls"></td></tr>';


}
}
if(messagedet[0]['PantsSizes']){
var pantsizearray = messagedet[0]['PantsSizes'].split('#');
if(pantsizearray.length>0){phtml+='<tr class="gradeX"><td class="" id="" colspan="2"><b>Pants Size</b></td></tr>';}
for(var i=0;i<pantsizearray.length;i++){

    
    phtml+='<tr class="gradeX"><td class="" id="">'+pantsizearray[i]+'</td><td><input id="quantity" name="sizeQuanity[]" type="text" class="form-control quantitycls"></td></tr>';


}
}
phtml+='</tbody></table>';

$('#caresize').html(phtml);

$('.quantitycls').change(function(){
    var tt=$(this).val();
    if(tt<100){
        tt=100
    }else{
        tt=Math.round(tt / 50) * 50;
    }
$(this).val(tt);
});

}
                });
}

});

$('#materical_select').click(function(){
if($(this).is(':checked')){
$('#fibremyModallink').modal('show');
$('#garmentstatus').val('');
$('#garmenttext').val('');
}
if(!$(this).is(':checked')){ $('#fabriccompositionstatus').val('');
var fabpopdiv=$('#fibremyModallink');
fabpopdiv.find('.selectedfabric').val('');
fabpopdiv.find('.checkdecimal').val('0').attr('readonly','readonly');
fabpopdiv.find('#GarmentFibrePerctotal').val('0').attr('readonly','readonly');
fabpopdiv.find("option:selected").prop("selected", false);
}
});
$('#garmentfibrebtn').click(function(){
    $('#fibremyModallink').modal('show');
});

$('#materical_garselect').click(function(){
if($(this).is(':checked')){
$('#garmentselectdiv').show();
}
if(!$(this).is(':checked')){
$('#garmentselectdiv').hide();
}
});


 $('.GarmentComponents1').change(function() {
    var lang=$('#languset').val();
    var fabrichref=$("#pageurl").val()+'/getgarmentfabric/'+lang;

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

 $('.checkdecimal').change(function(){
var valtotal=0;

$('.checkdecimal').each(function() {

var inputn = $(this);
  valtotal= (isNaN(parseInt(inputn.val()))) ? 0 : parseInt(inputn.val())+parseInt(valtotal);

});
if(valtotal==100){
  
        $("#GarmentFibrePerctotal").css("background-color", "green");
        $("#GarmentFibrePerctotal").css("color", "white");
  
    }else{
     
      $("#GarmentFibrePerctotal").css("background-color", "#ff6532");
      $("#GarmentFibrePerctotal").css("color", "white");
      
      }

$('#GarmentFibrePerctotal').val(valtotal);
 });
$(".removegarmentfibre").click(function(){

var pp=$(this).parent().parent();
        //$('#GarmentFibrePerc1').val('');
        //$('#GarmentFibrePerc1').val(0);
        
   pp.find('.selectedfabric').val('');     
        var input1 = (isNaN(parseInt(pp.find('.checkdecimal').val()))) ? 0 : parseInt(pp.find('.checkdecimal').val());
        var firsttotl=parseInt($('#GarmentFibrePerctotal').val());
        var firsttotlres1=firsttotl - input1;
        if(isNaN(firsttotlres1)) {
        $('#GarmentFibrePerctotal').val('');
        }
        else{
        $('#GarmentFibrePerctotal').val(firsttotlres1);
        }
pp.find('.checkdecimal').val(0).attr('readonly','readonly');
    });

$("#garmentcomponentbtn").click(function(){
$('.divgarmentselect').show();

});

$('#GarmentComponents').change(function(){
    if($(this).val()){ 
$('#fibremyModallink').modal('show');
var fabpopdiv=$('#fibremyModallink');
fabpopdiv.find('.selectedfabric').val('');
fabpopdiv.find('.checkdecimal').val('0').attr('readonly','readonly');
fabpopdiv.find('#GarmentFibrePerctotal').val('0').attr('readonly','readonly');
fabpopdiv.find("option:selected").prop("selected", false);
fabpopdiv.find('#garmentstatus').val(1);
fabpopdiv.find('#garmenttext').val($('#GarmentComponents option:selected').text());
}
});

$('.garfibdelete').click(function(){ 
    var type=$(this).attr('data-type');
    if(type=='fabric'){$('#fabriccompositionstatus').val('');}
    $(this).parent().parent().html('');
    var fabpopdiv=$('#fibremyModallink');
fabpopdiv.find('.selectedfabric').val('');
fabpopdiv.find('.checkdecimal').val('0').attr('readonly','readonly');
fabpopdiv.find('#GarmentFibrePerctotal').val('0').attr('readonly','readonly');
fabpopdiv.find("option:selected").prop("selected", false);
$('#materical_select').attr('checked',false);
fngetfabriccompositiondetails($('#producttype').val());
});

/*vidhya:06-04-2018*/

 $("#addresssubmit").click(function(){ 
    
    var href=$('#addressurl').val();  
    
    var deliveryaddress=$('#deliveryaddress').val();    
    

    $.ajax({               
                url      : href,
                type     : 'get',
                data     : {deliveryaddress:deliveryaddress},
                cache    : false,
                success  : function(data){
                   
                var message = JSON.parse(data);     
                var pLen,i;
                pLen=message[0].length;             
                $('.logoutSucc').text('Delivery address added successfully');
                $(".logoutSucc").addClass("box-success");
                $(".logoutSucc").removeClass("box_warning");
                
               debugger;
               var pscodehtml='<div class="form-group"><div class="col-lg-12 add_addresss"><select name="deliveryTo" id="deliveryTo" class="form-control empty_textbox dropdownwidth"><option value="">Please select a Delivery Address</option>';
                                 
                for (i=0;i<pLen;i++){
                    if(message[0][i]['DeliveryAddress']!='') {
                    pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['DeliveryAddress']+'</option>';
                    }     
                }
                debugger;
                pscodehtml+='</select></div></div>';
                $('.add_addresss').html(pscodehtml);
                $('#deliveryTo').val(deliveryaddress);
                    $(".dropdownwidth").select2({
                placeholder: "Please Select"
            });            
                }
                
        });

    });

    $("#billsubmit").click(function(){ 
    
    var href=$('#addressurl1').val();  
    
    var billaddress=$('#billaddress').val();    
    

    $.ajax({               
                url      : href,
                type     : 'get',
                data     : {billaddress:billaddress},
                cache    : false,
                success  : function(data){
                   
                var message = JSON.parse(data);     
                var pLen,i;
                pLen=message[0].length;             
                $('.logoutSucc').text('Bill address added successfully');
                
                debugger;
               var pscodehtml='<div class="form-group"><div class="col-lg-12 add_addresss"><select name="billtoAddress" id="billtoAddress" class="form-control empty_textbox dropdownwidth"><option value="">Please select a Bill Address</option>';
               
                for (i=0;i<pLen;i++){
                    if(message[0][i]['BillAddress']!='') {
                    pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['BillAddress']+'</option>';
                    }     
                }
                debugger;
                pscodehtml+='</select></div></div>';
                $('.add_billaddress').html(pscodehtml);
                $('#billtoAddress').val(billaddress);
                    $(".dropdownwidth").select2({
                placeholder: "Please Select"
            });                 
                }
                
        });

    });

    $("#dmethodsubmit").click(function(){ 
    
    var href=$('#addressurl2').val();  
    
    var dmethod=$('#dmethod').val();    
    

    $.ajax({               
                url      : href,
                type     : 'get',
                data     : {dmethod:dmethod},
                cache    : false,
                success  : function(data){
                   
                var message = JSON.parse(data);     
                var pLen,i;
                pLen=message[0].length;             
                $('.logoutSucc').text('Delivery Method added successfully');
                
                debugger;
               var pscodehtml='<div class="form-group"><div class="col-lg-12 add_addresss"><select name="deliveryMethod" id="deliveryMethod" class="form-control empty_textbox dropdownwidth"><option value="">Please select a Delivery method</option>';
               
                for (i=0;i<pLen;i++){
                    if(message[0][i]['OrderDeliveryMethod']!='') {
                    pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['OrderDeliveryMethod']+'</option>';
                    }     
                }
                debugger;
                pscodehtml+='</select></div></div>';
                $('.dmethod_field').html(pscodehtml);
                $('#deliveryMethod').val(dmethod);
                    $(".dropdownwidth").select2({
                placeholder: "Please Select"
            });    
                
                                 
                }
                
        });

    });

    $("#AccNosubmit").click(function(){ 
    
    var href=$('#addressurl3').val();  
    
    var DelaccNo=$('#DelaccNo').val();    
    

    $.ajax({               
                url      : href,
                type     : 'get',
                data     : {DelaccNo:DelaccNo},
                cache    : false,
                success  : function(data){
                   
                var message = JSON.parse(data);     
                var pLen,i;
                pLen=message[0].length;             
                $('.logoutSucc').text('Delivery Account Number added successfully');
                
               debugger;
               var pscodehtml='<div class="form-group"><div class="col-lg-12 add_addresss"><select name="deliveryAccountNo" id="deliveryAccountNo" class="form-control empty_textbox dropdownwidth"><option value="">Please select a Delivery Account No</option>';
               
                for (i=0;i<pLen;i++){
                    if(message[0][i]['DeliveryAccountNo']!='') {
                    pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['DeliveryAccountNo']+'</option>';
                    }     
                }
                debugger;
                pscodehtml+='</select></div></div>';
                $('.accno_field').html(pscodehtml);
                $('#deliveryAccountNo').val(DelaccNo);
                   $(".dropdownwidth").select2({
                placeholder: "Please Select"
            }); 
                
                                 
                }
                
        });

    });



    $(".deleteaddress").click(function(){
        var ID=$('#deliveryTo :selected').val();

        var href=$(this).data("href");
        
        debugger;
     $.ajax({              
                url      : href,
                type     : 'get',
                data     : {ID:ID},
                cache    : false,
                success  : function(data){
                var message = JSON.parse(data);
                var pLen,i;
                pLen=message[0].length;
                debugger
                $('.logoutSucc').text('Address deleted successfully.');
                $(".logoutSucc").addClass("box_warning");
                $('.add_addresss').empty();
                debugger
                var pscodehtml='<div class="form-group"><div class="col-lg-12"><select name="deliveryTo" id="deliveryTo" class="form-control empty_textbox dropdownwidth"> <option value="">Please select a Delivery Address</option>';
                for (i=0;i<pLen;i++){
                    if(message[0][i]['DeliveryAddress']!='') {
                    pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['DeliveryAddress']+'</option>';
                    }
                }debugger
                pscodehtml+='</select></div></div>';
                
                
                $('.add_addresss').html(pscodehtml);           
                $('#deliveryTo').val('');  
                $(".dropdownwidth").select2({
                placeholder: "Please Select"
            });           
                }
            }); 
        
        
      });

    $(".deleteaddressB").click(function(){
        var ID=$('#billtoAddress :selected').val();

        var href=$(this).data("href");
        
        debugger;
     $.ajax({              
                url      : href,
                type     : 'get',
                data     : {ID:ID},
                cache    : false,
                success  : function(data){
                var message = JSON.parse(data);
                var pLen,i;
                pLen=message[0].length;
                debugger
                $('.logoutSucc').text('Bill Address deleted successfully.');
                $(".logoutSucc").addClass("box_warning");
                $('.add_billaddress').empty();
                debugger
                var pscodehtml='<div class="form-group"><div class="col-lg-12"><select name="billtoAddress" id="billtoAddress" class="form-control empty_textbox dropdownwidth"> <option value="">Please select a Delivery Address</option>';
                for (i=0;i<pLen;i++){
                    if(message[0][i]['BillAddress']!='') {
                    pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['BillAddress']+'</option>';
                    }
                }debugger
                pscodehtml+='</select></div></div>';
                
                
                $('.add_billaddress').html(pscodehtml);           
                $('#billtoAddress').val('');  
                $(".dropdownwidth").select2({
                placeholder: "Please Select"
            });           
                }
            }); 
        
        
      });

    $(".deletemethod").click(function(){
        var ID=$('#deliveryMethod :selected').val();

        var href=$(this).data("href");
        
        debugger;
     $.ajax({              
                url      : href,
                type     : 'get',
                data     : {ID:ID},
                cache    : false,
                success  : function(data){
                var message = JSON.parse(data);
                var pLen,i;
                pLen=message[0].length;
                debugger
                $('.logoutSucc').text('Delivery Method deleted successfully.');
                $(".logoutSucc").addClass("box_warning");
                $('.dmethod_field').empty();
                debugger
                var pscodehtml='<div class="form-group"><div class="col-lg-12"><select name="deliveryMethod" id="deliveryMethod" class="form-control empty_textbox dropdownwidth"> <option value="">Please select a Delivery Address</option>';
                for (i=0;i<pLen;i++){
                    if(message[0][i]['OrderDeliveryMethod']!='') {
                    pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['OrderDeliveryMethod']+'</option>';
                    }
                }debugger
                pscodehtml+='</select></div></div>';
                
                
                $('.dmethod_field').html(pscodehtml);           
                $('#deliveryMethod').val('');  
                $(".dropdownwidth").select2({
                placeholder: "Please Select"
            });           
                }
            }); 
        
        
      });

    $(".deleteaccno").click(function(){
        var ID=$('#deliveryAccountNo :selected').val();

        var href=$(this).data("href");
        
        debugger;
     $.ajax({              
                url      : href,
                type     : 'get',
                data     : {ID:ID},
                cache    : false,
                success  : function(data){
                var message = JSON.parse(data);
                var pLen,i;
                pLen=message[0].length;
                debugger
                $('.logoutSucc').text('Delivery Account Number deleted successfully.');
                $(".logoutSucc").addClass("box_warning");
                $('.accno_field').empty();
                debugger
                var pscodehtml='<div class="form-group"><div class="col-lg-12"><select name="deliveryAccountNo" id="deliveryAccountNo" class="form-control empty_textbox dropdownwidth"> <option value="">Please select a Delivery Address</option>';
                for (i=0;i<pLen;i++){
                    if(message[0][i]['DeliveryAccountNo']!='') {
                    pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['DeliveryAccountNo']+'</option>';
                    }
                }debugger
                pscodehtml+='</select></div></div>';
                
                
                $('.accno_field').html(pscodehtml);           
                $('#deliveryAccountNo').val('');  
                $(".dropdownwidth").select2({
                placeholder: "Please Select"
            });           
                }
            }); 
        
        
      });

 $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

});

 
     

    function garmentfacbricclosefunc()
    {
        
        
        $('#SelectedGarmentFibre1').val('');
        $("#SelGarmentFibreID1").val(''); 
        $('#GarmentFibrePerc1').val('');
        $('#GarmentFibrePerc1').val(0);
        $("#GarmentFibrePerc1").attr('readonly', 'readonly');
        
        $('#SelectedGarmentFibre2').val('');
        $("#SelGarmentFibreID2").val(''); 
        $('#GarmentFibrePerc2').val('');
        $('#GarmentFibrePerc2').val(0);
        $("#GarmentFibrePerc2").attr('readonly', 'readonly');
        
        
        $('#SelectedGarmentFibre3').val('');
        $("#SelGarmentFibreID3").val(''); 
        $('#GarmentFibrePerc3').val('');
        $('#GarmentFibrePerc3').val(0);
        $("#GarmentFibrePerc3").attr('readonly', 'readonly');
        
        $('#SelectedGarmentFibre4').val('');
        $("#SelGarmentFibreID4").val(''); 
        $('#GarmentFibrePerc4').val('');
        $('#GarmentFibrePerc4').val(0);
        $("#GarmentFibrePerc4").attr('readonly', 'readonly');
        
        $('#SelectedGarmentFibre5').val('');
        $("#SelGarmentFibreID5").val(''); 
        $('#GarmentFibrePerc5').val('');
        $('#GarmentFibrePerc5').val(0);
        $("#GarmentFibrePerc5").attr('readonly', 'readonly');
        
        $('#SelectedGarmentFibre6').val('');
        $("#SelGarmentFibreID6").val(''); 
        $('#GarmentFibrePerc6').val('');
        $('#GarmentFibrePerc6').val(0);
        $("#GarmentFibrePerc6").attr('readonly', 'readonly');
        
        
        $('#SelectedGarmentFibre7').val('');
        $("#SelGarmentFibreID7").val(''); 
        $('#GarmentFibrePerc7').val('');
        $('#GarmentFibrePerc7').val(0);
        $("#GarmentFibrePerc7").attr('readonly', 'readonly');
        
        $('#SelectedGarmentFibre8').val('');
        $("#SelGarmentFibreID8").val(''); 
        $('#GarmentFibrePerc8').val('');
        $('#GarmentFibrePerc8').val(0);
        $("#GarmentFibrePerc8").attr('readonly', 'readonly');
        
        
        $('#GarmentFibrePerctotal').val('');
        $("#GarmentFibrePerctotal").css("background-color", "#eee");
        $("#GarmentFibrePerctotal").attr('readonly', 'readonly');
        
        $("#orderfibrecontent1").val('')
        $('#fibremyModallink').modal('hide');
        
    
    }

    function garmentfibresaveclick()
{

var inputn = $('[name="GarmentFibrePerctotal"]');
  var valtotal = (isNaN(parseInt(inputn.val()))) ? 0 : parseInt(inputn.val());
  var i=1;j=0;
  
    if(valtotal>100)
    {
    alert("The fibre contents total percentage should be 100%");
    }
    else if(valtotal<100){
    alert("Fibre content total percentage should be 100%");
    }else if(valtotal==100)
    {
        
        
        $('#fibremyModallink').modal('hide');
    }
    
    if($('#garmentstatus').val()){
        var fillhtml='<div class="row GarmentDetailshow" style=""><div class="row garmenthead" style="display: block;"><div class="col-lg-6"> Garment Component</div><div class="col-lg-6">Component Fibre</div></div><div class="col-lg-6"><label class="garmenttitle"><input type="hidden" class="selectedgarment" value="'+$('#garmenttext').val()+'" name="garmentID[]">'+$('#garmenttext').val()+'</label></div><div class="col-lg-5">';
   

var procesdet=$('.processdetails');

procesdet.find('.checkdecimal').each(function() {
var percen=(isNaN(parseInt($(this).val()))) ? 0 : parseInt($(this).val());
if(percen>0){
var percentxt=$(this).parent().parent().find('.selectedfabric').val();
fillhtml+='<div class="col-lg-12"><span id="selectedfibrePer1" class="selectedfibrePer">'+percen+'%<input type="hidden" value="'+percentxt+'" name="garmentfabricID[]"></span><span id="SelFibreval" class="SelFibreval">'+percentxt+'<input type="hidden" value="'+percen+'" name="garmentfabricComposition[]"></span></div>';
}else{
var percentxt='';
}

});
fillhtml+='<input type="hidden" class="selectedgarment" value="$" name="garmentID[]"><input type="hidden" value="$" name="garmentfabricID[]"><input type="hidden" value="$" name="garmentfabricComposition[]"></div><div class="col-lg-1"><button type="button" id="garfibdelete" data-type="garment" class="btn btn-sm btn-danger garfibdelete" style="margin-bottom: -16px;">Delete</button></div></div>';
$('.garmentcompositiondynamic').append(fillhtml);
 fngetfabriccompositiondetails($('#producttype').val());
    }else{
        var fillhtml='<div class="row fibgarmenthead" style="display: block;"><div class="col-lg-6">Garment Fibre</div></div><div class="col-lg-11">';
    $('#fabriccompositionstatus').val(1);
var procesdet=$('.processdetails');

procesdet.find('.checkdecimal').each(function() {
var percen=(isNaN(parseInt($(this).val()))) ? 0 : parseInt($(this).val());
if(percen>0){
var percentxt=$(this).parent().parent().find('.selectedfabric').val();
fillhtml+='<div class="col-lg-12"><span id="selectedfibrePer1" class="selectedfibrePer">'+percen+'%<input type="hidden" value="'+percentxt+'" name="fabricID[]"></span><span id="SelFibreval" class="SelFibreval">'+percentxt+'<input type="hidden" value="'+percen+'" name="fabricComposition[]"></span></div>';
}else{
var percentxt='';
}

});
fillhtml+='</div><div class="col-lg-1"><button type="button" id="garfibdelete" data-type="fabric"  class="btn btn-sm btn-danger garfibdelete" style="margin-bottom: -16px;">Delete</button></div>';
$('.fabriccompositiondynamic').html(fillhtml);
}
$('#garmentfibrebtn').attr('disabled','disabled');
$('#garmentcomponentbtn').removeAttr('disabled');

$('.garfibdelete').click(function(){ 
    var type=$(this).attr('data-type');
    if(type=='fabric'){$('#fabriccompositionstatus').val('');}
    $(this).parent().parent().html('');
    var fabpopdiv=$('#fibremyModallink');
fabpopdiv.find('.selectedfabric').val('');
fabpopdiv.find('.checkdecimal').val('0').attr('readonly','readonly');
fabpopdiv.find('#GarmentFibrePerctotal').val('0').attr('readonly','readonly');
fabpopdiv.find("option:selected").prop("selected", false);
$('#materical_select').attr('checked',false);
fngetfabriccompositiondetails($('#producttype').val());
});

}

function AddGarmentFibre()
 {

        
        var activateval = [];
        var activatevalText = [];
        
        $('#orderfibrecontent1 option:selected').each(function() {
        activateval.push($(this).val());
        
        activatevalText.push($(this).text());
    
      });
      
        
        for (var i =0 ; i < activateval.length; i++) 
         
         {
             var NUM=0;
             //$('#Fibre'+[i]+').val(activatevalText[i]);
             for (var j = 1; j < 9; j++) 
             {
                if($("#SelectedGarmentFibre"+j).val()=="" && NUM==0)
                    {
                        
                        $("#SelectedGarmentFibre"+j).val(activatevalText[i]);
                         $("#SelectedGarmentFibre"+j).attr('readonly', 'readonly');
                         $("#SelGarmentFibreID"+j).val(activateval[i]);
                         
                         $("#selectedGarmentfibID"+j).val(activateval[i]);
                         $("#GarmentFibrePerc"+j).attr('readonly', false);
                         NUM=NUM+1;
                        
                    } 
             }
             
             
         }
        
        
}
function fngetfabriccompositiondetails(id){
    var href=$("#pageurl").val()+'/getfabricdetails/ajax/'+id;
          $.ajax({
                    url: href,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

if(data[0]['fabricdetails']){
var phtml='';
for(var i=0;i<data[0]['fabricdetails'].length;i++){

    
    phtml+='<option value="'+data[0]['fabricdetails']+'">'+data[0]['fabricdetails'][i]+'</option>';


}
$('#orderfibrecontent1').html(phtml);

var phtml='<option>Please Select Garment</option>';
for(var i=0;i<data[0]['garmentdetails'].length;i++){ debugger;
    var selectedgarment=[];
$('.selectedgarment').each(function() {
selectedgarment.push($(this).val());
});
var selectoption='';
    if($.inArray( data[0]['garmentdetails'][i], selectedgarment )!=-1){selectoption=' disabled="disabled"';}
    phtml+='<option value="'+data[0]['garmentdetails'][i]+'" '+selectoption+'>'+data[0]['garmentdetails'][i]+'</option>';


}
$('#GarmentComponents').html(phtml);
$("#GarmentComponents").select2({
                placeholder: "Please Select Garment"
            });
}

                    }
                });
}