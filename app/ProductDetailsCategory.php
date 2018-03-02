<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetailsCategory extends Model
{
    //
	protected $table = "productdetailscategory";

  protected $fillable = [
    'categoryname','status'
  ];
}
