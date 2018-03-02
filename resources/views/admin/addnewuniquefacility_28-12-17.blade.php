@extends('admin.layouts.uniquefacility')

@section('content')

</style>
        
     <!-- wrapper content -->   
        
        
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!--<div class="col-lg-12 clsheaderbanner">
                    	<img src="img/banner001.png" />
                    </div>-->
                    
                    <div class="col-lg-12 clsbreadcrumb">
                    	<p> > Unique Maintanance - Facilities - Add New Facility </p>
                    </div>
                    
                    <div class="col-lg-12 clsaddnewvendorform"> <?php //echo '<pre>'; print_r($country); ?>
                    
                         <form class="addnewfacility" name="addnewfacility" id="addnewfacility" method="post" action="{{ url(route('admin.adduniquefacility'))}}" enctype="multipart/form-data">
                        	 {{ csrf_field() }}
                    
                        <input type="hidden" name="editID" id="editID" value="@if($edit_val==1) {{ $uniqueoffices->id }} @endif"/>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="pwdcompany_name" class="col-md-3">Office / Factory Name</label>
                                
                                <div class="col-md-3">
                                 <input type="text" name="factoryname" id="factoryname" class="form-control" placeholder="Office / Factory Name" value="@if($edit_val==1) {{ $uniqueoffices->Factory1OfficeFactoryName }} @endif" />
                                </div>
  							</div>
                            
                        </row>  
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
                            
    							<label for="MarketingRegion" class="col-md-3">
                                <input style="margin-left: 40%;width: 50%;" type="radio" name="region" value="1" "@if($edit_val==1) {{ $uniqueoffices->regionSelect==1 ? 'checked' : '' }} @endif" />
                                <span class="col-md-12" style="
