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

$productprinttype=\App\PrintType::where('status','=','1')->get();
foreach($productprinttype as $listim)
{
//print_r($listim->PrinttypeID);

}

$pricingmethod = \App\PricingMethod::where('id',$productdetails_view->PricingMethod)->first();

$productionregion = \App\ProductionRegions::where('status','=','1')->get();

$uniqueoffice = DB::table('uniqueoffices')->where('status', '=','1')->get();

$inventoryid=\App\Inventory::where('status','=','1')->get();

$seasondetails = \App\Season::where('status','=','1')->get();

$typesoflabelval = \App\TypeofLabels::where('id', $productprinted->TypeofLabelID)->first();
$substrateval = DB::table('substratequality')->where('id', $productprinted->SubstrateQualityID)->first();

$substraterefval = DB::table('substratereference')->where('id', $productprinted->SubstrateReferenceID)->first();

$customername=\App\Customers::where('id',$productdetails_view->CustomerID)->first();
$customerwarehousename = \App\Customers::where('id',$productdetails_view->CustomerWareHouseID)->first();

$substratecolorval = DB::table('substratecolor')->where('id', $productprinted->SubstrateColorID)->first();

$typesoffoldval = DB::table('typeoffold')->where('id', $productprinted->TypeoffoldID)->first();

/*$sawspaceval = DB::table('sewspace')->where('id', $productprinted->SewSpaceID)->first();
*/
$finishval = DB::table('finishinglabels')->where('id', $productprinted->FinishingID)->first();

$currencyval = DB::table('currency')->where('id', $productprinted->CurrencyID)->first();

$productproces = DB::table('productprocess')->where('status', '=','1')->get();

$productstatus = DB::table('status')->where('status', '=','1')->get();
 /*if($productdetails_view->CurrencyID==1)
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
 }*/
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
   <form name="customerproductsadd" id="customerproductsadd" method="post" action="{{route('productmaintenance.update_customerproductsdetails')}}" class="form-horizontal wizard-big" enctype="multipart/form-data">
{{ csrf_field() }}
    <input type="hidden" name="ProductGroup" id="ProductGroup" value="{{$productdetails_view->ProductGroupID}}" />
    <input type="hidden" name="editID" id="editID" value="{{$productdetails_view->id}}" />

     <input type="hidden" name="productid" id="productid" value="{{$productdetails_view->PrintedLabelID}}" />
