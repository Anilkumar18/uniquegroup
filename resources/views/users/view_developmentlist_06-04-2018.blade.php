<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Product details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  <style>
  .ecommerce-maintenance .right-cont
  {
  margin-top:20px;
  }
  .ecommerce-maintenance .left-cont ul li
  {
  list-style-type:none;
  float:left;
  margin:30px 2px;
  }
  .ecommerce-maintenance .csv-opt,.ecommerce-maintenance .excel-opt,.ecommerce-maintenance .pdf-opt,.ecommerce-maintenance .print-opt
  {
  background:#00ADEF;
  padding:5px 25px;
  border:none;
  border-radius:5px;
  font-size:12px
  }
  .ecommerce-maintenance .right-cont
  {
  float:left;
  }
  .ecommerce-maintenance .back-cont, .edit-cont
  {
  padding:20px 0px;
  }
  .ecommerce-maintenance .back-opt ,.edit-opt
  {
  padding:5px 10px;
  width:120px;
  border:none;
  float:right
  }
  .ecommerce-maintenance .panel
  {
  background:#00ADEF;
  color:#fff;
  font-weight:600;
  }
    .ecommerce-maintenance .costing-requirement
  {
  background:#e7e7e7;
  margin-bottom:20px;
  }
  .ecommerce-maintenance .costing-requirement h4
  {
  color:#00ADEF;
  }
  .ecommerce-maintenance .checkbox
  {
  padding-left:50px !important;
  }
  .ecommerce-maintenance .control-label
  {
  text-align:left;
  padding-left:20px !important;
  font-weight:normal;
  }
  .ecommerce-maintenance .unit-measurement
  {
  background:#e7e7e7;
  }
  
  </style>
  <?php

  $ProductGroupID=$productdetails->ProductGroupID;
  $productgroupdetails=App\ProductGroup::where('id','=',$ProductGroupID)->first();
  $ProductSubGroupID=$productdetails->ProductSubGroupID;
  $productsubgroupdetails=App\ProductSubGroup::where('id','=',$ProductSubGroupID)->first();
  $ProductStatusID=$productdetails->ProductStatusID;
  $productstatusdetails=App\Status::where('id','=',$ProductStatusID)->first();
    $ProductProcessID=$productdetails->ProductProcessID;
    $productprocessdetails=App\ProductProcess::where('id','=',$ProductProcessID)->first();

     $InventoryID=$productdetails->InventoryID;
     $inventorydetails=App\Inventory::where('id','=',$InventoryID)->first();

                   $ProductionRegionID1=$productdetails->ProductionRegionID1;
				    $ProductionRegionID2=$productdetails->ProductionRegionID2;
					 $ProductionRegionID3=$productdetails->ProductionRegionID3;
                 
                 $ProductionRegionID1=App\ProductionRegions::where('id','=',$ProductionRegionID1)->first();
				 $ProductionRegionID2=App\ProductionRegions::where('id','=',$ProductionRegionID2)->first();
				 $ProductionRegionID3=App\ProductionRegions::where('id','=',$ProductionRegionID3)->first();
                 
                 $productionregionname=$productionregiondetails->ProductionRegions;
				 
                    $inventoryUniqueFactory1=$productdetails->UniqueFactory1;
					 $inventoryUniqueFactory2=$productdetails->UniqueFactory2;
					  $inventoryUniqueFactory3=$productdetails->UniqueFactory3;
                 
                  $inventory_uniquefactory1=explode(",",$inventoryUniqueFactory1);
				  $inventory_uniquefactory2=explode(",",$inventoryUniqueFactory2);
				   $inventory_uniquefactory3=explode(",",$inventoryUniqueFactory3);
				  
				  if($productdetails->UniqueFactory1!="")
				  {
				   foreach($inventory_uniquefactory1 as $expuniquefactorydet){
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   $uniquefactory1productdetails=implode(",",$uniquefactory1);
				   
				   //print_r($uniquefactory1details);
				   
				  }
				   if($productdetails->UniqueFactory2!="")
				  {
				   foreach($inventory_uniquefactory2 as $expuniquefactorydet){
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   $uniquefactory2productdetails=implode(",",$uniquefactory2);
				   
				   //print_r($uniquefactory1details);
				   
				  }
				  
				  if($productdetails->UniqueFactory3!="")
				  {
				   foreach($inventory_uniquefactory3 as $expuniquefactorydet){
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   $uniquefactory3productdetails=implode(",",$uniquefactory3);
				   
				   //print_r($uniquefactory1details);
				   
				  }
				  
				  
				  
				 
				  
				    
				 
				 	
             

?>
  </head>
  <body>
      <div class="col-lg-12 ecommerce-maintenance">
         <div class="container">
           <div class="row">
             <div class="col-md-6 left-cont">
             <h3>Product Details
             </h3>
              <ul class="buttons">
                <li><button class="btn-primary csv-opt">CSV</button></li>
                <li><button class="btn-primary excel-opt">Excel</button></li>
                <li> <a href="{{route('user.developmentproductdetails1',$id)}}"><button class="btn-primary pdf-opt">PDF</button></a></li>
                <li><button class="btn-primary print-opt">Print</button></li>
               </ul>
              </div>
          <div class="col-md-6 right-cont">
          <div class="back-cont">
               <button class="btn-primary back-opt">Back</button>
                 </div>
             <div class="edit-cont">                
           <button class="btn-success edit-opt">Edit</button>
              </div>
  
            </div>
        </div>
      </div>
     <div class="col-lg-12 product-info-form">
    <div class="container">
  <div class="panel product-info-panel">
    <div class="panel-body panel-header">PRODUCT INFORMATION</div>
  </div>
</div>
<div class="container">
  <form class="form-row" action="/action_page.php">
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Product Group</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productgroupdetails->ProductGroup}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Unique Product Code</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$productdetails->UniqueProductCode}}">
      </div>
    </div>
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Product Sub-group</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productsubgroupdetails->ProductSubGroupName}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="desc">Description</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$productdetails->Description}}">
      </div>
    </div>
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Brand</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productdetails->Brand}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Status</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$status->StatusName}}">
      </div>
    </div>
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Program Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productdetails->ProgramName}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="pro-proces">Product Process</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$productprocessdetails->ProductProcess}}">
      </div>
    </div>
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="cus-pro-name">Customer Product Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productdetails->CustomerProductName}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="version">Version</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$productdetails->Version}}">
      </div>
    </div>
     <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Customer Product Code</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$productdetails->CustomerProductCode}}">
      </div>
    </div>
  </form>
  <button class="btn-success edit-opt" style="margin-bottom:20px; float:right">Edit</button>
