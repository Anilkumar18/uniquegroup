@extends('users.layouts.products')

@section('content')
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<link href="{{ asset("/css/plugins/steps/jquery.steps.css")}}" rel="stylesheet">
<link href="{{ asset("/css/plugins/datapicker/datepicker3.css")}}" rel="stylesheet">
<link href="{{ asset("/css/plugins/daterangepicker/daterangepicker-bs3.css")}}" rel="stylesheet">

<style>
.quantitychkdiv input
{
	width:10%;
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
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
               
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach     
                </select>
                 
                </div>
             </div>   
               
                   
                 @elseif($list->uploadimage!="")
                  <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile" name="imgInp" id="imgInp" value="{{$productquotedetails->Artworkupload}}" onchange="imageselect();"/>
                 <input type="hidden" name="selectimage" id="selectimage" class="form-control selectimage" value="{{$productquotedetails->Artworkupload}}" readonly="readonly">
                  <input type="hidden" name="selectimageid" id="selectimageid" class="form-control" readonly="readonly">
                  </div>
                      
               </div>
                <div class="form-group">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                 <div class="col-lg-5" id="selimage">
                     
                <img id="blah" src="storage/data/product/" alt="" width="80" height="80" /> <img id="blah" src="http://localhost:81/laravel/uniquegroup/storage/app/{{$productquotedetails->Artworkupload}}" alt="your image" width="80" height="80" />
                </div>
                
                </div>
                @else
                   @if($list->fieldname=="Sample Requested Date")
              <div class="form-group" id="data_1">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                <div class="col-lg-5">
                  <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productquotedetails->SampleRequestedDate}}" placeholder="MM/DD/YYYY" class="search_upload" onclick="dateval();">
                 <!-- <i class="fa fa-calendar fa-color input-group date"  aria-hidden="true" ></i>--> 
               </div>
             </div>
             @elseif($list->fieldname=="Quote Required")
             
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5" style="width:31%;">
                <input @if($productquotedetails->QuoteRequired='1')checked="checked" @endif type="radio"  name="quoterequired" id="yes"  class="radiobtn quoterequiredchk" value="1"  />
                <span class="quoterequiredyes">Yes</span>
               
                <br />
                  <input @if($productquotedetails->QuoteRequired='0')checked="checked" @endif  type="radio"  name="quoterequired" id="yes"  class="radiobtn quoterequiredchk" value="0"  />
                <span class="quoterequiredno">No</span>
                 </div>
                 
                 <div class="col-lg-5 quotediv" style="display:block">
                 <select id="quote" name="quote" class="form-group" style="width:45%;">
                <option value="">Please select</option>
                <option value="1"> Quantity(MOQ)</option>
                <option value="2"> Costing</option>
                </select>
                 </div>
                 
                
             </div>
              @elseif($list->fieldname=="Sample Lead Time")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
  <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$productquotedetails->SampleRequestNumber}}" class="form-control"
                 style="width:20%;" />&nbsp;<span>Days</span>
                 </div>
                 
                
             </div>
              @elseif($list->fieldname=="Production Lead Time")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productquotedetails->ProductionLeadTime}}" class="form-control"
                 style="width:20%;" />&nbsp;<span>Days</span>
                 </div>
             </div>
              @elseif($list->fieldname=="Remarks / Special Instructions")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <textarea name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}">{{$productquotedetails->RemarksInstructions}}</textarea>
                 </div>
             </div>
             
             
                       @elseif($list->columnfieldname=="SampleNumber")
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productquotedetails->SampleRequestNumber}}" class="form-control" />
                     </div>
                   </div>  
                    @elseif($list->columnfieldname=="NumberOfSamplesRequired")
                 <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productquotedetails->NumberOfSamplesRequired}}" class="form-control" />
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
                                                
                               <?php
							   $quoterequiredchk=$productquotedetails->QuoteRequiredchk;
							   $expquoterequiredchk=explode(",",$quoterequiredchk);
							  /* foreach($expquoterequiredchk as $chk)
							   {
								   echo $chk."<br>";
							   }*/
							   ?>
              {{$list->Quantity}}<input type="checkbox" name="quantitychk"  class="quantitychk" id="quantitychk" value="{{$list->Quantity}}" @foreach($expquoterequiredchk as $chk){ 
              @if($chk=="$list->Quantity") checked="checked" @endif
              } @endforeach />
                                                </div>
                                                @endforeach
                                               
                                                
                                                </div>
                                               
                                                </div>
                                       </div>
                                       </div>
                                       <div class="row otherquantitydiv" style="display:block;">
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