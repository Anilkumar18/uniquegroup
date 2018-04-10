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


<?php //print_r($productdetails_view);


   
 
 $productgroupdetail=\App\ProductGroup::where('id', $productdetails_view->ProductGroupID)->first();
 
$productsubgroupdetail=\App\ProductSubGroup::where('id', $productdetails_view->ProductSubGroupID)->first();
$productprinted=\App\PrintedLabel::where('id', $productdetails_view->PrintedLabelID)->first();
if($productprinted->PrinttypeID!='' && $productprinted->PrinttypeID!=0)
{
$productprinttype=\App\PrintType::where('id', $productprinted->PrinttypeID)->first();
$ptype=$productprinttype->PrintType;
}
else
{
$ptype='';
}
$customername=\App\Customers::where('id',$productdetails_view->CustomerID)->first();
$customerwarehousename = \App\Customers::where('id',$productdetails_view->CustomerWareHouseID)->first();
$pricingmethod = \App\PricingMethod::where('id',$productdetails_view->PricingMethod)->first();

$productionregion = \App\ProductionRegions::where('id', $productprinted->ProductionRegionID1)->first();
$productionregion1 = \App\ProductionRegions::where('id', $productprinted->ProductionRegionID2)->first();
$productionregion2 = \App\ProductionRegions::where('id', $productprinted->ProductionRegionID3)->first();

$uniquefactory1 = \App\OfficeFactoryAddress::where('id', $productprinted->UniqueFactory1)->first();
$uniquefactory2 = \App\OfficeFactoryAddress::where('id', $productprinted->UniqueFactory2)->first();
$uniquefactory2 = \App\OfficeFactoryAddress::where('id', $productprinted->UniqueFactory3)->first();

$inventoryid=\App\Inventory::where('id', $productdetails_view->InventoryID)->first();

$typesoflabelval = \App\TypeofLabels::where('id', $productprinted->TypeofLabelID)->first();
$substrateval = DB::table('substratequality')->where('id', $productprinted->SubstrateQualityID)->first();

$substraterefval = DB::table('substratereference')->where('id', $productprinted->SubstrateReferenceID)->first();



$substratecolorval = DB::table('substratecolor')->where('id', $productprinted->SubstrateColorID)->first();

$typesoffoldval = DB::table('typeoffold')->where('id', $productprinted->TypeoffoldID)->first();

/*$sawspaceval = DB::table('sewspace')->where('id', $productprinted->SewSpaceID)->first();
*/
$finishval = DB::table('finishinglabels')->where('id', $productprinted->FinishingID)->first();

$currencyval = DB::table('currency')->where('id', $productprinted->CurrencyID)->first();

$productproces = DB::table('productprocess')->where('id', $productdetails_view->ProductProcessID)->first();

$productstatus = DB::table('status')->where('id', '=',$productdetails_view->ProductStatusID)->first();
 if($productdetails_view->CurrencyID==1)
 {
    $symbol = '$';
 }
 elseif($productdetails_view->CurrencyID==2)
 {
  $symbol= 0;
 }elseif($productdetails_view->CurrencyID==3)
 {
  $symbol = 'Rs';
 }
 elseif($productdetails_view->CurrencyID==4)
 {
  $symbol = 'RMB';
 }
 elseif($productdetails_view->CurrencyID==5)
 {
  $symbol = 'TRY';
 }
 elseif($productdetails_view->CurrencyID==6)
 {
  $symbol = 'GBP';
 }
elseif($productdetails_view->CurrencyID==7)
 {
  $symbol = 'HKD';
 }
 ?>

<div class="row">

<div class="col-lg-12">
<h2> View Development /Product Details</h2>
<div class="col-lg-12 ecommerce-maintenance">
         <div class="blkcontainer">
           <div class="row">
             <div class="col-md-6 left-cont">
             <h3>E-commerce Product Maintenance Mark's
             </h3>
              <ul class="buttons">
                <li><button class="btn-primary csv-opt">CSV</button></li>
                <li><button class="btn-primary excel-opt">Excel</button></li>
                <li><button class="btn-primary pdf-opt">PDF</button></li>
                <li><button class="btn-primary print-opt">Print</button></li>
               </ul>
              </div>
          <div class="col-md-6 right-cont">
            <div class="back-cont">
               <a href="{{ URL::previous() }}" class="btn-primary back-opt">Back</a>
                 </div>
             <!-- <div class="edit-cont">
               <a href="{{ url(route('productmaintenance.editcustomerproduct', ['id' => $productdetails_view->id])) }}" class="btn-primary edit-opt">Edit</a>
                 </div> -->
  
            </div>
        </div>
      </div>
       <div class="col-lg-12 product-info-form">
      <div class="blkcontainer">
  <div class="panel product-info-panel">
    <div class="panel-body panel-header">PRODUCT INFORMATION</div>
  </div>
