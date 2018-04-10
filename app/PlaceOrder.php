<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceOrder extends Model
{
    //
	protected $table = "placeOrder";

  protected $fillable = [
    'productID','userID', 'productRegion','poNumber','poDate','styleNo','season','countryOfOrigin','careWash','careBleach','careIron','careDryClean','careDry','orderstatus','status'
  ];
}
