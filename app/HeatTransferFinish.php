<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeatTransferFinish extends Model
{
    //
	protected $table = "heattransferfinish";

  protected $fillable = [
    'Finish', 'status'
  ];
}
