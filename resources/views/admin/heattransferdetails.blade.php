@extends('admin.layouts.addheattransfers')
<?php
error_reporting(0);
?>


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

/*.button:hover {background-color: #00ADEF}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}*/
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
       <p> > Product Maintenance - Mark's - Labels - HeatTransfers - Add Product- Product Details
	  </p>
</div>
        <p style="float:right; cursor:pointer; z-index:1; position:relative; font-size:10px;"><a href="javascript:window.print();" > Print Current Page </a></p>
        <div id="row" style="float:left;padding:0;" class="col-lg-12">
        <div id="form-group">
          

</div>
</div>
<div class="col-lg-12 clsaddnewvendorform">                      
<form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive" style="overflow-x:hidden">
                      
                    <table class="table table-striped table-bordered table-hover dataTables-example" style=" width:47%;border-bottom: solid 2px #212121;float:left;" >
                    
                      @if (count($productdetails) > 0)
                    <thead style="border-top: solid 2px #212121; border-bottom: solid 2px #212121;">
                     <tr>
                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->
                        <th>Brand</th>
                        <th>{{$productdetails->	Brand}}</th>                        
                       
                    </tr>
                   
                    </thead>
                   <tr>
                      
                        <td style="background-color:#CCCCCC;">Program Name</td>  
                        <td style="background-color:#CCCCCC;">{{$productdetails->ProgramName}}</td>                      
                    </tr>
                    <tr>
                    <td>Product Group</td>
                    <td>{{$productgroupdetails->ProductGroup}}</td>
                    </tr>
                    <tr>
                    <td style="background-color:#CCCCCC;">Product SubGroup</td>
                    <td style="background-color:#CCCCCC;">{{$productsubgroupdetails->ProductSubGroupName}}</td>
                    </tr>
                     <tr>
                    <td>Customer Product Name</td>
                    <td>{{$productdetails->CustomerProductName}}</td>
                    </tr>
                    <tr>
                    <td style="background-color:#CCCCCC;">Customer Product Code</td>
                    <td style="background-color:#CCCCCC;">{{$productdetails->CustomerProductCode}}</td>
                    </tr>
                    <tr>
                    <td>Unique Product Code</td>
                    <td>{{$productdetails->UniqueProductCode}}</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">Description</td>
                    <td style="background-color:#CCCCCC;">{{$productdetails->Description}}</td>
                    </tr>
                     <tr>
                    <td>Product Process</td>
                    <td>{{$productprocessdetails->ProductProcess}}</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">Production Region</td>
                     <td style="background-color:#CCCCCC;">{{$productionregions1->ProductionRegions}}</td>
                    </tr>
                     <tr>
                    <td>Unique Factory</td>
                    <td>{{$uniquefactorydetails->OfficeFactoryName}}</td>
                    </tr>
                      <tr>
                    <td style="background-color:#CCCCCC;">Pricing Method</td>
                    <td style="background-color:#CCCCCC;">{{$pricingmethodetails->PricingMethod}}</td>
                    </tr>
                     <tr>
                    <td>Currency</td>
                    <td>{{$currencymethodetails->Currency}}</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">Unit of Measurement</td>
                   <td  style="background-color:#CCCCCC;">{{$unitofmeasurementetails->UnitofMeasurement}}</td>
                    </tr>
                     
                     <tr>
                    <td>Minimum Order Quantity</td>
                    <td>{{$productdetails->MinimumOrderQuantity}}</td>
                    </tr>
                    <tr>
                    <td  style="background-color:#CCCCCC;">Minimum Order Value</td>
                     <td  style="background-color:#CCCCCC;">{{$productdetails->MinimumOrderValue}}</td>
                    </tr>
                      <tr>
                    <td>PackSize</td>
                     <td>{{$productdetails->PackSize}}</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">Selling Price</td>
                    <td style="background-color:#CCCCCC;">{{$productdetails->SellingPrice}}</td>
                    </tr>
                    <tr>
                    <td>Inventory</td>
                   <td>{{$inventorydetails->InventoryName}}</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">Unique Factory Inventory</td>
                    <td style="background-color:#CCCCCC;">&nbsp;</td>
                    </tr>
                       <tr>
                    <td>MaximumPiecesOnStock</td>
                    <td>{{$inventorylist->MaximumPiecesOnStock}}</td>
                    </tr>
                      <tr>
                    <td style="background-color:#CCCCCC;">MinimumPiecesOnStock</td>
                    <td style="background-color:#CCCCCC;">{{$inventorylist->MinimumPiecesOnStock}}</td>
                    </tr>
                     <tr>
                    <td>TypeofLabel</td>
                    <td>{{$typeoflabeldetails->TypeofLabels}}</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">TypeofHeattransfer</td>
                    <td style="background-color:#CCCCCC;">{{$typeofheattransferdetails->TypeofHeatTransfer}}</td>
                    </tr>
                      <tr>
                    <td>Finish</td>
                    <td>{{$finishdetails->Finish}}</td>
                    </tr>
                     <tr>
                    <td style="background-color:#CCCCCC;">Width</td>
                    <td style="background-color:#CCCCCC;">{{$heattransferdetails->Width}}</td>
                    </tr>
                    <tr>
                    <td>Length</td>
                     <td>{{$heattransferdetails->Length}}</td>
                    </tr>
                      <tr>
                    <td style="background-color:#CCCCCC;">Colors</td>
                    <td style="background-color:#CCCCCC;">{{$heattransferdetails->PrintColor1}},{{$heattransferdetails->PrintColor2}},{{$heattransferdetails->PrintColor3}},{{$heattransferdetails->PrintColor4}}</td>
                    </tr>
                       <tr>
                    <td>Application</td>
                    <td>{{$applicationdetails->Application}}</td>
                    </tr>
                     <tr>
                   
                     
                    <tfoot>
                    @else
                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No Heattransfer(s) Found</td></tr>
                 
                     @endif
                    </tfoot>
                    </table>
                     <table class="table table-striped table-bordered table-hover dataTables-example" style="width:47%;" >
                    <tr>
                    <td><h3>Art Work</h3></td>
                    
                    </tr>
                    <tr>
                    <?php
				    $image=$heattransferdetails->Artwork;
					?>
                    @if($image!="")
                    <td><img src="http://localhost/laravel/uniquegroup/storage/app/<?php echo $image; ?>"  width="150" height="150"/></td>
                    @else
                    <img id="blah" src="storage/data/product/" alt="" width="150" height="150" /> <img id="blah" src="{{ asset('/img/image-sample.jpg') }}" alt="your image" width="150" height="150" />
                    @endif
                    </tr>
                   
                     
                    </table>
                    </form> 
                    </div>
      </div>
     </div>
  </div>


         
@endsection

