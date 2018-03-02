@extends('admin.layouts.customer')

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
       <p> > Customer Maintenance - Customers
        @foreach($customerviewlist as $customers_list)
        

        @endforeach

	   <?php //$cusid=$_GET['id']; 

     
	    $cusname=App\Customers::where('id','=',$customers_list->id)->where('status','=',1)->first();
		echo " - ".$cusname->CustomerName;
	    ?></p>
</div>
        <p class="customers_print_p"><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" class="customer_page_row">
        <div id="form-group">
          <div class="col-lg-12">
			<button class="button">Ecommerce site</button>
            <button class="button">Product Development</button>
            <button class="button" onclick="location.href='{{ url(route('admin.customerusers'))}}'">Customer Users</button>
            <button class="button" onclick="location.href='{{ url(route('customer.edit', ['id' => $customers_list->id])) }}'">Edit Customer</button>
		  </div>
@if($cusname->CustomerLogo)
<div class="col-lg-2 companylogo">
<img src="{{ route('customerlogo', ['id' => $customers_list->id]) }}" width="175"/>
</div>
@else
<div class="col-lg-2 companylogo">
</div>
@endif
</div>
<div class="col-lg-12 clsaddnewvendorform">
                       <form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive">
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example customer_detail_tabl">
                    
                    @if (count($customerviewlist) > 0)
                    <thead class="customer_thead" style="">
                    <tr>
                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
                        <th>Customer</th>                        
                        <th>{{$cusname->CustomerName}}</th>
                          <?php $i=0; ?>
                    @foreach($customerviewlist as $customers_list)                        
                    <?php
					$i++;  		
					
					$country=\App\Country::where('id', $customers_list->CountryID)->first();
					
					$state=\App\State::where('id', $customers_list->StateID)->first();
									
                    ?> 
                    </tr>
                    </thead>
                    <tr>
                    <td class="customer_backgrd">Contact First Name</td>
                    <td class="customer_backgrd">{{ $customers_list->MainContactFirstname }}</td>
                    </tr>
                    <tr>
                    <td>Contact Last Name</td>
                    <td>{{$customers_list->MainContactLastname	}}</td>
                    </tr>
                     <tr>
                    <td class="customer_backgrd">Phone Number</td>
                    <td class="customer_backgrd">{{ $customers_list->PhoneNumber }}</td>
                    </tr>
                     <tr>
                    <td>Email</td>
                     <td>{{$customers_list->Email}}</td>
                    </tr>
                    <tr>
                    <td class="customer_backgrd">Address</td>
                    
                     <td class="customer_backgrd">{{$customers_list->Suite}} {{$customers_list->Street}}, {{$customers_list->City}}@if($customers_list->StateID!=0), {{$state->StateName}}@endif,  {{$customers_list->ZIPcode}}@if($customers_list->CountryID!=0), {{$country->Country}}@endif </td>
                    </tr>
                    
                   @endforeach
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5">No Customer(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    
                    </div>
      </div>
     </div>
  </div>

         
@endsection

