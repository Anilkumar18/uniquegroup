 $(document).ready(function() { 

var fabricvalidator =$( "#fibremaintenanceadd" ).validate({
  rules: {
     descriptionEnglish : {
    required: true
  },
 
     customerID : {
    required: true
  },

 descriptionFrench: {
      required: true,
  
    },

 descriptionSpanish: {
      required: true,
  
    }
 
  }
});
$(".editfabricdetails").click(function(){
      
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
        $('#descriptionEnglish').val(message[0]['descEnglish']);
        $('#descriptionFrench').val(message[0]['descFrench']);
        $('#descriptionSpanish').val(message[0]['descSpanish']);
        $('#descriptionPolish').val(message[0]['descPolish']);
        $('#descriptionChinese').val(message[0]['descChinese']);
        $('#descriptionRomanian').val(message[0]['descRomanian']);
        $('#descriptionTurkish').val(message[0]['descTurkish']);
        $('#descriptionCzech').val(message[0]['descCzech']);
        $('#descriptionHungarian').val(message[0]['descHungarian']);
        $('#descriptionSlovak').val(message[0]['descSlovak']);
        $('#descriptionPortuguese').val(message[0]['descPortuguese']);
        $('#descriptionFlemish').val(message[0]['descFlemish']);
        $('#descriptionItalian').val(message[0]['descItalian']);
        $('#descriptionGerman').val(message[0]['descGerman']);
        $('#descriptionDanish').val(message[0]['descDanish']);
        $('#descriptionBulgarian').val(message[0]['descBulgarian']);
        $('#descriptionGreek').val(message[0]['descGreek']);
        $('#descriptionRussian').val(message[0]['descRussian']);
        $('#descriptionArabic').val(message[0]['descArabic']);
        $('#descriptionIndonesian').val(message[0]['descIndonesian']);
        $('#descriptionKorean').val(message[0]['descKorean']);
        $('#descriptionJapanese').val(message[0]['descJapanese']);
        $('#descriptionSlovenian').val(message[0]['descSlovenian']);
        
                $('#customerID').val(message[0]['customerID']);
        $('#siteurl').attr("value","editlabelprint");
                $('#productImage').val(message[0]['productImage']);
        
        if(message[0]['productID']==0){message[0]['productID']='';}
        
        $('select[name="customerID"]').attr("disabled","disabled");
        
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
        
      });


  });

$(".viewfabric").click(function(){
      
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
        $('#descriptionEnglish1').val(message[0]['descEnglish']);
        $('#descriptionFrench1').val(message[0]['descFrench']);
        $('#descriptionSpanish1').val(message[0]['descSpanish']);
        $('#descriptionPolish1').val(message[0]['descPolish']);
        $('#descriptionChinese1').val(message[0]['descChinese']);
        $('#descriptionRomanian1').val(message[0]['descRomanian']);
        $('#descriptionTurkish1').val(message[0]['descTurkish']);
        $('#descriptionCzech1').val(message[0]['descCzech']);
        $('#descriptionHungarian1').val(message[0]['descHungarian']);
        $('#descriptionSlovak1').val(message[0]['descSlovak']);
        $('#descriptionPortuguese1').val(message[0]['descPortuguese']);
        $('#descriptionFlemish1').val(message[0]['descFlemish']);
        $('#descriptionItalian1').val(message[0]['descItalian']);
        $('#descriptionGerman1').val(message[0]['descGerman']);
        $('#descriptionDanish1').val(message[0]['descDanish']);
        $('#descriptionBulgarian1').val(message[0]['descBulgarian']);
        $('#descriptionGreek1').val(message[0]['descGreek']);
        $('#descriptionRussian1').val(message[0]['descRussian']);
        $('#descriptionArabic1').val(message[0]['descArabic']);
        $('#descriptionIndonesian1').val(message[0]['descIndonesian']);
        $('#descriptionKorean1').val(message[0]['descKorean']);
        $('#descriptionJapanese1').val(message[0]['descJapanese']);
        $('#descriptionSlovenian1').val(message[0]['descSlovenian']);
        
                $('#CustomerID').val(message[0]['customerID']);
        $('#siteurl').attr("value","editlabelprint");
                $('#productImage').val(message[0]['productImage']);
        
        if(message[0]['productID']==0){message[0]['productID']='';}
        
        $('select[name="customerID"]').attr("disabled","disabled");
        
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
        
      });


  });
$(".deletefabric").click(function(){  
  //alert("fgfh");  
   
   var href=$(this).attr("data-href");
   //alert(href);
      if(href!="")
     
     {      
        swal({
        title: "Are you sure to delete the selected Fabric Composition?",
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

$(".activatefabric").click(function(){

    
   var href=$(this).find('a').data("href");
   if(href)
   {
     swal({
      title: "Are you sure to activate the selected Fabric Composition ?",
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
     $(".deactivatefabric").click(function(){
                       
    // alert("fgfh");                 

    var href=$(this).find('a').attr("data-href");
    if(href)
    {
    swal({
      title: "Are you sure to deactivate the selected Fabric Composition?",
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
