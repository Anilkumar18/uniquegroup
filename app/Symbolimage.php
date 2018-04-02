<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Symbolimage extends Model
{
  
  protected $table = "symbolimages";
  

					  protected $fillable=[
					 'chainID','imageName','status'
					  ];
					  
					  

}



?>
