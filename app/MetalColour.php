<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetalColour extends Model
{
    //
	protected $table = "metalcolour";

  protected $fillable = [
    'MetalColour','status'
  ];
}
