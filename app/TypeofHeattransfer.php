<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeofHeattransfer extends Model
{
    //
	protected $table = "typeofheattransfer";

  protected $fillable = [
    'TypeofHeatTransfer', 'status'
  ];
}
