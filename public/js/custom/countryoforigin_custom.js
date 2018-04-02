 $(document).ready(function() {  
     
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
	//alert("hhh");
      
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