</div>

  </div>
 
   


                        <?php 

if($productdetails->BoxID!="")
{
                        $BoxCurrencyID=$boxesdetails->CurrencyID;
                   
                   $boxcurrencydetails=App\Currency::where('id','=',$BoxCurrencyID)->first();

       $boxprintingfinishingprocess=$boxesdetails->PrintingFinishingProcessID;
        $boxprintingcheckbox=explode(",",$boxprintingfinishingprocess);

$printingfinishing = DB::table('printingfinishingprocess')->get();

     $expprintingfinishingprocess=explode(",",$boxesdetails->PrintingFinishingProcessID);
	
	foreach($expprintingfinishingprocess as $expprinting)
	{
		
   $printingvalues="";
   $printingfinishingprocessdetails=App\PrintingFinishingProcess::where('id','=',$expprinting)->where('status','=',1)->first();

   $printingvalues[]=$printingfinishingprocessdetails->PrintingFinishingProcessName;
		
	}
	//print_r($printingvalues);
	$boximplodeprintingfinishingprocess=implode(",",$printingvalues);



             $boxrawmaterial=App\RawMaterial::where('id','=',$boxesdetails->RawMaterialID)->where('status','=',1)->first();
             
             $printtype=App\PrintType::where('id','=',$boxesdetails->PrintTypeID)->where('status','=',1)->first();
  
             $cutting=App\Cutting::where('id','=',$boxesdetails->CuttingID)->where('status','=',1)->first();

           $boxUniquefactorys = DB::table('uniqueoffices')->get();


                  $boxProductionRegionID1=$boxesdetails->ProductionRegionID1;
                 
                $boxproductionregiondetails1=App\ProductionRegions::where('id','=',$boxProductionRegionID1)->first();
				
			    

                 $boxProductionRegionID2=$boxesdetails->ProductionRegionID2;
                 
                 $boxproductionregiondetails2=App\ProductionRegions::where('id','=',$boxProductionRegionID2)->first();

                 $boxProductionRegionID3=$boxesdetails->ProductionRegionID3;
                 
                 $boxproductionregiondetails3=App\ProductionRegions::where('id','=',$boxProductionRegionID3)->first();


                    $boxUniqueFactory1=$boxesdetails->UniqueFactory1;
                 
                    $boxuniquefactoryexplodedetails1=explode(",",$boxUniqueFactory1);
					
					//print_r($boxuniquefactoryexplodedetails1);
					
					if($boxUniqueFactory1!="")
					{
						$uniquefactory1="";
						 foreach($boxuniquefactoryexplodedetails1 as $expuniquefactorydet){
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   $uniquefactorybox1details=implode(",",$uniquefactory1);
						
					}
					
					
					 


                     $boxUniqueFactory2=$boxesdetails->UniqueFactory2;
                 
                 $boxuniquefactoryexplodedetails2=explode(",",$boxUniqueFactory2);
				 
				 if($boxUniqueFactory2!="")
					{
						$uniquefactory2="";
						 foreach($boxuniquefactoryexplodedetails2 as $expuniquefactorydet){
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   $uniquefactorybox2details=implode(",",$uniquefactory2);
						
					}
				 
				 
				 


                     $boxUniqueFactory3=$boxesdetails->UniqueFactory3;
                 
                 $boxuniquefactoryexplodedetails3=explode(",",$boxUniqueFactory3);
				 
				 if($boxUniqueFactory3!="")
					{
						$uniquefactory3="";
						 foreach($boxuniquefactoryexplodedetails3 as $expuniquefactorydet){
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   $uniquefactorybox3details=implode(",",$uniquefactory3);
						
					}
				 
				 
				 
				 

}
if($productdetails->HookID!="")
{
	$hooksdetails=App\Hook::where('id','=',$productdetails->HookID)->where('status','=',1)->first();
	
	
	$hookrawmaterialdetails=App\HooksMaterial::where('id','=',$hooksdetails->HooksMaterialID)->where('status','=',1)->first();
	
	
	
	$moldcostingcurrencydetails=App\Currency::where('id','=',$hooksdetails->MoldCostingCurrency)->where('status','=',1)->first();
	
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$hooksdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$hooksdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$hooksdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	$explodeuniquefactory1details=explode(",",$hooksdetails->UniqueFactory1);
	
	//print_r($explodeuniquefactory1details);
	
	$explodeuniquefactory2details=explode(",",$hooksdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$hooksdetails->UniqueFactory3);
	
	           if($hooksdetails->UniqueFactory1!="")
				  {
					  $uniquefactory1='';
				   foreach($explodeuniquefactory1details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $uniquefactory1details=implode(",",$uniquefactory1);
				   
				  
				   
				  }
				   if($hooksdetails->UniqueFactory2!="")
				  {
					  $uniquefactory2='';
				   foreach($explodeuniquefactory2details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $uniquefactory2details=implode(",",$uniquefactory2);
				   
				  
				   
				  }
				  if($hooksdetails->UniqueFactory3!="")
				  {
					  $uniquefactory3='';
				   foreach($explodeuniquefactory3details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $uniquefactory3details=implode(",",$uniquefactory3);
				   
				  
				   
				  }
	
	
	
	
	
}
if($productdetails->TissuePaperID!="")
{
	
	 $tissuepaperdetails=App\Tissuepaper::where('id','=',$productdetails->TissuePaperID)->where('status','=',1)->first();
	 
	$tissuepaperrawmaterialdetails=App\RawMaterial::where('id','=',$tissuepaperdetails->MaterialID)->where('status','=',1)->first();
	
	$printtypedetails=App\PrintType::where('id','=',$tissuepaperdetails->PrintTypeID)->where('status','=',1)->first();
	
	
	$cuttingdetails=App\Cutting::where('id','=',$tissuepaperdetails->CuttingID)->where('status','=',1)->first();
	
	$expprintingfinishingprocess=explode(",",$tissuepaperdetails->PrintingFinishingProcessID);
	
	foreach($expprintingfinishingprocess as $expprinting)
	{
		
   $printingfinishingprocessdetails=App\PrintingFinishingProcess::where('id','=',$expprinting)->where('status','=',1)->first();

   $printingvalues[]=$printingfinishingprocessdetails->PrintingFinishingProcessName;
		
	}
	//print_r($printingvalues);
	$tissuepaperimplodeprintingfinishingprocess=implode(",",$printingvalues);
	
	 
	
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$tissuepaperdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$tissuepaperdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$tissuepaperdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeuniquefactory1details=explode(",",$tissuepaperdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$tissuepaperdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$tissuepaperdetails->UniqueFactory3);
	
	          if($tissuepaperdetails->UniqueFactory1!="")
				  {
					  $uniquefactory1='';
				   foreach($explodeuniquefactory1details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $uniquefactory1details=implode(",",$uniquefactory1);
				   
				  
				   
				  }
				   if($tissuepaperdetails->UniqueFactory2!="")
				  {
					  $uniquefactory2='';
				   foreach($explodeuniquefactory2details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $uniquefactory2details=implode(",",$uniquefactory2);
				   
				  
				   
				  }
				   if($tissuepaperdetails->UniqueFactory3!="")
				  {
					  $uniquefactory3='';
				   foreach($explodeuniquefactory3details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $uniquefactory3details=implode(",",$uniquefactory3);
				   
				  
				   
				  }
	 
	 
	 
	 
	 
 
}
if($productdetails->PackagingStickersID!="")
{
	
	$packagingstickersdetails=App\PackagingStickers::where('id','=',$productdetails->PackagingStickersID)->where('status','=',1)->first();
	
	$typeofstickersdetails=App\TypeofStickers::where('id','=',$packagingstickersdetails->TypeofStickerID)->where('status','=',1)->first();
	  
	$rawmaterialdetails=App\RawMaterial::where('id','=',$packagingstickersdetails->MaterialID)->where('status','=',1)->first();
	
	$adhesivedetails=App\TypeofAdhesive::where('id','=',$packagingstickersdetails->AdhesiveID)->where('status','=',1)->first();
	
	  $printtypedetails=App\PrintType::where('id','=',$packagingstickersdetails->PrintTypeID)->where('status','=',1)->first();
	  
	  $cuttingdetails=App\Cutting::where('id','=',$packagingstickersdetails->CuttingID)->where('status','=',1)->first();
	  
	  $currencydetails=App\Currency::where('id','=',$packagingstickersdetails->CuttingID)->where('status','=',1)->first();
	  
	
	$expprintingfinishingprocess=explode(",",$packagingstickersdetails->PrintingFinishingProcessID);
	
	
	$productionregion1details=App\ProductionRegions::where('id','=',$packagingstickersdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$packagingstickersdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$packagingstickersdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeuniquefactory1details=explode(",",$packagingstickersdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$packagingstickersdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$packagingstickersdetails->UniqueFactory3);
	
	 if($packagingstickersdetails->UniqueFactory1!="")
				  {
					  $uniquefactory1='';
				   foreach($explodeuniquefactory1details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $uniquefactory1details=implode(",",$uniquefactory1);
				   
				  
				   
				  }
				  if($tissuepaperdetails->UniqueFactory2!="")
				  {
					  $uniquefactory2='';
				   foreach($explodeuniquefactory2details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $uniquefactory2details=implode(",",$uniquefactory2);
				   
				  
				   
				  }
				   if($tissuepaperdetails->UniqueFactory3!="")
				  {
					  $uniquefactory3='';
				   foreach($explodeuniquefactory3details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $uniquefactory3details=implode(",",$uniquefactory3);
				   
				  
				   
				  }
				  
				  
	 
 
}

                        ?>
  <div class="col-lg-12 product-detail-form">
  <?php
  if($productdetails->BoxID!=0)
  {
  ?>
    <div class="container">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS</div>
  </div>
  </div>
  <div class="container">
  <form class="form-row" action="/action_page.php">
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Raw Material</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$boxrawmaterial->RawMaterial}}">
      </div>
    </div>
    
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$boxesdetails->QualityReference}} @if($boxesdetails->QualityReferencem==1){{"As Per Sample"}}@endif ">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="desc">CMYK</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="
@if($boxesdetails->CMYK=='0') No @elseif($boxesdetails->CMYK=='1') Yes @endif">
      </div>
    </div>
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Thickness</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$boxesdetails->Thickness}} {{$boxesdetails->measurement1}}">
      </div>
    </div>
@if($boxesdetails->CMYK=='0')
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 1</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$boxesdetails->PrintColor1}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 2</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$boxesdetails->PrintColor2}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 3</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$boxesdetails->PrintColor3}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 4</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$boxesdetails->PrintColor4}}">
      </div>

    </div>@else
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 5</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$boxesdetails->PrintColor5}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 6</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$boxesdetails->PrintColor6}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 7</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$boxesdetails->PrintColor7}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 8</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$boxesdetails->PrintColor8}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 9</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$boxesdetails->PrintColor9}}">
      </div>

    </div>
     
    @endif
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$boxesdetails->Width}}">
      </div>
    </div>
    
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="cus-pro-name">Height</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$boxesdetails->Height}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="version">Printing Finishing Process</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$boximplodeprintingfinishingprocess}} ">
      </div>
    </div>
   <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$boxesdetails->Length}}">
      </div>
    </div>
  
  <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region 1</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$boxproductionregiondetails1->ProductionRegions}}">
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory 1</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactorybox1details}}">
      </div>
    </div>
    @if($boxesdetails->ProductionRegionID2!="")
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region 2</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="
        {{$boxproductionregiondetails1->ProductionRegions}}">
      </div>
    </div>
    @endif
    
    @if($boxesdetails->UniqueFactory2!="")
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory 2</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactorybox2details}}">
      </div>
    </div>
    @endif
     @if($boxesdetails->ProductionRegionID2!="")
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region 3</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="
        @if($boxproductionregiondetails3){{$boxproductionregiondetails3->ProductionRegions}}@endif">
      </div>
    </div>
     @endif
      @if($boxesdetails->UniqueFactory2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory 3</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactorybox3details}}">
      </div>
    </div>
    @endif
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Currency</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$boxcurrencydetails->Currency}}"> 
      </div>
    </div>
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sample Costing</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$boxesdetails->Sample_costing}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="pro-proces">Cutting</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$cutting->CuttingName}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Print Type</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$printtype->PrintType}}">
      </div>
    </div>
