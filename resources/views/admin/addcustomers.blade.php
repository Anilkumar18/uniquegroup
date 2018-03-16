@extends('admin.layouts.customer')



@section('content')



<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">

<div class="col-lg-12">

<div class="col-lg-12 clsbreadcrumb">
                    	<div class="col-lg-10"> > Customer Maintenance - Add New Customer</div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{ url(route('admin.customers'))}}'">View List</button></div>
                    </div>



<div class="col-lg-12 clsaddnewvendorform">  <?php //echo '<pre>'; print_r($countries_details); ?>

             <form name="customersadd" id="customersadd" method="post" action="{{ url(route('admin.addcustomers'))}}" enctype="multipart/form-data">

              {{ csrf_field() }}

              

            <input type="hidden" name="editID" id="editID" value="@if($edit_val==1) {{ $customers->id }} @endif"/>

            

            <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="customername" class="col-md-3">Customer Name <span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    							<input type="text" name="customername" id="customername" class="form-control" placeholder="Customer Name" value="@if($edit_val==1) {{$customers->CustomerName}}@endif"/>

                                </div>

  							</div>

                            

                        </row>

            <row class="col-md-12"> <?php //echo '<pre>'; print_r($logoimg->dirname); ?>

                          

                            <div class="form-group clsformelements">

    							<label for="customerlogo" class="col-md-3">Customer Logo</label>

                                

                                <div class="col-md-3">

                                <input type="file" name="customerlogo" id="customerlogo" class="form-controls" value="">

                                @if($edit_val==1)

                                <input type="hidden" name="selectimage" id="selectimage" class="form-control" value="{{$customers->CustomerLogo}}">

                                @endif

                                </div>

  							</div>

                            

                        </row>

                        

            <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="firstName" class="col-md-3">Main Contact First Name <span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    							<input type="text" name="firstName" id="firstName" class="form-control" placeholder="Main Contact First Name" value="@if($edit_val==1){{$customers->MainContactFirstname}}@endif" />

                                </div>

  							</div>

                            

                        </row> 

            <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="lastName" class="col-md-3">Main Contact Last Name <span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    							<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Main Contact Last Name" value="@if($edit_val==1){{$customers->MainContactLastname}}@endif" />

                                </div>

  							</div>

                            

                        </row>

             <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="phoneNumber" class="col-md-3">Phone Number <span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    							 <input type="text" name="phoneNumber" id="phoneNumber" placeholder="+CountryCode AreaCode" class="form-control" value="@if($edit_val==1){{$customers->PhoneNumber}}@endif">

                   <span id="phoneerror" style="display: none;">Not valid phone number</span>

                                </div>

  							</div>

                            

                        </row>

             <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="email" class="col-md-3">E-mail <span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    							<input type="email" name="email" id="email"  class="form-control" placeholder="E-mail" value="@if($edit_val==1){{$customers->Email}}@endif">

                                </div>

  							</div>

                            

                        </row>

			 <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label class="col-md-3"><h3> Main Office Address <span class="mandatory_fields">*</span></h3></label>

  							</div>

                            

                        </row>   

              <row class="col-md-12">

                          

                          <div class="form-group clsformelements">

    						<label for="suite" class="col-md-3">Suite/Unit <span class="mandatory_fields">*</span></label>

                                

                              <div class="col-md-3">

    						  <input type="text" name="suite" id="suite" class="form-control" placeholder="Suite/Unit" value="@if($edit_val==1){{$customers->Suite}}@endif" />

                                </div>

  							</div>

                            

                        </row>   

               <row class="col-md-12">

                          

                          <div class="form-group clsformelements">

    						<label for="street" class="col-md-3">Street <span class="mandatory_fields">*</span></label>

                                

                              <div class="col-md-3">

    						  <input type="text" name="street" id="street" class="form-control" placeholder="Street" value="@if($edit_val==1){{$customers->Street}}@endif" />

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

                        <option value="{{$countrieslist->CountryID}}" "@if($edit_val==1) {{ $customers->CountryID==$countrieslist->CountryID ? 'selected' : '' }} @endif"   drop-data="{{ url(route('admin.selectstate', ['id' => $countrieslist->CountryID])) }}">{{$countrieslist->Country}}</option>

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

                        <option value="{{$statelist->id}}" "@if($edit_val==1) {{ $customers->StateID == $statelist->id ? 'selected' : '' }} @endif">{{$statelist->StateName}}</option>

                        @endforeach

                        </select>

                         

                                </div>
                        </div>        

  							</div>

                            

                        </row>
                          <row class="col-md-12">

                          

                          <div class="form-group clsformelements">

                <label for="city" class="col-md-3">City <span class="mandatory_fields">*</span></label>

                                

                              <div class="col-md-3">

                  <input type="text" name="city" id="city" class="form-control" placeholder="City" value="@if($edit_val==1){{$customers->City}}@endif" />

                                </div>

                </div>

                            

                        </row> 

              <row class="col-md-12">

                          

                          <div class="form-group clsformelements">

    						<label for="zipcode" class="col-md-3">Zip Code <span class="mandatory_fields">*</span></label>

                                

                              <div class="col-md-3">

    						  <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Zip Code" value="@if($edit_val==1){{$customers->ZIPcode}}@endif" maxlength="7" />

                                </div>

  							</div>

                            

                        </row> 
                        <row class="col-md-12">

                        <div class="form-group clsformelements">

                  <label class="col-md-3"><h3> Customer Warehouse </h3></label>

                </div>
                           

                        </row>
                        <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="Warehouse_Name" class="col-md-3">Customer Warehouse Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                          <input type="text" name="Warehouse_Name" id="Warehouse_Name" placeholder="Warehouse Name" class="form-control" value="@if($edit_val==1){{$customers->Warehouse_Name}}@endif"/>

                                </div>

                </div>

                            

                        </row> 
                        <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="Warehouse_Suite" class="col-md-3">Warehouse Suite/Unit<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                        <input type="text" name="Warehouse_Suite" id="Warehouse_Suite" placeholder="Suite/Unit" class="form-control" value="@if($edit_val==1){{$customers->Warehouse_Suite}}@endif"/>

                                </div>

                </div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="Warehouse_street" class="col-md-3">Warehouse Street<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                        <input type="text" name="Warehouse_street" id="street" placeholder="Street" class="form-control" value="@if($edit_val==1){{$customers->Warehouse_street}}@endif"/>

                                </div>

                </div>

                            

                        </row>

         <!--  //Defect: New_pdf no:1
         //Name: Vidhya-php Team
         //change country, city order -->
         

                  <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="Warehouse_CountryID" class="col-md-3">Warehouse Country<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

              <select id="Warehouse_CountryID" name="Warehouse_CountryID" class="form-control" onchange="countryChanges();">

                        <option value=""> Please Select Country</option>

                        @foreach($countries_details as $countrieslist)

                        <option value="{{$countrieslist->CountryID}}" "@if($edit_val==1) {{$customers->Warehouse_CountryID==$countrieslist->CountryID ? 'selected' : ''}} @endif" drop-data="{{url(route('admin.selectstate', ['id' => $countrieslist->CountryID]))}}">{{$countrieslist->Country}}</option>

                        @endforeach

                        </select>

                                </div>

                                

                </div>

                            

                        </row>  
                        

                   <row class="col-md-12">

                          

                          <div class="form-group clsformelements">

                <label for="Warehouse_StateID" class="col-md-3">Warehouse State <span class="mandatory_fields">*</span></label>

                                <div class="statedisplay1">

                              <div class="col-md-3">

              <select id="Warehouse_StateID" name="Warehouse_StateID" class="form-control">

                          <option value=""> Please Select State</option>

                          @foreach($state as $statelist)

                        <option value="{{$statelist->id}}" "@if($edit_val==1) {{$customers->Warehouse_StateID == $statelist->id ? 'selected' : ''}} @endif">{{$statelist->StateName}}</option>

                        @endforeach

                        </select>

                         

                                </div>
                        </div>        

                </div>

                            

                        </row>
                        <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="Warehouse_city" class="col-md-3">Warehouse City<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                          <input type="text" name="Warehouse_city" id="Warehouse_city" placeholder="City" class="form-control" value="@if($edit_val==1){{$customers->Warehouse_city}}@endif"/>

                                </div>

                </div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="Warehouse_Zipcode" class="col-md-3">Warehouse Zip Code<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                                <input type="text" name="Warehouse_Zipcode" id="Warehouse_Zipcode" placeholder="Zip Code" class="form-control" value="@if($edit_val==1){{$customers->Warehouse_Zipcode}}@endif" maxlength="7" />

                                </div>

                </div>

                            

                        </row> 

              <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

    							<label for="zip" class="col-md-3"></label>

    							<div class="col-md-3">

                                  <input type="submit" name="addcustomers" id="addcustomers" value="Add" class="clsbutton"/>

                                 </div>

  							</div>

                            

                        </row>   

                

            </form>

          </div>

      </div>

     </div>

  </div>

@endsection 