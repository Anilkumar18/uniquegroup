<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricesticker extends Model
{
    //
	protected $table = "pricesticker";

  protected $fillable = [
    'poName', 'colorCode', 'basicColor','frenchColor','fallallColour','outerWear','activeColor','sleepWear','healthWear','status'
  ];
}
