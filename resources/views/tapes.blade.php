<?php
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
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
$packagingstickersdetails=App\PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
	
	
	  
	$rawmaterialdetails=App\RawMaterial::where('id','=',$tapesdetails->TapesMaterialID)->where('status','=',1)->first();
	
	
	
	
	  
	  
	
	
	$path=storage_path();
	
	$productionregion1details=App\ProductionRegions::where('id','=',$tapesdetails->ProductionRegionID1)->where('status','=',1)->first();
	$productionregion2details=App\ProductionRegions::where('id','=',$tapesdetails->ProductionRegionID2)->where('status','=',1)->first();
	$productionregion3details=App\ProductionRegions::where('id','=',$tapesdetails->ProductionRegionID3)->where('status','=',1)->first();
	
	
	
	$explodeuniquefactory1details=explode(",",$tapesdetails->UniqueFactory1);
	
	$explodeuniquefactory2details=explode(",",$tapesdetails->UniqueFactory2);
	
	$explodeuniquefactory3details=explode(",",$tapesdetails->UniqueFactory3);
?>

    <table align="center" width="800px" cellpadding="0" cellspacing="0" bgcolor="#fff"  style="">
<tr>
<td>
                                  
	<table border="0">
	<thead align="center" width="800px" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" >
    	<tr width="800px" cellpadding="0" cellspacing="0">
        	<td style="width:800px;  border-bottom:2px solid #00ABE8; " > <img src="http://theuniquegroup.com/orders/logo_image_new.png" alt="UniqueGroup.com" style="width:250px; height:auto;"> </td>
        </tr>
    </thead>
    </table>

	                               
	<table border="0" align="center" width="700px">
	<thead align="center" width="700px" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" >
	<tr width="700px" cellpadding="0" cellspacing="0">
            <td width="700px" style="font-family:Arial; font-size:11px;text-align:left; ">Hello Customer Service,</td>
        </tr>
    </thead>
    </table>
			<table border="0" align="center" width="700px">
	<thead align="center" width="700px" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" >
	<tr width="700px" cellpadding="0" cellspacing="0">
            <td width="700px" style="font-family:Arial; font-size:11px;text-align:left;">The Unique Group New Product Development:  <span style="font-weight:bold;">Sample and Quote Request </span></td>
        </tr>
		 </thead>
    </table>
			<table border="0" align="center" width="700px">
	<thead align="center" width="700px" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" >
		<tr width="700px" cellpadding="0" cellspacing="0">
            <td width="700px" style="font-family:Arial; font-size:11px;text-align:left;">Sample Requested Date: <span style="font-weight:bold;">{{$requestdate}}</span> </td>
        </tr>
			 </thead>
    </table>
				<table border="0"align="center" width="700px">
	        <thead align="center" width="700px" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" >
		  	<tr width="700px" cellpadding="0" cellspacing="0">	
			<td width="700px" style="font-family:Arial; font-size:11px;text-align:left;">Please see the information below and review the files attached.
	        </td>
			</tr>
				 </thead>
    </table>
					<table border="0"align="center" width="700px">
	<thead align="center" width="700px" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" >
		  	<tr width="700px" cellpadding="0" cellspacing="0">	
	 <td width="700px" style="font-family:Arial; font-size:11px;text-align:left; ">To add the cost information please enter to our on line system <a href="<?php echo url('/'); ?>/viewdevelopmentitemlist/<?php echo $productdetails->id; ?>/5/<?php echo $productdetails->TapesID; ?>" style="color:#000; font-weight:bold;"> here.</a>    </td>
	 	</tr>
				 </thead>
    </table>
    	<table border="0"align="center" width="700px">
	<thead  width="700px" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" >
    	<tr width="700px" cellpadding="0" cellspacing="0" style="height:30px;">
        	<td style="font-family:Arial; font-size:11px;width:700px; color:#00ABE8; ">PRODUCT INFORMATION</td>
        </tr>
    </thead>
    </table>
    <table align="center" width="700px" cellpadding="4" cellspacing="0" border="0" style="border:1px solid #000; margin:auto;">
    <tbody align="center" width="700px"  bgcolor="#fff" >
        <tr width="700px" style="height:30px;" border="0">
		    
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left;  border-bottom:1px solid #000; "> Product Group and Sub Group: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000; ">{{$productgroupdetails->ProductGroup}}/{{$productsubgroupdetails->ProductSubGroupName}}</td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000; "> Customer Name: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000; ">{{$customerdetails->CustomerName}}</td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000; ">Customer Warehouse: </td>
        <td width="350px" style="font-family:Arial; font-size:11px;text-align:left;  border-bottom:1px solid #000;">{{$customerwarehousedetails->Warehouse_Name}}</td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Brand: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$productdetails->Brand}}</td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Program Name: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$productdetails->ProgramName}} </td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Customer Product Name: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$productdetails->CustomerProductName}}</td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Customer Product Code: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000; ">{{$productdetails->CustomerProductCode}}</td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Unique Product Code:</td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000; ">
            {{$productdetails->UniqueProductCode}}
            </td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">Description: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000; ">
            {{$productdetails->Description}}
            </td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Style Number: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">
            {{$productdetails->StyleNumber}}
             </td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Season: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000; ">
            {{$seasondetails->Season}}
            </td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left;">Product Status:</td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left;">{{$statusdetails->StatusName}}</td>
        </tr>    
    </tbody>
    </table>
	 	<table border="0" align="center" width="700px">
	<thead  width="700px" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" >
    	<tr width="700px" cellpadding="0" cellspacing="0" style="height:30px;">
        	<td style="font-family:Arial; font-size:11px;width:700px; color:#00ABE8;">PRODUCT DETAILS </td>
        </tr>
    </thead>
    </table>
     <table align="center" width="700px" cellpadding="4" cellspacing="0" border="0" style="border:1px solid #000;">
    <tbody align="center" width="700px"  bgcolor="#fff">
    
        <tr width="700px" style="height:30px;" >
		    
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">Tapes Material: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">
          {{ $rawmaterialdetails->RawMaterial }}
            </td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Quality Reference: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$tapesdetails->QualityReference}}</td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">Tapes Colour: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$tapesdetails->TapeColor}}</td>
        </tr>
        
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">Tapes Width: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$tapesdetails->TapeWidth}}</td>
        </tr>
        
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Total Length: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$tapesdetails->TotalLength}}</td>
        </tr>
         
         <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Brocade: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$tapesdetails->Brocade}}</td>
        </tr>
         
           
    </tbody>
    </table>
		<table border="0"align="center" width="700px">
	<thead  width="700px" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" >
    	<tr width="700px" cellpadding="0" cellspacing="0" style="height:30px;">
        	<td style="font-family:Arial; font-size:11px;width:700px; color:#00ABE8;">QUOTE AND COSTING INFORMATION </td>
        </tr>
    </thead>
    </table>
	     <table align="center" width="700px" cellpadding="4" cellspacing="0" border="0" style="border:1px solid #000;">
    <tbody align="center" width="700px"  bgcolor="#fff" >
        <tr width="700px" style="height:30px;">
		    
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Pricing Method: </td>
    <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$pricingmethodetails->PricingMethod}}</td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Quantity: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">
            {{$implodeexpqtydetails}}
            </td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">Unit of Measurement: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">
            {{$unitofmeasurementdetails->UnitofMeasurement}}
            </td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">Costing Requirements: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">@if($productdetails->ExWorks==1){{'ExWorks'}}@elseif($productdetails->FOB==2){{'FOB'}}@endif</td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Sample Requested Date: </td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$SampleRequestedDate}}</td>
        </tr>
        
        <tr width="700px" style="height: 30px;">
        	<td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;"> Number of Samples Required:</td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$productdetails->NumberOfSamplesRequired}}</td>
            </tr>
            
             <tr width="700px" style="height: 30px;">
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">Remarks / Special Instructions:</td>
            <td width="350px" style="font-family:Arial; font-size:11px;text-align:left; border-bottom:1px solid #000;">{{$productdetails->RemarksInstructions}}</td>
        </tr>
    </tbody>
    </table>
   	<table border="0" align="center" width="700px">
	<thead  width="700px" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" >
    	<tr width="700px" cellpadding="0" cellspacing="0" style="height:40px;">
        	<td style="width:700px; " style="height:1.8;">Thank you and regards, 	<br><span  style="font-weight:bold;">The Unique Group</span>
            </td>	
        </tr>
			<tr width="700px" cellpadding="0" cellspacing="0" style="height:40px;">
		<td style="width:700px;  font-weight:bold"><a href="#" style="color:#00ABE8">www.theuniquegroup.com</a> </td>
		 </tr>
		<tr width="700px" cellpadding="0" cellspacing="0" style="height:20px;">
		<td style="width:700px;  font-weight:bold"> Note: This is a system generated e-mail; please do not reply it. </td>
		 </tr>
    </thead>
    </table>

</td>
</tr>
</table>
</body>
</html>
