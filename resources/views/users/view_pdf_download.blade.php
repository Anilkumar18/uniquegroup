<!doctype html>
<?php
error_reporting(0);
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
 $productdetails=App\ProductDetails::where('id','=',$productdetails->id)->where('status','=',1)->first();
 //$boxesdetails=Boxes::where('id','=',$productdetails->BoxID)->where('status','=',1)->first();
 $productgroupdetails=App\ProductGroup::where('id','=',$productdetails->ProductGroupID)->where('status','=',1)->first();
 
 $productsubgroupdetails=App\ProductSubGroup::where('id','=',$productdetails->ProductSubGroupID)->where('status','=',1)->first();
 
 $customerdetails=App\Customers::where('id','=',$productdetails->CustomerID)->where('status','=',1)->first();
 
 $seasondetails=App\Season::where('id','=',$productdetails->SeasonID)->where('status','=',1)->first();
 
 $statusdetails=App\Status::where('id','=',$productdetails->ProductStatusID)->where('status','=',1)->first();
 $customerwarehousedetails=App\CustomerUsers::where('id','=',$productdetails->CustomerWareHouseID)->where('status','=',1)->first();
 
 $pricingmethodetails=App\PricingMethod::where('id','=',$productdetails->PricingMethod)->where('status','=',1)->first();
 
  $expquantity=explode("#",$productdetails->QuantityMOQ);
  
  foreach($expquantity as $expqty)
  {
	  $expqtydetails[]=$expqty;
	 
  }
 $implodeexpqtydetails=implode(",",$expqtydetails);
 
   $unitofmeasurementdetails=App\UnitofMeasurement::where('id','=',$productdetails->UnitofMeasurementID)->where('status','=',1)->first();
   	
// print_r($implodeexpqtydetails);

$SampleRequestedDate=date('F j,Y',strtotime($productdetails->SampleRequestedDate));

