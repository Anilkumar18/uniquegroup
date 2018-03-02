@extends('users.layouts.update_inventory')
<?php

error_reporting(0);
?>

@section('content')
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>


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
                  <h4 style="color:#00ADEF;"><strong>INVENTORY INFORMATION</strong></h2>
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
			
			 $productid=Session::get('productlastrecordid');
			 $productdetails=App\ProductDetails::where('id','=',$productid)->where('status','=',1)->first();
			?>
         

<div class="row wrapper wrapper-content animated fadeInRight">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
  
        <div class="table-responsive"  style="overflow-x:hidden">
        <form name="productinventoryadd" id="productinventoryadd" method="post" action="{{ url(route('user.add_inventorydetails')) }}" class="form-horizontal">
         {{ csrf_field() }}
         
          <input type="hidden" name="editID" id="editID" value="{{$productinventorydetails->id}}"  />
         
          <input type="hidden" name="region_url" id="region_url" value="<?php echo url('/');?>" />
         
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
                @if($listoffieldname=="Production Region 1")
                 <div class="form-group inventorycontent" style="display:block">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="{{$fieldname}}1" id="{{$fieldname}}1" class="form-control">
                                <option value="">Please Select</option>
                               @foreach ($fielddetailslist as $fielddetails)  
                               <option value="{{$fielddetails->id}}" 
                               @if($productinventorydetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                               @endforeach
                                </select>
                     </div>
                     </div>
           <input type="hidden" id="SelUniquefactory1" name="SelUniquefactory1" value="{{$productinventorydetails->UniqueFactory1}}" />
                 @elseif($listoffieldname=="Unique Factory 1")
                  
                    <div class="form-group inventorycontent" style="display:block">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  uniquefactory1">
                       <select id="uniquefactory" name="uniquefactory" class="form-control dropdownwidth">
                       </select>
                     </div>
                     </div>
                     
                      @elseif($listoffieldname=="Production Region 2")
                 <div class="form-group inventorycontent" style="display:block">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="{{$fieldname}}2" id="{{$fieldname}}2" class="form-control">
                                <option value="">Please Select</option>
                               @foreach ($fielddetailslist as $fielddetails)  
                               <option value="{{$fielddetails->id}}" 
                               @if($productinventorydetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                               @endforeach
                                </select>
                     </div>
                     </div>
   <input type="hidden" id="SelUniquefactory2" name="SelUniquefactory2" value="{{$productinventorydetails->UniqueFactory2}}" />
   
    @elseif($listoffieldname=="Unique Factory 2")
                  
                    <div class="form-group inventorycontent" style="display:block">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  uniquefactory2">
                       <select id="uniquefactory2" name="uniquefactory2" class="form-control dropdownwidth">
                       </select>
                     </div>
                     </div>
   @elseif($listoffieldname=="Production Region 3")
                 <div class="form-group inventorycontent" style="display:block">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="{{$fieldname}}3" id="{{$fieldname}}3" class="form-control">
                                <option value="">Please Select</option>
                               @foreach ($fielddetailslist as $fielddetails)  
                               <option value="{{$fielddetails->id}}" 
                               @if($productinventorydetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                               @endforeach
                                </select>
                     </div>
                     </div>
 <input type="hidden" id="SelUniquefactory3" name="SelUniquefactory3" value="{{$productinventorydetails->UniqueFactory3}}" />         @elseif($listoffieldname=="Unique Factory 3")
                  
                    <div class="form-group inventorycontent" style="display:block">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  uniquefactory3">
                       <select id="uniquefactory3" name="uniquefactory3" class="form-control dropdownwidth">
                       </select>
                     </div>
                     </div>
                
                @endif
                
                      
                
                
                @else
                
                    @if($list->columnfieldname=="Inventory")
                   
                     <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="Inventory" id="Inventory" class="form-control">
                                <option value="">Please Select</option>
                                @foreach($inventorydetails as $inventorylist)
                               <option value="{{$inventorylist->id}}"  @if($productinventorydetails->InventoryID==$inventorylist->id)selected="selected" @endif>{{$inventorylist->InventoryName}}</option>
                                @endforeach
                                </select>
                     </div>
                     </div>
                    
                    @elseif($list->columnfieldname=="Projection")
                     <div class="form-group inventorycontent" style="display:block">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5 inventorycontent" style="display:block">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productinventorydetails->Projection}}"  class="form-control" />
                     </div>
                     </div>
                     @elseif($list->columnfieldname=="Maximumpiecesonstock")
                     <div class="form-group inventorycontent" style="display:block">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5 inventorycontent" style="display:block">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productinventorydetails->Maximumpiecesonstock}}"  class="form-control" />
                     </div>
                     </div>
                      @elseif($list->columnfieldname=="Minimumpiecesonstock")
                     <div class="form-group inventorycontent" style="display:block">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5 inventorycontent" style="display:block">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$productinventorydetails->Minimumpiecesonstock}}"  class="form-control" />
                     </div>
                     </div>
                     @endif
                 
                 @endif
                 <!--end here-->
                
                 
                 
                 
              
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








<!--Woven Subgroup-->










@endsection 