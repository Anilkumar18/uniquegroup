<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetalMaterial extends Model
{
    //
	protected $table = "metalmaterial";

  protected $fillable = [
    'MetalMaterial','status'
  ];
}
