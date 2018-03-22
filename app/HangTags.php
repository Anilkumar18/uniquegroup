<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HangTags extends Model
{
    //
	protected $table = "hangtags";

  protected $fillable = [
    'CustomerID','MaterialID','PrintTypeID','CuttingID','PrintingFinishingProcessID','GrommetMaterialID','GrommetColourID','StringMaterialID','SealID','BallChainColourID','BallChainMaterialID','PinStyleID','PinColourID','PinMaterialID','QualityReference','ProductID','Pin','PinLength','GroundPaperColor','Drillholesize','StringTotalLength','StringLooptoKnotLength','BallChain','BallChainLength','Thickness','measurement1','QualityReference','QualityReferencem','Width','Length','CMYK','PrintColor1','PrintColor2','PrintColor3','PrintColor4','PrintColor5','PrintColor6','PrintColor7','PrintColor8','ProductionRegionID1','UniqueFactory1','ProductionRegionID2',
	'UniqueFactory2','ProductionRegionID3','UniqueFactory3','CurrencyID','Artwork','Version'
  ];
}
