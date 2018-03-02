<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricingMethod extends Model
{
    //
	protected $table = "pricingmethod";

  protected $fillable = [
    'Customerid','PricingMethod'
  ];
}
