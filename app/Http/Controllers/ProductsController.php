<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Redirect;

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

use DB;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;


use File;
use URL;

class ProductsController extends Controller

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

    public function Productlistview(Request $request,$id)

    {

      $user = Auth::user();
	  
	   $usertype = UserType::where('id', '=', $user->userTypeID)->first();

   
	 
	 $productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','<',3)->where('hide','=',0)->get();
	 
	 
	 $productgroupdetails=ProductGroup::where('status','=',1)->where('id','=',$id)->first();
	 
	//print_r($productgroupdetails->ProductGroup);exit;
	
	  Session::put('productgroupid', $productgroupdetails->id);
	 
	  
	   return view('users.add_product', compact('user','usertype','productfielddetails'));
	   
	   
      
    

    }
	  //Defect: newpdf no:6
         //Name: Vidhya-PHP Team
         //Working for the list of particular customers

    public function selectwarehouse (Request $request ,$id)

    {
    	$user = Auth::user();
    	
        $customerdetail = Customers::where('id', '=', $id)->orderBy('Warehouse_Name', 'asc')->get();

		 return json_encode(["success" => true, $customerdetail]);

    }

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
    public function Addproductsdetails(Request $request)
	{
	$user = Auth::user();
	
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 
	 
	//echo "season".$request->Season;exit;
	
	//echo "sample quote".$request->samplequote;
	 
	
	if($request->stylenumber!="")
	{
	$stylenumber=$request->stylenumber;
	}
	else
	{
	$stylenumber=0;
	}
	//echo "season".$request->Season; exit; 
	if($request->Season!="")
	{
	$Season=$request->Season;
	}
	else
	{
	$Season=0;
	}
	
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
	if($request->productionregion3!="")
	{
	$productionregion3=$request->productionregion3;
	}
	else
	{
	$productionregion3=0;
	}
	if($request->productionregion4!="")
	{
	$productionregion4=$request->productionregion4;
	}
	else
	{
	$productionregion4=0;
	}
	if($request->productionregion5!="")
	{
	$productionregion5=$request->productionregion5;
	}
	else
	{
	$productionregion5=0;
	}
	if($request->productionregion6!="")
	{
	$productionregion6=$request->productionregion6;
	}
	else
	{
	$productionregion6=0;
	}
	if($request->productionregion7!="")
	{
	$productionregion7=$request->productionregion7;
	}
	else
	{
	$productionregion7=0;
	}
	if($request->productionregion8!="")
	{
	$productionregion8=$request->productionregion8;
	}
	else
	{
	$productionregion8=0;
	}
	
	if($request->ProductSubGroupName!="")
	{
	$ProductSubGroupName=$request->ProductSubGroupName;
	}
	else
	{
	$ProductSubGroupName=0;
	}
	
	
	if($request->uniquefactory!="")
	{
	$uniquefactory1=$request->uniquefactory;
	$uniquefactory1 = implode(",", $uniquefactory1);
    $uniquefactory1details=$uniquefactory1;
	}
	else
	{
	  $uniquefactory1details=0;
	}
	
	if($request->uniquefactory2!="")
	{
	$uniquefactory2=$request->uniquefactory2;
	$uniquefactory2 = implode(",", $uniquefactory2);
    $uniquefactory2details=$uniquefactory2;
	}
	else
	{
	  $uniquefactory2details=0;
	}
	
	if($request->uniquefactory3!="")
	{
	$uniquefactory3=$request->uniquefactory3;
	$uniquefactory3 = implode(",", $uniquefactory3);
    $uniquefactory3details=$uniquefactory3;
	}
	else
	{
	  $uniquefactory3details=0;
	}
	if($request->uniquefactory4!="")
	{
	$uniquefactory4=$request->uniquefactory4;
	$uniquefactory4 = implode(",", $uniquefactory4);
    $uniquefactory4details=$uniquefactory4;
	}
	else
	{
	  $uniquefactory4details=0;
	}
	if($request->uniquefactory5!="")
	{
	$uniquefactory5=$request->uniquefactory5;
	$uniquefactory5 = implode(",", $uniquefactory5);
    $uniquefactory5details=$uniquefactory5;
	}
	else
	{
	  $uniquefactory5details=0;
	}
	if($request->uniquefactory6!="")
	{
	$uniquefactory6=$request->uniquefactory6;
	$uniquefactory6 = implode(",", $uniquefactory6);
    $uniquefactory6details=$uniquefactory6;
	}
	else
	{
	  $uniquefactory6details=0;
	}
	if($request->uniquefactory7!="")
	{
	$uniquefactory7=$request->uniquefactory7;
	$uniquefactory7 = implode(",", $uniquefactory7);
    $uniquefactory7details=$uniquefactory7;
	}
	else
	{
	  $uniquefactory7details=0;
	}
	if($request->uniquefactory8!="")
	{
	$uniquefactory8=$request->uniquefactory8;
	$uniquefactory8 = implode(",", $uniquefactory8);
    $uniquefactory8details=$uniquefactory8;
	}
	else
	{
	  $uniquefactory8details=0;
	}

    
	 
	if($request->editID!='')
        	{
			/*$productdetailsupdate=DB::table('productdetails')
            ->where('id',$request->editID)
            ->update(['CustomerID' => $request->CustomerName,
			'ProductGroupID' => $request->ProductGroup,
		'ProductSubGroupID'=>$request->ProductSubGroupName,
		'SeasonID'=>$Season,
		'ProductStatusID'=>$request->StatusName,
		'ProductProcessID'=>$request->ProductProcess,
		'ProductionRegionID1'=>$productionregion1,
		'ProductionRegionID2'=>$productionregion2,
		'ProductionRegionID3'=>$productionregion3,
		'ProductionRegionID4'=>$productionregion4,
		'ProductionRegionID5'=>$productionregion5,
		'ProductionRegionID6'=>$productionregion6,
		'ProductionRegionID7'=>$productionregion7,
		'ProductionRegionID8'=>$productionregion8,
		'PricingMethodID'=>$request->PricingMethod,
		'CurrencyID'=>$request->Currency,
		'UnitofMeasurementID'=>$request->factoryName,
		'UniqueFactory1'=>$uniquefactory1details,
		'UniqueFactory2'=>$uniquefactory2details,
		'UniqueFactory3'=>$uniquefactory3details,
		'UniqueFactory4'=>$uniquefactory4details,
		'UniqueFactory5'=>$uniquefactory5details,
		'UniqueFactory6'=>$uniquefactory6details,
		'UniqueFactory7'=>$uniquefactory7details,
		'UniqueFactory8'=>$uniquefactory8details,
		'Brand'=>$request->brand,
		'ProgramName'=>$request->programname,
		'CustomerProductName'=>$request->productname,
		'CustomerProductCode'=>$request->productcode,
		'UniqueProductCode'=>$request->uniqueproductcode,
				'Description'=>$request->description,
				'StyleNumber'=>$stylenumber,
				'Version'=>$request->version,
				'SampleandQuote'=>$request->samplequote,
				'MinimumOrderQuantity'=>$request->MinQuantity,
				'MinimumOrderValue'=>$request->Minordervalue,
				'PackSize'=>$request->packsize,
				'SellingPrice'=>$request->sellingprice,
				'status'=>1
				]);*/
				
				$productdetailsupdate=DB::table('productdetails')
            ->where('id',$request->editID)
            ->update(['CustomerID' => $request->CustomerName,
			'ProductGroupID' => $request->ProductGroup,
		'ProductSubGroupID'=>$request->ProductSubGroupName,
		'SeasonID'=>$Season,
		'ProductStatusID'=>$request->StatusName,
		'ProductProcessID'=>$request->ProductProcess,
		'PricingMethodID'=>$request->PricingMethod,
		'Brand'=>$request->brand,
		'ProgramName'=>$request->programname,
		'CustomerProductName'=>$request->productname,
		'CustomerProductCode'=>$request->productcode,
		'UniqueProductCode'=>$request->uniqueproductcode,
				'Description'=>$request->description,
				'StyleNumber'=>$stylenumber,
				'Version'=>$request->version,
				'SampleandQuote'=>$request->samplequote,
				'status'=>1
				]);
				//exit;
				
				Session::put('productlastrecordid',$request->editID); 
				
				Session::put('customerid',$request->CustomerName);
	             
                  $productgroupid=$request->ProductGroup;
	
	              $productsubgroupid=$request->ProductSubGroupName;
	
	            //session-productgroupid and productsubgroupid
				
				Session::put('productgroupid', $request->ProductGroup);
	            Session::put('productsubgroupid', $request->ProductSubGroupName);
				$productgroupdetails=ProductGroup::where('id','=',$productgroupid)->where('status','=',1)->get();
	            $productsubgroupdetails=ProductSubGroup::where('id','=',$productsubgroupid)->where('status','=',1)->get();
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
	
	
	    $productgrouphookdetails="Hook";
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
			
		
	  $boxesdetails=Boxes::where('ProductID','=',$request->editID)->where('status','=',1)->first();
	  
	  //print_r($boxesdetails);exit;
	  
	  
	  $hookdetails=Hook::where('ProductID','=',$request->editID)->where('status','=',1)->first();
	  
	  $tissuepaperdetails=Tissuepaper::where('ProductID','=',$request->editID)->where('status','=',1)->first();
	  
	  $packagingstickersdetails=PackagingStickers::where('ProductID','=',$request->editID)->where('status','=',1)->first();
	  
	  
          
	
	return view('users.update_productdetails',compact('user','usertype','productgroupdetails','productsubgroupdetails','productsubgroupid','productdevelopmentfields','producthookfields','productdevelopmentsubgroupdetails','prddevsubgrouppackagingdetails','boxesdetails','hookdetails','tissuepaperdetails','packagingstickersdetails'));
				
			}
			
			else
			{
				
				$productdetails_insert = ProductDetails::create(['CustomerID'=>$request->CustomerName,
		'CustomerWareHouseID'=>$request->Warehouse_Name,
		'ProductGroupID' => $request->ProductGroup,
		'ProductSubGroupID'=>$request->ProductSubGroupName,
		'SeasonID'=>$Season,
		'ProductStatusID'=>$request->StatusName,
		'ProductProcessID'=>$request->ProductProcess,
		'PricingMethodID'=>$request->PricingMethod,
		'Brand'=>$request->brand,
		'ProgramName'=>$request->programname,
		'CustomerProductName'=>$request->productname,
		'CustomerProductCode'=>$request->productcode,
		'UniqueProductCode'=>$request->uniqueproductcode,
				'Description'=>$request->description,
				'StyleNumber'=>$stylenumber,
				'Version'=>$request->version,
				'SampleandQuote'=>$request->samplequote,
				'status'=>1
                ]);
				
				//exit;
				//echo $stylenumber; exit;
				$productdetails_insert->save(); 
				
				//exit;
				
			    $lastinsertid=$productdetails_insert->id;
			}
				
				//session-productid and customerid
				
				Session::put('productlastrecordid', $lastinsertid); 
				
				Session::put('customerid',$request->CustomerName);
	             
	
	
                  $productgroupid=$request->ProductGroup;
	
	              $productsubgroupid=$request->ProductSubGroupName;
	
	            //session-productgroupid and productsubgroupid
				
				Session::put('productgroupid', $request->ProductGroup);
	            Session::put('productsubgroupid', $request->ProductSubGroupName);
	
	
	
	
	$productgroupdetails=ProductGroup::where('id','=',$productgroupid)->where('status','=',1)->get();
	
	
	
	$productsubgroupdetails=ProductSubGroup::where('id','=',$productsubgroupid)->where('status','=',1)->get();
	
	
	//print_r($productselectedsubgroupdetails);exit;

	
	
	
	
	
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
	
	
	    $productgrouphookdetails="Hook";
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
			
		
	  

	
	return view('users.add_productdetails',compact('user','usertype','productgroupdetails','productsubgroupdetails','productsubgroupid','productdevelopmentfields','producthookfields','productdevelopmentsubgroupdetails','prddevsubgrouppackagingdetails'));
	
	
	
	}
	public function Edit(Request $request,$id)
	{
	  $user = Auth::user();
	  $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	  
	  $productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','<',3)->where('hide','=',0)->get();
	  
	  
	  $productdetails = ProductDetails::where('id','=',$id)->first();
	 
	  
	   return view('users.update_product', compact('user','usertype','productfielddetails','productdetails'));
		
		
	}
	
	public function AddProductsGroupdetails(Request $request)
	{
		
		//echo "editid".$request->editID; exit;
		
	  $user = Auth::user();
	  $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	  $customerid=Session::get('customerid');
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
		//$uniquefactory1=implode(",",$uniquefactory1);
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
	
	/*if($request->pt!="")
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
	}*/
	
	/*if($request->qty_chk!="")
	{
	$qty_chk=$request->qty_chk;
	}
	else
	{
		$qty_chk=0;
	}*/
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
	if($request->print_color1!="")
	{
		$print_color1=$request->print_color1;
	}
	else
	{
		$print_color1="";
	}
	if($request->print_color2!="")
	{
		$print_color2=$request->print_color2;
	}
	else
	{
		$print_color2="";
	}
	if($request->print_color3!="")
	{
		$print_color3=$request->print_color3;
	}
	else
	{
		$print_color3="";
	}
	if($request->print_color4!="")
	{
		$print_color4=$request->print_color4;
	}
	else
	{
		$print_color4="";
	}
	if($request->print_color5!="")
	{
		$print_color5=$request->print_color5;
	}
	else
	{
		$print_color5="";
	}
	if($request->print_color6!="")
	{
		$print_color6=$request->print_color6;
	}
	else
	{
		$print_color6="";
	}
	if($request->print_color7!="")
	{
		$print_color7=$request->print_color7;
	}
	else
	{
		$print_color7="";
	}
	if($request->print_color8!="")
	{
		$print_color8=$request->print_color8;
	}
	else
	{
		$print_color8="";
	}
	
	if($request->editID!='')
	{
		
	
		 $customerid=Session::get('customerid');
	    $productid=Session::get('productlastrecordid');
		 
		/*$productboxesupdations=DB::select('call sp_CRUDboxes(2,'.$request->editID.','.$customerid.',
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
	"'.$print_color1.'",
	"'.$print_color2.'",
	"'.$print_color3.'",
	"'.$print_color4.'",
	"'.$print_color5.'",
	"'.$print_color6.'",
	"'.$print_color7.'",
	"'.$print_color8.'",
	'.$productionregion1.',
	"'.$uniquefactory1.'",
	'.$productionregion2.',
	"'.$uniquefactory2.'",
	'.$productionregion3.',
	"'.$uniquefactory3.'",
	"'.$imgInp_filename.'",
	0)');*/
	$productboxesupdations=DB::select('call sp_CRUDboxes(2,'.$request->editID.','.$customerid.',
	'.$request->RawMaterial.',
	'.$request->PrintType.',
	'.$request->CuttingName.',
	"'.$printingfinishingprocess.'",
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
	'.$request->qty_chk.',
	"'.$request->Width.'",
	"'.$request->Height.'",
	"'.$request->Length.'",
	'.$cmyk.',
	"'.$print_color1.'",
	"'.$print_color2.'",
	"'.$print_color3.'",
	"'.$print_color4.'",
	"'.$print_color5.'",
	"'.$print_color6.'",
	"'.$print_color7.'",
	"'.$print_color8.'",
	'.$productionregion1.',
	"'.$uniquefactory1.'",
	'.$productionregion2.',
	"'.$uniquefactory2.'",
	'.$productionregion3.',
	"'.$uniquefactory3.'",
	"'.$imgInp_filename.'",
	0)');
					
			
		$data=$cmyk;
		return json_encode($data);
		
	}
	else
	{
		
   $productboxesinsertions=DB::select('call sp_CRUDboxes(1,0,'.$customerid.',
	'.$request->RawMaterial.',
	'.$request->PrintType.',
	'.$request->CuttingName.',
	"'.$printingfinishingprocess.'",
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
	'.$request->qty_chk.',
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
	0,
	1)');
	
	  
		$data=12;
		
		return json_encode($data);
	}
		
		
	}
	
	
	public function Addinventorydetails(Request $request)
	{
		$user = Auth::user();
	
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 
	 $request->Inventory;
	 
	$lastinsertedid=Session::get('productlastrecordid');
	
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
	if($request->uniquefactory!="")
	{
	$uniquefactory1=$request->uniquefactory;
	$uniquefactory1 = implode(",", $uniquefactory1);
    $uniquefactory1details=$uniquefactory1;
	}
	else
	{
	  $uniquefactory1details=0;
	}
	
	if($request->uniquefactory2!="")
	{
	$uniquefactory2=$request->uniquefactory2;
	$uniquefactory2 = implode(",", $uniquefactory2);
    $uniquefactory2details=$uniquefactory2;
	}
	else
	{
	  $uniquefactory2details=0;
	}
	
	if($request->uniquefactory3!="")
	{
	$uniquefactory3=$request->uniquefactory3;
	$uniquefactory3 = implode(",", $uniquefactory3);
    $uniquefactory3details=$uniquefactory3;
	}
	else
	{
	  $uniquefactory3details=0;
	}
	
	//echo "editid".$request->editID;exit;
	
	if($request->editID!="")
	{
		//sathish 14-03
		 $customerid=Session::get('customerid');
	     $productid=Session::get('productlastrecordid');
		 
		$productdetailsupdate=DB::table('productdetails')
            ->where('id',$request->editID)
            ->update(['InventoryID' => $request->Inventory,
			'Projection' => $request->inventoryProjection,
			'ProductionRegionID1'=>$request->inventoryProductionRegions1,
			'UniqueFactory1'=>$request->inventoryuniquefactory1,
			'ProductionRegionID2'=>$request->inventoryProductionRegions2,
			'UniqueFactory2'=>$request->inventoryuniquefactory1,
			'ProductionRegionID3'=>$request->inventoryProductionRegions3,
			'UniqueFactory3'=>$request->inventoryuniquefactory1,
			'Maximumpiecesonstock'=>$request->Maximumpiecesonstock,
			'Minimumpiecesonstock'=>$request->Minimumpiecesonstock]);
			
			//exit;
			
			//$productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',4)->get();
			
			//$quantitydetails=Quote::where('status','=',1)->get();
			
			//$productquotedetails=ProductDetails::where('id','=',$productid)->where('status','=',1)->first();
     $productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',2)->where('hide','=',1)->get();
			
			$quantitydetails=Quote::where('status','=',1)->get();
			
       $productquotedetails=ProductDetails::where('id','=',$lastinsertedid)->where('status','=',1)->first();
			
			//print_r($productquotedetails); exit;
			
	 
	  return view('users.update_productquoteinfo', compact('user','usertype','productfielddetails','quantitydetails','productquotedetails')); 
		
	}
	else
	{
	 
	$productdetailsinsertions=DB::table('productdetails')
            ->where('id',$lastinsertedid)
            ->update(['InventoryID' => $request->Inventory,
			'Projection' => $request->inventoryProjection,
			'ProductionRegionID1'=>$request->inventoryProductionRegions1,
			'UniqueFactory1'=>$request->inventoryuniquefactory1,
			'ProductionRegionID2'=>$request->inventoryProductionRegions2,
			'UniqueFactory2'=>$request->inventoryuniquefactory1,
			'ProductionRegionID3'=>$request->inventoryProductionRegions3,
			'UniqueFactory3'=>$request->inventoryuniquefactory1,
			'Maximumpiecesonstock'=>$request->Maximumpiecesonstock,
			'Minimumpiecesonstock'=>$request->Minimumpiecesonstock]);
			
			//echo "Inventoryproductionregions1---".$productionregion1;echo "uniquefactory1---".$uniquefactory1details;exit;
			//exit;
			
			$productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',2)->where('hide','=',1)->get();
			
			$quantitydetails=Quote::where('status','=',1)->get();
	 
	  return view('users.add_productquoteinfo', compact('user','usertype','productfielddetails','quantitydetails')); 
			
			//exit;
	}
			
			 
		
	}
	public function Addproductquoteinfo(Request $request)
	{
		$user = Auth::user();
	    $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		$lastinsertedid=Session::get('productlastrecordid');
		
		$path = '/data/product';

     		File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

		 
		 	$imgInp = Input::file('imgInp');
			//$imgInp = $request->imgInp;
			//echo "tet".$imgInp;exit;
			
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
				$imgInp_filename= '';
				}
			}	
		
		  // echo $request->editID;exit;
		   
		   if($request->editID!="")
		   {
			    if($request->otherqty!="")
				{
					 $qtychk = implode(",",$request->quantitychk);
					 $qtychk=$qtychk.",".$request->otherqty;
				}
				
				else
				{
			      $qtychk = implode(",",$request->quantitychk);
				}
				
				//$cost=$request->quantitychk1;
				
			      //$cost=$request->othercost;exit;
				  
				  if($request->othercost!="")
				  {
					   $filledcost=implode(",",$request->quantitychk1);
					    $filledcost=$filledcost.",".$request->othercost;
				  }
				  else
				  {
					   $filledcost=implode(",",$request->quantitychk1);
				  }
			   
			/* $productdetailsupdate=DB::table('productdetails')
            ->where('id',$request->editID)
            ->update(['SampleRequestedDate' => $request->SampleRequestedDate,
			'SampleRequestNumber' => $request->SampleNumber,
			'NumberOfSamplesRequired' => $request->NumberOfSamplesRequired,
			'QuoteRequired' => $request->quoterequired,
			'SampleLeadTime' => $request->SampleLeadTime,
			'ProductionLeadTime' => $request->ProductionLeadTime,
			'RemarksInstructions' => $request->Remarks,
			'Artworkupload' => $imgInp_filename
			]);*/
			$productdetailsupdate=DB::table('productdetails')
            ->where('id',$lastinsertedid)
            ->update(['PricingMethod' =>$request->PricingMethod,
			'UnitofMeasurementID' =>$request->UnitofMeasurement,
			'CurrencyID' =>$request->Currency,
			'MinimumOrderQuantity' =>$request->MinQuantity,
			'MinimumOrderValue' =>$request->Minordervalue,
			'PackSize' =>$request->packsize,
			'SellingPrice' => $request->samplecost,
			'Cost'=>$filledcost,
			'QuantityMOQ' =>$qtychk
			]);
			
			
			$othersquantity=$request->otherqty;
			//exit;
			 if($othersquantity!="")
			 {
					$quotedetails_insert = Quote::create([
					'Quantity'=>$othersquantity,
					'status'=>1 ]);
				
				
				$quotedetails_insert->save(); 
				
				 $lastquoteinsertid=$quotedetails_insert->id;
				 
			 
				Session::put('lastquoteinsertid', $lastquoteinsertid);
				 
			 }
			   $productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',2)->where('hide','=',1)->get();
	$quantitydetails=Quote::where('status','=',1)->get();
	
	
	$productquantitycostdetails=ProductDetails::where('id','=',$lastinsertedid)->where('status','=',1)->first();
	
	
	
		
		$request->session()->flash('success', 'Productdetails added successfully.'); 
	return view('users.update_sellingprice', compact('user','usertype','productfielddetails','quantitydetails','productquantitycostdetails'));   
			
			//exit;
			   
		   }
		   
		   else
		   {
			   
			   //echo $otherqtychk=$request->otherqty;exit;
			   
			  		   
			   
			    if($request->otherqty!="")
				{
					 $qtychk = implode(",",$request->quantitychk);
					 $qtychk=$qtychk.",".$request->otherqty;
				}
				
				else
				{
			      $qtychk = implode(",",$request->quantitychk);
				}
				
				//$cost=$request->quantitychk1;
				
			      //$cost=$request->othercost;exit;
				  
				  if($request->othercost!="")
				  {
					   $filledcost=implode(",",$request->quantitychk1);
					    $filledcost=$filledcost.",".$request->othercost;
				  }
				  else
				  {
					   $filledcost=implode(",",$request->quantitychk1);
				  }
				
				
				
			    
				 
				
				
			 //exit;
		//exit;
		  /* $productdetailsupdate=DB::table('productdetails')
            ->where('id',$lastinsertedid)
            ->update(['SampleRequestedDate' => $request->SampleRequestedDate,
			'SampleRequestNumber' => $request->SampleNumber,
			'NumberOfSamplesRequired' => $request->NumberOfSamplesRequired,
			'QuoteRequired' => $request->quoterequired,
			'SampleLeadTime' => $request->SampleLeadTime,
			'ProductionLeadTime' => $request->ProductionLeadTime,
			'RemarksInstructions' => $request->Remarks,
			'Artworkupload' => $imgInp_filename
			]);*/
			$productdetailsupdate=DB::table('productdetails')
            ->where('id',$lastinsertedid)
            ->update(['PricingMethod' =>$request->PricingMethod,
			'UnitofMeasurementID' =>$request->UnitofMeasurement,
			'CurrencyID' =>$request->Currency,
			'MinimumOrderQuantity' =>$request->MinQuantity,
			'MinimumOrderValue' =>$request->Minordervalue,
			'PackSize' =>$request->packsize,
			'SellingPrice' => $request->samplecost,
			'Cost'=>$filledcost,
			'QuantityMOQ' =>$qtychk,
			'ExWorks'=>$request->exworks,
			'FOB'=>$request->fob
			]);
			
			//exit;
	       /*echo "pricing method".$request->PricingMethod; echo "<br>";
		   echo "UnitofMeasurementID".$request->UnitofMeasurement; echo "<br>";
		    echo "CurrencyID".$request->Currency; echo "<br>";
			echo "MinimumOrderQuantity".$request->MinQuantity; echo "<br>";
			echo "MinimumOrderValue".$request->Minordervalue; echo "<br>";
			echo "PackSize".$request->packsize; echo "<br>";
			echo "SellingPrice".$request->samplecost; echo "<br>";
			echo "exworks".$request->exworks; echo "<br>";
			echo "fob".$request->fob; echo "<br>";*/
			
			
			
			//exit;
		   
			
			$othersquantity=$request->otherqty;
			//exit;
			 if($othersquantity!="")
			 {
					$quotedetails_insert = Quote::create([
					'Quantity'=>$othersquantity,
					'status'=>1 ]);
				
				
				$quotedetails_insert->save(); 
				
				 $lastquoteinsertid=$quotedetails_insert->id;
				 
			 
				Session::put('lastquoteinsertid', $lastquoteinsertid);
				 
			 }
			 
			
			//exit;
		   }
		
		
		/*session()->forget('customerid');
		session()->forget('productlastrecordid');
		session()->forget('productgroupid');
		session()->forget('productsubgroupid');*/
		
		   
		   
    $productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',2)->where('hide','=',1)->get();
	$quantitydetails=Quote::where('status','=',1)->get();
	
	
	$productquantitycostdetails=ProductDetails::where('id','=',$lastinsertedid)->where('status','=',1)->first();
	
		
		$request->session()->flash('success', 'Productdetails added successfully.'); 
	return view('users.add_sellingprice', compact('user','usertype','productfielddetails','quantitydetails','productquantitycostdetails'));    
		//return redirect(url(route('dashboard')));
		
		   
		
	}
	public function Addcostdetails(Request $request)
	{
		$user = Auth::user();
	    $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		
		
		$suggest_price=$request->input2;
		$margin=$request->input0;
		
		$cost=$request->input1;
		
		$quantitychk=$request->quantitychk;
		
		//print_r($quantitychk);exit;
		//exit;
		$lastinsertedid=Session::get('productlastrecordid');
		
		
		$lastquoteinsertid=Session::get('lastquoteinsertid');
		//print_r($suggest_price);exit;
		
		$suggested_pricedetails=implode(",",$suggest_price);
		
	    $cost_pricedetails=implode(",",$cost);
		
		$quantitycheck_pricedetails=implode(",",$quantitychk);
		
		//echo $suggested_pricedetails;exit;
		
		//echo "sellingprice".$request->sellingprice_editID; exit;
		
		if($request->sellingprice_editID!="")
		{
			
			 $productdetailsupdate=DB::table('productdetails')
            ->where('id',$request->sellingprice_editID)
            ->update([
			'QuantityMOQ'=>$quantitycheck_pricedetails,
			'Cost'=>$cost_pricedetails,
			'Suggested_price' => $suggested_pricedetails,
			'Margin'=>$margin
			]);
		
	
		
		 $productdetailsupdate=DB::table('quote')
            ->where('id',$lastquoteinsertid)
            ->update(['Status' =>0
			]);
		
			//echo "updated";exit;
	$productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',4)->where('hide','=',0)->get();
			
	   $quantitydetails=Quote::where('status','=',1)->get();
	   
	   $productquotedetails=ProductDetails::where('id','=',$lastinsertedid)->where('status','=',1)->first();
	 
	   return view('users.update_costingandrequirements', compact('user','usertype','productfielddetails','quantitydetails',
	   'productquotedetails'));
			
			
		}
		else
		
			{  
			  
			  $productdetailsupdate=DB::table('productdetails')
            ->where('id',$lastinsertedid)
            ->update([
			'QuantityMOQ'=>$quantitycheck_pricedetails,
			'Cost'=>$cost_pricedetails,
			'Suggested_price' => $suggested_pricedetails,
			'Margin'=>$margin
			]);
		
	
		
		 $productdetailsupdate=DB::table('quote')
            ->where('id',$lastquoteinsertid)
            ->update(['Status' =>0
			]);
			
	$productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',4)->where('hide','=',0)->get();
			
	   $quantitydetails=Quote::where('status','=',1)->get();
	 
	   return view('users.add_costingandrequirements', compact('user','usertype','productfielddetails','quantitydetails'));
		
		
	}
		
		//echo "updated";
		
		//exit;
		/*session()->forget('customerid');
		session()->forget('productlastrecordid');
		session()->forget('productgroupid');
		session()->forget('productsubgroupid');
		session()->forget('lastquoteinsertid');*/
		
		
	   
			
		
		//return redirect(url(route('dashboard')));
		
	}
	
	public function AddCostingandRequirements(Request $request)
	{
		$user = Auth::user();
	    $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		$lastinsertedid=Session::get('productlastrecordid');
		
		$path = '/data/product';

     		File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

		 
		 	$imgInp = Input::file('imgInp');
			//$imgInp = $request->imgInp;
			//echo "tet".$imgInp;exit;
			
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
				$imgInp_filename= '';
				}
			}	
		
		  // echo $request->editID;exit;
		   
		   if($request->editID!="")
		   {
			   
			 $productdetailsupdate=DB::table('productdetails')
            ->where('id',$request->editID)
            ->update(['SampleRequestedDate' => $request->SampleRequestedDate,
			'SampleRequestNumber' => $request->SampleNumber,
			'NumberOfSamplesRequired' => $request->NumberOfSamplesRequired,
			'SampleLeadTime' => $request->SampleLeadTime,
			'ProductionLeadTime' => $request->ProductionLeadTime,
			'RemarksInstructions' => $request->Remarks,
			'Artworkupload' => $imgInp_filename
			]);
			
			//exit;
			   
		   }
		   
		   else
		   {
		
		   $productdetailsupdate=DB::table('productdetails')
            ->where('id',$lastinsertedid)
            ->update(['SampleRequestedDate' => $request->SampleRequestedDate,
			'SampleRequestNumber' => $request->SampleNumber,
			'NumberOfSamplesRequired' => $request->NumberOfSamplesRequired,
			'SampleLeadTime' => $request->SampleLeadTime,
			'ProductionLeadTime' => $request->ProductionLeadTime,
			'RemarksInstructions' => $request->Remarks,
			'Artworkupload' => $imgInp_filename
			]);
			
		   }
		/*session()->forget('customerid');
		session()->forget('productlastrecordid');
		session()->forget('productgroupid');
		session()->forget('productsubgroupid');*/
		
		/*session()->forget('customerid');
		session()->forget('productlastrecordid');
		session()->forget('productgroupid');
		session()->forget('productsubgroupid');
		session()->forget('lastquoteinsertid');*/
		
		   
		
		$request->session()->flash('success', 'Productdetails added successfully.');     
		return redirect(url(route('dashboard')));
		
		   
		
	}
	public function AddSeasondetails(Request $request)
	{
	
			$seasondata=Season::where('Season','=',$request->season)->get();

			
			if($seasondata->count())
			{
			
			 $data[]='Season is already there!';
			
			}
			else
			{
			   
			 $seasoninsertion=DB::Select('call sp_CRUDseason(1,"'.$request->season.'",1)');
			  
			$seasonselect=Season::where('Season','!=','')->orderBy('id','DESC')->get();
		
	        $data[]=$seasonselect;
			 }
			 
			 return json_encode($data);
	
	}
	
	/*public function AddQuantitydetails(Request $request)
	{
	
			$quantitydata=Quote::where('Quantity','=',$request->quantity)->get();
			
			$lastinsertedid=Session::get('productlastrecordid');
			
			if($quantitydata->count())
			{
			
			 $data[]='Quantity is already there!';
			
			}
			else
			{
			   
			 if($request->quantity!="")
			 {
			$quantityupdations=$productdetailsupdate=DB::table('productdetails')
            ->where('id',$lastinsertedid)
            ->update(['QuoteRequiredchk' => $request->quantity
			]);
			 }
			 else
			 {
			$quantityupdations=$productdetailsupdate=DB::table('productdetails')
            ->where('id',$lastinsertedid)
            ->update(['QuoteRequiredchk' => $request->qtychk
			]);
			
			 }
			//$quantityInsertions=DB::Select('call sp_CRUDquantity(1,"'.$request->quantity.'",1)');
			  
			//$quantityselect=Quote::where('Quantity','!=','')->orderBy('id','DESC')->get();
		
	        //$data[]=$quantityselect;
			$data="Quantity added Successfully";
			 }
			 //$data=$request->qtychk;
			 return json_encode($data);
	
	}*/
	
		public function AddRegiondetails(Request $request)
	{
	
     $regions=$request->regions;
	
	$regiondata=ProductionRegions::where('ProductionRegions','=',$regions)->get();
	
	if($regiondata->count())
	{
	
	 $data[]='ProductionRegions is already there!';
	
	}
	else
	{
	$regioninsertion=DB::Select('call sp_CRUDproductionregion(1,0,"'.$regions.'",1)');
	$regionselect=ProductionRegions::where('ProductionRegions','!=','')->orderBy('id','DESC')->get();
	$data[]=$regionselect;
	}
	
	
	
	return json_encode($data);
	}	
	

  

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAjax($id)
    {
        $productsubgroup = DB::table("productsubgroup")
                    ->where("Product_groupID",$id)
                    ->pluck("ProductSubGroupName","id");
        return json_encode($productsubgroup);
		//$data=11;
		//return json_encode($data);
    }

   /* public function uniquefactoryselectionAjax($id)
	{
	
	 $uniquefatory=DB::table("officefactoryaddress")
	               ->where("prodRegionID",$id)
				   ->pluck("factoryName","id");
				   return json_encode($uniquefatory);
	
	}*/
	 public function uniquefactoryselectionAjax($id)
	{
	
	$uniquefatory=UniqueOffices::where('ProductionRegionID','=',$id)->get();
	$data[]=$uniquefatory;
	return json_encode($data);
	
	}

    public function version($id)
	{
	 
	 $versionid=$id;
	 
	$versions=ProductDetail::orderBy('Version', 'desc')->pluck('Version')->first();
				  
				  $version=$versions+1;
	 
	 return json_encode($version);
	
	}
	  public function getproductimg(Request $request, $id) {

      $productid = ProductDetails::find($id);

      $filePath = base_path()."/storage/app/".$productid->Artworkupload; 
        header('Content-type: image/jpeg');
        $img = Image::make($filePath);
        return $img->response('jpg');

     }

     //Task:For steps in process 
	//Done by :Rajesh Baskaran
	public function pdmdetaildevlopment() 

     {
        //echo "dfgbdf";exit;
         $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         
         $productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','<',3)->where('hide','=',0)->get();

//$productdevelopmentfields=ProductDevelopmentFields::all();

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
			
	

        return view('users.pdmdetails', compact('user','usertype','productfielddetails','producthookfields','productdevelopmentsubgroupdetails','prddevsubgrouppackagingdetails','inventorydetails','inven_productfielddetails','invendetails_productfielddetails','quantitydetails','cost_productfielddetails'));
    }

    public function getproductdetailsitemlist(Request $request, $productgroup, $productsubgroupid){

    	$productgroupid=$productgroup;
	
	              $productsubgroupid=$productsubgroupid;

	              $productgroupdetails=ProductGroup::where('id','=',$productgroupid)->where('status','=',1)->get();
	            $productsubgroupdetails=ProductSubGroup::where('id','=',$productsubgroupid)->where('status','=',1)->get();
					$productfields=ProductDevelopmentFields::where('status','=',1)->get();

					$productinventorydetails=ProductDetails::where('status','=',1)->get();

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
	//echo '<pre>';print_r($productdevelopmentfields);echo '</pre>';
	?>

<?php
                $x=1;
                $y=1;


                //echo '<pre>';print_r($productdevelopmentfields);echo '</pre>';
             foreach($productdevelopmentfields as $list){
                ?>
             
             
               
                  <!--check dropdown and textbox to display in forms starts here-->
                <?php
                if($list->dropdown!=""){
                $table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;
                   if($fieldname=="ProductionRegions"){
                ?>
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; if($list->isvalid==1){ ?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-5">
                
                        <select id="<?php echo $fieldname; ?><?php echo $x; ?>" name="<?php echo $fieldname; ?><?php echo $x; ?>" class="form-control regionselect dropdownwidth">
                        <option value="">Please Select</option>
                         <?php foreach ($fielddetailslist as $fielddetails) { ?>
                           
                         <option value="<?php echo $fielddetails->id; ?>"><?php echo $fielddetails->$fieldname; ?></option>
                           <?php } ?>
                                            
                        </select>
                       
                </div>   
                 
                </div>
                
                 <?php }elseif($list->columnfieldname=="Currency"){
                ?>
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; if($list->isvalid==1){ ?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-5">
                
                        <select id="box<?php echo $fieldname; ?>" name="box<?php echo $fieldname; ?>" class="form-control regionselect dropdownwidth">
                        <option value="">Please Select</option>
                         <?php foreach ($fielddetailslist as $fielddetails) { ?>
                           
                         <option value="<?php echo $fielddetails->id; ?>"><?php echo $fielddetails->$fieldname; ?></option>
                           <?php } ?>
                                            
                        </select>
                       
                </div>   
                 
                </div>
                <?php
                 $x++;  
                
                ?>
                 <?php }elseif($fieldname=="factoryName"){ ?>
                  
                    <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; if($list->isvalid==1){?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-5 uniquefactory<?php echo $y; ?> factoryselect">
                
                         <select id="uniquefactory<?php echo $y; ?>" name="uniquefactory<?php echo $y; ?>[]" class="form-control dropdownwidth">
                <option value="">Please Select</option>
               
                                    
                </select>
                       
                </div>   
                 
                </div>
                
                       
                 <?php
                
                $y++;
                }elseif($fieldname=="PrintingFinishingProcessName"){ ?>
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1){ ?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-5">
                   
                           
                       
                         <?php foreach ($fielddetailslist as $fielddetails){ ?>
                         <div class="col-lg-12">

              <input type="checkbox" name="PrintingFinishingProcessName[]" id="<?php echo $fielddetails->id; ?>" value="<?php echo $fielddetails->id; ?>" class="thicknesschkbox printing"  /><p class="spanval label_font"> <?php echo $fielddetails->$fieldname; ?></p>
              </div>
                         <?php } ?>
                         
                         
                       
                </div>   
                 
                </div>
                <?php }elseif($fieldname=="PrintType"){ ?>
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1){ ?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-5">
                
                        <select id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         <?php foreach ($fielddetailslist as $fielddetails){ ?>
                           
                         <option value="<?php echo $fielddetails->id; ?>"><?php echo $fielddetails->$fieldname ?></option>
                           <?php } ?>
                                            
                        </select>
                       
                </div>   
                 
                </div>
                <?php }else{
                ?>
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo  $list->fieldname; if($list->isvalid==1){ ?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-5">
                
                        <select id="<?php echo $fieldname; ?>" name="<?php echo $fieldname; ?>" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         <?php foreach ($fielddetailslist as $fielddetails){ ?>
                           
                         <option value="<?php echo $fielddetails->id; ?>"><?php echo $fielddetails->$fieldname; ?></option>
                          <?php } ?>
                                            
                        </select>
                       
                </div>   
                 
                </div>
               
                 <?php } }elseif($list->uploadimage!="" &&  $list->columnfieldname=="Artwork"){ ?>
                  <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; if($list->isvalid==1){ ?><span class="required">*</span><?php } ?></label>
                  <div class="col-lg-5">
                 <input type="file" class="fbfile3" name="imgInp3" id="imgInp3" onchange="imageselect3();"/>
                 <input type="hidden" name="selectimage3" id="selectimage3" class="form-control selectimage2" readonly="readonly">
                  <input type="hidden" name="selectimageid3" id="selectimageid3" class="form-control" readonly="readonly">
                  </div>
                      
               </div>
               <div class="printcolorhidden">
                   <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                  <div class="col-lg-5" id="selimage3">
                     
                <img id="blah3" src="storage/data/product/" alt="" width="80" height="80" /> <img id="blah3" src="<?php echo url('/img/image-sample.jpg'); ?>" alt="your image" width="80" height="80" />
                </div>
                  
                  </div>
               
                <?php }elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference"){?>
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; if($list->isvalid==1){?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                
                      <input type="text" name="qty_ref" id="qty_ref" class="form-control qty_refbtn"/>                   
                    <input type="checkbox" name="qty_chk" id="qty_chk" class="qty_checkbox" value="1"/>
                    <?php if($list->checkboxvalue!=""){ ?>
                    <p  class="aspersample"><?php echo $list->checkboxvalue;?></p>
                       <?php } ?>
                   
                 
                </div>
                </div>
                
                 <?php }elseif($list->checkbox!="" && $list->columnfieldname=="Thickness"){ ?>
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; if($list->isvalid==1){ ?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5 Thicknessdiv">
                
                      <input type="text" name="Thickness" id="Thickness" class="form-control"/>                   
              
                </div>
                
                 <div class="col-lg-5 checkboxdiv">
                  <?php
                   if($list->checkboxvalue!=""){
                  $chkval=$list->checkboxvalue;
                  $chkvalexp=explode(",",$chkval);
                  foreach($chkvalexp as $chkbox){
                  ?>
                  <input type="radio" name="measurement1" id="<?php echo $chkbox; ?>" value="<?php echo $chkbox; ?>" <?php if($chkbox=='pt'){echo 'checked="checked"'; }else{echo 'class="thicknesschkbox"'; } ?>/><p class="spanval"> <?php echo $chkbox; ?></p>
                  <?php }
              } ?>
                
                  </div>
                  </div>
                 <?php }elseif($list->columnfieldname=="Width"){ ?>
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Width" id="Width" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 <?php }elseif($list->columnfieldname=="Height"){ ?>
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Height" id="Height" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 <?php }elseif($list->columnfieldname=="Length") { ?>
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Length" id="Length" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                 <?php }elseif($list->columnfieldname=="CMYK"){ ?>
                 <div class="printcolorhidden">
                  <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <span class="1cmykyes 1cmykcheckbox"><input type="radio" name="printcolor" id="cmykyes"  class="chkbox cmyk" value="1"  />Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5 cmykwidthdiv">
                 <span class="1cmykno 1cmykcheckbox"><input type="radio" name="printcolor" id="cmykno" class="chkbox cmyk" value="0" checked="checked"  />No</span>
                </div>
                </div>
             
             <?php }elseif($list->columnfieldname=="print_color1"){ ?>
              <div class="printcolorhidden" style="display:block;" id="printcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                     <input type="text" name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>"  class="form-control" />
                 </div>
             </div>
              <?php }elseif($list->columnfieldname=="print_color2"){ ?>
              <div class="printcolorhidden" style="display:block;" id="printcolor2">
                <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                     <input type="text" name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>"  class="form-control" />
                 </div>
             </div>
              <?php }elseif($list->columnfieldname=="print_color3"){ ?>
              <div class="printcolorhidden" style="display:block;" id="printcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                     <input type="text" name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>"  class="form-control" />
                 </div>
             </div>
              <?php }elseif($list->columnfieldname=="print_color4"){ ?>
              <div class="printcolorhidden" style="display:block;" id="printcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                     <input type="text" name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>"  class="form-control" />
                 </div>
             </div>
            <?php }elseif($list->columnfieldname=="print_color5"){ ?>
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor5">
                <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                     <input type="text" name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>"  class="form-control" />
                 </div>
             </div>
           <?php }elseif($list->columnfieldname=="print_color6"){ ?>
              <div  class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor6">
                <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                     <input type="text" name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>"  class="form-control" />
                 </div>
             </div>
              <?php }elseif($list->columnfieldname=="print_color7"){ ?>
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor7">
                <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                     <input type="text" name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>"  class="form-control" />
                 </div>
             </div>
              <?php }elseif($list->columnfieldname=="print_color8"){ ?>
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                     <input type="text" name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>"  class="form-control" />
                 </div>
             </div>
                <?php }elseif($list->checkbox!="" && $list->columnfieldname=="Hook") {?>
                   <div class="row"><label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-10">
                 <input type="checkbox" id="<?php echo $list->columnfieldname; ?>" name="<?php echo $list->columnfieldname; ?>"  value="<?php echo $list->columnfieldname; ?>" class="chkselectionproducts" />
                </div>
            </div>
                <?php }elseif($list->checkbox!="" && $list->columnfieldname=="TissuePaper"){ ?>
                   <div class="row"><label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-10">
                 <input type="checkbox" id="<?php echo $list->columnfieldname; ?>" name="<?php echo $list->columnfieldname; ?>"  value="<?php echo $list->fieldname; ?>" class="chkselectionproducts"/>
                </div></div>
                <?php }elseif($list->checkbox!="" && $list->columnfieldname=="PackagingStickers"){ ?>
                   <div class="row"><label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-10">
                 <input type="checkbox" id="<?php echo $list->columnfieldname; ?>" name="<?php echo $list->columnfieldname; ?>"  value="<?php echo $list->fieldname; ?>" class="chkselectionproducts" />
                </div></div>
                 
                <?php }else{ ?>
                 <label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $list->fieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                 <div class="col-lg-5">
                     <input type="text" name="<?php echo $list->columnfieldname; ?>" id="<?php echo $list->columnfieldname; ?>"  class="form-control" />
                 </div>
                
                <?php } ?>
                
                
             
              


    	<?php 
    }
   

    }

// Rajesh
    //Task insert and update step tab process
    public function Addprocessproductsdetails(Request $request)
	{
		
	$user = Auth::user();
	
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 
	 $input = Input::all();

if($request->Hook!=''){

$path = '/data/product';

     		File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);


     		 $imgInp = Input::file('imgInp');

     		if($imgInp!='')
                {
             		echo $destinationPath = $path;
      				echo $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());      				

				}
//Defect:Add 2 fields
//Vidhya:PHP
	$hook = Hook::create($request->all());

	$hook->CustomerID = $request->CustomerName;
	$hook->ProductGroupID = $request->ProductGroup;
	$hook->ProductSubGroupID = $request->ProductSubGroupName;
	$hook->HooksMaterialID = $request->HooksMaterial;
	$hook->QualityReference = $request->QualityReference;
	//sathish 15-03-2018 
  $hook->QualityReferencem  = $request->hook_qty_chk;

	$hook->measurement1 = $request->hook_measurement;
	$hook->MoldCostingCurrency = $request->Currency;
	$hook->MoldCosting = $request->MoldCosting;
	$hook->UniqueProductCode = $request->Hook_UniqueProductCode;
	$hook->Productstatus  = $request->StatusName;

	$hook->ProductionRegionID1  = $request->Hooks_ProductionRegions1;
	$hook->UniqueFactory1  = isset($request->uniquefactory_hooks1)?implode(',',$request->uniquefactory_hooks1):'';
	$hook->ProductionRegionID2  = $request->Hooks_ProductionRegions2;
	$hook->UniqueFactory2  = isset($request->uniquefactory_hooks2)?implode(',',$request->uniquefactory_hooks2):'';
	$hook->ProductionRegionID3  = $request->Hooks_ProductionRegions3;
	$hook->UniqueFactory3  = isset($request->uniquefactory_hooks3)?implode(',',$request->uniquefactory_hooks3):'';
	$hook->Hook_Currency = $request->Hook_Currency;
	$hook->Hook_samplecost = $request->hook_samplecost;
	$hook->status  = $request->Hook_StatusName;
	$hook->Artwork  = $imgInp_filename;

  $hook->save();
}
//Tissue
if($request->TissuePaper!=''){

$path = '/data/product';

     		File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);


     		 $imgInp = Input::file('imgInp1');

     		if($imgInp!='')
                {
             		echo $destinationPath = $path;
      				echo $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());      				

				}

	$Tissuepaper = Tissuepaper::create($request->all());
//Defect:Add 2 fields
//Vidhya:PHP
	$Tissuepaper->CustomerID = $request->CustomerName;
	$Tissuepaper->ProductGroupID = $request->ProductGroup;
	$Tissuepaper->ProductSubGroupID = $request->ProductSubGroupName;
	$Tissuepaper->MaterialID = $request->Tissuepaper_RawMaterial;
	$Tissuepaper->PrintTypeID = $request->Tissuepaper_PrintType;
	$Tissuepaper->CuttingID  = $request->Tissuepaper_Cutting;
	$Tissuepaper->PrintingFinishingProcessID = isset($request->Tissuepaper_PrintingFinishingProcess)?implode(',',$request->Tissuepaper_PrintingFinishingProcess):'';
	$Tissuepaper->Thickness = $request->Tissuepaper_Thickness;
	/*sathish 14-02-2018 */
	$Tissuepaper->measurement1 = $request->tissue_measurement;
	$Tissuepaper->QualityReference  = $request->Tissuepaper_QualityReference;
		//sathish 15-03-2018 
$Tissuepaper->QualityReferencem  = $request->tissueqty_chk;

	$Tissuepaper->Width   = $request->tissuepaper_Width;
	$Tissuepaper->Length   = $request->tissuepaper_Length;
	$Tissuepaper->GroundPaperColor  = $request->GroundPaperColor;

//sathish 15-03-2018	
	$Tissuepaper->CMYK  = $request->tissueprintcolor;
	$Tissuepaper->PrintColor1   = $request->tissuepaper_print_color1;
	$Tissuepaper->PrintColor2  = $request->tissuepaper_print_color2;
	$Tissuepaper->PrintColor3   = $request->tissuepaper_print_color3;
	$Tissuepaper->PrintColor4   = $request->tissuepaper_print_color4;
	$Tissuepaper->PrintColor5   = $request->tissuepaper_print_color5;
	$Tissuepaper->PrintColor6   = $request->tissuepaper_print_color6;
	$Tissuepaper->PrintColor7   = $request->tissuepaper_print_color7;
	$Tissuepaper->PrintColor8   = $request->tissuepaper_print_color8;
	$Tissuepaper->UniqueProductCode   = $request->Tissuepaper_UniqueProductCode;
	$Tissuepaper->ProductionRegionID1  = $request->TissuePaper_ProductionRegions1;
	$Tissuepaper->UniqueFactory1  =isset($request->uniquefactory_tissuepaper1)?implode(',',$request->uniquefactory_tissuepaper1):'';
	$Tissuepaper->ProductionRegionID2  = $request->TissuePaper_ProductionRegions2;
	$Tissuepaper->UniqueFactory2  = isset($request->uniquefactory_tissuepaper2)?implode(',',$request->uniquefactory_tissuepaper2):'';
	$Tissuepaper->ProductionRegionID3  = $request->TissuePaper_ProductionRegions3;
	$Tissuepaper->UniqueFactory3  = isset($request->uniquefactory_tissuepaper3)?implode(',',$request->uniquefactory_tissuepaper3):'';
	$Tissuepaper->Tissue_CurrencyID = $request->Tissuepaper_Currency;
	$Tissuepaper->Tissue_Samplecost = $request->Tissue_samplecost;
	$Tissuepaper->Productstatus   = $request->Tissuepaper_StatusName;
	$Tissuepaper->Version   = 1;
	$Tissuepaper->status   = 1;
	$Tissuepaper->Artwork  = $imgInp_filename;

  $Tissuepaper->save();
}

if($request->PackagingStickers!=''){

$path = '/data/product';

     		File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);


     		 $imgInp = Input::file('imgInp2');

     		if($imgInp!='')
                {
             		echo $destinationPath = $path;
      				echo $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());      				

				}

	$PackagingStickers = PackagingStickers::create($request->all());
//Defect:Add 2 fields
//Vidhya:PHP
	$PackagingStickers->CustomerID = $request->CustomerName;
	$PackagingStickers->ProductGroupID = $request->ProductGroup;
	$PackagingStickers->ProductSubGroupID = $request->ProductSubGroupName;
	$PackagingStickers->TypeofStickerID = $request->PackagingStickersTypes;
	$PackagingStickers->MaterialID = $request->Package_RawMaterial;
	$PackagingStickers->PrintTypeID = $request->Package_PrintType;
	$PackagingStickers->CuttingID  = $request->Package_Cutting;
	$PackagingStickers->PrintingFinishingProcessID = isset($request->Package_PrintingFinishingProcess)?implode(',',$request->Package_PrintingFinishingProcess):'';
	$PackagingStickers->Thickness = $request->PackageThickness;

	//sathish 14-02-2018
	$PackagingStickers->measurement1 = $request->package_measurement;
	$PackagingStickers->QualityReference  = $request->Package_QualityReference;

	//sathish 15-03-2018 QualityReferencem  = $request->qty_chk
	$PackagingStickers->QualityReferencem  = $request->packageqty_chk;

	$PackagingStickers->Width   = $request->package_Width;
	$PackagingStickers->Length   = $request->package_Length;
	$PackagingStickers->AdhesiveID  = $request->TypeofAdhesive;
	$PackagingStickers->Shape  = $request->Shape;
	$PackagingStickers->CMYK  = $request->packagecmykyes;

	$PackagingStickers->PrintColor1   = $request->packageprint_color1;
	$PackagingStickers->PrintColor2  = $request->packageprint_color2;
	$PackagingStickers->PrintColor3   = $request->packageprint_color3;
	$PackagingStickers->PrintColor4   = $request->packageprint_color4;
	$PackagingStickers->PrintColor5   = $request->packageprint_color5;
	$PackagingStickers->PrintColor6   = $request->packageprint_color6;
	$PackagingStickers->PrintColor7   = $request->packageprint_color7;
	$PackagingStickers->PrintColor8   = $request->packageprint_color8;
	
	$PackagingStickers->ProductionRegionID1  = $request->PackagingStickers_ProductionRegions1;
	$PackagingStickers->UniqueFactory1  = isset($request->uniquefactory_packagingstickers1)?implode(',',$request->uniquefactory_packagingstickers1):'';
	$PackagingStickers->ProductionRegionID2  = $request->PackagingStickers_ProductionRegions2;
	$PackagingStickers->UniqueFactory2  = isset($request->uniquefactory_packagingstickers2)?implode(',',$request->uniquefactory_packagingstickers2):'';
	$PackagingStickers->ProductionRegionID3  = $request->PackagingStickers_ProductionRegions3;
	$PackagingStickers->UniqueFactory3  = isset($request->uniquefactory_packagingstickers3)?implode(',',$request->uniquefactory_packagingstickers3):'';
	$PackagingStickers->Pack_CurrencyID = $request->Package_currency;
	$PackagingStickers->Pack_Samplecost = $request->Pack_samplecost;
	$PackagingStickers->Productstatus   = $request->Package_StatusName;
	
	
	$PackagingStickers->Version   = 1;
	$PackagingStickers->status   = 1;
	$PackagingStickers->Artwork  = $imgInp_filename;

  $PackagingStickers->save();
}


