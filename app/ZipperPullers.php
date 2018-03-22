<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZipperPullers extends Model
{
    //
	protected $table = "zipperpullers";

  protected $fillable = [
    'CustomerID','PullerMaterialID','ProductID','QualityReference','CurrencyID','QualityReferencem','StringLoopLength','StringThickness','StringQuality','StringColor1','StringColor2','PullerEndWidthSize','PullerEndHeightSize','PullerEndThickness','PullerEndColor','MoldCosting','MoldCostingCurrency','ProductionRegionID1','UniqueFactory1','ProductionRegionID2',
	'UniqueFactory2','ProductionRegionID3','UniqueFactory3','Artwork','SampleCosting','Version'
  ];
}
