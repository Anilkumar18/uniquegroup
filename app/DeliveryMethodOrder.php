<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryMethodOrder extends Model
{

	   
	protected $table = "orderdeliverymethod";

  protected $fillable = [
    'userID', 'OrderDeliveryMethod', 'status'
  ];
}
