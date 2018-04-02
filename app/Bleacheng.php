<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bleacheng extends Model
{
    //
	protected $table = "bleacheng";

  protected $fillable = [
    'BleachName','Symbol'
  ];
}
