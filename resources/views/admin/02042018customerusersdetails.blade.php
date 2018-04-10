@extends('admin.layouts.customeruser')

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
       <p> > Customer Maintenance - Customer Users</p>
</div>
@foreach($customerusersviewlist as $customers_list)


@endforeach
<?php //$customeruserid=$_GET['id'];   ?>
        <p class="customer_user_p" style=""><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" class="customer_edit_btn">
        <div id="form-group">
          <div class="col-lg-12">
            <button class="button" onclick="location.href='{{ url(route('customeruser.edit', ['id' => $customers_list->id])) }}'">Edit Customer User</button>
            <!-- //Defect: 8
            //Name: Vidhya-PHP Team
            //Phone number validation-accept 11 digit -->
            <button class="button" onclick="location.href='{{ url(route('admin.customerusers')) }}'">View List</button>
            <!-- //End Defect: 8  -->
		  </div>
 
</div>
</div>
<div class="col-lg-2 companylogo">
</div>

<div class="col-lg-12 clsaddnewvendorform">
                       <form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive">
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example table_user_detail">
                    
                    @if (count($customerusersviewlist) > 0)
                    <thead class="customer_user_table">
                    <?php $i=0; ?>
                    @foreach($customerusersviewlist as $customers_list)                        
                    <?php
					$i++;  
					
					$customer=\App\Customers::where('id', $customers_list->CustomerID)->first();
					$UserType=\App\UserType::where('id', $customers_list->UserTypeID)->first();	
					$country=\App\Country::where('id', $customers_list->CountryID)->first();
					$state=\App\State::where('id', $customers_list->StateID)->first();					
                    ?> 

                    <tr>
                    <th>Customer</th>                        
                    <th>@if($customers_list->CustomerID!=0){{ $customer->CustomerName }}@endif</th>
                    </tr>
                    </thead>
                    <tr>
                    <td class="user_backgrd_color" style="">Contact First Name</td>
                    <td class="user_backgrd_color">{{ $customers_list->FirstName }}</td>
                    </tr>
                    <tr>
                    <td>Contact Last Name</td>
                    <td>{{ $customers_list->LastName }}</td>
                    </tr>
                     <tr>
                    <td class="user_backgrd_color">User Name</td>
                    <td class="user_backgrd_color">{{ $customers_list->UserName }}</td>
                    </tr>
                    <tr>
                    <td>Password</td>
                    <td>****</td>
                    </tr>
                    <tr>
                    <td class="user_backgrd_color">User Type</td>
                    <td class="user_backgrd_color">@if($customers_list->UserTypeID!=0){{ $UserType->userType}}@endif </td>
                    </tr>
                      <tr>
                    <td>Phone Number</td>
                    <td>{{ $customers_list->PhoneNumber }}</td>
                    </tr>
                     <tr>
                    <td class="user_backgrd_color">E-mail</td>
                     <td class="user_backgrd_color">{{ $customers_list->Email }}</td>
                    </tr>
                    <tr>
                    <td >Address</td>
                    
                     <td>{{ $customers_list->Suite }} {{ $customers_list->Street }}, {{ $customers_list->City }}@if($customers_list->StateID!=0), {{$state->StateName}}@endif, {{ $customers_list->ZIPcode}}@if($customers_list->CountryID!=0), {{$country->Country}}@endif </td>
                    </tr>
                    
                   @endforeach
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5" >No Customer User(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    
                    </div>
      </div>
     </div>
  </div>


         
@endsection

