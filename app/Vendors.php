<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
  
  protected $table = "vendors";
  
  protected $fillable=[
					  'CustomerID',
					  'Countryofoperation',
					  /*'Countryofoperation2',*/
					  'CountryID',
					  'StateID',
					  'CourierCompanyID',
					  'CompanyName',
					  'MainContactFirstName',
					  'MainContactLastName',
					  'PhoneNumber',
					  'Email',
					  'FactoryName',
					  'Suite',
					  'Street',
					  'City',
					  'ZIPcode',
					  'Factory1ID',
					  'Factory2ID',
					  'InvoiceID',
					  'DeliveryID',
						'status'
					  ];
					
}



?>
