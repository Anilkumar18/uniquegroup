<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cutting extends Model
{
    //
	protected $table = "packagingcutting";

  protected $fillable = [
    'CuttingName','status'
  ];
  
 
  
 
}
