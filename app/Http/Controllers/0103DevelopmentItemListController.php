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

use App\Boxes;


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

use App\Quote;

use App\Tissuepaper;

use App\Hook;

use App\PackagingStickers;

use DB;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;


use File;
use URL;
use Mail;
use App\Http\Controllers\Mailgun;
class DevelopmentItemListController extends Controller

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

public function appEmail()
{



# Instantiate the client.
$mgClient = new Mailgun('key-eea627977d4220f9587791505a557717');
$domain = "sandbox0876c2bb4ba54745a13c93cf2d8dfaaf.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
          array('from'    => 'Mailgun Sandbox <postmaster@sandbox0876c2bb4ba54745a13c93cf2d8dfaaf.mailgun.org>',
                'to'      => 'ait <vidhyae.ait@gmail.com>',
                'subject' => 'Hello ait',
                'text'    => 'Congratulations ait, you just sent an email with Mailgun!  You are truly awesome! '));
/* Mail::send('emails.sample_email', ['user' => 'vidhya'],function ($m) {
            $m->from('vidhyae.ait@gmail.com', 'Your Application');
            

            $m->to('vidhyae.ait@gmail.com', 'vidhya')->subject('Your Reminder!');
        }); 
if (Mail::failures()) {
        dd('error');
    }else{
        
        dd('mail send successfully');
    }
*/

}

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

  

 public function developmentlistviewdetails()

    {
    	//echo "dfgdfg";exit;
 		$user = Auth::user();

         $productlist=DB::Select('call sp_selectproductdetails(1,0,0)');

         foreach($productlist as $artworklist)
         	//print_r($artworklist);

         $artworkimg = $artworklist->Artworkupload;

     //print_r($artworkimg); exit;
     	$path = storage_path('app');

     	//echo $path; exit;


         $season = Season::where('status','=','1')->get();
         $status = Status::where('status','=','1')->get();
         $customerdetails = Customers::where('status','=','1')->get();

         $productgroupdetails = ProductGroup::where('status','=','1')->get();
         $productsubgroupdetails = ProductSubGroup::where('status','=','1')->get();

         $productprocess = ProductProcess::where('status','=','1')->get();

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

         return view('users.developmentlistview', compact('user','usertype','productlist','season','status','customerdetails','productgroupdetails','productsubgroupdetails','productprocess','artworkimg','path'));

    }

    public function getproductimg(Request $request, $id) {

      $productid = Boxes::find($id);

      $filePath = base_path()."/storage/app/".$productid->Artwork; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

  }

  public function gettissueimg(Request $request, $id) {

      $productid = Tissuepaper::find($id);
      
      $filePath = base_path()."/storage/app/".$productid->Artwork; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);  
        return $img->response('png');

  }

  public function gethookimg(Request $request, $id) {

      $productid = Hook::find($id);
      
      $filePath = base_path()."/storage/app/".$productid->Artwork; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);  
        return $img->response('png');

  }

  public function getpackageimg(Request $request, $id) {

      $productid = PackagingStickers::find($id);
      
      $filePath = base_path()."/storage/app/".$productid->Artwork; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);  
        return $img->response('png');

  }

   public function delete(Request $request ,$id)
{
    
   
       $user = Auth::user();
       $developmentlist_delete = ProductDetails::where('id','=',$id)->first();
       
       
      //$customer_delete = Customers::find($id);

      $developmentlist_delete->delete();




        $request->session()->flash('failure', 'Development Product deleted successfully.');     

        return redirect(url(route('user.developmentlistview')));   
}
public function deletehook(Request $request ,$id, $productid)
{
    
        $user = Auth::user();
       $development_update = DB::table('productdetails')->where('HookID', $id)->update(['HookID' => 'NULL']);
       $developmentlist_delete = Hook::where('id','=',$id)->first();
       
       
      //$customer_delete = Customers::find($id);

      $developmentlist_delete->delete();




        $request->session()->flash('failure', 'Development Product deleted successfully.');     

        return redirect(url(route('user.developmentlistview'))); 
}

