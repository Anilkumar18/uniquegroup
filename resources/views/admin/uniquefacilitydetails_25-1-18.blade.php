@extends('admin.layouts.uniquefacility')

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
       <p> > Unique Maintenance - Unique Facilities
	   <?php $uniqueid=$_GET['id'];  
	   $uniquedetailsdetails=App\UniqueOffices::where('id','=',$uniqueid)->where('status','=',1)->first();
		echo "- ".$uniquedetailsdetails->Factory1OfficeFactoryName;
		
	    ?></p>
</div>
        <p style="float:right; cursor:pointer; z-index:1; position:relative; font-size:10px;"><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" style="float:left;padding:0;" class="col-lg-12">
        <div id="form-group">
          <div class="col-lg-12">
			<button class="button" onclick="location.href='{{ url(route('admin.uniqueusers'))}}'">Go to Unique User</button>
            <button class="button" onclick="location.href='{{ url(route('admin.uniquefacilityedit', ['id' =>$uniqueid])) }}'">Edit Unique Facilities</button>
		  </div>
 <div class="col-lg-12 companylogo">
</div>
</div>
</div>
<div class="col-lg-12 clsaddnewvendorform">                      
<form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive" style="overflow-x:hidden">
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example" style=" width:47%;border-bottom: solid 2px #212121;float:left;" >
                    
                    @if (count($uniquefacilitydetailslist) > 0)
                    <thead style="border-top: solid 2px #212121; border-bottom: solid 2px #212121;">
                    
                    <tr>
                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
                        <th>Office/Factory Name</th>                        
                        <th>{{$uniquedetailsdetails->Factory1OfficeFactoryName}}</th>
                          <?php $i=0; ?>
                    @foreach($uniquefacilitydetailslist as $uniquefacilitieslist)                        
                    <?php
					$i++;  						
                    ?> 
                    </tr>
                    </thead>
                    <?php
					$marketingregionsdetails=App\MarketingRegions::where('id','=',$uniquefacilitieslist->Factory1MarketingRegionID)->first();
					$productionregionsdetails=App\ProductionRegions::where('id','=',$uniquefacilitieslist->Factory1ProductionRegionID)->first();
					$countrydetails=App\Country::where('id','=',$uniquefacilitieslist->Factory1CountryID)->first();
					$statedetails=App\State::where('id','=',$uniquefacilitieslist->Factory1StateID)->first();
					
					?>
                    <tr>
                    <td style="background-color:#CCCCCC;">Marketing Regions</td>
                    <td style="background-color:#CCCCCC;">@if($uniquefacilitieslist->Factory1MarketingRegionID!=0){{$marketingregionsdetails->MarketingRegions}}@endif</td>
                    </tr>
                    <tr>
                    <td>Production Regions</td>
                    <td>@if($uniquefacilitieslist->Factory1ProductionRegionID!=0){{$productionregionsdetails->ProductionRegions}}@endif</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">First Name</td>
                    <td style="background-color:#CCCCCC;">{{$uniquefacilitieslist->Factory1MainContactFirstName	}}</td>
                    </tr>
                    <tr>
                    <td>Last Name</td>
                    <td>{{$uniquefacilitieslist->Factory1MainContactLastName}}</td>
                    </tr>
                    <tr>
                    <td style="background-color:#CCCCCC;">Phone Number</td>
                    <td style="background-color:#CCCCCC;">{{$uniquefacilitieslist->Factory1PhoneNumber}}</td>
                    </tr>
                     <tr>
                    <td>Email</td>
                    <td>{{$uniquefacilitieslist->Factory1Email}}</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">Address</td>
                    <td style="background-color:#CCCCCC;">{{$uniquefacilitieslist->Factory1Suite}} {{$uniquefacilitieslist->Factory1Street}}, {{$uniquefacilitieslist->Factory1City}}@if($uniquefacilitieslist->Factory1StateID!=0), {{$statedetails->StateName}}@endif, {{$uniquefacilitieslist->Factory1ZIPcode}}@if($uniquefacilitieslist->Factory1CountryID!=0), {{$countrydetails->Country}}@endif</td>
                    </tr>
                     <tr>
                   
                   @endforeach
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Facility(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    </div>
      </div>
     </div>
  </div>


         
@endsection

