@extends('admin.layouts.uniquefacility')
<?php
error_reporting(0);

?>


@section('content')

<style>


table th 
{
  text-align: center;
}
</style>



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

       <p> > Unique Maintenance - Facilities</p>

</div>

<div class="col-lg-12 clsaddnewvendorform">

<button class="button uniquefacility" onclick="location.href='{{ url(route('admin.viewuniquefacility'))}}'">Add New Facility</button>

 <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive">

                      

                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1600px; overflow-x: scroll;"> <?php //echo '<pre>'; print_r($uniquedetails); exit; ?>

                      <!--<h5 style="font-size:11px;">View all |&nbsp;Export Results-Excel File| &nbsp;Print Current Page</h5>-->
                      
                    

                    @if (count($uniquedetails) > 0)

                    <thead>

                    <tr>

                        <th>Office / Factory Name</th>                        

                        <th>Marketing Region</th>

                        <th>Production Region</th>  

                        <th>Address</th>    

                        <th>Contact First Name</th>      

                        <th>Contact Last Name</th>    

                        <th>Phone Number</th> 

                        <th>E-mail</th>                                      

                        <th>Actions</th>

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($uniquedetails as $uniquelistdetails)                        

                    <?php

					$i++;  				

                    $status=$uniquelistdetails->status;		

					

					$marketingregionsdetails=App\MarketingRegions::where('id','=',$uniquelistdetails->MarketingRegionID)->first();

					$productionregionsdetails=App\ProductionRegions::where('id','=',$uniquelistdetails->ProductionRegionID)->first();	

					$countrydetails=App\Country::where('id','=',$uniquelistdetails->CountryID)->where('status','=',1)->first();	

					$statedetails=App\State::where('id','=',$uniquelistdetails->StateID)->where('status','=',1)->first();

					//$marketingregionsdetails=formatNumber($uniquelistdetails->Factory1MarketingRegionID);

                    ?>

                    <tr class="gradeX">

                        <td>{{ $uniquelistdetails->OfficeFactoryName }} </td>

                        <td>@if($uniquelistdetails->MarketingRegionID!=''){{$marketingregionsdetails->MarketingRegions}}@endif</td>                        

                        <td>@if($uniquelistdetails->ProductionRegionID!=''){{ $productionregionsdetails->ProductionRegions }}@endif</td>  

                        <td>{{$uniquelistdetails->Suite}} {{$uniquelistdetails->Street}}, {{$uniquelistdetails->City}}, {{$statedetails->StateName}}, {{$uniquelistdetails->ZIPcode}}, {{$countrydetails->Country}}</td>

                        <td>{{ $uniquelistdetails->MainContactFirstName }}</td>  

                       <td>{{ $uniquelistdetails->MainContactLastName}}</td>        

                       <td>{{ $uniquelistdetails->PhoneNumber }}</td>   

                       <td>{{ $uniquelistdetails->Email }}</td>                              

                        <td><a href="{{ url(route('admin.uniquefacilityedit', ['id' => $uniquelistdetails->id])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>
                          <span class="selectfacility"><a href="{{ url(route('admin.uniquefacilitydetails', ['id' => $uniquelistdetails->id])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                         <span class="deletefacility" data-href="{{ url(route('uniquefacilities.delete', ['id' => $uniquelistdetails->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>

                        

                          

                        </td>

                        

                    </tr>

                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="5">No Facility(s) Found</td></tr>

                    @endif



                    </tfoot>

                    </table>

                    </div>

                    </form>

                    

          </div>

      </div>

     </div>

  </div>





         

@endsection



