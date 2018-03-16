@extends('admin.layouts.uniquefacility')

@section('content')

<style>
.mandatory_fields {
    color: #FF0000;
	}
	input[type=radio] {
    margin: 11px 15px 5px;
    margin-top: 1px\9;
    line-height: normal;
	width:25px;
}
.customradio{
width:50px;}
.button {

  display: inline-block;

  padding: 6px 25px;

  font-size: 12px;

  cursor: pointer;

  text-align: center;

  text-decoration: none;

  outline: none;

  color: #fff;

  background-color: #00ADEF;

  border: none;

  border-radius: 5px;

 /* box-shadow: 0 9px #999;*/

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
                    	<div class="col-lg-10"> > Unique Maintanance - Facilities - Add New Facility</div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{ url(route('admin.uniquefacility'))}}'">View List</button></div>
                    </div>
                   
                
                   
                    
                    <div class="col-lg-12 clsaddnewvendorform"> <?php //echo '<pre>'; print_r($country); ?>
                    
                         <form class="addnewfacility" name="addnewfacility" id="addnewfacility" method="post" action="{{ url(route('admin.adduniquefacility'))}}" enctype="multipart/form-data">
                        	 {{ csrf_field() }}
                    
                        <input type="hidden" name="editID" id="editID" value="@if($edit_val==1) {{ $uniqueoffices->id }} @endif"/>
                        
                        <row class="col-md-12">
                                                    
                            <div class="form-group clsformelements">
    							<label for="pwdcompany_name" class="col-md-3">Office / Factory Name<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                 <input type="text" name="factoryname" id="factoryname" class="form-control" placeholder="Office / Factory Name" value="@if($edit_val==1) {{ $uniqueoffices->OfficeFactoryName }} @endif" />
                                </div>
  							</div>
                            
                        </row>  
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="pwdcompany_name" class="col-md-3">Select Regions<span class="mandatory_fields">*</span></label>                               
                   				
                                 <div class="col-md-1 customradio">
                                 <label> Marketing</label>
                                 </div>
                                 <div class="col-md-1">
                                 <input type="radio" class="regions" name="regions" id="regions" value="1" />
                                 </div>
                                 <div class="col-md-1 customradio">
                                 <label> Production</label>
                                 </div>
                                 <div class="col-md-1">
                                  <input type="radio" class="regions" name="regions" id="regions" value="2" />
                                 </div>
                                 
                          <?php /*?>  <div class="col-md-3">
                              <label> Marketing</label>
                              <input type="radio" class="regions" name="regions" id="marketingregions" value="1"/>
                                </div>
                                 <div class="col-md-3">
                              <label>Production</label> <input type="radio" class="regions" name="regions" id="productionregions" value="2"/>
                                </div><?php */?>
                               
  							</div>
                            
                        </row>  
                       
                      <row class="col-md-12" id="rigionsshow">
                          
                            <div class="form-group clsformelements" >
    						
                                <label for="pwdcompany_name" class="col-md-3">&nbsp;</label>
                                <div class="col-md-3">
                                <div id="ddregions1">
                              <select  id="marketingregions" name="marketingregions" class="form-control regions-group">
                                 <option value="">Please select Marketing Region</option>
                                 @foreach($marketingregions as $marketingregionslist)
                                 <option value="{{$marketingregionslist->id}}" "@if($edit_val==1) {{ $uniqueoffices->MarketingRegionID==$marketingregionslist->id ? 'selected' : '' }} @endif">{{$marketingregionslist->MarketingRegions}}</option>
                                 @endforeach
                                 </select>
                               </div>
                               <div id="ddregions2">
                              <select  id="productionregions" name="productionregions" class="form-control regions-group">
                                 <option value="">Please select Production Region</option>
                                @foreach($productionregions as $productionregionslist)
                                 <option value="{{$productionregionslist->id}}" "@if($edit_val==1) {{ $uniqueoffices->ProductionRegionID==$productionregionslist->id ? 'selected' : '' }} @endif">{{$productionregionslist->ProductionRegions}}</option>
                                 @endforeach
                                 </select>
                                 </div>
                                </div>
  							             </div>
                            
                        </row>  
                            
                      
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="first_name" class="col-md-3">Main Contact First Name<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Main Contact First Name" value="@if($edit_val==1) {{ $uniqueoffices->MainContactFirstName }} @endif" />
                                </div>
  							</div>
                            
                        </row>    
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="last_name" class="col-md-3">Main Contact Last Name<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Main Contact Last Name" value="@if($edit_val==1) {{ $uniqueoffices->MainContactLastName }} @endif" />
                                </div>
  							</div>
                            
                        </row>  
                        
                      <row class="col-md-12">

                            <div class="form-group clsformelements">

    							<label for="phoneNumber" class="col-md-3">Phone Number <span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" class="form-control" value="@if($edit_val==1){{$uniqueoffices->PhoneNumber}}@endif">

                   <span id="phoneerror" style="display: none;" class="mandatory_fields">Not valid phone number</span>

                                </div>

  							</div>

                            

                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">E-Mail<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="email" id="email"  class="form-control" placeholder="E-Mail" value="@if($edit_val==1){{ $uniqueoffices->Email }}@endif" />
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
                                
                                  <input type="text" name="suite" id="suite" class="form-control" placeholder="Suite / Unit" value="@if($edit_val==1) {{ $uniqueoffices->Suite }} @endif" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="street" class="col-md-3">Street<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="street" id="street" class="form-control" placeholder="Street" value="@if($edit_val==1) {{ $uniqueoffices->Street }} @endif" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="city" class="col-md-3">City<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="city" id="city" class="form-control" placeholder="City" value="@if($edit_val==1) {{ $uniqueoffices->City }} @endif" />
                                </div>
  							</div>
                            
                        </row>   
                        
                          <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="country" class="col-md-3">Country<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    					<select id="country" name="country" class="form-control" onchange="countryChange();">

                        <option value=""> Please Select Country</option>

                        @foreach($countries_details as $countrieslist)

                        <option value="{{$countrieslist->CountryID}}" "@if($edit_val==1) {{ $uniqueoffices->CountryID==$countrieslist->CountryID ? 'selected' : '' }} @endif"   drop-data="{{ url(route('admin.selectstate', ['id' => $countrieslist->CountryID])) }}">{{$countrieslist->Country}}</option>

                        @endforeach

                        </select>

                                </div>

                                

  							</div>

                            

                        </row>  
                        
                         <row class="col-md-12">

                          

                          <div class="form-group clsformelements">

    						<label for="state" class="col-md-3">State <span class="mandatory_fields">*</span></label>

                                <div class="statedisplay">

                              <div class="col-md-3">

    					<select id="state" name="state" class="form-control">

                          <option value=""> Please Select State</option>

                          @foreach($state as $statelist)

                        <option value="{{$statelist->id}}" "@if($edit_val==1) {{ $uniqueoffices->StateID == $statelist->id ? 'selected' : '' }} @endif">{{$statelist->StateName}}</option>

                        @endforeach

                        </select>

                         

                                </div>
                        </div>        

  							</div>

                            

                        </row>
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3">ZIP Code<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                <input type="text" name="zipcode" id="zipcode"  class="form-control" maxlength="7" placeholder="ZIP Code" value="@if($edit_val==1) {{ $uniqueoffices->ZIPcode }} @endif" />
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