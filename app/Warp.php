<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warp extends Model
{
    //
	protected $table = "warp";

  protected $fillable = [
    'Warp','status'
  ];
}
