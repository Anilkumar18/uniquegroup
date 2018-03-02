<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    //
	protected $table = "productgroup";

  protected $fillable = [
    'ProductGroupName', 'status'
  ];
  
  public static function selectGroups($groupname)
  {
    $groupnames=ProductGroup::where('id','=',$groupname)->where('status','=',1)->first();
  	return $groupnames;
  }
  
  public static function selectsubgroups($groupname)
  {
			
			$groupdetails=ProductGroup::where('ProductGroup','=',$groupname)->where('status','=',1)->first();
			
			$subgroupdetails=ProductSubGroup::where('Product_groupID','=',$groupdetails->id)->where('status','=',1)->get();
		
			return $subgroupdetails;
  }
}
