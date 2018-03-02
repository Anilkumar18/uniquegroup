<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //
	protected $table = "productdetail";

  protected $fillable = [
    'Customerid','ProductGroupID','ProductSubGroupID','SeasonID','ProductStatusID','ProductProcessID','ProductionRegionID1',
	'ProductionRegionID2','PricingMethodID','CurrencyID','UnitofMeasurementID','InventoryID','UniqueFactory1','UniqueFactory2','Brand','ProgramName',
	'CustomerProductName','CustomerProductCode','UniqueProductCode','Description','StyleNumber','Version','MinimumOrderQuantity','MinimumOrderValue',
	'PackSize','SellingPrice','MaximumPiecesOnStock','MinimumPiecesOnStock','SampleRequestedDate','SampleRequestNumber','NumberOfSamplesRequired','	QuoteRequired',
	'SampleLeadTime','ProductionLeadTime','RemarksInstructions','Artworkupload','status'
  ];
}
