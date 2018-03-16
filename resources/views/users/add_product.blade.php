@extends('users.layouts.products')
<?php
error_reporting(0);
?>

@section('content')
<!--<script src="{{ asset('/js/bootstrap.min.js') }}"></script>-->



<div class="row border-bottom white-bg notificationdiv">

                    <div class="col-lg-12">
                        <img class="dashboard-mainimg"  src="{{ asset("/img/test2.png")}} " />
                        
                    </div>
                    <div class="col-lg-12">
                   <br />
                    <?php
					  $productgroupid=Session::get('productgroupid');
					   $productgroupdetails=App\ProductGroup::where('status','=',1)->where('id','=',$productgroupid)->first();
					   
					   $productsubgroupdetails=App\ProductSubGroup::where('Product_groupID','=',$productgroupid)->first();
					   
					  ?>
                    <ol class="breadcrumb">
                     
                      <li>New Development<strong></strong></li>
                      <li>
                     {{$productgroupdetails->ProductGroup}}
                      </li>
                    </ol>
                  </div>
               
                  <div class="col-lg-12">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>PRODUCT DETAILS</strong></h2>
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
        <form name="productsadd" id="productsadd" method="post" action="{{ url(route('user.add_productsdetails')) }}" class="form-horizontal">
         {{ csrf_field() }}
         
         <input type="hidden" name="ProductGroup" id="ProductGroup" value="{{$productgroupid}}" />
         
      <input type="hidden" name="productsubgroupurl" id="productsubgroupurl" value="<?php echo url('/');?>" />
          
          
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
				
  // $productdetailsfields=App\ProductDetailFields::where('status','=',1)->where('columnfieldname','=',"ProductionRegions")->get();
		
		//print_r($productdetailsfields);
				?>
                 @if($fieldname=="ProductionRegions")
               
                   <?php if($i<=3) {?>
                  <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5">
                
                <select id="{{$fieldname}}<?php echo $i; ?>" name="{{$fieldname}}<?php echo $i; ?>" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                <?php
				   }
				   else
				   {
					   ?>
					   <div class="form-group" style="display:none;">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5">
                
                <select id="{{$fieldname}}<?php echo $i; ?>" name="{{$fieldname}}<?php echo $i; ?>" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
					   <?php }
				$i++;
				?>
               
                @elseif($fieldname=="factoryName")
                 <?php if($j<=3) {?>
                <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5 uniquefactory<?php echo $j; ?>">
                
                <select id="uniquefactory<?php echo $j; ?>" name="uniquefactory<?php echo $j; ?>" class="form-control dropdownwidth">
                <option value="">Please Select</option>
               
                                    
                </select>
                 
                </div>
                </div>
                 <?php
				   }
				   else
				   {
					   ?>
                   <div class="form-group" style="display:none;">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5 uniquefactory<?php echo $j; ?>">
                
                <select id="uniquefactory<?php echo $j; ?>" name="uniquefactory<?php echo $j; ?>" class="form-control dropdownwidth">
                <option value="">Please Select</option>
               
                                    
                </select>
                 
                </div>
                </div>
                <?php
				   }
				$j++;
				?>
                
                
                 @elseif($fieldname=="Season")
                 <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5 addr_field3">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                
                 @elseif($fieldname=="ProductSubGroupName")
                 @if(count($productsubgroupdetails)>0)
                 <div class="form-group">
                  <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                        </div>
                        <div class="col-lg-5 productsubgroupnotification"></div>
                        </div>
                        @endif
                        
                        <!-- //Defect: newpdf no:6
                       //Name: Vidhya-PHP Team
                        //Working for the list of particular customers -->
                     @elseif($fieldname=="CustomerName")
                     <div class="form-group">
                      <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="CustomerName" name="CustomerName" class="form-control dropdownwidth" onchange="CustomerChange();">
                        <option value="">Please Select</option>
                         
                         <?php
                             if($user->userTypeID==9)
                            {
                              $customerdetails=App\Customers::where('id','=',$user->customerID)->get();
                            }else
                            $customerdetails=App\Customers::all();
                          foreach($customerdetails as $customers)
                          {
                          ?>
                            <option value="{{$customers->id}}" drop-data="{{url(route('user.selectcustomer', ['id' => $customers->id]))}}">{{ $customers->CustomerName }}</option>
                           <?php
                           }
                           ?>
                         
                                                        
                        </select>
                        </div>
                        </div>
                         @elseif($fieldname=="Warehouse_Name")
                     <div class="form-group">
                      <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                        <div class="statedisplay">
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="Warehouse_Name" name="Warehouse_Name" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                        
                         <?php
                             if($user->userTypeID==9)
                            {
                              $customerdetails=App\Customers::where('id','=',$user->customerID)->get();
                            }else
                            $customerdetails=App\Customers::all();
                          foreach($customerdetails as $customers)
                          {
                          ?>
                            <option value="{{$customers->id}}">{{ $customers->Warehouse_Name }}</option>
                           <?php
                           }
                           ?>
                         
                                                              
                        </select>
                        </div>
                      </div>
                        </div>
                        
               
                @else
                <div class="form-group">
                <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                </div>
                    
                
                      @endif
                      
                      
                      
                      
                
                                      
                
                
                @else
                <div class="form-group">
                 <label class="col-lg-3 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                 @if($list->columnfieldname=="version")
                
                         
                       
                       <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="1" class="form-control" readonly="readonly"/>       
                       
                 @elseif($list->columnfieldname=="sampleandquote") 
                
                <input type="radio" name="samplequote" id="samplequote"  class="chkbox samplequote" value="1"/>
                
                @elseif($list->columnfieldname=="onlyquote") 
                
                 <input type="radio" name="samplequote" id="onlyquote"  class="chkbox samplequote" value="2"/>
                       
                 @else
                 
                 <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 
                 @endif
                 
                 </div>
                 </div>
                 
                 @endif
                 <!--end here-->
                 
               
                 
              
            @endforeach
              
              
                
              
            </div>
            
            
            
          </div>
        
     
        
     
    <div class="form-group">
                
                 <div class="col-lg-3">
            
         
                </div>
                 <div class="col-lg-5 submitbtndiv">
       <input type="submit" name="productmaintenance" id="productmaintenance" value="Next"  class="button nextbtn" />
                 </div>
                </div>
                
                   </form>
                   
                      </div>
      
      </div>

    </div>
