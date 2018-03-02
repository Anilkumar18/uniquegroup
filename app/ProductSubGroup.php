<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubGroup extends Model
{
    //
	protected $table = "productsubgroup";

  protected $fillable = [
    'ProductSubGroupName', 'status'
  ];
}