</div>

<?php

  }?>
  
  <?php
  if($productdetails->HookID!=0)
  {
  ?>
    <div class="container">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(Hooks)</div>
  </div>
  </div>
  <div class="container">
  <form class="form-row" action="/action_page.php">
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Raw Material</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hookrawmaterialdetails->HooksMaterial}}">
      </div>
    </div>
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hooksdetails->QualityReference}} @if($hooksdetails->QualityReferencem==1){{"As Per Sample"}}@endif ">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Color</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hooksdetails->Color}}">
      </div>
    </div>
    
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Thickness</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hooksdetails->Thickness}} @if($hooksdetails->measurement1!=""){{$hooksdetails->measurement1}}
                    @elseif($hooksdetails->measurement2!=""){{$hooksdetails->measurement2}}
                    @elseif($hooksdetails->measurement3!=""){{$hooksdetails->measurement3}}@endif">
      </div>
    </div>

      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hooksdetails->Width}}">
      </div>
    </div>
    
   <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hooksdetails->Length}}">
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region1:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion1details->ProductionRegions}}"> 
      </div>
    </div>
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory1:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactory1details}}"> 
      </div>
    </div>
    @if($hooksdetails->ProductionRegionID2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion2details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
     @if($hooksdetails->UniqueFactory2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactory2details}}"> 
      </div>
    </div>
    
    @endif
    
     @if($hooksdetails->ProductionRegionID3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion3details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
   
   
    @if($hooksdetails->UniqueFactory3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactory3details}}"> 
      </div>
    </div>
    
    @endif
    
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Mold Costing Currency:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$moldcostingcurrencydetails->Currency}}"> 
      </div>
    </div>
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Mold Costing:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hooksdetails->MoldCosting}}">
      </div>
    </div>
