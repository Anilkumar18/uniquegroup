@extends('users.layouts.developmentlist')
<?php
error_reporting(0);
?>
@section('content')

<style>
.labelbold
{
    font-weight:bold;
}
.imagestyles{
    
float: left;
    margin-top: 10px;
    
}
.imagealign
{
    text-align:center;  
}
    
</style>


<div class="row border-bottom white-bg notificationdiv">

                    <div class="col-lg-12">
                        <img class="dashboard-mainimg"  src="{{ asset("/img/test2.png")}} " />
                        
                    </div>
                    <div class="col-lg-12">
                   <br />
                    <ol class="breadcrumb">
                     
                      <li>View Development<strong></strong></li>
                      <li>Product details</li>
                     
                      
                    </ol>
                  </div>
               
                  <div class="col-lg-12">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>PRODUCT INFORMATION VIEW</strong></h2>
                  </div>
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

            </div>
            
             <?php

$BoxCurrencyID=$boxesdetails->CurrencyID;
                   
                   $boxcurrencydetails=App\Currency::where('id','=',$BoxCurrencyID)->first();

       $boxprintingfinishingprocess=$boxesdetails->PrintingFinishingProcessID;
        $boxprintingcheckbox=explode(",",$boxprintingfinishingprocess);

$printingfinishing = DB::table('printingfinishingprocess')->get();

