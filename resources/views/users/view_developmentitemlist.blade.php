@extends('users.layouts.viewdevelopmentlist')
<?php
error_reporting(0);
?>

@section('content')
<!--<script src="{{ asset('/js/bootstrap.min.js') }}"></script>-->

<style>
.container-viewlist
{
width:100% !important;	
}
.container-viewlist .form-group {
    width: 50%;
}
  /*sidebar and header footer start*/
  ul#side-menu {
    float: left;
    /*min-height: 1000px;*/
    background: #273a4a;
    height: auto;
	max-height:100%;
}

 /*sidebar and header footer end*/
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
  
  .costing-requirement .form-group.col-md-4 {
    float: left;
    width: 39%;
}
.sampledtails .form-group {
    width: 25%;
    float: left;
	text-align:left;
    min-height: 55px;
}
.sampledtails .form-group label{
    width: 100%;
}
.sampledtails .form-group input[type=checkbox]{
    width: 15px;
}
.sampledetailstitle .form-group{
	 width: 25%;
    float: left;
	text-align:left;
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
         

<div class="row wrapper wrapper-content animated fadeInRight">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive"  style="overflow-x:hidden">
        
        <div class="col-lg-12 ecommerce-maintenance">
         <div class="container container-viewlist">
           <div class="row">
             <div class="col-md-6 left-cont">
             <h3>Product Details
             </h3>
             <?php
			 $typeid=$typeiddetails;
			 ?>
              <ul class="buttons">
                <li><button class="btn-primary csv-opt">CSV</button></li>
                <li><button class="btn-primary excel-opt">Excel</button></li>
              <li> <a href="{{route('user.pdfdevelopmentitemlist',['id' =>$id,'typeid'=>$typeid])}}"><button class="btn-primary pdf-opt">PDF</button></a></li>
                <li><button class="btn-primary print-opt">Print</button></li>
               </ul>
              </div>
          <div class="col-md-6 right-cont">
          <div class="back-cont">
               <a href="{{ URL::previous() }}"><button class="btn-primary back-opt">Back</button></a>
                 </div>
             <div class="edit-cont">                
           <button class="btn-success edit-opt">Edit</button>
              </div>
  
            </div>
        </div>
      </div>
     <div class="col-lg-12 product-info-form">
    <div class="container container-viewlist">
  <div class="panel product-info-panel">
    <div class="panel-body panel-header">PRODUCT INFORMATION</div>
  </div>
</div>
<div class="container container-viewlist">
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
if(isset($boxesdetails))
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
elseif(isset($hangtagsdetails))
{
	
	$hangtagrawmaterialdetails=App\RawMaterial::where('id','=',$hangtagsdetails->MaterialID)->where('status','=',1)->first();
	
	
	
	 $hangtagprinttypedetails=App\PrintType::where('id','=',$hangtagsdetails->PrintTypeID)->where('status','=',1)->first();
	  
	 $hangtagcuttingdetails=App\Cutting::where('id','=',$hangtagsdetails->CuttingID)->where('status','=',1)->first();
	 
	 $grommetmaterialdetails=App\MetalMaterial::where('id','=',$hangtagsdetails->GrommetMaterialID)->where('status','=',1)->first();
	 
	 
	 
	 $metalcolourdetails=App\MetalColour::where('id','=',$hangtagsdetails->GrommetColourID)->where('status','=',1)->first();
	  
	$stringmaterialdetails=App\StringMaterials::where('id','=',$hangtagsdetails->StringMaterialID)->where('status','=',1)->first();
	
	$sealmaterialdetails=App\SealMaterials::where('id','=',$hangtagsdetails->SealID)->where('status','=',1)->first();
	
	$ballchaincolor=App\MetalColour::where('id','=',$hangtagsdetails->BallChainColourID)->where('status','=',1)->first();
	
	$ballchainmaterialdetails=App\MetalMaterial::where('id','=',$hangtagsdetails->BallChainMaterialID)->where('status','=',1)->first();
	
	$pinstyle=App\PinStyle::where('id','=',$hangtagsdetails->PinStyleID)->where('status','=',1)->first();
	
	
	$pincolourdetails=App\MetalColour::where('id','=',$hangtagsdetails->PinColourID)->where('status','=',1)->first();
	
    $pinmaterialdetails=App\MetalMaterial::where('id','=',$hangtagsdetails->PinMaterialID)->where('status','=',1)->first();
	
	
	
	$hangtagscurrencydetails=App\Currency::where('id','=',$hangtagsdetails->CurrencyID)->where('status','=',1)->first();
	
	  
	  
	
	$expprintingfinishingprocess=explode(",",$hangtagsdetails->PrintingFinishingProcessID);
	$path=storage_path();
	
	$hangtagsproductionregion1details=App\ProductionRegions::where('id','=',$hangtagsdetails->ProductionRegionID1)->where('status','=',1)->first();
	$hangtagsproductionregion2details=App\ProductionRegions::where('id','=',$hangtagsdetails->ProductionRegionID2)->where('status','=',1)->first();
	$hangtagsproductionregion3details=App\ProductionRegions::where('id','=',$hangtagsdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeuniquefactory1details=explode(",",$hangtagsdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$hangtagsdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$hangtagsdetails->UniqueFactory3);
	
	           if($hangtagsdetails->UniqueFactory1!="")
				  {
					  $uniquefactory1='';
				   foreach($explodeuniquefactory1details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $hangtaguniquefactory1details=implode(",",$uniquefactory1);
				   
				  
				   
				  }
				   if($hangtagsdetails->UniqueFactory2!="")
				  {
					  $uniquefactory2='';
				   foreach($explodeuniquefactory2details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $hangtaguniquefactory2details=implode(",",$uniquefactory2);
				   
				  
				   
				  }
				  if($hangtagsdetails->UniqueFactory3!="")
				  {
					  $uniquefactory3='';
				   foreach($explodeuniquefactory3details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $hangtaguniquefactory3details=implode(",",$uniquefactory3);
				   
				  
				   
				  }
				$expprintingfinishingprocess=explode(",",$hangtagsdetails->PrintingFinishingProcessID);
	
				foreach($expprintingfinishingprocess as $expprinting)
				{
					
			   $printingvalues="";
			   $printingfinishingprocessdetails=App\PrintingFinishingProcess::where('id','=',$expprinting)->where('status','=',1)->first();
			
			   $printingvalues[]=$printingfinishingprocessdetails->PrintingFinishingProcessName;
					
				}
	            $hangtagsimplodeprintingfinishingprocess=implode(",",$printingvalues);
	
	
	
	
	
}
elseif(isset($hookdetails))
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
				  $hooksuniquefactory1details=implode(",",$uniquefactory1);
				   
				  
				   
				  }
				   if($hooksdetails->UniqueFactory2!="")
				  {
					  $uniquefactory2='';
				   foreach($explodeuniquefactory2details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $hooksuniquefactory2details=implode(",",$uniquefactory2);
				   
				  
				   
				  }
				  if($hooksdetails->UniqueFactory3!="")
				  {
					  $uniquefactory3='';
				   foreach($explodeuniquefactory3details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $hooksuniquefactory3details=implode(",",$uniquefactory3);
				   
				  
				   
				  }
	
	
	
	
	
}
elseif(isset($tissuepaperdetails))
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
				  $tissuepaperuniquefactory1details=implode(",",$uniquefactory1);
				   
				  
				   
				  }
				   if($tissuepaperdetails->UniqueFactory2!="")
				  {
					  $uniquefactory2='';
				   foreach($explodeuniquefactory2details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $tissuepaperuniquefactory2details=implode(",",$uniquefactory2);
				   
				  
				   
				  }
				   if($tissuepaperdetails->UniqueFactory3!="")
				  {
					  $uniquefactory3='';
				   foreach($explodeuniquefactory3details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $tissuepaperuniquefactory3details=implode(",",$uniquefactory3);
				   
				  
				   
				  }
	 
	 
	 
	 
	 
 
}
elseif(isset($packagingstickersdetails))
{
	
	$packagingstickersdetails=App\PackagingStickers::where('id','=',$productdetails->PackagingStickersID)->where('status','=',1)->first();
	
	$typeofstickersdetails=App\TypeofStickers::where('id','=',$packagingstickersdetails->TypeofStickerID)->where('status','=',1)->first();
	  
	$rawmaterialdetails=App\RawMaterial::where('id','=',$packagingstickersdetails->MaterialID)->where('status','=',1)->first();
	
	$adhesivedetails=App\TypeofAdhesive::where('id','=',$packagingstickersdetails->AdhesiveID)->where('status','=',1)->first();
	
	  $printtypedetails=App\PrintType::where('id','=',$packagingstickersdetails->PrintTypeID)->where('status','=',1)->first();
	  
	  $cuttingdetails=App\Cutting::where('id','=',$packagingstickersdetails->CuttingID)->where('status','=',1)->first();
	  
	  $currencydetails=App\Currency::where('id','=',$packagingstickersdetails->CuttingID)->where('status','=',1)->first();
	  
	
	//$expprintingfinishingprocess=explode(",",$packagingstickersdetails->PrintingFinishingProcessID);
	
	$expprintingfinishingprocess=explode(",",$packagingstickersdetails->PrintingFinishingProcessID);
	
	foreach($expprintingfinishingprocess as $expprinting)
	{
		
   $printingfinishingprocessdetails=App\PrintingFinishingProcess::where('id','=',$expprinting)->where('status','=',1)->first();

   $printingvalues[]=$printingfinishingprocessdetails->PrintingFinishingProcessName;
		
	}
	$implodeprintingfinishingprocess=implode(",",$printingvalues);
	
	
	
	
	
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
				  $packagingstcikersuniquefactory1details=implode(",",$uniquefactory1);
				   
				  
				   
				  }
				  if($tissuepaperdetails->UniqueFactory2!="")
				  {
					  $uniquefactory2='';
				   foreach($explodeuniquefactory2details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $packagingstcikersuniquefactory2details=implode(",",$uniquefactory2);
				   
				  
				   
				  }
				   if($tissuepaperdetails->UniqueFactory3!="")
				  {
					  $uniquefactory3='';
				   foreach($explodeuniquefactory3details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $packagingstcikersuniquefactory3details=implode(",",$uniquefactory3);
				   
				  
				   
				  }
				  
				  
	 
 
}
elseif(isset($zipperdetails))
{
	
	
	/*$packagingstickersdetails=App\PackagingStickers::where('id','=',$productdetails->PackagingStickersID)->where('status','=',1)->first();
	
	$typeofstickersdetails=App\TypeofStickers::where('id','=',$packagingstickersdetails->TypeofStickerID)->where('status','=',1)->first();
	  
	$rawmaterialdetails=App\RawMaterial::where('id','=',$packagingstickersdetails->MaterialID)->where('status','=',1)->first();
	
	$adhesivedetails=App\TypeofAdhesive::where('id','=',$packagingstickersdetails->AdhesiveID)->where('status','=',1)->first();
	
	  $printtypedetails=App\PrintType::where('id','=',$packagingstickersdetails->PrintTypeID)->where('status','=',1)->first();
	  
	  $cuttingdetails=App\Cutting::where('id','=',$packagingstickersdetails->CuttingID)->where('status','=',1)->first();
	  
	  $currencydetails=App\Currency::where('id','=',$packagingstickersdetails->CuttingID)->where('status','=',1)->first();*/
	  
	  $pullermaterialdetails=App\TipMaterial::where('id','=',$zipperdetails->PullerMaterialID)->where('status','=',1)->first();
	  
	 $zipperlogoprocessdetails=App\LogoProcess::where('id','=',$zipperdetails->PullerEndLogoprocess)->where('status','=',1)->first();
	 
	 $moldcostingcurrencydetails=App\Currency::where('id','=',$zipperdetails->MoldCostingCurrency)->where('status','=',1)->first();
	 
	 $zippercurrencydetails=App\Currency::where('id','=',$zipperdetails->MoldCostingCurrency)->where('status','=',1)->first();
	 
	 
	 
	  
	 
	   
	  
	
	
	
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$zipperdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$zipperdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$zipperdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeuniquefactory1details=explode(",",$zipperdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$zipperdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$zipperdetails->UniqueFactory3);
	  
	
	//$expprintingfinishingprocess=explode(",",$packagingstickersdetails->PrintingFinishingProcessID);
	
	$expprintingfinishingprocess=explode(",",$zipperdetails->PrintingFinishingProcessID);
	
	foreach($expprintingfinishingprocess as $expprinting)
	{
		
   $printingfinishingprocessdetails=App\PrintingFinishingProcess::where('id','=',$expprinting)->where('status','=',1)->first();

   $printingvalues[]=$printingfinishingprocessdetails->PrintingFinishingProcessName;
		
	}
	$implodezipperprintingfinishingprocess=implode(",",$printingvalues);
	
	
	
	
	
	$productionregion1details=App\ProductionRegions::where('id','=',$zipperdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$zipperdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$zipperdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeuniquefactory1details=explode(",",$zipperdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$zipperdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$zipperdetails->UniqueFactory3);
	
	 if($zipperdetails->UniqueFactory1!="")
				  {
					  $uniquefactory1='';
				   foreach($explodeuniquefactory1details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $zipperuniquefactory1details=implode(",",$uniquefactory1);
				   
				  
				   
				  }
				  if($zipperdetails->UniqueFactory2!="")
				  {
					  $uniquefactory2='';
				   foreach($explodeuniquefactory2details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $zipperuniquefactory2details=implode(",",$uniquefactory2);
				   
				  
				   
				  }
				   if($zipperdetails->UniqueFactory3!="")
				  {
					  $uniquefactory3='';
				   foreach($explodeuniquefactory3details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $zipperuniquefactory3details=implode(",",$uniquefactory3);
				   
				  
				   
				  }
				  
				  
	 
 
	
	
}
elseif(isset($tapesdetails))
{
	 $rawmaterialdetails=App\RawMaterial::where('id','=',$tapesdetails->TapesMaterialID)->where('status','=',1)->first();
	
	$tapescurrencydetails=App\Currency::where('id','=',$tapesdetails->CurrencyID)->where('status','=',1)->first();
	
	
	
	
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$tapesdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$tapesdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$tapesdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodetapesuniquefactory1details=explode(",",$tapesdetails->UniqueFactory1);
	
	$explodetapesuniquefactory2details=explode(",",$tapesdetails->UniqueFactory2);
	
	$explodetapesuniquefactory3details=explode(",",$tapesdetails->UniqueFactory3);
	
	              if($tapesdetails->UniqueFactory1!="")
				  {
					  $uniquefactory1='';
				   foreach($explodetapesuniquefactory1details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $tapesuniquefactory1details=implode(",",$uniquefactory1);
				   
				  
				   
				  }
				  if($tapesdetails->UniqueFactory2!="")
				  {
					  $uniquefactory2='';
				   foreach($explodetapesuniquefactory2details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $tapesuniquefactory2details=implode(",",$uniquefactory2);
				   
				  
				   
				  }
				   if($tapesdetails->UniqueFactory3!="")
				  {
					  $uniquefactory3='';
				   foreach($explodetapesuniquefactory3details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $tapesuniquefactory3details=implode(",",$uniquefactory3);
				   
				  
				   
				  }
	
	
}
elseif(isset($wovendetails))
{
	  $typeoflabels=App\TypeofLabels::where('id','=',$wovendetails->TypeofLabelID)->where('status','=',1)->first();
	
	//$typeoflabels->TypeofLabels
	$loomtypedetails=App\LoomType::where('id','=',$wovendetails->LoomTypeID)->where('status','=',1)->first();
	
	$loomharnessdetails=App\LoomHarness::where('id','=',$wovendetails->LoomHarnessID)->where('status','=',1)->first();
	
	
	$warpdetails=App\Warp::where('id','=',$wovendetails->WarpID)->where('status','=',1)->first();
	
	
	
	$qualtitydetails=App\Quality::where('id','=',$wovendetails->QualityID)->where('status','=',1)->first();
	
	$typeoffolddetails=App\TypeofFold::where('id','=',$wovendetails->TypeoffoldID)->where('status','=',1)->first();
	
	$languageoptions=App\Language::where('id','=',$wovendetails->LanguageID)->where('status','=',1)->first();
	
	
	
		
	
	
	$explodesewspacedetails=explode(",",$wovendetails->SewSpaceID);
	
	//print_r($explodesewspacedetails);
	
	$finishingcoatinglabels=App\FinishingLabels::where('id','=',$wovendetails->Finishing)->where('status','=',1)->first();
	
	$wovencurrencydetails=App\Currency::where('id','=',$wovendetails->CurrencyID)->where('status','=',1)->first();
	
	
	
	
	
	
	
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$wovendetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$wovendetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$wovendetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodetapesuniquefactory1details=explode(",",$wovendetails->UniqueFactory1);
	
	$explodetapesuniquefactory2details=explode(",",$wovendetails->UniqueFactory2);
	
	$explodetapesuniquefactory3details=explode(",",$wovendetails->UniqueFactory3);
	
	              if($wovendetails->UniqueFactory1!="")
				  {
					  $uniquefactory1='';
				   foreach($explodetapesuniquefactory1details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $wovenuniquefactory1details=implode(",",$uniquefactory1);
				   
				  
				   
				  }
				  if($wovendetails->UniqueFactory2!="")
				  {
					  $uniquefactory2='';
				   foreach($explodetapesuniquefactory2details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $wovenuniquefactory2details=implode(",",$uniquefactory2);
				   
				  
				   
				  }
				   if($wovendetails->UniqueFactory3!="")
				  {
					  $uniquefactory3='';
				   foreach($explodetapesuniquefactory3details as $expuniquefactorydet){
					  
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();		              $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
				   }
				   //print_r($uniquefactory1);
				  $wovenuniquefactory3details=implode(",",$uniquefactory3);
				   
				  
				   
				  }
	
	
}
elseif(isset($heatdetails))
{
  
$typeoflabels=App\TypeofLabels::where('id','=',$heatdetails->TypeofLabelID)->where('status','=',1)->first();
   
  
  $typesofheat = DB::table('typeofheattransfer')->where('id', $heatdetails->TypeofHeatTransfer)->first(); 

  $heatfinish = DB::table('heattransferfinish')->where('id', $heatdetails->FinishID)->first(); 

  $applicationname = DB::table('application')->where('id', $heatdetails->ApplicationName)->first();


  $heatcurrencydetails=App\Currency::where('id','=',$heatdetails->Currency)->where('status','=',1)->first();

  $path=storage_path();
  
  $productionregion1details=App\ProductionRegions::where('id','=',$heatdetails->ProductionRegionID1)->where('status','=',1)->first();
  $productionregion2details=App\ProductionRegions::where('id','=',$heatdetails->ProductionRegionID2)->where('status','=',1)->first();
  $productionregion3details=App\ProductionRegions::where('id','=',$heatdetails->ProductionRegionID3)->where('status','=',1)->first();
  
  
  
  $explodetapesuniquefactory1details=explode(",",$heatdetails->UniqueFactory1);
  
  $explodetapesuniquefactory2details=explode(",",$heatdetails->UniqueFactory2);
  
  $explodetapesuniquefactory3details=explode(",",$heatdetails->UniqueFactory3);
  
                if($heatdetails->UniqueFactory1!="")
          {
            $uniquefactory1='';
           foreach($explodetapesuniquefactory1details as $expuniquefactorydet){
            
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();                 $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
           }
           //print_r($uniquefactory1);
          $wovenuniquefactory1details=implode(",",$uniquefactory1);
           
          
           
          }
          if($heatdetails->UniqueFactory2!="")
          {
            $uniquefactory2='';
           foreach($explodetapesuniquefactory2details as $expuniquefactorydet){
            
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();                 $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
           }
           //print_r($uniquefactory1);
          $wovenuniquefactory2details=implode(",",$uniquefactory2);
           
          
           
          }
           if($heatdetails->UniqueFactory3!="")
          {
            $uniquefactory3='';
           foreach($explodetapesuniquefactory3details as $expuniquefactorydet){
            
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();                 $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
           }
           //print_r($uniquefactory1);
          $wovenuniquefactory3details=implode(",",$uniquefactory3);
           
          
           
          }
  
 
 
  
  
   
  
  
  
}

/*vidhya:09-04-2018*/
elseif(isset($printedlabeldetails))
{
  

    $typeoflabels=App\TypeofLabels::where('id','=',$printedlabeldetails->TypeofLabelID)->where('status','=',1)->first();
  
  //$typeoflabels->TypeofLabels
  $substrateval = DB::table('substratequality')->where('id', $printedlabeldetails->SubstrateQualityID)->first();
  
  $substraterefval = DB::table('substratereference')->where('id', $printedlabeldetails->SubstrateReferenceID)->first();
  
  
  $substratecolorval = DB::table('substratecolor')->where('id', $printedlabeldetails->SubstrateColorID)->first();
  
  
  
  $qualtitydetails=App\Quality::where('id','=',$printedlabeldetails->QualityID)->where('status','=',1)->first();
  
  $typesoffoldval = DB::table('typeoffold')->where('id', $printedlabeldetails->TypeoffoldID)->first();
  
  $languageoptions=App\Language::where('id','=',$printedlabeldetails->LanguageID)->where('status','=',1)->first();
  
  $productprinttype=\App\PrintType::where('id', $printedlabeldetails->PrinttypeID)->first();
  
   

  $finishval = DB::table('finishinglabels')->where('id', $printedlabeldetails->FinishingID)->first(); 
  
  
  $explodesewspacedetails=explode(",",$printedlabeldetails->SewSpaceID);
  
  //print_r($explodesewspacedetails);
  
  $finishingcoatinglabels=App\FinishingLabels::where('id','=',$printedlabeldetails->Finishing)->where('status','=',1)->first();
  
  $wovencurrencydetails=App\Currency::where('id','=',$printedlabeldetails->CurrencyID)->where('status','=',1)->first();
  
  
  
  
  
  
  
  $path=storage_path();
  
  $productionregion1details=App\ProductionRegions::where('id','=',$printedlabeldetails->ProductionRegionID1)->where('status','=',1)->first();
  $productionregion2details=App\ProductionRegions::where('id','=',$printedlabeldetails->ProductionRegionID2)->where('status','=',1)->first();
  $productionregion3details=App\ProductionRegions::where('id','=',$printedlabeldetails->ProductionRegionID3)->where('status','=',1)->first();
  
  
  
  $explodetapesuniquefactory1details=explode(",",$printedlabeldetails->UniqueFactory1);
  
  $explodetapesuniquefactory2details=explode(",",$printedlabeldetails->UniqueFactory2);
  
  $explodetapesuniquefactory3details=explode(",",$printedlabeldetails->UniqueFactory3);
  
                if($printedlabeldetails->UniqueFactory1!="")
          {
            $uniquefactory1='';
           foreach($explodetapesuniquefactory1details as $expuniquefactorydet){
            
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();                 $uniquefactory1[]=$uniquefactorydetails->OfficeFactoryName;
           }
           //print_r($uniquefactory1);
          $wovenuniquefactory1details=implode(",",$uniquefactory1);
           
          
           
          }
          if($printedlabeldetails->UniqueFactory2!="")
          {
            $uniquefactory2='';
           foreach($explodetapesuniquefactory2details as $expuniquefactorydet){
            
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();                 $uniquefactory2[]=$uniquefactorydetails->OfficeFactoryName;
           }
           //print_r($uniquefactory1);
          $wovenuniquefactory2details=implode(",",$uniquefactory2);
           
          
           
          }
           if($printedlabeldetails->UniqueFactory3!="")
          {
            $uniquefactory3='';
           foreach($explodetapesuniquefactory3details as $expuniquefactorydet){
            
                     $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();                 $uniquefactory3[]=$uniquefactorydetails->OfficeFactoryName;
           }
           //print_r($uniquefactory1);
          $wovenuniquefactory3details=implode(",",$uniquefactory3);
           
          
           
          }
  
 
 
  
  
   
  
  
  
}

?>

  <div class="col-lg-12 product-detail-form">
  <?php
  if(isset($boxesdetails))
  {
	  
  ?>
    <div class="container container-viewlist">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS</div>
  </div>
  </div>
  <div class="container container-viewlist">
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
     @if($boxesdetails->ProductionRegionID3!="")
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region 3</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="
        @if($boxproductionregiondetails3){{$boxproductionregiondetails3->ProductionRegions}}@endif">
      </div>
    </div>
     @endif
      @if($boxesdetails->UniqueFactory3!="")
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

  
	  
	  }
	  
	elseif(isset($hangtagsdetails))
  {
  ?>
    <div class="container container-viewlist">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS</div>
  </div>
  </div>
  <div class="container container-viewlist">
  <form class="form-row" action="/action_page.php">
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-grp">Raw Material</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagrawmaterialdetails->RawMaterial}}">
      </div>
    </div>
    
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->QualityReference}} @if($boxesdetails->QualityReferencem==1){{"As Per Sample"}}@endif ">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Thickness</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->Thickness}} {{$hangtagsdetails->measurement1}}">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->Width}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->Length}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Ground Paper Color</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsdetails->GroundPaperColor}}">
      </div>
    </div>
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="uni-pro">Print Type</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagprinttypedetails->PrintType}}">
      </div>
    </div>
    
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="desc">CMYK</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="
@if($hangtagsdetails->CMYK=='0') No @elseif($hangtagsdetails->CMYK=='1') Yes @endif">
      </div>
    </div>
     
@if($hangtagsdetails->CMYK=='0')
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 1</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsdetails->PrintColor1}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 2</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsdetails->PrintColor2}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 3</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsdetails->PrintColor3}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 4</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsdetails->PrintColor4}}">
      </div>

    </div>@else
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 5</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsdetails->PrintColor5}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 6</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsdetails->PrintColor6}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 7</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsdetails->PrintColor7}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 8</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsdetails->PrintColor8}}">
      </div>

    </div>
      <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="status">Print Color 9</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsdetails->PrintColor9}}">
      </div>

    </div>
     
    @endif
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="pro-proces">Cutting</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagcuttingdetails->CuttingName}}">
      </div>
    </div>
     
    
     
    <div class="form-group  col-md-6">
      <label class="control-label col-md-4" for="version">Printing Finishing Process</label>
      <div class="col-md-8">          
        <input type="text" class="form-control" id="uni-pro"  name="Unique-Product" value="{{$hangtagsimplodeprintingfinishingprocess}} ">
      </div>
    </div>
    
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Drill hole size</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->Drillholesize}}">
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Grommet Material</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$grommetmaterialdetails->MetalMaterial}}">
      </div>
    </div>
    
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Grommet Colour</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$metalcolourdetails->MetalColour}}">
      </div>
    </div>
    
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">String Material</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$stringmaterialdetails->StringMaterials}}">
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">String Total Length:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->StringTotalLength}}">
      </div>
    </div>
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">String Loop to Knot Length:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->StringLooptoKnotLength}}">
      </div>
    </div>
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Seal:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$sealmaterialdetails->SealsMaterials}}">
      </div>
    </div>
    
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Ball Chain:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="@if($hangtagsdetails->BallChain==0){{"NO"}}@else{{"Yes"}}@endif">
      </div>
    </div>
    
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Ball Chain Colour:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$ballchaincolor->MetalColour}}">
      </div>
    </div>
    
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Ball Chain Length:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->BallChainLength}}">
      </div>
    </div>
    
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Ball Chain Material:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$ballchainmaterialdetails->MetalMaterial}}">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Pin:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->Pin}}">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Pin Style:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$pinstyle->PinStyle}}">
      </div>
    </div>
    
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Pin Colour:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$pincolourdetails->MetalColour}}">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Pin Length:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->PinLength}}">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="brand">Pin Material:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$pinmaterialdetails->MetalMaterial}}">
      </div>
    </div>
    
    
  
  
  <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region 1</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsproductionregion1details->ProductionRegions}}">
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory 1</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtaguniquefactory1details}}">
      </div>
    </div>
    @if($hangtagsdetails->ProductionRegionID2!="")
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region 2</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="
        {{$hangtagsproductionregion2details->ProductionRegions}}">
      </div>
    </div>
    @endif
    
    @if($hangtagsdetails->UniqueFactory2!="")
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory 2</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtaguniquefactory2details}}">
      </div>
    </div>
    @endif
     @if($hangtagsdetails->ProductionRegionID3!="")
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region 3</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="
        {{$hangtagsproductionregion3details->ProductionRegions}}">
      </div>
    </div>
     @endif
      @if($hangtagsdetails->UniqueFactory3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory 3</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtaguniquefactory3details}}">
      </div>
    </div>
    @endif
   
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sample Costing</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagsdetails->Sample_costing}}">
      </div>
    </div>
    
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Currency</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hangtagscurrencydetails->Currency}}">
      </div>
    </div>
    
    
