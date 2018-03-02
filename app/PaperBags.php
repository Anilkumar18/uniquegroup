<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperBags extends Model
{
    //
	protected $table = "paperbags";

  protected $fillable = [
    'MaterialID', 'CuttingID','PrintingFinishingProcessID','PackagingStickersID','TissuePaperID','HookID','PrintType',
	'QualityReference','Thickness','Width','Length','Height','HandleMaterial','HandleWidth','HandleLength','HandleFastening',
	'FoldOverWidth','Reinforcements','GroundPaperColor','CMYK','PrintColor1','PrintColor2','PrintColor3','PrintColor4',
	'PrintColor5','PrintColor6','PrintColor7','PrintColor8','status'
  ];
  
 
  
 
}