$Boxes=Boxes::create($request->all());


$Boxes->CustomerID = $request->CustomerName;
	$Boxes->RawMaterialID = $request->RawMaterial;
	$Boxes->PrintTypeID = $request->PrintType;
	$Boxes->CuttingID  = $request->CuttingName;
	$Boxes->PrintingFinishingProcessID = isset($request->Finishing_Process)?implode(',',$request->Finishing_Process):'';
	
	$Boxes->HookID = isset($hook->id)?'Hook':0;
	$Boxes->TissuePaperID = isset($Tissuepaper->id)?'TissuePaper':0;
	$Boxes->PackagingStickersID = isset($PackagingStickers->id)?'PackagingStickers':0;
	$Boxes->CurrencyID = $request->boxCurrency;
$Boxes->Sample_costing = $request->box_Samplecost;
	//sathish 14-03-2018	
	$Boxes->measurement1 = $request->measurement1;
	$Boxes->QualityReference   = $request->qty_ref;
	$Boxes->QualityReferencem   = $request->qty_chk;
//sathish 14-03-2018
$Boxes->CMYK   =$request->printcolor;

	$Boxes->PrintColor1   = $request->print_color1;
	$Boxes->PrintColor2   = $request->print_color2;
	$Boxes->PrintColor3   = $request->print_color3;
	$Boxes->PrintColor4   = $request->print_color4;
	$Boxes->PrintColor5   = $request->print_color5;
	$Boxes->PrintColor6   = $request->print_color6;
	$Boxes->PrintColor7   = $request->print_color7;
	$Boxes->PrintColor8   = $request->print_color8;
	$Boxes->ProductionRegionID1   = $request->ProductionRegions1;
	$Boxes->UniqueFactory1   = isset($request->uniquefactory1)?implode(',',$request->uniquefactory1):'';
	$Boxes->ProductionRegionID2   = $request->ProductionRegions2;
	$Boxes->UniqueFactory2   = isset($request->uniquefactory2)?implode(',',$request->uniquefactory2):'';
	$Boxes->ProductionRegionID3   = $request->ProductionRegions3;
	$Boxes->UniqueFactory3   = isset($request->uniquefactory3)?implode(',',$request->uniquefactory3):'';
	$imgInp = Input::file('imgInp3');
			//$imgInp=$request->imgInp3;

			$path = '/data/product';
			 if($imgInp!='')
                {
             		$destinationPath = $path;
      				$imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());      				

				}

				$Boxes->Artwork  = $imgInp_filename;
	$Boxes->status   = 1;

