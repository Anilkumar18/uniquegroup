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

use App\State;

use App\UserType;

use App\Vendors;

use App\OfficeFactoryAddress;

use App\UniqueOffices;

use App\DeliveryMethod;

use App\ProductionRegions;

use App\MarketingRegions;

use Session;



class VendorsController extends Controller

{

    public function __construct()



    {



        $this->middleware('auth');



    }

	public function viewvendors(Request $request)

	{

	 $user = Auth::user();

	 

	 $countryofoperations=Country::where('status','=',1)->get();

	 

	 $officeAddress=OfficeFactoryAddress::where('status','=',1)->get();

	 

	 $deliverymethod=DeliveryMethod::where('status','=',1)->get();

	 

	 $productionregions=ProductionRegions::where('status','=',1)->get();

	 

	  //$customerlist=DB::select('call sp_selectCustomers(4,0,1)');
$accountmanagerID=$user->id;
$usertypeID=$user->userTypeID;
$customerlist = DB::select('call sp_selectCustomers(2,0,1,'.$accountmanagerID.','.$usertypeID.')');
	 

	  $state=State::where('status','=',1)->get();

	  

	  $countries_details = DB::table('country')->join('state', function ($join) {

            $join->on('country.id', '=', 'state.CountryID');})->groupBy('state.CountryID')->get();

			
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
		$edit_val = 0;	

	 

	return view('admin.addvendors',compact('user','countryofoperations','customerlist','officeAddress','deliverymethod','productionregions','state','countries_details','edit_val','usertype'));	  

	}

	

	public function vendorslist(Request $request)

	{

	 $user = Auth::user();

	 

	//$vendor=DB::select('call sp_selectvendors(1,0,0,1)');

	  $vendor=Vendors::where('status','=',1)->get();

	 
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 

	return view('admin.vendors',compact('user','vendor','usertype'));	  

	}

	

	public function addvendors(Request $request)

