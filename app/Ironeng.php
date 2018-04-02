<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ironeng extends Model
{
    //
	protected $table = "ironeng";

  protected $fillable = [
    'IronNames','Symbol'
  ];
}