$Boxes->save();


$ProductDetails = ProductDetails::create($request->all());

$ProductDetails->CustomerID= $request->CustomerName;
	$ProductDetails->CustomerWareHouseID = $request->Warehouse_Name;
	$ProductDetails->HookID = isset($hook->id)?$hook->id:0;
	$ProductDetails->TissuePaperID =isset($Tissuepaper->id)?$Tissuepaper->id:0;
	$ProductDetails->PackagingStickersID =isset($PackagingStickers->id)?$PackagingStickers->id:0;
	$ProductDetails->BoxID = isset($Boxes->id)?$Boxes->id:0;
	$ProductDetails->ProductGroupID = $request->ProductGroup;
	$ProductDetails->ProductSubGroupID = $request->ProductSubGroupName;
	$ProductDetails->ProductstatusID  = $request->StatusName;
	$ProductDetails->ProductProcessID = $request->ProductProcess;
	$ProductDetails->CurrencyID = $request->Currency;
	$ProductDetails->UnitofMeasurementID = $request->UnitofMeasurement;
	$ProductDetails->InventoryID  = $request->Inventory;

	$ProductDetails->UniqueFactoryName1  = $request->inventoryuniquefactory1;

	$ProductDetails->UniqueFactory1  = $request->inventoryProductionRegions1;
	$ProductDetails->CustomerProductName  = $request->productname;
	$ProductDetails->CustomerProductCode  = $request->productcode;
	$ProductDetails->UniqueProductCode  = $request->uniqueproductcode;
	$ProductDetails->Description   = $request->description;
	$ProductDetails->StyleNumber  = $request->stylenumber;
	$ProductDetails->SampleandQuote= $request->samplequote;

	$ProductDetails->MinimumOrderQuantity= $request->MinQuantity;
	$ProductDetails->MinimumOrderValue= $request->Minordervalue;
	$ProductDetails->PackSize= $request->packsize;
	$ProductDetails->SellingPrice= $request->samplecost;
	$ProductDetails->QuantityMOQ= implode('#', $request->quantitychk);
