<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boxes extends Model
{
    //
	protected $table = "boxes";

  protected $fillable = [
    'CustomerID','RawMaterialID','PrintTypeID','CuttingID','PrintingFinishingProcessID','ProductID','HookID','TissuePaperID','	PackagingStickersID','PrincingMethodID','UnitofMeasurementID','CurrencyID','Thickness','measurement1','measurement2','measurement3','QualityReference','QualityReferencem','Width','Height','Length','CMYK','PrintColor1','PrintColor2','PrintColor3','	PrintColor4','PrintColor5','PrintColor6','PrintColor7','PrintColor8','ProductionRegionID1','UniqueFactory1','ProductionRegionID2',
	'UniqueFactory2','ProductionRegionID3','UniqueFactory3','Artwork'
  ];
}
