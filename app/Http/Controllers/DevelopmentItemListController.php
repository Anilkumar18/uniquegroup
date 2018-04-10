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

use App\Tapes;

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

use App\ZipperPullers;
//sathish 28-03-2018 HeatTransfer
use App\HeatTransfer;
use App\Woven;
use App\PrintedLabel;

use DB;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;

use PDF;
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
//sathish 29-03-2018 
      $productid = ProductDetails::find($id);

      $filePath = base_path()."/storage/app/".$productid->Artworkupload; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

  }
   public function getboximg(Request $request, $id) {

      $productid = Boxes::find($id);

      $filePath = base_path()."/storage/app/".$productid->Artwork; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

  }

  public function gethangimg(Request $request, $id) {

      $productid = HangTags::find($id);

      $filePath = base_path()."/storage/app/".$productid->Artwork; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

  }
  public function gettapeimg(Request $request, $id) {

      $productid = Tapes::find($id);

      $filePath = base_path()."/storage/app/".$productid->Artwork; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

  }

  public function getzipperimg(Request $request, $id) {

      $productid = ZipperPullers::find($id);

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

  
  //sathish 27-03-2018 HeatTransfer Image

  public function getheattransferimg(Request $request, $id) {

      $productid = HeatTransfer::find($id);

      $filePath = base_path()."/storage/app/".$productid->Artwork; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

  }
//End sathish
   //sathish 28-03-2018 Woven Image

  public function getwovenimg(Request $request, $id) {

      $productid = Woven::find($id);

      $filePath = base_path()."/storage/app/".$productid->Artwork; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

  }
//End sathish

  

     //sathish 28-03-2018 Woven Image

  public function getprintedlabelimg(Request $request, $id) {

      $productid = PrintedLabel::find($id);

      $filePath = base_path()."/storage/app/".$productid->Artwork; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

  }
//End sathish
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
public function deletetapes(Request $request ,$id, $productpid)
{
      
       $user = Auth::user();
       
       $developmentlist_delete = Tapes::where('id','=',$id)->first();
      $developmentlist_delete->delete();
      $developmentproductdel = ProductDetails::where('id','=',$productpid)->first();
      $developmentproductdel->delete();

        $request->session()->flash('failure', 'Development Product Tapes deleted successfully.');     

        return redirect(url(route('user.developmentlistview')));      
}
public function deletehangtags(Request $request ,$id, $productpid)
{
      
       $user = Auth::user();
       
       $developmentlist_delete = HangTags::where('id','=',$id)->first();
      $developmentlist_delete->delete();
      $developmentproductdel = ProductDetails::where('id','=',$productpid)->first();
      $developmentproductdel->delete();

        $request->session()->flash('failure', 'Development Product HangTags deleted successfully.');     

        return redirect(url(route('user.developmentlistview')));      
}

public function deletezipper(Request $request ,$id, $productpid)
{
      
       $user = Auth::user();
       
       $developmentlist_delete = ZipperPullers::where('id','=',$id)->first();
      $developmentlist_delete->delete();
      $developmentproductdel = ProductDetails::where('id','=',$productpid)->first();
      $developmentproductdel->delete();

        $request->session()->flash('failure', 'Development Product Zipper Pullers deleted successfully.');     

        return redirect(url(route('user.developmentlistview')));      
}
/*vidhya:09-04-2018
Heat Transfer delete*/
public function deleteheat(Request $request ,$id, $productpid)
{
      
       $user = Auth::user();
       
       $developmentlist_delete = HeatTransfer::where('id','=',$id)->first();
      $developmentlist_delete->delete();
      $developmentproductdel = ProductDetails::where('id','=',$productpid)->first();
      $developmentproductdel->delete();

        $request->session()->flash('failure', 'Development Product Heat Transfer deleted successfully.');     

        return redirect(url(route('user.developmentlistview')));      
}

/*vidhya:09-04-2018
Printed Label delete*/
public function deleteprintedlabel(Request $request ,$id, $productpid)
{
      
       $user = Auth::user();
       
       $developmentlist_delete = PrintedLabel::where('id','=',$id)->first();
      $developmentlist_delete->delete();
      $developmentproductdel = ProductDetails::where('id','=',$productpid)->first();
      $developmentproductdel->delete();

        $request->session()->flash('failure', 'Development Product Printed Labels deleted successfully.');     

        return redirect(url(route('user.developmentlistview')));      
}

/*vidhya:09-04-2018
Woven delete*/
public function deletewoven(Request $request ,$id, $productpid)
{
      
       $user = Auth::user();
       
       $developmentlist_delete = Woven::where('id','=',$id)->first();
      $developmentlist_delete->delete();
      $developmentproductdel = ProductDetails::where('id','=',$productpid)->first();
      $developmentproductdel->delete();

        $request->session()->flash('failure', 'Development Product Woven Labels deleted successfully.');     

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

    //sathish 20-03-2018 

  /*$productdetails = ProductDetails::where('id','=',$id)->first();
  $boxesdetails=Boxes::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
  $hookdetails=Hook::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
  $tissuepaperdetails=Tissuepaper::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
   $packagingstickersdetails=PackagingStickers::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();*/
   
   //Defect:04-04-2018
         //Name: Bala-php Team
         //View the Product details of boxes,hooks,tissuepaper
   
        $typeiddetails=$typeid; 
		
		$productdetails = ProductDetails::where('id','=',$id)->first();
	   
	   if($typeiddetails==0)
	   {
	   
	   $boxesdetails=Boxes::where('ProductID','=',$productid)->where('status','=',1)->first();
	  // echo "boxesdetails"; exit;
	   }
	    elseif($typeiddetails==1)
	   {
	   
	  $hookdetails=Hook::where('ProductID','=',$productid)->where('status','=',1)->first();
	  // echo "hookdetails"; exit;
	   }
	    elseif($typeiddetails==2)
	   {
	 $tissuepaperdetails=Tissuepaper::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	   //echo "tissuepaperdetails"; exit;
	   }
	  elseif($typeiddetails==3)
	   {
		   
   $packagingstickersdetails=PackagingStickers::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	   //print_r($packagingstickersdetails);exit;
	    //echo "packagingstickersdetails"; exit;
	   }
	   elseif($typeiddetails==4)
	   {
		$hangtagsdetails=HangTags::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	    //echo "hangtagsdetails"; exit;
	   }
	    elseif($typeiddetails==5)
	   {
		$tapesdetails=Tapes::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
		//echo "tapesdetails"; exit;
	   }
	   elseif($typeiddetails==6)
	   {
		$zipperdetails=ZipperPullers::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
		//echo "zipperpullers"; exit;
	   }
	   elseif($typeiddetails==7)
	   {
		$wovendetails=Woven::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
		
		
	   }
     elseif($typeiddetails==8)
     {
     $heatdetails=HeatTransfer::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
    
     }
     elseif($typeiddetails==9)
     {
    $printedlabeldetails=PrintedLabel::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
    
     }

	   
	   
    

   return view('users.view_developmentitemlist', compact('user','productdevlopmentlist','customers','status','usertype','producttype','productview','productdetails','boxesdetails','hookdetails','tissuepaperdetails','packagingstickersdetails','hangtagsdetails',
'tapesdetails','typeiddetails','id','zipperdetails','tapesdetails','wovendetails','heatdetails','printedlabeldetails'));    

//end sathish 20-03-2018
   }
   /* Rajesh:01032018  */
   public function editdevelopmentitemlist(Request $request, $id, $typeid)

   {
    
    $user = Auth::user();
    $usertype = UserType::where('id', '=', $user->userTypeID)->first();
    
    $productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','<',3)->where('hide','=',0)->get();
    
    
    $productdetails = ProductDetails::where('id','=',$id)->first();

    $productgrouphookdetails="Hooks";
    $hookproductsubgroupdetails="Tissue Paper";
    $packagingstickersproductsubgroupdetails="Packaging Stickers";

    //hook details
    
    $productgrouphookdetails=ProductGroup::where('status','=',1)
    ->where('ProductGroup', 'like', '%' . $productgrouphookdetails. '%')->first();
    
    
    $producthookfields=ProductDevelopmentFields::where('status','=',1)->where('ProductGroupID','=',$productgrouphookdetails->id)->get();
    
    //tissuepaper details
    
    
    $productsubgrouptissuepaperdetails=ProductSubGroup::where('status','=',1)
    ->where('ProductSubGroupName', 'like', '%' . $hookproductsubgroupdetails. '%')->first();
    
          
    
    
      $productdevelopmentsubgroupdetails=ProductDevelopmentFields::where('status','=',1)->where('ProductSubGroupID','=',$productsubgrouptissuepaperdetails->id)->get();
      
      //packaging stickers
      
      $packagingstickersdetails=ProductSubGroup::where('status','=',1)
    ->where('ProductSubGroupName', 'like', '%' . $packagingstickersproductsubgroupdetails. '%')->first();

    $prddevsubgrouppackagingdetails=ProductDevelopmentFields::where('status','=',1)->where('ProductSubGroupID','=',$packagingstickersdetails->id)->get();

$inven_productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',3)->get();
      $inventorydetails=Inventory::where('status','=',1)->get();

      $invendetails_productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',2)->where('hide','=',1)->get();
      
    $quantitydetails=Quote::where('status','=',1)->get();

    $cost_productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',4)->where('hide','=',0)->get();

    //$productgroupid=$request->ProductGroup;
  
                //$productsubgroupid=$request->ProductSubGroupName;
      
  

   $productgroupid=$productdetails->ProductGroupID;
  
                 $productsubgroupid=$productdetails->ProductSubGroupID;

                $isfound=0;
                $productfields=ProductDevelopmentFields::where('status','=',1)->get();
  foreach($productfields as $products)
  {
  if($productgroupid == $products->ProductGroupID)
  {
  
  $productdevelopmentfields=ProductDevelopmentFields::where('ProductGroupID','=',$productgroupid)->get();
  $isfound=1;
  }
  
  }
  
  if($isfound ==0)
  {
  //$productdevelopmentfields=ProductDevelopmentFields::where('ProductSubGroupID','=',$productsubgroupid)->get();
  $productdevelopmentfields=ProductDevelopmentFields::where('ProductSubGroupID','=',$productsubgroupid)->where('ProductGroupID','=',0)->where('status','=',1)->get();
  
  }

  $boxesdetails=Boxes::where('ProductID','=',$id)->where('status','=',1)->first();
    
    //print_r($request->editID);exit;
    
    $hangtagsproduct = HangTags::where('id','=',$productdetails->HangTagsID)->first();
    $hookdetails=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
    
    $tissuepaperdetails=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
    
    $packagingstickersdetails=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();

    $tapeproduct=Tapes::where('id','=',$productdetails->TapesID)->first();

$productquotedetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
$zipperpullerproduct=ZipperPullers::where('id','=',$productdetails->ZipperPullersID)->first();

        return view('users.edit_developmentitemlist', compact('user','usertype','productfielddetails','producthookfields','productdevelopmentsubgroupdetails','prddevsubgrouppackagingdetails','inventorydetails','inven_productfielddetails','invendetails_productfielddetails','quantitydetails','cost_productfielddetails','productdetails','productdevelopmentfields','boxesdetails','hookdetails','tissuepaperdetails','productinventorydetails','packagingstickersdetails','productquotedetails','typeid','hangtagsproduct','tapeproduct','zipperpullerproduct'));
   
    
    
  
   }

public function updateitemlist(Request $request)
   {
     
     $user = Auth::user();
     $usertype = UserType::where('id', '=', $user->userTypeID)->first();
     $customerid=$request->customerid;
     $productid=$request->productID;
     $productgroupid=$request->ProductGroupID;
     $productsubgroupid=$request->ProductSubGroupID;
   
  
    
    //echo "hooks".$request->HooksMaterial;
    //echo "tissuepaper".$request->GroundPaperColor;
    
    //echo "tissuepapereditid".$request->tissuepapereditID;
	
	
	
	echo "customerid".$customerid; echo "<br>";
	echo "productid".$productid; echo "<br>";
	echo "productgroupid".$productgroupid; echo "<br>";
	echo "productsubgroupid".$productsubgroupid; echo "<br>";
	//exit;
    
    
    
    if($request->HooksMaterial!="")
    {
      $path = '/data/product';

        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

     
      
      
      
      
      //exit;

      
        
$productboxeslastrecordid=DB::select('call sp_CRUDboxes(3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
0,0,0,0,0,0,0,0)');
        $imgInp = Input::file('imgInp');
    $imgInp3 = Input::file('imgInp3');
      if($imgInp!='')
                {
                $destinationPath = $path;
              $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());             

        }
        else{
        if($request->selectimage !='')
        {
                
                $imgInp_filename= $request->selectimage;
                
                }
        else
        {
          if($request->editID!=''){
              $imgInp_filename=$request->existingboximage;
          }else{
              $imgInp_filename= '';
          }
        }
      }
         
        
    
    
    if($request->pt!="")
      {
      $pt=$request->pt;
      }
      else
      {
      $pt=0;
      }
      if($request->gms!="")
      {
      $gms=$request->gms;
      }
      else
      {
      $gms=0;
      }
      if($request->qty_chk!="")
      {
      $qty_chk=$request->qty_chk;
      }
      else
      {
      $qty_chk=0;
      }
    
       //echo "uniqueproductcode".$request->UniqueProductCode;exit;
       
       if($request->Hook_UniqueProductCode!="")
       {
       $UniqueProductCode=$request->Hook_UniqueProductCode;  
       }
       else
       {
       $UniqueProductCode=0;  
       }
        if($request->Hook_factoryName!="")
       {
       $factoryName=$request->Hook_factoryName;  
       }
       else
       {
       $factoryName=0;  
       }
          if($request->Hook_StatusName!="")
       {
       $StatusName=$request->Hook_StatusName;  
       }
       else
       {
       $StatusName=0;  
       }
       if($request->Hooks_ProductionRegions1!="")
      {
      $productionregion1=$request->Hooks_ProductionRegions1;
      }
      else
      {
      $productionregion1=0;
      }
      if($request->Hooks_ProductionRegions2!="")
      {
      $productionregion2=$request->Hooks_ProductionRegions2;
      }
      else
      {
      $productionregion2=0;
      }
      if($request->Hooks_ProductionRegions3!="")
      {
      $productionregion3=$request->Hooks_ProductionRegions3;
      }
      else
      {
      $productionregion3=0;
      }
      
      //echo "hooksuniquefactory".$request->uniquefactory_hooks1; exit;
      
      if($request->uniquefactory_hooks1!="")
      {
      $uniquefactory1=$request->uniquefactory_hooks1;
      $uniquefactory1 = implode(",", $uniquefactory1);
      $uniquefactory1details=$uniquefactory1;
      }
      else
      {
        $uniquefactory1details=0;
      }
      
      if($request->uniquefactory_hooks2!="")
      {
      $uniquefactory2=$request->uniquefactory_hooks2;
      $uniquefactory2 = implode(",", $uniquefactory2);
      $uniquefactory2details=$uniquefactory2;
      }
      else
      {
        $uniquefactory2details=0;
      }
      
      if($request->uniquefactory_hooks3!="")
      {
      $uniquefactory3=$request->uniquefactory_hooks3;
      $uniquefactory3 = implode(",", $uniquefactory3);
      $uniquefactory3details=$uniquefactory3;
      }
      else
      {
        $uniquefactory3details=0;
      }
      
      if($request->Currency!="")
      {
        $Currency=$request->Currency;
        
      }
      else
      {
        $Currency=0;
      }
      if($request->MoldCosting!="")
      {
        $MoldCosting=$request->MoldCosting;
        
      }
      else
      {
        $MoldCosting=0;
      }
      if($request->hook_thickness!="")
			{
			   $hook_thickenss=$request->hook_thickness;
			   if($hook_thickenss=="pt")
			   {
				 $hook_pt="pt";
				 $hook_gms="";
				 $hook_mm="";
				 
				   
			   }
			   elseif($hook_thickenss=="gms")
			   {
				 $hook_pt="";
				 $hook_gms="gms";
				 $hook_mm="";
				   
			   }
			  elseif($hook_thickenss=="mm")
			   {
				 $hook_pt="";
				 $hook_gms="";
				 $hook_mm="mm";
				   
			   }
			 	
				
			}
       
       
      if($request->editID!="")
        {
        
     $hooksupdations=DB::select('call sp_CRUDhooks(3,'.$request->editID.','.$customerid.',
     '.$productid.',
     '.$productgroupid.',
     '.$productsubgroupid.',
     '.$request->HooksMaterial.',
     "'.$request->QualityReference.'",
     '.$qty_chk.',
     "'.$request->Color.'",
     "'.$request->Thickness.'",
     "'.$hook_pt.'",
    "'.$hook_gms.'",
    "'.$hook_mm.'",
     "'.$request->Hook_Width.'",
     "'.$request->Hook_Length.'",
     "'.$Currency.'",
     "'.$MoldCosting.'",
     "'.$UniqueProductCode.'",
     '.$productionregion1.',
     "'.$uniquefactory1details.'",
     '.$productionregion2.',
     "'.$uniquefactory2details.'",
     '.$productionregion3.',
     "'.$uniquefactory3details.'",
     1,
     '.$StatusName.',
     "'.$imgInp_filename.'",0)');
    // print_r($hooksupdations);
     //exit;
       
      }
      
     
        
        
      
    }
    if($request->GroundPaperColor!="")
    {
      //echo "Tissuepaper".$request->tissuepapereditID;
      //echo "tissuepaper"; exit; 
          
      $path = '/data/product';

        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

     
      $imgInp1 = Input::file('imgInp1');

      
       if($imgInp1!='')
                {
                $destinationPath = $path;
              $imgInp_filename1=$imgInp1->storeAs($destinationPath,$imgInp1->getClientOriginalName());              

        }
        else{
        if($request->selectimage1!='')
        {
                
                $imgInp_filename1= $request->selectimage1;
                
                }
        else
        {
        $imgInp_filename1= '';
        }
      } 
    
     if($request->tissueprintcolor!="")
       {
       $cmyk=$request->tissueprintcolor;
       }
       else
       {
         $cmyk=0;
       }
       
      if($request->tissueprintcolor!="")
      {
      $cmyk=$request->tissueprintcolor;
      }
      else
      {
      $cmyk=0;
      }
      //echo "tissuepaper".$request->tissueprintcolor;exit;
       if($request->tissueqty_chk!="")
      {
      $qty_chk=$request->tissueqty_chk;
      }
      else
      {
        $qty_chk=0;
      }
       if($request->TissuePaper_ProductionRegions1!="")
      {
      $TissuePaper_ProductionRegions1=$request->TissuePaper_ProductionRegions1;
      }
      else
      {
      $TissuePaper_ProductionRegions1=0;
      }
      if($request->TissuePaper_ProductionRegions2!="")
      {
      $TissuePaper_ProductionRegions2=$request->TissuePaper_ProductionRegions2;
      }
      else
      {
      $TissuePaper_ProductionRegions2=0;
      }
      if($request->TissuePaper_ProductionRegions3!="")
      {
      $TissuePaper_ProductionRegions3=$request->TissuePaper_ProductionRegions3;
      }
      else
      {
      $TissuePaper_ProductionRegions3=0;
      }


            //echo "uniquefactory1".$request->uniquefactory_tissuepaper1;exit;
      
            if($request->uniquefactory_tissuepaper1!="")
      {
      $uniquefactory_tissuepaper1=$request->uniquefactory_tissuepaper1;
      $uniquefactory_tissuepaper1 = implode(",", $uniquefactory_tissuepaper1);
      $uniquefactory_tissuepaper1details=$uniquefactory_tissuepaper1;
      }
      else
      {
        $uniquefactory_tissuepaper1details=0;
      }
      
      if($request->uniquefactory_tissuepaper2!="")
      {
      $uniquefactory_tissuepaper2=$request->uniquefactory_tissuepaper2;
      $uniquefactory_tissuepaper2 = implode(",", $uniquefactory_tissuepaper2);
      $uniquefactory_tissuepaper2details=$uniquefactory_tissuepaper2;
      }
      else
      {
        $uniquefactory_tissuepaper2details=0;
      }
      
      if($request->uniquefactory_tissuepaper3!="")
      {
      $uniquefactory_tissuepaper3=$request->uniquefactory_tissuepaper3;
      $uniquefactory_tissuepaper3 = implode(",", $uniquefactory_tissuepaper3);
      $uniquefactory_tissuepaper3details=$uniquefactory_tissuepaper3;
      }
      else
      {
        $uniquefactory_tissuepaper3details=0;
      }
     if($request->Tissuepaper_PrintingFinishingProcess!="")
			{
			$Tissuepaper_PrintingFinishingProcess=$request->Tissuepaper_PrintingFinishingProcess;	
			 $checkBoxValue = implode(",", $Tissuepaper_PrintingFinishingProcess);
			$Tissuepaper_PrintingFinishingProcess=$checkBoxValue;
			$Tissuepaper_PrintingFinishingProcess;
			
			}
			else
			{
			$Tissuepaper_PrintingFinishingProcess=0;	
			}
	   if($request->tissue_thickness!="")
			{
			   $tissue_thickness=$request->tissue_thickness;
			   if($tissue_thickness=="pt")
			   {
				 $tissue_pt="pt";
				 $tissue_gms="";
				 $tissue_mm="";
				 
				   
			   }
			   elseif($tissue_thickness=="gms")
			   {
				 $tissue_pt="";
				 $tissue_gms="gms";
				 $tissue_mm="";
				   
			   }
			  elseif($tissue_thickness=="mm")
			   {
				 $tissue_pt="";
				 $tissue_gms="";
				 $tissue_mm="mm";
				   
			   }
			 	
				
			}
      
      
      if($request->tissuepapereditID!="")
      {
        //echo "tissuepaperedit";exit;
    $tissuepaperupdations=DB::select('call sp_CRUDtissuepaper(3,'.$request->tissuepapereditID.','.$customerid.',
    '.$productid.',
     '.$productgroupid.',
     '.$productsubgroupid.',
     '.$request->Tissuepaper_RawMaterial.',
     '.$request->Tissuepaper_PrintType.',
     '.$request->Tissuepaper_Cutting.',
     "'.$Tissuepaper_PrintingFinishingProcess.'",
     "'.$request->Tissuepaper_Thickness.'",
      "'.$tissue_pt.'",
	  "'.$tissue_gms.'",
	  "'.$tissue_mm.'",
     "'.$request->Tissuepaper_QualityReference.'",
     '.$qty_chk.',
     "'.$request->tissuepaper_Width.'",
     "'.$request->tissuepaper_Length.'",
     "'.$request->GroundPaperColor.'",
     '.$cmyk.',
    "'.$request->tissuepaper_print_color1.'",
    "'.$request->tissuepaper_print_color2.'",
    "'.$request->tissuepaper_print_color3.'",
    "'.$request->tissuepaper_print_color4.'",
    "'.$request->tissuepaper_print_color5.'",
    "'.$request->tissuepaper_print_color6.'",
    "'.$request->tissuepaper_print_color7.'",
    "'.$request->tissuepaper_print_color8.'",
    "'.$request->Tissuepaper_UniqueProductCode.'",
      '.$TissuePaper_ProductionRegions1.',
      "'.$uniquefactory_tissuepaper1details.'",
     '.$TissuePaper_ProductionRegions2.',
      "'.$uniquefactory_tissuepaper2details.'",
     '.$TissuePaper_ProductionRegions3.',
      "'.$uniquefactory_tissuepaper3details.'",
     '.$request->Tissuepaper_StatusName.',
     0,
     "'.$imgInp_filename1.'",0)');
    // echo "tissuepaper";exit;
   // echo "TissuePaper_ProductionRegions3".$TissuePaper_ProductionRegions3;
    //echo "uniquefactory_tissuepaper3details".$uniquefactory_tissuepaper3details; exit;
        
      }
      
      
      
      
      }
    //packaging stickers
    
    if($request->TypeofAdhesive!="")
    {
      
      //echo "Packagingsrickers".$request->packagingeditID;
      
      $path = '/data/product';

        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

     
      $imgInp = Input::file('imgInp2');
      //$imgInp = $request->imgInp;
      //echo "tet".$imgInp;exit;
      
       if($imgInp!='')
                {
                $destinationPath = $path;
              $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());             

        }
        else{
        if($request->selectimage2 !='')
        {
                
                $imgInp_filename= $request->selectimage2;
                
                }
        else
        {
        $imgInp_filename= '';
        }
      } 
    
   
   if($request->packageprintcolor!="")
   {
   $cmyk=$request->packageprintcolor;
   }
   else
   {
     $cmyk=0;
   }
   
  //echo "cmyk".$request->packageprintcolor; exit;
  
  
  
  if($request->pt!="")
  {
  $pt=$request->pt;
  }
  else
  {
  $pt=0;
  }
  if($request->gms!="")
  {
  $gms=$request->gms;
  }
  else
  {
  $gms=0;
  }
    if($request->mm!="")
  {
  $mm=$request->mm;
  }
  else
  {
  $mm=0;
  }
  
  
  if($request->packageqty_chk!="")
  {
  $qty_chk=$request->packageqty_chk;
  }
  else
  {
    $qty_chk=0;
  }
  if($request->PrintingFinishingProcessName!="")
  {
  $printingfinishingprocess=$request->PrintingFinishingProcessName; 
  }
  else
  {
  $printingfinishingprocess=0;    
  }
   if($request->PackagingStickers_ProductionRegions1!="")
      {
      $PackagingStickers_ProductionRegions1=$request->PackagingStickers_ProductionRegions1;
      }
      else
      {
      $PackagingStickers_ProductionRegions1=0;
      }
      if($request->PackagingStickers_ProductionRegions2!="")
      {
      $PackagingStickers_ProductionRegions2=$request->PackagingStickers_ProductionRegions2;
      }
      else
      {
      $PackagingStickers_ProductionRegions2=0;
      }
      if($request->PackagingStickers_ProductionRegions3!="")
      {
      $PackagingStickers_ProductionRegions3=$request->PackagingStickers_ProductionRegions3;
      }
      else
      {
      $PackagingStickers_ProductionRegions3=0;
      }
            
          if($request->uniquefactory_packagingstickers1!="")
      {
        //echo "EWnterd"; exit;
      $uniquefactory_packagingstickers1=$request->uniquefactory_packagingstickers1;
      $uniquefactory_packagingstickers1 = implode(",", $uniquefactory_packagingstickers1);
      //print_r($uniquefactory_packagingstickers1);exit;
      $uniquefactory_packagingstickers1details=$uniquefactory_packagingstickers1;
      
      }
      else
      {
        $uniquefactory_packagingstickers1details=0;
      }
      //echo "test".$uniquefactory_packagingstickers1details;
      //print_r($request->uniquefactory_packagingstickers1); exit;
      
        if($request->uniquefactory_packagingstickers2!="")
      {
      $uniquefactory_packagingstickers2=$request->uniquefactory_packagingstickers2;
      $uniquefactory_packagingstickers2 = implode(",", $uniquefactory_packagingstickers2);
      $uniquefactory_packagingstickers2details=$uniquefactory_packagingstickers2;
      }
      else
      {
        $uniquefactory_packagingstickers2details=0;
      }
      
        if($request->uniquefactory_packagingstickers3!="")
      {
      $uniquefactory_packagingstickers3=$request->uniquefactory_packagingstickers3;
      $uniquefactory_packagingstickers3 = implode(",", $uniquefactory_packagingstickers3);
      $uniquefactory_packagingstickers3details=$uniquefactory_packagingstickers3;
      }
      else
      {
        $uniquefactory_packagingstickers3details=0;
      }
      if($request->Package_PrintingFinishingProcess!="")
      {
        $Package_PrintingFinishingProcess=$request->Package_PrintingFinishingProcess;
      }
      else
      {
        $Package_PrintingFinishingProcess=0;
      }
      
	  if($request->Package_PrintingFinishingProcess!="")
			{
				//$Package_PrintingFinishingProcess=$request->Package_PrintingFinishingProcess;
			$Package_PrintingFinishingProcess=$request->Package_PrintingFinishingProcess;	
			$checkpackageValue = implode(",",$Package_PrintingFinishingProcess);
			$Package_PrintingFinishingProcess=$checkpackageValue;
			}
			else
			{
				$Package_PrintingFinishingProcess=0;
			}
			
			//echo "factory1details".$uniquefactory_packagingstickers1details;
			 if($request->package_thickness!="")
			{
			   $package_thickness=$request->package_thickness;
			   if($package_thickness=="pt")
			   {
				 $package_pt="pt";
				 $package_gms="";
				 $package_mm="";
				 
				   
			   }
			   elseif($package_thickness=="gms")
			   {
				 $package_pt="";
				 $package_gms="gms";
				 $package_mm="";
				   
			   }
			  elseif($package_thickness=="mm")
			   {
				 $package_pt="";
				 $package_gms="";
				 $package_mm="mm";
				   
			   }
			 	
				
			}
      //echo "factory1details".$uniquefactory_packagingstickers1details;
  
  if($request->packagingeditID!="")
  {
    
    //echo "packagingstickersid"; exit;
    
    //echo "productgroup".$productgroupid; exit;
   $productboxesupdations=DB::select('call sp_CRUDpackagingstickers(3,'.$request->packagingeditID.','.$customerid.',
     '.$productid.',
     '.$productgroupid.',
     '.$productsubgroupid.',
  '.$request->PackagingStickersTypes.',
  "'.$request->Package_RawMaterial.'",
  '.$request->Package_PrintType.',
  "'.$request->Package_Cutting.'",
  "'.$Package_PrintingFinishingProcess.'",
  "'.$request->Package_QualityReference.'",
  '.$qty_chk.',
  '.$request->PackageThickness.',
   "'.$package_pt.'",
     "'.$package_gms.'",
     "'.$package_mm.'",
  "'.$request->package_Width.'",
  "'.$request->package_Length.'",
  "'.$request->TypeofAdhesive.'",
  "'.$request->Shape.'",  
  '.$cmyk.',
  "'.$request->packageprint_color1.'",
  "'.$request->packageprint_color2.'",
  "'.$request->packageprint_color3.'",
  "'.$request->packageprint_color4.'",
  "'.$request->packageprint_color5.'",
  "'.$request->packageprint_color6.'",
  "'.$request->packageprint_color7.'",
  "'.$request->packageprint_color8.'",
  0,
  "'.$request->Package_UniqueProductCode.'",
  '.$PackagingStickers_ProductionRegions1.',
  "'.$uniquefactory_packagingstickers1details.'",
  '.$PackagingStickers_ProductionRegions2.',
  "'.$uniquefactory_packagingstickers2details.'",
  '.$PackagingStickers_ProductionRegions3.',
  "'.$uniquefactory_packagingstickers3details.'",
  "'.$request->Package_StatusName.'",
  0,
  "'.$imgInp_filename.'",
  0)');
    
    //echo "packagingstickers update"; echo "uniquefactory3".$uniquefactory_packagingstickers3details;exit;
    
  }
  
     
  }
  
    
    $request->session()->flash('success', 'Product Item List Updated successfully.'); 
     
      return redirect(url(route('user.developmentlistview'))); 
    
    
    
     
      }
	   public function dowloadpdfviewdevelopment(Request $request,$id,$typeid)
   {
       $user = Auth::user();

       $usertype = UserType::where('id', '=', $user->userTypeID)->first();

       $productid=$id;

       $productdetails = ProductDetails::where('id','=',$id)->first();

       $customers=App\Customers::where('id','=',$productdetails->CustomerID)->first();

        $status=App\Status::where('id','=',$productdetails->status)->first();
		
		  $typeiddetails=$typeid; 
	   
	   if($typeiddetails==0)
	   {
	   
	   $boxesdetails=Boxes::where('ProductID','=',$productid)->where('status','=',1)->first();
	
	   }
	    elseif($typeiddetails==1)
	   {
	   
	  $hookdetails=Hook::where('ProductID','=',$productid)->where('status','=',1)->first();
	   }
	    elseif($typeiddetails==2)
	   {
	 $tissuepaperdetails=Tissuepaper::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	   }
	  elseif($typeiddetails==3)
	   {
	   $packagingstickersdetails=PackagingStickers::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	   }
	   elseif($typeiddetails==4)
	   {
		$hangtagsdetails=HangTags::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	    //echo "hangtagsdetails"; exit;
	   }
	    elseif($typeiddetails==5)
	   {
		$tapesdetails=Tapes::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
		//echo "tapesdetails"; exit;
	   }
	   elseif($typeiddetails==6)
	   {
		$zipperdetails=ZipperPullers::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
		//echo "zipperpullers"; exit;
	   }
		elseif($typeiddetails==7)
	   {
		$wovendetails=Woven::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
		
		
	   }
		/*vidhya:09-04-2018*/
		 elseif($typeiddetails==8)
     {
     $heatdetails=HeatTransfer::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
    
     }
     elseif($typeiddetails==9)
     {
    $printedlabeldetails=PrintedLabel::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
    
     }
		
		
		
		


      /* $boxesdetails=Boxes::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
       
     
      $hookdetails=Hook::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
      
      $tissuepaperdetails=Tissuepaper::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
      
      $packagingstickersdetails=PackagingStickers::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();*/
	  
      

  $path=storage_path();
  $pdfimage="";
$pdf=PDF::loadView('users.view_pdf_download');
    $pdf->setPaper('a4', 'portrait');
             $pdfimage=PDF::loadView('users.view_Itemlistpdf_download',compact('user','productdetails','customers','status','usertype','boxesdetails','hookdetails','tissuepaperdetails','packagingstickersdetails','hangtagsdetails','zipperdetails','tapesdetails','wovendetails','heatdetails','printedlabeldetails'));    

             //$pdfimage->download($path.'/app/data/product/'.'downloadfile.pdf'); 

             return $pdfimage->download('pdfview.pdf');
			 //return $pdfimage->stream('pdfview.pdf');

             // return back();

   }


      public function updateboxitemlist(Request $request)
  {
    
    
    
    $user = Auth::user();
    $usertype = UserType::where('id', '=', $user->userTypeID)->first();
    $customerid=$request->customerid;
    $productid=Session::get('productlastrecordid');
    
    if($request->ProductionRegions1!="")
    {
    $productionregion1=$request->ProductionRegions1;
    }
    else
    {
    $productionregion1=0;
    }
    if($request->ProductionRegions2!="")
    {
    $productionregion2=$request->ProductionRegions2;
    }
    else
    {
    $productionregion2=0;
    }
    if($request->ProductionRegions3!="")
    {
    $productionregion3=$request->ProductionRegions3;
    }
    else
    {
    $productionregion3=0;
    }

  if($request->uniquefactory1!="")
    {
    $uniquefactory1=$request->uniquefactory1;
    $uniquefactory1=implode(",",$uniquefactory1);
    }
    else
    {
      $uniquefactory1=0;
    }
	//Defect: 
         //Name: Bala-Uniquegroup Team
         //Desc. uniqe factory2 details can not array to stirng issue using implode to send data
    if($request->uniquefactory2!="")
    {
    $uniquefactory2=$request->uniquefactory2;
	 $uniquefactory2=implode(",",$uniquefactory2);
    }
    else
    {
      $uniquefactory2=0;
    }
    if($request->uniquefactory3!="")
    {
    $uniquefactory3=$request->uniquefactory3;
	 $uniquefactory3=implode(",",$uniquefactory3);
    }
    else
    {
      $uniquefactory3=0;
    }
  
  //echo "uniquefactory2".$request->uniquefactory2; exit;
  //print_r($request->uniquefactory2); exit;
  //echo $imgInp = Input::all();
  //echo $imgInp = Input::file('imgInp3');
  

  
  //exit;
    
    $path = '/data/product';

        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

     //Defect: 
         //Name: Bala-Uniquegroup Team
         //Desc. add and edit upload Image.
	 
	 
      $imgInp = Input::file('imgInp3');
      //$imgInp=$request->imgInp3;

      
		  if($imgInp!='')
                {
             		$destinationPath = $path;
      				$imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());      				

				}
				else{
				if($request->selectimage !='')
				{
                
                $imgInp_filename=$request->selectimage;
                
                }
				else
				{
					if($request->editID!=''){
							$imgInp_filename=$request->existingboximage;
					}else{
							$imgInp_filename= '';
					}
				}
			}
    
   // echo $imgInp_filename; exit;
   //echo $request->qty_chk;exit;
   //echo $request->Hook;exit;
  // echo $cmyk=$request->printcolor; exit;
  
  
  //exit;
   
   /*if($request->printcolor!="")
   {
   $cmyk=$request->printcolor;
   }
   else
   {
     $cmyk=0;
   }*/
   
  if($request->cmykyes!="")
  {
  $cmyk=$request->cmykyes;
  }
  else
  {
  $cmyk=0;
  }
  
  
  
  if($request->Hook!="")
  {
  $hook=$request->Hook;
  }
  else
  {
    $hook=0;
  }
  
    
  if($request->TissuePaper!="")
  {
  $tissue_paper=$request->TissuePaper;
  }
  else
  {
  $tissue_paper=0;
  }
  
  if($request->PackagingStickers!="")
  {
  $packaging_stickers=$request->PackagingStickers;
  }
  else
  {
  $packaging_stickers=0;
  }
  //echo $packaging_stickers;exit;
  
  if($request->pt!="")
  {
  $pt=$request->pt;
  }
  else
  {
  $pt=0;
  }
  if($request->gms!="")
  {
  $gms=$request->gms;
  }
  else
  {
  $gms=0;
  }
    if($request->mm!="")
  {
  $mm=$request->mm;
  }
  else
  {
  $mm=0;
  }
  
  if($request->qty_chk!="")
  {
  $qty_chk=$request->qty_chk;
  }
  else
  {
    $qty_chk=0;
  }
  if($request->PrintingFinishingProcessName!="")
  {
  $printingfinishingprocess=$request->PrintingFinishingProcessName; 
  }
  else
  {
  $printingfinishingprocess=0;    
  }
  if($request->PricingMethod!="")
  {
  $PricingMethod=$request->PricingMethod;
  }
  else
  {
  $PricingMethod=0; 
  }
  if($request->UnitofMeasurement!="")
  {
  $UnitofMeasurement=$request->UnitofMeasurement;
  }
  else
  {
  $UnitofMeasurement=0; 
  }
  
  if($request->Currency!="")
  {
   $Currency=$request->Currency;
  }
  else
  {
  $Currency=0;
  }
  
  /*Defect: 
          Name: Bala-Uniquegroup Team
          Desc.Client meeting(02-03-18) updations*/
  
  if($request->boxes_thickness!="")
			{
			   $boxes_thickness=$request->boxes_thickness;
			   if($boxes_thickness=="pt")
			   {
				 $boxes_pt="pt";
				 $boxes_gms="";
				 $boxes_mm="";
				 
				   
			   }
			   elseif($boxes_thickness=="gms")
			   {
				 $boxes_pt="";
				 $boxes_gms="gms";
				 $boxes_mm="";
				   
			   }
			  elseif($boxes_thickness=="mm")
			   {
				 $boxes_pt="";
				 $boxes_gms="";
				 $boxes_mm="mm";
				   
			   }
			 	
				
			}
		  
        
			if($request->boxes_PrintingFinishingProcess!="")
			{
			$boxes_PrintingFinishingProcess=$request->boxes_PrintingFinishingProcess;	
			 $checkBoxValue = implode(",", $boxes_PrintingFinishingProcess);
			$boxes_PrintingFinishingProcess=$checkBoxValue;
			
			}
			else
			{
			$Tissuepaper_PrintingFinishingProcess=0;	
			}
  
  
  if($request->editID!='')
  {
    
  
     $customerid=$request->customerid;
      $productid=$request->productid;
     
    $productboxesupdations=DB::select('call sp_CRUDboxes(2,'.$request->editID.','.$customerid.',
  '.$request->RawMaterial.',
  '.$request->PrintType.',
  '.$request->CuttingName.',
  "'.$boxes_PrintingFinishingProcess.'",
  '.$productid.',
  "'.$hook.'",
  "'.$tissue_paper.'",
  "'.$packaging_stickers.'",
  '.$PricingMethod.',
  '.$UnitofMeasurement.',
  '.$Currency.',
  '.$request->Thickness.',
  "'.$boxes_pt.'",
  "'.$boxes_gms.'",
  "'.$boxes_mm.'",
  "'.$request->qty_ref.'",
  '.$qty_chk.',
  "'.$request->Width.'",
  "'.$request->Height.'",
  "'.$request->Length.'",
  '.$cmyk.',
  "'.$request->print_color1.'",
  "'.$request->print_color2.'",
  "'.$request->print_color3.'",
  "'.$request->print_color4.'",
  "'.$request->print_color5.'",
  "'.$request->print_color6.'",
  "'.$request->print_color7.'",
  "'.$request->print_color8.'",
  '.$productionregion1.',
  "'.$uniquefactory1.'",
  '.$productionregion2.',
  "'.$uniquefactory2.'",
  '.$productionregion3.',
  "'.$uniquefactory3.'",
  "'.$imgInp_filename.'",
  0)');
          
      
    
    
  }
  $request->session()->flash('success', 'Product Item List Updated successfully.'); 
     
      return redirect(url(route('user.developmentlistview'))); 
    
  }

   /* Rajesh:01032018 End */
   
   /*vidhya:duplicate records*/

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
         

		


         if($producttypeid==0)
         {
            
          
            $hookduplicateid= 0;
            $tissueduplicateid= 0;
            $packduplicateid= 0;
            if($duplicaterecord->BoxID!="")
         {
       if($duplicaterecord->BoxID != null && $duplicaterecord->BoxID <> 0)
       {
        $boxduplicatedrecord=DB::select('call sp_CRUDboxes(4,'.$duplicaterecord->BoxID.','.$duplicaterecord->CustomerID.',0,0,0,0,'.$duplicaterecord->id.',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)');
        
        $boxlastduplicateid = Boxes::orderby('id','desc')->first();
        $boxduplicateid= $boxlastduplicateid->id;
      }else
      {
        $boxduplicateid=0;
      }
    }

            $data['boxduplicate'][]=0;
          $productdetails_insert = ProductDetails::create([
     'CustomerID'=>$duplicaterecord->CustomerID,
     'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        'HookID' =>$hookduplicateid,
        'TissuePaperID' =>$tissueduplicateid,
        'PackagingStickersID' =>$packduplicateid,
        'BoxID' => $boxduplicateid,
        'SeasonID'=>NULL,
        'ProductStatusID'=>1,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethod'=>NULL,
        'CurrencyID'=>NULL,
        'UnitofMeasurementID'=>NULL,
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
        'CustomerProductName'=>NULL,
        'CustomerProductCode'=>NULL,
        'UniqueProductCode'=>NULL,
                'Description'=>NULL,
                'StyleNumber'=>NULL,
                'Version'=>1,
        'SampleandQuote'=>$duplicaterecord->SampleandQuote,
                'MinimumOrderQuantity'=>NULL,
                'MinimumOrderValue'=>NULL,
                'PackSize'=>NULL,
                'SellingPrice'=>NULL,
                'SampleRequestedDate' =>NULL,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>NULL,
        'QuantityMOQ'=>NULL,
        'Cost'=>NULL,
        'Suggested_price'=>NULL,
        'Margin'=>NULL,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'SampleLeadTime' =>NULL,
                'ProductionLeadTime'=>NULL,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>NULL,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
        'ExWorks'=>NULL,
        'FOB'=>NULL,
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
			
			//$productdetails = Boxes::where('id','=',$duplicaterecord->HookID)->first();

       /* $hookduplicatedrecord=DB::select('call sp_CRUDhooks(4,"'.$duplicaterecord->HookID.'",'.$duplicaterecord->CustomerID.','.$duplicaterecord->CustomerID.',0,'.$duplicaterecord->ProductGroupID.','.$duplicaterecord->ProductSubGroupID.',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$versihook.'",0,0,0)');*/
	   
	    $hookduplicatedrecord=DB::select('call sp_CRUDhooks(4,"'.$duplicaterecord->HookID.'",'.$duplicaterecord->CustomerID.',0,'.$duplicaterecord->ProductGroupID.','.$duplicaterecord->ProductSubGroupID.',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$versihook.'",0,0,0)');
		
		
		
        $hooklastduplicateid = Hook::orderby('id','desc')->first();
        $hookduplicateid=$hooklastduplicateid->id;
        $tissueduplicateid = 0;
        $packduplicateid = 0;

         }else
         {
            $hookduplicateid=0;
         }
     }
            $data['boxduplicate'][]=1;
          $productdetails_insert = ProductDetails::create(['CustomerID'=>$duplicaterecord->CustomerID,
		  'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
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
				'QuantityMOQ'=>$duplicaterecord->QuantityMOQ,
				'Cost'=>$duplicaterecord->Cost,
				'Suggested_price'=>$duplicaterecord->Suggested_price,
				'Margin'=>$duplicaterecord->Margin,
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

        $tissueduplicatedrecord=DB::select('call sp_CRUDtissuepaper(4,"'.$duplicaterecord->TissuePaperID.'",'.$duplicaterecord->CustomerID.',0,'.$duplicaterecord->ProductGroupID.','.$duplicaterecord->ProductSubGroupID.',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$hookve.'",0,0)');
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
		  'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
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
				'QuantityMOQ'=>$duplicaterecord->QuantityMOQ,
				'Cost'=>$duplicaterecord->Cost,
				'Suggested_price'=>$duplicaterecord->Suggested_price,
				'Margin'=>$duplicaterecord->Margin,
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

         //Vidhya:PHP
         //HangTags Duplicate function
         elseif($producttypeid==4)
         {
          if($duplicaterecord->HangTagsID!= "")
        {
          if($duplicaterecord->HangTagsID!= null && $duplicaterecord->HangTagsID <> 0)
          {
            $hangprod = HangTags::where('id','=',$hookid)->first();
            //printf($hangprod);exit;

            $hangtagsduplicatedrecord=DB::select('call sp_CRUDhangtags(1,'.$duplicaterecord->HangTagsID.')');
            $hangtaglastduplicateid = HangTags::orderby('id','desc')->first();
            $hangduplicateid= $hangtaglastduplicateid->id;
          }else
          {
            $hangduplicateid=0;
          }
        }
            $data['boxduplicate'][]=4;
          $productdetails_insert = ProductDetails::create([
     'CustomerID'=>$duplicaterecord->CustomerID,
     'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        'HookID' =>0,
        'TissuePaperID' =>0,
        'PackagingStickersID' =>0,
        'BoxID' => 0,
        'HangTagsID' =>$hangduplicateid,
        'SeasonID'=>NULL,
        'ProductStatusID'=>1,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethod'=>NULL,
        'CurrencyID'=>NULL,
        'UnitofMeasurementID'=>NULL,
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
        'CustomerProductName'=>NULL,
        'CustomerProductCode'=>NULL,
        'UniqueProductCode'=>NULL,
                'Description'=>NULL,
                'StyleNumber'=>NULL,
                'Version'=>1,
        'SampleandQuote'=>$duplicaterecord->SampleandQuote,
                'MinimumOrderQuantity'=>NULL,
                'MinimumOrderValue'=>NULL,
                'PackSize'=>NULL,
                'SellingPrice'=>NULL,
                'SampleRequestedDate' =>NULL,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>NULL,
        'QuantityMOQ'=>NULL,
        'Cost'=>NULL,
        'Suggested_price'=>NULL,
        'Margin'=>NULL,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'SampleLeadTime' =>NULL,
                'ProductionLeadTime'=>NULL,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>NULL,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
        'ExWorks'=>NULL,
        'FOB'=>NULL,
                'status'=>1
                ]);
          $version_old=$hangprod->Version;
         $version_new=$hangtaglastduplicateid->Version;

         }
         //vidhya:php
         //Tapes duplicate function
         elseif($producttypeid==5)
         {
          if($duplicaterecord->TapesID!= null && $duplicaterecord->TapesID <> 0)
          {
            $tapeprod = Tapes::where('id','=',$hookid)->first();
            //printf($hangprod);exit;

            $tapesduplicatedrecord=DB::select('call sp_CRUDtapes(1,'.$duplicaterecord->TapesID.')');
            $tapeslastduplicateid = Tapes::orderby('id','desc')->first();
            $tapesduplicateid= $tapeslastduplicateid->id;
          }else
          {
            $tapesduplicateid=0;
          }
            $data['boxduplicate'][]=5;
          $productdetails_insert = ProductDetails::create([
     'CustomerID'=>$duplicaterecord->CustomerID,
     'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        'HookID' =>0,
        'TissuePaperID' =>0,
        'PackagingStickersID' =>0,
        'BoxID' => 0,
        'HangTagsID' =>0,
        'TapesID' =>$tapesduplicateid,
        'SeasonID'=>NULL,
        'ProductStatusID'=>1,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethod'=>NULL,
        'CurrencyID'=>NULL,
        'UnitofMeasurementID'=>NULL,
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
        'CustomerProductName'=>NULL,
        'CustomerProductCode'=>NULL,
        'UniqueProductCode'=>NULL,
                'Description'=>NULL,
                'StyleNumber'=>NULL,
                'Version'=>1,
        'SampleandQuote'=>$duplicaterecord->SampleandQuote,
                'MinimumOrderQuantity'=>NULL,
                'MinimumOrderValue'=>NULL,
                'PackSize'=>NULL,
                'SellingPrice'=>NULL,
                'SampleRequestedDate' =>NULL,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>NULL,
        'QuantityMOQ'=>NULL,
        'Cost'=>NULL,
        'Suggested_price'=>NULL,
        'Margin'=>NULL,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'SampleLeadTime' =>NULL,
                'ProductionLeadTime'=>NULL,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>NULL,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
        'ExWorks'=>NULL,
        'FOB'=>NULL,
                'status'=>1
                ]);
          $version_old=$tapeprod->Version;
         $version_new=$tapeslastduplicateid->Version;

         }
         //vidhya:php
         //Tapes duplicate function
         elseif($producttypeid==6)
         {
          if($duplicaterecord->ZipperPullersID!= null && $duplicaterecord->ZipperPullersID <> 0)
          {
            $zippprod = ZipperPullers::where('id','=',$hookid)->first();
            //printf($hangprod);exit;

            $zipperduplicatedrecord=DB::select('call sp_CRUDzipperpullers(1,'.$duplicaterecord->ZipperPullersID.')');
            $zipperlastduplicateid = ZipperPullers::orderby('id','desc')->first();
            $zipperduplicateid= $zipperlastduplicateid->id;
          }else
          {
            $zipperduplicateid=0;
          }
            $data['boxduplicate'][]=6;
          $productdetails_insert = ProductDetails::create([
     'CustomerID'=>$duplicaterecord->CustomerID,
     'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        'HookID' =>0,
        'TissuePaperID' =>0,
        'PackagingStickersID' =>0,
        'BoxID' => 0,
        'HangTagsID' =>0,
        'TapesID' =>0,
        'ZipperPullersID' =>$zipperduplicateid,
        'SeasonID'=>NULL,
        'ProductStatusID'=>1,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethod'=>NULL,
        'CurrencyID'=>NULL,
        'UnitofMeasurementID'=>NULL,
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
        'CustomerProductName'=>NULL,
        'CustomerProductCode'=>NULL,
        'UniqueProductCode'=>NULL,
                'Description'=>NULL,
                'StyleNumber'=>NULL,
                'Version'=>1,
        'SampleandQuote'=>$duplicaterecord->SampleandQuote,
                'MinimumOrderQuantity'=>NULL,
                'MinimumOrderValue'=>NULL,
                'PackSize'=>NULL,
                'SellingPrice'=>NULL,
                'SampleRequestedDate' =>NULL,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>NULL,
        'QuantityMOQ'=>NULL,
        'Cost'=>NULL,
        'Suggested_price'=>NULL,
        'Margin'=>NULL,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'SampleLeadTime' =>NULL,
                'ProductionLeadTime'=>NULL,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>NULL,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
        'ExWorks'=>NULL,
        'FOB'=>NULL,
                'status'=>1
                ]);
          $version_old=$zippprod->Version;
         $version_new=$zipperlastduplicateid->Version;

         }
         //vidhya:09-04-2018
         //Heat Transfer duplicate function
         elseif($producttypeid==8)
         {
          if($duplicaterecord->HeatTransferLabelID!= null && $duplicaterecord->HeatTransferLabelID <> 0)
          {
            $heatprod = HeatTransfer::where('id','=',$hookid)->first();
            //printf($hangprod);exit;

            $heatduplicatedrecord=DB::select('call sp_CRUDheattransfer(1,'.$duplicaterecord->HeatTransferLabelID.')');
            $heatlastduplicateid = HeatTransfer::orderby('id','desc')->first();
            $heatduplicateid= $heatlastduplicateid->id;
          }else
          {
            $heatduplicateid=0;
          }
            $data['boxduplicate'][]=8;
          $productdetails_insert = ProductDetails::create([
     'CustomerID'=>$duplicaterecord->CustomerID,
     'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        'HookID' =>0,
        'TissuePaperID' =>0,
        'PackagingStickersID' =>0,
        'BoxID' => 0,
        'HangTagsID' =>0,
        'TapesID' =>0,
        'ZipperPullersID' =>0,
        'PrintedLabelID' =>0,
        'HeatTransferLabelID' => $heatduplicateid,
        'SeasonID'=>NULL,
        'ProductStatusID'=>1,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethod'=>NULL,
        'CurrencyID'=>NULL,
        'UnitofMeasurementID'=>NULL,
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
        'CustomerProductName'=>NULL,
        'CustomerProductCode'=>NULL,
        'UniqueProductCode'=>NULL,
                'Description'=>NULL,
                'StyleNumber'=>NULL,
                'Version'=>1,
        'SampleandQuote'=>$duplicaterecord->SampleandQuote,
                'MinimumOrderQuantity'=>NULL,
                'MinimumOrderValue'=>NULL,
                'PackSize'=>NULL,
                'SellingPrice'=>NULL,
                'SampleRequestedDate' =>NULL,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>NULL,
        'QuantityMOQ'=>NULL,
        'Cost'=>NULL,
        'Suggested_price'=>NULL,
        'Margin'=>NULL,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'SampleLeadTime' =>NULL,
                'ProductionLeadTime'=>NULL,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>NULL,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
        'ExWorks'=>NULL,
        'FOB'=>NULL,
                'status'=>1
                ]);
          $version_old=$heatprod->Version;
         $version_new=$heatlastduplicateid->Version;

         }
          //vidhya:09-04-2018
         //Heat Transfer duplicate function
         elseif($producttypeid==9)
         {
          if($duplicaterecord->PrintedLabelID!= null && $duplicaterecord->PrintedLabelID <> 0)
          {
            $printedprod = PrintedLabel::where('id','=',$hookid)->first();
            //printf($hangprod);exit;

            $printedduplicatedrecord=DB::select('call sp_CRUDprintedlabel(1,'.$duplicaterecord->PrintedLabelID.')');
            $printedlastduplicateid = PrintedLabel::orderby('id','desc')->first();
            $printedduplicateid= $printedlastduplicateid->id;
          }else
          {
            $printedduplicateid=0;
          }
            $data['boxduplicate'][]=9;
          $productdetails_insert = ProductDetails::create([
     'CustomerID'=>$duplicaterecord->CustomerID,
     'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        'HookID' =>0,
        'TissuePaperID' =>0,
        'PackagingStickersID' =>0,
        'BoxID' => 0,
        'HangTagsID' =>0,
        'TapesID' =>0,
        'ZipperPullersID' =>0,
        'PrintedLabelID' =>$printedduplicateid,
        'HeatTransferLabelID' => 0,
        'SeasonID'=>NULL,
        'ProductStatusID'=>1,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethod'=>NULL,
        'CurrencyID'=>NULL,
        'UnitofMeasurementID'=>NULL,
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
        'CustomerProductName'=>NULL,
        'CustomerProductCode'=>NULL,
        'UniqueProductCode'=>NULL,
                'Description'=>NULL,
                'StyleNumber'=>NULL,
                'Version'=>1,
        'SampleandQuote'=>$duplicaterecord->SampleandQuote,
                'MinimumOrderQuantity'=>NULL,
                'MinimumOrderValue'=>NULL,
                'PackSize'=>NULL,
                'SellingPrice'=>NULL,
                'SampleRequestedDate' =>NULL,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>NULL,
        'QuantityMOQ'=>NULL,
        'Cost'=>NULL,
        'Suggested_price'=>NULL,
        'Margin'=>NULL,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'SampleLeadTime' =>NULL,
                'ProductionLeadTime'=>NULL,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>NULL,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
        'ExWorks'=>NULL,
        'FOB'=>NULL,
                'status'=>1
                ]);
          $version_old=$printedprod->Version;
         $version_new=$printedlastduplicateid->Version;

         }
         //vidhya:09-04-2018
         //Woven duplicate function
         elseif($producttypeid==7)
         {
          if($duplicaterecord->WovenLabelID!= null && $duplicaterecord->WovenLabelID <> 0)
          {
            $wovenprod = Woven::where('id','=',$hookid)->first();
            //printf($hangprod);exit;

            $wovenduplicatedrecord=DB::select('call sp_CRUDwovenlabel(1,'.$duplicaterecord->WovenLabelID.')');
            $wovenlastduplicateid = Woven::orderby('id','desc')->first();
            $wovenduplicateid= $wovenlastduplicateid->id;
          }else
          {
            $wovenduplicateid=0;
          }
            $data['boxduplicate'][]=9;
          $productdetails_insert = ProductDetails::create([
     'CustomerID'=>$duplicaterecord->CustomerID,
     'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
        'ProductGroupID' => $duplicaterecord->ProductGroupID,
        'ProductSubGroupID'=>$duplicaterecord->ProductSubGroupID,
        'HookID' =>0,
        'TissuePaperID' =>0,
        'PackagingStickersID' =>0,
        'BoxID' => 0,
        'HangTagsID' =>0,
        'TapesID' =>0,
        'ZipperPullersID' =>0,
        'WovenLabelID' =>$wovenduplicateid,
        'PrintedLabelID' =>0,
        'HeatTransferLabelID' => 0,
        'SeasonID'=>NULL,
        'ProductStatusID'=>1,
        'ProductProcessID'=>$duplicaterecord->ProductProcessID,
        'ProductionRegionID1'=>$duplicaterecord->ProductionRegionID1,
        'ProductionRegionID2'=>$duplicaterecord->ProductionRegionID2,
        'ProductionRegionID3'=>$duplicaterecord->ProductionRegionID3,
        'ProductionRegionID4'=>$duplicaterecord->ProductionRegionID4,
        'ProductionRegionID5'=>$duplicaterecord->ProductionRegionID5,
        'ProductionRegionID6'=>$duplicaterecord->ProductionRegionID6,
        'ProductionRegionID7'=>$duplicaterecord->ProductionRegionID7,
        'ProductionRegionID8'=>$duplicaterecord->ProductionRegionID8,
        'PricingMethod'=>NULL,
        'CurrencyID'=>NULL,
        'UnitofMeasurementID'=>NULL,
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
        'CustomerProductName'=>NULL,
        'CustomerProductCode'=>NULL,
        'UniqueProductCode'=>NULL,
                'Description'=>NULL,
                'StyleNumber'=>NULL,
                'Version'=>1,
        'SampleandQuote'=>$duplicaterecord->SampleandQuote,
                'MinimumOrderQuantity'=>NULL,
                'MinimumOrderValue'=>NULL,
                'PackSize'=>NULL,
                'SellingPrice'=>NULL,
                'SampleRequestedDate' =>NULL,
                'SampleRequestNumber' =>$duplicaterecord->SampleRequestNumber,
                'NumberOfSamplesRequired' =>NULL,
        'QuantityMOQ'=>NULL,
        'Cost'=>NULL,
        'Suggested_price'=>NULL,
        'Margin'=>NULL,
                'Artworkupload' =>$duplicaterecord->Artworkupload,
                'QuoteRequiredchk' =>$duplicaterecord->QuoteRequiredchk,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'SampleLeadTime' =>NULL,
                'ProductionLeadTime'=>NULL,
                'RemarksInstructions' =>$duplicaterecord->RemarksInstructions,
                'QuoteRequired' =>$duplicaterecord->QuoteRequired,
                'ReferenceFileUpload' =>$duplicaterecord->ReferenceFileUpload,
                'QualityReference' =>$duplicaterecord->QualityReference,
                'Projection' =>NULL,
                'UniqueFactory1Inventory' =>$duplicaterecord->UniqueFactory1Inventory,
                'UniqueFactory2Inventory' =>$duplicaterecord->UniqueFactory2Inventory,
                'Maximumpiecesonstock' =>$duplicaterecord->Maximumpiecesonstock,
                'Minimumpiecesonstock' =>$duplicaterecord->Minimumpiecesonstock,
        'ExWorks'=>NULL,
        'FOB'=>NULL,
                'status'=>1
                ]);
          $version_old=$wovenprod->Version;
         $version_new=$wovenlastduplicateid->Version;

         }
         elseif ($producttypeid==3) {

            if($duplicaterecord->PackagingStickersID!= "")
        {


         if($duplicaterecord->PackagingStickersID!= null && $duplicaterecord->PackagingStickersID <> 0)
         {
          $packprod = PackagingStickers::where('id','=',$hookid)->first();
          $hookve = 1;

        $packduplicatedrecord=DB::select('call sp_CRUDpackagingstickers(4,"'.$duplicaterecord->PackagingStickersID.'",'.$duplicaterecord->CustomerID.',0,'.$duplicaterecord->ProductGroupID.','.$duplicaterecord->ProductSubGroupID.','.$packprod->TypeofStickerID.','.$packprod->MaterialID.','.$packprod->PrintTypeID.','.$packprod->CuttingID.',"'.$packprod->PrintingFinishingProcessID.'",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,"'.$hookve.'",0,0)');
		
		
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
		    'CustomerWareHouseID'=>$duplicaterecord->CustomerWareHouseID,
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
				'QuantityMOQ'=>$duplicaterecord->QuantityMOQ,
				'Cost'=>$duplicaterecord->Cost,
				'Suggested_price'=>$duplicaterecord->Suggested_price,
				'Margin'=>$duplicaterecord->Margin,
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
		  //Defect:
         //Name: Bala-Uniquegroup Team
         //Desc. Update the Product id to box, hook,tissuepaper and packagingstickers
		 
		  $productdetails_get = ProductDetails::orderby('id','desc')->first();
		   $hooklastduplicateid = Hook::orderby('id','desc')->first();
		   if($hooklastduplicateid!="")
		   {
           $hookduplicateid=$hooklastduplicateid->id;
		   }
		   $packalastduplicateid = PackagingStickers::orderby('id','desc')->first();
		   if($packalastduplicateid!="")
		   {
           $packduplicateid= $packalastduplicateid->id;
		   }
		   
		  if($producttypeid==0)
      {
		  if($boxduplicateid!="" || $boxduplicateid!=NULL || $boxduplicateid<>0)
		  {
		 $productdetailsupdate=DB::table('boxes')
            ->where('id',$boxduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
			]);
		  }
    }
           //hook updations
    if($producttypeid==1)
      {
		    if($hookduplicateid!="" || $hookduplicateid!=NULL || $hookduplicateid<>0)
		  {
			 
		   $productdetailsupdate=DB::table('hooks')
            ->where('id',$hookduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
			]);
		  }
    }
		  //tissuepaper
    if($producttypeid==2)
      {
		   if($tissueduplicateid!="" || $tissueduplicateid!=NULL || $tissueduplicateid<>0)
		  {
		   $productdetailsupdate=DB::table('tissuepaper')
            ->where('id',$tissueduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
			]);
		  }
    }
		  //packagingstickers
    if($producttypeid==3)
      {
		    if($packduplicateid!="" || $packduplicateid!=NULL || $packduplicateid<>0)
		  {
		   $productdetailsupdate=DB::table('packagingstickers')
            ->where('id',$packduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
			]);
		  }
    }
      //HangTags
    if($producttypeid==4)
      {
        if($hangduplicateid!="" || $hangduplicateid!=NULL || $hangduplicateid<>0)
      {
       $productdetailsupdate=DB::table('hangtags')
            ->where('id',$hangduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
      ]);
      }
    }
    if($producttypeid==5)
      {
      if($tapesduplicateid!="" || $tapesduplicateid!=NULL || $tapesduplicateid<>0)
      {
       $productdetailsupdate=DB::table('tapes')
            ->where('id',$tapesduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
      ]);
      }
    }
    if($producttypeid==6)
      {
      if($zipperduplicateid!="" || $zipperduplicateid!=NULL || $zipperduplicateid<>0)
      {
       $productdetailsupdate=DB::table('zipperpullers')
            ->where('id',$zipperduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
      ]);
      }
    }
    if($producttypeid==8)
      {
      if($heatduplicateid!="" || $heatduplicateid!=NULL || $heatduplicateid<>0)
      {
       $productdetailsupdate=DB::table('heattransfer')
            ->where('id',$heatduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
      ]);
      }
    }
    if($producttypeid==9)
      {
      if($printedduplicateid!="" || $printedduplicateid!=NULL || $printedduplicateid<>0)
      {
       $productdetailsupdate=DB::table('labelsprinted')
            ->where('id',$printedduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
      ]);
      }
    }
    if($producttypeid==7)
      {
      if($wovenduplicateid!="" || $wovenduplicateid!=NULL || $wovenduplicateid<>0)
      {
       $productdetailsupdate=DB::table('labelswoven')
            ->where('id',$wovenduplicateid)
            ->update(['ProductID' =>$productdetails_get->id,
      ]);
      }
    }
         

        

         $data[] = ['duplicate_id'=>$productdetails_insert->id,'edit_id'=>$id,'version_new'=>$version_new,'version_old'=>$version_old];
         $data['processid'][] = '0'.','.$producttypeid;
         $data['processrecord'][] = $productdetails_insert->id.','.'0';
                
        return Response::json($data);

       
    }
    /*vidhya:duplicate records*/
 

  

}

?>