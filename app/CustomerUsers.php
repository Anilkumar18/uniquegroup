<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerUsers extends Model
{
    //
	protected $table = "customerusers";

  protected $fillable = [
    'CustomerID', '	CountryID', 'StateID','	UserTypeID','FirstName','LastName','PhoneNumber','Email','Suite','Street','City','ZIPcode',
	'UserName','Password','remember_token','is_sys_admin','status'
  ];
}
