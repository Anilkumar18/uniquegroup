@extends('admin.layouts.vendorusers')

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

            </div>
<div class="row">
<div class="col-lg-12">
<div class="col-lg-12 clsbreadcrumb">
       <p> > Vendor Maintenance - Vendor Users</p>
</div>
@foreach($vendorusersviewlist as $users_list)

@endforeach
<?php //$vendoruserid=$_GET['id'];   ?>
        <p class="vendor_users_p"><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" class="vendor_user_div" >
        <div id="form-group">
          <div class="col-lg-12">
            <button class="button button_vendor" onclick="location.href='{{ url(route('vendoruser.edit', ['id' => $users_list->id])) }}'">Edit Vendor User</button>
		  </div>
 
</div>
</div>
<div class="col-lg-12 clsaddnewvendorform">
                       <form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive">
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example vendor_user_table" >
                    
                    @if (count($vendorusersviewlist) > 0)
                    <thead class="vendor_user_thead">
                    <?php $i=0; ?>
                    @foreach($vendorusersviewlist as $users_list)                        
                    <?php
					$i++;  
					
					$customer=\App\Customers::where('id', $users_list->CustomerID)->first();
					$company=\App\Vendors::where('id', $users_list->CompanyID)->first();
					$factory=\App\OfficeFactoryAddress::where('id', $users_list->FactoryID)->first();
					$UserType=\App\UserType::where('id', $users_list->UsertypeID)->first();						
                    ?> 

                    <tr>
                    <th>Customer</th>                        
                    <th>@if($users_list->CustomerID!=''){{$customer->CustomerName}}@endif</th>
                    </tr>
                    </thead>
                    <tr>
                    <td class="table_user">Vendor Name</td>
                    <td class="table_user">@if($users_list->CompanyID!=0){{$company->CompanyName}}@endif</td>
                    </tr>
                    <tr>
                    <tr>
                    <td>Factory Name</td>
                    <td>@if($users_list->FactoryID!=''){{ $factory->factoryName }}@endif</td>
                    </tr>
                    <td class="table_user">Contact First Name</td>
                    <td class="table_user">{{$users_list->firstName}}</td>
                    </tr>
                    <tr>
                    <td>Contact Last Name</td>
                    <td>{{ $users_list->lastName }}</td>
                    </tr>
                    <tr>
                    <td class="table_user">Phone Number</td>
                    <td class="table_user">{{$users_list->phoneNumber}}</td>
                    </tr>
                     <tr>
                    <td>E-mail</td>
                     <td>{{ $users_list->Email }}</td>
                    </tr>
                     <tr>
                    <td class="table_user">User Name</td>
                    <td class="table_user">{{$users_list->userName}}</td>
                    </tr>
                    <tr>
                        <!-- //vidhya-31-03-2018
//show password -->
                    <td>Password</td>
                    <?php $output=\app\Customers::getuserpassword($users_list->Email); ?>
                    <td><input type="password" id="pwd" value="{{$output}}">
<button onclick=showpwd() type="button"><img src="https://i.stack.imgur.com/Oyk1g.png" id="EYE"></button></td>
                    </tr>
                    <tr>
                    <td class="table_user">User Type</td>
                    <td class="table_user">@if($users_list->UsertypeID!=''){{$UserType->userType}}@endif</td>
                    </tr>
                    
                   @endforeach
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5">No Vendor User(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    
                    </div>
      </div>
     </div>
  </div>


         
@endsection

