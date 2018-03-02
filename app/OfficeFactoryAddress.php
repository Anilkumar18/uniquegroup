<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeFactoryAddress extends Model
{
    //
	protected $table = "officefactoryaddress";

  protected $fillable = [
    'prodRegionID', 'CountryID', 'StateID','factoryName','firstNAme','lastName','phoneNumber','Email','Suite','Street','City','zipCode','status'
  ];
}
