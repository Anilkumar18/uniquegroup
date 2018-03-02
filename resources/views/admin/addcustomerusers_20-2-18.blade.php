@extends('admin.layouts.customeruser')



@section('content')



<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">

<div class="col-lg-12">

<div class="col-lg-12 clsbreadcrumb">
                     <div class="col-lg-10"> > Customer Maintenance - Customer - Add New User</div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{url(route('admin.customerusers'))}}'">View List</button></div>
                    </div>

<div class="col-lg-12 clsaddnewvendorform"> <?php //echo '<pre>'; print_r($customersUsers); exit;?>

                    <form name="customeruseradd" id="customeruseradd" method="post" action="{{url(route('admin.addnewcustomerusers'))}}">

                    {{csrf_field()}}

                    <input type="hidden" name="editID" id="editID" value="@if($edit_val==1){{$customersUsers->id}}@endif" />

                    

                    

                    <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="customerName" class="col-md-3">Customer Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    				 <select name="customerName" id="customerName" class="form-control" onchange="customerChange();">

                     <option value="">Please select a Customer</option>

                     @foreach ($customers as $customers_list)

                     <option value="{{$customers_list->id}}" "@if($edit_val==1) {{$customersUsers->CustomerID == $customers_list->id ? 'selected' : ''}} @endif"  drop-data="{{url(route('admin.selectCustomerbyID', ['id' => $customers_list->id]))}}" >{{$customers_list->CustomerName}}</option>

                     @endforeach

                     </select>

                                </div>

  							</div>

                            

                        </row>

                    <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="firstName" class="col-md-3">First Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

 								<input type="text" name="firstName" id="firstName" placeholder="First Name" class="form-control" value="@if($edit_val==1){{$customersUsers->FirstName}}@endif" />                                

                                </div>

  							</div>

                            

                        </row>

                    <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="lastName" class="col-md-3">Last Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

 								<input type="text" name="lastName" id="lastName" placeholder="Last Name" class="form-control" value="@if($edit_val==1){{$customersUsers->LastName}}@endif" />                                

                                </div>

  							</div>

                            

                        </row>

                    <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="phoneNumber" class="col-md-3">Phone Number<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

 								<input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" class="form-control" value="@if($edit_val==1){{$customersUsers->PhoneNumber}}@endif" />                                
<span id="phoneerror" style="display: none;" class="mandatory_fields">Not valid phone number</span>
                                </div>

  							</div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="email" class="col-md-3">E-mail<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

 							<input type="email" name="email" id="email" placeholder="E-mail" class="form-control" value="@if($edit_val==1){{$customersUsers->Email}}@endif" />                                

                                </div>

  							</div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="userName" class="col-md-3">User Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

 							<input type="text" name="userName" id="userName" @if($edit_val==1)data="{{url(route('admin.selectuser', ['id' => $customersUsers->id]))}}" @else data="{{url(route('admin.selectuser', ['id' => 0]))}}" @endif placeholder="User Name" class="form-control" value="@if($edit_val==1){{$customersUsers->UserName}}@endif" @if($edit_val==1) readonly="readonly" @endif />                                

                                </div>

  							</div>

                            

                        </row>

                     @if($edit_val==0)

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="password" class="col-md-3">Password</label>

                                

                                <div class="col-md-3">

                    			<input type="password" name="password" id="password" placeholder="Password" class="form-control" value="Unique123" readonly="readonly" />

                                </div>

  							</div>

                            

                        </row>

                     @endif

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="userType" class="col-md-3">User Type<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                    			<select name="userType" id="userType" class="form-control">

                                <option value="">Please select a User Type</option>

                                @foreach ($userType as $type_list)

                                <option value="{{$type_list->id}}" "@if($edit_val==1) {{$customersUsers->UserTypeID == $type_list->id ? 'selected' : ''}} @endif">{{$type_list->userType}}</option>

                                @endforeach

                                </select>

                                </div>

  							</div>

                            

                        </row>

			         <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label class="col-md-3"><h3> Main Office Address </h3></label>

  							</div>

                            

                        </row>   

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="suite" class="col-md-3">Suite/Unit<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                    		<input type="text" name="suite" id="suite" placeholder="Suite/Unit" class="form-control" value="@if($edit_val==1){{$customersUsers->Suite}}@endif"/>

                                </div>

  							</div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="street" class="col-md-3">Street<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                    		<input type="text" name="street" id="street" placeholder="Street" class="form-control" value="@if($edit_val==1){{$customersUsers->Street}}@endif"/>

                                </div>

  							</div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="city" class="col-md-3">City<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                    			<input type="text" name="city" id="city" placeholder="City" class="form-control" value="@if($edit_val==1){{$customersUsers->City}}@endif"/>

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

                        <option value="{{$countrieslist->CountryID}}" "@if($edit_val==1) {{$customersUsers->CountryID==$countrieslist->CountryID ? 'selected' : ''}} @endif"   drop-data="{{url(route('admin.selectstate', ['id' => $countrieslist->CountryID]))}}">{{$countrieslist->Country}}</option>

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

                        <option value="{{$statelist->id}}" "@if($edit_val==1) {{$customersUsers->StateID == $statelist->id ? 'selected' : ''}} @endif">{{$statelist->StateName}}</option>

                        @endforeach

                        </select>

                         

                                </div>
                        </div>        

  							</div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="zipcode" class="col-md-3">Zip Code<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                                <input type="text" name="zipcode" id="zipcode" placeholder="Zip Code" class="form-control" value="@if($edit_val==1){{$customersUsers->ZIPcode}}@endif" />

                                </div>

  							</div>

                            

                        </row>

              <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="zip" class="col-md-3"></label>

    							<div class="col-md-3">

                                  <input type="submit" name="customersubmit" id="customersubmit" class="clsbutton" value="Add">

                                 </div>

  							</div>

                            

                        </row>   

                        

                     </form>

          </div>

      </div>

     </div>

  </div>

         

@endsection