</div>

<?php

  }?>
  
   <?php
  if($productdetails->TissuePaperID!=0)
  {
  ?>
    <div class="container">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(TissuePaper)</div>
  </div>
  </div>
  <div class="container">
  <form class="form-row" action="/action_page.php">
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Raw Material</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tissuepaperrawmaterialdetails->RawMaterial}}">
      </div>
    </div>
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tissuepaperdetails->QualityReference}} @if($hooksdetails->QualityReferencem==1){{"As Per Sample"}}@endif ">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Thickness:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tissuepaperdetails->Thickness}} @if($tissuepaperdetails->measurement1!=""){{$tissuepaperdetails->measurement1}}
                    @elseif($tissuepaperdetails->measurement2!=""){{$tissuepaperdetails->measurement2}}
                    @elseif($tissuepaperdetails->measurement3!=""){{$tissuepaperdetails->measurement3}}@endif">
      </div>
    </div>
    
      

      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tissuepaperdetails->Width}}">
      </div>
    </div>
    
   <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tissuepaperdetails->Length}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Print Type: </label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$printtypedetails->PrintType}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="desc">CMYK</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="
@if($tissuepaperdetails->CMYK=='0') No @elseif($tissuepaperdetails->CMYK=='1') Yes @endif">
      </div>
    </div>
    @if($tissuepaperdetails->CMYK=='0')
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 1</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$tissuepaperdetails->PrintColor1}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 2</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$tissuepaperdetails->PrintColor2}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 3</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$tissuepaperdetails->PrintColor3}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 4</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$tissuepaperdetails->PrintColor4}}">
      </div>

    </div>@else
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 5</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$tissuepaperdetails->PrintColor5}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 6</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$tissuepaperdetails->PrintColor6}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 7</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$tissuepaperdetails->PrintColor7}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 8</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$tissuepaperdetails->PrintColor8}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 9</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$tissuepaperdetails->PrintColor9}}">
      </div>

    </div>
     
    @endif
    
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Printing Finishing Process:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tissuepaperimplodeprintingfinishingprocess}}"> 
      </div>
    </div>
    
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region1:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion1details->ProductionRegions}}"> 
      </div>
    </div>
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory1:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactory1details}}"> 
      </div>
    </div>
    @if($hooksdetails->ProductionRegionID2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion2details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
     @if($hooksdetails->UniqueFactory2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactory2details}}"> 
      </div>
    </div>
    
    @endif
    
     @if($hooksdetails->ProductionRegionID3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion3details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
   
   
    @if($hooksdetails->UniqueFactory3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactory3details}}"> 
      </div>
    </div>
    
    @endif
    
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Cutting:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$cuttingdetails->CuttingName}}"> 
      </div>
    </div>
   
