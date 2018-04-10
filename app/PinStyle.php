<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinStyle extends Model
{
    //
	protected $table = "pinstyle";

  protected $fillable = [
    'PinStyle','status'
  ];
}
