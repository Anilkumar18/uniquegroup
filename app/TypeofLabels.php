<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeofLabels extends Model
{
    //
	protected $table = "typeoflabels";

  protected $fillable = [
    'TypeofLabels', 'status'
  ];
}