</div>

<?php

  }?>
  
   <?php
  if($productdetails->PackagingStickersID!=0)
  {
  ?>
    <div class="container">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(Packaging Stickers)</div>
  </div>
  </div>
  <div class="container">
  <form class="form-row" action="/action_page.php">
  <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Type of Sticker</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$typeofstickersdetails->PackagingStickersTypes}}">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Raw Material</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$rawmaterial->RawMaterial}}">
      </div>
    </div>
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$packagingstickersdetails->QualityReference}} @if($hooksdetails->QualityReferencem==1){{"As Per Sample"}}@endif ">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Thickness:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tissuepaperdetails->Thickness}} @if($packagingstickersdetails->measurement1!=""){{$packagingstickersdetails->measurement1}}
                    @elseif($packagingstickersdetails->measurement2!=""){{$packagingstickersdetails->measurement2}}
                    @elseif($packagingstickersdetails->measurement3!=""){{$packagingstickersdetails->measurement3}}@endif">
      </div>
    </div>
    
      

      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$packagingstickersdetails->Width}}">
      </div>
    </div>
    
   <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$packagingstickersdetails->Length}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Adhesive</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$packagingstickersdetails->AdhesiveID}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Print Type: </label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$printtypedetails->PrintType}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="desc">CMYK</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="