// sathish 15-03-2018 disabled line
	//$ProductDetails->Cost= implode('#', $request->input1);


	$ProductDetails->Suggested_price= implode('#', $request->input2);
	$ProductDetails->status  = 1;
	$ProductDetails->Brand  = $request->brand;
	$ProductDetails->ProgramName  = $request->programname;
	$ProductDetails->Margin=$request->input0;

	
	$ProductDetails->PricingMethod=$request->PricingMethod;
	$ProductDetails->ExWorks=$request->exworks; 
	$ProductDetails->FOB=$request->fob; 

	$ProductDetails->Projection = $request->inventoryProjection;

//sathish 14-03-2018

	$ProductDetails->ProductionRegionID1=$request->inventoryProductionRegions1;
	
	$ProductDetails->UniqueFactory1= isset($request->inventoryuniquefactory1)?implode(',',$request->inventoryuniquefactory1):'';
	
	//$ProductDetails->UniqueFactory1=$request->inventoryuniquefactory1;
	

	$ProductDetails->ProductionRegionID2=$request->inventoryProductionRegions2;

$ProductDetails->UniqueFactory2   = isset($request->inventoryuniquefactory2)?implode(',',$request->inventoryuniquefactory2):'';

	//$ProductDetails->UniqueFactory2=$request->inventoryuniquefactory2;

	$ProductDetails->ProductionRegionID3=$request->inventoryProductionRegions3;
	$ProductDetails->UniqueFactory3   = isset($request->inventoryuniquefactory3)?implode(',',$request->inventoryuniquefactory3):'';

	//$ProductDetails->UniqueFactory3=$request->inventoryuniquefactory3;


	$ProductDetails->Maximumpiecesonstock=$request->inventoryMaximumpiecesonstock;
	$ProductDetails->Minimumpiecesonstock=$request->inventoryMinimumpiecesonstock;