	{

	 $user = Auth::user();

	 //$customerid=1;

	 

	

	 

 if($request->editID!='')

 {

	 
 $vendor = Vendors::where('CompanyName', '=', $request->companyname)->where('Countryofoperation', '=', $request->countryofoperations)->where('id', '!=', $request->editID)->first(); 

     if ($vendor === null) {	  

				$vendor_updations=DB::table('vendors')->where('id', $request->editID)->update(['CustomerID' => $request->customername,'Countryofoperation' => $request->countryofoperations,'CountryID' => $request->country,'StateID' => $request->state,'CourierCompanyID' => $request->deliverymethod,'CompanyName' => $request->companyname,'MainContactFirstName' => $request->firstName,'MainContactLastName' => $request->lastName,'PhoneNumber' => $request->phoneNumber,'Email' => $request->email,'FactoryName' => $request->factoryname,'Suite' => $request->suite,'Street' => $request->street,'City' => $request->city,'ZIPcode' => $request->zipcode,'Factory1ID' => $request->factory1,'Factory2ID' => $request->factory2,'InvoiceID' => $request->invoice_address,'DeliveryID' => $request->delivery_address]);


$request->session()->flash('success', 'Vendors was Updated Successfully!');  	
			  
}else{

$request->session()->flash('failure', 'Vendors company name already exits!');  

 }    

 return redirect()->route('admin.vendors');

	 }

	 else

	 {

 $vendor = Vendors::where('CompanyName', '=', $request->companyname)->first(); 

if ($vendor === null) {	

if($request->countryofoperations1!='') {

			$vendors_insertions = Vendors::create(['CustomerID' => $request->customername,'Countryofoperation' => $request->countryofoperations1,'CountryID' => $request->country,'StateID' => $request->state,'CourierCompanyID' => $request->deliverymethod,'CompanyName' => $request->companyname,'MainContactFirstName' => $request->firstName,'MainContactLastName' => $request->lastName,'PhoneNumber' => $request->phoneNumber,'Email' => $request->email,'FactoryName' => $request->factoryname,'Suite' => $request->suite,'Street' => $request->street,'City' => $request->city,'ZIPcode' => $request->zipcode,'Factory1ID' => $request->factory1,'Factory2ID' => $request->factory2,'InvoiceID' => $request->invoice_address,'DeliveryID' =>$request->delivery_address,'status'=>1]);
			
}
if($request->countryofoperations2!='') {

			$vendors_insertions = Vendors::create(['CustomerID' => $request->customername,'Countryofoperation' => $request->countryofoperations2,'CountryID' => $request->country,'StateID' => $request->state,'CourierCompanyID' => $request->deliverymethod,'CompanyName' => $request->companyname,'MainContactFirstName' => $request->firstName,'MainContactLastName' => $request->lastName,'PhoneNumber' => $request->phoneNumber,'Email' => $request->email,'FactoryName' => $request->factoryname,'Suite' => $request->suite,'Street' => $request->street,'City' => $request->city,'ZIPcode' => $request->zipcode,'Factory1ID' => $request->factory1,'Factory2ID' => $request->factory2,'InvoiceID' => $request->invoice_address,'DeliveryID' =>$request->delivery_address,'status'=>1]);

}
if($request->countryofoperations3!='') {

			$vendors_insertions = Vendors::create(['CustomerID' => $request->customername,'Countryofoperation' => $request->countryofoperations3,'CountryID' => $request->country,'StateID' => $request->state,'CourierCompanyID' => $request->deliverymethod,'CompanyName' => $request->companyname,'MainContactFirstName' => $request->firstName,'MainContactLastName' => $request->lastName,'PhoneNumber' => $request->phoneNumber,'Email' => $request->email,'FactoryName' => $request->factoryname,'Suite' => $request->suite,'Street' => $request->street,'City' => $request->city,'ZIPcode' => $request->zipcode,'Factory1ID' => $request->factory1,'Factory2ID' => $request->factory2,'InvoiceID' => $request->invoice_address,'DeliveryID' =>$request->delivery_address,'status'=>1]);


}
if($request->countryofoperations4!='') {

			$vendors_insertions = Vendors::create(['CustomerID' => $request->customername,'Countryofoperation' => $request->countryofoperations4,'CountryID' => $request->country,'StateID' => $request->state,'CourierCompanyID' => $request->deliverymethod,'CompanyName' => $request->companyname,'MainContactFirstName' => $request->firstName,'MainContactLastName' => $request->lastName,'PhoneNumber' => $request->phoneNumber,'Email' => $request->email,'FactoryName' => $request->factoryname,'Suite' => $request->suite,'Street' => $request->street,'City' => $request->city,'ZIPcode' => $request->zipcode,'Factory1ID' => $request->factory1,'Factory2ID' => $request->factory2,'InvoiceID' => $request->invoice_address,'DeliveryID' =>$request->delivery_address,'status'=>1]);

}

	$request->session()->flash('success', 'Vendors was successful added!');  
}else{

$request->session()->flash('failure', 'Vendors company name already exits!');  

 }    

	return redirect(url(route('admin.vendors')));  

	 

	 }

	 

	 

	}

	public function edit(Request $request,$id)

	{

	$user=Auth::user();



     $vendors = Vendors::where('id','=',$id)->first();

			

	 //$customerlist=DB::select('call sp_selectCustomers(4,0,1)');			

		$accountmanagerID=$user->id;
		$usertypeID=$user->userTypeID;
		$customerlist = DB::select('call sp_selectCustomers(2,0,1,'.$accountmanagerID.','.$usertypeID.')');

	 $countryofoperations=Country::all();

			

	 $officeAddress=OfficeFactoryAddress::where('status','=',1)->get();

	 

	 $productionregions=ProductionRegions::where('status','=',1)->get();

			

	 $deliverymethod=DeliveryMethod::all();

	 

	 $countries_details = DB::table('country')->join('state', function ($join) {

            $join->on('country.id', '=', 'state.CountryID');})->groupBy('state.CountryID')->get();

			

	 $state=State::where('status','=',1)->get();

			

	 $edit_val = 1;	

$usertype = UserType::where('id', '=', $user->userTypeID)->first();

	return view('admin.addvendors', compact('user','vendors','customerlist','countryofoperations','officeAddress','productionregions','deliverymethod','countries_details','state','edit_val','usertype'));



		}		

