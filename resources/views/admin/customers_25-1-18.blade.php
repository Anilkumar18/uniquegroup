@extends('admin.layouts.customer')



@section('content')

<style>

.dashboard-mainimg {

    width: 100%;

    height: auto;

}

.dropbtn {

    background-color: #00AEEF;

    color: white;

    padding: 4px;

    font-size: 13px;

    border: none;

    cursor: pointer;

	width: 160px;

	height:32px;

	border-radius: 5px;

	padding: 4px;

	margin-top: 12px;

}



.dropdown {

    position: relative;

    display: inline-block;

}



.dropdown-content {

    display: none;

    position: absolute;

    background-color: #0095cd;

    min-width: 160px;

    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

    z-index: 1;

	color:white;

}



.dropdown-content a {

    color: black;

    padding: 4px 16px;

    text-decoration: none;

    display: block;

	font-size: 13px;

}



.dropdown-content a:hover {background-color: #00AEEF}



.dropdown:hover .dropdown-content {

    display: block;

}



.dropdown:hover .dropbtn {

    background-color: #00AEEF;

}

.dropdown-content.drop a {

    color: #fff;

}

.dropdown-content.drop a:hover{

	background-color:#457093;

}

.button {

  display: inline-block;

  padding: 6px 25px;

  font-size: 12px;

  cursor: pointer;

  text-align: center;

  text-decoration: none;

  outline: none;

  color: #fff;

  background-color: #00ADEF;

  border: none;

  border-radius: 5px;

 /* box-shadow: 0 9px #999;*/

}



</style>



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

       <p> > Customer Maintenance - Customers</p>

</div>  

<div class="col-lg-12 clsaddnewvendorform">

<button class="button addnewcustomer" onclick="location.href='{{ url(route('admin.addnewcustomers'))}}'">Add New Customer</button>

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive" style="overflow-x:hidden">

                      

                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" >

                      <h5>View all |&nbsp;Export Results-Excel File| &nbsp;Print Current Page</h5>

                    @if (count($customers) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                        <th>Customers</th>                        

                        <th>Contact First name</th>

                        <th>Contact Last name</th>  

                        <th>PhoneNumber</th>    

                        <th>Email</th>      

                        <th>Country</th>                                    

                        <th>Actions</th>

                        

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

                        <span class="selectcustomers" data-href="{{ url(route('admin.customersdetails')) }}"  data-valueid="{{ $customers_list->id }}"><a href="{{ url(route('admin.customersdetails', ['id' => $customers_list->id])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                        

                        <span class="deletecustomers" data-href="{{ url(route('customer.delete', ['id' => $customers_list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>

                        

                        

        <a class="button" href="javascript:;">Go to E-Commerse Site</a>

        <a class="button" href="javascript:;">Go to Product Development</a>

        <a class="button" href="{{ url(route('admin.customerusers')) }}">Go to Customers Users</a>

                        </td>

                        

                    </tr>

                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Customer(s) Found</td></tr>

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



