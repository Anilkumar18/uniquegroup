<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagingStickers extends Model
{
    //
	protected $table = "packagingstickers";

  protected $fillable = [
    'CustomerID','ProductID','ProductGroupID','ProductSubGroupID','TypeofStickerID','MaterialID','PrintTypeID',
	'CuttingID','PrintingFinishingProcessID','QualityReference','QualityReferencem','Thickness','measurement1',
	'measurement2','measurement3','Width','Length','AdhesiveID','Shape','CMYK','PrintColor1','PrintColor2','PrintColor3',
	'PrintColor4','PrintColor5','PrintColor6','PrintColor7','PrintColor8','UniqueproductGroup','UniqueFactory','Productstatus',
	'Artwork'
  ];
}