$requestdate=date('F j,Y',strtotime($productdetails->created_at));
  
 
 if($boxesdetails->id!="")
 {
	 
	$boxesdetails=App\Boxes::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	
	
	$boxrawmaterialdetails=App\RawMaterial::where('id','=',$boxesdetails->RawMaterialID)->where('status','=',1)->first();
	
	
	$printtypedetails=App\PrintType::where('id','=',$boxesdetails->PrintTypeID)->where('status','=',1)->first();
	
	$cuttingdetails=App\Cutting::where('id','=',$boxesdetails->CuttingID)->where('status','=',1)->first();
	
	
	$boxesexpprintingfinishingprocess=explode(",",$boxesdetails->PrintingFinishingProcessID);
	
	//print_r($expprintingfinishingprocess);
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$boxesdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$boxesdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$boxesdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeboxuniquefactory1details=explode(",",$boxesdetails->UniqueFactory1);
	
	
	
	$explodeboxuniquefactory2details=explode(",",$boxesdetails->UniqueFactory2);
	
	$explodeboxuniquefactory3details=explode(",",$boxesdetails->UniqueFactory3);
	
	
	$boxcurrencydetails=App\Currency::where('id','=',$boxesdetails->CurrencyID)->first();
	
	
	
	
		
 }
 if($hookdetails->id!="")
 {
	$hooksdetails=App\Hook::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	
	$hookrawmaterialdetails=App\HooksMaterial::where('id','=',$hooksdetails->HooksMaterialID)->where('status','=',1)->first();
	
	$moldcostingcurrencydetails=App\Currency::where('id','=',$hooksdetails->MoldCostingCurrency)->where('status','=',1)->first();
	
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$hooksdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$hooksdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$hooksdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodehookuniquefactory1details=explode(",",$hooksdetails->UniqueFactory1);
	
	$explodehookuniquefactory2details=explode(",",$hooksdetails->UniqueFactory2);
	
	$explodehookuniquefactory3details=explode(",",$hooksdetails->UniqueFactory3);
	
	
 }
 if($tissuepaperdetails->id!="")
 {
	 $tissuepaperdetails=App\Tissuepaper::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	 
	$rawmaterialdetails=App\RawMaterial::where('id','=',$tissuepaperdetails->MaterialID)->where('status','=',1)->first();
	
	$printtypedetails=App\PrintType::where('id','=',$tissuepaperdetails->PrintTypeID)->where('status','=',1)->first();
	
	
	$cuttingdetails=App\Cutting::where('id','=',$tissuepaperdetails->CuttingID)->where('status','=',1)->first();
	
	$expprintingfinishingprocess=explode(",",$tissuepaperdetails->PrintingFinishingProcessID);
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$tissuepaperdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$tissuepaperdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$tissuepaperdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodetissuepaperuniquefactory1details=explode(",",$tissuepaperdetails->UniqueFactory1);
	
	$explodetissuepaperuniquefactory2details=explode(",",$tissuepaperdetails->UniqueFactory2);
	
	$explodetissuepaperuniquefactory3details=explode(",",$tissuepaperdetails->UniqueFactory3);
	 
	 
	 
	 
	 
 }
 if($packagingstickersdetails->id!="")
 {
	$packagingstickersdetails=App\PackagingStickers::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	
	$typeofstickersdetails=App\TypeofStickers::where('id','=',$packagingstickersdetails->TypeofStickerID)->where('status','=',1)->first();
	  
	$rawmaterialdetails=App\RawMaterial::where('id','=',$packagingstickersdetails->MaterialID)->where('status','=',1)->first();
	
	$adhesivedetails=App\TypeofAdhesive::where('id','=',$packagingstickersdetails->AdhesiveID)->where('status','=',1)->first();
	
	  $printtypedetails=App\PrintType::where('id','=',$packagingstickersdetails->PrintTypeID)->where('status','=',1)->first();
	  
	  $cuttingdetails=App\Cutting::where('id','=',$packagingstickersdetails->CuttingID)->where('status','=',1)->first();
	  
	  $currencydetails=App\Currency::where('id','=',$packagingstickersdetails->CuttingID)->where('status','=',1)->first();
	  
	
	$expprintingfinishingprocess=explode(",",$packagingstickersdetails->PrintingFinishingProcessID);
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$packagingstickersdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$packagingstickersdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$packagingstickersdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$packagingstickersexplodeuniquefactory1details=explode(",",$packagingstickersdetails->UniqueFactory1);
	
	$packagingstickersexplodeuniquefactory2details=explode(",",$packagingstickersdetails->UniqueFactory2);
	
	$packagingstickersexplodeuniquefactory3details=explode(",",$packagingstickersdetails->UniqueFactory3);
	 
 }
 if($hangtagsdetails->id!="")
 {
	
	 $hangtagsdetails=App\HangTags::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	/* $rawmaterialdetails=App\RawMaterial::where('id','=',$hangtagsdetails->MaterialID)->where('status','=',1)->first();
	 
	 $printtypedetails=App\PrintType::where('id','=',$hangtagsdetails->PrintTypeID)->where('status','=',1)->first();
	 $cuttingdetails=App\Cutting::where('id','=',$hangtagsdetails->CuttingID)->where('status','=',1)->first();
	 
	 $expprintingfinishingprocess=explode(",",$hangtagsdetails->PrintingFinishingProcessID);
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$hangtagsdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$hangtagsdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$hangtagsdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeuniquefactory1details=explode(",",$hangtagsdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$hangtagsdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$hangtagsdetails->UniqueFactory3);
	
	
	$grommetmaterialdetails=App\MetalMaterial::where('id','=',$hangtagsdetails->GrommetMaterialID)->where('status','=',1)->first();*/
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
 if($zipperdetails->id!="")
 {
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
	
	
	
	$explodezipperuniquefactory1details=explode(",",$zipperdetails->UniqueFactory1);
	
	$explodezipperuniquefactory2details=explode(",",$zipperdetails->UniqueFactory2);
	
	$explodezipperuniquefactory3details=explode(",",$zipperdetails->UniqueFactory3);
	
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
if($tapesdetails->id!="")
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
	
	             
		
 
 }
 if($wovendetails->id!="")
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
	
	
	
	$explodewovenuniquefactory1details=explode(",",$wovendetails->UniqueFactory1);
	
	$explodewovenuniquefactory2details=explode(",",$wovendetails->UniqueFactory2);
	
	$explodewovenuniquefactory3details=explode(",",$wovendetails->UniqueFactory3);
	
	              
	
 
 
	
	
	 
	
	

	 
 }
 /*vidhya:09-04-2018*/
 if($printedlabeldetails->id!="")
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
 if($heatdetails->id!="")
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
?>
<table width="595" border="0">
  <tr>
    <td style="border-bottom:solid 2px #00aeef;"><img src="img/logo_image_new.png" alt="Unique Logo"></td>
    <td style="border-bottom:solid 2px #00aeef;"><table>
                        	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> NEW PRODUCT DEVELOPMENT</td> </tr>
                            
                            <tr> <td style="font-size:11px; font-family:Arial; color:#111111; margin:0;font-weight:bold; line-height:14px;"> Sample and Quote Request</td> </tr>
                            <tr> <td style="font-size:11px; font-family:Arial; color:#111111;  margin:0; line-height:14px;">Development No.<b>{{$productdetails->id}}</b>
                            </td> </tr>
                            <tr> <td style="font-size:11px; font-family:Arial; color:#111111; margin:0; line-height:14px;">Version:<b>{{$productdetails->Version}}</b></td> </tr>
                            
                            <tr> <td style="font-size:11px; font-family:Arial; color:#111111; margin:0; line-height:14px;"> 
                            {{$requestdate}} </td> </tr>
                    	</table></td>
  </tr>

  
  <tr style="float:left; width:100%; height:auto;">
    <td style="height:200px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT INFORMATION  </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Product Group and Sub Group: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productgroupdetails->ProductGroup}}/{{$productsubgroupdetails->ProductSubGroupName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Customer Name: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$customerdetails->CustomerName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Customer Warehouse: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$customerwarehousedetails->Warehouse_Name}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Brand: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->Brand}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Program Name: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->ProgramName}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Customer Product Name: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->CustomerProductName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Customer Product Code: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->CustomerProductCode}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Unique Product Code: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->UniqueProductCode}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Description: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->Description}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Style Number: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->StyleNumber}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Season: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$seasondetails->Season}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Product Status: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$statusdetails->StatusName}}</td>
                    <td style="width:5%;">
                </tr>            
            </table>                    
                    </td>       
                </tr>            
        </table></td>
        <?php
		if($productdetails->id!="")
		{
		?>
    <td><table style="width:25%; float:left;">
       	    <tr>
       	      <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> REFERENCE FILE </td>
   	        </tr>
       	    <tr>
       	      <td style="float:left; width:100%; height:auto;">
              <table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">  
                    <img src="{{$path}}/app/{{$productdetails->Artworkupload}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" /> </td>
                </tr>
     	      </table></td>
   	        </tr>
   	    	</table></td>
            <?php
			}
			if($hookid!="")
			{
			?>
            <td><table style="width:25%; float:left;">
       	    <tr>
       	      <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td>
   	        </tr>
       	    <tr>
       	      <td style="float:left; width:100%; height:auto;">
              <table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">  
                    <img src="{{$path}}/app/{{$hooksdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" /> </td>
                </tr>
     	      </table></td>
   	        </tr>
   	    	</table></td>
            <?php
			}
			 if($tissuepaperid!="")
			 {
			?>
            <td><table style="width:25%; float:left;">
       	    <tr>
       	      <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td>
   	        </tr>
       	    <tr>
       	      <td style="float:left; width:100%; height:auto;">
              <table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">  
                    <img src="{{$path}}/app/{{$tissuepaperdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" /> </td>
                </tr>
     	      </table></td>
   	        </tr>
   	    	</table></td>
            <?php
			 }
			 if($packagingstickersid!="")
			 {
			?>
            <td><table style="width:25%; float:left;">
       	    <tr>
       	      <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td>
   	        </tr>
       	    <tr>
       	      <td style="float:left; width:100%; height:auto;">
              <table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">  
                    <img src="{{$path}}/app/{{$packagingstickersdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" /> </td>
                </tr>
     	      </table></td>
   	        </tr>
   	    	</table></td>
            <?php
			 }
			  if($hangtagsdetails->id!="")
			 {
			?>
            <!--<td><table style="width:25%; float:left;">
       	    <tr>
       	      <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td>
   	        </tr>
       	    <tr>
       	      <td style="float:left; width:100%; height:auto;">
              <table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">  
                    <img src="{{$path}}/app/{{$hangtagsdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" /> </td>
                </tr>
     	      </table></td>
   	        </tr>
   	    	</table></td>-->
            <?php
			 }
			 
			  if($tapesid!="")
			 {
			?>
            <td><table style="width:25%; float:left;">
       	    <tr>
       	      <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td>
   	        </tr>
       	    <tr>
       	      <td style="float:left; width:100%; height:auto;">
              <table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">  
                    <img src="{{$path}}/app/{{$tapesdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" /> </td>
                </tr>
     	      </table></td>
   	        </tr>
   	    	</table></td>
            <?php
			 }
			?>
  </tr>
  
   <?php
  
   if($boxesdetails->id!="")
 {
  ?>
 
  <tr style="float:left; width:100%; height:auto;">
    <td style="height:500px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Raw Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxrawmaterialdetails->RawMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->QualityReference}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->Thickness}} @if($boxesdetails->measurement1!=""){{$boxesdetails->measurement1}}
                    @elseif($boxesdetails->measurement2!=""){{$boxesdetails->measurement2}}
                    @elseif($boxesdetails->measurement3!=""){{$boxesdetails->measurement3}}@endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Width: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->Width}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Height: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->Height}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->Length}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print Type: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$printtypedetails->PrintType}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> CMYK:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;"> No </td>
                    <td style="width:5%;"> </td>
                </tr>
                @if($boxesdetails->CMYK=='0')
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor1}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor2}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor3}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 4: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor4}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                @else
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 5: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor5}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 6: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor6}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 7: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor7}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 8: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor8}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                
                @endif
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Cutting: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$cuttingdetails->CuttingName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Printing Finishing Process: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">
                     <?php
	                foreach ($boxesexpprintingfinishingprocess as $explval)
	                  {
		$printingfinishingprocessdetails=App\PrintingFinishingProcess::where('id','=',$explval)->where('status','=',1)->first();  ?>
        {{$printingfinishingprocessdetails->PrintingFinishingProcessName}},
                   <?php
	                   }
				     ?>  
                    
                    </td>
                    <td style="width:5%;border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Unique Product Code: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$boxesdetails->UniqueProductCode}}</td>
                    <td style="width:5%;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion1details->ProductionRegions}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Unique Factory 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">                 <?php
					foreach($explodeboxuniquefactory1details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}}
                    
                    <?php
					echo "<br>";
					}
					?> </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                @if($boxesdetails->UniqueFactory2!="")
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion2details->ProductionRegions}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Unique Factory 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">               <?php
					foreach($explodeboxuniquefactory2details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}}
                    
                    <?php
					echo "<br>";
					}
					?>
                    
                     </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                @endif
                
                 @if($boxesdetails->UniqueFactory3!="")
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion3details->ProductionRegions}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Unique Factory 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">                  <?php
					foreach($explodeboxuniquefactory3details as $expuniquefactorydet)
					{
		            $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}}
                    <?php
					echo "<br>";
					}
					?></td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                 @endif
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Currency: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxcurrencydetails->Currency}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Sample Cost: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$boxesdetails->Sample_costing}}</td>
                    <td style="width:5%;"> </td>
                </tr>
            

            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td><table style="width: 150px; height: 150px; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">
                    <img src="{{$path}}/app/{{$boxesdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
  
  
  
  <?php
  
 }
  ?>
   <?php
   if($hookdetails->id!="")
 {
  ?>
  
  
  <!--<tr style="float:left; width:100%; height:10px;">
  	<td style="height:10px; background-color:#999;">
    	
    </td>
  </tr>-->
  
  
  
  
 
  <tr style="float:left; width:100%; height:150px;">
    <td style="height:150px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Hooks Material:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$hookrawmaterialdetails->HooksMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
               
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->QualityReference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Color: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->Color}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->Thickness}} @if($hooksdetails->measurement1!=""){{$hooksdetails->measurement1}}
                    @elseif($hooksdetails->measurement2!=""){{$hooksdetails->measurement2}}
                    @elseif($hooksdetails->measurement3!=""){{$hooksdetails->measurement3}}@endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Width: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->Width}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->Length}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Mold Costing Currency: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$moldcostingcurrencydetails->Currency}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Mold Costing: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->MoldCosting}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region1: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion1details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory1: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodehookuniquefactory1details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                @if($hooksdetails->UniqueFactory2!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region2: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion2details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;  border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory2: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodehookuniquefactory2details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @endif
                
                 @if($hooksdetails->UniqueFactory3!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region3: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion3details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodehookuniquefactory3details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%;">
                </tr>
                
                @endif
                
               


            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td><table style="width: 150px; height: 150px; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> REFERENCE FILE </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">
                    <img src="{{$path}}/app/{{$hooksdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
  
  
  
  <?php
  
 }
  ?>
   <?php
   if($tissuepaperdetails->id!="")
 {
  ?>
 
 
  <tr style="float:left; width:100%; height:500px;">
    <td style="height:700px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Raw Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$rawmaterialdetails->RawMaterial}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->QualityReference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->Thickness}} @if($tissuepaperdetails->measurement1!=""){{$tissuepaperdetails->measurement1}}
                    @elseif($tissuepaperdetails->measurement2!=""){{$tissuepaperdetails->measurement2}}
                    @elseif($tissuepaperdetails->measurement3!=""){{$tissuepaperdetails->measurement3}}@endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Width: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->Width}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->Length}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print Type: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$printtypedetails->PrintType}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Color:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;"> CMYK </td>
                    <td style="width:5%;">
                </tr>
                
                 @if($tissuepaperdetails->CMYK=='0')
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor1}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor2}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor3}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 4: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor4}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                @else
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 5: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor5}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 6: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor6}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 7: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor7}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 8: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor8}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                
                @endif
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Cutting: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$cuttingdetails->CuttingName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
       <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;border-bottom: solid 1px #515151;"> Printing Finishing Process: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;border-bottom: solid 1px #515151;">
                   <?php
	  foreach ($expprintingfinishingprocess as $explval)
	  {
		  
		$printingfinishingprocessdetails=App\PrintingFinishingProcess::where('id','=',$explval)->where('status','=',1)->first();  ?>
        {{$printingfinishingprocessdetails->PrintingFinishingProcessName}},
        
        <?php
		  
	  }
				 ?>  
				   
				  
                   
                     </td>
                    <td style="width:5%;border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Unique product Code: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->UniqueProductCode}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region1: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion1details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory1: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodetissuepaperuniquefactory1details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                @if($tissuepaperdetails->UniqueFactory2!="")
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region2: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion2details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;  border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory2: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodetissuepaperuniquefactory2details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @endif
                
                @if($tissuepaperdetails->UniqueFactory3!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region3: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion3details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodetissuepaperuniquefactory1details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    
                    
                  
                    
                    </td>
                    <td style="width:5%;">
                </tr>
              
                @endif
                
            

            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td><table style="width: 150px; height: 150px; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> REFERENCE FILE </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">  <img src="{{$path}}/app/{{$tissuepaperdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" /> </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
   
  
  <?php
  
 }
 
  ?>
   <?php
   if($packagingstickersdetails->id!="")
 {
  ?>
 
 
  <tr style="float:left; width:100%; height:auto;">
    <td style="height:400px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
              <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Type of Stickers: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$typeofstickersdetails->PackagingStickersTypes}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
            
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Raw Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$rawmaterialdetails->RawMaterial}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->QualityReference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->Thickness}} @if($packagingstickersdetails->measurement1!=""){{$packagingstickersdetails->measurement1}}
                    @elseif($packagingstickersdetails->measurement2!=""){{$packagingstickersdetails->measurement2}}
                    @elseif($packagingstickersdetails->measurement3!=""){{$packagingstickersdetails->measurement3}}@endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Width: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->Width}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->Length}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Adhesive: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->AdhesiveID}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print Type: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$printtypedetails->PrintType}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Color:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;"> CMYK </td>
                    <td style="width:5%;">
                </tr>
                
                @if($packagingstickersdetails->CMYK=='0')
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor1}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor2}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor3}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 4: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor4}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                @else
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 5: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor5}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 6: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor6}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 7: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetailsPrintColor7}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print color 8: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor8}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;"> </td>
                </tr>
                
                
                @endif
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Cutting: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$cuttingdetails->CuttingName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
       <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;border-bottom: solid 1px #515151;"> Printing Finishing Process: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;border-bottom: solid 1px #515151;">
                   <?php
	  foreach ($expprintingfinishingprocess as $explval)
	  {
		  
		$printingfinishingprocessdetails=App\PrintingFinishingProcess::where('id','=',$explval)->where('status','=',1)->first();  ?>
        {{$printingfinishingprocessdetails->PrintingFinishingProcessName}},
        
        <?php
		  
	  }
				 ?>  
				   
				  
                   
                     </td>
                    <td style="width:5%;border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Unique product Code: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->UniqueproductGroup}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
               
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region1: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion1details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory1: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($packagingstickersexplodeuniquefactory1details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @if($packagingstickersdetails->UniqueFactory2!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region2: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion2details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
              <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;  border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory2: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($packagingstickersexplodeuniquefactory2details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @endif
                
                 @if($packagingstickersdetails->UniqueFactory3!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region3: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion3details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($packagingstickersexplodeuniquefactory3details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%;">
                </tr>
                
                
                  @endif
            

            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td><table style="width: 150px; height: 150px; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> REFERENCE FILE </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;"> 
                     <img src="{{$path}}/app/{{$packagingstickersdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                     </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
   
  
  <?php
  
 }
 
  ?>
  <?php
  if($hangtagsdetails->id!="")
  {
 ?>
 <tr style="float:left; width:100%; height:auto;">
    <td style="height:430px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Raw Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagrawmaterialdetails->RawMaterial}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->QualityReference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->Thickness}} @if($hangtagsdetails->measurement1!=""){{$hangtagsdetails->measurement1}}
                    @elseif($hangtagsdetails->measurement2!=""){{$hangtagsdetails->measurement2}}
                    @elseif($hangtagsdetails->measurement3!=""){{$hangtagsdetails->measurement3}}@endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Width: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->Width}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->Length}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Ground Paper Color: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->GroundPaperColor}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print Type: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagprinttypedetails->PrintType}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Color:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;"> CMYK </td>
                    <td style="width:5%;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> </td>
                    @if($hangtagsdetails->CMYK==0)
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->PrintColor1}},{{$hangtagsdetails->PrintColor2}},{{$hangtagsdetails->PrintColor3}},{{$hangtagsdetails->PrintColor4}}</td>
                    @elseif($hangtagsdetails->CMYK==1)
                     <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->PrintColor5}},{{$hangtagsdetails->PrintColor6}},{{$hangtagsdetails->PrintColor7}},{{$hangtagsdetails->PrintColor8}}</td>
                    @endif
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Cutting: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagcuttingdetails->CuttingName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
       <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Printing Finishing Process: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">
                   <?php
	  foreach ($expprintingfinishingprocess as $explval)
	  {
		  
		$printingfinishingprocessdetails=App\PrintingFinishingProcess::where('id','=',$explval)->where('status','=',1)->first();  ?>
        {{$printingfinishingprocessdetails->PrintingFinishingProcessName}},
        
        <?php
		  
	  }
				 ?>  
				   
				  
                   
                     </td>
                    <td style="width:5%;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Drill hole size: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->Drillholesize}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Grommet Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$grommetmaterialdetails->MetalMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Grommet Colour: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$metalcolourdetails->MetalColour}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> String Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$stringmaterialdetails->StringMaterials}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> String Total Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->StringTotalLength}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">String Loop to Knot Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->StringLooptoKnotLength}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Seal: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$sealmaterialdetails->SealsMaterials}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Ball Chain: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($hangtagsdetails->BallChain==0){{"NO"}}@else {{"Yes"}} @endif"</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Ball Chain Colour: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$ballchaincolor->MetalColour}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Ball Chain Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->BallChainLength}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Ball Chain Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$ballchainmaterialdetails->MetalMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Pin: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->Pin}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Pin Style: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$pinstyle->PinStyle}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Pin Colour: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$pincolourdetails->MetalColour}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Pin Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->PinLength}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Pin Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$pinmaterialdetails->MetalMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
              
                
                
                

            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td><table style="width: 150px; height: 150px; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">
                    <img src="{{$path}}/app/{{$hangtagsdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
  
  
 
 <?php
  }
 ?>
 <?php
 if($zipperdetails->id!="")
 {
 ?>
 <tr style="float:left; width:100%; height:auto;">
    <td style="height:580px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$zipperdetails->QualityReference}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> String Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$zipperdetails->StringThickness}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">String Quality:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$zipperdetails->StringQuality}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> String Color 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$zipperdetails->StringColor1}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> String Color 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$zipperdetails->StringColor2}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Puller Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$pullermaterialdetails->TipMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Puller End Width Size: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$zipperdetails->PullerEndWidthSize}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Puller End Color: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$zipperdetails->PullerEndColor}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Puller End Logo process: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$zipperlogoprocessdetails->LogoProcess}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Mold Costing Currency: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$moldcostingcurrencydetails->Currency}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sample Costing:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$zipperdetails->SampleCosting}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Mold Costing:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$zipperdetails->MoldCosting}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                        
                        
                        
                          <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region1: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion1details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory1: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodezipperuniquefactory1details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @if($zipperdetails->UniqueFactory2!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region2: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion2details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;  border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory2: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodezipperuniquefactory2details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @endif
                
                 @if($zipperdetails->UniqueFactory3!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region3: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion3details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodezipperuniquefactory3details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%;">
                </tr>
                
                
                  @endif
                            
                
                
                
                
                
                
              
                
                
                

            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td><table style="width: 150px; height: 150px; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">
                    <img src="{{$path}}/app/{{$zipperdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
 
 <?php
 }
 ?>
   <?php
  if($tapesdetails->id!="")
  {
 ?>
 <tr style="float:left; width:100%; height:auto;">
    <td style="height:220px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Tapes Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$rawmaterialdetails->RawMaterial}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tapesdetails->QualityReference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Tape Colour: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tapesdetails->TapeColor}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> TapeWidth: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tapesdetails->TapeWidth}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> 	TotalLength: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tapesdetails->TotalLength}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Brocade: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tapesdetails->Brocade}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
     
                          <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region1: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion1details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory1: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodetapesuniquefactory1details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @if($tapesdetails->UniqueFactory2!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region2: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion2details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;  border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory2: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodetapesuniquefactory2details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @endif
                
                 @if($tapesdetails->UniqueFactory3!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region3: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion3details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodetapesuniquefactory1details as $expuniquefactorydet)
					{
		       $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%;">
                </tr>
                
                
                  @endif
                            
               

            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td><table style="width: 150px; height: 150px; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> REFERENCE FILE </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">
                    <img src="{{$path}}/app/{{$tapesdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
  
 
 <?php
  }
 ?>
 <?php
 if($wovendetails->id!="")
 ?>
 <tr style="float:left; width:100%; height:auto;">
    <td style="height:400px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Type of Label: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$typeoflabels->TypeofLabels}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Loom Type: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$loomtypedetails->LoomType}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tapesdetails->QualityReference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Loom Harness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$loomharnessdetails->LoomHarness}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Warp: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$warpdetails->Warp}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$qualtitydetails->Quality}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->QualityReference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Width: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->Width}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->Length}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Type of Fold: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$typeoffolddetails->Typeoffold}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sew Space: &nbsp;&nbsp;&nbsp; Right </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$explodesewspacedetails[0]}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sew Space: &nbsp;&nbsp;&nbsp; Left </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$explodesewspacedetails[1]}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sew Space: &nbsp;&nbsp;&nbsp; Top</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$explodesewspacedetails[3]}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sew Space: &nbsp;&nbsp;&nbsp; All Round</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$explodesewspacedetails[4]}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Finished Length:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->FinishedLength}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Ground Color:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->GroundColor}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Brocade Color 1 (Pantone) :</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->BrocadeColor1}},{{$wovendetails->BrocadeColor2}},{{$wovendetails->BrocadeColor3}},{{$wovendetails->BrocadeColor4}},
                    {{$wovendetails->BrocadeColor5}},{{$wovendetails->BrocadeColor6}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Finishing / Coating :<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$finishingcoatinglabels->FinishingCoatingLabels}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Currency :<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovencurrencydetails->Currency}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sample Costing:<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->Sample_costing}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Language Options:<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$languageoptions->LanguageName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">CountryOfOrigin:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->CountryofOriginID}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                   
                          <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region1: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion1details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory1: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodewovenuniquefactory1details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @if($tapesdetails->UniqueFactory2!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region2: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion2details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;  border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory2: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodewovenuniquefactory2details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @endif
                
                 @if($tapesdetails->UniqueFactory3!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region3: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion3details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodewovenuniquefactory3details as $expuniquefactorydet)
					{
		       $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%;">
                </tr>
                
                
                  @endif
                            
               

            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td><table style="width: 150px; height: 150px; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">
                    <img src="{{$path}}/app/{{$wovendetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
 <?php
 
 ?><!-- vidhya:09-04-2018 -->
  <?php
 if($printedlabeldetails->id!="")
 ?>
 <tr style="float:left; width:100%; height:auto;">
    <td style="height:400px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Type of Label: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$typeoflabels->TypeofLabels}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Substrate Quality: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$substrateval->SubstrateQualityName}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Substrate Reference </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$substraterefval->SubstrateReferenceName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Substrate Color: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$substratecolorval->SubstrateColorName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$printedlabeldetails->Qualityreference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Type of Fold </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$typesoffoldval->Typeoffold}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Finished Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$printedlabeldetails->FinishedLength}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Dura Print:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$printedlabeldetails->DuraPrint}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Print Type: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productprinttype->PrintType}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Width: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$printedlabeldetails->Width}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sew Space: &nbsp;&nbsp;&nbsp; Right </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$explodesewspacedetails[0]}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sew Space: &nbsp;&nbsp;&nbsp; Left </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$explodesewspacedetails[1]}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sew Space: &nbsp;&nbsp;&nbsp; Top</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$explodesewspacedetails[3]}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sew Space: &nbsp;&nbsp;&nbsp; All Round</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$explodesewspacedetails[4]}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Finished Length:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->FinishedLength}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Ground Color:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->GroundColor}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Ink Color 1 (Pantone) :</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$printedlabeldetails->InkColor1}},{{$printedlabeldetails->InkColor2}},{{$printedlabeldetails->InkColor3}},{{$printedlabeldetails->InkColor4}}
                  </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Finishing / Coating :<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$finishval->FinishingCoatingLabels}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Currency :<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovencurrencydetails->Currency}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sample Costing:<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->Sample_costing}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Language Options:<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$languageoptions->LanguageName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">CountryOfOrigin:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$wovendetails->CountryofOriginID}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                   
                          <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region1: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion1details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory1: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodewovenuniquefactory1details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @if($tapesdetails->UniqueFactory2!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region2: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion2details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;  border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory2: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodewovenuniquefactory2details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @endif
                
                 @if($tapesdetails->UniqueFactory3!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region3: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion3details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodewovenuniquefactory3details as $expuniquefactorydet)
					{
		       $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%;">
                </tr>
                
                
                  @endif
                            
               

            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td><table style="width: 150px; height: 150px; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">
                    <img src="{{$path}}/app/{{$printedlabeldetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
 <?php
 
 ?>

  <?php
 if($heatdetails->id!="")
 ?>
 <tr style="float:left; width:100%; height:auto;">
    <td style="height:400px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Type of Label: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$typeoflabels->TypeofLabels}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Types of Heat Transfer: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$typesofheat->TypeofHeatTransferName}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$heatdetails->Qualityreference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Heat Finish: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$heatfinish->HeatTransferFinish}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Width: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$heatdetails->Width}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Length </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$heatdetails->Length}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
               
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 1 (Pantone) :</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$heatdetails->PrintColor1}},{{$heatdetails->PrintColor2}},{{$heatdetails->PrintColor3}},{{$heatdetails->PrintColor4}}
                  </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Currency :<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$heatcurrencydetails->Currency}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sample Costing:<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$heatdetails->Sample_costing}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Language Options:<</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$languageoptions->LanguageName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">CountryOfOrigin:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$heatdetails->CountryofOriginID}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                   
                          <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region1: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion1details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory1: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodewovenuniquefactory1details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @if($tapesdetails->UniqueFactory2!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region2: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion2details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;  border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory2: </td>
                    <td style="font-size:11px; border-bottom: solid 1px #515151; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodewovenuniquefactory2details as $expuniquefactorydet)
					{
		$uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                @endif
                
                 @if($tapesdetails->UniqueFactory3!="")
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Production Region3: </td>
                    
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productionregion3details->ProductionRegions}}</td>
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Factory3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">
                    <?php
					foreach($explodewovenuniquefactory3details as $expuniquefactorydet)
					{
		       $uniquefactorydetails=App\UniqueOffices::where('id','=',$expuniquefactorydet)->where('status','=',1)->first();
					?>
                      {{$uniquefactorydetails->OfficeFactoryName}},
                    
                    <?php
					}
					?>
                    </td>
                    <td style="width:5%;">
                </tr>
                
                
                  @endif
                            
               

            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td><table style="width: 150px; height: 150px; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> ARTWORK </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0">
              	<tr>
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">
                    <img src="{{$path}}/app/{{$heatdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
 <?php
 
 ?>
  <tr style="float:left; width:100%; height:auto;">
    <td style="height:160px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> QUOTE AND COSTING INFORMATION</td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Pricing Method: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$pricingmethodetails->PricingMethod}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quantity: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$implodeexpqtydetails}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Unit of Measurement: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$unitofmeasurementdetails->UnitofMeasurement}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Costing Requirements: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($productdetails->ExWorks==1){{'ExWorks'}}@elseif($productdetails->FOB==2){{'FOB'}}@endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Sample Requested Date: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$SampleRequestedDate}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%;">
                	<td style="width:5%;border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;border-bottom: solid 1px #515151;"> Number of Samples Required: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;border-bottom: solid 1px #515151;">
                    {{$productdetails->NumberOfSamplesRequired}} </td>
                    <td style="width:5%;border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; height:50%; color:#F00;">
                	<td style="width:5%;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Remarks / Special Instructions: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;height:20px; color:#F00; font-weight:bold">{{$productdetails->RemarksInstructions}} </td>
                    <td style="width:5%;">
                </tr>
            
            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr style="float:left; width:100%; height:auto;">
    <td style="height:80px;border-top:solid 2px #00aeef;"><table>
                        	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:5px; line-height:10px;">  UNIQUE LABELS AND RIBBONS, INC. </td> </tr>
                            <tr> <td style="font-size:11px; font-family:Arial; color:#111111; margin:0; line-height:10px;"> 525 Denison Street, Unit 3A Markham, Ontario L3R 1B8 </td> </tr>
                            <tr> <td style="font-size:11px; font-family:Arial; color:#111111; margin:0; line-height:10px;"> www.theuniquegroup.com </td> </tr>
                    	</table></td>
    <td style="border-top:solid 2px #00aeef;">&nbsp;</td>
  </tr>
  
</table>
</body>
</html>
