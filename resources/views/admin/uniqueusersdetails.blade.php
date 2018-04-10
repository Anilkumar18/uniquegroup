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

            </div>
<div class="row">
<div class="col-lg-12">
<div class="col-lg-12 clsbreadcrumb">
<p> > Unique Maintenance - Unique User </p>
</div>
<?php //print_r($uniqueusersviewlist['id']);exit;   ?>
<?php    ?>

        <p class="unique_user_detail_p"><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" class="col-lg-12 unique_user_detail_div">
        <div id="form-group">
          <div class="col-lg-12">
             @foreach($uniqueusersviewlist as $uniqueview) 
             

             @endforeach
    <button class="button user_facility_btn" onclick="location.href='{{ url(route('uniqueuser.edit', ['id' => $uniqueview->id])) }}'">Edit Unique User</button>
         
		  </div>

</div>
</div>
<div class="col-lg-12 clsaddnewvendorform">
                       <form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive">
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example1 unique_user_detail_table" >
                    
                    @if (count($uniqueusersviewlist) > 0)
                    <thead class="unique_user_detail_thead">
                   
                    <tr>
                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
                        <th>Office/Factory Name</th>                        
                       
                          <?php $i=0; ?>
                    @foreach($uniqueusersviewlist as $uniqueview)                        
                    <?php
                    //print_r($uniqueview->id);
					$i++;  		
					$factoryname=App\UniqueOffices::where('id','=',$uniqueview->FactoryID)->first();
          $customer=\App\Customers::where('id', $uniqueview->CustomerID)->first();
					$usertypedetails=App\UserType::where('id','=',$uniqueview->UsertypeID)->first();				
                    ?> 
                     <th>@if($uniqueview->FactoryID!=0){{$factoryname->Factory1OfficeFactoryName}}@endif</th>
                    </tr>
                    </thead>
                    <td class="unique_user_detail_bgclr">First Name</td>
                    <td class="unique_user_detail_bgclr">{{$uniqueview->firstName	}}</td>
                    </tr>
                    <tr>
                    <td>Last Name</td>
                    <td>{{$uniqueview->lastName}}</td>
                    </tr>
                    <tr>
                    <td class="unique_user_detail_bgclr">Phone Number</td>
                    <td class="unique_user_detail_bgclr">{{$uniqueview->phoneNumber}}</td>
                    </tr>
                     <tr>
                    <td>Email</td>
                    <td>{{$uniqueview->Email}}</td>
                    </tr>
                   <tr>
                    <td class="unique_user_detail_bgclr">User Name</td>
                    <td class="unique_user_detail_bgclr">{{$uniqueview->userName}}</td>
                    </tr>
                     <tr>
                      <!-- //vidhya-31-03-2018
//show password -->
                    <td>Password</td>
                    <?php $output=\app\Customers::getuserpassword($uniqueview->Email); ?>
                    <td><input type="password" id="pwd" value="{{$output}}">
<button onclick=showpwd() type="button"><img src="https://i.stack.imgur.com/Oyk1g.png" id="EYE"></button></td>
                    </tr>
                     <tr>
                    <td class="unique_user_detail_bgclr">UserType</td>
                    <td class="unique_user_detail_bgclr">@if($uniqueview->UsertypeID!=0){{$usertypedetails->userType}}@endif</td>
                    </tr>
                     <tr>
                   
                   @endforeach
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5">No Unique User(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    
                    </div>
      </div>
     </div>
  </div>


         
@endsection

