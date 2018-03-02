@extends('admin.layouts.vendors')

@section('content')
        
     <!-- wrapper content -->   

        
        <div class="wrapper wrapper-content animated fadeInRight">
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12 clsbreadcrumb">
                     <div class="col-lg-10"> > Vendor Maintanance - Vendors - Add New Vendor</div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{url(route('admin.vendors'))}}'">View List</button></div>
                    </div>
                    
                    <div class="col-lg-12 clsaddnewvendorform"> 
                    
                         <form class="addvendor" name="vendorsadd" id="vendorsadd" method="post" action="{{url(route('admin.addvendors'))}}" enctype="multipart/form-data">
                          <input type="hidden" name="editID" id="editID" value="@if($edit_val==1){{$vendors->id}}@endif"  />
                        	 {{ csrf_field() }}
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="cust_name" class="col-md-3">Customer Name<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							<select  id="customername" name="customername" class="form-control">
                               <option value="">Please Select Customer</option>
                                 @foreach($customerlist as $customernamelist)
                                 <option value="{{$customernamelist->id}}" "@if($edit_val==1) {{ $vendors->CustomerID==$customernamelist->id ? 'selected' : '' }} @endif">{{$customernamelist->CustomerName}}</option>
                                 @endforeach
                                 </select>
                                 </select>
                                </div>
  							</div>
                            
                        </row>    
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="companyname" class="col-md-3">Company Name<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                 <input type="text" name="companyname" id="companyname" class="form-control" placeholder="Company Name" value="@if($edit_val==1){{$vendors->CompanyName}}@endif" />
                                </div>
  							</div>
                            
                        </row> 
@if($edit_val==0)                           
    <div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">

                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="countryofoperations1" class="col-md-3 countryLabel">Country of Operation<span class="mandatory_fields">*</span></label>
                                <div class="col-md-3">
    							<select  id="countryofoperations1" name="countryofoperations1" class="form-control">
                                 <option value="">Please Select Country</option>
                                 @foreach($countryofoperations as $countrylist)
                                 <option value="{{$countrylist->id }}" "@if($edit_val==1) {{ $vendors->Countryofoperation1==$countrylist->id ? 'selected' : '' }} @endif">{{$countrylist->Country}}</option>
                                 @endforeach
                                 </select>
                                </div>
                                
                               
                                
                                
                                 <div class="col-md-3">
                                  <button type="button" class="clsbutton opbtn" name="addButton" id="addButton" data="{{url(route('admin.listcountry'))}}"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                                  <button type="button" class="clsbutton opbtn" name="removeButton" id="removeButton"><i class="fa fa-times" aria-hidden="true"></i> Remove</button>
                                 </div>
                                
                                
  							</div>
                            
                        </row>    
</div>
</div>                    
@endif
@if($edit_val==1)                           
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="countryofoperations" class="col-md-3 countryLabel">Country of Operation<span class="mandatory_fields">*</span></label>
                                <div class="col-md-3">
    							<select  id="countryofoperations" name="countryofoperations" class="form-control">
                                 <option value="">Please Select Country</option>
                                 @foreach($countryofoperations as $countrylist)
                                 <option value="{{$countrylist->id }}" "@if($edit_val==1) {{ $vendors->Countryofoperation==$countrylist->id ? 'selected' : '' }} @endif">{{$countrylist->Country}}</option>
                                 @endforeach
                                 </select>
                                </div>
  							</div>
                            
                        </row>    
