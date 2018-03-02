@extends('users.layouts.products')

<?php
error_reporting(0);

?>
@section('content')
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<link href="{{ asset("/css/plugins/steps/jquery.steps.css")}}" rel="stylesheet">
<link href="{{ asset("/css/plugins/datapicker/datepicker3.css")}}" rel="stylesheet">
<link href="{{ asset("/css/plugins/daterangepicker/daterangepicker-bs3.css")}}" rel="stylesheet">
<style>
.divwidthforexworks
{
width:10% !important;
}
.frightcost
{
width:56%;
	
}
.quantitychk{width:40px !important;}
.quantitychk1{ width:100% !important;}
.quantitychkdiv input {float: right;}
.quantitychkdiv {float: left; padding: 10px 10%;  margin-bottom: 15px;}
label.col-lg-1.control-label.font-noraml.text-left.label_font {
    float: left;
    width: 100%;
    text-align: center;
    margin-bottom: 24px;
}
.quantitychk input {
    margin: 4px 0;
    float: right;
}
.quantitychksec .quantitychkdiv {
    padding: 8px; margin-bottom: 8px;
}
input[type="checkbox"].quantitychk {margin-top:4px;}
.margin123{width:10% !important}
</style>

<script type="text/javascript">
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
  </script>
<div class="row border-bottom white-bg notificationdiv">

                    <div class="col-lg-12">
                        <img class="dashboard-mainimg"  src="{{ asset("/img/test2.png")}} " />
                        
                    </div>
                    <div class="col-lg-12">
                   <br />
                    <ol class="breadcrumb">
                     
                      <li>New Development<strong></strong></li>
                      <li>Product details</li>
                    </ol>
                  </div>
               
                  <div class="col-lg-12">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>SELLING PRICE</strong></h2>
                  </div>
                   <div class="col-lg-12">
					<div class="logoutSucc">

                     @if (session('success'))
                    <div class="alert alert-success" role="success">
                    <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
                    {{ session('success') }}
                    </div>
                    @endif

                   @if (session('failure'))
                    <div class="alert alert-danger" role="danger">
                    <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
                    {{ session('failure') }}
                    </div>
                    @endif
                 
                    

					</div>
                </div>  

            </div>
         <?php
		 
		//print_r($productquantitycostdetails->QuantityMOQ);
		
		$quoterequiredchk=$productquantitycostdetails->QuantityMOQ;
		$costseleteddetails=$productquantitycostdetails->Cost;
		
		$expquoterequiredchk=explode(",",$quoterequiredchk);
		
		$costrequiredetails=explode(",",$costseleteddetails);
		
		//echo "test".$lastquoteinsertid;
		
		//print_r($costrequiredetails);
		/*foreach($expquoterequiredchk as $chk)
		{
		 /*if($chk=="3K")
		 {
			echo "Yes1"; 
		 }
		  elseif($chk=="5K")
		 {
			echo "Yes2"; 
		 }*/
		// echo $chk."<br>";
		
		
		/*foreach($expquoterequiredchk as $chk)
		{
		 $chk;
		}
		foreach($costrequiredetails as $costdetails)
		{
		echo $costdetails;
		}*/
	
			
		
		
	/*foreach($productquantitycostdetails as $qy)
	{
		$qtychk=$qy->QuantityMOQ;
		$qtychk=array();
		
	}
	echo $qtychk;
		  $expquoterequiredchk=explode(",",$quoterequiredchk);*/
		
		
		    /*$quoterequiredchk=$productquantitycostdetails->QuantityMOQ;
			$expquoterequiredchk=explode(",",$quoterequiredchk);
			print_r($expquoterequiredchk);*/
			
		 ?>