</div>

<?php

  
	  
	  }

	  
	  
  elseif(isset($hookdetails))
  {
	  
  ?>
    <div class="container container-viewlist">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(Hooks)</div>
  </div>
  </div>
  <div class="container container-viewlist">
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hooksuniquefactory1details}}"> 
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hooksuniquefactory2details}}"> 
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$hooksuniquefactory3details}}"> 
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

  
	  
	  }
  elseif(isset($tissuepaperdetails))
  {
	  
  ?>
    <div class="container container-viewlist">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(TissuePaper)</div>
  </div>
  </div>
  <div class="container container-viewlist">
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tissuepaperuniquefactory1details}}"> 
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tissuepaperuniquefactory2details}}"> 
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tissuepaperuniquefactory3details}}"> 
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

  
	  }
 elseif(isset($packagingstickersdetails))
  {
	  
  ?>
    <div class="container container-viewlist">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(Packaging Stickers)</div>
  </div>
  </div>
  <div class="container container-viewlist">
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$packagingstcikersuniquefactory1details}}"> 
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$packagingstcikersuniquefactory2details}}"> 
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$packagingstcikersuniquefactory3details}}"> 
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

  
	  
	  }
	elseif(isset($zipperdetails))
  {
	  
  ?>
    <div class="container container-viewlist">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(Zipper Pullers)</div>
  </div>
  </div>
  <div class="container container-viewlist">
  <form class="form-row" action="/action_page.php">
  
   
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperdetails->QualityReference}} @if($hooksdetails->QualityReferencem==1){{"As Per Sample"}}@endif ">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">String Thickness:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperdetails->StringThickness}}">
      </div>
    </div>
    
      

      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">String Quality</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperdetails->StringQuality}}">
      </div>
    </div>
    
   <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">String Color 1:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperdetails->StringColor1}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">String Color 2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperdetails->StringColor2}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Puller Material</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$pullermaterialdetails->TipMaterial}}">
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Puller End Width Size:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperdetails->PullerEndWidthSize}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Puller End Color:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperdetails->PullerEndColor}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Puller End Logo process:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperlogoprocessdetails->LogoProcess}}"> 
      </div>
    </div>
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Mold Costing Currency:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$moldcostingcurrencydetails->Currency}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sample Costing:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperdetails->SampleCosting}}"> 
      </div>
    </div>
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Mold Costing:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperdetails->MoldCosting}}"> 
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperuniquefactory1details}}"> 
      </div>
    </div>
    @if($zipperdetails->ProductionRegionID2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion2details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
     @if($zipperdetails->UniqueFactory2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperuniquefactory2details}}"> 
      </div>
    </div>
    
    @endif
    
     @if($zipperdetails->ProductionRegionID3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion3details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
   
   
    @if($zipperdetails->UniqueFactory3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zipperuniquefactory3details}}"> 
      </div>
    </div>
    
    @endif
    
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Zipper Pullers Currency:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$zippercurrencydetails->Currency}}"> 
      </div>
    </div>
   
