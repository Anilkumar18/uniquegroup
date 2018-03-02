@extends('users.layouts.products')

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
                  <h4 style="color:#00ADEF;"><strong>PRODUCT INFORMATION</strong></h2>
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
            <div class="modal-body">
            <div class="col-sm-12 b-r">
            @foreach($productfielddetails as $list)
              <div class="form-group">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                
                <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                
                <?php
				$table=$list->tablename;
				$fielddetailslist = DB::table($table)->get();
				$fieldname=$list->columnfieldname;
				$listoffieldname=$list->fieldname;
				?>
                
                @if($listoffieldname=="Production Region 1")
               
               <div class="col-lg-5 addr_field">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                  <div class="col-lg-5">
                
                <select id="productionregion2" name="productionregion2" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                  @elseif($listoffieldname=="Unique Factory 2")
                   <div class="col-lg-5">
                
                <select id="uniquefactory2" name="uniquefactory2" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                
                 @elseif($listoffieldname=="Season")
                 
                  <div class="col-lg-5 addr_field3">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                 @elseif($listoffieldname=="Product SubGroups")
                 
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                        </div>
                        <div class="col-lg-5 productsubgroupnotification"></div>
                        
                     @elseif($listoffieldname=="UnitofMeasurement")
                 
                          
                         <div class="col-lg-5 productsubgroup">
                        <select id="UnitofMeasurement" name="UnitofMeasurement" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach                                    
                        </select>
                        </div>
                        
               
                @else
               
                <div class="col-lg-5">
                
                <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                 
                </div>
                    
                
                      @endif
                      
                      
                      
                      
                
                                      
                
                
                @else
                
                 <div class="col-lg-5">
                 @if($list->columnfieldname=="version")
                 <?php
				  $version=DB::table("productdetails")->pluck("Version")->last();
				 ?>
                 
                  <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="<?php echo $version; ?>" class="form-control" readonly="readonly"/>
                 
                 @else
                 
                 <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 
                 @endif
                 
                 </div>
                 
                 @endif
                 <!--end here-->
                 
                  @if($list->fieldname=="Production Region 2")
                  
                   <div class="col-lg-5">
                    <button class="button addmorebtn" onclick="add_productionregion();">Add more</button>
                  </div>
                  @elseif($list->fieldname=="Unique Factory 2")
                    <div class="col-lg-5">
                   <button class="button uniqueaddmore" onclick="add_more();">Add More</button>
                  </div>
                  @endif
                 
              </div>
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