//$printingfinishing=App\PrintingFinishingProcess::all();

             $rawmaterial=App\RawMaterial::where('id','=',$boxesdetails->RawMaterialID)->where('status','=',1)->first();
             
             $printtype=App\PrintType::where('id','=',$boxesdetails->PrintTypeID)->where('status','=',1)->first();
  
             $cutting=App\Cutting::where('id','=',$boxesdetails->CuttingID)->where('status','=',1)->first();

              $CustomerID=$productdetails->CustomerID;
              $customername=App\Customers::where('id','=',$CustomerID)->first();


              $ProductGroupID=$productdetails->ProductGroupID;
              $productgroupdetails=App\ProductGroup::where('id','=',$ProductGroupID)->first();
              $ProductSubGroupID=$productdetails->ProductSubGroupID;
              $productsubgroupdetails=App\ProductSubGroup::where('id','=',$ProductSubGroupID)->first();
              $SeasonID=$productdetails->SeasonID;
              $productseasondetails=App\Season::where('id','=',$SeasonID)->first();
               $ProductStatusID=$productdetails->ProductStatusID;
                $productstatusdetails=App\Status::where('id','=',$ProductStatusID)->first();
                
                $ProductProcessID=$productdetails->ProductProcessID;
                 $productprocessdetails=App\ProductProcess::where('id','=',$ProductProcessID)->first();
                 
                 $PricingMethodID=$productdetails->PricingMethod;
                 
                  $pricingmethoddetails=App\PricingMethod::where('id','=',$PricingMethodID)->first();
                  
                   $CurrencyID=$productdetails->CurrencyID;
                   
                   $currencydetails=App\Currency::where('id','=',$CurrencyID)->first();
                   
                    $UnitofMeasurementID=$productdetails->UnitofMeasurementID;
                    
                    $unitofmeasurementdetails=App\UnitofMeasurement::where('id','=',$UnitofMeasurementID)->first();
                    
                $InventoryID=$productdetails->InventoryID;
                 $inventorydetails=App\Inventory::where('id','=',$InventoryID)->first();
                 
                 /*production region1*/
                 
                $ProductionRegionID1=$productdetails->ProductionRegionID1;
                 
                 $productionregiondetails=App\ProductionRegions::where('id','=',$ProductionRegionID1)->first();
                 
                 $productionregionname=$productionregiondetails->ProductionRegions;
                 
                  /*production region2*/
                  
                  $ProductionRegionID2=$productdetails->ProductionRegionID2;
                 
                 $productionregiondetails2=App\ProductionRegions::where('id','=',$ProductionRegionID2)->first();
                 
                 $productionregionname2=$productionregiondetails2->ProductionRegions;
                 
                 
                  /*production region3*/
                  
                  $ProductionRegionID3=$productdetails->ProductionRegionID3;
                 
                 $productionregiondetails3=App\ProductionRegions::where('id','=',$ProductionRegionID3)->first();
                 
                 $productionregionname3=$productionregiondetails3->ProductionRegions;
                 
                 
                 
                 /*uniquefactory1*/
                  
                 //$UniqueFactory1="1,2,3";
                $UniqueFactory1=$productdetails->UniqueFactory1;
                 
                 $uniquefactoryexplodedetails=explode(",",$UniqueFactory1);
                 
                 foreach($uniquefactoryexplodedetails as $uniquefactorydet)
                 {
                    //echo  $uniquefactorydet;
                    $productionregiondetails=App\UniqueOffices::where('id','=',$uniquefactorydet)->first();
                    $uniquefactorydetails[]=$productionregiondetails->OfficeFactoryName;
                    //$uniquefactorydetails=array();
                    
                 }
                 //print_r($uniquefactorydetails);
                 $uniquefactory1=implode(",",$uniquefactorydetails);
                 
                 /*uniquefactory2*/
                 
                 $UniqueFactory2=$productdetails->UniqueFactory2;
                 
                 $uniquefactoryexplodedetails2=explode(",",$UniqueFactory2);
                 
                 foreach($uniquefactoryexplodedetails2 as $uniquefactorydet2)
                 {
                    //echo  $uniquefactorydet;
                    $productionregiondetails2=App\UniqueOffices::where('id','=',$uniquefactorydet2)->first();
                    $uniquefactorydetails2[]=$productionregiondetails2->OfficeFactoryName;
                    //$uniquefactorydetails=array();
                    
                 }
                 //print_r($uniquefactorydetails);
                 $uniquefactory2=implode(",",$uniquefactorydetails2);
                 
                  /*uniquefactory3*/
                 
                 $UniqueFactory3=$productdetails->UniqueFactory3;
                 
                 $uniquefactoryexplodedetails3=explode(",",$UniqueFactory3);
                 
                 foreach($uniquefactoryexplodedetails3 as $uniquefactorydet3)
                 {
                    //echo  $uniquefactorydet;
                    $productionregiondetails3=App\UniqueOffices::where('id','=',$uniquefactorydet3)->first();
                    $uniquefactorydetails3[]=$productionregiondetails3->OfficeFactoryName;
                    //$uniquefactorydetails=array();
                    
                 }
                 //print_r($uniquefactorydetails);
                 $uniquefactory3=implode(",",$uniquefactorydetails3);
                
                 
                
               
              ?>
          
        <div class="row wrapper wrapper-content animated fadeInRight">

  <div class="ibox float-e-margins">
  
  
  
      <div class="ibox-content">
      <a href="{{route('user.developmentlist')}}"><button class="button">Back</button></a>
        <div class="table-responsive"  style="overflow-x:hidden">
          <form name="thisForm" id="thisForm" method="post" action="#"> 
         {{ csrf_field() }}
         
         
         
          
            <div class="modal-body">
            <!--product info--> 
            <div class="col-sm-12 b-r">
         

         <table style="width:595px; float:left;">            
                <tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT INFORMATION </td> </tr>
                <tr>
                    <td style="float:left; width:100%; height:auto;"> 
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">            
                <tr style="width:100%;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Product Group and Sub Group: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$productgroupdetails->ProductGroup}} and {{$productsubgroupdetails->ProductSubGroupName}}  </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Customer Name: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$customers->CustomerName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Customer Warehouse: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$customername->Warehouse_Name}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Brand: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$productdetails->Brand}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Program Name: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$productdetails->ProgramName}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Customer Product Name: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$productdetails->CustomerProductName}} </td>
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
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->UniqueProductCode}} </td>
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
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$productdetails->StyleNumber}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Season: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> 
               
                   {{$productseasondetails->Season}}</label>
                  
                   </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Product Status: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$status->StatusName}}</td>
                    <td style="width:5%;">
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Product Process:*</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$productprocessdetails->ProductProcess}}</td>
                    <td style="width:5%;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Version </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$productdetails->Version}}</td>
                    <td style="width:5%;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Sample and Quote*</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">
                   @if($productdetails->SampleandQuote==1)
                   <label class="control-label font-noraml text-left label_font">{{"Sample and Quote"}}</label>
                   @elseif($productdetails->SampleandQuote==2)
                    <label class="control-label font-noraml text-left label_font">{{"Quote only"}}</label>
                   @endif
                  </td>
                    <td style="width:5%;">
                </tr>            
            </table> <div>         
<button class="button" onclick="location.href=''">Edit Product</button><div>

</div>
<br><br>      



                   <div class="col-lg-3">
                  <table style="width:595px; float:left;">            
                <tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PRODUCT DETAILS </td> </tr>

                @if($productdetails->BoxID!="" && $productdetails->BoxID<>0)
                        @endif

                        <?php 