</div>

<?php

  
	  
	  }  
	  
	  elseif(isset($tapesdetails))
	  {
		  ?>
		  <div class="container container-viewlist">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(Tapes)</div>
  </div>
  </div>
  <div class="container container-viewlist">
  <form class="form-row" action="/action_page.php">
  
  <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Tapes Material</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$rawmaterialdetails->RawMaterial}}">
      </div>
    </div>
   
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tapesdetails->QualityReference}} @if($hooksdetails->QualityReferencem==1){{"As Per Sample"}}@endif ">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Tape Color:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tapesdetails->TapeColor}}">
      </div>
    </div>
    
      

      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Tape Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tapesdetails->TapeWidth}}">
      </div>
    </div>
    
   <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Total Length:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tapesdetails->TotalLength}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Brocade:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tapesdetails->Brocade}}">
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tapesuniquefactory1details}}"> 
      </div>
    </div>
    @if($tapesdetails->ProductionRegionID2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion2details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
     @if($tapesdetails->UniqueFactory2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tapesuniquefactory2details}}"> 
      </div>
    </div>
    
    @endif
    
     @if($tapesdetails->ProductionRegionID3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion3details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
   
   
    @if($tapesdetails->UniqueFactory3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tapesuniquefactory3details}}"> 
      </div>
    </div>
    
    @endif
    
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Currency:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tapescurrencydetails->Currency}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sample Costing:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$tapesdetails->Sample_costing}}"> 
      </div>
    </div>
   
