<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
  
  protected $table = "customers";
  
  protected $fillable=[
					  'CountryID', 'StateID', 'CustomerName','MainContactFirstname','MainContactLastname','PhoneNumber','Email','Suite','Street','City','ZIPcode','status'
					  ];
					
}



?>