$boxUniquefactorys = DB::table('uniqueoffices')->get();


$boxProductionRegionID1=$boxesdetails->ProductionRegionID1;
                 
                 $boxproductionregiondetails1=App\ProductionRegions::where('id','=',$boxProductionRegionID1)->first();

                 $boxProductionRegionID2=$boxesdetails->ProductionRegionID2;
                 
                 $boxproductionregiondetails2=App\ProductionRegions::where('id','=',$boxProductionRegionID2)->first();

                 $boxProductionRegionID3=$boxesdetails->ProductionRegionID3;
                 
                 $boxproductionregiondetails3=App\ProductionRegions::where('id','=',$boxProductionRegionID3)->first();


                     $boxUniqueFactory1=$boxesdetails->UniqueFactory1;
                 
                 $boxuniquefactoryexplodedetails1=explode(",",$boxUniqueFactory1);


                     $boxUniqueFactory2=$boxesdetails->UniqueFactory2;
                 
                 $boxuniquefactoryexplodedetails2=explode(",",$boxUniqueFactory2);


                     $boxUniqueFactory3=$boxesdetails->UniqueFactory3;
                 
                 $boxuniquefactoryexplodedetails3=explode(",",$boxUniqueFactory3);

                        ?>

                <tr>
                    <td style="float:left; width:100%; height:auto;"> 
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">            
                <tr style="width:100%;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Raw Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$rawmaterial->RawMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$boxesdetails->QualityReference}} @if($boxesdetails->QualityReferencem==1){{"As Per Sample"}} @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$boxesdetails->Thickness}} {{$boxesdetails->measurement1}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>   

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Width : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$boxesdetails->Width}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Height: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$boxesdetails->Height}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Length : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$boxesdetails->Length}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Type: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$printtype->PrintType}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> CMYK: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->CMYK}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
@if($boxesdetails->CMYK=='0')
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor1}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor2}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor3}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 4: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor4}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
               

@else

<tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 6: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor6}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 7: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor7}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 8: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor8}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 9: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$boxesdetails->PrintColor9}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                 


@endif

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Cutting: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$cutting->CuttingName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>   

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Printing Finishing Process: </td>

                       <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> 


                        @foreach ($printingfinishing as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$boxprintingcheckbox)){            
       
?>
{{$key->PrintingFinishingProcessName}} <br>
<?php } ?>
@endforeach
           
        </td>  
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  


                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$boxproductionregiondetails1->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>


                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 1:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">@foreach ($boxUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$boxuniquefactoryexplodedetails1)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach</td>
                    <td style="width:5%;">
                </tr> 


                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$boxproductionregiondetails2->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 2:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">

 @foreach ($boxUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$boxuniquefactoryexplodedetails2)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach


                 </td>
                    <td style="width:5%;">
                </tr> 
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$boxproductionregiondetails3->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 3:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">@foreach ($boxUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$boxuniquefactoryexplodedetails3)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach</td>
                    <td style="width:5%;">
                </tr> 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Currency:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$boxcurrencydetails->Currency}}</td>
                    <td style="width:5%;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Sample Cost:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$boxesdetails->Sample_costing}}</td>
                    <td style="width:5%;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Art Work:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;"><div class="col-lg-2 imagealign">
                @if($boxesdetails->Artwork)
      <img  src="{{ route('user.productpic', ['id' => $boxesdetails->id]) }}" alt="your image" width="80" height="80" />
                @endif
             </div></td>
                    <td style="width:5%;">
                </tr>            
            </table> <div>         
<button class="button" onclick="location.href=''">Edit Product</button>       
  
              
            </div><br><br>



            <!-- other product details  20-03-2018 -->

<!-- hook  start-->

 @if($productdetails->HookID!="" && $productdetails->HookID<>0)

                   <div class="col-lg-3">
                  <table style="width:595px; float:left;">            
                <tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> HOOK DETAILS </td> </tr>

               
                       

                        <?php 

$Hookproductstat=$hookdetails->Productstatus;
                   
                   $hooksstatusdetails=App\Status::where('id','=',$Hookproductstat)->first();

$HookCurrencyID=$hookdetails->Hook_Currency;
                   
                   $hookscurrencydetails=App\Currency::where('id','=',$HookCurrencyID)->first();


             $hooksmaterial=DB::table('hooksmaterial')->where('id','=',$hookdetails->HooksMaterialID)->where('status','=',1)->first();

           
          


$hookUniquefactorys = DB::table('uniqueoffices')->get();


