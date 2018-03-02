@extends('admin.layouts.uniquefacility')

@section('content')
<style>
.modal-align
{
width:1000px;
}
</style>
        
     <!-- wrapper content -->   
        
        
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!--<div class="col-lg-12 clsheaderbanner">
                    	<img src="img/banner001.png" />
                    </div>-->
                    
                    <div class="col-lg-12 clsbreadcrumb">
                    	<p> > Unique Maintanance - Facilities - Update New Facility </p>
                    </div>
                    
                    <div class="col-lg-12 clsaddnewvendorform">
                    
                         <form class="addvendor" name="vendorsadd" id="vendorsadd" method="post" action="{{ url(route('admin.adduniquefacility'))}}" enctype="multipart/form-data">
                        	 {{ csrf_field() }}
                    
                         <input type="hidden" name="editID" id="editID" value="{{ $uniqueoffices->id}}"  />
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="pwdcompany_name" class="col-md-3">Office/Factory Name</label>
                                
                                <div class="col-md-3">
                                 <input type="text" name="factoryname" id="factoryname" class="form-control" value="{{$uniqueoffices->Factory1OfficeFactoryName}}">
                                </div>
  							</div>
                            
                        </row>    
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="country" class="col-md-3">Marketing Region</label>
                                
                                <div class="col-md-3">
    							<select  id="marketingregions" name="marketingregions" class="form-control">
                                 <option value="">Please select</option>
                                 @foreach($marketingregions as $marketingregionslist)
                                 <option value="{{$marketingregionslist->id}}"  @if($uniqueoffices->Factory1MarketingRegionID==$marketingregionslist->id)selected="selected" @endif>{{$marketingregionslist->MarketingRegions}}</option>
                                 @endforeach
                                 </select>
                                </div>
                                
                               
                                
                             
                                
  							</div>
                            
                        </row>    
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="country" class="col-md-3">Production Region</label>
                                
                                <div class="col-md-3">
    							<select  id="productionregions" name="productionregions" class="form-control">
                                 <option value="">Please select</option>
                                @foreach($productionregions as $productionregionslist)
                                 <option value="{{$productionregionslist->id}}"  @if($uniqueoffices->Factory1ProductionRegionID==$productionregionslist->id)selected="selected" @endif>{{$productionregionslist->ProductionRegions}}</option>
                                 @endforeach
                                 </select>
                                </div>
                                
                               
                                
                             
                                
  							</div>
                            
                        </row>    
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="first_name" class="col-md-3">Main Contact First Name</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="firstName" id="firstName" class="form-control" value="{{$uniqueoffices->Factory1MainContactFirstName}}" />
                                </div>
  							</div>
                            
                        </row>    
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="last_name" class="col-md-3">Main Contact Last Name</label>
                                
                                <div class="col-md-3">
                                
                                <input type="text" name="lastName" id="lastName" class="form-control" value="{{$uniqueoffices->Factory1MainContactLastName}}" />
                                </div>
  							</div>
                            
                        </row>  
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="phn" class="col-md-3">Phone Number</label>
                                
                                <div class="col-md-3">
    							
                            
                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="+(Country Code)(Area Code)" class="form-control" value="{{$uniqueoffices->Factory1PhoneNumber}}" >
                                </div>
  							</div>
                            
                        </row>  
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">E-Mail</label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="email" id="email"  class="form-control" value="{{$uniqueoffices->Factory1Email}}">
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
                                
                                  <input type="text" name="suite" id="suite" class="form-control" value="{{$uniqueoffices->Factory1Suite}}" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="street" class="col-md-3">Street</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="street" id="street" class="form-control" value="{{$uniqueoffices->Factory1Street}}"  />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="city" class="col-md-3">City</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="city" id="city" class="form-control"  value="{{$uniqueoffices->Factory1City}}" />
                                </div>
  							</div>
                            
                        </row>   
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="counrty" class="col-md-3">Country</label>
                                
                                <div class="col-md-3">
    							<select  id="country" name="country" class="form-control">
                         <option value="">Please select</option>
                         @foreach($countryofoperations as $countrylist)
                         <option value="{{$countrylist->id}}" @if($uniqueoffices->Factory1CountryID==$countrylist->id)selected="selected" @endif>{{$countrylist->Country}}</option>
                         @endforeach
                         </select>
                                </div>
  							</div>
                            
                        </row>   
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">State / Province</label>
                                
                                <div class="col-md-3">
    							<!--<select id="state" name="state" class="form-control" >
                                <option value=""> Please Select</option>
                                </select>-->
                                <input type="text" name="state" id="state" class="form-control"   value="{{$uniqueoffices->Factory1StateID}}"/>
                                </div>
  							</div>
                            
                        </row>   
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3">ZIP Code</label>
                                
                                <div class="col-md-3">
                                
                                <input type="text" name="zipcode" id="zipcode"  class="form-control" value="{{$uniqueoffices->Factory1ZIPcode}}"/>
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