//sathish 17-03-2018

$ProductDetails->SeasonID=$request->Season;
$ProductDetails->RemarksInstructions=$request->Remarks;

$ProductDetails->Version=$request->version;


	$imgInp = Input::file('imgInpsample');
			//$imgInp=$request->imgInp3;

			$path = '/data/product';
			 if($imgInp!='')
                {
             		$destinationPath = $path;
      				$imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());      				

				}

				$ProductDetails->Artworkupload  = $imgInp_filename;



$ProductDetails->save();



$page = Boxes::find($Boxes->id);

// Make sure you've got the Page model
if($page) {
    $page->productID = $ProductDetails->id;
    $page->save();
}
if(isset($hook->id)){
$page = Hook::find($hook->id);

// Make sure you've got the Page model
if($page) {
    $page->productID = $ProductDetails->id;
    $page->save();
}
}
if(isset($Tissuepaper->id)){
$page = Tissuepaper::find($Tissuepaper->id);

// Make sure you've got the Page model
if($page) {
    $page->productID = $ProductDetails->id;
    $page->save();
}
}
if(isset($PackagingStickers->id)){
$page = PackagingStickers::find($PackagingStickers->id);

// Make sure you've got the Page model
if($page) {
    $page->productID = $ProductDetails->id;
    $page->save();
}
}


		 $season = Season::where('status','=','1')->get();
         $status = Status::where('status','=','1')->get();
         $customerdetails = Customers::where('status','=','1')->get();

         $productgroupdetails = ProductGroup::where('status','=','1')->get();
         $productsubgroupdetails = ProductSubGroup::where('status','=','1')->get();

         $productprocess = ProductProcess::where('status','=','1')->get();