$hookProductionRegionID1=$hookdetails->ProductionRegionID1;
                 
                 $hookproductionregiondetails1=App\ProductionRegions::where('id','=',$hookProductionRegionID1)->first();

                 $hookProductionRegionID2=$hookdetails->ProductionRegionID2;
                 
                 $hookproductionregiondetails2=App\ProductionRegions::where('id','=',$hookProductionRegionID2)->first();

                 $hookProductionRegionID3=$hookdetails->ProductionRegionID3;
                 
                 $hookproductionregiondetails3=App\ProductionRegions::where('id','=',$hookProductionRegionID3)->first();


                     $hookUniqueFactory1=$hookdetails->UniqueFactory1;
                 
                 $hookuniquefactoryexplodedetails1=explode(",",$hookUniqueFactory1);


                     $hookUniqueFactory2=$hookdetails->UniqueFactory2;
                 
                 $hookuniquefactoryexplodedetails2=explode(",",$hookUniqueFactory2);


                     $hookUniqueFactory3=$hookdetails->UniqueFactory3;
                 
                 $hookuniquefactoryexplodedetails3=explode(",",$hookUniqueFactory3);





                        ?>

                <tr>
                    <td style="float:left; width:100%; height:auto;"> 
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">            
                <tr style="width:100%;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Hooks Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hooksmaterial->HooksMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$hookdetails->QualityReference}} @if($hookdetails->QualityReferencem==1){{"As Per Sample"}} @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Color: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$hookdetails->Color}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$hookdetails->Thickness}} {{$hookdetails->measurement1}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>   

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Width : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$hookdetails->Width}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  
  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Length : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$hookdetails->Length}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Mold Costing: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hookdetails->MoldCosting}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Mold Costing Currency:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hookdetails->MoldCostingCurrency}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Unique Product Code: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$hookdetails->UniqueProductCode}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  


                

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$hookproductionregiondetails1->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>


                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 1:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">@foreach ($hookUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$hookuniquefactoryexplodedetails1)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach</td>
                    <td style="width:5%;">
                </tr> 


                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$hookproductionregiondetails2->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 2:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">

 @foreach ($hookUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$hookuniquefactoryexplodedetails2)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach


                 </td>
                    <td style="width:5%;">
                </tr> 
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$hookproductionregiondetails3->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 3:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">@foreach ($hookUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$hookuniquefactoryexplodedetails3)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach</td>
                    <td style="width:5%;">
                </tr> 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Product Status:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$hooksstatusdetails->StatusName}}</td>
                    <td style="width:5%;">
                </tr> 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Hook Currency</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$hookscurrencydetails->Currency}}</td>
                    <td style="width:5%;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Sample Costing:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$hookdetails->Hook_samplecost}}</td>
                    <td style="width:5%;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Art Work:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;"><div class="col-lg-2 imagealign">
                @if($hookdetails->Artwork)
            <img  src="{{ route('user.producthookpic', ['id' => $hookdetails->id]) }}" alt="your image" width="80" height="80" />
                @endif
             </div></td>
                    <td style="width:5%;">
                </tr>            
            </table> <div>         
<button class="button" onclick="location.href=''">Edit Product</button>       
  
              
            </div><br><br>

 @endif
<!-- hook end -->


<!-- tissue start -->
   @if($productdetails->TissuePaperID!="" && $productdetails->TissuePaperID<>0)
                      


                   <div class="col-lg-3">
                  <table style="width:595px; float:left;">            
                <tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> TISSUE PAPER </td> </tr>

             

                        <?php 


                           $tissuecutting=App\Cutting::where('id','=',$tissuepaperdetails->CuttingID)->where('status','=',1)->first();

$Tissueproductstat=$tissuepaperdetails->Productstatus;
                   
                   $tissuestatusdetails=App\Status::where('id','=',$Tissueproductstat)->first();

$TissueCurrencyID=$tissuepaperdetails->Tissue_CurrencyID;
                   
                   $tissuecurrencydetails=App\Currency::where('id','=',$TissueCurrencyID)->first();


             $tissuematerial=DB::table('rawmaterial')->where('id','=',$tissuepaperdetails->MaterialID)->where('status','=',1)->first();

           
           
             $tissueprinttype=App\PrintType::where('id','=',$tissuepaperdetails->PrintTypeID)->where('status','=',1)->first();


$tissueUniquefactorys = DB::table('uniqueoffices')->get();


