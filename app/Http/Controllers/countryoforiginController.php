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

use App\PackagingStickers;
use App\CountryofOrigin;

use DB;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;


use File;
use URL;

use App\Zippercolor;

class countryoforiginController extends Controller

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

    

 

    public function gezippercolorimg($id){



        $productid = Zippercolor::find($id);
        

      $filePath = base_path()."/storage/app/zipper/".$productid->productImage; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

     
    }
 public function getproductzippercolorid($id){



       $productiddata = Zippercolor::where('productID', '=', $id)->get();
        

     foreach ($productiddata as $productidkey => $productidvalue) {
        $data['zipcolorid'][]=$productidvalue->id;
        $data['zipcolorcolor'][]=$productidvalue->zipperColor;
     }

     return json_encode(["success" => true, $data]);

     
    }
    /*Vidhya:27-03-2018
    //Add zipper color insert code*/
    public function zippercoloradd(Request $request)
    {
      $user = Auth::user();
      $usertype = UserType::where('id', '=', $user->userTypeID)->first();
      //print_r($request->productImage);
      if($request->editid!='')
      {
        $productdetailsupdate=DB::table('zipperColor')
            ->where('id',$request->editid)
            ->update([
      'chainID' => $request->chainname,
        'productID' => $request->productcode,
        'zipperColor' => $request->color,
        'zipperDescription' => $request->itemdesc,
        'productCost' => $request->productCost,
        'sellingPrice' => $request->sellingPrice,
        'packSize' => $request->packSize,
        'productImage' => $request->selectimage,
        'status' => 1
        ]);
            $request->session()->flash('success', 'Zipper Color Updated successfully.');
      return redirect()->back();
      
    }
    else
    {
      //printf($request->editid);exit;
      
      $imgInp = Input::file('productImage');
            //$imgInp=$request->imgInp3;

            $path = '/data/product';
             if($imgInp!='')
                {
                    $destinationPath = $path;
                    $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());                   

                }


      $zippercoloradd = Zippercolor::Create([
        'chainID' => $request->chainname,
        'productID' => $request->productcode,
        'zipperColor' => $request->color,
        'zipperDescription' => $request->itemdesc,
        
        'productCost' => $request->productCost,
        'sellingPrice' => $request->sellingPrice,
        'packSize' => $request->packSize,
        'productImage' => $request->productImage,
        'status' => 1
      ]);
      $zippercoloradd->save();
      $request->session()->flash('success', 'Zipper Color Added successfully.');
      return redirect()->back();
    }
      

    }

    public function addcoo(Request $request)
    {
      $user = Auth::user();
      $usertype = UserType::where('id', '=', $user->userTypeID)->first();
                      
if($request->editID!='')
      {
        $updatecoo=DB::table('countryoforiginmaintenance')
            ->where('id',$request->editID)
            ->update([
      'customerID' => $request->CustomerID,
        
        'descEnglish' => $request->englishDesc,
        'descFrench' => $request->frenchDesc,
        
        'descSpanish' => $request->spanishDesc,
        
        'status' => 1
        ]);
            $request->session()->flash('success', 'Country of Origin Updated successfully.');
      return redirect()->back();
      
    }
    else
    {
      $cooaddnew = CountryofOrigin::Create([
        'customerID' => $request->CustomerID,
        
        'descEnglish' => $request->englishDesc,
        'descFrench' => $request->frenchDesc,
        
        'descSpanish' => $request->spanishDesc,
        
        'status' => 1
      ]);
      $cooaddnew->save();
      $request->session()->flash('success', 'Country of Origin Added successfully.');
      return redirect()->back();
    }
      
}
    

   public function editcoo(request $request,$id){
      $coodata=CountryofOrigin::where('id','=',$id)->first();
  //echo "<pre>".print_r($zippercolor_data);
  return json_encode(["success"=>true,$coodata]);
    }
    public function deletecoo(Request $request ,$id)
{
    //print_r($id);
   
       $user = Auth::user();
       $coodetailsdel = CountryofOrigin::where('id','=',$id)->first();
       
       
      //$customer_delete = Customers::find($id);

      $coodetailsdel->delete();




        $request->session()->flash('failure', 'Country Of Origin deleted successfully.');     

        return redirect()->back(); 
}
public function countryoforigin()
{
  $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         $coodetails = CountryofOrigin::orderBy('id','ASC')->get();
         $customerid=30;

        
         //print_r($coodetails);
         return view('admin.contryoforigin', compact('user','usertype','coodetails','customerid'));

}
 public function cooactivate(Request $request)
    {
  
      $user = Auth::user();
    $id=$request->id;
    
     $updatecoo=DB::table('countryoforiginmaintenance')
            ->where('id',$request->id)
            ->update([
      'status' => 1,
        
        ]);
        
        $request->session()->flash('success', 'Country Of Origin activated successfully.');     

        return redirect()->back(); 
  
  }
   public function coodeActivate(Request $request)
     {
       
        $user = Auth::user();   
    
    $id=$request->id;

       $updatecoo=DB::table('countryoforiginmaintenance')
            ->where('id',$request->id)
            ->update([
      'status' => 0,
        
        ]);
      
        
        $request->session()->flash('success', 'Country Of Origin deactivated successfully.');     

       return redirect()->back(); 

     }


}

?>