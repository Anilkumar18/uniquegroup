<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productstore extends Model
{
    //
	protected $table = "productstore";

  protected $fillable = [
    'poName', 'colorCode', 'basicColor','frenchColor','fallallColour','outerWear','activeColor','sleepWear','healthWear','status'
  ];
}
