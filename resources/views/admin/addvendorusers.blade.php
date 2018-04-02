@extends('admin.layouts.vendorusers')



@section('content')



<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">

 <div class="col-lg-12">
                    <div class="col-lg-12 clsbreadcrumb">
                     <div class="col-lg-10"> > Vendor Maintenance - Vendor - Add New User</div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{url(route('admin.vendorusers'))}}'">View List</button></div>
                    </div>

<div class="col-lg-12 clsaddnewvendorform">

                    <form name="vendoruseradd" id="vendoruseradd" method="post" action="{{url(route('admin.addnewvendorusers'))}}">

                    {{ csrf_field() }}

                    <input type="hidden" name="editID" id="editID" value="@if($edit_val==1){{$vendorUsers->id}}@endif" />

                    

                    <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="customerName" class="col-md-3">Customer Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    				 <select name="customerName" id="customerName" class="form-control" onchange="customerChange();">

                     <option value="">Please select a Customer</option>

                     @foreach ($customers as $customers_list)

                     <option value="{{ $customers_list->id}}" "@if($edit_val==1) {{$vendorUsers->CustomerID == $customers_list->id ? 'selected' : ''}} @endif" drop-data="{{ url(route('admin.selectvendors', ['id' => $customers_list->id])) }}">{{$customers_list->CustomerName}}</option>

                     @endforeach

                     </select>

                                </div>

  							</div>

                            

                        </row>
          <!-- Defect: new users.pdf
         Name: Bala-php Team
         change customer name depends upon change vendor and factory names as alphabetic order-->

                    <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="companyName" class="col-md-3">Vendor Name<span class="mandatory_fields">*</span></label>
<span class="spandiv" style="display:none"><?php echo url(route('admin.selectfactory')); ?></span>
                                <div class="vendordisplay">

                                <div class="col-md-3">

    				 <select name="companyName" id="companyName" class="form-control" >

                     <option value="">Please select a Vendor</option>

                     @foreach ($vendors as $vendors_list)

                     <option value="{{ $vendors_list->id}}" "@if($edit_val==1) {{ $vendorUsers->CompanyID == $vendors_list->id ? 'selected' : '' }} @endif">{{$vendors_list->CompanyName}}</option>

                     @endforeach

                     </select>

                                </div>
                                
                                </div>

  							</div>

                            

                        </row>

<row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="factoryName" class="col-md-3">Factory Name<span class="mandatory_fields">*</span></label>

                                <div class="factorydisplay">

                                <div class="col-md-3">

    				 <select name="factoryName" id="factoryName" class="form-control">

                     <option value="">Please select a Factory</option>

                     @foreach ($factory as $factory_list)

                     <option value="{{ $factory_list->id}}" "@if($edit_val==1) {{ $vendorUsers->FactoryID == $factory_list->id ? 'selected' : '' }} @endif">{{$factory_list->factoryName}}</option>

                     @endforeach

                     </select>

                                </div>
                                
                                </div>

  							</div>

                            

                        </row>       
                         <!-- Defect: new users.pdf
                         Name: Bala-php Team
                       end here-->             

                     <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="firstName" class="col-md-3">First Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

 								<input type="text" name="firstName" id="firstName" placeholder="First Name" class="form-control" value="@if($edit_val==1){{$vendorUsers->firstName}}@endif" />                                

                                </div>

  							</div>

                            

                        </row>

                    <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="lastName" class="col-md-3">Last Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

 								<input type="text" name="lastName" id="lastName" placeholder="Last Name" class="form-control" value="@if($edit_val==1){{$vendorUsers->lastName}}@endif" />                                

                                </div>

  							</div>

                            

                        </row>

                  <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="phoneNumber" class="col-md-3">Phone Number <span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    							 <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" class="form-control" value="@if($edit_val==1){{$vendorUsers->phoneNumber}}@endif" />

                   <span id="phoneerror" style="display: none;">Not valid phone number</span>

                                </div>

  							</div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="email" class="col-md-3">E-mail<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

 							<input type="email" name="email" id="email" placeholder="E-mail" class="form-control" value="@if($edit_val==1){{$vendorUsers->Email}}@endif" />                                

                                </div>

  							</div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="userName" class="col-md-3">User Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

 							<input type="text" name="userName" id="userName" @if($edit_val==1)data="{{url(route('admin.selectuser', ['id' => $vendorUsers->id]))}}" @else data="{{url(route('admin.selectuser', ['id' => 0]))}}" @endif placeholder="User Name" class="form-control" value="@if($edit_val==1){{$vendorUsers->userName}}@endif" @if($edit_val==1) readonly="readonly" @endif>                                

                                </div>

  							</div>

                            

                        </row>

                     @if($edit_val==0)

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="password" class="col-md-3">Password</label>

                                

                                <div class="col-md-3">

                    			<input type="password" name="password" id="password" placeholder="Password" class="form-control" value="Unique123" readonly="readonly">

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

                                <option value="{{$type_list->id}}" "@if($edit_val==1) {{$vendorUsers->UsertypeID == $type_list->id ? 'selected' : ''}} @endif">@if($type_list->id!='18'){{$type_list->userType}}@endif</option>

                                @endforeach

                                </select>

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



