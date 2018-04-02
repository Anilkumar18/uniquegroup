<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dryeng extends Model
{
    //
	protected $table = "dryeng";

  protected $fillable = [
    'DryNames','Symbol'
  ];
}