$tissueProductionRegionID1=$tissuepaperdetails->ProductionRegionID1;
                 
                 $tissueproductionregiondetails1=App\ProductionRegions::where('id','=',$tissueProductionRegionID1)->first();

                 $tissueProductionRegionID2=$tissuepaperdetails->ProductionRegionID2;
                 
                 $tissueproductionregiondetails2=App\ProductionRegions::where('id','=',$tissueProductionRegionID2)->first();

                 $tissueProductionRegionID3=$tissuepaperdetails->ProductionRegionID3;
                 
                 $tissueproductionregiondetails3=App\ProductionRegions::where('id','=',$tissueProductionRegionID3)->first();


                     $tissueUniqueFactory1=$tissuepaperdetails->UniqueFactory1;
                 
                 $tissueuniquefactoryexplodedetails1=explode(",",$tissueUniqueFactory1);


                     $tissueUniqueFactory2=$tissuepaperdetails->UniqueFactory2;
                 
                 $tissueuniquefactoryexplodedetails2=explode(",",$tissueUniqueFactory2);


                     $tissueUniqueFactory3=$tissuepaperdetails->UniqueFactory3;
                 
                 $tissueuniquefactoryexplodedetails3=explode(",",$tissueUniqueFactory3);


       $tissueprintingfinishingprocess=$tissuepaperdetails->PrintingFinishingProcessID;
        $tissueprintingcheckbox=explode(",",$tissueprintingfinishingprocess);

$tissueprintingfinishing = DB::table('printingfinishingprocess')->get();



                        ?>

                <tr>
                    <td style="float:left; width:100%; height:auto;"> 
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">            
                <tr style="width:100%;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Raw Material : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$tissuematerial->RawMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$tissuepaperdetails->QualityReference}} @if($tissuepaperdetails->QualityReferencem==1){{"As Per Sample"}} @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$tissuepaperdetails->Thickness}} {{$tissuepaperdetails->measurement1}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>   

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Width : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$tissuepaperdetails->Width}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  

                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Length : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$tissuepaperdetails->Length}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Ground Paper Color : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->GroundPaperColor}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Type: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissueprinttype->PrintType}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> CMYK: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($tissuepaperdetails->CMYK=='0') No @elseif($tissuepaperdetails->CMYK=='1') Yes @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
@if($tissuepaperdetails->CMYK=='0')
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor1}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor2}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor3}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 4: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor4}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
               

@else

<tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 6: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor6}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 7: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor7}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 8: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor8}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 9: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuepaperdetails->PrintColor9}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                 


@endif

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Cutting: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$tissuecutting->CuttingName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>   

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Printing Finishing Process: </td>

                       <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> 


                        @foreach ($tissueprintingfinishing as $key)

                        
    <?php 


    if(in_array($key->id,$tissueprintingcheckbox)){            
       
?>
{{$key->PrintingFinishingProcessName}} <br>
<?php } ?>
@endforeach
           
        </td>  
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  

                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Product Code: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$tissuepaperdetails->UniqueProductCode}}</td>
                    <td style="width:5%;">
                </tr>


                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$tissueproductionregiondetails1->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>


                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 1:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">@foreach ($tissueUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$tissueuniquefactoryexplodedetails1)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach</td>
                    <td style="width:5%;">
                </tr> 


                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$tissueproductionregiondetails2->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 2:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">

 @foreach ($tissueUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$tissueuniquefactoryexplodedetails2)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach


                 </td>
                    <td style="width:5%;">
                </tr> 
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$tissueproductionregiondetails3->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 3:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">@foreach ($tissueUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$tissueuniquefactoryexplodedetails3)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach</td>
                    <td style="width:5%;">
                </tr> 

                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Product Status:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$tissuestatusdetails->StatusName}}</td>
                    <td style="width:5%;">
                </tr> 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">TissuePaper Currency:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$tissuecurrencydetails->Currency}}</td>
                    <td style="width:5%;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Sample Costing:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$tissuepaperdetails->Tissue_Samplecost}}</td>
                    <td style="width:5%;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Art Work:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;"><div class="col-lg-2 imagealign">
               @if($tissuepaperdetails->Artwork)
               <img  src="{{ route('user.productpictissue', ['id' => $tissuepaperdetails->id]) }}" alt="your image" width="80" height="80" />
              @endif
             </div></td>
                    <td style="width:5%;">
                </tr>            
            </table> <div>         
<button class="button" onclick="location.href=''">Edit Product</button>       
  
              
            </div><br><br>
@endif

<!--end tissue end 20-03-2018 -->