</div>
	 <?php  }
	 
	  elseif(isset($wovendetails))
	  {?>
		  
		  
      <div class="container container-viewlist">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(Woven Labels)</div>
  </div>
  </div>
     <div class="container container-viewlist">
  <form class="form-row" action="/action_page.php">
  
  <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Type of Label</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="typeoflabel" name="typeoflabel" value="{{$typeoflabels->TypeofLabels}}">
      </div>
    </div>
    
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Loom Type</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="loomtype" name="loomtype" value="{{$loomtypedetails->LoomType}}">
      </div>
    </div>
    
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Loom Harness</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="loomharness" name="loomharness" value="{{$loomharnessdetails->LoomHarness}}">
      </div>
    </div>
    
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Warp</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="warp" name="warp" value="{{$warpdetails->Warp}}">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="quality" name="quality" value="{{$qualtitydetails->Quality}}">
      </div>
    </div>
   
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="qualityref" name="qualityref" value="{{$wovendetails->QualityReference}} @if($wovendetails->QualityReferencem==1){{"As Per Sample"}}@endif ">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Width:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="width" name="width" value="{{$wovendetails->Width}}">
      </div>
    </div>

      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="length" name="length" value="{{$wovendetails->Length}}">
      </div>
    </div>
    
   <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Type of Fold:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="typeoffold" name="typeoffold" value="{{$typeoffolddetails->Typeoffold}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Sew Space: &nbsp;&nbsp;&nbsp; Right</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="right" name="right" value="{{$explodesewspacedetails[0]}}">
      </div>
      
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Sew Space: &nbsp;&nbsp;&nbsp; Left</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="left" name="left" value="{{$explodesewspacedetails[1]}}">
      </div>
      
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Sew Space: &nbsp;&nbsp;&nbsp; Top</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="top" name="top" value="{{$explodesewspacedetails[2]}}">
      </div>
      
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Sew Space: &nbsp;&nbsp;&nbsp; Bottom</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="bottom" name="bottom" value="{{$explodesewspacedetails[3]}}">
      </div>
      
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Sew Space: &nbsp;&nbsp;&nbsp; All Round</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="allround" name="allround" value="{{$explodesewspacedetails[4]}}">
      </div>
      
    </div>
    
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Finished Length:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="finishedlength" name="finishedlength" value="{{$wovendetails->FinishedLength}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Ground Color:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="groundocolor" name="groundocolor" value="{{$wovendetails->GroundColor}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Brocade Color 1 (Pantone) :</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovendetails->BrocadeColor1}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Brocade Color 2 (Pantone) :</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovendetails->BrocadeColor2}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Brocade Color 3 (Pantone) :</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovendetails->BrocadeColor3}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Brocade Color 4 (Pantone) :</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovendetails->BrocadeColor4}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Brocade Color 5 (Pantone) :</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovendetails->BrocadeColor5}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Brocade Color 6 (Pantone) :</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovendetails->BrocadeColor6}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Finishing / Coating :</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$finishingcoatinglabels->FinishingCoatingLabels}}">
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovenuniquefactory1details}}"> 
      </div>
    </div>
    @if($wovendetails->ProductionRegionID2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion2details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
     @if($wovendetails->UniqueFactory2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovenuniquefactory2details}}"> 
      </div>
    </div>
    
    @endif
    
     @if($wovendetails->ProductionRegionID3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion3details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
   
   
    @if($wovendetails->UniqueFactory3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovenuniquefactory3details}}"> 
      </div>
    </div>
    
    @endif
    
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Currency:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovencurrencydetails->Currency}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sample Costing:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovendetails->Sample_costing}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Language Options:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$languageoptions->LanguageName}}"> 
      </div>
    </div>
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">CountryOfOrigin:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovendetails->CountryofOriginID}}"> 
      </div>
    </div>
    <?php
	$expsizerange=explode("#",$wovendetails->SizeRangeID);
	foreach($expsizerange as $sizerange)
	{
		$valsizerange[]=$sizerange;
	}$implodesizerange=implode(",",$valsizerange);
	?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sizes:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizerange}}"> 
      </div>
    </div>
   
