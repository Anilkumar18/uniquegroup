@extends('admin.layouts.uniqueusers')
<?php

error_reporting(0);
?>


@section('content')


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

       <p> > Unique Maintenance - Unique Users</p>

</div>

 <div class="col-lg-12 clsaddnewvendorform">
 
 <button class="button uniquefacility" onclick="location.href='{{ url(route('admin.adduniqueusers'))}}'">Add New User</button>
 
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

                      

                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width: 1200px; overflow-x: scroll;"> <?php //echo '<pre>'; print_r($uniqueusers); exit; ?>

                     <!-- <h5 class="custom_user_h5">View all |&nbsp;Export Results-Excel File| &nbsp;Print Current Page</h5>-->

                    @if (count($uniqueusers) > 0)

                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                        <th>Factory Name</th>

                        <th>Contact First Name</th> 

                        <th>Contact Last Name</th>  

                        <th>User Name</th>    

                        <th>Phone number</th>      

                        <th>E-mail</th>                                    

                        <th>User Type</th>

                        <th style="width:60px;">Actions</th>

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($uniqueusers as $users_list)                        

                    <?php

					$i++;  				

                    $status=$users_list->status;					

					$customer=App\Customers::where('id','=',$users_list->CustomerID)->first();

					

					$UserType=App\UserType::where('id','=',$users_list->UsertypeID)->first();

					

					$factorydetails=App\UniqueOffices::where('id','=',$users_list->FactoryID)->first();

                    ?>

                    <tr class="gradeX">

                        <td>@if($users_list->FactoryID!=''){{$factorydetails->OfficeFactoryName}}@endif</td>  

                        <td>{{$users_list->firstName}}</td>  

                         <td>{{$users_list->lastName}}</td> 

                        <td>{{$users_list->userName}}</td>  

                        <td>{{$users_list->phoneNumber}}</td> 

                        <td>{{$users_list->Email}}</td> 

                        <td>@if($users_list->UsertypeID!=0){{$UserType->userType}}@endif</td>                                   

                        <td>

                        <a class="edituniqueusers" href="{{ url(route('uniqueuser.edit', ['id' => $users_list->id])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>                       

                        <span class="selectuniqueusers"><a href="{{ url(route('admin.uniqueusersdetails', ['id' => $users_list->id])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                        <span class="deletefacility" data-href="{{ url(route('uniqueuser.delete', ['id' => $users_list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>

                        </td>

                        

                    </tr>

                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="5">No Unique User(s) Found</td></tr>

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