</div>

<div class="blkcontainer">
  <form class="form-row" action="/action_page.php">
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Product Group</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productgroupdetail->ProductGroup)){echo $productgroupdetail->ProductGroup;}?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Unique Product Code</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="<?php if(isset($productdetails_view->UniqueProductCode)){echo $productdetails_view->UniqueProductCode;}?>" readonly="readonly">
      </div>
    </div>
      <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Product Sub-group</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productsubgroupdetail->ProductSubGroupName)){echo $productsubgroupdetail->ProductSubGroupName;}?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="desc">Description</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="<?php if(isset($productdetails_view->Description)){echo $productdetails_view->Description; }?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Customer Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($customername->CustomerName)){echo $customername->CustomerName;}?>" readonly="readonly">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="brand">Brand</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productdetails_view->Brand)){echo $productdetails_view->Brand;}?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="brand">Customer Warehouse </label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($customerwarehousename->Warehouse_Name)){echo $customerwarehousename->Warehouse_Name;}?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="status">Status</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="<?php if(isset($productstatus->StatusName)){echo $productstatus->StatusName;}?>" readonly="readonly">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="program">Program Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productdetails_view->ProgramName)){echo $productdetails_view->ProgramName;}?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="pro-proces">Product Process</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" readonly="readonly" value="<?php if(isset($productproces->ProductProcess)){echo $productproces->ProductProcess;}?>">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="cus-pro-name">Customer Product Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productdetails_view->CustomerProductName)){echo $productdetails_view->CustomerProductName; }?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="version">Version</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="<?php if(isset($productdetails_view->Version)){echo $productdetails_view->Version;}?>" readonly="readonly">
      </div>
    </div>
     <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Customer Product Code</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="<?php if(isset($productdetails_view->CustomerProductCode)){echo $productdetails_view->CustomerProductCode;}?>" readonly="readonly">
      </div>
    </div>
  </form>
  <!-- <button class="btn-success edit-opt" style="margin-bottom:20px; float:right">Edit</button> -->
</div>

  </div>

  <div class="col-lg-12 inventory-info-form" style="margin-top:20px;">
      <div class="blkcontainer">
  <div class="panel inventory-panel">
    <div class="panel-body panel-header">INVENTORY INFORMATION</div>
  </div>
</div>
<div class="blkcontainer">
  <form class="form-row" action="/action_page.php">
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Type of inventory</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($inventoryid->InventoryName)){echo $inventoryid->InventoryName;}?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Maximum pieces on stock</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="<?php if(isset($productdetails_view->Maximumpiecesonstock)){echo $productdetails_view->Maximumpiecesonstock;}?>" readonly="readonly">
      </div>
    </div>
      <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Projection</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productdetails_view->Projection)){echo
        $productdetails_view->Projection; }?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="desc">Minimum pieces on stock</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="<?php if(isset($productdetails_view->Minimumpiecesonstock)){echo $productdetails_view->Minimumpiecesonstock;}?>" readonly="readonly">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="brand">Production Region</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
  <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="brand">Unique Factory</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp">
      </div>
    </div>
  </form>
  <!-- <button class="btn-success edit-opt" style="margin-bottom:20px; float:right">Edit</button> -->
</div>

  </div>


  <div class="col-lg-12 quote-cost-form">
      <div class="blkcontainer">
  <div class="panel quote-cost-panel">
    <div class="panel-body panel-header">COST AND SELLING PRICE</div>

    <?php 


                   
                   $currencydetails=App\Currency::where('id','=',$productdetails_view->CurrencyID)->first();      
   $unitofmeasurementdetails=App\UnitofMeasurement::where('id','=',$productdetails_view->UnitofMeasurementID)->first();
   
   $quantitydetails=App\Quote::where('status','=',1)->get();

    $quoterequiredchk=$productdetails_view->QuantityMOQ;
    $costseleteddetails=$productdetails_view->Cost;
    $costrequiredetails=explode("#",$costseleteddetails); 
  
  //print_r($costrequiredetails);
  
    $expquoterequiredchk=explode("#",$quoterequiredchk);
  
  //print_r($expquoterequiredchk);
  
  /*foreach($expquoterequiredchk as $chk)
  {
    echo $chk; echo "<br>";
  }*/

    $pricingmethoddetails=App\PricingMethod::where('id','=',$productdetails_view->PricingMethod)->first();
  
  
  //sellingprice
  
  
  

     

     


         ?>
  </div>
