@extends('users.layouts.addproductgroups')
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
                     
                      <li>New Development<strong></strong></li>
                      <li>Product details</li>
                     
                      
                    </ol>
                  </div>
               
                  <div class="col-lg-12">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>PRODUCT INFORMATION-REVIEW SAMPLE REQUEST</strong></h2>
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
      
        <div class="table-responsive"  style="overflow-x:hidden">
        <?php
		$typeid=$typeiddetails;
		
		?>
        <form name="forgetpassword" id="forgetpassword" method="post" action="{{ url(route('user.sendseperateproducts',['id'=>$productdetails->id,'typeid'=>$typeid])) }}"  class="form-horizontal" enctype="multipart/form-data"> 
        
        
         {{ csrf_field() }}
         
         
         
          
            <div class="modal-body">
            <!--product info-->
            <div class="col-sm-12 b-r">
         
                   <div class="col-lg-3">
                   <label class="control-label font-noraml text-left label_font">Product Info</label>
                   </div>
                   
                   
                  <div class="col-lg-5">
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Customer Name:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->CustomerID!="")
                   <label class="control-label font-noraml text-left label_font">{{$customername->CustomerName}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Brand:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->Brand!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->Brand}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">ProgramName:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->ProgramName!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->ProgramName}}</label>
                   @endif
                   </div>
                   
                  </div>
                 
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">ProductGroup:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->ProductGroupID!="")
                   <label class="control-label font-noraml text-left label_font">{{$productgroupdetails->ProductGroup}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">ProductSubGroup:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->ProductSubGroupID!="")
                   <label class="control-label font-noraml text-left label_font">{{$productsubgroupdetails->ProductSubGroupName}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Product Name:</label>
                   </div>
                    <div class="col-lg-6">
                    @if($productdetails->CustomerProductName!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->CustomerProductName}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Product Code:</label>
                   </div>
                    <div class="col-lg-6">
                    @if($productdetails->CustomerProductCode!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->CustomerProductCode}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Unique Product Code:</label>
                   </div>
                    <div class="col-lg-6">
                     @if($productdetails->UniqueProductCode!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->UniqueProductCode}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Description:</label>
                   </div>
                    <div class="col-lg-6">
                    @if($productdetails->Description!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->Description}}</label>
                   @endif
                   </div>
                   
                  </div>
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Style Number:</label>
                   </div>
                    <div class="col-lg-6">
                    @if($productdetails->StyleNumber!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->StyleNumber}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Season:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->SeasonID!="")
                   <label class="control-label font-noraml text-left label_font">{{$productseasondetails->Season}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Status:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->ProductStatusID!="")
                   <label class="control-label font-noraml text-left label_font">{{$productstatusdetails->StatusName}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Product Process:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->ProductProcessID!="")
                   <label class="control-label font-noraml text-left label_font">{{$productprocessdetails->ProductProcess}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Version:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->Version!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->Version}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Sample & Quote:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->SampleandQuote==1)
                   <label class="control-label font-noraml text-left label_font">{{"Sample and Quote"}}</label>
                   @elseif($productdetails->SampleandQuote==2)
                    <label class="control-label font-noraml text-left label_font">{{"Quote only"}}</label>
                   @endif
                   </div>
                   
                  </div>
                  
                </div>
                
                
                        
                  
        
              
              
                
              
            </div>
            
               <!--production/process info-->
            
            <div class="col-sm-12 b-r">
         
                   <div class="col-lg-3">
                   <label class="control-label font-noraml text-left label_font">Production/ Process Info</label>
                   </div>
                   
                   
                  <div class="col-lg-5">
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Pricing Method:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->PricingMethod!="")
                   <label class="control-label font-noraml text-left label_font">{{$pricingmethoddetails->PricingMethod}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Unit of Measurement:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->UnitofMeasurementID!="")
                   <label class="control-label font-noraml text-left label_font">{{$unitofmeasurementdetails->UnitofMeasurement}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Currency:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->CurrencyID!="")
                   <label class="control-label font-noraml text-left label_font">{{$currencydetails->Currency}}</label>
                   @endif
                   </div>
                   
                  </div>
                   <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Minimum Order Quantity:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->MinimumOrderQuantity!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->MinimumOrderQuantity}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Minimum Order Value:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->MinimumOrderValue!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->MinimumOrderValue}}</label>
                   @endif
                   </div>
                   
                  </div>
                   <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Pack Size:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->PackSize!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->PackSize}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Selling Price:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->SellingPrice!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->SellingPrice}}</label>
                   @endif
                   </div>
                   
                  </div>
                   <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">ExWorks:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->ExWorks==1)
                   <label class="control-label font-noraml text-left label_font">Yes</label>
                   @endif
                   </div>
                   
                  </div>
                   <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">FOB:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->FOB==1)
                   <label class="control-label font-noraml text-left label_font">Yes</label>
                   @endif
                   </div>
                   
                  </div>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                </div>
                
                
                        
                  
        
              
              
                
              
            </div>
            
            <!--Inventory-->
            <div class="col-sm-12 b-r">
         
                   <div class="col-lg-3">
                   <label class="control-label font-noraml text-left label_font">Inventory</label>
                   </div>
                   
                   
                  <div class="col-lg-5">
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">InventoryID:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->InventoryID!="")
                   <label class="control-label font-noraml text-left label_font">{{$inventorydetails->InventoryName}}</label>
                   @endif
                   </div>
                   
                  </div>
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Projection:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->Projection!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->Projection}}</label>
                   @endif
                   </div>
                   
                  </div>
                   <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">ProductionRegion1:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->ProductionRegionID1!="")
                   <label class="control-label font-noraml text-left label_font">{{$productionregionname}}</label>
                   @endif
                   </div>
                   
                  </div>
                   <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">UniqueFactory1:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->UniqueFactory1!="")
                   <label class="control-label font-noraml text-left label_font">{{$uniquefactory1}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">ProductionRegion2:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->ProductionRegionID2!="")
                   <label class="control-label font-noraml text-left label_font">{{$productionregionname2}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">UniqueFactory2:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->UniqueFactory2!="")
                   <label class="control-label font-noraml text-left label_font">{{$uniquefactory2}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">ProductionRegion3:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->ProductionRegionID3!="")
                   <label class="control-label font-noraml text-left label_font">{{$productionregionname3}}</label>
                   @endif
                   </div>
                   
                  </div>
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">UniqueFactory3:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->UniqueFactory3!="")
                   <label class="control-label font-noraml text-left label_font">{{$uniquefactory3}}</label>
                   @endif
                   </div>
                   
                  </div>
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Maximum pieces on stock:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->Maximumpiecesonstock!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->Maximumpiecesonstock}}</label>
                   @endif
                   </div>
                   
                  </div>
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Minimum pieces on stock:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->Minimumpiecesonstock!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->Minimumpiecesonstock}}</label>
                   @endif
                   </div>
                   
                  </div>
                  
                 
     
                  
                  
                </div>
                
                
                        
                  
        
              
              
                
              
            </div>
            
            <!--Sample Requirement-->
            <div class="col-sm-12 b-r">
         
                   <div class="col-lg-3">
                   <label class="control-label font-noraml text-left label_font">Sample Requirement</label>
                   </div>
                   
                   
                  <div class="col-lg-5">
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Sample Requested Date:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->SampleRequestedDate!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->SampleRequestedDate}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Sample Number:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->SampleRequestNumber!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->SampleRequestNumber}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Number Of Samples Required:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->NumberOfSamplesRequired!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->NumberOfSamplesRequired}}</label>
                   @endif
                   </div>
                   
                  </div>
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Sample Lead Time:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->SampleLeadTime!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->SampleLeadTime}}</label>
                   @endif
                   </div>
                   
                  </div>
                  
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Production Lead Time:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->ProductionLeadTime!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->ProductionLeadTime}}</label>
                   @endif
                   </div>
                   
                  </div>
                  <div class="col-sm-12">
                   <div class="col-lg-6">
                   <label class="control-label font-noraml text-left label_font labelbold">Remarks / Special Instructions:</label>
                   </div>
                    <div class="col-lg-6">
                   @if($productdetails->RemarksInstructions!="")
                   <label class="control-label font-noraml text-left label_font">{{$productdetails->RemarksInstructions}}</label>
                   @endif
                   </div>
                   
                  </div>
                  
 
                  
                </div>
                
                
                        
                  
        
              
              
                
              
            </div>
            <?php
			
			//echo "packagingstickers".$packagingstickersdetails->Artwork;exit;
			?>
            
          
             <div class="col-sm-12 b-r imagestyles">
             <div class="col-lg-2 imagealign">
             @if($boxesdetails->Artwork)
      <img  src="{{ route('user.boxpic', ['id' => $boxesdetails->id]) }}" alt="your image" width="80" height="80" />
              @elseif($hangtagsdetails->Artwork)
     <img  src="{{ route('user.hangtagpic', ['id' => $hangtagsdetails->id]) }}" alt="your image" width="80" height="80" />
      @elseif($tapesdetails->Artwork)
       <img  src="{{ route('user.tapespic', ['id' => $tapesdetails->id]) }}" alt="your image" width="80" height="80" />
            @endif
             </div>
             <div class="col-lg-2 imagealign">
               @if($hookdetails->Artwork)
            <img  src="{{ route('user.producthookpic', ['id' => $hookdetails->id]) }}" alt="your image" width="80" height="80" />
                @endif
             </div>
             <div class="col-lg-2 imagealign">
              @if($tissuepaperdetails->Artwork)
               <img  src="{{ route('user.productpictissue', ['id' => $tissuepaperdetails->id]) }}" alt="your image" width="80" height="80" />
              @endif
             </div>
             <div class="col-lg-2 imagealign">
              @if($packagingstickersdetails->Artwork)
               <img  src="{{ route('user.productpicpackage', ['id' => $packagingstickersdetails->id]) }}" alt="your image" width="80" height="80" />
              @endif
             </div>
             <div class="col-lg-2 imagealign">
              @if($productdetails->Artworkupload)
               <img  src="{{ route('user.productimagepic', ['id' => $productdetails->id]) }}" alt="your image" width="80" height="80" />
              @endif
             </div>
             <div class="col-lg-2 imagealign">
             
             </div>
             
             </div>
            
            
            
          </div>
        
     
        
     
    <div class="form-group">
                
                 <div class="col-lg-3">
            
         
                </div>
                 <div class="col-lg-5 submitbtndiv">
       <input type="submit" name="productinformation" id="productinformation" value="Send"  class="button nextbtn" />
                 </div>
                </div>
                
                   </form>
                   
                      </div>
      
      </div>

    </div>
</div>
       


 

                                
                           










@endsection 