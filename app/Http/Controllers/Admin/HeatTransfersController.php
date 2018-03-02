<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\Eloquent\Model;
//Auth facade
use Auth, Storage, Log, View, App;
use App\Http\Requests;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;

use Hash;
use Validator;
use App\User;
use App\Customers;
use App\Country;
use App\UserType;
use App\Vendors;
use App\UniqueOffices;
use App\DeliveryMethod;
use App\ProductionRegions;
use App\MarketingRegions;
use App\ProductDetails;
use App\ProductGroup;
use App\ProductSubGroup;
use App\PricingMethod;
use App\Season;
use App\Currency;
use App\ProductProcess;
use App\UnitofMeasurement;
use App\Status;
use App\TypeofLabels;
use App\TypeofHeattransfer;
use App\HeatTransferFinish;
use App\HeatTransfer;
use App\Application;
use App\Inventory;
use App\InStock;
use Session;
use File;
use URL;

class HeatTransfersController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
	
	
	public function heattransferlist(Request $request)
	{
	 $user = Auth::user();
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 $heattransfers=DB::select('call sp_selectproductdetails(3,0,1)');
	 
	 //print_r($heattransfers);exit;
	 
	return view('admin.heattransfers',compact('user','heattransfers','usertype'));	  
	}
	
	public function viewheattransfers(Request $request)
	{
	 $user = Auth::user();
	 $customerdetails=Customers::all();
	 $productgroupdetails=ProductGroup::all();
	 $productsubgroupdetails=ProductSubGroup::all();
	 $productionregions=ProductionRegions::all();
	 $uniqueoffices=UniqueOffices::all();
	 $seasondetails=Season::all();
	 $productprocessdetails=ProductProcess::all();
	 $pricingmenthoddetails=PricingMethod::all();
	 $currencydetails=Currency::all();
	 $unitofmeasurementdetails=UnitofMeasurement::all();
	 $statusdetails=Status::all();
	 $marketingregions=MarketingRegions::all();
	 $countryofoperations=Country::all();
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 
	return view('admin.addheattransfers',compact('user','customerdetails','productgroupdetails','productsubgroupdetails','productionregions','uniqueoffices','seasondetails','productprocessdetails','pricingmenthoddetails','currencydetails','unitofmeasurementdetails','statusdetails','marketingregions','countryofoperations','usertype'));	 
	
	 
	}
	public function addheattransferslist(Request $request)
	{
	 $user = Auth::user();
	 $typeoflabelist=TypeofLabels::all();
	 $typeofheattransfer=TypeofHeattransfer::all();
	 $heattransferfinish=HeatTransferFinish::all();
	 $application=Application::all();
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 return view('admin.addheattransfersInfo',compact('user','typeoflabelist','typeofheattransfer','heattransferfinish','application','usertype'));	 
	}
	
	public function addproductinventoryview(Request $request)
	{
	$user = Auth::user();
	
	$inventorydetails=Inventory::all();
	
	$uniqueofficeslist=UniqueOffices::all();
	$usertype = UserType::where('id', '=', $user->userTypeID)->first();
	
	return view('admin.productinventoryinfo',compact('user','uniqueofficeslist','inventorydetails','usertype'));	 
	}
	
	public function heattransferDetails(Request $request)
	{
	$user = Auth::user();
	
	//$recordid=$request->id;
	$productlastinsertid=Session::get('productlastrecordid');
	
	$productdetails=ProductDetails::where('id','=',$productlastinsertid)->first();
	
	$heattransferdetails=HeatTransfer::where('ProductID','=',$productlastinsertid)->first();
	
	$productgroupdetails=ProductGroup::where('id','=',$productdetails->ProductGroupID)->first();
	
	$productsubgroupdetails=ProductSubGroup::where('id','=',$productdetails->ProductSubGroupID)->first();
	
	$productprocessdetails=ProductProcess::where('id','=',$productdetails->ProductProcessID)->first();
	
	$productionregions1=ProductionRegions::where('id','=',$productdetails->ProductionRegionID1)->first();
	
	$productionregions2=ProductionRegions::where('id','=',$productdetails->ProductionRegionID2)->first();
	
	$uniquefactorydetails=UniqueOffices::where('id','=',$productdetails->UniqueFactory1)->first();
	
	$pricingmethodetails=PricingMethod::where('id','=',$productdetails->PricingMethodID)->first();
	
	$currencymethodetails=Currency::where('id','=',$productdetails->CurrencyID)->first();
	
	$unitofmeasurementetails=UnitofMeasurement::where('id','=',$productdetails->UnitofMeasurementID)->first();
	
	$inventorydetails=Inventory::where('id','=',$productdetails->InventoryID)->first();
	
	$inventorylist=InStock::where('ProductID','=',$productdetails->id)->first();
	
	
	$usertype = UserType::where('id', '=', $user->userTypeID)->first();
	
	$typeoflabeldetails=TypeofLabels::where('id','=',$heattransferdetails->TypeofLabelID)->first();
	
	$typeofheattransferdetails=TypeofHeattransfer::where('id','=',$heattransferdetails->TypeofHeatTransfer)->first();
	
	$finishdetails=HeatTransferFinish::where('id','=',$heattransferdetails->FinishID)->first();
	
	$applicationdetails=Application::where('id','=',$heattransferdetails->ApplicationID)->first();
	
	//echo "before".$productlastinsertid;
	Session::forget('productlastrecordid');
	//echo "session".Session::get('productlastrecordid');
	//echo "after".$productlastinsertid;
	//exit;
	return view('admin.heattransferdetails',compact('user','productdetails','productgroupdetails','productsubgroupdetails','productprocessdetails','productionregions1',
	'productionregions2','uniquefactorydetails','pricingmethodetails','currencymethodetails','unitofmeasurementetails','heattransferdetails','typeoflabeldetails','typeofheattransferdetails','finishdetails','applicationdetails','inventorydetails','inventorylist','usertype'));	 
	
	}
	
	public function addheattransfers(Request $request)
	{
	 $user = Auth::user();
	 
	
	 
	 $productgroupid=$request->productgroup;
	
	$productsubgroupid=$request->productsubgroup;
	
	echo "session value".$productid=Session::get('productlastrecordid');
	
	
	if($request->style_number!="")
	{
	$style_number=$request->style_number;
	}
	else
	{
	$style_number=0;
	}

	 if($request->editID!='')
	 {
	 
	
	
	 }
	 else
	 {
	
			
			if($productid=="" || $productid==null)
			{
			
			     $customerid=$request->customername;
				$product_userinsert = ProductDetails::create(['CustomerID'=>$request->customername,'ProductGroupID' => $request->productgroup,'ProductSubGroupID'=>$request->productsubgroup,'SeasonID'=>$request->season,'ProductStatusID'=>$request->product_status,'ProductProcessID'=>$request->product_process,'ProductionRegionID1'=>$request->productionregion1,'ProductionRegionID2'=>$request->productionregion2,'PricingMethodID'=>$request->pricing_method,'CurrencyID'=>$request->currency,'UnitofMeasurementID'=>$request->unit_measurement,'InventoryID'=>0,'UniqueFactory1'=>$request->uniquefactory1,'UniqueFactory2'=>$request->uniquefactory2,'Brand'=>$request->brand,'ProgramName'=>$request->program_name,'CustomerProductName'=>$request->product_name,'CustomerProductCode'=>$request->product_code,'UniqueProductCode'=>$request->unique_productcode,
				'Description'=>$request->description,'StyleNumber'=>$style_number,'Version'=>$request->version,'MinimumOrderQuantity'=>$request->Min_Quantity,'MinimumOrderValue'=>$request->Min_ordervalue,'PackSize'=>$request->pack_size,'SellingPrice'=>$request->selling_price,'status'=>1
                ]);
				
				//print_r($product_userinsert);exit;
				$product_userinsert->save(); 
				
			    $lastinsertid=$product_userinsert->id;
				
				Session::put('productlastrecordid', $lastinsertid); 
			
				}
				else if($productid!="")
				{
			     $prodlastinsertedid=$productid;
			    $productcode=$request->unique_product_code;
				$inventory=$request->inventory;
				$uniquefactory1=$request->uniquefactory1;
				$uniquefactory2=$request->uniquefactory2;
				$max_stock=$request->max_stock;
				$min_stock=$request->min_stock;
				
			if($request->uniquefactory1!="")
				{
				$uniquefactory1=$request->uniquefactory1;
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
				if($request->max_stock!="")
				{
				$max_stock=$request->max_stock;
				}
				else
				{
				$max_stock=0;
				}
				if($request->min_stock!="")
				{
				$max_stock=$request->min_stock;
				}
				else
				{
				$min_stock=0;
				}
			  /*$updationproductdetails=DB::Select('call sp_updateinventorydetails(1,'.$prodlastinsertedid.',"'.$productcode.'",'.$inventory.','.$uniquefactory1.','.$uniquefactory2.',
			  '.$max_stock.','.$min_stock.')');*/
	$updationproductdetails=DB::Select('call sp_updateinventorydetails(1,'.$prodlastinsertedid.',"'.$productcode.'",'.$inventory.','.$uniquefactory1.','.$uniquefactory2.')');
			  
$inventorydetails=DB::Select('call sp_CRUDinventorydetails(1,'.$prodlastinsertedid.',"'.$request->projection.'",'.$uniquefactory1.','.$uniquefactory2.',
			  '.$max_stock.','.$min_stock.',1)');
			  
			  return redirect(url(route('admin.heattransferdetails'))); 
			}
			
		 
	return redirect(url(route('admin.addheattransfersinfo'))); 
	
	
	 
	 }
	 
	 
	}
	
	public function addheattransferinfo(Request $request)
    {
	 $user = Auth::user();
	 
	 $customerinfo=Session::get('customername');
	 
	 $customerid=$customerinfo->id;
	  $productid=Session::get('productlastrecordid');
	  $path = '/data/product';

     		File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

		 
		 	$imgInp = Input::file('imgInp');
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
				//echo $imgInp_filename;
	 $addheattransfersinfo=DB::Select('call sp_CRUDaddheattransfersinfo(1,'.$customerid.','.$productid.','.$request->typeoflabel.','.$request->typeofheattransfer.','.$request->finish.','.$request->application.',"'.$request->quality_ref.'","'.$request->heattransfer_width.'","'.$request->heattransfer_length.'","'.$request->printcolor1.'","'.$request->printcolor2.'","'.$request->printcolor3.'","'.$request->printcolor4.'","'.$imgInp_filename.'",1)');
	 
	 return redirect(url(route('admin.productinventoryview'))); 
	
	}	
  

 public function version($id)
	{
	 
	 $versionid=$id;
	 
	$versions=ProductDetails::orderBy('Version', 'desc')->pluck('Version')->first();
				  
	$version=$versions+1;
	 
	return json_encode($version);
	
	}
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
	  public function uniquefactoryselection(Request $request)
  {
   $customerid=1;

   $officesdata=UniqueOffices::where('OfficeFactoryName','=','')->get();
   if($officesdata->count())
	{
	
	 $data[]='OfficeFactoryName is already there!';
	
	}
	else
	{
 
  $uniquefactories_insertions=DB::select('call sp_CRUDuniquefactories(1,0,'.$customerid.',"'.$request->office_name1.'",'.$request->marketing_regions1.','.$request->production_regions1.',"'.$request->firstname1.'","'.$request->lastname1.'","'.$request->phonenumber1.'","'.$request->email1.'","'.$request->suite1.'","'.$request->street1.'","'.$request->city1.'",'.$request->country1.',"'.$request->state1.'","'.$request->zipcode1.'",1)');
  
  $officesselect=UniqueOffices::where('OfficeFactoryName','!=','')->orderBy('id','DESC')->get();
  
  
  $data=$officesselect;
  }
  //$data=11;
  
  return json_encode($data);
  
  }
}
?>