<div class="row wrapper wrapper-content animated fadeInRight">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive"  style="overflow-x:hidden">
        <form name="productssellingpriceinfoadd" id="productssellingpriceinfoadd" method="post" 
        action="{{ url(route('user.add_costdetails')) }}" class="form-horizontal" enctype="multipart/form-data">
         {{ csrf_field() }}
            <div class="modal-body">
            <div class="col-sm-12 b-r">
              Margin :<input type="text" class="quantitychk1 margin123" name="input0" id="input0"  onkeyup="margin(this)" value="">%
            @foreach($productfielddetails as $list)
             
                
                <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                
                <?php
				$table=$list->tablename;
				$fielddetailslist = DB::table($table)->get();
				$fieldname=$list->columnfieldname;
				$listoffieldname=$list->fieldname;
				?>
               
               @if($list->columnfieldname=="PricingMethod")
                <!-- <div class="form-group">
                <label class="col-lg-12 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                
                 
                </div>
             </div> -->
            @endif
                 @else
                  @if($list->columnfieldname=="quantity")
                 <div class="form-group calculate">
               
               
                 <div class="col-lg-3 quantitychkblock">
                 <label class="col-lg-12 control-label font-noraml text-left label_font"><b>Quantity</b></label>
                 
                  @foreach($quantitydetails as $list)
                                                
                 <div class="col-sm-12 quantitychkdiv" data-qtytype="<?php echo $list->Quantity; ?>"> 
              
                
              {{$list->Quantity}}<input type="checkbox" name="quantitychk[]"  class="quantitychk" id="quantitychk" value="{{$list->Quantity}}" <?php
			  if(in_array($list->Quantity,$expquoterequiredchk))
			  {
				echo "checked=checked";  
			  }
			  
			  
			  ?> />
              
                 
              
                </div>
             @endforeach
                 </div>
                 
                 
                 <div class="col-lg-3">
                 <label class="col-lg-12 control-label font-noraml text-left label_font"><b>&nbsp;&nbsp;Cost</b></label>
                   <div class="col-sm-12 quantitychksec">
                   <?php   $cost_i=0; ?>
                                            @foreach($quantitydetails as $list)      
                               <div class="col-sm-12 quantitychkdiv costblock">
                      
                       
                  
               <input type="text" class="multiple quantitychk1 cost" value="<?php echo $costrequiredetails[$cost_i]; ?>" name="input1[]" id="input1" onkeyup="calc(this)" />
                   

               
                                </div>
                           
                           <?php $cost_i+=1;  ?>
                          @endforeach
                                                </div>
                 </div>
                 <div class="col-lg-3">
                 <label class="col-lg-12 control-label font-noraml text-left label_font"><b>&nbsp;&nbsp;Suggested Price</b></label>
                   <div class="col-sm-12 quantitychksec">
                                            @foreach($quantitydetails as $list)      
                               <div class="col-sm-12 quantitychkdiv suggestedpriceblock">
                      <input type="text" name="input2[]" id="input2" 1onkeyup="calc(this)" class="suggestedprice" value="">
                               </div>
                           
                                             @endforeach
                                                </div>
                 </div>
                 <div class="col-lg-3">
                 <label class="col-lg-12 control-label font-noraml text-left label_font"><b>&nbsp;&nbsp;Margin %</b></label>
                   <div class="col-sm-12 quantitychksec">
                                            @foreach($quantitydetails as $list)      
                               <div class="col-sm-12 quantitychkdiv marginpriceblock">
                      <!-- <input type="text" name="margin[]"  class="margin" id="quantitychk"/> --> 
                      <input type="text" name="output" id="output" class="margin" value="">
               
                           </div>
                           
              @endforeach
                                                </div>
                 </div>
                 
             </div>
                   
             
                 
                   
                    
                     
                  
                     
                     @endif
                 
                 @endif
                 <!--end here-->
                 
                 
                 
                 
                 
             <!-- </div>-->
            @endforeach
              
              
                
              
            </div>
            
            
            
          </div>
        
     
        
     
    <div class="form-group">
                
                 <div class="col-lg-12 submitbtndiv">
             
                  <input type="submit" name="productmaintenance" id="productmaintenance" value="Next"  class="button" style="width: 12%;"/>
                </div>
                 <div class="col-lg-8">
                 
                 </div>
                </div>
                
                   </form>
                   
                      </div>
      
      </div>

    </div>
</div>








<!--Quote required-->
<div class="modal inmodal" id="QuoteModal1" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight popupwindowwidth">
                                
                                		<div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Type of Quantity Maintenance</h4>
                                           <p>Just fill in your Quantity details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
   <form name="quotemaintenanceadd" id="quotemaintenanceadd" method="post"  class="form-horizontal">    
    {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                                <div class="form-group addr_field4">
                                               <label class="col-sm-4 control-label font-noraml text-left">Quantity(MOQ):</label>
                                               
                                                <div class="col-sm-8">
                                              
                                              
                                                @foreach($quantitydetails as $list)
                                                
                                                <div class="col-sm-12 quantitychkdiv">
                                                
                               @foreach($costrequiredetails as $costdetails)
              {{$list->Quantity}}<input type="checkbox" name="quantitychk"  class="quantitychk" id="quantitychk" 
              value="{{$costdetails->Quantity}}" />@endforeach
                                                </div>
                                                @endforeach
                                               
                                                
                                                </div>
                                               
                                                </div>
                                       </div>
                                       </div>
                                       <div class="row otherquantitydiv" style="display:none;">
                                        <div class="col-sm-12">
                                         <label class="col-lg-4 control-label font-noraml text-left">Others</label>
                                         <div class="col-lg-4">
                                         <input type="text" name="otherquantity" id="otherquantity" class="form-control" />
                                        </div>
                                        
                                     </div>
                                       
                                       </div>
                                       
                          
                              
                               </div>
                               <div class="modal-footer">
                                <input type="hidden" name="quote_url" id="quote_url" value="{{ url(route('user.add_quantity')) }}">
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                             
                                <button type="button" class="btn savebtn" name="quantitysubmit" id="quantitysubmit" data-dismiss="modal">Save</button>
                              
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
                            </div>









@endsection 