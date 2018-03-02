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

use App\UniqueOffices;

use App\DeliveryMethod;

use App\ProductionRegions;

use App\MarketingRegions;

use App\OfficeFactoryAddress;

use Session;



class UniqueController extends Controller

{

    public function __construct()



    {



        $this->middleware('auth');



    }



	

	public function uniquefacilitylist(Request $request)

	{

	 $user = Auth::user();

	 

	 $uniquedetails=DB::select('call sp_selectuniquefacilities(1,0,1)');
	 
	$usertype = UserType::where('id', '=', $user->userTypeID)->first();


	return view('admin.uniquefacility',compact('user','uniquedetails','usertype'));	  

	}

	

	public function viewuniquefacility(Request $request)

	{

	 $user = Auth::user();

	 

	 $countries_details = DB::table('country')->join('state', function ($join) {

            $join->on('country.id', '=', 'state.CountryID');})->groupBy('state.CountryID')->get();

			

	 $productionregions=ProductionRegions::where('status','=',1)->get();

	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();

	 $marketingregions=MarketingRegions::where('status','=',1)->get();

	 

	 $state=State::where('status','=',1)->get();

	  $officeAddress=OfficeFactoryAddress::where('status','=',1)->get();

	 $edit_val=0;

	  

	 

	return view('admin.addnewuniquefacility',compact('user','countries_details','productionregions','marketingregions','state','edit_val','officeAddress','usertype'));	  

	}

	

	 public function uniquefacilitydetailslist(Request $request)

   {

   $user = Auth::user();


   $uniquefacilityid=$request->id;

   

   

    $uniquefacilitydetailslist = DB::select('call sp_selectuniquefacilities(2,'.$uniquefacilityid.',1)');

	
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
	

   return view('admin.uniquefacilitydetails', compact('user','uniquefacilitydetailslist','usertype'));	

   }

  

    public function adduniquefacility(Request $request)

	{

	 $user = Auth::user();

	 $customerid=1;

	 if($request->marketingregions=='') { $marketingregions = 0; } else { $marketingregions = $request->marketingregions; }

	 

	 if($request->productionregions=='') { $productionregions = 0; } else { $productionregions = $request->productionregions; }

	

	 

	 if($request->editID!='')

	 {

	 

		   if($request->region==1) {

		   $marketingRegion = $marketingregions;

		   $productionRegion = 0;

		   } else {

		   $marketingRegion = 0;

		   $productionRegion = $productionregions;

		   }

	 

	 

	 	  $facility_updations=DB::select('call sp_CRUDuniquefactories(2,'.$request->editID.','.$customerid.','.$request->region.',"'.$request->factoryname.'",'.$marketingRegion.','.$productionRegion.',"'.$request->firstName.'","'.$request->lastName.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->suite.'","'.$request->street.'","'.$request->city.'",'.$request->country.',"'.$request->state.'","'.$request->zipcode.'",1)');

			  

			

			  $request->session()->flash('success', 'Unique Facilities was Updated Successfully!');  	

			  

			  return redirect()->route('admin.uniquefacility');

	

	 }

	 else

	 {

	 
       $regions=$request->regions;
	 

	

			 /* $facility_insertions=DB::select('call sp_CRUDuniquefactories(1,0,'.$customerid.','.$request->region.',"'.$request->factoryname.'",'.$marketingregions.','.$productionregions.',"'.$request->firstName.'","'.$request->lastName.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->suite.'","'.$request->street.'","'.$request->city.'",'.$request->country.',"'.$request->state.'","'.$request->zipcode.'",1)');*/
			 $facility_insertions =UniqueOffices::create(['RegionSelectID'=>$regions,'MarketingRegionID'=>$marketingregions,'ProductionRegionID'=>$productionregions,'FactoryID1'=>$request->factory1,'FactoryID2'=>$request->factory2,'OfficeFactoryName'=>$request->factoryname,'MainContactFirstName'=>$request->firstName,'MainContactLastName'=>$request->lastName,'PhoneNumber'=>$request->phoneNumber,'Email'=>$request->email,'Suite'=>$request->suite,'Street'=>$request->street,'City'=>$request->city,'CountryID'=>$request->country,'StateID'=>$request->state,'ZIPcode'=>$request->zipcode,'status'=>1]);

			

			

	$request->session()->flash('success', 'Unique Facilities was successful added!');  

	return redirect(url(route('admin.uniquefacility')));  

	 

	 }

	 

	 

	}

	

	public function Edit(Request $request,$id)

		{

			

           

		 	$user=Auth::user();

			

			$usertype = UserType::where('id', '=', $user->userTypeID)->first(); 



		    $uniqueoffices = UniqueOffices::where('id','=',$id)->first();



			$countries_details = DB::table('country')->join('state', function ($join) {

            $join->on('country.id', '=', 'state.CountryID');})->groupBy('state.CountryID')->get();

			 

			  $productionregions=ProductionRegions::all();

			  

			   $marketingregions=MarketingRegions::all();

			   

			   $state=State::where('status','=',1)->get();

			   

			   $edit_val = 1;





        	return view('admin.addnewuniquefacility', compact('user','usertype','countries_details','productionregions','marketingregions','uniqueoffices','state','edit_val'));



		}		

		

    public function delete(Request $request,$id)

     

    {

      	

      	$user = Auth::user();

	   

        $facility_delete = UniqueOffices::find($id);

	    $facility_delete->delete();

	

		        

        $request->session()->flash('failure', 'Unique Facility deleted successfully.');     

       

	  	return redirect()->route('admin.uniquefacility'); 

	     

    }

public function selectState (Request $request ,$id)

    {

        $stateDetail = State::where('CountryID', '=', $id)->first();

		 return json_encode(["success" => true, $stateDetail]);

    }



  

}

?>