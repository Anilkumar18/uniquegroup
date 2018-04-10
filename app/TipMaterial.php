<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipMaterial extends Model
{
    //
	protected $table = "tipmaterial";

  protected $fillable = [
    'TipMaterial','status'
  ];
}
