<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoomHarness extends Model
{
    //
	protected $table = "loomharness";

  protected $fillable = [
    'LoomHarness','status'
  ];
}
