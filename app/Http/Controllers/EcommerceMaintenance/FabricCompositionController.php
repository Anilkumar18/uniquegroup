<?php

namespace App\Http\Controllers\EcommerceMaintenance;

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

use App\FabricComposition;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;


use File;
use URL;

use App\Zippercolor;

class FabricCompositionController extends Controller

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

    

 

    
public function fabriccomp()
{
  $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
        
         $fabricdetails = FabricComposition::orderBy('id','ASC')->get();
         $customerid=30;

        
         //print_r($coodetails);
         return view('ecommercemaintenance.fabriccomposition', compact('user','usertype','fabricdetails','customerid'));

}
 

     

     public function addfabric(Request $request)
    {
      
      $user = Auth::user();
      $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         
         if($request->editID!='')
      {
        $updatecoo=DB::table('fabricmaintenance')
            ->where('id',$request->editID)
            ->update([
      'customerID' => $request->customerID,
        
        'descEnglish' => $request->descriptionEnglish,
        'descFrench' => $request->descriptionFrench,
        
        'descSpanish' => $request->descriptionSpanish,

        'descPolish' => $request->descriptionPolish,
        'descChinese' => $request->descriptionChinese,
        'descRomanian' => $request->descriptionRomanian,
        'descTurkish' => $request->descriptionTurkish,
        'descCzech' => $request->descriptionCzech,
        'descHungarian' => $request->descriptionHungarian,
        'descSlovak' => $request->descriptionSlovak,
        'descPortuguese' => $request->descriptionPortuguese,
        'descFlemish' => $request->descriptionFlemish,
        'descItalian' => $request->descriptionItalian,
        'descGerman' => $request->descriptionGerman,
        'descDanish' => $request->descriptionDanish,
        'descBulgarian' => $request->descriptionBulgarian,
        'descGreek' => $request->descriptionGreek,
        'descRussian' => $request->descriptionRussian,
        'descArabic' => $request->descriptionArabic,
        'descIndonesian' => $request->descriptionIndonesian,
        'descKorean' => $request->descriptionKorean,
        'descJapanese' =>$request->descriptionJapanese,
        'descSlovenian' => $request->descriptionSlovenian,
        'status' => 1
        ]);
            $request->session()->flash('success', 'Fabric Composition Updated successfully.');
      return redirect()->back();
      
    }
    else
    {        

       $fabricaddnew = FabricComposition::Create([
        'customerID' => $request->customerID,
        
        'descEnglish' => $request->descriptionEnglish,
        'descFrench' => $request->descriptionFrench,
        
        'descSpanish' => $request->descriptionSpanish,
        'descPolish' => $request->descriptionPolish,
        'descChinese' => $request->descriptionChinese,
        'descRomanian' => $request->descriptionRomanian,
        'descTurkish' => $request->descriptionTurkish,
        'descCzech' => $request->descriptionCzech,
        'descHungarian' => $request->descriptionHungarian,
        'descSlovak' => $request->descriptionSlovak,
        'descPortuguese' => $request->descriptionPortuguese,
        'descFlemish' => $request->descriptionFlemish,
        'descItalian' => $request->descriptionItalian,
        'descGerman' => $request->descriptionGerman,
        'descDanish' => $request->descriptionDanish,
        'descBulgarian' => $request->descriptionBulgarian,
        'descGreek' => $request->descriptionGreek,
        'descRussian' => $request->descriptionRussian,
        'descArabic' => $request->descriptionArabic,
        'descIndonesian' => $request->descriptionIndonesian,
        'descKorean' => $request->descriptionKorean,
        'descJapanese' =>$request->descriptionJapanese,
        'descSlovenian' => $request->descriptionSlovenian,
        'status' => 1
      ]);
      $fabricaddnew->save();
      $request->session()->flash('success', 'Fabric Composition Added successfully.');
      return redirect()->back();
    }
  }

    public function editfabric(request $request,$id){
      $fabricdata=FabricComposition::where('id','=',$id)->first();
  //echo "<pre>".print_r($zippercolor_data);
  return json_encode(["success"=>true,$fabricdata]);
    }
      
    public function deletefabric(Request $request ,$id)
{
    //print_r($id);
   
       $user = Auth::user();
       $fabricdetailsdel = FabricComposition::where('id','=',$id)->first();
       
       
      //$customer_delete = Customers::find($id);

      $fabricdetailsdel->delete();




        $request->session()->flash('failure', 'Fabric Composition deleted successfully.');     

        return redirect()->back(); 
}

public function fabricactivate(Request $request)
    {
  
      $user = Auth::user();
    $id=$request->id;
    
     $updatecoo=DB::table('fabricmaintenance')
            ->where('id',$request->id)
            ->update([
      'status' => 1,
        
        ]);
        
        $request->session()->flash('success', 'Fabric Composition activated successfully.');     

        return redirect()->back(); 
  
  }
   public function fabricdeActivate(Request $request)
     {
       
        $user = Auth::user();   
    
    $id=$request->id;

       $updatecoo=DB::table('fabricmaintenance')
            ->where('id',$request->id)
            ->update([
      'status' => 0,
        
        ]);
      
        
        $request->session()->flash('success', 'Fabric Composition deactivated successfully.');     

       return redirect()->back(); 

     }


}

?>