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
       $product_hook = ProductDetails::where('id','=',$productid)->first();
       $deleteproduct = $product_hook->HookID;
       $result= explode(",", $deleteproduct);
       $store = '';
       foreach($result as $val)
       {
            if($val == $id)
            {
                
            }else
            {

                $store.=$val.',';
                echo "flase";
            }
       }
       $processhookid = rtrim($store,',');
       
       $development_update = DB::table('productdetails')->where('id', $productid)->update(array('HookID' => $processhookid));
       $developmentlist_delete = Hook::where('id','=',$id)->first();
   
      $developmentlist_delete->delete();

        $request->session()->flash('failure', 'Development Product deleted successfully.');     

        return redirect(url(route('user.developmentlistview')));   
}

public function deletetissue(Request $request ,$id, $producttid)
{
    
  
       $user = Auth::user();

       $product_tissue = ProductDetails::where('id','=',$producttid)->first();
       $deleteproduct = $product_tissue->TissuePaperID;
       $result= explode(",", $deleteproduct);
       $store = '';
       foreach($result as $val)
       {
            if($val == $id)
            {
                
            }else
            {

                $store.=$val.',';
                echo "flase";
            }
       }
       $processtissueid = rtrim($store,',');
       $development_update = DB::table('productdetails')->where('id', $producttid)->update(array('TissuePaperID' => $processtissueid));
       $developmentlist_delete = Tissuepaper::where('id','=',$id)->first();
       
     
      $developmentlist_delete->delete();




        $request->session()->flash('failure', 'Development Product Tissuepaper deleted successfully.');     

        return redirect(url(route('user.developmentlistview')));   
}
public function deletepackage(Request $request ,$id, $productpid)
{
    //echo "dfghg";exit;
  
       $user = Auth::user();
       $product_pack = ProductDetails::where('id','=',$productpid)->first();
       $deleteproduct = $product_pack->PackagingStickersID;
       $result= explode(",", $deleteproduct);
       $store = '';
       foreach($result as $val)
       {
            if($val == $id)
            {
                
            }else
            {

                $store.=$val.',';
                echo "flase";
            }
       }
       $processpackid = rtrim($store,',');
       $development_update = DB::table('productdetails')->where('id', $productpid)->update(array('PackagingStickersID' => $processpackid));
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

/* Rajesh:01032018  */
   public function editdevelopmentitemlist(Request $request, $id, $typeid, $processproductid)

   {
    $producttype = $typeid;
    $productview = $processproductid;
  
  $data[]=$id;
    //print_r($producttype);exit;

   $user = Auth::user();

   $usertype = UserType::where('id', '=', $user->userTypeID)->first();

   $productid=$id;

  // echo "test".$vendorid;exit;

   $productdevlopmentlist = ProductDetails::where('id','=',$id)->first();

   $productgroupid=$productdevlopmentlist->ProductGroupID;
   $productsubgroupid=$productdevlopmentlist->ProductSubGroupID;

   //print_r($productdevlopmentlist->CustomerID);exit;
    $customers=App\Customers::where('id','=',$productdevlopmentlist->CustomerID)->first();

    $status=App\Status::where('id','=',$productdevlopmentlist->status)->first();

    $productfields=ProductDevelopmentFields::where('status','=',1)->get();
  $isfound=0;
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
      
    
    $boxesdetails=Boxes::where('ProductID','=',$productid)->where('status','=',1)->first();
   
    
    
    //$hookdetails=Hook::where('ProductID','=',$productid)->where('status','=',1)->first();
    $hookdetails=Hook::where('ProductID','=',$productid)->where('status','=',1)->first();
   
  
    $tissuepaperdetails=Tissuepaper::where('ProductID','=',$productid)->where('status','=',1)->first();
    
    $packagingstickersdetails=PackagingStickers::where('ProductID','=',$productid)->where('status','=',1)->first();



   return view('users.edit_developmentitemlist', compact('user','productdevlopmentlist','customers','status','usertype','producttype','productview','producthookfields','productdevelopmentsubgroupdetails','prddevsubgrouppackagingdetails','boxesdetails','hookdetails','tissuepaperdetails','packagingstickersdetails','productdevelopmentfields','productid'));    

   }

public function updateitemlist(Request $request)
   {
     
     $user = Auth::user();
     $usertype = UserType::where('id', '=', $user->userTypeID)->first();
    $customerid=$request->customerid;
     $productid=$request->productID;
     $productgroupid=$request->ProductGroupID;
     $productsubgroupid=$request->ProductSubGroupID;
   
   
    //echo "productgroupid".$productgroupid;exit;
    
    //echo "hooks".$request->HooksMaterial;
    //echo "tissuepaper".$request->GroundPaperColor;
    
    //echo "tissuepapereditid".$request->tissuepapereditID;
    
    
    
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
              $imgInp_filename=$request->existingimage;
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
     "'.$request->pt.'",
    "'.$request->gms.'",
    "'.$request->mm.'",
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
      }
      else
      {
      $Tissuepaper_PrintingFinishingProcess=0;  
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
     '.$Tissuepaper_PrintingFinishingProcess.',
     "'.$request->Tissuepaper_Thickness.'",
      "'.$request->pt.'",
    "'.$request->gms.'",
    "'.$request->mm.'",
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
  '.$Package_PrintingFinishingProcess.',
  "'.$request->Package_QualityReference.'",
  '.$qty_chk.',
  '.$request->PackageThickness.',
   "'.$request->pt.'",
     "'.$request->gms.'",
     "'.$request->mm.'",
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
    if($request->uniquefactory2!="")
    {
    $uniquefactory2=$request->uniquefactory2;
    }
    else
    {
      $uniquefactory2=0;
    }
    if($request->uniquefactory3!="")
    {
    $uniquefactory3=$request->uniquefactory3;
    }
    else
    {
      $uniquefactory3=0;
    }
  
  
  //echo $imgInp = Input::all();
  //echo $imgInp = Input::file('imgInp3');
  

  
  //exit;
    
    $path = '/data/product';

        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

     
      $imgInp = Input::file('imgInp3');
      //$imgInp=$request->imgInp3;

      
       if($imgInp!='')
                {
                $destinationPath = $path;
              $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());             

        }
        else{
        if($request->selectimage3 !='')
        {
                
                $imgInp_filename= $request->selectimage3;
                
                }
        else
        {
        $imgInp_filename=0;
        }
      } 
    
    
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
  
  
  
  if($request->editID!='')
  {
    
  
     $customerid=$request->customerid;
      $productid=$request->productid;
     
    $productboxesupdations=DB::select('call sp_CRUDboxes(2,'.$request->editID.','.$customerid.',
  '.$request->RawMaterial.',
  '.$request->PrintType.',
  '.$request->CuttingName.',
  '.$printingfinishingprocess.',
  '.$productid.',
  "'.$hook.'",
  "'.$tissue_paper.'",
  "'.$packaging_stickers.'",
  '.$PricingMethod.',
  '.$UnitofMeasurement.',
  '.$Currency.',
  '.$request->Thickness.',
  "'.$request->pt.'",
  "'.$request->gms.'",
  "'.$request->mm.'",
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
        $data['boxid'][] = $boxduplicateid;

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
                'Version'=>$duplicaterecord->Version+1,
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
          $duplicate_id=$productdetails_insert->id;
         }
         elseif($producttypeid==1)
         {

            
            if($duplicaterecord->HookID!= "")
         {
         if($duplicaterecord->HookID != null && $duplicaterecord->HookID <> 0)
         {
            $produ = Hook::where('id','=',$hookid)->first();
            $versihook = $produ->Version+1;
           
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

            $mulitple_id = $duplicaterecord->HookID.','.$hookduplicateid;
            /*$explo = explode(",", $duplicaterecord->Version);
            echo end($explo);*/
            $new_version = $hooklastduplicateid->Version+1;
            $mulitple_version = $duplicaterecord->Version.','.$new_version;
            $productdetails_insert11 = DB::table('productdetails')->where('id', $id)->update(['HookID' => $mulitple_id]);
            $productdetails_insert = ProductDetails::orderby('id','desc')->first();
         $version_old=$produ->Version;
         $version_new=$hooklastduplicateid->Version;
         $duplicate_id=$id;
         }






         elseif ($producttypeid==2) {

             if($duplicaterecord->TissuePaperID!= "")
     {

       if($duplicaterecord->TissuePaperID!= null && $duplicaterecord->TissuePaperID<> 0)
         {
          $tissprod = Tissuepaper::where('id','=',$hookid)->first();
          $hookve = $tissprod->Version+1;
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
            $hook_multi = $duplicaterecord->TissuePaperID.','.$tissueduplicateid;
            $hookproduct = DB::table('productdetails')->where('id', $id)->update(['TissuePaperID' => $hook_multi]);
            $productdetails_insert = ProductDetails::orderby('id','desc')->first();

         $version_old=$tissprod->Version;
         $version_new=$tissuealastduplicateid->Version;
         $duplicate_id=$id;
         }



         elseif ($producttypeid==3) {

            if($duplicaterecord->PackagingStickersID!= "")
        {


         if($duplicaterecord->PackagingStickersID!= null && $duplicaterecord->PackagingStickersID <> 0)
         {
          $packprod = PackagingStickers::where('id','=',$hookid)->first();
          $hookve = $packprod->Version+1;
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
            $pack_multi = $duplicaterecord->PackagingStickersID.','.$packduplicateid;
            $hookproduct = DB::table('productdetails')->where('id', $id)->update(['PackagingStickersID' => $pack_multi]);
            $productdetails_insert = ProductDetails::orderby('id','desc')->first();

          $version_old=$packprod->Version;
          $version_new=$packalastduplicateid->Version;
          $duplicate_id=$id;
         }
       

         $data[] = ['duplicate_id'=>$duplicate_id,'edit_id'=>$id,'version_new'=>$version_new,'version_old'=>$version_old];
         if($producttypeid == 0)
         {
            $data['processid'][] = '0';
         }
         else{
            $data['processid'][] = '0'.','.$producttypeid;
         }
         $data['processrecord'][] = $productdetails_insert->id.','.'0';
        
        return Response::json($data);

       
    }
 

  

}

?>