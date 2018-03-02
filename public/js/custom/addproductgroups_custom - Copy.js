 $(document).ready(function() { 
							

var hookdetails =$("#hooksadd").validate({
  rules: {
     HooksMaterial : {
    required: true
  },
 Color: {
	  required: true
 },
  Thickness: {
	  required: true
 },
  Width: {
	  required: true
 },
  Length: {
	  required: true
 },
 MoldCostingCurrency: {
	  required: true
 },
 MoldCosting: {
	  required: true
 },

	
  }
});

var tissuepaperdetails =$("#tissuepaperadd").validate({
  rules: {
     RawMaterial : {
    required: true
  },
  Thickness: {
	  required: true
 },
  Width: {
	  required: true
 },
  Length: {
	  required: true
 },
 GroundPaperColor: {
	  required: true
 },
 PrintType: {
	  required: true
 },
 PrintType: {
	  required: true
 },
 print_color1:{
	required:true 
 },
 CuttingName:{
	required:true 
 },

	
  }
});
var productgroup =$("#productdetailsadd").validate({
  rules: {
     RawMaterial : {
    required: true
  },
  Thickness:{
	   required: true
  },
  Width:{
	  required: true  
  },
  Height:{
	    required:true  
  },
  Length:{
	    required:true  
  },
  PrintType:{
	required:true  
  },
  printcolor:{
	required:true  
  },
  print_color1:{
	  required:true
  },
  CuttingName:{
	 required:true  
  },
  PricingMethod:{
	 required:true  
  },
   UnitofMeasurement:{
	 required:true  
  },
   Currency:{
	 required:true  
  },

	
  }
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

	  
		
	  
	  
	 
	  
	  
	
	  
	  
	  
	
		
 });
			
	function imageselect()
{
	 //alert("Testing");
	var fileName = $('.fbfile').val();
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
			 //$('#blahimg').hide();
			 
			var imageurl='<img id="blah" src="" alt="your image" width="80" height="80" />';
				var text=$('#selimage').html(imageurl);
				//alert(text);
				$('#blah').attr('src', e.target.result).width(80).height(80);
				 //$('#selectimage').attr(e.name);
				 $('input[name=selectimage]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
  
    $("#imgInp").change(function(){
        readURL(this);
    }); 
	
	
		function imageselect1()
{
	 //alert("Testing");
	var fileName = $('.fbfile1').val();
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
		$('.fbfile1').val('');
		alert('Please upload valid image file!');
		return false;
	}
	
	    
}
function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
			
            reader.onload = function (e) {
			 $('#selimage1').empty();
			 $('#selectimageid1').val('');
			 //$('#blahimg').hide();
			 
			var imageurl='<img id="blah1" src="" alt="your image" width="80" height="80" />';
				var text=$('#selimage1').html(imageurl);
				//alert(text);
				$('#blah1').attr('src', e.target.result).width(80).height(80);
				 //$('#selectimage').attr(e.name);
				 $('input[name=selectimage1]').val(input.files[0].name)
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
  
    $("#imgInp1").change(function(){
        readURL1(this);
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
	
