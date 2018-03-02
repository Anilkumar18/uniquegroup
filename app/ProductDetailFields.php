<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetailFields extends Model
{
    //
	protected $table = "productdetailfields";

  protected $fillable = [
    'categoryID','fieldname','	status'
  ];
}
