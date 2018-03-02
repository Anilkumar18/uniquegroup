<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniqueUsers extends Model
{
    //
	protected $table = "uniqueusers";

  protected $fillable = [
    'CustomerID','FactoryID','UsertypeID','firstName','lastName','phoneNumber','Email','Password','status'
  ];
}
