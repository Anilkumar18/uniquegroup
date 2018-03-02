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
	
	      //echo "stylenumber".$stylenumber;
	 //echo "sampleandquote".$request->samplequote;
	 
	 //exit;
	     
		/*$productdetails_insert = ProductDetails::create(['CustomerID'=>$request->CustomerName,
		'CustomerWareHouseID'=>$request->Warehouse_Name,
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
	
	  
	  //$imgInp = Input::all();
	 
		//$data=$request->selectimage3;
		//$data=$request->cmykyes;
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
		
		 $customerid=Session::get('customerid');
	     $productid=Session::get('productlastrecordid');
		 
		$productdetailsupdate=DB::table('productdetails')
            ->where('id',$request->editID)
            ->update(['InventoryID' => $request->Inventory,
			'Projection' => $request->Projection,
			'ProductionRegionID1'=>$productionregion1,
			'UniqueFactory1'=>$uniquefactory1details,
			'ProductionRegionID2'=>$productionregion2,
			'UniqueFactory2'=>$uniquefactory2details,
			'ProductionRegionID3'=>$productionregion3,
			'UniqueFactory3'=>$uniquefactory3details,
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
			'Projection' => $request->Projection,
			'ProductionRegionID1'=>$productionregion1,
			'UniqueFactory1'=>$uniquefactory1details,
			'ProductionRegionID2'=>$productionregion2,
			'UniqueFactory2'=>$uniquefactory2details,
			'ProductionRegionID3'=>$productionregion3,
			'UniqueFactory3'=>$uniquefactory3details,
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
		
		session()->forget('customerid');
		session()->forget('productlastrecordid');
		session()->forget('productgroupid');
		session()->forget('productsubgroupid');
		session()->forget('lastquoteinsertid');
		
		   
		
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
  
   

}

?>