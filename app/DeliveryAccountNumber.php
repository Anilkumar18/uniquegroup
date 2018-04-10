<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAccountNumber extends Model
{

	   
	protected $table = "deliveryaccountno";

  protected $fillable = [
    'userID', 'DeliveryAccountNo', 'status'
  ];
}