</div>
		  
		  
		 <?php  }
   
    elseif(isset($heatdetails))
    {?>
  
  
   <div class="container container-viewlist">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(Heat Transfer Labels)</div>
  </div>
  </div>
  <div class="container container-viewlist">
  <form class="form-row" action="/action_page.php">
       <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Type of Label</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="typeoflabel" name="typeoflabel" value="{{$typeoflabels->TypeofLabels}}">
      </div>
    </div>
       <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Types of Heat Transfer</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="length" name="length" value="{{$typesofheat->TypeofHeatTransferName}}">
      </div>
    </div>

    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="qualityref" name="qualityref" value="{{$heatdetails->Qualityreference}} @if($heatdetails->Qualityreferencem==1){{"As Per Sample"}}@endif ">
      </div>
    </div>

    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Heat Finish</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="length" name="length" value="{{$heatfinish->HeatTransferFinish}}">
      </div>
    </div>
    
   <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="typeoffold" name="typeoffold" value="{{$heatdetails->Width}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="typeoffold" name="typeoffold" value="{{$heatdetails->Length}}">
      </div>
    </div>
 
     
         
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Print Color 1 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$heatdetails->PrintColor1}}">
      </div>
    </div>
     
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Print Color 2 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$heatdetails->PrintColor2}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Print Color 3 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$heatdetails->PrintColor3}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Print Color 4 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$heatdetails->PrintColor4}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Application Name</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$applicationname->ApplicationName}}">
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovenuniquefactory1details}}"> 
      </div>
    </div>
    @if($heatdetails->ProductionRegionID2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion2details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
     @if($heatdetails->UniqueFactory2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovenuniquefactory2details}}"> 
      </div>
    </div>
    
    @endif
    
     @if($heatdetails->ProductionRegionID3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion3details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
   
   
    @if($heatdetails->UniqueFactory3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovenuniquefactory3details}}"> 
      </div>
    </div>
    
    @endif
    
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Currency:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$heatcurrencydetails->Currency}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sample Costing:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$heatdetails->SampleCost}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Language Options:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$languageoptions->LanguageName}}"> 
      </div>
    </div>
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">CountryOfOrigin:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$heatdetails->CountryofOriginID}}"> 
      </div>
    </div>
    <?php
  $expsizerange=explode("#",$heatdetails->SizeRangeID);
  foreach($expsizerange as $sizerange)
  {
    $valsizerange[]=$sizerange;
  }$implodesizerange=implode(",",$valsizerange);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sizes:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizerange}}"> 
      </div>
    </div>
    <?php
  $expsizerang=explode("#",$heatdetails->SizebyLetter);
  foreach($expsizerang as $sizerange)
  {
    $valsizerang[]=$sizerange;
  }$implodesizerang=implode(",",$valsizerang);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">SizesbyLetter:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizerang}}"> 
      </div>
    </div>


    <?php
    $sizemain4=explode("#",$heatdetails->SizebyNumber);
  foreach($sizemain4 as $sizemainlist4)
  {
    $sizemaintents[]=$sizemainlist4;
  }$implodesizemain4=implode(",",$sizemaintents);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sizes by Number:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizemain4}}"> 
      </div>
    </div>

     <?php
    $sizemain=explode("#",$heatdetails->Sizemaintenance);
  foreach($sizemain as $sizemainlist)
  {
    $sizemainten[]=$sizemainlist;
  }$implodesizemain=implode(",",$sizemainten);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Size Maintenance:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizemain}}"> 
      </div>
    </div>

    <?php
    $sizemain1=explode("#",$heatdetails->PantsSizes);
  foreach($sizemain1 as $sizemainlist1)
  {
    $sizemaintent[]=$sizemainlist1;
  }$implodesizemain1=implode(",",$sizemaintent);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Pants Sizes:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizemain1}}"> 
      </div>
    </div>

     <?php
    $sizemain2=explode("#",$heatdetails->ToddlerSizes);
  foreach($sizemain2 as $sizemainlist2)
  {
    $sizemaintents[]=$sizemainlist2;
  }$implodesizemain2=implode(",",$sizemaintents);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Toddler sizes:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizemain2}}"> 
      </div>
    </div>

    <?php
    $sizemain3=explode("#",$heatdetails->BraSizes);
  foreach($sizemain3 as $sizemainlist3)
  {
    $sizemaintents[]=$sizemainlist3;
  }$implodesizemain3=implode(",",$sizemaintents);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Bra sizes:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizemain3}}"> 
      </div>
    </div>
   
