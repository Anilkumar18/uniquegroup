<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolyBags extends Model
{
    //
	protected $table = "polybags";

  protected $fillable = [
    'MaterialID', 'CuttingID','PrintingFinishingProcessID','TypeofclosureID','TissuePaperID','HooksID','QualityReference',
	'Width','Length','BottomGussetSize','SideGussetSize','CMYK','PrintColor1','PrintColor2','PrintColor3',
	'PrintColor4','	PrintColor5','PrintColor6','PrintColor7','PrintColor8','CostingCurrency','SampleCosting','Plates',
	'status'
  ];
  
 
  
 
}
