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

use App\Hook;

use App\PackagingStickers;

use App\Tissuepaper;

use DB;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;


use File;
use URL;

class DevelopmentListController extends Controller

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

  

 public function developmentlistview()

    {
 		$user = Auth::user();

         $productlist=DB::Select('call sp_selectproductdetails(1,0,0)');


         $season = Season::where('status','=','1')->get();
         $status = Status::where('status','=','1')->get();
         $customerdetails = Customers::where('status','=','1')->get();

         $productgroupdetails = ProductGroup::where('status','=','1')->get();
         $productsubgroupdetails = ProductSubGroup::where('status','=','1')->get();

         $productprocess = ProductProcess::where('status','=','1')->get();

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

         return view('users.developmentlist', compact('user','usertype','productlist','season','status','customerdetails','productgroupdetails','productsubgroupdetails','productprocess'));

    }

     public function developmentlistduplicate(Request $request, $id)

    {
        //echo "hhfgj"; exit;
        $user = Auth::user();

        $productlist=DB::Select('call sp_selectproductdetails(1,0,0)');


         $season = Season::where('status','=','1')->get();
         $status = Status::where('status','=','1')->get();
         $customerdetails = Customers::where('status','=','1')->get();

         $productgroupdetails = ProductGroup::where('status','=','1')->get();
         $productsubgroupdetails = ProductSubGroup::where('status','=','1')->get();

         $productprocess = ProductProcess::where('status','=','1')->get();

         $usertype = UserType::where('id', '=', $user->userTypeID)->first();

         $productid=Session::get('productlastrecordid');
         $duplicaterecord = ProductDetails::where('id','=',$id)->first();

          /*$boxduplicatedrecord=DB::select('call sp_CRUDboxes(4,'.$duplicaterecord->BoxID.',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)');*/
		   $boxduplicatedrecord=DB::select('call sp_CRUDboxes(4,'.$duplicaterecord->BoxID.','.$duplicaterecord->CustomerID.',0,0,0,0,'.$duplicaterecord->id.',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)');
		   
        $boxlastduplicateid = Boxes::orderby('id','desc')->first();
        $boxduplicateid= $boxlastduplicateid->id; 
        $data['boxid'][] = $boxduplicateid;



         if($duplicaterecord->HookID!= "")
         {
         if($duplicaterecord->HookID != null && $duplicaterecord->HookID <> 0)
         {
            $produ = Hook::where('id','=',$duplicaterecord->HookID)->first();
            $versihook =1;
        /*$hookduplicatedrecord=DB::select('call sp_CRUDhooks(4,"'.$duplicaterecord->HookID.'",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$versihook.'",0,0,0)');*/
		$productdetails = Boxes::where('id','=',$duplicaterecord->HookID)->first();
	   
		$hookduplicatedrecord=DB::select('call sp_CRUDhooks(4,"'.$duplicaterecord->HookID.'",'.$duplicaterecord->CustomerID.','.$duplicaterecord->CustomerID.','.$productdetails->ProductID.','.$duplicaterecord->ProductGroupID.','.$duplicaterecord->ProductSubGroupID.',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$versihook.'",0,0,0)');
		
        $hooklastduplicateid = Hook::orderby('id','desc')->first();
        $hookduplicateid= $hooklastduplicateid->id;
       $tissueduplicateid= 0;
            $packduplicateid= 0;
            $boxduplicateid=$boxduplicateid;

         }else
         {
            $hookduplicateid= 0;
         }
     }

       

     if($duplicaterecord->TissuePaperID!= "")
     {

       if($duplicaterecord->TissuePaperID!= null && $duplicaterecord->TissuePaperID<> 0)
         {
            $tissprod = Tissuepaper::where('id','=',$duplicaterecord->TissuePaperID)->first();
          $hookve =1;
        $tissueduplicatedrecord=DB::select('call sp_CRUDtissuepaper(4,"'.$duplicaterecord->TissuePaperID.'",'.$duplicaterecord->CustomerID.',0,'.$duplicaterecord->ProductGroupID.','.$duplicaterecord->ProductSubGroupID.',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$hookve.'",0,0)');
        $tissuealastduplicateid = Tissuepaper::orderby('id','desc')->first();
        $tissueduplicateid= $tissuealastduplicateid->id;
        $hookduplicateid= 0;
        $packduplicateid= 0;
        $boxduplicateid=$boxduplicateid;
         }else
         {
            $tissueduplicateid= 0;
         }
     }


      if($duplicaterecord->PackagingStickersID!= "")
        {


         if($duplicaterecord->PackagingStickersID!= null && $duplicaterecord->PackagingStickersID <> 0)
         {
            $packprod = PackagingStickers::where('id','=',$duplicaterecord->PackagingStickersID)->first();
          $hookve =1;
		  
       $packduplicatedrecord=DB::select('call sp_CRUDpackagingstickers(4,"'.$duplicaterecord->PackagingStickersID.'",'.$duplicaterecord->CustomerID.',0,'.$duplicaterecord->ProductGroupID.','.$duplicaterecord->ProductSubGroupID.','.$packprod->TypeofStickerID.','.$packprod->MaterialID.','.$packprod->PrintTypeID.','.$packprod->CuttingID.','.$packprod->PrintingFinishingProcessID.',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$hookve.'",0,0)');
	   
	   /* $packduplicatedrecord=DB::select('call sp_CRUDpackagingstickers(4,
		"'.$duplicaterecord->PackagingStickersID.'",
		'.$duplicaterecord->CustomerID.',
		0,
		'.$duplicaterecord->ProductGroupID.',
		'.$duplicaterecord->ProductSubGroupID.',
		'.$duplicaterecord->TypeofStickerID.',
		'.$duplicaterecord->MaterialID.',
		'.$duplicaterecord->PrintTypeID.',
		'.$duplicaterecord->CuttingID.',
		'.$duplicaterecord->PrintingFinishingProcessID.',
		0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$hookve.'",0,0)');*/
		
        $packalastduplicateid = PackagingStickers::orderby('id','desc')->first();
        $packduplicateid=$packalastduplicateid->id;
        $hookduplicateid= 0;
            $tissueduplicateid= 0;
            $boxduplicateid=$boxduplicateid;
         }else
         {
            $packduplicateid= 0;
         }
     }

          if(($duplicaterecord->HookID != "" &&$duplicaterecord->HookID <>0) && ($duplicaterecord->TissuePaperID!= "" &&$duplicaterecord->TissuePaperID<>0) && ($duplicaterecord->PackagingStickersID!= "" && $duplicaterecord->PackagingStickersID<>0))
         {
            $hooklastduplicateid = Hook::orderby('id','desc')->first();
            $hookduplicateid= $hooklastduplicateid->id;
            $tissuealastduplicateid = Tissuepaper::orderby('id','desc')->first();
            $tissueduplicateid= $tissuealastduplicateid->id;
            $packalastduplicateid = PackagingStickers::orderby('id','desc')->first();
            $packduplicateid= $packalastduplicateid->id;
            $boxlastduplicateid = Boxes::orderby('id','desc')->first();
            $boxduplicateid= $boxlastduplicateid->id;


         }elseif(($duplicaterecord->HookID == "") && ($duplicaterecord->TissuePaperID== "") && ($duplicaterecord->PackagingStickersID== ""))
         {
             $hookduplicateid= 0;
            $tissueduplicateid= 0;
            $packduplicateid= 0;
            $boxduplicateid= $boxduplicateid;
            
         }else
         {
            $hookduplicateid= $hookduplicateid;
            $tissueduplicateid= $tissueduplicateid;
            $packduplicateid= $packduplicateid;
            $boxduplicateid= $boxduplicateid;
            
         }
    




          $productdetails_insert = ProductDetails::create([
		 'CustomerID'=>$duplicaterecord->CustomerID,
		 'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
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
        'PricingMethod'=>$duplicaterecord->PricingMethod,
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
				'SampleandQuote'=>$duplicaterecord->SampleandQuote,
                'MinimumOrderQuantity'=>$duplicaterecord->MinimumOrderQuantity,
                'MinimumOrderValue'=>$duplicaterecord->MinimumOrderValue,
                'PackSize'=>$duplicaterecord->PackSize,
                'SellingPrice'=>$duplicaterecord->SellingPrice,
                'SampleRequestedDate' =>$duplicaterecord->SampleRequestedDate,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>$duplicaterecord->NumberOfSamplesRequired,
				'QuantityMOQ'=>$duplicaterecord->QuantityMOQ,
				'Cost'=>$duplicaterecord->Cost,
				'Suggested_price'=>$duplicaterecord->Suggested_price,
				'Margin'=>$duplicaterecord->Margin,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
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
				'ExWorks'=>$duplicaterecord->ExWorks,
				'FOB'=>$duplicaterecord->FOB,
                'status'=>1
                ]);
		
		  $productdetails_get = ProductDetails::orderby('id','desc')->first();
		  if($boxduplicateid!="" || $boxduplicateid!=NULL || $boxduplicateid<>0)
		  {
		 $productdetailsupdate=DB::table('boxes')
            ->where('id',$boxduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
			]);
		  }
           //hook updations-bala
		    if($hookduplicateid!="" || $hookduplicateid!=NULL || $hookduplicateid<>0)
		  {
		   $productdetailsupdate=DB::table('hooks')
            ->where('id',$hookduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
			]);
		  }
		  //tissuepaper-bala
		   if($tissueduplicateid!="" || $tissueduplicateid!=NULL || $tissueduplicateid<>0)
		  {
		   $productdetailsupdate=DB::table('tissuepaper')
            ->where('id',$tissueduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
			]);
		  }
		  //packagingstickers-bala
		    if($packduplicateid!="" || $packduplicateid!=NULL || $packduplicateid<>0)
		  {
		   $productdetailsupdate=DB::table('packagingstickers')
            ->where('id',$packduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
			]);
		  }
		  
         //$data = $productdetails_insert->id '.' $id;

        /* $data['id'] = $productdetails_insert->id;
         $data['id'] = $id;*/

         $data[] = ['duplicate_id'=>$productdetails_insert->id,'edit_id'=>$id,'version_new'=>$productdetails_insert->Version,'version_old'=>$duplicaterecord->Version];

         //$data = $id;
        // print_r($data);
        
         
         //$duplicateid = $duplicaterecord->replicate()->save();

        
        return Response::json($data);

         /*return view('users.developmentlist', compact('user','usertype','productlist','season','status','customerdetails','productgroupdetails','productsubgroupdetails','productprocess','duplicateid'));*/

    }
    public function viewdevelopmentlist(Request $request, $id)

   {
    

   $user = Auth::user();

   $usertype = UserType::where('id', '=', $user->userTypeID)->first();

   $productid=$id;

  // echo "test".$vendorid;exit;

   $productdevlopmentlist = ProductDetails::where('id','=',$id)->first();

   //print_r($productdevlopmentlist->CustomerID);exit;
    $customers=App\Customers::where('id','=',$productdevlopmentlist->CustomerID)->first();

    $status=App\Status::where('id','=',$productdevlopmentlist->status)->first();

   return view('users.view_developmentlist', compact('user','productdevlopmentlist','customers','status','usertype'));    

   }

    public function delete(Request $request ,$id)
{
   
       $user = Auth::user();
       $developmentlist_delete = ProductDetails::where('id','=',$id)->first();
       
       
      //$customer_delete = Customers::find($id);

      $developmentlist_delete->delete();




        $request->session()->flash('failure', 'Development Product deleted successfully.');     

        return redirect(url(route('user.developmentlist')));   
}

  

}

?>