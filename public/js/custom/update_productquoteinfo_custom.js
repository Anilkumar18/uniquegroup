 $(document).ready(function() { 
 						
otherstrigger();

$("#input0").keyup();

function otherstrigger()
{
	//alert("updatetriggers");
	

			 
			 //alert("Testing");
			 
			 var quantitydetails=$(".quantitychk").val();
			 //alert(quantitydetails);
			 $(".quantitychk").each(function(){
				 if ($(this).attr('checked'))
{
                    var test=$(this).val();
					//alert(test);
					 if(test=="Other")
					 {
						$("#otherqty").css("display","block");
						$("#othercost").css("display","block");
					 }
					 
}
                });
				
				
				
				
				
				 $(".quantitychk").change(function() {
			 
			 //alert("Testing");
			 
			 var quantitydetails=$(this).val();
			 //alert(id);
			 if(quantitydetails=="Other")
			 {
				$("#otherqty").css("display","block");
				$("#othercost").css("display","block");
			 }
			 
		 });
			 
		
			 
			
			 
			 

		
	
}
		
	


					
 
   

				  
	
	  
	  $.ajaxSetup({
			  headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			})
	
	  
	 
	  
	  
	
		
 });
 
  $( document ).ready(function() {
    $('.suggestedprice').change(function(){
        var suggestedprice=$(this).val();debugger;
 var pp=$(this).parent().index();

 var costblk=$('.costblock:eq('+pp+')');
var cost=costblk.find('.cost').val();

var calcper=(((suggestedprice-cost)/(suggestedprice))*100).toFixed(2);

var marginpriceblk=$('.marginpriceblock:eq('+pp+')');
marginpriceblk.find('.margin').val(calcper);

    })
});


function calc(t) {
    /*var textValue1 = document.getElementById('input1').value;
    var textValue2 = document.getElementById('input2').value;
    var textValue3 = document.getElementById('input0').value;

    document.getElementById('output').value = (((textValue2 - textValue1)/ (textValue2))*100).toFixed(2);*/

    //$(".calculate").each(function() {
    
debugger;
    var tt=t.value;
    var pp=$(t).parent().parent().parent().index();
   if(tt!=''){ 
    
    var price=pp.find('#input1').val();  
var calcper=(((tt-price)/(tt))*100).toFixed(2); 
pp.find('#output').val(calcper);
}else{
  pp.find('#output').val(0);
}
//pp.find('#output').val(tt);
//});
}

function margin(t) {

$(".marginpriceblock").each(function() {
    debugger;
    var tt=t.value;
    var pp=$(this);
   var pindex=$(this).index();

   var costblk=$('.costblock:eq('+pindex+')');
var price=costblk.find('.cost').val();

var calcper='';
if(price!=''){calcper=tt;} 

pp.find('#output').val(calcper);


});

$(".suggestedpriceblock").each(function() {
    var tt=t.value;
    var pp=$(this);
   var pindex=$(this).index();

   var costblk=$('.costblock:eq('+pindex+')');
var price=costblk.find('.cost').val();

var calcper=((price/(price-tt))*100).toFixed(2); 
if(tt==''){calcper=0;}
pp.find('.suggestedprice').val(calcper);

});


  //alert(t.value);

/*$(".calculate").each(function() {
    var tt=t.value;
    var pp=$(this);
    var price=pp.find('#input1').val();
var calcper=((price/(price-tt))*100).toFixed(2); 
pp.find('#input2').val(calcper);
pp.find('#output').val(tt);
});*/
    
}


			
			
			
			
												 
												 
			
										 
								
	 
	

	
										