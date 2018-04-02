<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DryCleaningeng extends Model
{
    //
	protected $table = "drycleaningeng";

  protected $fillable = [
    'DryCleaningNames','Symbol'
  ];
}
