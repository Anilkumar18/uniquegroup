<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zippercolor extends Model
{
    //
	protected $table = "zipperColor";

  protected $fillable = [
    'customerID','productID','zipperColor','zipperDescription','productImage','productCost','sellingPrice','packSize','status'];
}