<input type="hidden" name="productsubgroupurl" id="productsubgroupurl" value="<?php echo url('/');?>" />

    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Product Group</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="Product_grp" name="Product_grp" value="<?php if(isset($productgroupdetail->ProductGroup)){echo $productgroupdetail->ProductGroup;}?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Unique Product Code</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="Unique_Product"  name="Unique_Product" value="<?php if(isset($productdetails_view->UniqueProductCode)){echo $productdetails_view->UniqueProductCode;}?>" >
      </div>
    </div>
      <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Product Sub-group</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-subgrp" value="<?php if(isset($productsubgroupdetail->ProductSubGroupName)){echo $productsubgroupdetail->ProductSubGroupName;}?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="desc">Description</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="description" value="<?php if(isset($productdetails_view->Description)){echo $productdetails_view->Description; }?>" >
      </div>
    </div>
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Customer Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="CustomerID" value="<?php if(isset($customername->CustomerName)){echo $customername->CustomerName;}?>" readonly="readonly">
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="brand">Brand</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="brand" value="<?php if(isset($productdetails_view->Brand)){echo $productdetails_view->Brand;}?>" >
      </div>
    </div>
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="brand">Customer Warehouse </label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="CustomerWareHouseID" value="<?php if(isset($customerwarehousename->Warehouse_Name)){echo $customerwarehousename->Warehouse_Name;}?>" readonly="readonly">
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="status">Status</label><div class="col-md-8"> 
      <select id="statusid" name="statusid" class="dropdownwidth">
        <option>Please Select the Status name:      </option>
      @foreach ($productstatus as $statuslist)
               
         <option value="{{$statuslist->id}}" @if($productdetails_view->ProductStatusID==$statuslist->id)selected="selected" @endif>{{ $statuslist->StatusName }}</option>
     
      @endforeach
    </select> </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="status">Season</label>
      <div class="col-md-8">          
      <select id="Seasonname" name="Seasonname" class="dropdownwidth">
      @foreach ($seasondetails as $fielddetails)
         <option value="{{$fielddetails->id}}" @if($productdetails_view->SeasonID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->Season }}</option>
      @endforeach
    </select>
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="program">Program Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="program_name" value="<?php if(isset($productdetails_view->ProgramName)){echo $productdetails_view->ProgramName;}?>" >
      </div>
    </div>
    <div class="blkform-group  col-md-6">
       <label class="control-label col-md-4" for="status">Product Process</label>
      <div class="col-md-8">          
      <select id="Productprocess" name="Productprocess" class="dropdownwidth">
      @foreach ($productproces as $fielddetail)
         <option value="{{$fielddetail->id}}" @if($productdetails_view->ProductProcessID==$fielddetail->id)selected="selected" @endif>{{ $fielddetail->ProductProcess }}</option>
      @endforeach
    </select>
      </div>
    </div>
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="cus-pro-name">Customer Product Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="customerproductname" value="<?php if(isset($productdetails_view->CustomerProductName)){echo $productdetails_view->CustomerProductName; }?>" >
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="version">Version</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="version" value="<?php if(isset($productdetails_view->Version)){echo $productdetails_view->Version;}?>" readonly="readonly">
      </div>
    </div>
     <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Customer Product Code</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="customerproductcode" value="<?php if(isset($productdetails_view->CustomerProductCode)){echo $productdetails_view->CustomerProductCode;}?>" >
      </div>
    </div>
  
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
     <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="status">Types of Inventory</label>
      <div class="col-md-8">          
      <select id="Inventory" name="Inventory" class="col-md-6 dropdownwidth">
      @foreach ($inventoryid as $inventoryli)
         <option value="{{$inventoryli->id}}" @if($productdetails_view->InventoryID==$inventoryli->id)selected="selected" @endif>{{ $inventoryli->InventoryName }}</option>
      @endforeach
    </select>
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Maximum pieces on stock</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="maximumstock" value="<?php if(isset($productdetails_view->Maximumpiecesonstock)){echo $productdetails_view->Maximumpiecesonstock;}?>" >
      </div>
    </div>
      <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Projection</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="projection" value="<?php if(isset($productdetails_view->Projection)){echo
        $productdetails_view->Projection; }?>" >
      </div>
    </div>
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="desc">Minimum pieces on stock</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="minimumstock" value="<?php if(isset($productdetails_view->Minimumpiecesonstock)){echo $productdetails_view->Minimumpiecesonstock;}?>" >
      </div>
    </div>
          
    @if($productdetails_view->ProductionRegionID1!="")
  <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="status">Production Region 1</label>
      <div class="col-md-8">          
      <select id="inventoryProductionRegions1" name="inventoryProductionRegions1" class="col-md-6 dropdownwidth regionselect">
      @foreach ($productionregion as $regionlist)
         <option value="{{$regionlist->id}}" @if($productdetails_view->ProductionRegionID1==$regionlist->id)selected="selected" @endif>{{ $regionlist->ProductionRegions }}</option>
      @endforeach
    </select>
      </div>
    </div>

     <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="status">Unique Factory 1</label>
      <div class="col-md-8 test">          
      <select id="uniquefactory1" name="inventoryuniquefactory1" class="col-md-6 dropdownwidth">
        <option value="">Please Select</option>
         <input type="hidden" id="uniquefactory1" class="uniquefactory1" name="uniquefactory1" value="{{$productdetails_view->UniqueFactory2}}" /> 
    </select>
      </div>
    </div>
     @endif
     @if($productdetails_view->ProductionRegionID2!="")
     <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="status">Production Region 2</label>
      <div class="col-md-8">          
      <select id="inventoryProductionRegions2" name="inventoryProductionRegions2" class="col-md-6 dropdownwidth regionselect1">
      @foreach ($productionregion as $regionlist)
         <option value="{{$regionlist->id}}" @if($productdetails_view->ProductionRegionID2==$regionlist->id)selected="selected" @endif>{{ $regionlist->ProductionRegions }}</option>
      @endforeach
    </select>
      </div>
    </div>
     <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="status">Unique Factory 2</label>
      <div class="col-md-8 test1">          
      <select id="uniquefactory1" name="inventoryuniquefactory2" class="col-md-6 dropdownwidth">
        <option value="">Please Select</option>
         <input type="hidden" id="uniquefactory1" class="uniquefactory1" name="uniquefactory1" value="{{$productdetails_view->UniqueFactory2}}" /> 
    </select>
      </div>
    </div>
    @endif
     @if($productdetails_view->ProductionRegionID3!="")
    <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="status">Production Region 3</label>
      <div class="col-md-8">          
      <select id="inventoryProductionRegions3" name="inventoryProductionRegions3" class="col-md-6 dropdownwidth regionselect2">
      @foreach ($productionregion as $regionlist)
         <option value="{{$regionlist->id}}" @if($productdetails_view->ProductionRegionID3==$regionlist->id)selected="selected" @endif>{{ $regionlist->ProductionRegions }}</option>
      @endforeach
    </select>
      </div>
    </div>
     <div class="blkform-group col-md-6 ">
      <label class="control-label col-md-4" for="status">Unique Factory 3</label>
      <div class="col-md-8 test2">          
      <select id="uniquefactory1" name="inventoryuniquefactory3" class="col-md-6 dropdownwidth">
        <option value="">Please Select</option>
         <input type="hidden" id="uniquefactory1" class="uniquefactory1" name="uniquefactory1" value="{{$productdetails_view->UniqueFactory2}}" /> 
    </select>
      </div>
    </div>
    @endif



  <!-- <button class="btn-success edit-opt" style="margin-bottom:20px; float:right">Edit</button> -->
