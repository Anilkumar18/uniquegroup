@extends('admin.layouts.pdmdashboard')

@section('content')

<div class="headerlink">
<h5> >PDM Maintenance</h5>
</div>
<div class="ibox-title" id="maintenancedashboard" style="display:none;">

 

         

           <div class="form-group">

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Customer Maintenance &nbsp; <span class=" fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.customers')) }}">Customers</a>

                             <a href="{{ url(route('admin.customerusers')) }}">Customer User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Vendor Maintenance &nbsp; <span class=" fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.vendors')) }}">Vendors</a>

                             <a href="{{  url(route('admin.vendorusers')) }}">Vendor User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Unique Maintenance &nbsp; <span class="fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.uniquefacility')) }}">Unique Facilities</a>

                             <a href="{{  url(route('admin.uniqueusers')) }}">Unique User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Product Maintenance &nbsp; <span class="fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                            <?php
                            //print_r($user->customerID);
                            if($user->userTypeID==9)
                            {
                              $customerdetails=App\Customers::where('id','=',$user->customerID)->get();
                            }else
                            $customerdetails=App\Customers::all();
                          foreach($customerdetails as $customers)
                          {
                          ?>
                             <a href="{{  url(route('admin.producthome',['sidebarid'=>$customers->id])) }}">{{$customers->CustomerName}}</a>
                           <?php
                           }
                           ?>

                            
                          </div>

                                             

              </div>

              <div class="dropdown col-lg-2">

                    <a href="{{  url(route('admin.productdevelopmenthome')) }}"><button class="dropbtn">PDM Maintenance&nbsp; <span class="fa fa-chevron-down"></span></button></a>

                    <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.pdmproductgroups')) }}">Product Group & <br /> Sub Group</a>

                             <a href="">User Type</a>

                             <a href="{{ url(route('admin.mktproductionregions')) }}">Marketing & <br /> Production Regions</a>

                             <a href="{{ url(route('admin.productdetails')) }}">Production Details</a>

                             <a href="{{ url(route('admin.productdevelopmenthome'))}}">Product Development</a>

                          </div>

                                             

              </div>

           </div>
           
           
           
           
           
           
          

             

             

              

              

           </div>
 <div class="ibox-title" id="pdmdashboard" style="display:block;">
<div class="ibox-title productibox-title">
<div class="col-lg-12 clsprodhomedd_pdm">
</div>
<div class="col-lg-12 clsprodhomedd_pdm">
<div>
  <button class="clsdropbtn_pdm" onclick="location.href='{{ url(route('admin.pdmproductgroups'))}}'">Product Group & Sub Group</button>
</div>
</div>
<div class="col-lg-12 clsprodhomedd_pdm">
<div>
  <button class="clsdropbtn_pdm">User Type</button>
</div>
</div>
<div class="col-lg-12 clsprodhomedd_pdm">
<div>
  <button class="clsdropbtn_pdm" onclick="location.href='{{ url(route('admin.mktproductionregions'))}}'">Marketing & Production Regions</button>
</div>
</div>
<div class="col-lg-12 clsprodhomedd_pdm">
<div>
  <button class="clsdropbtn_pdm" onclick="location.href='{{ url(route('admin.productdetails'))}}'">Product Details</button>
</div>
</div>

<div class="col-lg-12 clsprodhomedd_pdm">

<div>
  <button class="clsdropbtn_pdm" onclick="location.href='{{ url(route('admin.productdevelopmenthome'))}}'">Product Development</button>
</div>

</div>

</div>
</div>
@endsection 