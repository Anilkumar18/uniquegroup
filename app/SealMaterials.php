<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SealMaterials extends Model
{
    //
	protected $table = "sealsmaterials";

  protected $fillable = [
    'SealsMaterials','status'
  ];
}