margin-top: -4px; position: absolute; margin-left: -140px; width: 52%;">Marketing Region</span></label>
    							<label for="ProductionRegion" class="col-md-3"><input style="margin-left: 25%;width: 50%;" type="radio" name="region" value="2" "@if($edit_val==1) {{ $uniqueoffices->regionSelect==2 ? 'checked' : '' }} @endif" /><span class="col-md-12" style="margin-top: -4px; position: absolute; margin-left: -184px; width: 54%;">Production Region</span></label>
  							</div>
                            
                        </row>  
                        @if($edit_val==1 && $uniqueoffices->Factory1MarketingRegionID!='')
                     <row class="col-md-12 marketing1">
                          
                            <div class="form-group clsformelements">
    							<label for="country" class="col-md-3">Marketing Region</label>
                                
                                <div class="col-md-3">
    							<select  id="marketingregions" name="marketingregions" class="form-control">
                                 <option value="">Please select Marketing Region</option>
                                 @foreach($marketingregions as $marketingregionslist)
                                 <option value="{{$marketingregionslist->id}}" "@if($edit_val==1) {{ $uniqueoffices->Factory1MarketingRegionID==$marketingregionslist->id ? 'selected' : '' }} @endif">{{$marketingregionslist->MarketingRegions}}</option>
                                 @endforeach
                                 </select>
                                </div>
                                
                               
                                
                             
                                
  							</div>
                            
                        </row> 
                        </row> 
                        @else
                        <row class="col-md-12 marketing" style="display:none;">
                          
                            <div class="form-group clsformelements">
    							<label for="country" class="col-md-3">Marketing Region</label>
                                
                                <div class="col-md-3">
    							<select  id="marketingregions" name="marketingregions" class="form-control">
                                 <option value="">Please select Marketing Region</option>
                                 @foreach($marketingregions as $marketingregionslist)
                                 <option value="{{$marketingregionslist->id}}" "@if($edit_val==1) {{ $uniqueoffices->Factory1MarketingRegionID==$marketingregionslist->id ? 'selected' : '' }} @endif">{{$marketingregionslist->MarketingRegions}}</option>
                                 @endforeach
                                 </select>
                                </div>
                                
                               
                                
                             
                                
  							</div>
                            
                        </row>   
                        @endif
                          
                        @if($edit_val==1 && $uniqueoffices->Factory1ProductionRegionID!='')
                        <row class="col-md-12 production1">
                          
                            <div class="form-group clsformelements">
    							<label for="country" class="col-md-3">Production Region</label>
                                
                                <div class="col-md-3">
    							<select  id="productionregions" name="productionregions" class="form-control">
                                 <option value="">Please select Production Region</option>
                                @foreach($productionregions as $productionregionslist)
                                 <option value="{{$productionregionslist->id}}" "@if($edit_val==1) {{ $uniqueoffices->Factory1ProductionRegionID==$productionregionslist->id ? 'selected' : '' }} @endif">{{$productionregionslist->ProductionRegions}}</option>
                                 @endforeach
                                 </select>
                                </div>
                                
                               
                                
                             
                                
  							</div>
                            
                        </row>  
                            @else
                        <row class="col-md-12 production" style="display:none;">
                          
                            <div class="form-group clsformelements">
    							<label for="country" class="col-md-3">Production Region</label>
                                
                                <div class="col-md-3">
    							<select  id="productionregions" name="productionregions" class="form-control">
                                 <option value="">Please select Production Region</option>
                                @foreach($productionregions as $productionregionslist)
                                 <option value="{{$productionregionslist->id}}" "@if($edit_val==1) {{ $uniqueoffices->Factory1ProductionRegionID==$productionregionslist->id ? 'selected' : '' }} @endif">{{$productionregionslist->ProductionRegions}}</option>
                                 @endforeach
                                 </select>
                                </div>
                                
                               
                                
                             
                                
  							</div>
                            
                        </row>  
                        @endif  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="first_name" class="col-md-3">Main Contact First Name</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Main Contact First Name" value="@if($edit_val==1) {{ $uniqueoffices->Factory1MainContactFirstName }} @endif" />
                                </div>
  							</div>
                            
                        </row>    
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="last_name" class="col-md-3">Main Contact Last Name</label>
                                
                                <div class="col-md-3">
                                
                                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Main Contact Last Name" value="@if($edit_val==1) {{ $uniqueoffices->Factory1MainContactLastName }} @endif" />
                                </div>
  							</div>
                            
                        </row>  
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="phn" class="col-md-3">Phone Number</label>
                                
                                <div class="col-md-3">
    							
                            
                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="+(Country Code)(Area Code)" class="form-control" value="@if($edit_val==1) {{ $uniqueoffices->Factory1PhoneNumber }} @endif" />
                                </div>
  							</div>
                            
                        </row>  
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">E-Mail</label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="email" id="email"  class="form-control" placeholder="E-Mail" value="@if($edit_val==1) {{ $uniqueoffices->Factory1Email }} @endif" />
                                </div>
  							</div>
                            
                        </row>  
                        
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label class="col-md-3"><h3> Office / Office Address </h3></label>
  							</div>
                            
                        </row> 
                        
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="suite" class="col-md-3">Suite / Unit</label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="suite" id="suite" class="form-control" placeholder="Suite / Unit" value="@if($edit_val==1) {{ $uniqueoffices->Factory1Suite }} @endif" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="street" class="col-md-3">Street</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="street" id="street" class="form-control" placeholder="Street" value="@if($edit_val==1) {{ $uniqueoffices->Factory1Street }} @endif" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="city" class="col-md-3">City</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="city" id="city" class="form-control" placeholder="City" value="@if($edit_val==1) {{ $uniqueoffices->Factory1City }} @endif" />
                                </div>
  							</div>
                            
                        </row>   
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="counrty" class="col-md-3">Country</label>
                                
                                <div class="col-md-3">
    							<select  id="country" name="country" class="form-control" onchange="countryChange();">
                         <option value="">Please select Country</option>
                         @foreach($countries_details as $countrylist)
                         <option value="{{$countrylist->CountryID}}" "@if($edit_val==1) {{ $uniqueoffices->Factory1CountryID==$countrylist->CountryID? 'selected' : '' }} @endif" drop-data="{{ url(route('admin.selectstate', ['id' => $countrylist->CountryID])) }}">{{$countrylist->Country}}</option>
                         @endforeach
                         </select>
                                </div>
  							</div>
                            
                        </row>   
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">State / Province</label>
                                
                                <div class="col-md-3">
    							<select id="state" name="state" class="form-control">
                          <option value=""> Please Select State</option>
                          @foreach($state as $statelist)
                        <option value="{{$statelist->id}}" "@if($edit_val==1) {{ $uniqueoffices->Factory1StateID==$statelist->id? 'selected' : '' }} @endif">{{$statelist->StateName}}</option>
                        @endforeach
                        </select>
                                </div>
  							</div>
                            
                        </row>   
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3">ZIP Code</label>
                                
                                <div class="col-md-3">
                                
                                <input type="text" name="zipcode" id="zipcode"  class="form-control" placeholder="ZIP Code" value="@if($edit_val==1) {{ $uniqueoffices->Factory1ZIPcode }} @endif" />
                                </div>
  							</div>
                            
                        </row>
                                            
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3"></label>
    							
                                <div class="col-md-3">
                                 <input type="submit" name="adduniquefacility" id="adduniquefacility" value="Add"  class="clsbutton"/>
                                 </div>
  							</div>
                            
                        </row>
                        
                            
                        </form>
                    
                    </div>
                    
                </div>
            </div>
        </div>
        
                            
     
	<!-- /- wrapper content -->        
        
@endsection 