public function deletetissue(Request $request ,$id, $producttid)
{
    
  
      $user = Auth::user();
       $development_update = DB::table('productdetails')->where('TissuePaperID', $id)->update(['TissuePaperID' => 'NULL']);
       $developmentlist_delete = Tissuepaper::where('id','=',$id)->first();
       
       
      //$customer_delete = Customers::find($id);

      $developmentlist_delete->delete();




        $request->session()->flash('failure', 'Development Product Tissuepaper deleted successfully.');     

        return redirect(url(route('user.developmentlistview')));  
}
public function deletepackage(Request $request ,$id, $productpid)
{
    //echo "dfghg";exit;
  
       $user = Auth::user();
       $development_update = DB::table('productdetails')->where('PackagingStickersID', $id)->update(['PackagingStickersID' => 'NULL']);
       $developmentlist_delete = PackagingStickers::where('id','=',$id)->first();
       
       
      //$customer_delete = Customers::find($id);

      $developmentlist_delete->delete();




        $request->session()->flash('failure', 'Development Product Tissuepaper deleted successfully.');     

        return redirect(url(route('user.developmentlistview')));      
}

public function viewdevelopmentitemlist(Request $request, $id, $typeid, $productid)

   {
    $producttype = $typeid;
    $productview = $productid;
	
	$data[]=$id;
    //print_r($producttype);exit;

   $user = Auth::user();

   $usertype = UserType::where('id', '=', $user->userTypeID)->first();

   $productid=$id;

  // echo "test".$vendorid;exit;

   $productdevlopmentlist = ProductDetails::where('id','=',$id)->first();

   //print_r($productdevlopmentlist->CustomerID);exit;
    $customers=App\Customers::where('id','=',$productdevlopmentlist->CustomerID)->first();

    $status=App\Status::where('id','=',$productdevlopmentlist->status)->first();


   return view('users.view_developmentitemlist', compact('user','productdevlopmentlist','customers','status','usertype','producttype','productview'));    

   }

  public function developmentitemlistduplicate(Request $request, $id, $duplicateid, $hookid)

    {


        $producttypeid = $duplicateid;
        $user = Auth::user();

        $productlist=DB::Select('call sp_selectproductdetails(1,0,0)');


         $season = Season::where('status','=','1')->get();
         $status = Status::where('status','=','1')->get();
         $customerdetails = Customers::where('status','=','1')->get();

         $productgroupdetails = ProductGroup::where('status','=','1')->get();
         $productsubgroupdetails = ProductSubGroup::where('status','=','1')->get();

         $productprocess = ProductProcess::where('status','=','1')->get();

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();


         $duplicaterecord = ProductDetails::where('id','=',$id)->first();

        $boxduplicatedrecord=DB::select('call sp_CRUDboxes(4,'.$duplicaterecord->BoxID.',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)');
        $boxlastduplicateid = Boxes::orderby('id','desc')->first();
        $boxduplicateid= $boxlastduplicateid->id; 


         if($producttypeid==0)
         {
            
          
            $hookduplicateid= 0;
            $tissueduplicateid= 0;
            $packduplicateid= 0;
        

            $data['boxduplicate'][]=0;
          $productdetails_insert = ProductDetails::create(['CustomerID'=>$duplicaterecord->CustomerID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        'HookID' =>$hookduplicateid,
        'TissuePaperID' =>$tissueduplicateid,
        'PackagingStickersID' =>$packduplicateid,
        'BoxID' => $boxduplicateid,
        'SeasonID'=>$duplicaterecord->SeasonID,
        'ProductStatusID'=>$duplicaterecord->ProductStatusID,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethodID'=>$duplicaterecord->PricingMethodID,
        'CurrencyID'=>$duplicaterecord->CurrencyID,
        'UnitofMeasurementID'=>$duplicaterecord->UnitofMeasurementID,
        'InventoryID'=>$duplicaterecord->InventoryID,
        'InventoryName'=>$duplicaterecord->InventoryName,
        'UniqueFactory1'=>$duplicaterecord->UniqueFactory1,
        'UniqueFactory2'=>$duplicaterecord->UniqueFactory2,
        'UniqueFactory3'=>$duplicaterecord->UniqueFactory3,
        'UniqueFactory4'=>$duplicaterecord->UniqueFactory4,
        'UniqueFactory5'=>$duplicaterecord->UniqueFactory5,
        'UniqueFactory6'=>$duplicaterecord->UniqueFactory6,
        'UniqueFactory7'=>$duplicaterecord->UniqueFactory7,
        'UniqueFactory8'=>$duplicaterecord->UniqueFactory8,
        'Brand'=>$duplicaterecord->Brand,
        'ProgramName'=>$duplicaterecord->ProgramName,
        'CustomerProductName'=>$duplicaterecord->CustomerProductName,
        'CustomerProductCode'=>$duplicaterecord->CustomerProductCode,
        'UniqueProductCode'=>$duplicaterecord->UniqueProductCode,
                'Description'=>$duplicaterecord->Description,
                'StyleNumber'=>$duplicaterecord->StyleNumber,
                'Version'=>$duplicaterecord->Version,
                'MinimumOrderQuantity'=>$duplicaterecord->MinimumOrderQuantity,
                'MinimumOrderValue'=>$duplicaterecord->MinimumOrderValue,
                'PackSize'=>$duplicaterecord->PackSize,
                'SellingPrice'=>$duplicaterecord->SellingPrice,
                'SampleRequestedDate' =>$duplicaterecord->SampleRequestedDate,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>$duplicaterecord->NumberOfSamplesRequired,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'SampleLeadTime' =>$duplicaterecord->SampleLeadTime,
                'ProductionLeadTime'=>$duplicaterecord->ProductionLeadTime,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>$duplicaterecord->Projection,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
                'status'=>1
                ]);
          $version_old=$duplicaterecord->Version;
          $version_new=$productdetails_insert->Version;

         }
         elseif($producttypeid==1)
         {

            
            if($duplicaterecord->HookID!= "")
         {
         if($duplicaterecord->HookID != null && $duplicaterecord->HookID <> 0)
         {
          $produ = Hook::where('id','=',$hookid)->first();
            $versihook = 1;

        $hookduplicatedrecord=DB::select('call sp_CRUDhooks(4,"'.$duplicaterecord->HookID.'",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$versihook.'",0,0,0)');
        $hooklastduplicateid = Hook::orderby('id','desc')->first();
        $hookduplicateid= $hooklastduplicateid->id;
        $tissueduplicateid = 0;
        $packduplicateid = 0;

         }else
         {
            $hookduplicateid= 0;
         }
     }
            $data['boxduplicate'][]=1;
          $productdetails_insert = ProductDetails::create(['CustomerID'=>$duplicaterecord->CustomerID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        'HookID' =>$hookduplicateid,
        'BoxID' => 0,
        'SeasonID'=>$duplicaterecord->SeasonID,
        'ProductStatusID'=>$duplicaterecord->ProductStatusID,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethodID'=>$duplicaterecord->PricingMethodID,
        'CurrencyID'=>$duplicaterecord->CurrencyID,
        'UnitofMeasurementID'=>$duplicaterecord->UnitofMeasurementID,
        'InventoryID'=>$duplicaterecord->InventoryID,
        'InventoryName'=>$duplicaterecord->InventoryName,
        'UniqueFactory1'=>$duplicaterecord->UniqueFactory1,
        'UniqueFactory2'=>$duplicaterecord->UniqueFactory2,
        'UniqueFactory3'=>$duplicaterecord->UniqueFactory3,
        'UniqueFactory4'=>$duplicaterecord->UniqueFactory4,
        'UniqueFactory5'=>$duplicaterecord->UniqueFactory5,
        'UniqueFactory6'=>$duplicaterecord->UniqueFactory6,
        'UniqueFactory7'=>$duplicaterecord->UniqueFactory7,
        'UniqueFactory8'=>$duplicaterecord->UniqueFactory8,
        'Brand'=>$duplicaterecord->Brand,
        'ProgramName'=>$duplicaterecord->ProgramName,
        'CustomerProductName'=>$duplicaterecord->CustomerProductName,
        'CustomerProductCode'=>$duplicaterecord->CustomerProductCode,
        'UniqueProductCode'=>$duplicaterecord->UniqueProductCode,
                'Description'=>$duplicaterecord->Description,
                'StyleNumber'=>$duplicaterecord->StyleNumber,
                'Version'=>$duplicaterecord->Version,
                'MinimumOrderQuantity'=>$duplicaterecord->MinimumOrderQuantity,
                'MinimumOrderValue'=>$duplicaterecord->MinimumOrderValue,
                'PackSize'=>$duplicaterecord->PackSize,
                'SellingPrice'=>$duplicaterecord->SellingPrice,
                'SampleRequestedDate' =>$duplicaterecord->SampleRequestedDate,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>$duplicaterecord->NumberOfSamplesRequired,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'SampleLeadTime' =>$duplicaterecord->SampleLeadTime,
                'ProductionLeadTime'=>$duplicaterecord->ProductionLeadTime,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>$duplicaterecord->Projection,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
                'status'=>1
                ]);
          $version_old=$produ->Version;
         $version_new=$hooklastduplicateid->Version;
         }
         elseif ($producttypeid==2) {

             if($duplicaterecord->TissuePaperID!= "")
     {

       if($duplicaterecord->TissuePaperID!= null && $duplicaterecord->TissuePaperID<> 0)
         {
          $tissprod = Tissuepaper::where('id','=',$hookid)->first();
          $hookve = 1;

        $tissueduplicatedrecord=DB::select('call sp_CRUDtissuepaper(4,"'.$duplicaterecord->TissuePaperID.'",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$hookve.'",0,0)');
        $tissuealastduplicateid = Tissuepaper::orderby('id','desc')->first();
        $tissueduplicateid= $tissuealastduplicateid->id;
        $packduplicateid = 0;
        $hookduplicateid = 0;
         }else
         {
            $tissueduplicateid= 0;
         }
     }


            $data['boxduplicate'][]=2;
          $productdetails_insert = ProductDetails::create(['CustomerID'=>$duplicaterecord->CustomerID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        
        'TissuePaperID' =>$tissueduplicateid,
        'BoxID' => 0,
        'SeasonID'=>$duplicaterecord->SeasonID,
        'ProductStatusID'=>$duplicaterecord->ProductStatusID,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethodID'=>$duplicaterecord->PricingMethodID,
        'CurrencyID'=>$duplicaterecord->CurrencyID,
        'UnitofMeasurementID'=>$duplicaterecord->UnitofMeasurementID,
        'InventoryID'=>$duplicaterecord->InventoryID,
        'InventoryName'=>$duplicaterecord->InventoryName,
        'UniqueFactory1'=>$duplicaterecord->UniqueFactory1,
        'UniqueFactory2'=>$duplicaterecord->UniqueFactory2,
        'UniqueFactory3'=>$duplicaterecord->UniqueFactory3,
        'UniqueFactory4'=>$duplicaterecord->UniqueFactory4,
        'UniqueFactory5'=>$duplicaterecord->UniqueFactory5,
        'UniqueFactory6'=>$duplicaterecord->UniqueFactory6,
        'UniqueFactory7'=>$duplicaterecord->UniqueFactory7,
        'UniqueFactory8'=>$duplicaterecord->UniqueFactory8,
        'Brand'=>$duplicaterecord->Brand,
        'ProgramName'=>$duplicaterecord->ProgramName,
        'CustomerProductName'=>$duplicaterecord->CustomerProductName,
        'CustomerProductCode'=>$duplicaterecord->CustomerProductCode,
        'UniqueProductCode'=>$duplicaterecord->UniqueProductCode,
                'Description'=>$duplicaterecord->Description,
                'StyleNumber'=>$duplicaterecord->StyleNumber,
                'Version'=>$duplicaterecord->Version,
                'MinimumOrderQuantity'=>$duplicaterecord->MinimumOrderQuantity,
                'MinimumOrderValue'=>$duplicaterecord->MinimumOrderValue,
                'PackSize'=>$duplicaterecord->PackSize,
                'SellingPrice'=>$duplicaterecord->SellingPrice,
                'SampleRequestedDate' =>$duplicaterecord->SampleRequestedDate,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>$duplicaterecord->NumberOfSamplesRequired,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'SampleLeadTime' =>$duplicaterecord->SampleLeadTime,
                'ProductionLeadTime'=>$duplicaterecord->ProductionLeadTime,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>$duplicaterecord->Projection,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
                'status'=>1
                ]);
          $version_old=$tissprod->Version;
         $version_new=$tissuealastduplicateid->Version;
         }
         elseif ($producttypeid==3) {

            if($duplicaterecord->PackagingStickersID!= "")
        {


         if($duplicaterecord->PackagingStickersID!= null && $duplicaterecord->PackagingStickersID <> 0)
         {
          $packprod = PackagingStickers::where('id','=',$hookid)->first();
          $hookve = 1;

        $packduplicatedrecord=DB::select('call sp_CRUDpackagingstickers(4,"'.$duplicaterecord->PackagingStickersID.'",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$hookve.'",0,0)');
        $packalastduplicateid = PackagingStickers::orderby('id','desc')->first();
        $packduplicateid= $packalastduplicateid->id;
        $tissueduplicateid = 0;
        $hookduplicateid = 0;
         }else
         {
            $packduplicateid= 0;
         }
     }
            $data['boxduplicate'][]=3;
           $productdetails_insert = ProductDetails::create(['CustomerID'=>$duplicaterecord->CustomerID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        'PackagingStickersID' =>$packduplicateid,
        'BoxID' => 0,
        'SeasonID'=>$duplicaterecord->SeasonID,
        'ProductStatusID'=>$duplicaterecord->ProductStatusID,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethodID'=>$duplicaterecord->PricingMethodID,
        'CurrencyID'=>$duplicaterecord->CurrencyID,
        'UnitofMeasurementID'=>$duplicaterecord->UnitofMeasurementID,
        'InventoryID'=>$duplicaterecord->InventoryID,
        'InventoryName'=>$duplicaterecord->InventoryName,
        'UniqueFactory1'=>$duplicaterecord->UniqueFactory1,
        'UniqueFactory2'=>$duplicaterecord->UniqueFactory2,
        'UniqueFactory3'=>$duplicaterecord->UniqueFactory3,
        'UniqueFactory4'=>$duplicaterecord->UniqueFactory4,
        'UniqueFactory5'=>$duplicaterecord->UniqueFactory5,
        'UniqueFactory6'=>$duplicaterecord->UniqueFactory6,
        'UniqueFactory7'=>$duplicaterecord->UniqueFactory7,
        'UniqueFactory8'=>$duplicaterecord->UniqueFactory8,
        'Brand'=>$duplicaterecord->Brand,
        'ProgramName'=>$duplicaterecord->ProgramName,
        'CustomerProductName'=>$duplicaterecord->CustomerProductName,
        'CustomerProductCode'=>$duplicaterecord->CustomerProductCode,
        'UniqueProductCode'=>$duplicaterecord->UniqueProductCode,
                'Description'=>$duplicaterecord->Description,
                'StyleNumber'=>$duplicaterecord->StyleNumber,
                'Version'=>$duplicaterecord->Version,
                'MinimumOrderQuantity'=>$duplicaterecord->MinimumOrderQuantity,
                'MinimumOrderValue'=>$duplicaterecord->MinimumOrderValue,
                'PackSize'=>$duplicaterecord->PackSize,
                'SellingPrice'=>$duplicaterecord->SellingPrice,
                'SampleRequestedDate' =>$duplicaterecord->SampleRequestedDate,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>$duplicaterecord->NumberOfSamplesRequired,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'SampleLeadTime' =>$duplicaterecord->SampleLeadTime,
                'ProductionLeadTime'=>$duplicaterecord->ProductionLeadTime,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>$duplicaterecord->Projection,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
                'status'=>1
                ]);
           $version_old=$packprod->Version;
          $version_new=$packalastduplicateid->Version;
         }
         

        

         $data[] = ['duplicate_id'=>$productdetails_insert->id,'edit_id'=>$id,'version_new'=>$version_new,'version_old'=>$version_old];
         $data['processid'][] = '0'.','.$producttypeid;
         $data['processrecord'][] = $productdetails_insert->id.','.'0';
                
        return Response::json($data);

       
    }
 

  

}

?>