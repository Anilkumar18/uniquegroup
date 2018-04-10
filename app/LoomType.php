<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoomType extends Model
{
    //
	protected $table = "loomtype";

  protected $fillable = [
    'LoomType','status'
  ];
}
