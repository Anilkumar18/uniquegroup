@extends('ecommercemaintenance.layouts.dashboard')
<?php
error_reporting(0);
?>

@section('content')

<style>
.form-group .dropdown {
    width: 14%;
    margin: 0 1%;
    padding: 0;
}
div#page-wrapper {min-height:800px !important;}

</style>

<?php
$productgrouplist=App\ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();

?>





  <div class="ibox-title" id="maintenancedashboard" style="display:block;">

 

         

           <div class="form-group" align="center">

              <div class="dropdown col-lg-2">
              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Woven Labels &nbsp;</button>

                                             

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Printed Labels &nbsp;</button>

                                       

              </div>
              
                 <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Heat Transfer &nbsp;</button>

                                              

              </div>

              <div class="dropdown col-lg-2">

             

       <button class="dropbtn">Care Labels &nbsp; <span class="fa fa-chevron-down"></span></button>

                          

                             <div class="dropdown-content drop" align="center">

                             <a href="">Size Maintenance</a>
                             <a href="{{ url(route('ecommercemaintenance.countryoforigin'))}}">Country of Origin Maintenance</a>
                              <a href="{{ url(route('admin.drysymbollist')) }}">Care Instructions Dry</a>
                              <a href="{{ url(route('admin.washsymbollist'))}}">Care Instructions Wash</a>
                              <a href="{{ url(route('admin.bleachsymbollist'))}}">Care Instructions Bleach</a>
                               <a href="{{ url(route('admin.ironsymbollist'))}}">Care Instructions Iron</a>
                                <a href="{{ url(route('admin.drycleansymbollist'))}}">Care Instructions Dry Clean</a>
                                 <a href="{{ url(route('ecommercemaintenance.fabric'))}}">Fabric Compoistion Maintenance</a>
                                  <a href="{{ url(route('admin.garmentmaintenance'))}}">Garment Components Maintenance</a>
                                   <a href="{{ url(route('admin.pricesticker')) }}">Price sticker Maintanence</a>
                                  <a href="">Care Sets Maintenance</a>
                                  <a href="">Caution Maintenance</a>
                                   <a href="">Copyright Maintenance</a>
                                   <a href="">Special Instructions Maintenance</a>
                                
                          </div>

                                             

              </div>
              <div class="dropdown col-lg-2">
           </div>
              
              
              

              
              

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



