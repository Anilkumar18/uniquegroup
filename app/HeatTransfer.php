<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeatTransfer extends Model
{
    //
	protected $table = "heattransfer";

  protected $fillable = [
    'CustomerID', 'TypeofLabelID','TypeofHeatTransfer','FinishID','LanguageID','SizeRangeID','ApplicationID','CountryofOriginID',
	'DryID','WashID','BleachID','IronID','DryCleanID','	FabricCompositionID','GarmentComponentsID','CareInstructionSpecialInstructions','Qualityreference',
	'Width','Length','GroundColor','PrintColor1','PrintColor2','PrintColor3','PrintColor4','Artwork','status'
  ];
}
