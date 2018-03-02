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
                  <h4 style="color:#00ADEF;"><strong>COSTING & QUOTE INFORMATION</strong></h2>
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
        <form name="productsquoteinfoadd" id="productsquoteinfoadd" method="post" action="{{ url(route('user.add_costingandrequirements')) }}" class="form-horizontal" enctype="multipart/form-data">
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
                     
                <img id="blah" src="storage/data/product/" alt="" width="80" height="80" /> 
                
               <!-- <img id="blah" src="http://localhost/laravel/uniquegroup/storage/app/{{$productquotedetails->Artworkupload}}" alt="your image" width="80" height="80" />-->
               
               <img id="blah" src="{{ route('user.productimagepic', ['id' => $productquotedetails->id]) }}" alt="your image" width="80" height="80" />
               
                </div>
                
                </div>
                @else
                   @if($list->columnfieldname=="SampleRequestedDate")
             <div class="form-group" id="data_1">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                <div class="col-lg-5">
                  <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productquotedetails->SampleRequestedDate}}" placeholder="MM/DD/YYYY" class="search_upload" onclick="dateval();">
                 <!-- <i class="fa fa-calendar fa-color input-group date"  aria-hidden="true" ></i>--> 
               </div>
             </div>
              @elseif($list->columnfieldname=="NumberOfSamplesRequired")
             <div class="form-group" id="data_1">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                <div class="col-lg-5">
                  <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productquotedetails->NumberOfSamplesRequired}}" >
                 <!-- <i class="fa fa-calendar fa-color input-group date"  aria-hidden="true" ></i>--> 
               </div>
             </div>
              @elseif($list->columnfieldname=="SampleLeadTime")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productquotedetails->SampleLeadTime}}"  class="form-control"
                 style="width:20%;" />&nbsp;<span>Days</span>
                 </div>
                 
                
             </div>
              @elseif($list->columnfieldname=="ProductionLeadTime")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control"
                 style="width:20%;" value="{{$productquotedetails->ProductionLeadTime}}" />&nbsp;<span>Days</span>
                 </div>
             </div>
              @elseif($list->columnfieldname=="Remarks")
              <div class="form-group">
               <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 <textarea name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}">{{$productquotedetails->RemarksInstructions}}</textarea>
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

@endsection 