<!-- pakage start -->

    @if($productdetails->PackagingStickersID!="" && $productdetails->PackagingStickersID<>0)
                     

                   <div class="col-lg-3">
                  <table style="width:595px; float:left;">            
                <tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> PACKAGING STICKERS</td> </tr>

            

                        <?php 


          $packagecurrencydetails=App\Currency::where('id','=',$packagingstickersdetails->Pack_CurrencyID)->first();


 $packageadhesive=DB::table('typeofadhesive')->where('id','=',$packagingstickersdetails->AdhesiveID)->where('status','=',1)->first();

 $packagesticker=DB::table('packagingstickerstypes')->where('id','=',$packagingstickersdetails->TypeofStickerID)->where('status','=',1)->first();

                           $packagecutting=App\Cutting::where('id','=',$packagingstickersdetails->CuttingID)->where('status','=',1)->first();

$Packageproductstat=$packagingstickersdetails->Productstatus;
                   
                   $pack_statusdetails=App\Status::where('id','=',$Packageproductstat)->first();



             $packagematerial=DB::table('rawmaterial')->where('id','=',$packagingstickersdetails->MaterialID)->where('status','=',1)->first();

           
           
             $packageprinttype=App\PrintType::where('id','=',$packagingstickersdetails->PrintTypeID)->where('status','=',1)->first();


$packageUniquefactorys = DB::table('uniqueoffices')->get();


$packageProductionRegionID1=$packagingstickersdetails->ProductionRegionID1;
                 
                 $packageproductionregiondetails1=App\ProductionRegions::where('id','=',$packageProductionRegionID1)->first();

                 $packageProductionRegionID2=$packagingstickersdetails->ProductionRegionID2;
                 
                 $packageproductionregiondetails2=App\ProductionRegions::where('id','=',$packageProductionRegionID2)->first();

                 $packageProductionRegionID3=$packagingstickersdetails->ProductionRegionID3;
                 
                 $packageproductionregiondetails3=App\ProductionRegions::where('id','=',$packageProductionRegionID3)->first();


                     $packageUniqueFactory1=$packagingstickersdetails->UniqueFactory1;
                 
                 $packageuniquefactoryexplodedetails1=explode(",",$packageUniqueFactory1);


                     $packageUniqueFactory2=$packagingstickersdetails->UniqueFactory2;
                 
                 $packageuniquefactoryexplodedetails2=explode(",",$packageUniqueFactory2);


                     $packageUniqueFactory3=$packagingstickersdetails->UniqueFactory3;
                 
                 $packageuniquefactoryexplodedetails3=explode(",",$packageUniqueFactory3);


       $packageprintingfinishingprocess=$packagingstickersdetails->PrintingFinishingProcessID;
        $packageprintingcheckbox=explode(",",$packageprintingfinishingprocess);

$packageprintingfinishing = DB::table('printingfinishingprocess')->get();


                        ?>

                <tr>
                    <td style="float:left; width:100%; height:auto;"> 
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">            
                <tr style="width:100%;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Type of Sticker: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$packagesticker->PackagingStickersTypes}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Raw Material: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$packagematerial->RawMaterial}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Quality Reference: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$packagingstickersdetails->QualityReference}} @if($packagingstickersdetails->QualityReferencem==1){{"As Per Sample"}} @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> Thickness: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$packagingstickersdetails->Thickness}} {{$packagingstickersdetails->measurement1}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>   

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Width : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$packagingstickersdetails->Width}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  

                 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Length : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$packagingstickersdetails->Length}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Adhesive : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packageadhesive->TypeofAdhesive}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Shape : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->Shape}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Type: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packageprinttype->PrintType}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> CMYK: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($packagingstickersdetails->CMYK=='0') No @elseif($packagingstickersdetails->CMYK=='1') Yes @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
@if($packagingstickersdetails->CMYK=='0')
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor1}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor2}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor3}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 4: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor4}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
               

@else

<tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 6: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor6}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 7: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor7}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 8: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor8}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Print Color 9: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagingstickersdetails->PrintColor9}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 
                 


