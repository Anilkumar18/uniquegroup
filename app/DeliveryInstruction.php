<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryInstruction extends Model
{
    //
	protected $table = "deliveryinstruction";

  protected $fillable = [
    'UserID', 'POnumber', 'vendorname', 'payingParty', 'DeliveryDate', 'DeliveryAddressID', 'BillAddressID', 'BillTelePhone', 'contact', 'EmailID', 'DeliveryMethodID', 'DeliveryAccountNo', 'comments','status'
  ];
  
 
  
 
}
