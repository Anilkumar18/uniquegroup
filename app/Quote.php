<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //
	protected $table = "quote";

  protected $fillable = [
    'Quantity','status'
  ];
}
