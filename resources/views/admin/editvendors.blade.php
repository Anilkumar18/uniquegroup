@extends('admin.layouts.vendors')

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
                    	<p> > Vendor Maintanance - Vendors - Add New Vendor </p>
                    </div>
                    
                    <div class="col-lg-12 clsaddnewvendorform">
                    
                         <form class="addvendor" name="vendorsadd" id="vendorsadd" method="post" action="{{ url(route('admin.addvendors'))}}" enctype="multipart/form-data">
                        	 {{ csrf_field() }}
                             
                             <input type="hidden" name="editID" id="editID" value="{{ $vendors->id}}"  />
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="cust_name" class="col-md-3">Customer Name</label>
                                
                                <div class="col-md-3">
    							<select  id="customername" name="customername" class="form-control">
                                 <option id="0">Please select</option>
                                 @foreach($customers as $customernamelist)
                                 <option value="{{$customernamelist->id}}" @if($vendors->CustomerID==$customernamelist->id)selected="selected" @endif>{{$customernamelist->CustomerName}}</option>
                        
                                 @endforeach
                                 </select>
                                </div>
  							</div>
                            
                        </row>    
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="pwdcompany_name" class="col-md-3">Company Name</label>
                                
                                <div class="col-md-3">
                                 <input type="text" name="companyname" id="companyname" class="form-control" value="{{$vendors->CompanyName}}">
                                </div>
  							</div>
                            
                        </row>    
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="country" class="col-md-3">Country of Operation</label>
                                
                                <div class="col-md-3 addr_countryfield">
    							<select  id="countryofoperations" name="countryofoperations" class="form-control">
                                 <option id="">Please select</option>
                                 @foreach($countryofoperations as $countrylist)
                                 <option value="{{ $countrylist->id }}" @if($vendors->Countryofoperation1==$countrylist->id)selected="selected" @endif>{{$countrylist->Country}}</option>
                                 @endforeach
                                 </select>
                                </div>
                                
                               
                                
                                <!-- <button class="col-md-3 btn btn-info clsbutton"> Add Country of Operation </button>-->
                                 <div class="col-md-3">
                                  <input type="button" name="addcountryofoperations" id="addcountryofoperations" value="Add Country of Operation" class="clsbutton"/>
                                 </div>
                                
  							</div>
                            
                        </row>    
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="first_name" class="col-md-3">Main Contact First Name</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="firstName" id="firstName" class="form-control" value="{{$vendors->MainContactFirstName}}" />
                                </div>
  							</div>
                            
                        </row>    
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="last_name" class="col-md-3">Main Contact Last Name</label>
                                
                                <div class="col-md-3">
                                
                                <input type="text" name="lastName" id="lastName" class="form-control"  value="{{$vendors->MainContactLastName}}"/>
                                </div>
  							</div>
                            
                        </row>  
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="phn" class="col-md-3">Phone Number</label>
                                
                                <div class="col-md-3">
    							
                            
                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="+(Country Code)(Area Code)" class="form-control" value="{{$vendors->PhoneNumber}}">
                                </div>
  							</div>
                            
                        </row>  
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">E-Mail</label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="email" id="email"  class="form-control" value="{{$vendors->Email}}">
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
    							<label for="office" class="col-md-3">Office / Factory Name</label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="factoryname" id="factoryname" class="form-control" value="{{$vendors->FactoryName}}"/>
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="suite" class="col-md-3">Suite / Unit</label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="suite" id="suite" class="form-control" value="{{$vendors->Suite}}" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="street" class="col-md-3">Street</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="street" id="street" class="form-control" value="{{$vendors->Street}}" />
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="city" class="col-md-3">City</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="city" id="city" class="form-control"  value="{{$vendors->City}}"/>
                                </div>
  							</div>
                            
                        </row>   
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="counrty" class="col-md-3">Country</label>
                                
                                <div class="col-md-3">
    							<select  id="country" name="country" class="form-control">
                         <option value="0">Please select</option>
                          @foreach($countryofoperations as $countrylist)
                                 <option value="{{ $countrylist->id }}" @if($vendors->CountryID==$countrylist->id)selected="selected" @endif>{{$countrylist->Country}}</option>
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
                                <input type="text" name="state" id="state" class="form-control"  value="{{$vendors->State}}" />
                                </div>
  							</div>
                            
                        </row>   
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3">ZIP Code</label>
                                
                                <div class="col-md-3">
                                
                                <input type="text" name="zipcode" id="zipcode"  class="form-control"  value="{{$vendors->ZIPcode}}"/>
                                </div>
  							</div>
                            
                        </row>
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3"></label>
    							<!--<button class="col-md-3 btn btn-info clsbutton" name="addfactory" id="addfactory"> Add Factory Address </button>-->
                                <div class="col-md-3">
                               <input type="button" name="addfactory" id="addfactory" value="Add Factory Address" class="clsbutton"/>
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
    							<label for="state" class="col-md-3">Invoice Address</label>
                                
                                <div class="col-md-3 addr_field">
    							<select id="invoice_address" name="invoice_address" class="form-control">
                                  <option value=""> Please Select</option>
                                  @foreach($officeaddress as $invoiceaddress)
                                  <option value="{{$invoiceaddress->id}}" @if($vendors->InvoiceAddress==$invoiceaddress->id)selected="selected" @endif>{{$invoiceaddress->Factory1OfficeFactoryName}}</option>
                                  @endforeach
                                </select>
                                </div>
                                <div class="col-md-3">
                                <!--<button class="col-md-3 btn btn-info clsbutton"> Add Invoice Address </button>-->
                                  <input type="button" name="addinvoiceaddress" id="addinvoiceaddress" value="Add Invoice Address" class="clsbutton"/>
                                  </div>
  							</div>
                            
                        </row>  
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Delivery Address</label>
                                
                                <div class="col-md-3 addr_field1">
    							<select id="delivery_address" name="delivery_address" class="form-control">
                                  <option value=""> Please Select</option>
                                   @foreach($officeaddress as $deliveryaddress)
                                  <option value="{{$deliveryaddress->id}}" @if($vendors->DeliveryAddress==$deliveryaddress->id)selected="selected" @endif>{{$deliveryaddress->Factory1OfficeFactoryName}}</option>
                                  @endforeach
                                </select>
                                </div>
                                
                                <!--<button class="col-md-3 btn btn-info clsbutton"> Add Delivery Address </button>-->
                                 <div class="col-md-3">
                                <input type="button" name="adddeliveryaddress" id="adddeliveryaddress" value="Add Delivery Address" class="clsbutton"/>
                                
                                </div>
  							</div>
                            
                        </row>  
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="state" class="col-md-3">Delivery Method / Courier Company </label>
                                
                                <div class="col-md-3">
    							<select id="deliverymethod" name="deliverymethod" class="form-control">
                                  <option value=""> Please Select</option>
                                  @foreach($deliverymethod as $deliverylist)
                                  
                                  <option value="{{$deliverylist->id}}" @if($vendors->CourierCompanyID==$deliverylist->id)selected="selected" @endif>{{$deliverylist->MethodName}}</option>
                                  
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
                                                  <option>Please select</option>
                                                  <option value="1">Canada</option>
                                                  </select>
                                                </div>
                                                </div>
                                          </div>
                                          
                                          
                                          <div class="col-sm-6">
                                          	<div class="form-group">
                                                <label class="col-lg-6 control-label font-noraml text-left">Marketing regions:</label>
                                                <div class="col-lg-6">
                                              <select id="marketing_regions1" name="marketing_regions1">
                                              <option>Please select</option>
                                              <option value="1">Canada</option>
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
                                           <option value="0">Please select</option>
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
                               <input type="hidden" name="season_url" id="season_url" value="{{ url(route('admin.addoffice')) }}" />
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                                <button type="button" class="btn savebtn" name="officesubmit" id="officesubmit" data-dismiss="modal">Save</button>
                               </div>
                               </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
     <div class="modal inmodal" id="countryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="chain_bg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title title_bar">Country of Operation Maintenance</h4>
                    <p>Just fill in your Country name and we'll help you..</p>
                </div>
               
              <form name="countryofoperationadd" id="countryofoperationadd"  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="modal-body">
                      
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Country of Operation</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="addcountryofoperation" id="addcountryofoperation" placeholder="Country" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>                       
                        
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" name="site_url" id="site_url" value="{{ url(route('admin.addcountry')) }}" />
                        <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
                          <button type="button" class="btn savebtn" name="countryofoperationssubmit" id="countryofoperationssubmit" data-dismiss="modal">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
	<!-- /- wrapper content -->        
        
@endsection 