<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishingLabels extends Model
{
    //
	protected $table = "finishinglabels";

  protected $fillable = [
    'FinishingCoatingLabels','status'
  ];
}
