<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryMethod  extends Model
{
  
  protected $table = "deliverymethod";
  
  protected $fillable=[
					    'MethodName',
						'status'
					  ];
					
}



?>
