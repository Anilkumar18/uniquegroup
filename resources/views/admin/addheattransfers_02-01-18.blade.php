@extends('admin.layouts.heattransfers')

@section('content')
<style>
.modal-align
{
width:1000px;
}
.addr_field .col-lg-3 {
    width: 90%;
    padding: 0;
}
.mandatory_fields
{
color:#FF0000;
}
.clsformelements textarea
{
border: solid 1px #515151;
}
.add_more
{
width: 44%;
}
</style>
<script type="text/javascript">
function add_productionRegion()
{
 //alert("Testing");
  $("#myModal1").modal({
		   show:true
		 });
		 event.preventDefault();
}
function add_uniquefactory()
{
 $("#myModal").modal({
		   show:true
		 });
		 event.preventDefault();
}
</script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
     <!-- wrapper content -->   
      <?php
	  
	  //echo "sai".$customername=Session::get('customername');
	  //echo "sai".$customername=Session::get('customername');
	  $customerinfo=Session::get('customername');
	  
     $groupdetails=Session::get('groupname');
	 
    $subgroupdetails=Session::get('subgroupname');
	  
	  
	  
	 // print_r($customerdetails);exit;
	  ?>  
        
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!--<div class="col-lg-12 clsheaderbanner">
                    	<img src="img/banner001.png" />
                    </div>-->
                    
                   
                    
                    <div class="col-lg-12 clsbreadcrumb">
                    	<div class="col-lg-10">> Product Maintanance -<?php echo $customerinfo->CustomerName; ?> -<?php echo $groupdetails->ProductGroup; ?>-<?php echo $subgroupdetails->ProductSubGroupName; ?>- Add Product </div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{ url(route('admin.heattransfers',['id'=>4]))}}'">View List</button></div>
                    </div>
                    
                    
                    <div class="col-lg-12 clsaddnewvendorform">
                    
                         <form class="addvendor" name="productsheattransferadd" id="productsheattransferadd" method="post" action="{{ url(route('admin.addheattransfers'))}}" enctype="multipart/form-data">
                        	 {{ csrf_field() }}
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="cust_name" class="col-md-3">Customer Name<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                <input type="hidden" name="customername" id="customername"  value="{{$customerinfo->id}}" />
    						
                                 <input type="text" name="customers" id="customers" class="form-control" value="{{$customerinfo->CustomerName}}"  readonly="readonly" />
                                </div>
  							</div>
                            
                        </row>    
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="pwdcompany_name" class="col-md-3">Brand</label>
                                
                                <div class="col-md-3">
                                 <input type="text" name="brand" id="brand" class="form-control">
                                </div>
  							</div>
                            
                        </row>    
                        
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="first_name" class="col-md-3">Program Name</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="program_name" id="program_name" class="form-control" />
                                </div>
  							</div>
                            
                        </row>    
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="last_name" class="col-md-3">Product Group<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                            <input type="hidden" name="productgroup" id="productgroup"  value="{{$groupdetails->id}}" />
                             <input type="text" name="productgroupname" id="productgroupname" class="form-control" value="{{$groupdetails->ProductGroup}}"  readonly="readonly" />
                                
                                </div>
  							</div>
                            
                        </row>  
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="phn" class="col-md-3">ProductSubGroup<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                            
                              <input type="hidden" name="productsubgroup" id="productsubgroup"  value="{{$subgroupdetails->id}}" />
                                <input type="text" name="productsubgroupname" id="productsubgroupname" class="form-control" value="{{$subgroupdetails->ProductSubGroupName}}" readonly="readonly" />

                 
                                </div>
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">Customer Product Name<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="product_name" id="product_name"  class="form-control">
                                </div>
  							</div>
                            
                        </row>  
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">Customer Product Code<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="product_code" id="product_code"  class="form-control">
                                </div>
  							</div>
                            
                        </row>  
                        
                      
                        
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="office" class="col-md-3">Unique Product Code<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="unique_productcode" id="unique_productcode" class="form-control"/>
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="suite" class="col-md-3">Description<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                 <textarea id="decription" name="description" class="form-control"></textarea>
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="street" class="col-md-3">Style Number:</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="style_number" id="style_number" class="form-control" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="city" class="col-md-3">Season</label>
                                
                                <div class="col-md-3">
                                
                                <select id="season" name="season" class="form-control">
                                <option value="">Please Select</option>
                                @foreach($seasondetails as $seasonlist)
                                <option value="{{$seasonlist->id}}">{{$seasonlist->Season}}</option>
                                @endforeach
                                </select>
                                </div>
  							</div>
                            
                        </row>   
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="counrty" class="col-md-3">Product Process:<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							<select id="product_process" name="product_process" class="form-control">
                                 <option value="">Please select</option>
                                 @foreach($productprocessdetails as $prodprocesslist)
                                 <option value="{{$prodprocesslist->id}}">{{$prodprocesslist->ProductProcess}}</option>
                                 @endforeach
                                 </select>
                                </div>
  							</div>
                            
                        </row>   
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Status<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    						
                               <select id="product_status" name="product_status" class="form-control">
                                  <option value="">Please select</option>
                                  @foreach($statusdetails as $statuslist)
                                 
                                  <option value="{{$statuslist->id}}" @if($statuslist->id==3) selected="selected" @endif>{{$statuslist->StatusName}}</option>
                               @endforeach
                                  </select>

                                </div>
  							</div>
                            
                        </row>   
                        <?php
					    $versions=App\ProductDetails::orderBy('Version', 'desc')->pluck('Version')->first();
						?>
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3">Version</label>
                                
                                <div class="col-md-3">
                                 <?php
									/*if($versions!="")
									{*/
									?>
                             <!--   <input type="text" name="version" id="version"  value="{{$versions}}" class="form-control"/>-->
                                 <?php
				                   /* }else
				                  {*/
								  ?>
                                <!--   <input type="text" name="version" id="version" class="form-control" value="1" style="width:89%" readonly="readonly">-->
                                   <?php
										 /* }*/
										  ?>
                                 <input type="text" name="version" id="version" class="form-control" value="1"  readonly="readonly">
                                </div>
  							</div>
                            
                        </row>
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Production Region1<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3 addr_field">
    							<select id="productionregion1" name="productionregion1" class="form-control">
                                  <option value=""> Please Select</option>
                                  @foreach($productionregions as $productionregionslist)
                                  <option value="{{$productionregionslist->id}}">{{$productionregionslist->ProductionRegions}}</option>
                                 @endforeach
                                </select>
                                </div>
                               
  							</div>
                            
                        </row>  
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Production Region2:</label>
                                
                                <div class="col-md-3">
    							<select id="productionregion2" name="productionregion2" class="form-control">
                                  <option value="0"> Please Select</option>
                                  @foreach($productionregions as $productionregionslist)
                                  <option value="{{$productionregionslist->id}}">{{$productionregionslist->ProductionRegions}}</option>
                                 @endforeach
                                </select>
                                </div>
                                <div class="col-md-3">
                          <!--       <button class="button btnwidth" onclick="add_productionregion();" style="width: 44%;">Add more</button>-->
                                 <input type="button" class="button add_more" value="Add More"  onclick="add_productionRegion();"/>
                                </div>
                               
  							</div>
                            
                        </row>  
                       
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Unique Factory1<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3 uniquefactory1">
    							<select id="uniquefactory1" name="uniquefactory1" class="form-control">
                                  <option value=""> Please Select</option>
                                 @foreach($uniqueoffices as $officelist)
                                  <option value="{{$officelist->id}}">{{$officelist->OfficeFactoryName}}</option>
                                 @endforeach
                                </select>
                                </div>
                               
  							</div>
                            
                        </row>  
                      
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Unique Factory2</label>
                                
                                <div class="col-md-3 uniquefactory2">
    							<select id="uniquefactory2" name="uniquefactory2" class="form-control">
                                  <option value="0"> Please Select</option>
                                   @foreach($uniqueoffices as $officelist)
                                  <option value="{{$officelist->id}}">{{$officelist->OfficeFactoryName}}</option>
                                    @endforeach
                                </select>
                                </div>
                               <div class="col-md-3">
                               <!--  <input type="button" class="button add_more"  value="Add More"  onclick="add_uniquefactory();"/>-->
                               <input type="button" class="button add_more"  value="Add More"  onclick="javascript:;"/>
                                </div>
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Pricing Method<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							<select id="pricing_method" name="pricing_method" class="form-control">
                                  <option value=""> Please Select</option>
                                   @foreach($pricingmenthoddetails as $pricingmenthodlist)
                                   <option value="{{$pricingmenthodlist->id}}">{{$pricingmenthodlist->PricingMethod}}</option>
                                   @endforeach
                                </select>
                                </div>
                               
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Currency<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							<select id="currency" name="currency" class="form-control">
                                  <option value="">Please Select</option>
                                  @foreach($currencydetails as $currencylist)
                                  <option value="{{$currencylist->id}}">{{$currencylist->Currency}}</option>
                                  @endforeach
                                </select>
                                </div>
                               
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Unit of Measurement<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							<select id="unit_measurement" name="unit_measurement" class="form-control">
                                  <option value="">Please Select</option>
                                   @foreach($unitofmeasurementdetails as $unitofmeasurementlist)
                                   <option value="{{$unitofmeasurementlist->id}}">{{$unitofmeasurementlist->UnitofMeasurement}}</option>
                                   @endforeach
                                </select>
                                </div>
                               
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Minimum Order Quantity<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							 <input type="text" name="Min_Quantity" id="Min_Quantity" placeholder="Min Quantity" class="form-control">
                                </div>
                               
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Minimum Order Value<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							 <input type="text" name="Min_ordervalue" id="Min_ordervalue" placeholder="Min Quantity" class="form-control">
                                </div>
                               
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Pack Size<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							 <input type="text" name="pack_size" id="pack_size" placeholder="Pack Size" class="form-control">
                                </div>
                               
  							</div>
                            
                        </row>  
                          <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Selling Price<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							 <input type="text" name="selling_price" id="selling_price" placeholder="Selling Price" class="form-control">
                                </div>
                               
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3"></label>
    							<!--<button class="col-md-3 btn btn-info clsbutton" name="addvendors" id="addvendors"> Add </button>-->
                                <div class="col-md-3">
                                 <input type="submit" name="addheattransfer" id="addheattransfer" value="Next"  class="clsbutton"/>
                                 </div>
  							</div>
                            
                        </row>
                        
                            
                        </form>
                    
                    </div>
                    
                </div>
            </div>
        </div>
	<!-- /- wrapper content -->   
       <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-align">
                                <div class="modal-content animated bounceInRight" style="width:80%;margin: 0 10%;">
                                
                                		<div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Add Unique Offices/Factories</h4>
                                           <p>Just fill in your product group details and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                       <form name="officemaintenanceadd" id="officemaintenanceadd" method="post" class="form-horizontal">    
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          <div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Office / Factory Name:</label>
                                                <div class="col-lg-6">
                                                <input type="text" name="office_name1" id="office_name1" class="form-control">
                                               
                                                </div>
                                                </div>
                                          </div>
                                          
                                          
                                          
                                                
                                       </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          <div class="col-sm-6">
                                          	<div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Production Region:</label>
                                                <div class="col-lg-6">
                                                <select id="production_regions1" name="production_regions1">
                                                  <option value="">Please select</option>
                                                 @foreach($productionregions as $regionslist)
                                                 <option value="{{$regionslist->id}}">{{$regionslist->ProductionRegions}}</option>
                                                 @endforeach
                                                  </select>
                                                </div>
                                                </div>
                                          </div>
                                          
                                          
                                          <div class="col-sm-6">
                                          	<div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Marketing regions:</label>
                                                <div class="col-lg-6">
                                              <select id="marketing_regions1" name="marketing_regions1">
                                              <option value="">Please select</option>
                                              @foreach($marketingregions as $marketingregionlist)
                                              <option value="{{$marketingregionlist->id}}">{{$marketingregionlist->MarketingRegions}}</option>
                                              @endforeach
                                               </select>
                                                </div>
                                                </div>
                                          </div>
                                          
                                                
                                       </div>
                                       </div>
                                       
                                       
                                       
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          <div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Main Contact First Name:</label>
                                                <div class="col-lg-6">
                                              <input type="text" name="firstname1" id="firstname1" class="form-control">
                                               
                                                </div>
                                                </div>
                                           </div>    
                                           
                                            <div class="col-sm-6">
                                            	<div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Main Contact Last Name:</label>
                                                <div class="col-lg-6">
                                              <input type="text" name="lastname1" id="lastname1" class="form-control">
                                               
                                                </div>
                                                </div>
                                            </div>
                                       </div>
                                       </div>
                                       
                                       
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          <div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Phone Number:</label>
                                                <div class="col-lg-6">
                                              <input type="text" name="phonenumber1" id="phonenumber1" class="form-control">
                                               
                                                </div>
                                                </div>
                                          </div>
                                          
                                          <div class="col-sm-6">
                                          	<div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Email:</label>
                                                <div class="col-lg-6">
                                              <input type="text" name="email1" id="email1" class="form-control">
                                               
                                                </div>
                                                </div>
                                          </div>
                                                
                                       </div>
                                       </div>
                                       
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          	<div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Suite:</label>
                                                <div class="col-lg-6">
                                              <input type="text" name="suite1" id="suite1" class="form-control">
                                               
                                                </div>
                                                </div>
                                       		</div>
                                            
                                            <div class="col-sm-6">
                                            	<div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Street:</label>
                                                <div class="col-lg-6">
                                              <input type="text" name="street1" id="street1" class="form-control">
                                               
                                                </div>
                                                </div>
                                            </div>
                                            
                                       </div>
                                       </div>
                                       
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          	<div class="col-sm-6">                                          
                                                <div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">City:</label>
                                                <div class="col-lg-6">
                                              <input type="text" name="city1" id="city1" class="form-control">
                                               
                                                </div>
                                                </div>
                                       		</div>
                                            
                                            <div class="col-sm-6">
                                            	<div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Country:</label>
                                                <div class="col-lg-6">
                                           <select name="country1" id="country1" class="form-control">
                                           <option value="">Please select</option>
                                           @foreach($countryofoperations as $countrylist)
                                           <option value="{{$countrylist->id}}">{{$countrylist->Country}}</option>
                                           @endforeach
                                           </select>
                                               
                                                </div>
                                                </div>
                                            </div>
                                            
                                       </div>
                                       </div>
                                       
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          	<div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">State:</label>
                                                <div class="col-lg-6">
                                           <!--<select id="state1" name="state1" class="form-control">
                                           <option value="0">Please select</option>
                                           
                                           </select>-->
                                           <input type="text" id="state1" name="state1" class="form-control" />
                                               
                                                </div>
                                                </div>
                                       		</div>
                                            
                                            <div class="col-sm-6">
                                            	<div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">zipcode:</label>
                                                <div class="col-lg-6">
                                           
                                                  <input type="text" name="zipcode1" id="zipcode1" class="form-control">
                                                </div>
                                                </div>
                                            </div>
                                                     
                                       </div>
                                       </div>
                                   
                              
                               </div>
                               <div class="modal-footer">
                               <input type="hidden" name="season_url" id="season_url" value="{{ url(route('admin.adduniqueoffice')) }}" />
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                                <button type="button" class="btn savebtn" name="officesubmit" id="officesubmit" data-dismiss="modal">Save</button>
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
                            </div>     
        <div class="modal inmodal" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight" style="width:94%;margin: 0 10%;">
                                
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
                                <input type="hidden" name="productionregion_url" id="productionregion_url" value="{{ url(route('admin.add_region')) }}">
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                                <button type="button" class="btn savebtn" name="productionregionsubmit" id="productionregionsubmit" data-dismiss="modal">Save</button>
                             <!--  <input type="submit" name="productionregionsubmit" id="productionregionsubmit" class="btn savebtn" value="Save">-->
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
                            </div>
@endsection 