<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hook extends Model
{
    //
	protected $table = "hooks";

  protected $fillable = [
    'CustomerID','ProductID','ProductGroupID','ProductSubGroupID','HooksMaterialID','QualityReference',
	'QualityReferencem','Color','Thickness','measurement1','measurement2','measurement3','Width','Length',
	'MoldCostingCurrency','MoldCosting','UniqueProductCode','UniqueFactory','Productstatus','Artwork'
  ];
}
