<!DOCTYPE html>
@extends('admin.layouts.customer')



@section('content')




<div class="wrapper wrapper-content animated fadeInRight">

<div class="col-lg-12">

					<div class="logoutSucc logoutSuccdiv">



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

       <p> > Customer Maintenance - Customers</p>

</div>  

<div class="col-lg-12 clsaddnewvendorform">

<button class="button addnewcustomer" onclick="location.href='{{ url(route('admin.addnewcustomers'))}}'">Add New Customer</button>

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive">

                     
                    <table id="example" class="table table-striped table-bordered table-hover dataTables-example">

                   <!--   <h5>View all |&nbsp;Export Results-Excel File| &nbsp;<a href="javascript:window.print();">Print Current Page</a></h5>-->

                    @if (count($customers) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                        <th class="customer_th">Customer</th>                        

                        <th class="contact_first_th">Contact First Name</th>

                        <th class="last_th">Contact Last Name</th>  

                        <th class="phone_th">Phone Number</th>    

                        <th class="email_th">E-mail</th>      

                        <th class="country_th">Country</th>                                    

                        <th class="action_th">Actions</th>

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($customers as $customers_list)                        

                    <?php

					$i++;  				

                    $status=$customers_list->status;					

					$country=\App\Country::where('id', $customers_list->CountryID)->first();

                    ?>

                    <tr class="gradeX">

                        <td>{{ $customers_list->CustomerName }}</td>

                        <td>{{ $customers_list->MainContactFirstname }}</td>                        

                        <td>{{ $customers_list->MainContactLastname }}</td>  

                        <td>{{ $customers_list->PhoneNumber }}</td>  

                        <td>{{ $customers_list->Email }}</td> 

                        <td>@if($customers_list->CountryID!=0){{ $country->Country }}@endif</td>    

                        <td>

                        <a class="editcustomers" href="{{ url(route('customer.edit', ['id' => $customers_list->id])) }}" ><img src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a> 

                        <span class="selectcustomers" data-href="{{ url(route('admin.customersdetails',['id' => $customers_list->id])) }}"  data-valueid="{{ $customers_list->id }}"><a href="{{ url(route('admin.customersdetails', ['id' => $customers_list->id])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                        

                        <span class="deletecustomers" data-href="{{ url(route('customer.delete', ['id' => $customers_list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>

                                           

        <a class="button" href="javascript:;">E-Commerse Site</a>

        <a class="button" href="javascript:;">Product Development</a>

        <a class="button" href="{{ url(route('admin.customerusersid', ['id' => $customers_list->id])) }}">Customers Users</a>

                        </td>

                        

                    </tr>

                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="5">No Customer(s) Found</td></tr>

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