//$request->session()->flash('success', 'Information added successfully.');
	 //return view('users.developmentlist', compact('user','usertype','productlist','season','status','customerdetails','productgroupdetails','productsubgroupdetails','productprocess'));

//return redirect(url(route('user.developmentlist'))); 

//Defect: 
         //Name: Bala-Uniquegroup Team
         //Desc. Send product details through Email
		 
         $productdetails = ProductDetails::where('id','=',$ProductDetails->id)->first();

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

	$boxesdetails=Boxes::where('ProductID','=',$ProductDetails->id)->where('status','=',1)->first();
	  
	  //print_r($request->editID);exit;
	  
	  
	  $hookdetails=Hook::where('ProductID','=',$ProductDetails->id)->where('status','=',1)->first();
	  
	  $tissuepaperdetails=Tissuepaper::where('ProductID','=',$ProductDetails->id)->where('status','=',1)->first();
	  
	  $packagingstickersdetails=PackagingStickers::where('ProductID','=',$ProductDetails->id)->where('status','=',1)->first();

$productquotedetails=ProductDetails::where('id','=',$ProductDetails->id)->where('status','=',1)->first();
	
	


		
		

/*return view('users.email_template',compact('user','usertype','productfielddetails','producthookfields','productdevelopmentsubgroupdetails','prddevsubgrouppackagingdetails','inventorydetails','inven_productfielddetails','invendetails_productfielddetails','quantitydetails','cost_productfielddetails','productdetails','productdevelopmentfields','boxesdetails','hookdetails','tissuepaperdetails','packagingstickersdetails','productinventorydetails','productquotedetails'));*/

