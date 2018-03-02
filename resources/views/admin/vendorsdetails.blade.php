@extends('admin.layouts.vendors')
<?php
error_reporting(0);
?>
@section('content')
<style>

</style>
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
       <p> > Vendor Maintenance - Vendors

        @foreach($vendordetailslist as $vendorslist)

        @endforeach
	   <?php //$vendorid=$_GET['id'];  
	   $vendorsdetails=App\Vendors::where('id','=',$vendorslist->id)->where('status','=',1)->first();
		echo "-".$vendorsdetails->CompanyName;
		$customerid=$vendorsdetails->CustomerID;
		 $customerdetails=App\Customers::where('id','=',$customerid)->where('status','=',1)->first();
		 $countryofoperationsid=$vendorsdetails->CountryID;
		 $countrydetails=App\Country::where('id','=',$countryofoperationsid)->where('status','=',1)->first();
	    ?></p>
</div>
        <p class="customer_user_p"><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" class="col-lg-12">
        <div id="form-group">
          <div class="col-lg-12">
			<button class="button vendor_btn" onclick="location.href='{{ url(route('admin.vendorusers'))}}'">Go to Vendor User</button>
            <button class="button" onclick="location.href='{{ url(route('vendors.edit', ['id' => $vendorslist->id])) }}'">Edit Vendor</button>
		  </div>
 
</div>
</div>
<div class="col-lg-12 clsaddnewvendorform">                      
                       <form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive"> 
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example1 vendors_detail_table" >
                    
                    @if (count($vendordetailslist) > 0)
                    <thead class="vendor_user_thead">
                    
                    <tr>
                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
                        <th>Company Name</th>                        
                        <th>{{$vendorsdetails->CompanyName}}</th>
                          <?php $i=0; ?>
                    @foreach($vendordetailslist as $vendorslist)                        
                    <?php
					$i++;  	
					
					$country=\App\Country::where('id', $vendorslist->CountryID)->first();
					
					$state=\App\State::where('id', $vendorslist->StateID)->first();	
					
					$Factory1=\App\OfficeFactoryAddress::where('id', $vendorslist->Factory1ID)->first();
					
					$Factory1State=\App\State::where('id', $Factory1->StateID)->first();
					
					$Factory1Country=\App\Country::where('id', $Factory1->CountryID)->first();
					
					$InvoiceAddress=\App\OfficeFactoryAddress::where('id', $vendorslist->InvoiceID)->first();	
					
					$InvoiceCountry=\App\Country::where('id', $InvoiceAddress->CountryID)->first();
					
					$InvoiceState=\App\State::where('id', $InvoiceAddress->StateID)->first();	
					
					$DeliveryAddress=\App\OfficeFactoryAddress::where('id', $vendorslist->DeliveryID)->first();		
					
					$DeliveryCountry=\App\Country::where('id', $DeliveryAddress->CountryID)->first();
					
					$DeliveryState=\App\State::where('id', $DeliveryAddress->StateID)->first();	
					
					$deliverymethoddetails=App\DeliveryMethod::where('id','=',$vendorslist->CourierCompanyID)->first();	
					
					$Countryofoperation=\App\Country::where('id', $vendorslist->Countryofoperation)->first();	
					
                    ?> 
                    </tr>
                    </thead>
                    <tr>
                    <td class="user_backgrd_color">Customer</td>
                    <td class="user_backgrd_color">@if($vendorslist->CustomerID!=0){{$customerdetails->CustomerName}}@endif</td>
                    </tr>
                    
                    <tr>
                    <td>Country of Operations</td>
                    <td>@if($vendorslist->Countryofoperation!=''){{$Countryofoperation->Country}}@endif</td>
                    </tr>
                    <tr>
                    <td class="user_backgrd_color">Contact Name</td>
                    <td class="user_backgrd_color">{{$vendorslist->MainContactFirstName	}}</td>
                    </tr>
                    <tr>
                    <td>Contact Last Name</td>
                    <td>{{$vendorslist->MainContactLastName	}}</td>
                    </tr>
                     <tr>
                    <td class="user_backgrd_color">Phone Number</td>
                    <td class="user_backgrd_color">{{$vendorslist->PhoneNumber}}</td>
                    </tr>
                     <tr>
                    <td>Email</td>
                     <td>{{$vendorslist->Email}}</td>
                    </tr>
                     <tr>
                    <td class="user_backgrd_color">Main Office / Factory Address</td>
                    <td class="user_backgrd_color">{{$vendorslist->FactoryName}}, {{$vendorslist->Suite}} {{$vendorslist->Street}}, {{$vendorslist->City}}@if($vendorslist->StateID!=''), {{$state->StateName}}@endif, {{$vendorslist->ZIPcode}}@if($vendorslist->CountryID!=''), {{$country->Country}}@endif</td>
                    </tr>
                    <tr>
                    <td>Factory 1 Address</td>
                    <td>{{$Factory1->factoryName}}, {{$Factory1->Suite}} {{$Factory1->Street}}, {{$Factory1->City}}@if($Factory1->StateID!=''), {{$Factory1State->StateName}}@endif, {{$Factory1->zipCode}}@if($Factory1->CountryID!=''), {{$Factory1Country->Country}}@endif</td>
                    </tr>
                    <tr>
                    <td class="user_backgrd_color">Invoice Address</td>
                    <td class="user_backgrd_color">{{$InvoiceAddress->factoryName}}, {{$InvoiceAddress->Suite}} {{$InvoiceAddress->Street}}, {{$InvoiceAddress->City}}@if($InvoiceAddress->StateID!=''), {{$InvoiceState->StateName}}@endif, {{$InvoiceAddress->zipCode}}@if($InvoiceAddress->CountryID!=''), {{$InvoiceCountry->Country}}@endif</td>
                    </tr>
                     <tr>
                    <td>Delivery Address</td>
                    <td>{{$DeliveryAddress->factoryName}}, {{$DeliveryAddress->Suite}} {{$DeliveryAddress->Street}}, {{$DeliveryAddress->City}}@if($DeliveryAddress->StateID!=''), {{$DeliveryState->StateName}}@endif, {{$DeliveryAddress->zipCode}}@if($DeliveryAddress->CountryID!=''), {{$DeliveryCountry->Country}}@endif</td>
                    </tr>
                    <tr>
                    <td class="user_backgrd_color">Delivery Method/Courier Company</td>
                    <td class="user_backgrd_color">@if($vendorslist->CourierCompanyID!=''){{$deliverymethoddetails->MethodName}}@endif</td>
                    </tr>
                   @endforeach
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5" >No Vendor(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    
                    </div>
      </div>
     </div>
  </div>


         
@endsection