@endif
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="first_name" class="col-md-3">Main Contact First Name<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Main Contact First Name" value="@if($edit_val==1){{$vendors->MainContactFirstName}}@endif" />
                                </div>
  							</div>
                            
                        </row>    
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="last_name" class="col-md-3">Main Contact Last Name<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Main Contact Last Name" value="@if($edit_val==1){{$vendors->MainContactLastName}}@endif" />
                                </div>
  							</div>
                            
                        </row>  
                        
                      <row class="col-md-12">

                            <div class="form-group clsformelements">

    							<label for="phoneNumber" class="col-md-3">Phone Number <span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" class="form-control" value="@if($edit_val==1){{$vendors->PhoneNumber}}@endif">

                   <span id="phoneerror" style="display: none;" class="mandatory_fields">Not valid phone number</span>

                                </div>

  							</div>

                            

                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">E-Mail<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                  <input type="email" name="email" id="email"  class="form-control" placeholder="E-Mail" value="@if($edit_val==1){{$vendors->Email}}@endif" />
                                </div>
  							</div>
                            
                        </row>  
                        
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label class="col-md-3"><h3> Main Office / Office Address </h3></label>
  							</div>
                            
                        </row> 
                        
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="office" class="col-md-3">Office / Factory Name<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="factoryname" id="factoryname" class="form-control" placeholder="Office / Factory Name" value="@if($edit_val==1){{$vendors->FactoryName}}@endif" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="suite" class="col-md-3">Suite / Unit<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="suite" id="suite" class="form-control" placeholder="Suite / Unit" value="@if($edit_val==1){{$vendors->Suite}}@endif" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="street" class="col-md-3">Street<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="street" id="street" class="form-control" placeholder="Street" value="@if($edit_val==1){{$vendors->Street}}@endif" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="city" class="col-md-3">City<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="city" id="city" class="form-control" placeholder="City" value="@if($edit_val==1){{$vendors->City}}@endif" />
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

                        <option value="{{$countrieslist->CountryID}}" "@if($edit_val==1) {{ $vendors->CountryID==$countrieslist->CountryID ? 'selected' : '' }} @endif"   drop-data="{{ url(route('admin.selectstate', ['id' => $countrieslist->CountryID])) }}">{{$countrieslist->Country}}</option>

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

                        <option value="{{$statelist->id}}" "@if($edit_val==1) {{ $vendors->StateID == $statelist->id ? 'selected' : '' }} @endif">{{$statelist->StateName}}</option>

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
                                
                                <input type="text" name="zipcode" id="zipcode"  class="form-control" placeholder="ZIP Code" value="@if($edit_val==1){{$vendors->ZIPcode}}@endif" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3"></label>
    							<!--<button class="col-md-3 btn btn-info clsbutton" name="addfactory" id="addfactory"> Add Factory Address </button>-->
                                <div class="col-md-3">
                               <input type="button" name="addfactory" id="addfactory" value="Add Factory" class="clsbutton"/>
                               </div>
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3"></label>
    							<!--<button class="col-md-3 btn btn-info clsbutton" name="addfactory" id="addfactory"> Add Factory Address </button>-->
                                <div class="col-md-3">
                             
                               </div>
  							</div>
                            
                        </row>  
                          <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Factory1<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3 addr_field1">
    							<select id="factory1" name="factory1" class="form-control">
                                  <option value=""> Please Select Factory1</option>
                                   @foreach($officeAddress as $officelist)
                                   <option value="{{$officelist->id}}" "@if($edit_val==1) {{ $vendors->Factory1ID==$officelist->id ? 'selected' : '' }} @endif">{{$officelist->factoryName}}</option>
                                   @endforeach
                                </select>
                                </div>
                                <div class="col-md-3">
                                <!--  <input type="button" name="addinvoiceaddress" id="addinvoiceaddress" value="Add Invoice Address" class="clsbutton"/>-->
                                  </div>
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Factory2</label>
                                
                                <div class="col-md-3 addr_field2">
    							<select id="factory2" name="factory2" class="form-control">
                                  <option value=""> Please Select Factory2</option>
                                   @foreach($officeAddress as $officelist)
                                   <option value="{{$officelist->id}}" "@if($edit_val==1) {{ $vendors->Factory2ID==$officelist->id ? 'selected' : '' }} @endif">{{$officelist->factoryName}}</option>
                                   @endforeach
                                </select>
                                </div>
                                <div class="col-md-3">
                                <!--  <input type="button" name="addinvoiceaddress" id="addinvoiceaddress" value="Add Invoice Address" class="clsbutton"/>-->
                                  </div>
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Invoice Address<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3 addr_field3">
    							<select id="invoice_address" name="invoice_address" class="form-control">
                                  <option value=""> Please Select Invoice Address</option>
                                   @foreach($officeAddress as $officelist)
                                   <option value="{{$officelist->id}}" "@if($edit_val==1) {{ $vendors->InvoiceID==$officelist->id ? 'selected' : '' }} @endif">{{$officelist->factoryName}}</option>
                                   @endforeach
                                </select>
                                </div>
                                <div class="col-md-3">
                                <!--  <input type="button" name="addinvoiceaddress" id="addinvoiceaddress" value="Add Invoice Address" class="clsbutton"/>-->
                                  </div>
  							</div>
                            
                        </row>  
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Delivery Address<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3 addr_field4">
    							<select id="delivery_address" name="delivery_address" class="form-control">
                                  <option value=""> Please Select Delivery Address</option>
                                   @foreach($officeAddress as $officelist)
                                   <option value="{{$officelist->id}}" "@if($edit_val==1) {{ $vendors->DeliveryID==$officelist->id ? 'selected' : '' }} @endif">{{$officelist->factoryName}}</option>
                                  @endforeach
                                </select>
                                </div>
                                
                                 <div class="col-md-3">
                              <!--  <input type="button" name="adddeliveryaddress" id="adddeliveryaddress" value="Add Delivery Address" class="clsbutton"/>-->
                                
                                </div>
  							</div>
                            
                        </row>  
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Delivery Method / Courier Company<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							<select id="deliverymethod" name="deliverymethod" class="form-control">
                                  <option value=""> Please Select</option>
                                  @foreach($deliverymethod as $deliverylist)
                                  <option value="{{$deliverylist->id}}" "@if($edit_val==1) {{ $vendors->CourierCompanyID==$deliverylist->id ? 'selected' : '' }} @endif">{{$deliverylist->MethodName}}</option>
                                  @endforeach
                                </select>
                                </div>
  							</div>
                            
                        </row>  
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3"></label>
    							<!--<button class="col-md-3 btn btn-info clsbutton" name="addvendors" id="addvendors"> Add </button>-->
                                <div class="col-md-3">
                                 <input type="submit" name="addvendors" id="addvendors" value="Add"  class="clsbutton"/>
                                 </div>
  							</div>
                            
                        </row>
                        
                            
                        </form>
                    
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content animated bounceInRight">
                                
                                		<div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Add Office / Factory</h4>
                                           <p>Just fill in your office / factory address and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                   <form name="officeadd" id="officeadd" method="post" class="form-horizontal">    
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                        
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          <div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-5 control-label font-noraml text-left">Factory Name<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                                <input type="text" name="OFfactoryName" id="OFfactoryName" class="form-control" data="{{url(route('admin.selectfactory'))}}" placeholder="Factory Name" />
                                               
                                                </div>
                                                </div>
                                          </div>
                                          
                                          
                                           <div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-5 control-label font-noraml text-left">Production Region<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                               <select id="OFproductionRegion" name="OFproductionRegion">
                                                  <option value="">Please select Region</option>
                                                 @foreach($productionregions as $regionslist)
                                                 <option value="{{$regionslist->id}}">{{$regionslist->ProductionRegions}}</option>
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
                                                <label class="col-lg-5 control-label font-noraml text-left">Contact First Name<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                              <input type="text" name="OFfirstName" id="OFfirstName" class="form-control" placeholder="Contact First Name" />
                                               
                                                </div>
                                                </div>
                                           </div>    
                                           
                                            <div class="col-sm-6">
                                            	<div class="form-group">
                                                <label class="col-lg-5 control-label font-noraml text-left">Contact Last Name<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                              <input type="text" name="OFlastName" id="OFlastName" class="form-control" placeholder="Contact Last Name" />
                                               
                                                </div>
                                                </div>
                                            </div>
                                       </div>
                                       </div>
                                       
                                       
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          <div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-5 control-label font-noraml text-left">Phone Number<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                              <input type="text" name="OFphno" id="OFphno" class="form-control" placeholder="Phone Number" />
                                                <span id="OFphoneerror" style="display: none;" class="mandatory_fields">Not valid phone number</span>
                                                </div>
                                                </div>
                                          </div>
                                          
                                          <div class="col-sm-6">
                                          	<div class="form-group">
                                                <label class="col-lg-5 control-label font-noraml text-left">E-mail<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                              <input type="text" name="OFemail" id="OFemail" class="form-control" placeholder="E-mail" />
                                               
                                                </div>
                                                </div>
                                          </div>
                                                
                                       </div>
                                       </div>
                                       
                                       <div class="row">
                                       <div class="col-sm-12">
                                       <div class="form-group">
    								   <label class="col-md-3 text-left"><h3> Factory Address </h3></label>
  									   </div>
                                                
                                       </div>
                                       </div>
                                       
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          	<div class="col-sm-6">
                                                <div class="form-group">
                                                <label class="col-lg-5 control-label font-noraml text-left">Suite / Unit<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                              <input type="text" name="OFsuite" id="OFsuite" class="form-control" placeholder="Suite / Unit" />
                                               
                                                </div>
                                                </div>
                                       		</div>
                                            
                                            <div class="col-sm-6">
                                            	<div class="form-group">
                                                <label class="col-lg-5 control-label font-noraml text-left">Street<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                              <input type="text" name="OFstreet" id="OFstreet" class="form-control" placeholder="Street" />
                                               
                                                </div>
                                                </div>
                                            </div>
                                            
                                       </div>
                                       </div>
                                       
                                       <div class="row">
                                          <div class="col-sm-12">
                                          
                                          	<div class="col-sm-6">                                          
                                                <div class="form-group">
                                                <label class="col-lg-5 control-label font-noraml text-left">City<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                              <input type="text" name="OFcity" id="OFcity" class="form-control" placeholder="City" />
                                               
                                                </div>
                                                </div>
                                       		</div>
                                            
                                            <div class="col-sm-6">
                                            	<div class="form-group">
                                                <label class="col-lg-5 control-label font-noraml text-left">Country<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                           <select name="OFcountry" id="OFcountry" class="form-control" onchange="OFcountryChange();" >
                                           <option value="">Please select Country</option>
                                           @foreach($countries_details as $countrylist)
                                           <option value="{{$countrylist->CountryID}}" drop-data="{{ url(route('admin.selectstate', ['id' => $countrylist->CountryID])) }}">{{$countrylist->Country}}</option>
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
                                                <label class="col-lg-5 control-label font-noraml text-left">State / Province<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                          <div class="OFstatedisplay">
                                          <select id="OFstate" name="OFstate" class="form-control">
                         				  <option value=""> Please Select State</option>
                          				  @foreach($state as $statelist)
                        				  <option value="{{$statelist->id}}">{{$statelist->StateName}}</option>
                        				  @endforeach
                        				  </select>
                                          </div>
                                                </div>
                                                </div>
                                       		</div>
                                            
                                            
                                            
                                            <div class="col-sm-6">
                                            	<div class="form-group">
                                                <label class="col-lg-5 control-label font-noraml text-left">ZIP Code<span class="mandatory_fields">*</span></label>
                                                <div class="col-lg-7">
                                           
                                                  <input type="text" name="OFzipcode" id="OFzipcode" class="form-control" placeholder="ZIP Code" />
                                                </div>
                                                </div>
                                            </div>
                                                     
                                       </div>
                                       </div>
                                   
                              
                               </div>
                               <input id="officeURL" name="officeURL" type="hidden" value="{{url(route('admin.addoffice'))}}"/>
                               <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
                               <button type="button" class="btn savebtn" name="officesubmit" id="officesubmit"  data-dismiss="modal">Save</button>
                       		 <!--  <input type="submit" name="officesubmit" id="officesubmit" class="btn savebtn" value="Save">-->
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
     
        
@endsection 