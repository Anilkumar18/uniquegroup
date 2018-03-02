<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InStock extends Model
{
    //
	protected $table = "instock";

  protected $fillable = [
    'ProductID','UniqueFactoryID1','UniqueFactoryID2','Projection','MaximumPiecesOnStock','MinimumPiecesOnStock','status'
  ];
}
