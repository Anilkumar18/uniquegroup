<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{

	   
	protected $table = "deliveryaddress";

  protected $fillable = [
    'userID', 'DeliveryAddress', 'status'
  ];
}