@if($packagingstickersdetails->CMYK=='0') No @elseif($packagingstickersdetails->CMYK=='1') Yes @endif">
      </div>
    </div>
    @if($tissuepaperdetails->CMYK=='0')
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 1</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$packagingstickersdetails->PrintColor1}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 2</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$packagingstickersdetails->PrintColor2}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 3</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$packagingstickersdetails->PrintColor3}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 4</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$packagingstickersdetails->PrintColor4}}">
      </div>

    </div>@else
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 5</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$packagingstickersdetails->PrintColor5}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 6</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$packagingstickersdetails->PrintColor6}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 7</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$packagingstickersdetails->PrintColor7}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 8</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$packagingstickersdetails->PrintColor8}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 9</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$packagingstickersdetails->PrintColor9}}">
      </div>

    </div>
     
    @endif
    
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Printing Finishing Process:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodeprintingfinishingprocess}}"> 
      </div>
    </div>
    
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region1:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion1details->ProductionRegions}}"> 
      </div>
    </div>
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory1:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactory1details}}"> 
      </div>
    </div>
    @if($hooksdetails->ProductionRegionID2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion2details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
     @if($hooksdetails->UniqueFactory2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactory2details}}"> 
      </div>
    </div>
    
    @endif
    
     @if($hooksdetails->ProductionRegionID3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion3details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
   
   
    @if($hooksdetails->UniqueFactory3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$uniquefactory3details}}"> 
      </div>
    </div>
    
    @endif
    
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Cutting:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$cuttingdetails->CuttingName}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Shape:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$packagingstickersdetails->Shape}}"> 
      </div>
    </div>
   
</div>

<?php

  }?>


</div>

  <div class="col-lg-12 product-images">
    <div class="container">
  <div class="panel Image-panel">
    <div class="panel-body panel-header">IMAGE</div>
  </div>
  <?php
  if($productdetails->BoxID!="")
  {
  ?>
  <div class="container col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($boxesdetails->Artwork!="")
      <img  src="{{ route('user.productpic', ['id' => $hooksdetails->id]) }}" alt="your image" width="120" height="120" />
      @else
        <img  src="../img/image-sample.jpg" alt="your image" width="120" height="120" />
      
                @endif
  </div>
  </div>
  <?php
  }
  ?>
  <?php
  if($productdetails->HookID!="")
  {
  ?>
  <div class="container col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($hooksdetails->Artwork!="")
      <img  src="{{ route('user.producthookpic', ['id' => $boxesdetails->id]) }}" alt="your image" width="120" height="120" />
      @else
        <img  src="../img/image-sample.jpg" alt="your image" width="120" height="120" />
                @endif
  </div>
  </div>
  
  <?php
  }
  ?>
   <?php
  if($productdetails->TissuePaperID!="")
  {
  ?>
  <div class="container col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($tissuepaperdetails->Artwork)
      <img  src="{{ route('user.productpictissue', ['id' => $tissuepaperdetails->id]) }}" alt="your image" width="120" height="120" />
      @else
        <img  src="../img/image-sample.jpg" alt="your image" width="120" height="120" />
                @endif
  </div>
  </div>
  
  <?php
  }
  ?>
   <?php
  if($productdetails->PackagingStickersID!="")
  {
  ?>
  <div class="container col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($packagingstickersdetails->Artwork!="")
      <img  src="{{ route('user.productpicpackage', ['id' => $packagingstickersdetails->id]) }}" alt="your image" width="120" height="120" />
      @else
        <img  src="../img/image-sample.jpg" alt="your image" width="120" height="120" />
                @endif
  </div>
  </div>
  
  <?php
  }
  ?>
  
</div>
</div>
     <div class="col-lg-12 inventory-info-form" style="margin-top:20px;">
    <div class="container">
  <div class="panel inventory-panel">
    <div class="panel-body panel-header">INVENTORY INFORMATION</div>
  </div>
</div>
<div class="container">
  <form class="form-row" action="/action_page.php">
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Type of inventory</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="
         @if($productdetails->InventoryID!="")
                   {{$inventorydetails->InventoryName}}
                   @endif ">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Maximum pieces on stock</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="@if($productdetails->Maximumpiecesonstock!="")
                   {{$productdetails->Maximumpiecesonstock}}
                   @endif">
      </div>
    </div>
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Projection</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="
        @if($productdetails->Projection!="")
                   {{$productdetails->Projection}}
                   @endif"> 
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="desc">Minimum pieces on stock</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="@if($productdetails->Minimumpiecesonstock!="")
                  {{$productdetails->Minimumpiecesonstock}}
                   @endif">
      </div>
    </div>
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Production Region1</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="@if($productdetails->ProductionRegionID1!="")
                   {{$ProductionRegionID1->ProductionRegions}}
                   @endif">
      </div>
    </div>
  <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Unique Factory1</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="unqiuefactory1" name="unqiuefactory1" 
        value="{{$uniquefactory1productdetails}}">
      </div>
    </div>
    
    @if($productdetails->ProductionRegionID2!="")
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Production Region2</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="@if($productdetails->ProductionRegionID2!="")
                   {{$ProductionRegionID2->ProductionRegions}}
                   @endif">
      </div>
    </div>
   @endif
   <br>
@if($productdetails->UniqueFactory2!="")
   <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Unique Factory2</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="unqiuefactory2" name="unqiuefactory2" 
        value="{{$uniquefactory2productdetails}}">
      </div>
    </div>
    @endif
   
    @if($productdetails->ProductionRegionID3!="")
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Production Region3</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="@if($productdetails->ProductionRegionID3!="")
                   {{$ProductionRegionID3->ProductionRegions}}
                   @endif">
      </div>
    </div>
   @endif
   
   @if($productdetails->UniqueFactory3!="")
   <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Unique Factory 3</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="unqiuefactory1" name="unqiuefactory1" 
        value="{{$uniquefactory3productdetails}}">
      </div>
    </div>
    @endif
    
  </form>
  <button class="btn-success edit-opt" style="margin-bottom:20px; float:right">Edit</button>
