<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Careinstruction extends Model
{
    //
	protected $table = "careInstruction";

  protected $fillable = [
    'Instruction','status'
  ];
}
