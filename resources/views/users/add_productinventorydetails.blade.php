@extends('users.layouts.products')
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
         
            <div class="modal-body">
            <div class="col-sm-12 b-r">
            <?php
				$i=1;
				$j=1;
				?>
            @foreach($productfielddetails as $list)
            
           
                <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                
                <?php
			     
				$table=$list->tablename;
				$fielddetailslist = DB::table($table)->get();
				$fieldname=$list->columnfieldname;
				$listoffieldname=$list->fieldname;
				?>
                @if($fieldname=="ProductionRegions")
                
                 <div class="form-group inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="{{$fieldname}}<?php echo $i; ?>" id="{{$fieldname}}<?php echo $i; ?>" class="form-control">
                                <option value="">Please Select</option>
                               @foreach ($fielddetailslist as $fielddetails)  
                               <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                               @endforeach
                                
                                </select>
                     </div>
                     </div>
                   
                <?php
				 $i++;  
				?>
                 @elseif($fieldname=="factoryName")
                  
                    <div class="form-group inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  uniquefactory<?php echo $j; ?>">
                       <select id="uniquefactory<?php echo $j;?>" name="uniquefactory<?php echo $j;?>" class="form-control dropdownwidth">
                              
                                
                                </select>
                     </div>
                     </div>
                
                       
                 <?php
				
				$j++;
				?>
                @endif
                
                      
                
                
                @else
                
                    @if($list->columnfieldname=="Inventory")
                   
                     <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5  invwidth">
                      <select  name="Inventory" id="Inventory" class="form-control">
                                <option value="">Please Select</option>
                                @foreach($inventorydetails as $inventorylist)
                               <option value="{{$inventorylist->id}}">{{$inventorylist->InventoryName}}</option>
                                @endforeach
                                </select>
                     </div>
                     </div>
                    
                    @else
                     <div class="form-group inventorycontent" style="display:none">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                     <div class="col-lg-5 inventorycontent" style="display:none">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
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