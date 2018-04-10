 $(document).ready(function() {  

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
$("#width").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });

          $("#length").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });
          $("#SewSpace").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
                   });
  $('#width').on('keyup',function(e){
      var oldstr=$('#width').val();
      var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
      $('#width').val(tokens+suffix);
      
    });
    
    $('#length').on('keyup',function(e){
      var oldstr=$('#length').val();
      var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
      $('#length').val(tokens+suffix);
      
    });
    $('#SewSpace').on('keyup',function(e){
      var oldstr=$('#SewSpace').val();
      var tokens = oldstr.split('mm');
            var suffix = tokens.pop() + 'mm';
      $('#SewSpace').val(tokens+suffix);
      
    });

    $('.regionselect').change(function(){
      //alert("sdfgdysf");


var ProductionRegions = $(this).val();
//alert(ProductionRegions);
var pp=$(this).parent().parent().next('.printcolorhidden');
    var selectname=pp.find('select').attr('name');  
      if(ProductionRegions!="")
      {

      var href=$("#productsubgroupurl").val()+'/add_productsdetails/ajax/'+ProductionRegions;
      //alert(href);

      $.ajax({
                    url: href,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
            
              //alert(data);
            
                 
          var pLen,i,j;
          pLen=data[0].length;
          //alert(pLen);

        //alert(pLen+"Length");
        //alert("test");
       
        var k=1;
        var pscodehtml='';
        for(j=0;j<pLen;j++)
        { 
        pscodehtml+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory1" name="inventoryuniquefactory1" class="form-control  productionregion2 uniquefactory"><option value="">Please select</option>';
        for (i=0;i<pLen;i++){
          //alert(data[0][i]['OfficeFactoryName']);
          
          pscodehtml+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
          
        }
             
        pscodehtml+='</select>';
        
        pscodehtml+='</div></div>';
        
        }
         debugger;
        
      
        

$('.test').html(pscodehtml);
        
        
        
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

    $('.regionselect1').change(function(){
      //alert("sdfgdysf");


var ProductionRegions = $(this).val();
//alert(ProductionRegions);
var pp=$(this).parent().parent().next('.printcolorhidden');
    var selectname=pp.find('select').attr('name');  
      if(ProductionRegions!="")
      {

      var href=$("#productsubgroupurl").val()+'/add_productsdetails/ajax/'+ProductionRegions;
      //alert(href);

      $.ajax({
                    url: href,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
            
              //alert(data);
            
                 
          var pLen,i,j;
          pLen=data[0].length;
          //alert(pLen);

        //alert(pLen+"Length");
        //alert("test");
       
        var k=1;
        var pscodehtml='';
        for(j=0;j<pLen;j++)
        { 
        pscodehtml+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory1" name="inventoryuniquefactory1" class="form-control  productionregion2 uniquefactory"><option value="">Please select</option>';
        for (i=0;i<pLen;i++){
          //alert(data[0][i]['OfficeFactoryName']);
          
          pscodehtml+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
          
        }
             
        pscodehtml+='</select>';
        
        pscodehtml+='</div></div>';
        
        }
         debugger;
        
      
        

$('.test1').html(pscodehtml);
        
        
        
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

    $('.regionselect2').change(function(){
      //alert("sdfgdysf");


var ProductionRegions = $(this).val();
//alert(ProductionRegions);
var pp=$(this).parent().parent().next('.printcolorhidden');
    var selectname=pp.find('select').attr('name');  
      if(ProductionRegions!="")
      {

      var href=$("#productsubgroupurl").val()+'/add_productsdetails/ajax/'+ProductionRegions;
      //alert(href);

      $.ajax({
                    url: href,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
            
              //alert(data);
            
                 
          var pLen,i,j;
          pLen=data[0].length;
          //alert(pLen);

        //alert(pLen+"Length");
        //alert("test");
       
        var k=1;
        var pscodehtml='';
        for(j=0;j<pLen;j++)
        { 
        pscodehtml+='<div class="form-group"><div class="col-lg-5"><select style="margin-bottom:10px;" id="uniquefactory1" name="inventoryuniquefactory1" class="form-control  productionregion2 uniquefactory"><option value="">Please select</option>';
        for (i=0;i<pLen;i++){
          //alert(data[0][i]['OfficeFactoryName']);
          
          pscodehtml+='<option value="'+data[0][i]['id']+'">'+data[0][i]['OfficeFactoryName']+'</option>';
          
        }
             
        pscodehtml+='</select>';
        
        pscodehtml+='</div></div>';
        
        }
         debugger;
        
      
        

$('.test2').html(pscodehtml);
        
        
        
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
     
     $(".activatecoo").click(function(){

    
   var href=$(this).find('a').data("href");
   if(href)
   {
     swal({
      title: "Are you sure to activate the selected Country of origin(s)?",
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
     $(".deactivatecoo").click(function(){
                       
    // alert("fgfh");                 

    var href=$(this).find('a').attr("data-href");
    if(href)
    {
    swal({
      title: "Are you sure to deactivate the selected Country of origin(s)?",
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
$(".deletecoo").click(function(){  
  //alert("fgfh");  
   
   var href=$(this).attr("data-href");
   //alert(href);
      if(href!="")
     
     {      
        swal({
        title: "Are you sure to delete the selected Country of origin?",
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
 
     $(".editcoodetails").click(function(){
      
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
        $('#editID').val(message[0]['id']);
        $('#englishDesc').val(message[0]['descEnglish']);
        $('#frenchDesc').val(message[0]['descFrench']);
        $('#spanishDesc').val(message[0]['descSpanish']);
        $('#polishDesc').val(message[0]['descPolish']);
        $('#chineseDesc').val(message[0]['descChinese']);
        $('#romanianDesc').val(message[0]['descRomanian']);
        $('#turkishDesc').val(message[0]['descTurkish']);
        $('#czechDesc').val(message[0]['descCzech']);
        $('#hungarianDesc').val(message[0]['descHungarian']);
        $('#slovakDesc').val(message[0]['descSlovak']);
        $('#portugueseDesc').val(message[0]['descPortuguese']);
        $('#flemishDesc').val(message[0]['descFlemish']);
        $('#italianDesc').val(message[0]['descItalian']);
        $('#germanDesc').val(message[0]['descGerman']);
        $('#danishDesc').val(message[0]['descDanish']);
        $('#bulgarianDesc').val(message[0]['descBulgarian']);
        $('#greekDesc').val(message[0]['descGreek']);
        $('#russianDesc').val(message[0]['descRussian']);
        $('#arabicDesc').val(message[0]['descArabic']);
        $('#indonesianDesc').val(message[0]['descIndonesian']);
        
        $('#siteurl').attr("value","editlabelprint");
                $('#CustomerID').val(message[0]['customerID']);
                $('#productImage').val(message[0]['productImage']);
        
        if(message[0]['productID']==0){message[0]['productID']='';}
        
        $('select[name="chainID"]').attr("disabled","disabled");
        
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
        
      });


  });
     $(".viewcoodetails").click(function(){
      
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
        $('#editID').val(message[0]['id']);
        $('#englishDesc1').val(message[0]['descEnglish']);
        $('#frenchDesc1').val(message[0]['descFrench']);
        $('#spanishDesc1').val(message[0]['descSpanish']);
        $('#polishDesc1').val(message[0]['descPolish']);
        $('#chineseDesc1').val(message[0]['descChinese']);
        $('#romanianDesc1').val(message[0]['descRomanian']);
        $('#turkishDesc1').val(message[0]['descTurkish']);
        $('#czechDesc1').val(message[0]['descCzech']);
        $('#hungarianDesc1').val(message[0]['descHungarian']);
        $('#slovakDesc1').val(message[0]['descSlovak']);
        $('#portugueseDesc1').val(message[0]['descPortuguese']);
        $('#flemishDesc1').val(message[0]['descFlemish']);
        $('#italianDesc1').val(message[0]['descItalian']);
        $('#germanDesc1').val(message[0]['descGerman']);
        $('#danishDesc1').val(message[0]['descDanish']);
        $('#bulgarianDesc1').val(message[0]['descBulgarian']);
        $('#greekDesc1').val(message[0]['descGreek']);
        $('#russianDesc1').val(message[0]['descRussian']);
        $('#arabicDesc1').val(message[0]['descArabic']);
        $('#indonesianDesc1').val(message[0]['descIndonesian']);
        $('#siteurl').attr("value","editlabelprint");
                $('#CustomerID').val(message[0]['customerID']);
                $('#productImage').val(message[0]['productImage']);
        
        if(message[0]['productID']==0){message[0]['productID']='';}
        
        $('select[name="chainID"]').attr("disabled","disabled");
        
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
        
      });


  });

var symbolvalidator =$( "#countryadd" ).validate({
  rules: {
     englishDesc : {
    required: true
  },
 
     CustomerID : {
    required: true
  },

 frenchDesc: {
      required: true,
  
    },

 spanishDesc: {
      required: true,
  
    }
 
  }
});

function uploadimageselect(input,type){

  var typeid='#'+type;
  var typeval='#'+type+'_selectimage';
  
        if (input.files && input.files[0]) {
            var reader = new FileReader();
      
            reader.onload = function (e) {
       $('#sampleimg').empty();
       $('#sampleimg_selectimage').val('');
       //$('#blahimg').hide();
       
      var imageurl='<img id="sampleimg" src="" alt="your image" width="150" height="150" />';
        var text=$('#sampleimg').html(imageurl);
        //alert(text);
        $(typeid).attr('src', e.target.result).width(80).height(80);
         //$('#selectimage').attr(e.name);
         $('input[name="'+typeval+'""]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
      
      
        }
    
    }


