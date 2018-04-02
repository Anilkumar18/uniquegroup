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
            <a href="{{route('user.developmentlistview')}}"><button class="button">Back</button></a>
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
                    <td class="user_backgrd_color"><br />
                       @if($producttype==0)
                       
                       {{Boxes}}
                        @elseif($producttype==1)
                       {{Hook}}
                                            
                       @elseif($producttype==2)
                       {{TissuePaper}}
                      
                      @elseif($producttype==3)
                      {{PackagingStickers}}
                      
                      @endif
                        </td>
                    </tr>
                    
                    <tr>
                    <td>Status</td>
                    <td>{{$status->StatusName}}</td>
                    </tr>
                    <tr>
                    <td class="user_backgrd_color">Version</td>
                    <td class="user_backgrd_color">
                       @if($producttype==0)
                       
                       {{$productdevlopmentlist->Version}}

                        @elseif($producttype==1)
                        
                        <?php $producthook = App\Hook::where('id','=',$productview)->first(); ?>
                       {{$producthook->Version}}
                                            
                       @elseif($producttype==2)
                       <?php $tissprod = App\Tissuepaper::where('id','=',$productview)->first(); ?>
                       {{$tissprod->Version}}
                      
                      @elseif($producttype==3)
                      <?php $packprod = App\PackagingStickers::where('id','=',$productview)->first(); ?>
                      {{$packprod->Version}}
                      
                      @endif
                    </td>
                    </tr>
                     <tr>
                    <td>Sample Requested Date</td>
                    <td>{{$productdevlopmentlist->SampleRequestedDate}}</td>
                    </tr>
                    <tr>
                    <td class="user_backgrd_color">Number of Samples Requested</td>
                    <td class="user_backgrd_color">{{$productdevlopmentlist->NumberOfSamplesRequired}}</td>
                    </tr>

                    <tr>
                    <td>Unique Factory</td>
                    <td>
                      @if($producttype==0)
                       
                       <?php $boxprod = App\Boxes::where('id','=',$productdevlopmentlist->id)->first();
                      $boxval = $boxprod->UniqueFactory1;
                        $valsb = App\UniqueOffices::where('id','=',$boxprod->UniqueFactory1)->first();
                       ?>
                      {{$valsb->OfficeFactoryName}}

                        @elseif($producttype==1)
                        
                        <?php $producthook = App\Hook::where('id','=',$productview)->first();
                          $value = $producthook->UniqueFactory1;
                          $vals = App\UniqueOffices::where('id','=',$producthook->UniqueFactory1)->first();

                         ?>
                       {{$vals->OfficeFactoryName}}
                                            
                       @elseif($producttype==2)
                       <?php $tissprod = App\Tissuepaper::where('id','=',$productview)->first(); 
                        $tissuval = $tissprod->UniqueFactory1;
                        $vals = App\UniqueOffices::where('id','=',$tissprod->UniqueFactory1)->first();
                       ?>
                       {{$vals->OfficeFactoryName}}
                      
                      @elseif($producttype==3)
                      <?php $packprod = App\PackagingStickers::where('id','=',$productview)->first();
                      $packval = $packprod->UniqueFactory1;
                        $vals = App\UniqueOffices::where('id','=',$packprod->UniqueFactory1)->first();
                       ?>
                      {{$vals->OfficeFactoryName}}
                      
                      @endif
                    </td>
                    </tr>

                    <tr>
                    <td class="user_backgrd_color">Quote Required</td>
                    <td class="user_backgrd_color">{{$productdevlopmentlist->QuantityMOQ}}</td>
                    </tr>

                    <tr>
                    <td>Sample Number</td>
                    <td>{{$productdevlopmentlist->SampleRequestNumber}}</td>
                    </tr>

                    <tr>
                    <td class="user_backgrd_color">Sample Date Arrival</td>
                    <td class="user_backgrd_color">{{$productdevlopmentlist->NumberOfSamplesRequired}}</td>
                    </tr>
                    <tr>
                    <td>Comments</td>
                    <td></td>
                    </tr>
                    <tr>
                    <td class="user_backgrd_color">Artwork</td>


                    <td class="user_backgrd_color">
                        @if($producttype==0)
                       
                       <img src="{{ route('user.productpic', ['id' => $productdevlopmentlist->id]) }}" width="100"/>
                        @elseif($producttype==1)
                       
                        <img src="{{ route('user.producthookpic', ['id' => $productview]) }}" width="100"/>
                     
                       @elseif($producttype==2)
                       
                       <img src="{{ route('user.productpictissue', ['id' => $productview]) }}" width="100"/>
                      
                 
                      @elseif($producttype==3)
                        <img src="{{ route('user.productpicpackage', ['id' => $productview]) }}" width="100"/>
                      @endif
                        
                       

                    </td>
                    </tr>
             
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5" >No Products(s) Found</td></tr>
                    @endif

                    </tfoot>
                    </table>
                    </form> 
                    
                    </div>
      </div>
     </div>
  </div>


         
@endsection

