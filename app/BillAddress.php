<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillAddress extends Model
{

	   
	protected $table = "billaddress";

  protected $fillable = [
    'userID', 'BillAddress', 'status'
  ];
}
