<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Woven extends Model
{
    //
	protected $table = "labelswoven";

  protected $fillable = [
    'CustomerID','TypeofLabelID','LoomTypeID ','LoomHarnessID','WarpID','QualityID ','TypeoffoldID','SewSpaceID','	LanguageID','SizeRangeID','CountryofOriginID','DryID','WashID','BleachID','IronID','DryCleaningID','FabricCompositionID','GarmentComponentsID','CareInstructionSpecialInstructions','Qualityreference','Width','Length','FinishedLength','GroundColor','BrocadeColor1','BrocadeColor2','BrocadeColor3','BrocadeColor4','BrocadeColor5 ','BrocadeColor6','Finishing','ExclusiveofTrimmings','ExclusiveofDecoration','ExclusiveofFindings','FireWarningLabel'];
}
