<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketingRegions extends Model
{
    //
	protected $table = "marketingregions";

  protected $fillable = [
    'marketingRegionName', 'status'
  ];
}
