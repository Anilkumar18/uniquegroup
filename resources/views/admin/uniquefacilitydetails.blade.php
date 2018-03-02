@extends('admin.layouts.uniquefacility')

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
       <p> > Unique Maintenance - Unique Facilities
        @foreach($uniquefacilitydetailslist as $uniquefacilitieslist)

        @endforeach

	   <?php //$uniqueid=$_GET['id']; 

	   $uniquedetailsdetails=App\UniqueOffices::where('id','=',$uniquefacilitieslist->id)->where('status','=',1)->first();
		echo "- ".$uniquedetailsdetails->Factory1OfficeFactoryName;
		
	    ?></p>
</div>
        <p class="unique_facility_p" style=""><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" class="col-lg-12 unique_facility_div">
        <div id="form-group">
          <div class="col-lg-12">
			<button class="button" onclick="location.href='{{ url(route('admin.uniqueusers'))}}'">Unique Users</button>
            <button class="button" onclick="location.href='{{ url(route('admin.uniquefacilityedit', ['id' =>$uniquefacilitieslist->id])) }}'">Edit Unique Facilities</button>
		  </div>
 <div class="col-lg-12 companylogo">
</div>
</div>
</div>
<div class="col-lg-12 clsaddnewvendorform">                      
<form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive">
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example1 unique_facility_table"  >
                    
                    @if (count($uniquefacilitydetailslist) > 0)
                    <thead class="unique_facility_thead" >
                    
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
					$marketingregionsdetails=App\MarketingRegions::where('id','=',$uniquefacilitieslist->MarketingRegionID)->first();
					$productionregionsdetails=App\ProductionRegions::where('id','=',$uniquefacilitieslist->ProductionRegionID)->first();
					$countrydetails=App\Country::where('id','=',$uniquefacilitieslist->CountryID)->first();
					$statedetails=App\State::where('id','=',$uniquefacilitieslist->StateID)->first();
					
					?>
                    <!-- <tr>
                    <td style="background-color:#CCCCCC;">Marketing Regions</td>
                    <td style="background-color:#CCCCCC;">@if($uniquefacilitieslist->MarketingRegionID!=0){{$marketingregionsdetails->MarketingRegions}}@endif</td>
                    </tr> -->
                    <tr>
                    <td>Production Region</td>
                    <td>@if($uniquefacilitieslist->ProductionRegionID!=0){{$productionregionsdetails->ProductionRegions}}@endif</td>
                    </tr>
                     <tr>
                    <td class="unique_table_backgrd">First Name</td>
                    <td class="unique_table_backgrd">{{$uniquefacilitieslist->MainContactFirstName	}}</td>
                    </tr>
                    <tr>
                    <td>Last Name</td>
                    <td>{{$uniquefacilitieslist->MainContactLastName}}</td>
                    </tr>
                    <tr>
                    <td class="unique_table_backgrd">Phone Number</td>
                    <td class="unique_table_backgrd">{{$uniquefacilitieslist->PhoneNumber}}</td>
                    </tr>
                     <tr>
                    <td>Email</td>
                    <td>{{$uniquefacilitieslist->Email}}</td>
                    </tr>
                     <tr>
                    <td class="unique_table_backgrd">Address</td>
                    <td class="unique_table_backgrd">{{$uniquefacilitieslist->Suite}} {{$uniquefacilitieslist->Street}}, {{$uniquefacilitieslist->City}}@if($uniquefacilitieslist->StateID!=0), {{$statedetails->StateName}}@endif, {{$uniquefacilitieslist->ZIPcode}}@if($uniquefacilitieslist->CountryID!=0), {{$countrydetails->Country}}@endif</td>
                    </tr>
                     <tr>
                   
                   @endforeach
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5">No Facility(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    </div>
      </div>
     </div>
  </div>


         
@endsection

