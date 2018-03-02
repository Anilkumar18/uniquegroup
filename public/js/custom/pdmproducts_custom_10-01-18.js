 $(document).ready(function() {        	
		
	var garmentvalidator =$( "#productgroupsmaintenanceadd" ).validate({
  rules: {
	groupCode: {
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
		
	$(".deletedropdownoptions").click(function(){	
											   
			//alert("Dropdown options");	   

		var href=$(this).data("href");
		var pare=$(this).parent().parent();
		pare.hide();
	     //alert(href);
	  $.ajax({
             type: 'post',
             url: href,
             cache:false,
             success:function(data)
             {
				  //alert("ok");
				 alert("Deleted Successfully");
                 //alert(response);
                // $("#signup_status").html(response)
    
             },
			 error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }

        });
			
 	});	
	
	$(".deletemaingroupdelete").click(function(){
										alert("terstingh");	

		var href=$(this).data("href");
	   var deleteval = [];
	   $('.hobbies_class:checked').each(function() {
   		deleteval.push($(this).val());
	  });
	  
	   
	 	   	
		   	swal({
	  		title: "Are you sure to Remove the Field Name from Product Development?",
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
	
	
	$(".productgroup").click(function(){
	   $("#productgroupsmaintenanceadd")[0].reset();
	   $('#editID').val('');	
	  

	  });
	 
		$('.editcontent').click(function(){ 
			var pp=$(this).parent().parent();
			pp.find('.tablecontent').removeAttr('readonly');
		});
		
		/*$('.tablecontent').blur(function(){ 
			//alert("onclickchanges");
			//$(this).attr('readonly','readonly');
			var columntype=$(this).attr('data-columnid');
			var columnvalue=$(this).val();
			
			var selecthref=$("#selecthref").val();
			
			//alert(selecthref);
			
			//alert(columntype);alert(columnvalue);
			
			var datastring="id="+columntype+"&value="+columnvalue;
			//alert(datastring);
			//debugger;
			$.ajax({
             type: 'post',
             url: selecthref,
             data:datastring,
             cache:false,
             success:function(data)
             {
				 alert("Updated Successfully");
                 //alert(response);
                // $("#signup_status").html(response)
    
             },
			 error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }

        });
       
  
			
		});*/
		
		$(".updatecontent").click(function() {
										     
			//alert("updatechanges");
			
			var pare=$(this).parent().parent().parent();
			
			var columnvalue=pare.find('.tablecontent').val();
			//alert(columnvalue);
			
			var columntype=pare.find('.tablecontent').attr('data-columnid');
			
			//alert(columntype);
			
			var selecthref=$("#selecthref").val();
			
			var datastring="id="+columntype+"&value="+columnvalue;
			//alert(datastring);
			//debugger;
			$.ajax({
             type: 'post',
             url: selecthref,
             data:datastring,
             cache:false,
             success:function(data)
             {
				 alert("Updated Successfully");
				 $(".tablecontent").attr('readonly',true);
                 //alert(response);
                // $("#signup_status").html(response)
    
             },
			 error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }

        });
			
			
		
											
			});
		
		/*$("#addnewproducts").click(function(){
											
											alert("Testing");
											//$("#addnewtextbtn").css('display','block');
											
											$("#addnew").css('display','block');
											
										     //$("#addnew").clone().insertAfter("#addnew");
											
										});*/
		
		/*$(".tablecontent1").blur(function(){
												  
												 var selecthref=$("#selecthref").val();
												 //alert(selecthref);
												 var columnvalue=$(this).val();
												 //alert(columnvalue);
												 if(columnvalue!="")
												 {
												 var datastring="value="+columnvalue;
												// alert(datastring);
												 
												 $.ajax({
													 type: 'post',
													 url: selecthref,
													 data:datastring,
													 cache:false,
													 success:function(data)
													 {
														 alert("addded Successfully");
														 //alert(response);
														// $("#signup_status").html(response)
											
													 },
													 error: function (jqXHR, textStatus, errorThrown) {
													alert(textStatus);
													alert(errorThrown);
												}
										
												});
											}
												 
												  
												  
												  });*/
		
		
		
		 $(".editfieldnames").click(function(){
		//alert("edit fieldnames");
	  var id=$(this).data("id");
	  //alert(id);
	  var selecthref=$(this).data("selecthref");	
	  //alert(selecthref);
	  
	 debugger
	  $.ajax({			   
				url      : selecthref,
				type     : 'post',
				cache    : false,
				success  : function(data){
				 
				var message = JSON.parse(data);
				
				//alert(data);
				//alert(message['fieldname']);
				$('#fieldeditID').val(message['id']);
				$('#fieldname').val(message['fieldname']);
				
				
				
				
				},
		error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }
				
		});
	  });
		
		$(".addcontent").click(function(){
										
										
										
										      var pare=$(this).parent().parent().parent();
			
			                                   var columnvalue=pare.find('.tablecontent1').val();
												  
												//alert(columnvalue);
												var selecthref=$("#selecthref").val();
												 
												  if(columnvalue!="")
												 {
												 var datastring="value="+columnvalue;
												// alert(datastring);
												 
												 $.ajax({
													 type: 'post',
													 url: selecthref,
													 data:datastring,
													 cache:false,
													 success:function(data)
													 {
														
														 //alert(response);
														// $("#signup_status").html(response)
														//$("#tablecontent1").attr('readonly',true);
													 //alert("addded Successfully");
													 window.location.reload();
														 
											
													 },
													 error: function (jqXHR, textStatus, errorThrown) {
													alert(textStatus);
													alert(errorThrown);
												}
										
												});
											}
												  
												  });
		
		$(".showfieldnames").click(function(){
			
		//alert("show field names");
			var id=$(this).data("id");
			
			var valueid=$(this).data("valueid");
			
			//alert(valueid);
			var public_path=$(this).data("href");
			var selecthref=$(this).data("selecthref");
			//alert(selecthref);
			/*alert(id);
			alert(valueid);
			alert(public_path);
			alert(selecthref);*/
			//var datastring = 'testval='+valueid;
			/*$("#marketingregionadd")[0].reset();*/
			var datastring="id="+id+"&value="+valueid;
			//alert(datastring);

			 $.ajax({			   
				url      : selecthref,
				type     : 'POST',
				cache    : false,
				data     : datastring,
				success  : function(data){
				//alert("Testing3");
				//alert(data);
				debugger;
				var message = JSON.parse(data);var processtxtbox='';var processtxtbox1='';
				var fieldtext = message['columnfield'];
				var tablenamecurr = message['currtablename'];

				if(message['processtype']=='string')
				{
					for (var i =0;i< message[0].length; i++) {
						

						processtxtbox+='<tr class="gradeX "><td><input type="text" name="tablecontent" id="tablecontent" data-columnid="" class="tablecontent" readonly="readonly"  value="'+message[0][i][fieldtext]+'"  /><input type="hidden" name="tablecontentid" id="tablecontentid" data-columnid="" class="tablecontent" readonly="readonly" value="'+message[0][i]['id']+'" /><input type="hidden" name="tablename" id="tablename" data-columnid="" class="tablecontent" readonly="readonly" value="'+tablenamecurr+'" /><input type="hidden" name="tablenamefield" id="tablenamefield" data-columnid="" class="tablecontent" readonly="readonly" value="'+fieldtext+'" /><input type="hidden" name="selecthref" id="selecthref" value="'+$('#editurlid').html()+'" /></td><td><img  src="'+$('#assetimageedit').html()+'" onclick="fieldcolumnedit(this);" border="0"  title="Edit" class="editcontent"><span class="updatedropdownoptions"><img  src="'+$('#assetimageupdate').html()+'" border="0"  title="update" class="updatecontent" onclick="fnupdatecontent(this);"></span><span class="deletedropdownoptions" data-href=""  data-valueid=""><img  src="'+$('#assetimagedelete').html()+'" border="0"  title="Delete" class="deletecontent" onclick="fndeletecontent(this);"/></span><input type="hidden" name="selecthrefdelete" id="selecthrefdelete" value="'+$('#deleteurlid').html()+'" /></td></tr>';

					
					}
					processtxtbox+='<tr class="gradeX "><td><input type="text" name="tablecontent" id="tablecontent" data-columnid="" class="tablecontent" value=""  /><input type="hidden" name="tablecontentid" id="tablecontentid" data-columnid="" class="tablecontent" value="" /><input type="hidden" name="tablename" id="tablename" data-columnid="" class="tablecontent" readonly="readonly" value="'+tablenamecurr+'" /><input type="hidden" name="tablenamefield" id="tablenamefield" data-columnid="" class="tablecontent" readonly="readonly" value="'+fieldtext+'" /><input type="hidden" name="selecthref" id="selecthref" value="'+$('#editurlid').html()+'" /></td><td><span class="updatedropdownoptions"><img  src="'+$('#assetimageadd').html()+'" border="0"  title="update" class="updatecontent" onclick="fnupdatecontent(this);"></span></td></tr>';
				}else if(message['processtype']=='number'){
					$('#editID').val(message[0]['id']);
					$('#fieldname').val(message[0]['fieldname']);
				}
    $('.fieldcolumn').html('');
    $('.fieldcolumn').html(processtxtbox);
    //$('.fieldcolumnedit').html('');
    //$('.fieldcolumnedit').html(processtxtbox1);
    $('select[name="productdetailcategory"] option[value="'+message[0]['categoryID']+'"]').attr("selected","selected");
				},
        	error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        	}
				
		});


	});
		
		
		
});

function fieldcolumnedit(t){ 
	var pp=$(t).parent().parent();
			pp.find('.tablecontent').removeAttr('readonly');
}
function fnupdatecontent(t){

//alert("Update the file");

			var pare=$(t).parent().parent().parent();
			
			var columnvalue=pare.find('.tablecontent').val();
			
			
			var columntype=pare.find('#tablecontentid').val();
			
			var selecthref=pare.find("#selecthref").val();
			var tablenames=pare.find('#tablename').val();
			var tablenamesfield=pare.find('#tablenamefield').val();
			
			var datastring="id="+columntype+"&value="+columnvalue+"&table="+tablenames+"&tablefield="+tablenamesfield;
			$.ajax({
             type: 'post',
             url: selecthref,
             data: datastring,
             cache: false,
             success:function(data)
             {
             	var message = JSON.parse(data);
             	if(columntype == null || columntype =='')
             	{
             		alert("addded Successfully");
              window.location.reload();
             	}else
             	{
             		alert("Updated Successfully");
				 pare.find('#tablecontent').attr('readonly',true);
             	}
				 
    
             },
			 error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }

        });
			
			
		
											
			

}

function fndeletecontent(t){

	swal({
  		title: "Are you sure to Delete ?",
  		type: "warning",
  		showCancelButton: true,
  		confirmButtonColor: "#DD6B55",
  		confirmButtonText: "Yes, do it!",
  		closeOnConfirm: false
		},
		function(){
  		
             debugger;
			var pare=$(t).parent().parent().parent();
			pare.hide();
			
			var columnvalue=pare.find('#tablecontent').val();
			//alert(columnvalue);
			
			var columntype=pare.find('#tablecontentid').val();
			
			//alert(columntype);
			
			var selecthref=pare.find("#selecthrefdelete").val();
			//alert(selecthref);
			var tablenames=pare.find('#tablename').val();
			var tablenamesfield=pare.find('#tablenamefield').val();
			
			var datastring="id="+columntype+"&value="+columnvalue+"&table="+tablenames+"&tablefield="+tablenamesfield;
			//alert(datastring);
			//debugger;
			$.ajax({
             type: 'post',
             url: selecthref,
             data: datastring,
             cache: false,
             success:function(data)
             {
             	
             		alert("Deleted Successfully");
				 swal.close();
                 //alert(response);
                // $("#signup_status").html(response)
    
             },
			 error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }

        });
			
		
		});	
		
											
			

}



