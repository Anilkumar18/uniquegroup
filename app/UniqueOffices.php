<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UniqueOffices  extends Model
{
  
  protected $table = "uniqueoffices";
  
  protected $fillable=[
					  'RegionSelectID',
					  'OfficeFactoryName',
					  'MarketingRegionID',
					  'ProductionRegionID',
					  'MainContactFirstName',
					  'MainContactLastName',
					  'PhoneNumber',
					  'Email',
					  'Suite',
					  'Street',
					  'City',
					  'CountryID',
					  'StateID',
					  'ZIPcode',
					  'FactoryID1',
					  'FactoryID2',
						'status'
					  ];
					
}



?>
