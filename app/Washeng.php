<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Washeng extends Model
{
    //
	protected $table = "washeng";

  protected $fillable = [
    'WashNames','Symbol'
  ];
}
