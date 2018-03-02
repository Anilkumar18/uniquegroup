<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    //
	protected $table = "season";

  protected $fillable = [
    'Season','status'
  ];
}
