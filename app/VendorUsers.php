<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorUsers extends Model
{
    //
	protected $table = "vendorusers";

  protected $fillable = [
    'CustomerID', 'CompanyID', 'FactoryID','UsertypeID','firstName','lastName','phoneNumber','Email','Password','status'
  ];
}
