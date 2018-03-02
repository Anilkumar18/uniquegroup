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
  margin-bottom:5%;
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
       <p> > Country Maintenance - States</p>
</div>
        <p style="float:right; cursor:pointer; z-index:1; position:relative; font-size:10px;"><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" style="float:left;">
        
</div>
<div class="col-lg-12 clsaddnewvendorform">
                       <form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive" style="overflow-x:hidden"> 
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example" style=" width:47%;border-bottom: solid 2px #212121;float:left;" >
                    
                    @if (count($stateDetails) > 0)
                    <thead style="border-top: solid 2px #212121; border-bottom: solid 2px #212121;">
                     <?php $i=0; ?>
                    @foreach($stateDetails as $list)                        
                    <?php
					$i++; 
					
					$country=\App\Country::where('id', $list->CountryID)->first(); 						
                    ?> 
                    <tr>
                    <th>State Name</th>                        
                    <th>{{ $list-> StateName }}</th>
                    </tr>
                    </thead>
                    <tr>
                    <td style="background-color:#CCCCCC;">Country Name</td>
                    <td style="background-color:#CCCCCC;">{{ $country->Country }}</td>
                    </tr>
                    @endforeach
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No States(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    
                    </div>
      </div>
     </div>
  </div>


         
@endsection

