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
 $productdetails=App\ProductDetails::where('id','=',$id)->where('status','=',1)->first();
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
  
 
 if($boxid!="")
 {
	$boxesdetails=App\Boxes::where('ProductID','=',$id)->where('status','=',1)->first();
	
	$rawmaterialdetails=App\RawMaterial::where('id','=',$boxesdetails->RawMaterialID)->where('status','=',1)->first();
	
	$printtypedetails=App\PrintType::where('id','=',$boxesdetails->PrintTypeID)->where('status','=',1)->first();
	
	$cuttingdetails=App\Cutting::where('id','=',$boxesdetails->CuttingID)->where('status','=',1)->first();
	
	//$printingfinishingprocessdetails=App\PrintingFinishingProcess::where('id','=',$boxesdetails->PrintingFinishingProcessID)->where('status','=',1)->first();
	
	$expprintingfinishingprocess=explode(",",$boxesdetails->PrintingFinishingProcessID);
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$boxesdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$boxesdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$boxesdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	//$uniquefactorydetails=App\UniqueOffices::where('id','=',$boxesdetails->UniqueFactory1)->where('status','=',1)->first();
	
	$explodeuniquefactory1details=explode(",",$boxesdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$boxesdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$boxesdetails->UniqueFactory3);
	
	
	
	
		
 }
 if($hookid!="")
 {
	$hooksdetails=App\Hook::where('ProductID','=',$id)->where('status','=',1)->first();
	
	$rawmaterialdetails=App\HooksMaterial::where('id','=',$hooksdetails->HooksMaterialID)->where('status','=',1)->first();
	
	$moldcostingcurrencydetails=App\Currency::where('id','=',$hooksdetails->MoldCostingCurrency)->where('status','=',1)->first();
	
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$hooksdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$hooksdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$hooksdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeuniquefactory1details=explode(",",$hooksdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$hooksdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$hooksdetails->UniqueFactory3);
	
	
	
	
		
 }
 if($tissuepaperid!="")
 {
	 $tissuepaperdetails=App\Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
	 
	$rawmaterialdetails=App\RawMaterial::where('id','=',$tissuepaperdetails->MaterialID)->where('status','=',1)->first();
	
	$printtypedetails=App\PrintType::where('id','=',$tissuepaperdetails->PrintTypeID)->where('status','=',1)->first();
	
	
	$cuttingdetails=App\Cutting::where('id','=',$tissuepaperdetails->CuttingID)->where('status','=',1)->first();
	
	$expprintingfinishingprocess=explode(",",$tissuepaperdetails->PrintingFinishingProcessID);
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$tissuepaperdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$tissuepaperdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$tissuepaperdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeuniquefactory1details=explode(",",$tissuepaperdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$tissuepaperdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$tissuepaperdetails->UniqueFactory3);
	 
	 
	 
	 
	 
 }
 if($packagingstickersid!="")
 {
	$packagingstickersdetails=App\PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
	
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
	
	
	
	$explodeuniquefactory1details=explode(",",$packagingstickersdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$packagingstickersdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$packagingstickersdetails->UniqueFactory3);
	 
 }
 if($hangtagsid!="")
 {
	 
	 $hangtagsdetails=App\HangTags::where('ProductID','=',$id)->where('status','=',1)->first();
	 $rawmaterialdetails=App\RawMaterial::where('id','=',$hangtagsdetails->MaterialID)->where('status','=',1)->first();
	 
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
	
	
	$grommetmaterialdetails=App\MetalMaterial::where('id','=',$hangtagsdetails->GrommetMaterialID)->where('status','=',1)->first();
	 
	 
 }
if($tapesid!="")
 {
	 
	 $tapesdetails=App\Tapes::where('ProductID','=',$id)->where('status','=',1)->first();
	 $rawmaterialdetails=App\RawMaterial::where('id','=',$tapesdetails->TapesMaterialID)->where('status','=',1)->first();
	 
	 $printtypedetails=App\PrintType::where('id','=',$tapesdetails->PrintTypeID)->where('status','=',1)->first();
	 $cuttingdetails=App\Cutting::where('id','=',$tapesdetails->CuttingID)->where('status','=',1)->first();
	 
	 $expprintingfinishingprocess=explode(",",$tapesdetails->PrintingFinishingProcessID);
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$tapesdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$tapesdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$tapesdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeuniquefactory1details=explode(",",$tapesdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$tapesdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$tapesdetails->UniqueFactory3);
	
	
	 
	 
 }
