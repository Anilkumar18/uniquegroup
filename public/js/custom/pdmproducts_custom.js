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
									//alert("delete fieldname");	

		var href=$(this).data("href");
		//alert(href);
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
			
			$.ajax({
             type: 'post',
             url: selecthref,
             data:datastring,
             cache:false,
             success:function(data)
             {
             	debugger;
             	var message = JSON.parse(data);
             	//alert("1");
             		//alert(message);
				 alert("Updated Successfully");
				 $(".tablecontent").attr('readonly',true);

                // $("#signup_status").html(response)
    
             },
			 error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }

        });
			
			
		
											
			});
		
		/*common save button*/
		
		
		
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
			//alert(id);
			//alert(valueid);
			/*alert(public_path);
			alert(selecthref);*/
			//var datastring = 'testval='+valueid;
			/*$("#marketingregionadd")[0].reset();*/
			var datastring="id="+id+"&value="+valueid;
		//alert(datastring);
		debugger;

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
				var editproductname=message['productname'];
				var editproductid=message['editproductid'];
				var deleteproductid=message['deleteproductid'];
				

				if(message['processtype']=='string')
				{
					processtxtbox+='<tr><td>Field Name:</td></tr><tr class="gradeX"><td><input type="text" name="tablefield" id="tablenamefield" data-columnid="'+editproductid+'" class="tablecontent" readonly="readonly" value="'+editproductname+'" /><input type="hidden" name="tablefieldid" id="tablefieldid" value="'+editproductid+'" /><input type="hidden" name="selecthref" id="selecthref" value="'+$('#editproductid').html()+'" /></td><td><img  src="'+$('#assetimageedit').html()+'" onclick="fieldcolumnedit(this);" border="0"  title="Edit" class="editcontent"><span class="deletedropdownoptions" data-href=""  data-valueid=""><img  src="'+$('#assetimagedelete').html()+'" border="0"  title="Delete" class="deletecontent" onclick="fndeletecontent1(this);"/></span><input type="hidden" name="selecthrefdelete" id="selecthrefdelete" value="'+$('#deleteproductid').html()+'" /></td></tr><tr><td>&nbsp;</td></tr>';
					for (var i =0;i< message[0].length; i++) {
						

						/*processtxtbox+='<tr class="gradeX "><td><input type="text" name="tablecontent[]" id="tablecontent" data-columnid="" class="tablecontent" readonly="readonly"  value="'+message[0][i][fieldtext]+'"  /><input type="hidden" name="tablecontentid[]" id="tablecontentid" data-columnid="" class="tablecontent" readonly="readonly" value="'+message[0][i]['id']+'" /><input type="hidden" name="tablename" id="tablename" data-columnid="" class="tablecontent" readonly="readonly" value="'+tablenamecurr+'" /><input type="hidden" name="tablenamefield" id="tablenamefield" data-columnid="" class="tablecontent" readonly="readonly" value="'+fieldtext+'" /><input type="hidden" name="selecthref" id="selecthref" value="'+$('#editurlid').html()+'" /></td><td><img  src="'+$('#assetimageedit').html()+'" onclick="fieldcolumnedit(this);" border="0"  title="Edit" class="editcontent"><span class="updatedropdownoptions"><img  src="'+$('#assetimageupdate').html()+'" border="0"  title="update" class="updatecontent" onclick="fnupdatecontent(this);"></span><span class="deletedropdownoptions" data-href=""  data-valueid=""><img  src="'+$('#assetimagedelete').html()+'" border="0"  title="Delete" class="deletecontent" onclick="fndeletecontent(this);"/></span><input type="hidden" name="selecthrefdelete" id="selecthrefdelete" value="'+$('#deleteurlid').html()+'" /></td></tr>';*/
processtxtbox+='<tr class="gradeX "><td><input type="text" name="tablecontent[]" id="tablecontent" data-columnid="" class="tablecontent" readonly="readonly"  value="'+message[0][i][fieldtext]+'"  /><input type="hidden" name="tablecontentid[]" id="tablecontentid" data-columnid="" class="tablecontent" readonly="readonly" value="'+message[0][i]['id']+'" /><input type="hidden" name="tablename" id="tablename" data-columnid="" class="tablecontent" readonly="readonly" value="'+tablenamecurr+'" /><input type="hidden" name="tablenamefield" id="tablenamefield" data-columnid="" class="tablecontent" readonly="readonly" value="'+fieldtext+'" /><input type="hidden" name="selecthref" id="selecthref" value="'+$('#editurlid').html()+'" /></td><td><img  src="'+$('#assetimageedit').html()+'" onclick="fieldcolumnedit(this);" border="0"  title="Edit" class="editcontent"><span class="deletedropdownoptions" data-href=""  data-valueid=""><img  src="'+$('#assetimagedelete').html()+'" border="0"  title="Delete" class="deletecontent" onclick="fndeletecontent(this);"/></span><input type="hidden" name="selecthrefdelete" id="selecthrefdelete" value="'+$('#deleteurlid').html()+'" /></td></tr>';
					
					}
					//processtxtbox+='<tr class="gradeX "><td><input type="text" name="tablecontent[]" id="tablecontent" data-columnid="" class="tablecontent" value=""  /><input type="hidden" name="tablecontentid[]" id="tablecontentid" data-columnid="" class="tablecontent" value="" /><input type="hidden" name="tablename" id="tablename" data-columnid="" class="tablecontent" readonly="readonly" value="'+tablenamecurr+'" /><input type="hidden" name="tablenamefield" id="tablenamefield" data-columnid="" class="tablecontent" readonly="readonly" value="'+fieldtext+'" /><input type="hidden" name="selecthref" id="selecthref" value="'+$('#editurlid').html()+'" /></td><td><span class="updatedropdownoptions"><img  src="'+$('#assetimageadd').html()+'" border="0"  title="update" class="updatecontent" onclick="fnupdatecontent(this);"></span></td></tr>';
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
		
	
	$('.addmorerow').click(function(){ 
var pp=$(this).parent().parent();
	//var $tr    = pp.find('.gradeX ');
//var $clone = $tr.clone().insertAfter(".gradeX");

var clonedRow = pp.find('tbody tr:eq(3)').clone();
clonedRow.find('input[name="tablecontent[]"]').val('');
clonedRow.find('input[name="tablecontentid[]"]').val('');
clonedRow.find('input').removeAttr('readonly');
clonedRow.find('td:last-child').html('');
pp.find($('table tbody')).append(clonedRow);
});	
		
});

