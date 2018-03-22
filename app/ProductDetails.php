<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    //
	protected $table = "productdetails";

  protected $fillable = [
    'CustomerID','CustomerWareHouseID','HookID','TissuePaperID','PackagingStickersID','BoxID','HangTagsID','TapesID','ProductGroupID','ProductSubGroupID','SeasonID','ProductStatusID','ProductProcessID','ProductionRegionID1',
	'ProductionRegionID2','ProductionRegionID3','ProductionRegionID4','ProductionRegionID5','ProductionRegionID6','ProductionRegionID7','ProductionRegionID8','PricingMethod','PricingMethodID','CurrencyID','UnitofMeasurementID','InventoryID','UniqueFactory1','UniqueFactory2','UniqueFactory3','UniqueFactory4','UniqueFactory5','UniqueFactory6','UniqueFactory7','UniqueFactory8','Brand','ProgramName',
	'CustomerProductName','CustomerProductCode','UniqueProductCode','Description','StyleNumber','Version','SampleandQuote','MinimumOrderQuantity','MinimumOrderValue',
	'PackSize','SellingPrice','MaximumPiecesOnStock','MinimumPiecesOnStock','SampleRequestedDate','SampleRequestNumber','NumberOfSamplesRequired','QuantityMOQ','Cost','Suggested_price','Margin',
	'SampleLeadTime','ProductionLeadTime','RemarksInstructions','Artworkupload','ReferenceFileUpload','QualityReference',
	'Projection','UniqueFactory1Inventory','UniqueFactory2Inventory','Maximumpiecesonstock','Minimumpiecesonstock','ExWorks','FOB','status','created_at'
  ];
}
