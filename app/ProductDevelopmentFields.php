<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDevelopmentFields extends Model
{
    //
	protected $table = "productdevelopmentfields";

  protected $fillable = [
    'ProductSubGroupID','fieldname','status'
  ];
}
