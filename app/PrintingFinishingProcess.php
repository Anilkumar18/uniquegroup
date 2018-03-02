<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintingFinishingProcess extends Model
{
    //
	protected $table = "printingfinishingprocess";

  protected $fillable = [
    'PrintingFinishingProcessName', 'status'
  ];
  
 
  
 
}
