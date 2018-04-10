<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintedLabel extends Model
{
    //
	protected $table = "labelsprinted";

  protected $fillable = [
    'CustomerID','TypeofLabelID','SubstrateQualityID ','SubstrateReferenceID','SubstrateColorID','TypeoffoldID','SewSpaceID','PrinttypeID','FinishingID','Qualityreference','Width','Length','FinishedLength','DuraPrint','Calendered','InkColor1','InkColor2','InkColor3','InkColor4 ','status','Artwork'];
}
