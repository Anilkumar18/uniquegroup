 $(document).ready(function() { 
        	
$(".garmentcomponent").click(function(){
		$("#garmentmaintenancedetail")[0].reset();
		$('#editID').val(''); 
});

    $("#garmentmaintenancedetail")[0].reset(); 



  
var symbolvalidator =$( "#garmentmaintenancedetail" ).validate({
  rules: {
     ZNumber: {
    required: true
  },
 
  descEnglish : {
    required: true
  },

/*descriptionFrench: {
      required: true
  
    },

 descriptionSpanish: {
      required: true
  
    },
descriptionPolish:{
   required: true
},
descriptionChinese:{
   required: true
},
descriptionRomanian:{
   required: true
},
descriptionTurkish:{
   required: true
},
descriptionDanish:{
   required: true
},
descriptionCzech:{
   required: true
},
descriptionHungarian:{
   required: true
},
descriptionSlovak:{
   required: true
},
descriptionPortuguese:{
   required: true
},
descriptionFlemish:{
   required: true
},
descriptionItalian:{
   required: true
},
descriptionGreek:{
   required: true
},
descriptionJapanese:{
   required: true
},
descriptionGerman:{
   required: true
},
descriptionSlovenian:{
   required: true
},
descriptionBulgarian:{
   required: true
},
descriptionKorean:{
   required: true
},
descriptionRussian:{
   required: true
},
descriptionRussian:{
   required: true
},
descriptionArabic:{
   required: true
},
descriptionIndonesian:{
   required: true
},*/

}
});


   $(".activatsymbol").click(function(){
   var href=$(this).find('a').data("href");
   if(href)
   {
     swal({
      title: "Are you sure to activate the Garment component?",
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


  $(".deactivatesymbol").click(function(){
    var href=$(this).find('a').data("href");
    if(href)
    {
    swal({
      title: "Are you sure to deactivate the Garment component?",
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





 		

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
		
		
$(".fillgarmentmaintenance").click(function(){

    var id=$(this).data("id");
    var selecthref=$(this).data("selecthref");  
    $("#garmentmaintenancedetail")[0].reset(); 
   
    $.ajax({         
        url      : selecthref,
        type     : 'get',
        cache    : false,
        success  : function(data){
        var message = JSON.parse(data);
         $('#editID').val(message[0]['id']);
         $('#znumber').val(message[0]['ZNumber']);
         $('#descEnglish').val(message[0]['descEnglish']);
         $('#descFrench').val(message[0]['descFrench']);
         $('#descSpanish').val(message[0]['descSpanish']);
         $('#descPolish').val(message[0]['descPolish']);
         $('#descChinese').val(message[0]['descChinese']);
         $('#descRomanian').val(message[0]['descRomanian']);
         $('#descTurkish').val(message[0]['descTurkish']);
         $('#descDanish').val(message[0]['descDanish']);
         $('#descCzech').val(message[0]['descCzech']);
         $('#descHungarian').val(message[0]['descHungarian']);
         $('#descSlovak').val(message[0]['descSlovak']);
         $('#descPortuguese').val(message[0]['descPortuguese']);
          $('#descFlemish').val(message[0]['descFlemish']);
          $('#descItalian').val(message[0]['descItalian']);
          $('#descGreek').val(message[0]['descGreek']);
          $('#descJapanese').val(message[0]['descJapanese']);
          $('#descGerman').val(message[0]['descGerman']);
          $('#descSlovenian').val(message[0]['descSlovenian']);
          $('#descBulgarian').val(message[0]['descBulgarian']);
          $('#descKorean').val(message[0]['descKorean']);
          $('#descRussian').val(message[0]['descRussian']);
          $('#descArabic').val(message[0]['descArabic']);
          $('#descIndonesian').val(message[0]['descIndonesian']);
      
        },
    error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
        
    });
    });




$(".viewgarmentmaintenance").click(function(){
    var id=$(this).data("id");
    var selecthref=$(this).data("selecthref"); 
   
    $("#garmentmaintenanceview")[0].reset(); 
    $.ajax({       
        url      : selecthref,
        type     : 'get',
        cache    : false,
        success  : function(data){
        var message = JSON.parse(data);
       debugger;
         $('#descriptionEnglish').val(message[0]['descEnglish']);
         $('#descriptionFrench').val(message[0]['descFrench']);
         $('#descriptionSpanish').val(message[0]['descSpanish']);
         $('#descriptionPolish').val(message[0]['descPolish']);
         $('#descriptionChinese').val(message[0]['descChinese']);
         $('#descriptionRomanian').val(message[0]['descRomanian']);
         $('#descriptionTurkish').val(message[0]['descTurkish']);
         $('#descriptionDanish').val(message[0]['descDanish']);
         $('#descriptionCzech').val(message[0]['descCzech']);
         $('#descriptionHungarian').val(message[0]['descHungarian']);
         $('#descriptionSlovak').val(message[0]['descSlovak']);
         $('#descriptionPortuguese').val(message[0]['descPortuguese']);
          $('#descriptionFlemish').val(message[0]['descFlemish']);
          $('#descriptionItalian').val(message[0]['descItalian']);
          $('#descriptionGreek').val(message[0]['descGreek']);
          $('#descriptionJapanese').val(message[0]['descJapanese']);
          $('#descriptionGerman').val(message[0]['descGerman']);
          $('#descriptionSlovenian').val(message[0]['descSlovenian']);
          $('#descriptionBulgarian').val(message[0]['descBulgarian']);
          $('#descriptionKorean').val(message[0]['descKorean']);
          $('#descriptionRussian').val(message[0]['descRussian']);
          $('#descriptionArabic').val(message[0]['descArabic']);
          $('#descriptionIndonesian').val(message[0]['descIndonesian']);
      

        },
    error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
        
    });
    });








	$(".productpricesticker").click(function(){
    $("#productgroupsmaintenanceadd")[0].reset();
   $('#editID').val(''); 
 
});


 $('.dataTables-example').DataTable({
        dom: 'Bfrtip',
       buttons: [
             'csv', 'excel', 'pdf', 'print'
        ]
    });

$(".deletegarmentmaintenance").click(function(){ 
var href=$(this).data("href");
	 if(href!="")	   
	   {	   	
		  swal({
	  		title: "Are you sure to delete the Garment component?",
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

});

/*function countryChange()
  { 
  	
	
	var selecthref=$("select[name='country'] option:selected").attr('drop-data');	
	
			$.ajax({			   
				url      : selecthref,
				type     : 'post',				
				cache    : false,
				success  : function(data){
				var message = JSON.parse(data);		

				var pLen,i;
				pLen=message[0].length;
				var pscodehtml=' <div class="col-md-3"><select id="state" name="state" class="form-control"><option value=""> Please Select State</option>';
				for (i=0;i<pLen;i++){
					if(message[0][i]['StateName']!='') {
					pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['StateName']+'</option>';
					}     
				}
				pscodehtml+='</select></div>';
				
                $('.statedisplay').html(pscodehtml);
				               
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        	}
				
		});
  }
  function countryChanges()
  { 
    
  var selecthref=$("select[name='Warehouse_CountryID'] option:selected").attr('drop-data'); 
  
      $.ajax({         
        url      : selecthref,
        type     : 'post',        
        cache    : false,
        success  : function(data){
        var message = JSON.parse(data);   

        var pLen,i;
        pLen=message[0].length;
        var pscodehtml=' <div class="col-md-3"><select id="Warehouse_StateID" name="Warehouse_StateID" class="form-control"><option value=""> Please Select State</option>';
        for (i=0;i<pLen;i++){
          if(message[0][i]['StateName']!='') {
          pscodehtml+='<option value="'+message[0][i]['id']+'">'+message[0][i]['StateName']+'</option>';
          }     
        }
        pscodehtml+='</select></div>';
        
                $('.statedisplay1').html(pscodehtml);
                       
        },
          error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
          }
        
    });
  }



 $(document).ready(function() {
      $("#phoneNumber").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            var curchr = this.value.length;
            var curval = $(this).val();
            if(curchr==0){ 
            	var tt='+'+$(this).val();
            	$(this).val(tt);
            }
            if (curchr == 3) {
                $(this).val(curval + " ");
            } else if (curchr == 7) {
                $(this).val(curval + " ");
            }else if (curchr == 11) {
                $(this).val(curval + " ");
            }
            $(this).attr('maxlength', '16');
        });

      $("#phoneNumber").blur(function (e) {
      		debugger;
      		var curchr = this.value.length;
var pp=$(this).parent().parent().parent().parent().parent();
      		if(curchr<15){

      			$('#phoneerror').show();
      			pp.find("#addcustomers").attr("disabled", "disabled");
    			pp.find("#addcustomers").css('background-color','#2f75bb');
      		}else{
      			pp.find("#addcustomers").removeAttr("disabled");
      			$('#phoneerror').hide();
      		}

      });


});*/