</div>

  </div>


  <div class="col-lg-12 quote-cost-form">
      <div class="blkcontainer">
  <div class="panel quote-cost-panel">
    <div class="panel-body panel-header">COST AND SELLING PRICE</div>

    <?php 


                   
                   $currencydetails=App\Currency::where('status','=','1')->get();
   $unitofmeasurementdetails=App\UnitofMeasurement::where('status','=','1')->get();
   
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
     
    
    
    
     <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="status">Unit of Measurement</label>
      <div class="col-md-8">          
      <select id="unitofmeasurement" name="unitofmeasurement" class="dropdownwidth">
      @foreach ($unitofmeasurementdetails as $measurelist)
         <option value="{{$measurelist->id}}" @if($productdetails_view->UnitofMeasurementID==$measurelist->id)selected="selected" @endif>{{ $measurelist->UnitofMeasurement }}</option>
      @endforeach
    </select>
      </div>
    </div>
     <div class="blkform-group col-md-6">
       <label class="control-label col-md-4" for="status">Currency</label>
      <div class="col-md-8">          
      <select id="Currency" name="Currency" class="dropdownwidth">
      @foreach ($currencydetails as $currenctlist)
         <option value="{{$currenctlist->id}}" @if($productdetails_view->CurrencyID==$currenctlist->id)selected="selected" @endif>{{ $currenctlist->Currency }}</option>
      @endforeach
    </select>
      </div>
    </div>
     <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="Pricing Method">Minimum Order Quantity</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="mininumorderqua"  name="mininumorderqua" value="@if($productdetails_view->MinimumOrderQuantity!=""){{$productdetails_view->MinimumOrderQuantity}}
                   @endif">
      </div>
    </div>
     <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="Pricing Method">Minimum Order Value</label>
      <div class="col-md-8">
        <div class="input-group"><span class="input-group-addon currencytype"></span>
        <input type="text" class="form-control" id="minimumorderval"  name="minimumorderval" value="@if($productdetails_view->MinimumOrderValue!=""){{$productdetails_view->MinimumOrderValue}}@endif">
      </div>
    </div>
    </div>
     <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="Pricing Method">Pack Size</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="packsize"  name="packsize" value="@if($productdetails_view->PackSize!=""){{$productdetails_view->PackSize}}@endif">
      </div>
    </div>
   
     
     <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="Pricing Method">Sample Cost</label>
      <div class="col-md-8">
        <div class="input-group"><span class="input-group-addon currencytype"></span>
        <input type="text" class="form-control" id="samplecost"  name="samplecost" value="<?php if(isset($productdetails_view->SellingPrice)){echo $productdetails_view->SellingPrice;}?>">
      </div>
    </div>
   

 
  