</div>

  </div>
  <div class="col-lg-12 quote-cost-form">

     <?php 


                   
                   $currencydetails=App\Currency::where('id','=',$productdetails->CurrencyID)->first();      
   $unitofmeasurementdetails=App\UnitofMeasurement::where('id','=',$productdetails->UnitofMeasurementID)->first();
   
   $quantitydetails=App\Quote::where('status','=',1)->get();

    $quoterequiredchk=$productdetails->QuantityMOQ;
    $costseleteddetails=$productdetails->Cost;
    $costrequiredetails=explode("#",$costseleteddetails); 
	
	//print_r($costrequiredetails);
	
    $expquoterequiredchk=explode("#",$quoterequiredchk);
	
	//print_r($expquoterequiredchk);
	
	/*foreach($expquoterequiredchk as $chk)
	{
		echo $chk; echo "<br>";
	}*/

    $pricingmethoddetails=App\PricingMethod::where('id','=',$productdetails->PricingMethod)->first();
	
	
	//sellingprice
	
	
	

     

     


         ?>
    <div class="container">
  <div class="panel quote-cost-panel">
    <div class="panel-body panel-header">QUOTE AND COSTING</div>
  </div>
</div>
<div class="container">
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Pricing Method</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="@if($productdetails->PricingMethod!="")
                   {{$pricingmethoddetails->PricingMethod}}
                   @endif">
      </div>
    </div>

  <div class="form-group">           
        <div class=" col-md-2" style="font-weight:bold; padding-left:30px;">
         <label style="font-weight:bold;">Quantity</label>
        </div>
          <div class="col-md-4" class="form-control" style="font-weight:bold;">
            Cost
      </div>
    </div>
    <?php   $cost_i=0; ?>
     @foreach($quantitydetails as $list)     
  <div class="form-group">     
   
        <div class="checkbox col-md-2">
          <label><input type="checkbox" name="quantity" <?php
        if(in_array($list->Quantity,$expquoterequiredchk))
        {
        echo "checked=checked";  
        }?> > {{$list->Quantity}}</label>
        </div>
       
          <div class="col-md-4">
            <input type="text" class="form-control" id="pricing"  name="pricing method" value="<?php echo isset($costrequiredetails[$cost_i])?$costrequiredetails[$cost_i]:''; ?>">
      </div>
      
    </div>
     <?php $cost_i+=1;  ?>
   @endforeach
 
  
    
    
    
    
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Unit of measurement</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="@if($productdetails->UnitofMeasurementID!=""){{$unitofmeasurementdetails->UnitofMeasurement}}@endif">
      </div>
    </div>
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Currency</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="@if($productdetails->CurrencyID!=""){{$currencydetails->Currency}}     @endif">
      </div>
    </div>
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Minimum Order Quantity</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="@if($productdetails->MinimumOrderQuantity!=""){{$productdetails->MinimumOrderQuantity}}
                   @endif">
      </div>
    </div>
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Minimum Order Value</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="@if($productdetails->MinimumOrderValue!=""){{$productdetails->MinimumOrderValue}}@endif">
      </div>
    </div>
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Pack Size</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="@if($productdetails->PackSize!=""){{$productdetails->PackSize}}@endif">
      </div>
    </div>
     <div class="form-group ">
      <label class="control-label col-md-2" for="Pricing Method">Sample Cost</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="pricing"  name="pricing method" value="{{$productdetails->SellingPrice}}">
      </div>
    </div>

<div class="col-lg-6 costing-requirement">
<h4>
Costing Requirement
</h4>
<div class="row">
<div class="form-group col-md-4">
 <label class="control-label col-sm-6" for="email">Ex works:</label>
      <div class="col-sm-6">
        <input type="checkbox" name="exworks" @if($productdetails->ExWorks=='1') checked="checked" @endif>
      </div>
</div>
<div class="form-group col-md-4">
 <label class="control-label col-sm-6" for="email">Fright cost:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="frightcost"  name="frightcost">
      </div>
</div>
<div class="form-group col-md-4">
 <label class="control-label col-sm-6" for="email">Currency:</label>
      <div class="col-sm-6">
<input type="text" class="form-control" id="currency"  name="currency" value="{{$currencydetails->Currency}}">


      </div>
</div>
</div>
<div class="row">
<div class="form-group col-md-4">
 <label class="control-label col-sm-6" for="email">FOB:</label>
      <div class="col-sm-6">
       <input type="checkbox" name="quantity" @if($productdetails->FOB=='2') checked="checked" @endif>
      </div>
</div>
<div class="form-group col-md-4">
 <label class="control-label col-sm-6" for="email">Fright cost:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="email"  name="email">
      </div>
</div>
<div class="form-group col-md-4">
 <label class="control-label col-sm-6" for="email">Currency:</label>
      <div class="col-sm-6">
 <input type="text" class="form-control" id="email"  name="email" value="{{$currencydetails->Currency}}
">


      </div>
