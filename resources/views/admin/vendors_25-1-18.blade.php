@extends('admin.layouts.vendors')
<?php

error_reporting(0);
?>


@section('content')

<div class="wrapper wrapper-content animated fadeInRight">

<div class="col-lg-12">

					<div class="logoutSucc" style="margin-top: 10px;">



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

       <p> > Vendor Maintenance - Vendors</p>

</div>

<div class="col-lg-12 clsaddnewvendorform">

<button class="button addnewvendor" onclick="location.href='{{ url(route('admin.viewvendors'))}}'">Add New Vendor</button>

 <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive" style="overflow-x:hidden">

                      

                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" > 

                      <h5 style="margin-left:762px; font-size:11px;">View all |&nbsp;Export Results-Excel File| &nbsp;Print Current Page</h5>

                    @if (count($vendor) > 0)

                    <thead>

                    <tr>

                        <th>Customers</th>                        

                        <th>Company Name</th>

                        <th>Country of Operation</th>  

                        <th>Contact Name</th>    

                        <th>Contact Last Name</th>      

                        <th>Phone Number</th>    

                        <th>Email</th>                                   

                        <th>Actions</th>

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($vendor as $vendors_list)                        

                    <?php

					$i++;  				

                    $status=$vendors_list->status;					

					$customerdetails=App\Customers::where('id','=',$vendors_list->CustomerID)->first();

					$countrydetails=App\Country::where('id','=',$vendors_list->CountryID)->first();
					
					

                    ?>

                    

                    <tr class="gradeX">

                        <td>@if($vendors_list->CustomerID!=0){{ $customerdetails->CustomerName }}@endif</td>

                        <td>{{ $vendors_list->CompanyName }}</td>                        

                        <td>@if($vendors_list->CountryID!=0){{ $countrydetails->Country}}@endif</td>  

                        <td>{{ $vendors_list->MainContactFirstName }}</td>  

                       <td>{{ $vendors_list->MainContactLastName }}</td>        

                       <td>{{ $vendors_list->PhoneNumber }}</td>   

                       <td>{{ $vendors_list->Email }}</td>                              

                        <td><a href="{{ url(route('vendors.edit', ['id' => $vendors_list->id])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>

                        <span class="selectcustomers" data-href="{{ url(route('admin.vendorsdetails')) }}"  data-valueid="{{ $vendors_list->id }}"><a href="{{ url(route('admin.vendorsdetails', ['id' => $vendors_list->id])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                         <span class="deletevendors" data-href="{{ url(route('vendors.delete', ['id' => $vendors_list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>



                        <input type="button" id="vendorusers" class="button"  name="vendorusers" value="Vendor Users" onclick="location.href='{{ url(route('admin.vendorusers'))}}'" />

                          

                        </td>

                        

                    </tr>

                   

                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Vendor(s) Found</td></tr>

                    @endif



                    </tfoot>

                    </table>

                    </div>

                    </form>

                    

          </div>

      </div>

     </div>

  </div>



</div>

         

@endsection



