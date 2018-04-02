@extends('admin.layouts.customeruser')
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

       <p> > Customer Maintenance - Customer Users</p>

</div>

<button class="button addnewcustomerusers" onclick="location.href='{{ url(route('admin.addcustomerusers'))}}'">Add New User</button>

 <div class="col-lg-12 clsaddnewvendorform">

            <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive">

                      

                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" style="width:1200px; overflow-x: scroll;">

                     <!-- <h5 class="custom_user_h5">View all |&nbsp;Export Results-Excel File| &nbsp;Print Current Page</h5>-->
                      <?php //print_r($customerusers); ?>
                      
                    @if (count($customerusers) > 0)
                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
                         <th>Options</th>

                        <th>Customer</th>                        

                        <th>Contact First Name</th>

                        <th >Contact Last Name</th>  

                        <th >User Name</th>    

                        <th >Phone Number</th>      

                        <th>E-mail</th>                                    

                        <th>Country</th>

                        <!-- <th>Customer Warehouse Name</th> -->

                        <th>User Type</th>
                        
                         <th>Status</th>

                        <th>Actions</th>

                        

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=0; ?>

                    @foreach($customerusers as $customers_list)                        

                    <?php

					$i++;  				

                    $status=$customers_list->status;					

					$customer=\App\Customers::where('id', $customers_list->CustomerID)->first();

					$Country=\App\Country::where('id', $customers_list->CountryID)->first();

					$UserType=\App\UserType::where('id', $customers_list->UserTypeID)->first();	

                    ?>

                    <tr class="gradeX">
                      <td><?php echo '<input type="checkbox" name="ChkEvent[]" id="ChkEvent[]" value="'.$customers_list->id.'" class="hobbies_class">'; ?></td>

                        <td>@if($customers_list->CustomerID!=0){{ $customer->CustomerName }}@endif</td>

                        <td>{{ $customers_list->FirstName }}</td>                        

                        <td>{{ $customers_list->LastName }}</td>  

                        <td>{{ $customers_list->UserName }}</td>  

                         <td>{{ $customers_list->PhoneNumber }}</td> 

                        <td>{{ $customers_list->Email }}</td>  

                        <td>@if($customers_list->CountryID!=0){{ $Country->Country }}@endif</td>

                        <!-- <td>{{ $customers_list->Warehouse_Name }}</td> -->

                        <td>@if($customers_list->UserTypeID!=0){{ $UserType->userType }}@endif</td>
                          
                          
                          <td> @if ($customers_list->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                          @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                          @endif  </td>                                      

                        <td>

                        <a class="editcustomerusers" href="{{ url(route('customeruser.edit', ['id' => $customers_list->id])) }}" ><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>                       

                        <span class="selectcustomerusers"><a href="{{ url(route('admin.customerusersdetails', ['id' => $customers_list->id])) }}"><img  src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a></span> 

                        <!--<span class="deletecustomerusers" data-href="{{ url(route('customeruser.delete', ['id' => $customers_list->id])) }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>-->

                        

                        </td>

                        

                    </tr>

                    @endforeach

                    </tbody>

                    <tfoot>

                    @else

                    <tr class="gradeC"><td colspan="5">No Customer User(s) Found</td></tr>

                    @endif
                    
                    <tr class="gradeX">
                    <th colspan="11">
                   
                       <div class="col-lg-1" style="width: 110px;"> <a data-href="{{ url(route('customeruser.activate')) }}" href="javascript:;" class="btn btn-primary activatcustomeruser" style="width: 100px;">
                        <i class="fa fa-check"></i><span class="bold">&nbsp;Activate</span></a>
                        </div>
                        
                        <div class="col-lg-1" style="width: 110px;">
                        
                        <a data-href="{{ url(route('customeruser.deactivate')) }}" href="javascript:;" class="btn btn-warning deactivatecustomeruser" style="width: 100px;">
                        <i class="fa fa-warning"></i><span class="bold">&nbsp;Deactivate</span></a>
                        </div>
                        <div class="col-lg-1" style="width: 110px;">
                        
                        <a data-href="{{ url(route('customeruser.delete')) }}" href="javascript:;" class="btn btn-danger deletecustomeruser" style="width: 100px;">
                        <i class="fa fa-warning"></i><span class="bold">&nbsp;Delete</span></a>
                        </div>
                       
                        </th>
                        </tr>



                    </tfoot>

                    </table>

                    </div>

                    </form>

          </div>

      </div>

     </div>

  </div>
</div>
</div>
</div>
</div>





         

@endsection