@endif

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Cutting: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$packagecutting->CuttingName}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>   

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Printing Finishing Process: </td>

                       <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> 


                        @foreach ($packageprintingfinishing as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$packageprintingcheckbox)){            
       
?>
{{$key->PrintingFinishingProcessName}} <br>
<?php } ?>
@endforeach
           
        </td>  
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>  


                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$packageproductionregiondetails1->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>


                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 1:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">@foreach ($packageUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$packageuniquefactoryexplodedetails1)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach</td>
                    <td style="width:5%;">
                </tr> 


                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$packageproductionregiondetails2->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 2:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">

 @foreach ($packageUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$packageuniquefactoryexplodedetails2)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach


                 </td>
                    <td style="width:5%;">
                </tr> 
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;"> Production Region 3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$packageproductionregiondetails3->ProductionRegions}}</td>
                    <td style="width:5%;">
                </tr>
                  <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Unique Factory 3:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">@foreach ($packageUniquefactorys as $key)

                        
    <?php 
  // print_r($key);

    if(in_array($key->id,$packageuniquefactoryexplodedetails3)){            
       
?>
{{$key->OfficeFactoryName}} <br>
<?php } ?>
@endforeach</td>
                    <td style="width:5%;">
                </tr> 

                   <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Product Status:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$pack_statusdetails->StatusName}}</td>
                    <td style="width:5%;">
                </tr>

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Packaging Stickers Currency:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$packagecurrencydetails->Currency}}</td>
                    <td style="width:5%;">
                </tr> 
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Sample Cost:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;">{{$packagingstickersdetails->Pack_Samplecost}}</td>
                    <td style="width:5%;">
                </tr>  

                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Art Work:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;"><div class="col-lg-2 imagealign">
               @if($packagingstickersdetails->Artwork)
               <img  src="{{ route('user.productpicpackage', ['id' => $packagingstickersdetails->id]) }}" alt="your image" width="80" height="80" />
              @endif
             </div></td>
                    <td style="width:5%;">
                </tr>            
            </table> <div>         
<button class="button" onclick="location.href=''">Edit Product</button>       
  
              
            </div><br><br>
   @endif
   <!-- end packaging stickers -->

<!-- end other product details -->

<!--Inventory info-->

                    <div class="col-sm-12 b-r">
         <?php  

         ?>

         <table style="width:595px; float:left;">            
                <tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> INVENTORY INFORMATION </td> </tr>
                <tr>
                    <td style="float:left; width:100%; height:auto;"> 
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">            
                <tr style="width:100%;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Inventory ID: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> 
                   @if($productdetails->InventoryID!="")
                   {{$inventorydetails->InventoryName}}</label>
                   @endif
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Projection:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> @if($productdetails->Projection!="")
                   {{$productdetails->Projection}}</label>
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">ProductionRegion1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">  @if($productdetails->ProductionRegionID1!="")
                   {{$productionregionname}}</label>
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">UniqueFactory1: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($productdetails->UniqueFactory1!="")
                   {{$uniquefactory1}}

               </label>
                   @endif </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">ProductionRegion2:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> @if($productdetails->ProductionRegionID2!="")
                   {{$productionregionname2}}</label>
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">UniqueFactory2: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> @if($productdetails->UniqueFactory2!="")
                   {{$uniquefactory2}}</label>
                   @endif </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;"> ProductionRegion3:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($productdetails->ProductionRegionID3!="")
                   {{$productionregionname3}}</label>
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">UniqueFactory3: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> @if($productdetails->UniqueFactory3!="")
                   <label class="control-label font-noraml text-left label_font">{{$uniquefactory3}}</label>
                   @endif </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Maximum pieces on stock:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> @if($productdetails->Maximumpiecesonstock!="")
                   {{$productdetails->Maximumpiecesonstock}}</label>
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Minimum pieces on stock:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($productdetails->Minimumpiecesonstock!="")
                  {{$productdetails->Minimumpiecesonstock}}</label>
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
      
    
                          
            </table> <div>         
<button class="button" onclick="location.href=''">Edit Product</button><div>


<br><br>  

