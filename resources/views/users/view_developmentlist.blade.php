@extends('users.layouts.developmentlist')
<?php
error_reporting(0);
?>
@section('content')
<style>

</style>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="col-lg-12">
    <div class="col-lg-12">
                        <img class="dashboard-mainimg"  src="{{ asset("/img/test2.png")}} " />
                        
                    </div>
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
       <p> > Developmentlist - Productlist

       <!--  @foreach($productdevlopmentlist as $productviewlist)

        @endforeach -->
        <?php 

       //echo"<pre>"; print_r($productdevlopmentlist->Brand);exit;

        ?>
	   <!-- <?php 
	   $vendorsdetails=App\Vendors::where('id','=',$productviewlist->id)->where('status','=',1)->first();
		echo "-".$vendorsdetails->CompanyName;
		$customerid=$vendorsdetails->CustomerID;
		 $customerdetails=App\Customers::where('id','=',$customerid)->where('status','=',1)->first();
		 $countryofoperationsid=$vendorsdetails->CountryID;
		 $countrydetails=App\Country::where('id','=',$countryofoperationsid)->where('status','=',1)->first();
	    ?> --></p>
</div>
        <p class="customer_user_p"><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" class="col-lg-12">
        <div id="form-group">
          <div class="col-lg-12">
			<!-- <button class="button vendor_btn" onclick="location.href='{{ url(route('admin.vendorusers'))}}'">Go to Vendor User</button> -->
            <button class="button" onclick="location.href=''">Edit Product</button>
            <a href="{{route('user.developmentlist')}}"><button class="button">Back</button></a>
		  </div>
 
</div>
</div>
<div class="col-lg-12 clsaddnewvendorform">                      
                       <form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive"> 
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example1 vendors_detail_table" >
                    
                    @if (count($productdevlopmentlist) > 0)
                    <thead class="vendor_user_thead">
                    
                    <tr>
                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
                        <th>Product Details</th>                        
                        <th></th>
                          <?php $i=0; ?>
                                
                    <?php
					$i++;  	
						$productsubgroupdetails=App\ProductSubGroup::where('id','=',$productdevlopmentlist->ProductSubGroupID)->first();				
                  					
                    ?> 
                    </tr>
                    </thead>
                    <tr>
                    <td class="user_backgrd_color">Customer</td>
                    <td class="user_backgrd_color">{{$customers->CustomerName}}</td>
                    </tr>
                    
                    <tr>
                    <td>Brand</td>
                    <td>{{$productdevlopmentlist->Brand}}</td>
                    </tr>
                    <tr>
                    <td class="user_backgrd_color">Program Name</td>
                    <td class="user_backgrd_color">{{$productdevlopmentlist->ProgramName}}</td>
                    </tr>
                    <tr>
                    <td>Customer Product Name</td>
                    <td>{{$productdevlopmentlist->CustomerProductName}}</td>
                    </tr>
                     <tr>
                    <td class="user_backgrd_color">Customer Product Code</td>
                    <td class="user_backgrd_color">{{$productdevlopmentlist->CustomerProductCode}}</td>
                    </tr>
                     <tr>
                    <td>Unique Product code</td>
                     <td>{{$productdevlopmentlist->UniqueProductCode}}</td>
                    </tr>
                     <tr>
                    <td class="user_backgrd_color">Products</td>
                    <td class="user_backgrd_color">
                     <?php
                     if($productdevlopmentlist->BoxID!="" && $productdevlopmentlist->BoxID<>0)
                       echo "Boxes";echo "<br/>";
                       if($productdevlopmentlist->HookID!="" && $productdevlopmentlist->HookID<>0)
                       echo "Hook";echo "<br/>";
                       if($productdevlopmentlist->TissuePaperID!="" && $productdevlopmentlist->TissuePaperID <> 0)
                       echo "Tissue Paper";echo "<br/>";
                       if($productdevlopmentlist->PackagingStickersID!="" && $productdevlopmentlist->PackagingStickersID<>0)
                       echo "Packaging Stickers";echo "<br/>";
                       ?>   

                    </td>
                    </tr>
                    <tr>
                    <td>Status</td>
                    <td>{{$status->StatusName}}</td>
                    </tr>
                    <tr>
                    <td class="user_backgrd_color">Version</td>
                    <td class="user_backgrd_color">{{$productdevlopmentlist->Version}}</td>
                    </tr>
                     <tr>
                    <td>Sample Requested Date</td>
                    <td>{{$productdevlopmentlist->SampleRequestedDate}}</td>
                    </tr>
                    <tr>
                    <td class="user_backgrd_color">Number of Samples Requested</td>
                    <td class="user_backgrd_color">{{$productdevlopmentlist->NumberOfSamplesRequired}}</td>
                    </tr>
             
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

