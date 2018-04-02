<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tapes extends Model
{
    //
	protected $table = "tapes";

  protected $fillable = [
    'CustomerID','TapesMaterialID','ProductID','QualityReference','CurrencyID','QualityReferencem','TapeColor','TapeWidth','TotalLength','Brocade','ProductionRegionID1','UniqueFactory1','ProductionRegionID2',
	'UniqueFactory2','ProductionRegionID3','UniqueFactory3','Artwork','Version'
  ];
}