</div>
<div class="blkcontainer">
  <form class="form-horizontal" action="/action_page.php">
      
    
    
    
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Unit of measurement</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="@if($productdetails_view->UnitofMeasurementID!=""){{$unitofmeasurementdetails->UnitofMeasurement}}@endif">
      </div>
    </div>
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Currency</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="@if($productdetails_view->CurrencyID!=""){{$currencydetails->Currency}}     @endif">
      </div>
    </div>
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Minimum Order Quantity</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="@if($productdetails_view->MinimumOrderQuantity!=""){{$productdetails_view->MinimumOrderQuantity}}
                   @endif">
      </div>
    </div>
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Minimum Order Value</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="{{$symbol}}@if($productdetails_view->MinimumOrderValue!=""){{$productdetails_view->MinimumOrderValue}}@endif">
      </div>
    </div>
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Pack Size</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="@if($productdetails_view->PackSize!=""){{$productdetails_view->PackSize}}@endif">
      </div>
    </div>
   
     
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Sample Cost</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="{{$symbol}}<?php if(isset($productdetails_view->SellingPrice)){echo $productdetails_view->SellingPrice;}?>">
      </div>
    </div>
   

  </form>
  
  
</div>
</div>
 
    <div class="col-lg-12 product-detail-form">
      <div class="blkcontainer">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS</div>
  </div>
  </div>
  <div class="blkcontainer">
  <form class="form-row" action="/action_page.php">

    
    
    
    
<?php 

  $sawspacelist = $productprinted->SewSpaceID;
  $sawexplodeval = explode(",",$sawspacelist); 

 ?>
  <label class="control-label col-md-12" for="pro-grp">Saw Space</label>
 <?php
      $fielddetailslist=DB::table('sewspace')->orderBy('id', 'ASC')->get();
     $sew=0;
    foreach ($fielddetailslist as $fielddetails){ ?>
     
 <div class="row">
     
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp"><?php echo $fielddetails->SewSpace; ?></label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($sawexplodeval[$sew])){echo $sawexplodeval[$sew]; }?>">
      </div>
    </div>


  </div>
   <?php $sew++; } ?>

        
    @if($productprinted->InkColor1!="")
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Ink Color 1 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productprinted->InkColor1)){echo $productprinted->InkColor1;}?>">
      </div>
    </div>
     @endif
    @if($productprinted->InkColor2!="")
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Ink Color 2 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productprinted->InkColor2)){echo $productprinted->InkColor2;}?>">
      </div>
    </div>
    @endif
    @if($productprinted->InkColor3!="")
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Ink Color 3 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productprinted->InkColor3)){echo $productprinted->InkColor3;}?>">
      </div>
    </div>
    @endif
    @if($productprinted->InkColor4!="")
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Ink Color 4 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productprinted->InkColor4)){echo $productprinted->InkColor4;}?>">
      </div>
    </div>
    @endif
    
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Finishing / Coating</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($finishval->FinishingCoatingLabels)){echo $finishval->FinishingCoatingLabels;}?>">
      </div>
    </div>
   
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Print Type</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="<?php if(isset($ptype)){echo $ptype;}?>" readonly="readonly">
      </div>
    </div>
     
   
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="program">Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productprinted->Width)){echo $productprinted->Width; }?>" readonly="readonly">
      </div>
    </div>
    
     <div class="blkform-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="<?php if(isset($productprinted->Length)){echo $productprinted->Length;}?>" readonly="readonly">
      </div>
    </div>
   
</div>
</div>
  <div class="col-lg-12 product-images">
      <div class="blkcontainer">
  <div class="panel Image-panel">
    <div class="panel-body panel-header">IMAGE</div>
  </div>
  <div class="blkcontainer">
  <div class="img-thumbnail" style="width:150px; height:150px;">
    <img id="sampleimg" src="{{ route('user.printedlabelpic', ['id' => $productdetails_view->PrintedLabelID]) }}" alt="your image" width="150" height="150" />
  </div>
  
  </div>
</div>
</div>
       
  
       
   
</div>


</div>
</div>
</div>





         

@endsection



