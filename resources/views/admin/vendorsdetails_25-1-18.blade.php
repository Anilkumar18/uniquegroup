@extends('admin.layouts.vendors')

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
<div class="row">
<div class="col-lg-12">
<div class="col-lg-12 clsbreadcrumb">
       <p> > Vendor Maintenance - Vendors
	   <?php $vendorid=$_GET['id'];  
	   $vendorsdetails=App\Vendors::where('id','=',$vendorid)->where('status','=',1)->first();
		echo "-".$vendorsdetails->CompanyName;
		$customerid=$vendorsdetails->CustomerID;
		 $customerdetails=App\Customers::where('id','=',$customerid)->where('status','=',1)->first();
		 $countryofoperationsid=$vendorsdetails->CountryID;
		 $countrydetails=App\Country::where('id','=',$countryofoperationsid)->where('status','=',1)->first();
	    ?></p>
</div>
        <p style="float:right; cursor:pointer; z-index:1; position:relative; font-size:10px;"><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" style="float:left;padding:0;" class="col-lg-12">
        <div id="form-group">
          <div class="col-lg-12">
			<button class="button" onclick="location.href='{{ url(route('admin.vendorusers'))}}'">Go to Vendor User</button>
            <button class="button" onclick="location.href='{{ url(route('vendors.edit', ['id' => $vendorid])) }}'">Edit Vendor</button>
		  </div>
@if($vendorid!="")
 <div class="col-lg-12 companylogo">
 <img src="{{url('/img/uni-park.png')}}" alt="Image"/>
<!--<img src="/img/roots.png" />-->
@else
 <img src="{{url('/img/image-sample.jpg')}}" alt="Image"/>
@endif
</div>
</div>
</div>
<div class="col-lg-12 clsaddnewvendorform">                      
                       <form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive" style="overflow-x:hidden"> <?php //echo '<pre>'; print_r($vendordetailslist); exit; ?>
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example" style=" width:47%;border-bottom: solid 2px #212121;float:left;" >
                    
                    @if (count($vendordetailslist) > 0)
                    <thead style="border-top: solid 2px #212121; border-bottom: solid 2px #212121;">
                    
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
					
					$InvoiceAddress=\App\OfficeFactoryAddress::where('id', $vendorslist->InvoiceID)->first();	
					
					$InvoiceCountry=\App\Country::where('id', $InvoiceAddress->CountryID)->first();
					
					$InvoiceState=\App\State::where('id', $InvoiceAddress->StateID)->first();	
					
					$DeliveryAddress=\App\OfficeFactoryAddress::where('id', $vendorslist->DeliveryID)->first();		
					
					$DeliveryCountry=\App\Country::where('id', $DeliveryAddress->CountryID)->first();
					
					$DeliveryState=\App\State::where('id', $DeliveryAddress->StateID)->first();	
					
					$deliverymethoddetails=App\DeliveryMethod::where('id','=',$vendorslist->CourierCompanyID)->first();	
					
					$Countryofoperation1=\App\Country::where('id', $vendorslist->Countryofoperation1)->first();	
					
					$Countryofoperation2=\App\Country::where('id', $vendorslist->Countryofoperation2)->first();		
                    ?> 
                    </tr>
                    </thead>
                    <tr>
                    <td style="background-color:#CCCCCC;">Customer</td>
                    <td style="background-color:#CCCCCC;">@if($vendorslist->CustomerID!=0){{$customerdetails->CustomerName}}@endif</td>
                    </tr>
                    
                    <tr>
                    <td>Country of Operations</td>
                    <td>@if($vendorslist->Countryofoperation1!=''){{$Countryofoperation1->Country}}@endif @if($vendorslist->Countryofoperation2!=''), {{$Countryofoperation2->Country}}@endif</td>
                    </tr>
                    <tr>
                    <td style="background-color:#CCCCCC;">Contact Name</td>
                    <td style="background-color:#CCCCCC;">{{$vendorslist->MainContactFirstName	}}</td>
                    </tr>
                    <tr>
                    <td>Contact Last Name</td>
                    <td>{{$vendorslist->MainContactLastName	}}</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">Phone Number</td>
                    <td style="background-color:#CCCCCC;">{{$vendorslist->PhoneNumber}}</td>
                    </tr>
                     <tr>
                    <td>Email</td>
                     <td>{{$vendorslist->Email}}</td>
                    </tr>
                     <tr>
                    <td>Main Office/Factory Address</td>
                    <td>{{$vendorslist->FactoryName}}, {{$vendorslist->Suite}} {{$vendorslist->Street}}, {{$vendorslist->City}}</td>
                    </tr>
                    <tr>
                    <td style="background-color:#CCCCCC;">Invoice Address</td>
                    <td style="background-color:#CCCCCC;">{{$InvoiceAddress->factoryName}}, {{$InvoiceAddress->Suite}} {{$InvoiceAddress->Street}}, {{$InvoiceAddress->City}}</td>
                    </tr>
                     <tr>
                    <td>Delivery Address</td>
                    <td>{{$DeliveryAddress->factoryName}}, {{$DeliveryAddress->Suite}} {{$DeliveryAddress->Street}}, {{$DeliveryAddress->City}}</td>
                    </tr>
                    <tr>
                    <td style="background-color:#CCCCCC;">Delivery Method/Courier Company</td>
                    <td style="background-color:#CCCCCC;">@if($vendorslist->CourierCompanyID!=''){{$deliverymethoddetails->MethodName}}@endif</td>
                    </tr>
                   @endforeach
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Vendor(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    
                    </div>
      </div>
     </div>
  </div>


         
@endsection