</div>
  
  
   
     <?php  }
   
    elseif(isset($printedlabeldetails))
    {?>

  
  
   <div class="container container-viewlist">
  <div class="panel product-details-panel">
    <div class="panel-body panel-header">PRODUCT DETAILS(Printed Labels)</div>
  </div>
  </div>
  <div class="container container-viewlist">
  <form class="form-row" action="/action_page.php">
  
  <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Type of Label</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="typeoflabel" name="typeoflabel" value="{{$typeoflabels->TypeofLabels}}">
      </div>
    </div>
    
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Substrate Quality</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="loomtype" name="loomtype" value="{{$substrateval->SubstrateQualityName}}">
      </div>
    </div>
    
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Substrate Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="loomharness" name="loomharness" value="{{$substraterefval->SubstrateReferenceName}}">
      </div>
    </div>
    
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Substrate Color</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="warp" name="warp" value="{{$substratecolorval->SubstrateColorName}}">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Quality Reference</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="qualityref" name="qualityref" value="{{$printedlabeldetails->Qualityreference}} @if($printedlabeldetails->Qualityreferencem==1){{"As Per Sample"}}@endif ">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Type of Fold</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="quality" name="quality" value="{{$typesoffoldval->Typeoffold}}">
      </div>
    </div>
   
      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Finished Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="width" name="width" value="{{$printedlabeldetails->FinishedLength}}">
      </div>
    </div>
     <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="pro-sub-grp">Dura Print:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="width" name="width" value="{{$printedlabeldetails->DuraPrint}}">
      </div>
    </div>

      <div class="form-group col-md-6">
      <label class="control-label col-md-4" for="program">Print Type</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="length" name="length" value="{{$productprinttype->PrintType}}">
      </div>
    </div>
    
   <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Width</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="typeoffold" name="typeoffold" value="{{$printedlabeldetails->Width}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Length</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="typeoffold" name="typeoffold" value="{{$printedlabeldetails->Length}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Sew Space: &nbsp;&nbsp;&nbsp; Right</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="right" name="right" value="{{$explodesewspacedetails[0]}}">
      </div>
      
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Sew Space: &nbsp;&nbsp;&nbsp; Left</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="left" name="left" value="{{$explodesewspacedetails[1]}}">
      </div>
      
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Sew Space: &nbsp;&nbsp;&nbsp; Top</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="top" name="top" value="{{$explodesewspacedetails[2]}}">
      </div>
      
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Sew Space: &nbsp;&nbsp;&nbsp; Bottom</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="bottom" name="bottom" value="{{$explodesewspacedetails[3]}}">
      </div>
      
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Sew Space: &nbsp;&nbsp;&nbsp; All Round</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="allround" name="allround" value="{{$explodesewspacedetails[4]}}">
      </div>
      
    </div>
    
     
         
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Ink Color 1 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$printedlabeldetails->InkColor1}}">
      </div>
    </div>
     
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Ink Color 2 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$printedlabeldetails->InkColor2}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Ink Color 3 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$printedlabeldetails->InkColor3}}">
      </div>
    </div>
     <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Ink Color 4 (Pantone)</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$printedlabeldetails->InkColor4}}">
      </div>
    </div>
    <div class="form-group col-md-6 col-md-offset-0 ">
      <label class="control-label col-md-4" for="brand">Finishing / Coating</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$finishval->FinishingCoatingLabels}}">
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
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovenuniquefactory1details}}"> 
      </div>
    </div>
    @if($wovendetails->ProductionRegionID2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion2details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
     @if($wovendetails->UniqueFactory2!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory2:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovenuniquefactory2details}}"> 
      </div>
    </div>
    
    @endif
    
     @if($wovendetails->ProductionRegionID3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Production Region3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$productionregion3details->ProductionRegions}}"> 
      </div>
    </div>
    
    @endif
   
   
    @if($wovendetails->UniqueFactory3!="")
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Unique Factory3:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovenuniquefactory3details}}"> 
      </div>
    </div>
    
    @endif
    
   <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Currency:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovencurrencydetails->Currency}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sample Costing:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovendetails->Sample_costing}}"> 
      </div>
    </div>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Language Options:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$languageoptions->LanguageName}}"> 
      </div>
    </div>
     <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">CountryOfOrigin:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$wovendetails->CountryofOriginID}}"> 
      </div>
    </div>
    <?php
  $expsizerange=explode("#",$wovendetails->SizeRangeID);
  foreach($expsizerange as $sizerange)
  {
    $valsizerange[]=$sizerange;
  }$implodesizerange=implode(",",$valsizerange);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sizes:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizerange}}"> 
      </div>
    </div>

    <?php
  $expsizerang=explode("#",$printedlabeldetails->SizebyLetter);
  foreach($expsizerang as $sizerange)
  {
    $valsizerang[]=$sizerange;
  }$implodesizerang=implode(",",$valsizerang);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">SizesbyLetter:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizerang}}"> 
      </div>
    </div>


    <?php
    $sizemain4=explode("#",$printedlabeldetails->SizebyNumber);
  foreach($sizemain4 as $sizemainlist4)
  {
    $sizemaintents[]=$sizemainlist4;
  }$implodesizemain4=implode(",",$sizemaintents);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Sizes by Number:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizemain4}}"> 
      </div>
    </div>

     <?php
    $sizemain=explode("#",$printedlabeldetails->Sizemaintenance);
  foreach($sizemain as $sizemainlist)
  {
    $sizemainten[]=$sizemainlist;
  }$implodesizemain=implode(",",$sizemainten);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Size Maintenance:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizemain}}"> 
      </div>
    </div>

    <?php
    $sizemain1=explode("#",$printedlabeldetails->PantsSizes);
  foreach($sizemain1 as $sizemainlist1)
  {
    $sizemaintent[]=$sizemainlist1;
  }$implodesizemain1=implode(",",$sizemaintent);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Pants Sizes:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizemain1}}"> 
      </div>
    </div>

     <?php
    $sizemain2=explode("#",$printedlabeldetails->ToddlerSizes);
  foreach($sizemain2 as $sizemainlist2)
  {
    $sizemaintents[]=$sizemainlist2;
  }$implodesizemain2=implode(",",$sizemaintents);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Toddler sizes:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizemain2}}"> 
      </div>
    </div>

    <?php
    $sizemain3=explode("#",$printedlabeldetails->BraSizes);
  foreach($sizemain3 as $sizemainlist3)
  {
    $sizemaintents[]=$sizemainlist3;
  }$implodesizemain3=implode(",",$sizemaintents);
  ?>
    <div class="form-group col-md-6 ">
      <label class="control-label col-md-4" for="brand">Bra sizes:</label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="pro-grp" name="Product-grp" value="{{$implodesizemain3}}"> 
      </div>
    </div>
   
