<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tissuepaper extends Model
{
    //
	protected $table = "tissuepaper";

  protected $fillable = [
    'CustomerID','ProductID','ProductGroupID','ProductSubGroupID','MaterialID','PrintTypeID',
	'CuttingID','PrintingFinishingProcessID','Thickness','measurement1','measurement2','measurement3','QualityReference',
	'QualityReferencem','Width','Length','GroundPaperColor','CMYK','PrintColor1','PrintColor2','PrintColor3','PrintColor4',
	'PrintColor5','PrintColor6','PrintColor7','PrintColor8','UniqueProductCode','UniqueFactory','Productstatus','Artwork'
  ];
}
