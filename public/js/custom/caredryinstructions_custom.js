 $(document).ready(function() {        	
		
	var symbolvalidator =$( "#symbolmaintenanceadd" ).validate({
															  
  rules: {
	descriptionEnglish: {
      required: true,
	  minlength:2
	 
    }
	
  }
});

 		

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
		
		



	 $(".activatsymbol").click(function(){

	  // var href=$(this).data("href");	   
	   /*var activateval = [];
 		$('.hobbies_class:checked').each(function() {
   		activateval.push($(this).val());
	  });
	    if(activateval=="")
	   {
	   swal({
                
                title: "Please select the Symbol(s) to activate",
				 type: "error"
            });
	   }
	   
	   else 
	   {
	   swal({
  		title: "Are you sure to activate the selected Symbol(s)?",
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
	}*/
	 var href=$(this).find('a').data("href");
	 if(href)
	 {
		 swal({
  		title: "Are you sure to activate the selected Symbol(s)?",
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
											 
											

		/*var href=$(this).data("href");
	   var deactivateval = [];
	   $('.hobbies_class:checked').each(function() {
   		deactivateval.push($(this).val());
	  });
	    if(deactivateval=="")
	   {
	   swal({
                
                title: "Please select the Symbol(s) to deactivate",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
	   	swal({
  		title: "Are you sure to deactivate the selected Symbol(s)?",
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
		}*/
		var href=$(this).find('a').data("href");
		if(href)
		{
		swal({
  		title: "Are you sure to deactivate the selected Symbol(s)?",
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

	/*$(".deletesymbol").click(function(){
											

		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	    if(deleteval=="")
	   {
	   swal({
                
                title: "Please select the Symbol(s) to delete",
				 type: "error"
            });
	   }
	   
	   else
	   {	   	
		   	swal({
	  		title: "Are you sure to delete the Symbol(s)?",
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
 	});*/
	$(".deletesymbol").click(function(){
											

		var href=$(this).data("href");
			swal({
	  		title: "Are you sure to delete the Symbol(s)?",
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
	  
 	});

	 $('.dataTables-example').DataTable({
        dom: 'Bfrtip',
       buttons: [
             'csv', 'excel', 'pdf', 'print'
        ]
    });

	$('#example1 thead input[name="select_all"]').on('click', function(e){
																	  
																	   
      if(this.checked){
		  
         $('#example1 tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#example1 tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   	});

});

function imageselection()
{

	var imageid=$("input[name='imageid']:checked").val();
	$('#selectimageid').val(imageid);
	var imagename=$("input[name='imageid']:checked").data("imagename");
	$('#selectimage').val(imagename);
	$('#image').val('');
	$('#selimage').empty();
	var html='<img src="http://aitechindia.com/laravel/uniquegroup/storage/app/'+imagename+'" style="width:150px;height:150px;" />';
	$('#selimage').html(html);

}		


function symbolselect()
{
	
	var fileName = $('.fbfile').val();
    var allowed_extensions = new Array("jpg","jpeg","JPG","JPEG","png","PNG","GIF","gif","bmp","BMP");
    var file_extension = fileName.split('.').pop(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.
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
			 
			var imageurl='<img id="blah" src="" alt="your image" width="150" height="150" />';
				$('#selimage').html(imageurl);
				$('#blah').attr('src', e.target.result).width(150).height(150);
				 $('input[name=selectimage]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#image").change(function(){
        readURL(this);
    });

  

	
		 $(".addnewsymbol").click(function(){
		  $("#symbolmaintenanceadd")[0].reset();
		  $('#editID').val('');	
		  $('#siteurl').val("addsymbol");
		  $('#selimage').empty();
		 });
		 	
			
	  $(".editSymbol").click(function(){
		 // alert("EditSymbols");
	  var id=$(this).data("valueid");
	 // alert(id);
	  var selecthref=$(this).data("selecthref");
	  //alert(selecthref);	
	  $("#symbolmaintenanceadd")[0].reset();
	  //var path=$("#imagepath").val();
	  //var path1=path.slice(0,-6);
	 
	 
	  $.ajax({			   
				url      : selecthref,
				type     : 'post',
				cache    : false,
				success  : function(data){
					
			    var selecturl=$(".spandiv").html();
				//alert(selecturl);
				//alert("Testing");
				
				var message = JSON.parse(data);
				$('#editID').val(message[0]['id']);
				$('#EditchainID').val(message[0]['chainID']);
				$('#descriptionEnglish').val(message[0]['descEnglish']);
				$('#descriptionFrench').val(message[0]['descFrench']);
				$('#descriptionSpanish').val(message[0]['descSpanish']);
				$('#descriptionPolish').val(message[0]['descPolish']);
				$('#descriptionChinese').val(message[0]['descChinese']);
				$('#descriptionRomanian').val(message[0]['descRomanian']);
				$('#descriptionTurkish').val(message[0]['descTurkish']);
				$('#descriptionPortuguese').val(message[0]['descPortuguese']);
				$('#descriptionRussian').val(message[0]['descRussian']);
				
				$('#selectimage').val(message[0]['imageName']);
				$('#selectimageid').val(message[0]['imageID']);
				
				$('#suspendedCarePhrase').val(message[0]['status']);
				if(message['symbolType']==0){message[0]['symbolType']='';}
				$('#symbolType').val(message[0]['symbolType']);
				
				$('select[name="symbolType"] option[value="'+message[0]['symbolType']+'"]').attr("selected","selected");
				$('#selimage').empty();
				if(message[0]['imageID']>0)
				{
				 var html='<img src="'+selecturl+'/'+message[0]['imageID']+'" style="width:150px;height:150px;" />';
				}else
				{
					var html='<img src="../img/image-sample.jpg" style="width:width:150px;height:150px;" />';
				}

				$('#selimage').html(html);
	
				$('#siteurl').attr("value","editSymbol");
				
				$('select[name="customerID"] option[value="'+message['customerID']+'"]').attr("selected","selected");
				$('select[name="customerID"]').attr("disabled","disabled");
				
				}
				
		});
	  });
	  
	   $(".ViewSymbol").click(function(){
		  //alert("EditSymbols");
	  var id=$(this).data("valueid");
	    //alert(id);
	  var selecthref=$(this).data("selecthref");
	  //alert(selecthref);	
	  $("#symbolmaintenanceadd")[0].reset();
	  //var path=$("#imagepath").val();
	  //var path1=path.slice(0,-6);
	 
	 
	  $.ajax({			   
				url      : selecthref,
				type     : 'post',
				cache    : false,
				success  : function(data){
					
			    var selecturl=$(".spandiv").html();
				//alert(selecturl);
				//alert("Testing");
				
				var message = JSON.parse(data);
				$('#editID').val(message[0]['id']);
				$('#EditchainID').val(message[0]['chainID']);
				$('#descriptionEnglish1').val(message[0]['descEnglish']);
				$('#descriptionFrench1').val(message[0]['descFrench']);
				$('#descriptionSpanish1').val(message[0]['descSpanish']);
				$('#descriptionPolish1').val(message[0]['descPolish']);
				$('#descriptionChinese1').val(message[0]['descChinese']);
				$('#descriptionRomanian1').val(message[0]['descRomanian']);
				$('#descriptionTurkish1').val(message[0]['descTurkish']);
				$('#descriptionPortuguese1').val(message[0]['descPortuguese']);
				$('#descriptionRussian1').val(message[0]['descRussian']);
				
				$('#selectimage').val(message[0]['imageName']);
				$('#selectimageid').val(message[0]['imageID']);
				
				$('#suspendedCarePhrase').val(message[0]['status']);
				if(message['symbolType']==0){message[0]['symbolType']='';}
				$('#symbolType').val(message[0]['symbolType']);
				
				$('select[name="symbolType"] option[value="'+message[0]['symbolType']+'"]').attr("selected","selected");
				$('#selimage').empty();
				if(message[0]['imageID']>0)
				{
				 var html='<img src="'+selecturl+'/'+message[0]['imageID']+'" style="width:150px;height:150px;" />';
				}else
				{
					var html='<img src="../img/image-sample.jpg" style="width:width:150px;height:150px;" />';
				}

				$('#selimage').html(html);
	
				$('#siteurl').attr("value","editSymbol");
				
				$('select[name="customerID"] option[value="'+message['customerID']+'"]').attr("selected","selected");
				$('select[name="customerID"]').attr("disabled","disabled");
				
				}
				
		});
	  });
	
	
	  