</div>
  
  
  <?php
  }
  ?>

</div>

  <div class="col-lg-12 product-images">
    <div class="container container-viewlist">
  <div class="panel Image-panel">
    <div class="panel-body panel-header">IMAGE</div>
  </div>
  <?php
  //echo $hangtagsdetails;
  ?>
 <?php
  if(isset($boxesdetails))
  {
  ?>
  <div class="container col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($boxesdetails->Artwork!="")
         <img  src="{{ route('user.boxpic', ['id' => $boxesdetails->id]) }}" alt="your image" width="120" height="120" />
         @else
         <img  src="../img/image-sample.jpg" alt="your image" width="120" height="120" />
         @endif
  </div>
  </div>
  <?php
  }
  elseif(isset($hangtagsdetails))
  {
  ?>
  <div class="container col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($hangtagsdetails->Artwork!="")
         <img  src="{{ route('user.hangtagpic', ['id' => $hangtagsdetails->id]) }}" alt="your image" width="120" height="120" />
         @else
         <img  src="img/image-sample.jpg" alt="your image" width="120" height="120" />
         @endif
  </div>
  </div>
  
  <?php
  }
  elseif(isset($hookdetails))
  {
  ?>
  <div class="container col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($hooksdetails->Artwork!="")
      <img  src="{{ route('user.producthookpic', ['id' => $hooksdetails->id]) }}" alt="your image" width="120" height="120" />
      @else
        <img  src="../img/image-sample.jpg" alt="your image" width="120" height="120" />
                @endif
  </div>
  </div>
  
  <?php
  }
 
  elseif(isset($tissuepaperdetails))
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
  elseif(isset($packagingstickersdetails))
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
  elseif(isset($zipperdetails))
  {
  ?>
  <div class="container col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($zipperdetails->Artwork!="")
      <img  src="{{ route('user.zipperpic', ['id' => $zipperdetails->id]) }}" alt="your image" width="120" height="120" />
      @else
        <img  src="../img/image-sample.jpg" alt="your image" width="120" height="120" />
                @endif
  </div>
  </div>
  
  <?php
  }
   elseif(isset($tapesdetails))
  {
  ?>
  <div class="container col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($tapesdetails->Artwork!="")
      <img  src="{{ route('user.tapespic', ['id' => $tapesdetails->id]) }}" alt="your image" width="120" height="120" />
      @else
        <img  src="../img/image-sample.jpg" alt="your image" width="120" height="120" />
                @endif
  </div>
  </div>
  
  <?php
  }
  elseif(isset($wovendetails))
  {
  ?>
   <div class="container col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($wovendetails->Artwork!="")
      <img  src="{{ route('user.wovenlabelpic', ['id' => $wovendetails->id]) }}" alt="your image" width="120" height="120" />
      @else
        <img  src="../img/image-sample.jpg" alt="your image" width="120" height="120" />
                @endif
  </div>
  </div>
  
  <?php
  }
  ?>
   <!-- vidhya:09-04-2018 -->
  <?php
  if($productdetails->PrintedLabelID!="")
  {
  ?>
  <div class="col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($printedlabeldetails->Artwork!="")
      <img  src="{{ route('user.printedlabelpic', ['id' => $printedlabeldetails->id]) }}" alt="your image" width="120" height="120" />
      @else
        <img  src="../img/image-sample.jpg" alt="your image" width="120" height="120" />
                @endif
  </div>
  </div>
  
  <?php
  }
  ?>
  <?php
  if($productdetails->HeatTransferLabelID!="")
  {
  ?>
  <div class="col-lg-3">
  <div class="img-thumbnail" style="width:150px; height:150px;">
         @if($heatdetails->Artwork!="")
      <img  src="{{ route('user.heattransferpic', ['id' => $heatdetails->id]) }}" alt="your image" width="120" height="120" />
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
    <div class="container container-viewlist">
  <div class="panel inventory-panel">
    <div class="panel-body panel-header">INVENTORY INFORMATION</div>
  </div>
</div>
<div class="container container-viewlist">
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
<div class="row container container-viewlist">
<div class="form-group col-md-4">
 <label class="control-label col-sm-6" for="email">Ex works:</label>
      <div class="col-sm-6">
        <input type="checkbox" name="exworks" @if($productdetails->ExWorks=='1') checked="checked" @endif>
      </div>
</div>
<div class="form-group col-md-4 container">
 <label class="control-label col-sm-6" for="email">Fright cost:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="frightcost"  name="frightcost">
      </div>
</div>
<div class="form-group col-md-4 container">
 <label class="control-label col-sm-6" for="email">Currency:</label>
      <div class="col-sm-6">
<input type="text" class="form-control" id="currency"  name="currency" value="{{$currencydetails->Currency}}">


      </div>
</div>
</div>
<div class="row container container-viewlist">
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
    <div class="container container-viewlist">
  <div class="panel selling-price-panel">
    <div class="panel-body panel-header">SELLING PRICE</div>
  </div>
</div>


<div class="container container-viewlist">
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

<div class="row sampledetailstitle"  style="margin-top:20px;">
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
<div class="row sampledtails">

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
    <div>
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
        
        
        
        
        
        
        
        
        
        
                   
          </div>
      
      </div>

    </div>
</div>








<!--Woven Subgroup-->










@endsection 