<!-- Quote Costing --> 

                  <div class="col-sm-12 b-r">
         <?php 


       $quoterequiredchk=$productdetails->QuantityMOQ;
    $costseleteddetails=$productdetails->Cost;
    
    $expquoterequiredchk=explode("#",$quoterequiredchk);



     foreach($expquoterequiredchk as $expquote)
                 {
                    //echo  $uniquefactorydet;
                    $expquotedeails=App\Quote::where('id','=',$expquote)->first();
                    $quotecost[]=$expquotedeails->Quantity;
                    //$uniquefactorydetails=array();
                    
                 }
                 //print_r($uniquefactorydetails);
                 $quotecosting=implode(",",$quotecost);

    
    $costrequiredetails=explode("#",$costseleteddetails); 

         ?>

         <table style="width:595px; float:left;">            
                <tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;"> Quote Costing </td> </tr>
                <tr>
                    <td style="float:left; width:100%; height:auto;"> 
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;">            
                <tr style="width:100%;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Pricing Method: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> 
                    @if($productdetails->PricingMethod!="")
                   {{$pricingmethoddetails->PricingMethod}}</label>
                   @endif
                    </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Quantity:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">{{$quotecosting}} </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Unit of Measurement: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">   @if($productdetails->UnitofMeasurementID!="")
                  {{$unitofmeasurementdetails->UnitofMeasurement}}
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Currency: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($productdetails->CurrencyID!="")
                   {{$currencydetails->Currency}}
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Minimum Order Quantity:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> @if($productdetails->MinimumOrderQuantity!="")
                    {{$productdetails->MinimumOrderQuantity}}
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Minimum Order Value:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">  @if($productdetails->MinimumOrderValue!="")
                  {{$productdetails->MinimumOrderValue}}
                   @endif </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Pack Size:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($productdetails->PackSize!="")
                  {{$productdetails->PackSize}}
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Selling Price:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> @if($productdetails->SellingPrice!="")
                  {{$productdetails->SellingPrice}}
                   @endif </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">ExWorks:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> @if($productdetails->ExWorks==1)
                   ExWorks
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">FOB:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($productdetails->FOB==1)
                   FOB
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
      
    
                          
            </table> <div>         
<button class="button" onclick="location.href=''">Edit Product</button><div>


<br><br>   
       
                  
                </div>



                 <div class="col-sm-12 b-r">
         <?php  

         ?>

         <table style="width:595px; float:left;">            
                <tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;">Selling Price: </td> </tr>
                <tr>
                    <td style="float:left; width:100%; height:auto;"> 
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;"> 

                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Unit of Measurement: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">   @if($productdetails->UnitofMeasurementID!="")
                  {{$unitofmeasurementdetails->UnitofMeasurement}}
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 

                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Margin : </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> {{$productdetails->Margin}}</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>         
                              
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Quantity:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">
{{$quotecosting}}


                     </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>                
                               
                             
      
    
                          
            </table></table> <div>         
<button class="button" onclick="location.href=''">Edit Product</button><div>


<br><br>   
             

              <table style="width:595px; float:left;">            
                <tr> <td style="font-size:11px; font-family:Arial; color:#00aeef; font-weight:bold; margin:0; margin-top:10px; line-height:14px;">Sample Requirement : </td> </tr>
                <tr>
                    <td style="float:left; width:100%; height:auto;"> 
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; border:solid 1px #515151;"> 

                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sample Requested Date: </td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">  @if($productdetails->SampleRequestedDate!="")
                   {{$productdetails->SampleRequestedDate}}
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr> 

                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Number Of Samples Required:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($productdetails->NumberOfSamplesRequired!="")
                   {{$productdetails->NumberOfSamplesRequired}}
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>         
                              
                <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Sample Lead Time:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($productdetails->SampleLeadTime!="")
              {{$productdetails->SampleLeadTime}}
                   @endif </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>   

                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Production Lead Time:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;"> @if($productdetails->ProductionLeadTime!="")
                   {{$productdetails->ProductionLeadTime}}
                   @endif</td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>   

                 <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%; border-bottom: solid 1px #515151;">Remarks / Special Instructions:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%; border-bottom: solid 1px #515151;">@if($productdetails->RemarksInstructions!="")
                   {{$productdetails->RemarksInstructions}}
                   @endif </td>
                    <td style="width:5%; border-bottom: solid 1px #515151;">
                </tr>   

             <tr style="width:100%; border-bottom: solid 1px #515151;">
                    <td style="width:5%;">
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:50%;">Reference File Upload:</td>
                    <td style="font-size:11px; font-family:Arial; color:#111; line-height:14px; width:40%;"><div class="col-lg-2 imagealign">
              @if($productdetails->Artworkupload)
               <img  src="{{ route('user.productimagepic', ['id' => $productdetails->id]) }}" alt="your image" width="80" height="80" />
              @endif
             </div></td>
                    <td style="width:5%;">
                </tr>             
                               
                             
      
    
                          
            </table></table> <div>         
<button class="button" onclick="location.href=''">Edit Product</button><div>


<br><br>   
 
              
            </div>
            
     
    <div class="form-group">
                
                 <div class="col-lg-3">
            
         
                </div>
                 <div class="col-lg-5 submitbtndiv">
      
                 </div>
                </div>
                
                   </form>
                   
                      </div>
      
      </div>

    </div>
</div>
       


 

                                
                           










@endsection 