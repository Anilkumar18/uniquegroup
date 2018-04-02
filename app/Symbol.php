<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Symbol extends Model
{
  
  protected $table = "symbolmaintenance";
  

					  protected $fillable=[
					 'CustomerID','suspendedCarePhrase','descriptionEnglish','descriptionFrench','descriptionSpanish','descriptionPolish','descriptionChinese','descriptionRomanian','descriptionTurkish','descriptionPortuguese','descriptionRussian','symbolType','imageID','status'
					  ];
					  
					  

}



?>
