<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StringMaterials extends Model
{
    //
	protected $table = "stringmaterials";

  protected $fillable = [
    'StringMaterials','status'
  ];
}
