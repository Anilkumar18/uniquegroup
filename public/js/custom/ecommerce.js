 $(document).ready(function() { 

$(".dropdownwidth").select2({
                placeholder: "Please Select"
            });

$('#example1').DataTable();

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
	
	phtml+='<tr class="gradeX"><td class="zippercolorimg colorimg" id="colorimg"><img width="200px" height="30px" src="'+phtm+'"></td><td><input id="zipperColor" name="zipperColor[]" type="hidden" class="form-control" value="1">'+messagedet[0]['zipcolorcolor'][i]+'</td><td><input id="quantity" name="quantity[]" type="text" class="form-control quantitycls"></td></tr>';


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
    var href=$("#pageurl").val()+'/getcaredetails/ajax/'+$(this).val();
          $.ajax({
                    url: href,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
var messagedet=data;
var Exclusive='';
$('#countryoforigin').val(messagedet[0]['CountryofOriginID']);
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

    
    phtml+='<tr class="gradeX"><td class="" id="">'+letersizearray[i]+'</td><td><input id="quantity" name="quantity[]" type="text" class="form-control quantitycls"></td></tr>';


}
}
if(messagedet[0]['SizebyNumber']){
var numbersizearray = messagedet[0]['SizebyNumber'].split('#');
if(numbersizearray.length>0){phtml+='<tr class="gradeX"><td class="" id="" colspan="2"><b>Size By Number</b></td></tr>';}
for(var i=0;i<numbersizearray.length;i++){

    
    phtml+='<tr class="gradeX"><td class="" id="">'+numbersizearray[i]+'</td><td><input id="quantity" name="quantity[]" type="text" class="form-control quantitycls"></td></tr>';


}
}
if(messagedet[0]['BraSizes']){
var brasizearray = messagedet[0]['BraSizes'].split('#');
if(brasizearray.length>0){phtml+='<tr class="gradeX"><td class="" id="" colspan="2"><b>Bra Size</b></td></tr>';}
for(var i=0;i<brasizearray.length;i++){

    
    phtml+='<tr class="gradeX"><td class="" id="">'+brasizearray[i]+'</td><td><input id="quantity" name="quantity[]" type="text" class="form-control quantitycls"></td></tr>';


}
}
if(messagedet[0]['ToddlerSizes']){
var toddlersizearray = messagedet[0]['ToddlerSizes'].split('#');
if(toddlersizearray.length>0){phtml+='<tr class="gradeX"><td class="" id="" colspan="2"><b>Toddler Size</b></td></tr>';}
for(var i=0;i<toddlersizearray.length;i++){

    
    phtml+='<tr class="gradeX"><td class="" id="">'+toddlersizearray[i]+'</td><td><input id="quantity" name="quantity[]" type="text" class="form-control quantitycls"></td></tr>';


}
}
if(messagedet[0]['PantsSizes']){
var pantsizearray = messagedet[0]['PantsSizes'].split('#');
if(pantsizearray.length>0){phtml+='<tr class="gradeX"><td class="" id="" colspan="2"><b>Pants Size</b></td>></tr>';}
for(var i=0;i<pantsizearray.length;i++){

    
    phtml+='<tr class="gradeX"><td class="" id="">'+pantsizearray[i]+'</td><td><input id="quantity" name="quantity[]" type="text" class="form-control quantitycls"></td></tr>';


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
$('.fabricdetails').show();
}
if(!$(this).is(':checked')){
$('.fabricdetails').hide();
}
});


$('#materical_garselect').click(function(){
if($(this).is(':checked')){
$('.garmentdetails').show();
}
if(!$(this).is(':checked')){
$('.garmentdetails').hide();
}
});


 $('.GarmentComponents').change(function() {
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

 $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

});

 
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