   public function delete(Request $request,$id)

     

    {

      	

      $vendor_delete = Vendors::find($id);

	  $vendor_delete->delete();

	   

      $request->session()->flash('failure', 'Vendor deleted successfully.');     

       

	  	return redirect()->route('admin.vendors'); 

	     

    }

		

public function vendorsdetailslist(Request $request, $id)

   {

   $user = Auth::user();



   $vendorid=$id;

  // echo "test".$vendorid;exit;

   

    $vendordetailslist = DB::select('call sp_selectvendors(2,0,'.$vendorid.',1)');

	$usertype = UserType::where('id', '=', $user->userTypeID)->first();

	

   return view('admin.vendorsdetails', compact('user','vendordetailslist','usertype'));	

   }

	

	

public function selectState (Request $request ,$id)

    {

        $stateDetail = State::where('CountryID', '=', $id)->first();

		 return json_encode(["success" => true, $stateDetail]);

    }



	

  public function factoryAddress(Request $request)

  {

  

 /*$factaddress = OfficeFactoryAddress::where('factoryName', '=', $request->OFfactoryName)->first();



  

  if ($factaddress === null) {

  

	$address_insert = OfficeFactoryAddress::create(['prodRegionID'=>$request->OFproductionRegion,'CountryID'=>$request->OFcountry,'StateID'=>$request->OFstate,'factoryName'=>$request->OFfactoryName,'firstName'=>$request->OFfirstName,'lastName'=>$request->OFlastName,'phoneNumber'=>$request->OFphno,'Email'=>$request->OFemail,'Suite'=>$request->OFsuite,'Street'=>$request->OFstreet,'City'=>$request->OFcity,'zipCode'=>$request->OFzipcode,'status'=>1]);
 $address_insert->save();
	} else{

    $request->session()->flash('failure', 'Factory Name already exits!');  

    }	

		$address = OfficeFactoryAddress::where('status', '=',1)->get();

				$data[]=$address;



		 return json_encode($data);	*/
		 
		 $addressinsert = OfficeFactoryAddress::create([

                            'prodRegionID' => $request->OFproductionRegion,

                            'CountryID' => $request->OFcountry,

                            'StateID'=>$request->OFstate,
							
							'factoryName'=>$request->OFfactoryName,
							
							'firstName'=>$request->OFfirstName,
							
							'lastName'=>$request->OFlastName,
							
							'phoneNumber'=>$request->OFphno,
							
							'Email'=>$request->OFemail,'Suite'=>$request->OFsuite,
							
							'Street'=>$request->OFstreet,
							
							'City'=>$request->OFcity,
							
							'zipCode'=>$request->OFzipcode,                            

                            'status' => 1]);

                            

                $addressinsert->save(); 			



                $addrselect = OfficeFactoryAddress::where('status', '=',1)->get();



				$data[]=$addrselect;
				
				
				 return json_encode($data);	

	//return redirect(url(route('admin.addvendors')));  

  

  }

    public function factoryCheck()
    {
	  $factory = OfficeFactoryAddress::where('factoryName',$_REQUEST['OFfactoryName'])->count();
	  if($factory>0){return json_encode('Factory name already taken');}
	  else{return 'true';}
    }

public function listCountry (Request $request)

    {

        $stateDetail = Country::where('status', '=', 1)->get();

		 return json_encode(["success" => true, $stateDetail]);

    }

}

?>