function fieldcolumnedit(t){ 
	var pp=$(t).parent().parent();
			pp.find('.tablecontent').removeAttr('readonly');
			$(t).attr('src',$('#assetimageloading').html())


}
function fnupdatecontent(t){

                

			var pare=$(t).parent().parent().parent();
			
			
			var columnvalue=pare.find('.tablecontent').val();
			
			
			var columntype=pare.find('#tablecontentid').val();
			
			var selecthref=pare.find("#selecthref").val();
			var tablenames=pare.find('#tablename').val();
			var tablenamesfield=pare.find('#tablenamefield').val();
			
			var datastring="id="+columntype+"&value="+columnvalue+"&table="+tablenames+"&tablefield="+tablenamesfield;
			//alert(selecthref);
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
             	}
				else
             	{
             		//alert("here");
             		//alert("another");
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
/*this js for update click to show dropdown to show clickable field name edit*/
function fnupdatecontent1(t){

                //alert("updatecontent");
				
                var pare=$(t).parent().parent().parent();
			
			    var columnvalue=pare.find('#tablenamefield').val();
				
				//alert(columnvalue);
							
			    var columnid=pare.find('#tablenamefield').attr('data-columnid');
				
				//alert(columnid);
				
			   var selecthref=pare.find("#selecthref").val();
				//alert(selecthref);
				
				
				var datastring="fieldeditID="+columnid+"&fieldname="+columnvalue;
				//alert(datastring);
				$.ajax({
             type: 'post',
             url: selecthref,
             data: datastring,
             cache: false,
             success:function(data)
             {
             	//var message = JSON.parse(data);
             	//alert("here");
             		//alert(message);
                 alert("Updated Successfully");
				  pare.find('#tablenamefield').attr('readonly',true);
				  //window.location.reload();
				 //swal.close();
                 //alert(response);
                // $("#signup_status").html(response)
    
             },
			 error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus);
            alert(errorThrown);
        }

        });
				 

}

function fndeletecontent(t){
	//alert("deletre");

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
			
			debugger;
			$.ajax({
             type: 'post',
             url: selecthref,
             data: datastring,
             cache: false,
             success:function(data)
             {
             	
             		//alert("Deleted Successfully");
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
function close_form()
{
 //alert("Test");
 window.location.reload();
}
/*function fndeletecontent1(t){
	alert("delete dropdownvalue");
	
	
	        var pare=$(t).parent().parent().parent();
			pare.hide;
			var href=pare.find("#selecthrefdelete").val();
			
			
			
		    alert(href);
              var columnid=pare.find('#tablenamefield').attr('data-columnid');
			  alert(columnid);
			  
			  //var processhref=href+'/'+columnid;
			//var href=$(this).data("href");
			var datastring="id="+columnid;
			//alert(datastring);
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
				
	  		document.thisForm.action=processhref;
			document.thisForm.submit();
			});
			
}*/
function fndeletecontent1(t){
	
	swal({
  		title: "Are you sure to Delete ?",
  		type: "warning",
  		showCancelButton: true,
  		confirmButtonColor: "#DD6B55",
  		confirmButtonText: "Yes, do it!",
  		closeOnConfirm: false
		},
		function(){
	//alert("delete dropdownvalue");
	
	
	        var pare=$(t).parent().parent().parent();
			pare.hide;
			var href=pare.find("#selecthrefdelete").val();
			alert(href);
              var columnid=pare.find('#tablenamefield').attr('data-columnid');
			  alert(columnid);
			  
			  //var processhref=href+'/'+columnid;
			//var href=$(this).data("href");
			var datastring="id="+columnid;
			alert(datastring);
			
			  $.ajax({
             type: 'post',
             url: href,
             data: datastring,
             cache: false,
             success:function(data)
             {
             	
				//alert(data);
             		alert("Deleted Successfully1");
				swal.close();
				location.reload();
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



