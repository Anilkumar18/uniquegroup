@extends('users.layouts.update_productquoteinfo')
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
</style>

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
                  <h4 style="color:#00ADEF;"><strong>QUOTE & SAMPLE REQUEST INFORMATION</strong></h2>
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
			
	     $quoterequiredchk=$productquotedetails->QuantityMOQ;
		$costseleteddetails=$productquotedetails->Cost;
		
		$expquoterequiredchk=explode(",",$quoterequiredchk);
		
		$costrequiredetails=explode(",",$costseleteddetails);
			?>
         

<div class="row wrapper wrapper-content animated fadeInRight">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive"  style="overflow-x:hidden">
        <form name="productsquoteinfoadd" id="productsquoteinfoadd" method="post" action="{{ url(route('user.add_productquoteinfo')) }}" class="form-horizontal" enctype="multipart/form-data">
         {{ csrf_field() }}
         
          <input type="hidden" name="editID" id="editID" value="{{$productquotedetails->id}}"  />
            <div class="modal-body">
            <div class="col-sm-12 b-r">
            @foreach($productfielddetails as $list)
             
                
                <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                
                <?php
				$table=$list->tablename;
				$fielddetailslist = DB::table($table)->get();
				$fieldname=$list->columnfieldname;
				$listoffieldname=$list->fieldname;
				?>
                
                @if($fieldname=="PricingMethod")
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}" @if($productquotedetails->PricingMethod==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach     
                </select>
                 
                </div>
             </div>   
              @elseif($fieldname=="UnitofMeasurement")
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}" @if($productquotedetails->UnitofMeasurementID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach     
                </select>
                 
                </div>
             </div>
               @elseif($fieldname=="Currency")
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}" @if($productquotedetails->CurrencyID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach     
                </select>
                 
                </div>
             </div>
             @endif
             
                 @else
                  @if($list->columnfieldname=="quantity")
                 <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
               
                 <div class="col-lg-2">
                 <label class="col-lg-1 control-label font-noraml text-left label_font"><b>Quantity</b></label>
                 
                  @foreach($quantitydetails as $list)
                                                
                 <div class="col-sm-12 quantitychkdiv">      
              {{$list->Quantity}}<input type="checkbox" name="quantitychk[]"  class="quantitychk" id="quantitychk" value="{{$list->Quantity}}"  <?php
			  if(in_array($list->Quantity,$expquoterequiredchk))
			  {
				echo "checked=checked";  
			  }
			  
			  
			  ?> />
                </div>
                
                
             @endforeach
                 </div>
                
                 
                 <div class="col-lg-5">
                 <label class="col-lg-1 control-label font-noraml text-left label_font"><b>&nbsp;&nbsp;Cost</b></label>
                   <div class="col-sm-12 quantitychksec">
                    <?php   $cost_i=0; ?>
                                            @foreach($quantitydetails as $list)      
                               <div class="col-sm-12 quantitychkdiv">
              <input type="text" name="quantitychk1[]"  class="quantitychk1" id="quantitychk" value="<?php echo $costrequiredetails[$cost_i]; ?>"/>  
              </div>
               <?php $cost_i+=1;  ?>
              @endforeach
              <div class="col-sm-12">
              <?php
			  $quantitychkvalue=$productquotedetails->QuantityMOQ;
			  
			  $expquoterequiredchk=explode(",",$quantitychkvalue);
			  
			  $costchkvalue=$productquotedetails->Cost;
			  $costrequiredchk=explode(",",$costchkvalue);
			  
			  $costval=end($costrequiredchk);
			    
			  if($costval!="")
			  {
			  foreach($expquoterequiredchk as $chkqty)
			  {
				  $chkqty;
			  }
			  
			  }
			 
			
			  
			  ?>
              
              <input type="text" name="otherqty" id="otherqty" placeholder="Quantity"  value="{{$chkqty}}" style="display:none"/>
              
              <input type="text" name="othercost" id="othercost" placeholder="Cost" value="{{$costval}}" style="display:none"/>
              </div>
              
              
                                                </div>
                 </div>
             </div>
                   
              @elseif($list->columnfieldname=="MinQuantity")
              
               <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$productquotedetails->MinimumOrderQuantity}}" class="form-control" /><span><b>&nbsp;Units</b></span>
                     </div>
                   </div>  
                    @elseif($list->columnfieldname=="Minordervalue")
              
               <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$productquotedetails->MinimumOrderValue}}" class="form-control" />
                     </div>
                   </div>  
                   @elseif($list->columnfieldname=="packsize")
              
               <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productquotedetails->PackSize}}"  class="form-control" /><span><b>&nbsp;Units</b></span>
                     </div>
                   </div>  
                    @elseif($list->columnfieldname=="samplecost")
              
               <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productquotedetails->SellingPrice}}"  class="form-control" />
                     </div>
                   </div>
                    @elseif($list->columnfieldname=="exworks")
                      <h4 style="color:#00ADEF;"><strong>COSTING REQUIREMENTS</strong></h2>
                     <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                
                 <div class="col-lg-5 divwidthforexworks" >
     <input type="checkbox" class="quantitychk" name="exworks" id="exworks" value="1" @if($productquotedetails->ExWorks)checked="checked" @endif />
                
                    </div>
                     <label class="col-lg-2 control-label font-noraml text-left label_font">Fright Cost</label>
                     <div class="col-lg-5 divwidthforexworks">
                <input type="text"  name="frightcost" id="frightcost"  class="frightcost" readonly="readonly" />
              
                
                    </div>
                     <label class="col-lg-2 control-label font-noraml text-left label_font">Currency</label>
                    <div class="col-lg-5 divwidthforexworks">
                    <select style="margin-top: 13%;" disabled="disabled">
                    <option></option>
                    </select>
              
                
                    </div>
                   
                   
                    </div>
                     @elseif($list->columnfieldname=="fob")
                     <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5 divwidthforexworks">
                <input type="checkbox" class="quantitychk3" name="fob" id="fob" value="2" @if($productquotedetails->	FOB)checked="checked" @endif />
                    </div>
                    <label class="col-lg-2 control-label font-noraml text-left label_font">Fright Cost</label>
                     <div class="col-lg-5 divwidthforexworks">
                <input type="text"  name="frightcost" id="frightcost"  readonly="readonly" class="frightcost" />
              
                
                    </div>
                     <label class="col-lg-2 control-label font-noraml text-left label_font">Currency</label>
                    <div class="col-lg-5 divwidthforexworks">
                    <select style="margin-top: 13%;" disabled="disabled">
                    <option></option>
                    </select>
              
                
                    </div>
                    
                   
                   
                    </div>
                    
                      @else
                       
                       
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
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










@endsection 