//return Redirect::route('user.email_template', ['user' =>  $user, 'usertype' => $usertype, 'productdetails' => $productdetails]);
return redirect(url('sendemail/'.$ProductDetails->id)); 


	 
	}

	 public function Editproductlist(Request $request,$id)
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
	  
	  
	  $hookdetails=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
	  
	  $tissuepaperdetails=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
	  
	  $packagingstickersdetails=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();

$productquotedetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
$productinventorydetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();

//sathis 14-03-2018

        return view('users.edit_productlist', compact('user','usertype','productfielddetails','producthookfields','productdevelopmentsubgroupdetails','prddevsubgrouppackagingdetails','inventorydetails','inven_productfielddetails','invendetails_productfielddetails','quantitydetails','cost_productfielddetails','productdetails','productdevelopmentfields','boxesdetails','hookdetails','tissuepaperdetails','packagingstickersdetails','productinventorydetails','productquotedetails'));
	 
	  
		
	}

	public function Updateprocessproductsdetails(Request $request)
	{
	$user = Auth::user();
	
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 
	 $input = Input::all();

if(isset($request->hook_editID)){

	$hook = Hook::find($request->hook_editID);
//Defect:Add 2 fields
//Vidhya:PHP
if($hook) {
 
$path = '/data/product';

     		File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);


     		 $imgInp = Input::file('imgInp');

     		if($imgInp!='')
                {
             		echo $destinationPath = $path;
      				echo $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());      				

				}else{
					if($request->existingimage){
      				 $imgInp_filename=$request->existingimage;      				

					}else{
      				 $imgInp_filename='';      				

					}
				}

	

	$hook->CustomerID = $request->CustomerName;
	
	$hook->HooksMaterialID = $request->HooksMaterial;
	$hook->QualityReference = $request->QualityReference;

	//sathish 15-03-2018 

 $hook->QualityReferencem  = $request->hook_qty_chk;

	$hook->measurement1 = $request->hook_measurement;
	$hook->MoldCostingCurrency = $request->Currency;
	$hook->MoldCosting = $request->MoldCosting;
	$hook->UniqueProductCode = $request->Hook_UniqueProductCode;
	$hook->Productstatus  = $request->StatusName;

	$hook->ProductionRegionID1  = $request->Hooks_ProductionRegions1;
	$hook->UniqueFactory1  = isset($request->uniquefactory_hooks1)?implode(',',$request->uniquefactory_hooks1):'';
	$hook->ProductionRegionID2  = $request->Hooks_ProductionRegions2;
	$hook->UniqueFactory2  = isset($request->uniquefactory_hooks2)?implode(',',$request->uniquefactory_hooks2):'';
	$hook->ProductionRegionID3  = $request->Hooks_ProductionRegions3;
	$hook->UniqueFactory3  = isset($request->uniquefactory_hooks3)?implode(',',$request->uniquefactory_hooks3):'';
	$hook->Hook_Currency = $request->Hook_Currency;
	$hook->Hook_samplecost = $request->hook_samplecost;
	$hook->status  = $request->Hook_StatusName;
	$hook->Artwork  = $imgInp_filename;


    $hook->save();
}
}
//Tissue
if(isset($request->tissuepapereditID)){

$Tissuepaper = Tissuepaper::find($request->tissuepapereditID);

// Make sure you've got the Page model
if($Tissuepaper) {
$path = '/data/product';

     		File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);


     		 $imgInp = Input::file('imgInp1');

     		if($imgInp!='')
                {
             		echo $destinationPath = $path;
      				echo $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());      				

				}else{
					if($request->selectimage1!=''){
      				$imgInp_filename=$request->selectimage1;     				
					}else{
						$imgInp_filename='';
					}
				}

	//$Tissuepaper = Tissuepaper::create($request->all());
	//Defect:Add 2 fields
//Vidhya:PHP

	$Tissuepaper->CustomerID = $request->CustomerName;
	
	$Tissuepaper->MaterialID = $request->Tissuepaper_RawMaterial;
	$Tissuepaper->PrintTypeID = $request->Tissuepaper_PrintType;
	$Tissuepaper->CuttingID  = $request->Tissuepaper_Cutting;
	$Tissuepaper->PrintingFinishingProcessID = isset($request->Tissuepaper_PrintingFinishingProcess)?implode(',',$request->Tissuepaper_PrintingFinishingProcess):'';
	$Tissuepaper->Thickness = $request->Tissuepaper_Thickness;
	$Tissuepaper->measurement1 = $request->tissue_measurement;
	$Tissuepaper->QualityReference  = $request->Tissuepaper_QualityReference;

	//sathish 15-03-2018 
$Tissuepaper->QualityReferencem  = $request->tissueqty_chk;

	$Tissuepaper->Width   = $request->tissuepaper_Width;
	$Tissuepaper->Length   = $request->tissuepaper_Length;
	$Tissuepaper->GroundPaperColor  = $request->GroundPaperColor;
	//sathish 15-03-2018
	$Tissuepaper->CMYK  = $request->tissueprintcolor;

	$Tissuepaper->PrintColor1   = $request->tissuepaper_print_color1;
	$Tissuepaper->PrintColor2  = $request->tissuepaper_print_color2;
	$Tissuepaper->PrintColor3   = $request->tissuepaper_print_color3;
	$Tissuepaper->PrintColor4   = $request->tissuepaper_print_color4;
	$Tissuepaper->PrintColor5   = $request->tissuepaper_print_color5;
	$Tissuepaper->PrintColor6   = $request->tissuepaper_print_color6;
	$Tissuepaper->PrintColor7   = $request->tissuepaper_print_color7;
	$Tissuepaper->PrintColor8   = $request->tissuepaper_print_color8;
	$Tissuepaper->UniqueProductCode   = $request->Tissuepaper_UniqueProductCode;
	$Tissuepaper->ProductionRegionID1  = $request->TissuePaper_ProductionRegions1;
	$Tissuepaper->UniqueFactory1  = isset($request->uniquefactory_tissuepaper1)?implode(',',$request->uniquefactory_tissuepaper1):'';
	$Tissuepaper->ProductionRegionID2  = $request->TissuePaper_ProductionRegions2;
	$Tissuepaper->UniqueFactory2  = isset($request->uniquefactory_tissuepaper2)?implode(',',$request->uniquefactory_tissuepaper2):'';
	$Tissuepaper->ProductionRegionID3  = $request->TissuePaper_ProductionRegions3;
	$Tissuepaper->UniqueFactory3  = isset($request->uniquefactory_tissuepaper3)?implode(',',$request->uniquefactory_tissuepaper3):'';
	$Tissuepaper->Tissue_CurrencyID = $request->Tissuepaper_Currency;
	$Tissuepaper->Tissue_Samplecost = $request->Tissue_samplecost;
	$Tissuepaper->Productstatus   = $request->Tissuepaper_StatusName;
	$Tissuepaper->Version   = 1;
	$Tissuepaper->status   = 1;
	$Tissuepaper->Artwork  = $imgInp_filename;

  $Tissuepaper->save();
}
}

if(isset($request->packagingeditID)){

$PackagingStickers = PackagingStickers::find($request->packagingeditID);

// Make sure you've got the Page model
if($PackagingStickers) {
$path = '/data/product';


     		File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);


     		 $imgInp = Input::file('imgInp2');

     		if($imgInp!='')
                {
             		echo $destinationPath = $path;
      				echo $imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());      				

				}else{
					if($request->selectimage!=''){
      				$imgInp_filename=$request->selectimage;     				
					}else{
						$imgInp_filename='';
					}
				}

	//$PackagingStickers = PackagingStickers::create($request->all());
