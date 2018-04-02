<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Session;

use Validator,Stroage,Log,View,App;

//Auth facade
use Auth;

use App\UserType;

use App\Chain;

use App\Products;

use App\ProductGroup;

use App\ProductSubGroup;

use App\Customers;

use App\ProductionRegions;

use App\ProductProcess;

use App\Material;

use App\PrintType;

use App\Cutting;

use App\HangTags;

use App\PrintingFinishingProcess;

use App\LogoProcess;

use App\Season;

use App\PricingMethod;

use App\Currency;

use App\UnitofMeasurement;

use App\RawMaterial;

use App\PaperBags;

use App\ProductDetails;

use App\Status;

use App\HooksMaterial;

use App\ProductDevelopmentFields;

use App\ProductDetailFields;

use App\Inventory;

use App\UniqueOffices;

use App\Quote;

use App\Boxes;

use App\Hook;

use App\Tissuepaper;

use App\Woven;

use App\PrintedLabel;

use App\SymbolType;

use App\SymbolImages;

use App\HeatTransfer;

use App\PackagingStickers;

use DB;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;


use File;
use URL;

use App\Zippercolor;

class OrderController extends Controller

{


    /**

     * Create a new controller instance.

     *

     * @return void

     */
	 

    public function __construct()

    {

        $this->middleware('auth');

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    

 public function orderlistview()

    {
 		$user = Auth::user();

         

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

         return view('users.orderlist', compact('user','usertype'));

    }

    public function completeorderlistview()

    {
 		$user = Auth::user();

         

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

         return view('users.completeorderlist', compact('user','usertype'));

    }

    public function placeorderview()

    {
        $user = Auth::user();

         

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

       $productgroupdetails=ProductGroup::where('status','=',1)->get();
      return view('admin.placeorderlist', compact('user','usertype','productgroupdetails'));

    }

    public function placeordermaintenance($id)

    {

        $user = Auth::user();

         
$processid=explode('#',base64_decode($id));

      //print_r($processid);
  $id=$processid[0];
   $subgroupid=$processid[1];
  $carestatus=$processid[2];
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         $ProductionRegions=ProductionRegions::where('status', '=', 1)->get();
          $productcustomerID=$user->customerID;
          $usertypeID=$user->userTypeID;
          $ProductGroupID=$id;

         $productlist=DB::Select('call sp_getcustomerproductdetails('.$ProductGroupID.','.$usertypeID.','.$productcustomerID.','.$subgroupid.','.$carestatus.')');
       $productgroupdetails=ProductGroup::where('status','=',1)->where('id', '=', $id)->first();
       $productsubgroupdetails=ProductSubGroup::where('status','=',1)->where('id', '=', $subgroupid)->first();

$symboldetails=SymbolType::where('status','=',1)->get();

       //$productgroupdetails=ProductGroup::where('status','=',1)->get();
       
      return view('admin.placeorder', compact('user','usertype','ProductGroupID','productlist','ProductionRegions','productgroupdetails','productsubgroupdetails','carestatus','symboldetails'));

    }

    public function gezippercolorimg($id){



        $productid = Zippercolor::find($id);
        

      $filePath = base_path()."/storage/app/".$productid->productImage; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

     
    }

    public function getsymbolimg(Request $request, $id) {

      $productid = SymbolImages::find($id);
      
      $filePath = base_path()."/storage/app/".$productid->imageName; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);  
        return $img->response('png');

  }

 public function getproductzippercolorid($id){



       $productiddata = Zippercolor::where('productID', '=', $id)->get();
        

     foreach ($productiddata as $productidkey => $productidvalue) {
        $data['zipcolorid'][]=$productidvalue->id;
        $data['zipcolorcolor'][]=$productidvalue->zipperColor;
     }

     return json_encode(["success" => true, $data]);

     
    }

public function getcaredetails($id){

$productdetail = ProductDetails::find($id);
if($productdetail->WovenLabelID){
    $caredetaildata = Woven::where('productID', '=', $productdetail->id)->first();
}
if($productdetail->PrintedLabelID){
    $caredetaildata = PrintedLabel::where('productID', '=', $productdetail->id)->first();
}
if($productdetail->HeatTransferLabelID){
    $caredetaildata = HeatTransfer::where('productID', '=', $productdetail->id)->first();
}

 $data['SizeRangeID']=$caredetaildata->SizeRangeID;
 $data['SizebyLetter']=$caredetaildata->SizebyLetter;
 $data['SizebyNumber']=$caredetaildata->SizebyNumber;
 $data['BraSizes']=$caredetaildata->BraSizes;
 $data['ToddlerSizes']=$caredetaildata->ToddlerSizes;
 $data['PantsSizes']=$caredetaildata->PantsSizes;
 
        $data['CountryofOriginID']=$caredetaildata->CountryofOriginID;
        $data['ExclusiveofTrimmings']=$caredetaildata->ExclusiveofTrimmings;
        $data['ExclusiveofDecoration']=$caredetaildata->ExclusiveofDecoration;
        $data['ExclusiveofFindings']=$caredetaildata->ExclusiveofFindings;
        $data['FireWarningLabel']=$caredetaildata->FireWarningLabel;

return json_encode(["success" => true, $data]);

}

}

?>