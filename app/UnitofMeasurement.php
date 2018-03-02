<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitofMeasurement extends Model
{
    //
	protected $table = "unitofmeasurement";

  protected $fillable = [
    'Customerid','UnitofMeasurement'
  ];
}