</div>

 
    <div class="col-lg-12 product-detail-form">
      <div class="blkcontainer">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS</div>
  </div>
  </div>
  <div class="blkcontainer">
     
    
    
    
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
        <input type="text" class="form-control" id="SewSpace" name="SewSpace[]" value="<?php if(isset($sawexplodeval[$sew])){echo $sawexplodeval[$sew]; }?>">
      </div>
    </div>


  </div>
   <?php $sew++; } ?>

        
    @if($productprinted->InkColor1!="")
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Ink Color 1 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="inkcolor1" name="inkcolor1" value="<?php if(isset($productprinted->InkColor1)){echo $productprinted->InkColor1;}?>">
      </div>
    </div>
     @endif
    @if($productprinted->InkColor2!="")
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Ink Color 2 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="inkcolor2" name="inkcolor2" value="<?php if(isset($productprinted->InkColor2)){echo $productprinted->InkColor2;}?>">
      </div>
    </div>
    @endif
    @if($productprinted->InkColor3!="")
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Ink Color 3 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="inkcolor3" name="inkcolor3" value="<?php if(isset($productprinted->InkColor3)){echo $productprinted->InkColor3;}?>">
      </div>
    </div>
    @endif
    @if($productprinted->InkColor4!="")
    <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Ink Color 4 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="inkcolor4" name="inkcolor4" value="<?php if(isset($productprinted->InkColor4)){echo $productprinted->InkColor4;}?>">
      </div>
    </div>
    @endif
    
       
    <div class="blkform-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Type</label>
      <div class="col-md-8">          
      <select id="printtypeID" name="printtypeID1" class="col-md-6 dropdownwidth">
      @foreach ($productprinttype as $printtypelist)
         <option value="{{$printtypelist->id}}" @if($listim->PrinttypeID==$printtypelist->PrinttypeID)selected="selected" @endif>{{ $printtypelist->PrintType }}</option>
      @endforeach
    </select>
      </div>
    </div>
     
   
        <div class="blkform-group col-md-6">
      <label class="control-label col-md-4" for="program">Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="width" name="width" value="<?php if(isset($productprinted->Width)){echo $productprinted->Width; }?>" >
      </div>
    </div>
    
     <div class="blkform-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="length" name="length" value="<?php if(isset($productprinted->Length)){echo $productprinted->Length;}?>" >
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
    <div class="">
    <label class="col-lg-2 control-label font-noraml text-left label_font">Reference Image<span class="required">*</span></label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile" name="imgInpsample" id="imgInpsample" value="{{$productprinted->Artworkupload}}" onchange="uploadimageselect(this,'sampleimg');"/>
                 <input type="hidden" name="sampleselectimage" id="sampleimg_selectimage" class="form-control selectimage" value="{{$productprinted->Artworkupload}}" readonly="readonly">
                  <input type="hidden" name="selectimageid" id="selectimageid" class="form-control" readonly="readonly">
                  </div>
                </div>
  
  <div class="img-thumbnail" style="width:150px; height:150px;">
    <img id="sampleimg" src="{{ route('user.printedlabelpic', ['id' => $productdetails_view->PrintedLabelID]) }}" alt="your image" width="150" height="150" />
  </div>
  </div>
</div>
</div>
 <div class="col-md-12 right-cont">
            <div class="back-cont col-md-8">
               <button type="submit" class="btn-primary back-opt" name="printedsubmit" id="printedsubmit">Save</button>
                 </div>
              <div class="back-cont col-md-2">
               <a href="{{ URL::previous() }}" class="btn-primary back-opt">Cancel</a>
                 </div>
            </div> 
  </form>     
       
   
</div>


</div>
</div>
</div>





         

@endsection