</div>


<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight popupwindowwidth">
                                
                                		<div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Type of Season Maintenance</h4>
                                           <p>Just fill in your product group details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
   <form name="seasonmaintenanceadd" id="seasonmaintenanceadd" method="post"  class="form-horizontal">    
    {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Season:</label>
                                                <div class="col-lg-8">
                                                <input type="text" name="season" id="season" class="form-control">
                                               
                                                </div>
                                                </div>
                                       </div>
                                       </div>
                                       
                          
                              
                               </div>
                               <div class="modal-footer">
                                <input type="hidden" name="season_url" id="season_url" value="{{ url(route('user.add_season')) }}">
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                             
                                <button type="button" class="btn savebtn" name="seasonsubmit" id="seasonsubmit" data-dismiss="modal">Save</button>
                              
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
                            </div>


<div class="modal inmodal" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight popupwindowwidth">
                                
                                		<div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Type of Production Region Maintenance</h4>
                                           <p>Just fill in your product group details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
   <form name="productionregionadd" id="productionregionadd" method="post" class="form-horizontal">    
    {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                                <div class="form-group">
                                                <label class="col-lg-4 control-label font-noraml text-left">Production Region:</label>
                                                <div class="col-lg-8">
                                                <input type="text" name="regions" id="regions" class="form-control">
                                               
                                                </div>
                                                </div>
                                       </div>
                                       </div>
                                       
                          
                              
                               </div>
                               <div class="modal-footer">
                                <input type="hidden" name="productionregion_url" id="productionregion_url" value="{{ url(route('user.add_region')) }}">
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                                <button type="button" class="btn savebtn" name="productionregionsubmit" id="productionregionsubmit" data-dismiss="modal">Save</button>
                             <!--  <input type="submit" name="productionregionsubmit" id="productionregionsubmit" class="btn savebtn" value="Save">-->
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
                            </div>


<!--Woven Subgroup-->










@endsection 