<?php 
error_reporting(0);
?>
@extends('admin.layouts.adminLayout')

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
  margin-bottom: 5%;
 /* box-shadow: 0 9px #999;*/
}

.button:hover {background-color: #00ADEF}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
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

            </div>
<div class="row">
<div class="col-lg-12">
<div class="col-lg-12 clsbreadcrumb">
       <p> > Vendor Maintenance - Vendor Users</p>
</div>
<?php $vendoruserid=$_GET['id'];   ?>
        <p style="float:right; cursor:pointer; z-index:1; position:relative; font-size:10px;"><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" style="float:left;">
        <div id="form-group">
          <div class="col-lg-12">
            <button class="button" style=" z-index:1; position:relative;" onclick="location.href='{{ url(route('vendoruser.edit', ['id' => $vendoruserid])) }}'">Edit Vendor User</button>
		  </div>
 
</div>
</div>
<div class="col-lg-12 clsaddnewvendorform">
                       <form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive" style="overflow-x:hidden">
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example" style=" width:47%;border-bottom: solid 2px #212121;float:left;" >
                    
                    @if (count($vendorusersviewlist) > 0)
                    <thead style="border-top: solid 2px #212121; border-bottom: solid 2px #212121;">
                    <?php $i=0; ?>
                    @foreach($vendorusersviewlist as $users_list)                        
                    <?php
					$i++;  
					
					$customer=\App\Customers::where('id', $users_list->CustomerID)->first();
					$company=\App\Vendors::where('id', $users_list->CompanyID)->first();
					$factory=\App\Vendors::where('id', $users_list->FactoryID)->first();
					$UserType=\App\UserType::where('id', $users_list->UsertypeID)->first();						
                    ?> 

                    <tr>
                    <th>Customer</th>                        
                    <th>{{ $customer->CustomerName }}</th>
                    </tr>
                    </thead>
                    <tr>
                    <td style="background-color:#CCCCCC;">Company Name</td>
                    <td style="background-color:#CCCCCC;">{{ $company->CompanyName }}</td>
                    </tr>
                    <tr>
                    <tr>
                    <td>Factory Name</td>
                    <td>{{ $factory->FactoryName }}</td>
                    </tr>
                    <td style="background-color:#CCCCCC;">Contact Name</td>
                    <td style="background-color:#CCCCCC;">{{ $users_list->firstName }}</td>
                    </tr>
                    <tr>
                    <td>Contact Last Name</td>
                    <td>{{ $users_list->lastName }}</td>
                    </tr>
                    <tr>
                    <td style="background-color:#CCCCCC;">Phone number</td>
                    <td style="background-color:#CCCCCC;">{{ $users_list->phoneNumber }}</td>
                    </tr>
                     <tr>
                    <td>E-mail</td>
                     <td>{{ $users_list->Email }}</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">User name</td>
                    <td style="background-color:#CCCCCC;">{{ $users_list->userName }}</td>
                    </tr>
                    <tr>
                    <td style="background-color:#CCCCCC;">Password</td>
                    <td style="background-color:#CCCCCC;">****</td>
                    </tr>
                    <tr>
                    <td style="background-color:#CCCCCC;">User Type</td>
                    <td style="background-color:#CCCCCC;">{{ $UserType->userType }}</td>
                    </tr>
                    
                   @endforeach
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Vendor User(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    
                    </div>
      </div>
     </div>
  </div>


         
@endsection

