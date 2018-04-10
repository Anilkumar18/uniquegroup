@extends('admin.layouts.dashboard')


@section('content')


<style>
.form-group .dropdown {margin: 0 1.33%;	font-size: 12px; padding: 2px; line-height: 14px;}

</style>


<?php
$productgrouplist=App\ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();

?>





  <div class="ibox-title" id="maintenancedashboard" style="display:block;">

 

         

           <div class="form-group">

              <div class="dropdown col-lg-3">

             

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

             

                          <button class="dropbtn">Customer Product Maintenance &nbsp; <span class="fa fa-chevron-down"></span></button>

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

              <div class="dropdown col-lg-3">

                    <a href="{{  url(route('admin.productdevelopmenthome')) }}"><button class="dropbtn">PDM Maintenance&nbsp; <span class="fa fa-chevron-down"></span></button></a>

                    <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.pdmproductgroups')) }}">Product Group & <br /> Sub Group</a>

                             <a href="">User Type</a>

                             <a href="{{ url(route('admin.mktproductionregions')) }}">Marketing & <br /> Production Regions</a>

                             <a href="{{ url(route('admin.productdetails')) }}">Production Details</a>

                             <a href="{{ url(route('admin.productdevelopmenthome'))}}">Product Development</a>

                          </div>

                                             

              </div>
              <!--<div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Ecommerce Product Maintenance &nbsp; <span class="fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">
                             
                              @foreach($productgrouplist as $groupdetails)
                         <a href="{{url(route('ecommercemaintenance.home'))}}">{{$groupdetails->ProductGroup}}</a>
                         @endforeach

                          </div>                      

              </div>-->

           </div>
           
           
           
           
           
           
          

             

             

              

              

           </div>
           
         <div class="ibox-title" id="pdmdashboard" style="display:none">

 <div class="col-lg-12 clsprodhomedd" style="background-color: #fff; padding-bottom: 50px;">
                    <div class="clsdropdown">
                  
                    
                      <center><button class="clsdropbtn btn btn-w-m btn-success" style="min-width:201px; background-color:#0099CC; color:#fff;">New Development<span class=" fa fa-chevron-down"></span></button></center>
                      <div class="clsdropdown-content" style="min-width:201px; background-color:#0099CC; color:#fff;">
                       @foreach($productgrouplist as $groupdetails)
                         <a href="{{url(route('users.productdetaildevelopmenthome',['id'=>$groupdetails->id]))}}">{{$groupdetails->ProductGroup}}</a>
                         @endforeach
                      </div>  
                     
                    </div>
                    &nbsp; &nbsp;
                    <div class="clsdropdown">
                  
                    
                       <a href="{{url(route('user.developmentlist')) }}"><center><button class="clsdropbtn btn btn-w-m btn-success" style="min-width:201px; background-color:#0099CC; color:#fff;">Development List<!--<span class=" fa fa-chevron-down"></span>--></button></center></a>
                     
                     
                    </div>
                    &nbsp;&nbsp;
                     <div class="clsdropdown">
                  
                    
                      <a href="{{url(route('user.developmentlistview')) }}"><center><button class="clsdropbtn btn btn-w-m btn-success" style="min-width:201px; background-color:#0099CC; color:#fff;">Development Item Detailed List<!--<span class=" fa fa-chevron-down"></span>--></button></center></a>
                    
                     
                    </div>

                    </div>

         

          

       
                  

  </div>  
           
                  

</div>
  </div>





         

@endsection



