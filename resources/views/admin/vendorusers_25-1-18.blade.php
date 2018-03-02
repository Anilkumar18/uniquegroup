@extends('admin.layouts.vendorusers')
<?php

error_reporting(0);
?>


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

       <p> > Vendor Maintenance - Vendor Users</p>

</div>

<button class="button addnewvendorusers" onclick="location.href='{{ url(route('admin.addvendorusers'))}}'">Add New User</button>

 <div class="col-lg-12 clsaddnewvendorform">

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

                    @if (count($vendorusers) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                        <th>Customer</th>                        

                        <th>Company Name</th>

                        <th>Factory Name</th>

                        <th>Contact Name</th> 

                        <th>Contact Last Name</th>  

                        <th>Username</th>    

                        <th>Phone number</th>      

                        <th>E-mail</th>                                    

                        <th>User type</th>

                        <th>Actions</th>

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($vendorusers as $users_list)                        

                    <?php

					$i++;  				

                    $status=$users_list->status;					

					$customer=\App\Customers::where('id', $users_list->CustomerID)->first();

					$company=\App\Vendors::where('id', $users_list->CompanyID)->first();

					$factory=\App\Vendors::where('id', $users_list->FactoryID)->first();

					$UserType=\App\UserType::where('id', $users_list->UsertypeID)->first();	

                    ?>

                    <tr class="gradeX">

                        <td>@if($users_list->CustomerID!=0){{ $customer->CustomerName }}@endif</td>

                        <td>@if($users_list->CompanyID!=0){{ $company->CompanyName }}@endif</td>                        

                        <td>@if($users_list->FactoryID!=0){{ $factory->FactoryName }}@endif</td>  

                        <td>{{ $users_list->firstName }}</td>  

                         <td>{{ $users_list->lastName }}</td> 

                        <td>{{ $users_list->userName }}</td>  

                        <td>{{ $users_list->phoneNumber }}</td> 

                        <td>{{ $users_list->Email }}</td> 

                        <td>@if($users_list->UsertypeID!=0){{ $UserType->userType }}@endif</td>                                   

                        <td>

                        <a class="editvendorusers" href="{{ url(route('vendoruser.edit', ['id' => $users_list->id])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>                       

                        <span class="selectvendorusers"><a href="{{ url(route('admin.vendorusersdetails', ['id' => $users_list->id])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                        

                        <span class="deletevendorusers" data-href="{{ url(route('vendoruser.delete', ['id' => $users_list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>

                        </td>

                        

                    </tr>

                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Vendor User(s) Found</td></tr>

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