//Defect:Add 2 fields
//Vidhya:PHP
	$PackagingStickers->CustomerID = $request->CustomerName;
	
	$PackagingStickers->TypeofStickerID = $request->PackagingStickersTypes;
	$PackagingStickers->MaterialID = $request->Package_RawMaterial;
	$PackagingStickers->PrintTypeID = $request->Package_PrintType;
	$PackagingStickers->CuttingID  = $request->Package_Cutting;
	$PackagingStickers->PrintingFinishingProcessID = isset($request->Package_PrintingFinishingProcess)?implode(',',$request->Package_PrintingFinishingProcess):'';
	$PackagingStickers->Thickness = $request->PackageThickness;
	$PackagingStickers->measurement1 = $request->package_measurement;
	$PackagingStickers->QualityReference  = $request->Package_QualityReference;

	//sathish 15-03-2018 QualityReferencem  = $request->qty_chk
	$PackagingStickers->QualityReferencem  = $request->packageqty_chk;

	$PackagingStickers->Width   = $request->package_Width;
	$PackagingStickers->Length   = $request->package_Length;
	$PackagingStickers->AdhesiveID  = $request->TypeofAdhesive;
	$PackagingStickers->Shape  = $request->Shape;
	$PackagingStickers->CMYK  = $request->packageprintcolor;
	
	$PackagingStickers->PrintColor1   = $request->packageprint_color1;
	$PackagingStickers->PrintColor2  = $request->packageprint_color2;
	$PackagingStickers->PrintColor3   = $request->packageprint_color3;
	$PackagingStickers->PrintColor4   = $request->packageprint_color4;
	$PackagingStickers->PrintColor5   = $request->packageprint_color5;
	$PackagingStickers->PrintColor6   = $request->packageprint_color6;
	$PackagingStickers->PrintColor7   = $request->packageprint_color7;
	$PackagingStickers->PrintColor8   = $request->packageprint_color8;
	
	$PackagingStickers->ProductionRegionID1  = $request->PackagingStickers_ProductionRegions1;
	$PackagingStickers->UniqueFactory1  = isset($request->uniquefactory_packagingstickers1)?implode(',',$request->uniquefactory_packagingstickers1):'';
	$PackagingStickers->ProductionRegionID2  = $request->PackagingStickers_ProductionRegions2;
	$PackagingStickers->UniqueFactory2  = isset($request->uniquefactory_packagingstickers2)?implode(',',$request->uniquefactory_packagingstickers2):'';
	$PackagingStickers->ProductionRegionID3  = $request->PackagingStickers_ProductionRegions3;
	$PackagingStickers->UniqueFactory3  = isset($request->uniquefactory_packagingstickers3)?implode(',',$request->uniquefactory_packagingstickers3):'';
	$PackagingStickers->Pack_CurrencyID = $request->Package_currency;
	$PackagingStickers->Pack_Samplecost = $request->Pack_samplecost;
	$PackagingStickers->Productstatus   = $request->Package_StatusName;

	$PackagingStickers->Version   = 1;
	$PackagingStickers->status   = 1;
	$PackagingStickers->Artwork  = $imgInp_filename;

  $PackagingStickers->save();
}
}
if(isset($request->box_editID)){
$Boxes = Boxes::find($request->box_editID);

// Make sure you've got the Page model
if($Boxes) {
//$Boxes=Boxes::create($request->all());
//Defect:Add 2 fields
//Vidhya:PHP

$Boxes->CustomerID = $request->CustomerName;
	$Boxes->RawMaterialID = $request->RawMaterial;
	$Boxes->PrintTypeID = $request->PrintType;
	$Boxes->CuttingID  = $request->CuttingName;
	$Boxes->PrintingFinishingProcessID = isset($request->Finishing_Process)?implode(',',$request->Finishing_Process):'';
	
	//sathish 14-03-2018
	$Boxes->measurement1 = $request->measurement1;
	$Boxes->QualityReference   = $request->qty_ref;
	$Boxes->QualityReferencem   = $request->qty_chk;

//sathish 14-03-2018	
$Boxes->CMYK = $request->printcolor;

	$Boxes->PrintColor1   = $request->print_color1;
	$Boxes->PrintColor2   = $request->print_color2;
	$Boxes->PrintColor3   = $request->print_color3;
	$Boxes->PrintColor4   = $request->print_color4;
	$Boxes->PrintColor5   = $request->print_color5;
	$Boxes->PrintColor6   = $request->print_color6;
	$Boxes->PrintColor7   = $request->print_color7;
	$Boxes->PrintColor8   = $request->print_color8;
	$Boxes->ProductionRegionID1   = $request->ProductionRegions1;
	$Boxes->UniqueFactory1   = isset($request->uniquefactory1)?implode(',',$request->uniquefactory1):'';
	$Boxes->ProductionRegionID2   = $request->ProductionRegions2;
	$Boxes->UniqueFactory2   = isset($request->uniquefactory2)?implode(',',$request->uniquefactory2):'';
	$Boxes->ProductionRegionID3   = $request->ProductionRegions3;
	$Boxes->UniqueFactory3   = isset($request->uniquefactory3)?implode(',',$request->uniquefactory3):'';
	$Boxes->CurrencyID = $request->boxCurrency;
	$Boxes->Sample_costing = $request->box_Samplecost;
	$imgInp = Input::file('imgInp3');
			//$imgInp=$request->imgInp3;
$path = '/data/product';
			
			 if($imgInp!='')
                {
             		$destinationPath = $path;
      				$imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());  
				}else{
					if($request->selectimage3!=''){
      				$imgInp_filename=$request->selectimage3;     				
					}else{
						$imgInp_filename='';
					}
				}

				$Boxes->Artwork  = $imgInp_filename;
	$Boxes->status   = 1;

$Boxes->save();
}
}
$ProductDetails = ProductDetails::find($request->editID);

// Make sure you've got the Page model
if($ProductDetails) {

//$ProductDetails = ProductDetails::create($request->all());

$ProductDetails->CustomerID= $request->CustomerName;
	$ProductDetails->CustomerWareHouseID = $request->Warehouse_Name;
	
	
	
	$ProductDetails->ProductstatusID  = $request->StatusName;
	$ProductDetails->ProductProcessID = $request->ProductProcess;
	$ProductDetails->CurrencyID = $request->Currency;
	$ProductDetails->UnitofMeasurementID = $request->UnitofMeasurement;
	$ProductDetails->InventoryID  = $request->Inventory;

	$ProductDetails->UniqueFactoryName1  = $request->inventoryuniquefactory1;

	$ProductDetails->UniqueFactory1  = $request->inventoryProductionRegions1;
	$ProductDetails->CustomerProductName  = $request->productname;
	$ProductDetails->CustomerProductCode  = $request->productcode;
	$ProductDetails->UniqueProductCode  = $request->uniqueproductcode;
	$ProductDetails->Description   = $request->description;
	$ProductDetails->StyleNumber  = $request->stylenumber;
	$ProductDetails->SampleandQuote= $request->samplequote;

	$ProductDetails->MinimumOrderQuantity= $request->MinQuantity;
	$ProductDetails->MinimumOrderValue= $request->Minordervalue;
	$ProductDetails->PackSize= $request->packsize;
	$ProductDetails->SellingPrice= $request->samplecost;
	$ProductDetails->QuantityMOQ= implode('#', $request->quantitychk);
	//sathish 15-03-2018
	//$ProductDetails->Cost= implode('#', $request->input1);
	$ProductDetails->Suggested_price= implode('#', $request->input2);
	$ProductDetails->status  =1;
	$ProductDetails->Brand  = $request->brand;
	$ProductDetails->ProgramName  = $request->programname;
	$ProductDetails->Margin=$request->input0;

	
	$ProductDetails->PricingMethod=$request->PricingMethod;
	$ProductDetails->ExWorks=$request->exworks; 
	$ProductDetails->FOB=$request->fob; 
	$ProductDetails->UniqueProductCode=$request->uniqueproductcode; 


$ProductDetails->Projection = $request->inventoryProjection;

	$ProductDetails->ProductionRegionID1=$request->inventoryProductionRegions1;

	$ProductDetails->UniqueFactory1= isset($request->inventoryuniquefactory1)?implode(',',$request->inventoryuniquefactory1):'';

	//$ProductDetails->UniqueFactory1=$request->inventoryuniquefactory1;

	$ProductDetails->ProductionRegionID2=$request->inventoryProductionRegions2;

$ProductDetails->UniqueFactory2= isset($request->inventoryuniquefactory2)?implode(',',$request->inventoryuniquefactory2):'';

	//$ProductDetails->UniqueFactory2=$request->inventoryuniquefactory2;

	$ProductDetails->ProductionRegionID3=$request->inventoryProductionRegions3;

	$ProductDetails->UniqueFactory3= isset($request->inventoryuniquefactory3)?implode(',',$request->inventoryuniquefactory3):'';

	//$ProductDetails->UniqueFactory3=$request->inventoryuniquefactory3;

	$ProductDetails->Maximumpiecesonstock=$request->inventoryMaximumpiecesonstock;
	$ProductDetails->Minimumpiecesonstock=$request->inventoryMinimumpiecesonstock;

//sathish 13-03-2018/14-03-2018
	//task:missing values
$ProductDetails->SeasonID=$request->Season;
$ProductDetails->RemarksInstructions=$request->Remarks;
$ProductDetails->Version=$request->version;
//end

	$imgInp = Input::file('imgInpsample');
			//$imgInp=$request->imgInp3;
$path = '/data/product';
			
			 if($imgInp!='')
                {
             		$destinationPath = $path;
      				$imgInp_filename=$imgInp->storeAs($destinationPath,$imgInp->getClientOriginalName());      				

				}else{
					if($request->sampleselectimage3!=''){
      				$imgInp_filename=$request->sampleselectimage3;     				
					}else{
						$imgInp_filename='';
					}
				}

				$ProductDetails->Artworkupload  = $imgInp_filename;
				$ProductDetails->SampleRequestedDate  = $request->SampleRequestedDate;



$ProductDetails->save();

}

		 

$request->session()->flash('success', 'Information Updated successfully.');
	 

if(isset($request->editlistitem)){
return redirect(url(route('user.developmentlistview'))); 

}else{
//$request->session()->flash('success', 'Productdetails Updated successfully.');
	
return redirect(url(route('user.developmentlist'))); 
}

	 }

}

?>