?>
<table width="595" border="0">
  <tr>
    <td style="border-bottom:solid 2px #00aeef;"><img src="img/logo_image_new.png" alt="Unique Logo"></td>
    <td style="border-bottom:solid 2px #00aeef;"><table>
                        	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> NEW PRODUCT DEVELOPMENT</td> </tr>
                            
                            <tr> <td style="font-size:11px; font-family:Arial; color:#111111; margin:0;font-weight:bold; line-height:14px;"> Sample and Quote Request</td> </tr>
                            <tr> <td style="font-size:11px; font-family:Arial; color:#111111;  margin:0; line-height:14px;">Development No.<b>{{$productdetails->Version}}</b>
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
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$productgroupdetails->ProductGroup}}/{{$productsubgroupdetails->ProductSubGroupName}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Customer Name: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$customerdetails->CustomerName}} </td>
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
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->Brand}} </td>
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
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->CustomerProductName}} </td>
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
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->Description}} </td>
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
		if($boxid!="")
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
                    <img src="{{$path}}/app/{{$boxesdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" /> </td>
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
			  if($hangtagsid!="")
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
                    <img src="{{$path}}/app/{{$hangtagsdetails->Artwork}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" /> </td>
                </tr>
     	      </table></td>
   	        </tr>
   	    	</table></td>
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
  
   if($boxid!="")
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
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Raw Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$rawmaterialdetails->RawMaterial}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->QualityReference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->Thickness}} @if($boxesdetails->measurement1!=""){{$boxesdetails->measurement1}}
                    @elseif($boxesdetails->measurement2!=""){{$boxesdetails->measurement2}}
                    @elseif($boxesdetails->measurement3!=""){{$boxesdetails->measurement3}}@endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Width: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->Width}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Height: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->Height}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->Length}}</td>
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
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> </td>
                    @if($boxesdetails->CMYK==0)
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor1}},{{$boxesdetails->PrintColor2}},{{$boxesdetails->PrintColor3}},{{$boxesdetails->PrintColor4}}</td>
                    @elseif($boxesdetails->CMYK==1)
                     <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor5}},{{$boxesdetails->PrintColor6}},{{$boxesdetails->PrintColor7}},{{$boxesdetails->PrintColor8}}</td>
                    @endif
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Cutting: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$cuttingdetails->CuttingName}}</td>
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
                    <img src="{{$path}}/app/{{$productdetails->Artworkupload}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
  
  
 <tr style="float:left; width:100%; height:auto;">
    <td style="height:160px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
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
					foreach($explodeuniquefactory1details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory2details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory3details as $expuniquefactorydet)
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
            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td>&nbsp;</td>
  </tr> 
  <?php
  
 }
  ?>
   <?php
   if($hookid!="")
 {
  ?>
 
  <tr style="float:left; width:100%; height:auto;">
    <td style="height:150px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
            	<tr style="width:100%;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Hooks Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$rawmaterialdetails->HooksMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->QualityReference}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Color: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->Color}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->Thickness}} @if($hooksdetails->measurement1!=""){{$hooksdetails->measurement1}}
                    @elseif($hooksdetails->measurement2!=""){{$hooksdetails->measurement2}}
                    @elseif($hooksdetails->measurement3!=""){{$hooksdetails->measurement3}}@endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Width: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->Width}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
                
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Length: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->Length}}</td>
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
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Mold Costing: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksdetails->MoldCosting}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
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
                     <img src="{{$path}}/app/{{$productdetails->Artworkupload}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
  
  
 <tr style="float:left; width:100%; height:auto;">
    <td style="height:190px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
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
					foreach($explodeuniquefactory1details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory2details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory3details as $expuniquefactorydet)
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
            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td>&nbsp;</td>
  </tr> 
  <?php
  
 }
  ?>
   <?php
   if($tissuepaperid!="")
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
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> </td>
                    @if($tissuepaperdetails->CMYK==0)
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor1}},{{$tissuepaperdetails->PrintColor2}},{{$tissuepaperdetails->PrintColor3}},{{$tissuepaperdetails->PrintColor4}}</td>
                    @elseif($tissuepaperdetails->CMYK==1)
                     <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor5}},{{$tissuepaperdetails->PrintColor6}},{{$tissuepaperdetails->PrintColor7}},{{$tissuepaperdetails->PrintColor8}}</td>
                    @endif
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
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
                	<td style="width: 150px; height: 150px; border:solid 1px #515151;">  <img src="{{$path}}/app/{{$productdetails->Artworkupload}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" /> </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
  
  
 <tr style="float:left; width:100%; height:auto;">
    <td style="height:160px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
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
					foreach($explodeuniquefactory1details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory2details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory3details as $expuniquefactorydet)
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
            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td>&nbsp;</td>
  </tr> 
  
  <?php
  
 }
 
  ?>
   <?php
   if($packagingstickersid!="")
 {
  ?>
 
 
  <tr style="float:left; width:100%; height:auto;">
    <td style="height:250px;"><table style="width:100%; float:left;">            
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
                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                	<td style="width:5%; border-bottom: solid 1px #515151;">
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> </td>
                    @if($packagingstickersdetails->CMYK==0)
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor1}},{{$packagingstickersdetails->PrintColor2}},{{$packagingstickersdetails->PrintColor3}},{{$packagingstickersdetails->PrintColor4}}</td>
                    @elseif($packagingstickersdetails->CMYK==1)
                     <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor5}},{{$packagingstickersdetails->PrintColor6}},{{$packagingstickersdetails->PrintColor7}},{{$packagingstickersdetails->PrintColor8}}</td>
                    @endif
                    
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                
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
                     <img src="{{$path}}/app/{{$productdetails->Artworkupload}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                     </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
  
  
 <tr style="float:left; width:100%; height:auto;">
    <td style="height:160px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
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
					foreach($explodeuniquefactory1details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory2details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory3details as $expuniquefactorydet)
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
            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td>&nbsp;</td>
  </tr> 
  
  <?php
  
 }
 
  ?>
  <?php
  if($hangtagsid!="")
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
                	<td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Raw Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$rawmaterialdetails->RawMaterial}} </td>
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
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hangtagsdetails->PrintType}}</td>
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
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$cuttingdetails->CuttingName}}</td>
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
                    <img src="{{$path}}/app/{{$productdetails->Artworkupload}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
  
  <tr style="float:left; width:100%; height:auto;">
    <td style="height:160px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
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
					foreach($explodeuniquefactory1details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory2details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory3details as $expuniquefactorydet)
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
            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td>&nbsp;</td>
  </tr>
 
 <?php
  }
 ?>
   <?php
  if($tapesid!="")
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
                    <img src="{{$path}}/app/{{$productdetails->Artworkupload}}" alt="your image" width="100px" height="100px" style="text-align:center; margin-left:25px; margin-top:20px;" />
                      </td>
                </tr>
     	      </table>                   
                    </td>       
                </tr>            
            </table></td>
  </tr>
  
  <tr style="float:left; width:100%; height:auto;">
    <td style="height:160px;"><table style="width:100%; float:left;">            
            	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>
                <tr>
                	<td style="float:left; width:100%; height:auto;"> 
                    	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">
            
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
					foreach($explodeuniquefactory1details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory2details as $expuniquefactorydet)
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
					foreach($explodeuniquefactory3details as $expuniquefactorydet)
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
            </table>
                    
                    </td>       
                </tr>            
            </table></td>
    <td>&nbsp;</td>
  </tr>
 
 <?php
  }
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
    <td style="height:80px; border-top:solid 2px #00aeef;"><table>
                        	<tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:5px; line-height:10px;">  UNIQUE LABELS AND RIBBONS, INC. </td> </tr>
                            <tr> <td style="font-size:11px; font-family:Arial; color:#111111; margin:0; line-height:10px;"> 525 Denison Street, Unit 3A Markham, Ontario L3R 1B8 </td> </tr>
                            <tr> <td style="font-size:11px; font-family:Arial; color:#111111; margin:0; line-height:10px;"> www.theuniquegroup.com </td> </tr>
                    	</table></td>
    <td style="border-top:solid 2px #00aeef;">&nbsp;</td>
  </tr>
  
</table>
</body>
</html>