</div>
</div>
</div>
  </form>
  
  
</div>
</div>
     <div class="col-lg-12 selling-price-form">
    <div class="container">
  <div class="panel selling-price-panel">
    <div class="panel-body panel-header">SELLING PRICE</div>
  </div>
</div>


<div class="container">
<div class="col-lg-12 unit-measurement">
<form class="form" action="/action_page.php">
<div class="row">

<div class="form-group col-md-3">
<h5>Unit of Measurements:  @if($productdetails->UnitofMeasurementID!="")
                  {{$unitofmeasurementdetails->UnitofMeasurement}}
                   @endif</h5>

      
 <label class="control-label col-sm-6" for="email">Margin</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="email"  name="email" value="{{$productdetails->Margin}}">
      </div>
</div>
<div class="col-md-12" style="border-bottom:1px solid #c1c1c1">

</div>
</div>

<div class="row"  style="margin-top:20px;">
<div class="form-group col-md-3">

      <div class="col-sm-12" style="font-weight:bold">
        Quantity
      </div>
</div>
<div class="form-group col-md-3">
 
      <div class="col-sm-12" style="font-weight:bold">
     Cost
      </div>
</div>
<div class="form-group col-md-3">
 
      <div class="col-sm-12" style="font-weight:bold">
        Selling Price
      </div>
</div>
<div class="form-group col-md-3">
 
      <div class="col-sm-12" style="font-weight:bold">
        Margin%
      </div>
</div>
      </div>
<div class="row">

<?php
$costprice=0;
foreach ($costrequiredetails as $costrdetailsvalue) {
  if($costrdetailsvalue){
    $processsellingprice[]=$costrdetailsvalue;
  }
}
//print_r($processsellingprice);
?>
@foreach($expquoterequiredchk as $quantity)
<div class="form-group col-md-3">

      <div class="col-sm-12">
         <label><input type="checkbox" name="quantity" @if($quantity!='') checked="checked" @endif><?php echo $quantity; ?></label>
      </div>
</div>

<div class="form-group col-md-3">
 
      <div class="col-sm-12">
        <input type="text" class="form-control" id="cost"  name="cost" value="@if($processsellingprice[$costprice]!=""){{$processsellingprice[$costprice]}}@endif" >
      </div>
</div>
<div class="form-group col-md-3">
 
      <div class="col-sm-12">
 <input type="text" class="form-control" id="selling_price"  name="selling_price" value="{{$productdetails->SellingPrice}}">
      </div>
</div>
<div class="form-group col-md-3">
 
      <div class="col-sm-12">
        <input type="text" class="form-control" id="email"  name="email" value="{{$productdetails->Margin}}">
      </div>
</div>
<?php $costprice+=1;  ?>
@endforeach
      </div>
    
    
    
    </form>

</div>
     <button class="btn-success edit-opt" style="margin:20px 0px; float:right">Edit</button>
</div>
</div>
   <div class="col-lg-12 selling-price-form">
    <div class="container">
  <div class="panel sample-details-panel">
    <div class="panel-body panel-header">SAMPLE DETAILS</div>
  </div>
    <div class="row">
    <div class="col-md-6">
<div class="form-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Sample Requested Date</label>
      <div class="col-sm-7">
     <input type="text" class="form-control" id="email"  name="email" value=" @if($productdetails->SampleRequestedDate!=""){{$productdetails->SampleRequestedDate}}@endif">
      </div>
</div>
<div class="form-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Number of samples required</label>
      <div class="col-sm-7">
  <input type="text" class="form-control" id="email"  name="email" value="@if($productdetails->NumberOfSamplesRequired!=""){{$productdetails->NumberOfSamplesRequired}}@endif">
      </div>
</div>
<div class="form-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Sample Lead Time</label>
      <div class="col-sm-7">
     <input type="text" class="form-control" id="email"  name="email" value="@if($productdetails->SampleLeadTime!=""){{$productdetails->SampleLeadTime}}@endif ">
      </div>
</div>
<div class="form-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Production Lead Time</label>
      <div class="col-sm-7">
     <input type="text" class="form-control" id="email"  name="email" value="{{$productdetails->ProductionLeadTime}}
">
      </div>
</div>
<div class="form-group col-md-12">
       <label class="control-label col-md-5" for="pro-grp">Remarks / Special Instrucions</label>
      <div class="col-sm-7">
     <input type="text" class="form-control" id="email"  name="email" value="{{$productdetails->RemarksInstructions}}">
      </div>
</div>

</div>
<div class="col-md-6">
<div class="form-group col-md-12">
   <label class="control-label col-md-8" for="pro-grp">Reference file upload</label>
      <div class="col-sm-4">@if($productdetails->Artworkupload)
               <img  src="{{ route('user.productimagepic', ['id' => $productdetails->id]) }}" alt="your image" width="80" height="80" />
              @endif
     <input type="submit"  style="margin-left:-60px;" class="form-control" value="Browse" name="browse">
      </div>
</div>

<div class="form-group col-md-12">
   <div class="img-thumbnail" style="width:250px; height:250px; display:none;">
</div>
</div>
</div>
      </div>
</div>
</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  </body>
</html>


