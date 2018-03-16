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

use App\Quote;

use App\Hook;

use App\OfficeFactoryAddress;

use DB;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;


use File;
use URL;

class ProductGroupsController extends Controller

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

   public function AddProductGroupshooklist(Request $request)
   {
	   
	   $user = Auth::user();
	   $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	    $customerid=Session::get('customerid');
		$productid=Session::get('productlastrecordid');
		$productgroupid=Session::get('productgroupid');
		$productsubgroupid=Session::get('productsubgroupid');
		$lastinsertedproductid=Session::get('productlastrecordid');
		
		
		
		
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
	   $productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',3)->get();
	    $inventorydetails=Inventory::where('status','=',1)->get();
		$officefactorydetails=OfficeFactoryAddress::where('status','=',1)->get();
		
		$productinventorydetails=ProductDetails::where('id','=',$productid)->where('status','=',1)->first();
		
			
			}
			else
			{
				 $hooksinsertions=DB::select('call sp_CRUDhooks(1,0,'.$customerid.',
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
				   "'.$imgInp_filename.'",
				   1)');
				
				
				
				
			}
	   $hookselectedlastinsertedid=DB::select('call sp_CRUDhooks(2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)');
		
		foreach($hookselectedlastinsertedid as $hookdetails)
		{
		$productdetailsupdate=DB::table('productdetails')
            ->where('id',$lastinsertedproductid)
            ->update(['HookID' => $hookdetails->id]);
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
			else
			{
		 $tissuepaperinsertions=DB::select('call sp_CRUDtissuepaper(1,0,'.$customerid.',
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
		 '.$TissuePaper_ProductionRegions2.',
	    "'.$uniquefactory_tissuepaper2details.'",
	   '.$request->Tissuepaper_StatusName.',
	   1,
	   "'.$imgInp_filename1.'",
		1)');
		
	}
			//echo "testtissuepaper";exit;
			$selecttissuepaperlastinsertedid=DB::select('call sp_CRUDtissuepaper(2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)');
			
			foreach($selecttissuepaperlastinsertedid as $tissuepaperdetails)
		{
		$productdetailsupdate=DB::table('productdetails')
            ->where('id',$lastinsertedproductid)
            ->update(['TissuePaperID' => $tissuepaperdetails->id]);
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
	else
	{	
	$productboxesinsertions=DB::select('call sp_CRUDpackagingstickers(1,0,'.$customerid.',
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
	1,
	"'.$imgInp_filename.'",
	1)');
	
	}
			
        // exit;	
		 $selectpackagingstickerslastinsertedid=DB::select('call sp_CRUDpackagingstickers(2,0,0,0,0,0,0,0,0,0,0,0,0,
	0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)');
			
			foreach($selectpackagingstickerslastinsertedid as $packagestickersdetails)
		{
		$productdetailsupdate=DB::table('productdetails')
            ->where('id',$lastinsertedproductid)
            ->update(['PackagingStickersID' => $packagestickersdetails->id]);
		}
		 		
				
				
				
				
		
		
	}
	
	
	
	
	
	if($request->editID || $request->tissuepapereditID || $request->packagingeditID)
	{
		//echo "Boxes Image upload"; exit;
		$imgInp3 = Input::file('imgInp3');
		if($imgInp3!='')
                {
             		$destinationPath = $path;
      				$imgInp_filename3=$imgInp3->storeAs($destinationPath,$imgInp3->getClientOriginalName()); 
					//echo "Entered";
					
					$productid=Session::get('productlastrecordid');
					$selboxid=ProductDetails::where('id','=',$productid)->first();
					
					//print_r($selboxid);exit;
					
				 $productdetailsupdate=DB::table('boxes')
					->where('ProductID',$productid)
					->update(['Artwork' =>$imgInp_filename3]);
					
					
					  
			 
				}
				else
				{
					$productid=Session::get('productlastrecordid');
					$selboxid=ProductDetails::where('id','=',$productid)->first();
					$boximagesval=$request->existingboximage;
					
					$productdetailsupdate=DB::table('boxes')
					->where('ProductID',$productid)
					->update(['Artwork' =>$boximagesval]);
					
					//echo "echo updated";exit;
					
					
				}
				//echo "box image uploaded".$imgInp_filename3;echo "EditID".$productid;echo "boxid".$selboxid->BoxID;exit;
		
		
	}
	else
	{
			
			$imgInp3 = Input::file('imgInp3');
		$productboxeslastrecordid=DB::select('call sp_CRUDboxes(3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
0,0,0,0,0,0,0,0)');


			if($imgInp3!='')
                {
             		$destinationPath = $path;
      				$imgInp_filename3=$imgInp3->storeAs($destinationPath,$imgInp3->getClientOriginalName());  
					
				 foreach($productboxeslastrecordid as $boxdetails)
				   {
					 $productdetailsupdate=DB::table('boxes')
					->where('id',$boxdetails->id)
					->update(['Artwork' => $imgInp_filename3]);
					
					 $productdetailsupdate=DB::table('productdetails')
					->where('id',$productid)
					->update(['BoxID' => $boxdetails->id]);
					
					
					
					   }
			 
				}
	}
		//echo "uploaded box image";exit;
		 if($request->editID || $request->tissuepapereditID || $request->packagingeditID)
		{
			// echo "Its Entered updated fields"; exit;
			 
	    $productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',3)->get();
	    $inventorydetails=Inventory::where('status','=',1)->get();
		$officefactorydetails=OfficeFactoryAddress::where('status','=',1)->get();
		
		$productinventorydetails=ProductDetails::where('id','=',$productid)->where('status','=',1)->first();
		
		$request->session()->flash('success', 'Productdetails added successfully.'); 
	    return view('users.update_productinventorydetails', compact('user','usertype','productfielddetails','inventorydetails',
		'productinventorydetails','officefactorydetails'));
		
		}
		
		else
		{
		     //echo "Good Its redirects correctly"; exit;
		
		$productfielddetails=ProductDetailFields::where('status','=',1)->where('categoryID','=',3)->get();
	    $inventorydetails=Inventory::where('status','=',1)->get();
		
		$request->session()->flash('success', 'Productdetails added successfully.'); 
	    return view('users.add_productinventorydetails', compact('user','usertype','productfielddetails','inventorydetails'));
		
		}
		
	   
      }
        
	
   
   

}

?>