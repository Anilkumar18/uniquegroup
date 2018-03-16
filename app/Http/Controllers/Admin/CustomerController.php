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

Use Session;



class CustomerController extends Controller

{

    public function __construct()



    {



        $this->middleware('auth');



    }





public function customerList() {



$user = Auth::user();
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
$accountmanagerID=$user->id;
$usertypeID=$user->userTypeID;
$customers = DB::select('call sp_selectCustomers(2,0,1,'.$accountmanagerID.','.$usertypeID.')');

return view('admin.customers', compact('user','customers','usertype'));	                                   



}



public function customerviewlist(Request $request)

   {

   $user = Auth::user();

   $customerid=$request->id;

   $usertype = UserType::where('id', '=', $user->userTypeID)->first();
$accountmanagerID=$user->id;
$usertypeID=$user->userTypeID;
    //$customerviewlist = DB::select('call sp_selectCustomers(2,0,1,'.$accountmanagerID.')');
$customerviewlist = DB::select('call sp_selectCustomers(1,'.$customerid.',1,'.$accountmanagerID.','.$usertypeID.')');
	

   return view('admin.customersdetails', compact('user','customerviewlist','usertype'));	

   }

    

public function viewcustomers(Request $request)

	{

	 $user = Auth::user();

	

	 $countries_details = DB::table('state')->join('country', function ($join) {

            $join->on('state.CountryID', '=', 'country.id');})->groupBy('state.CountryID')->get();

			

	 $state=State::where('status','=',1)->orderBy('StateName', 'asc')->get();

	$usertype = UserType::where('id', '=', $user->userTypeID)->first();		

	 $edit_val = 0;

	 

	return view('admin.addcustomers',compact('user','countries_details','edit_val','state','usertype'));	  

	}

	

	public function addcustomers(Request $request)

	{

	$user = Auth::user();

	$accountmanagerID=$user->id;

	 if($request->editID!='')

     { 

	 

	 $file = Input::file('customerlogo');



            if($file!='')

            {



                $file = Input::file('customerlogo');

                $origname = $file->getClientOriginalName();

                $origname = pathinfo($origname, PATHINFO_FILENAME); 

                $ext = $file->getClientOriginalExtension(); 

                $filename = $file->storeAs('data/customers', str_replace(" ","",$request->customername). '.' . $ext, 'local');



            }else{

                

                if($request->selectimage !=''){

                

                $filename= $request->selectimage;

                

                }else{

                

				$filename='';

				

                }

            }

			

	 $customer = Customers::where('CustomerName', '=', $request->customername)->where('id', '!=', $request->editID)->first(); 

     if ($customer === null) {

	 

	 $customers_update=DB::select('call sp_CRUDcustomers(2,'.$request->editID.','.$request->country.','.$request->state.',"'.$request->customername.'","'.$filename.'","'.$accountmanagerID.'","'.$request->firstName.'","'.$request->lastName.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->suite.'","'.$request->street.'","'.$request->city.'","'.$request->zipcode.'","'.$request->Warehouse_Name.'","'.$request->Warehouse_Suite.'","'.$request->Warehouse_street.'","'.$request->Warehouse_city.'",'.$request->Warehouse_CountryID.','.$request->Warehouse_StateID.',"'.$request->Warehouse_Zipcode.'",1)');



              $request->session()->flash('success', 'Customer updated successfully.');    



            }else{



                 $request->session()->flash('failure', 'Customer name already exits!');  

            }    



            

            return redirect(url(route('admin.customers'))); 



        } else {

		

		

	$customer = Customers::where('CustomerName', '=', $request->customername)->first(); 

	if ($customer === null) {

	

			$file = Input::file('customerlogo');



            if($file!='')

            {



                $file = Input::file('customerlogo');

                $origname = $file->getClientOriginalName();

                $origname = pathinfo($origname, PATHINFO_FILENAME); 

                $ext = $file->getClientOriginalExtension(); 

                $filename = $file->storeAs('data/customers', str_replace(" ","",$request->customername). '.' . $ext, 'local');



            }else{

              $filename='';
            }


	$customers_insert=DB::select('call sp_CRUDcustomers(1,0,'.$request->country.','.$request->state.',"'.$request->customername.'","'.$filename.'","'.$accountmanagerID.'","'.$request->firstName.'","'.$request->lastName.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->suite.'","'.$request->street.'","'.$request->city.'","'.$request->zipcode.'","'.$request->Warehouse_Name.'","'.$request->Warehouse_Suite.'","'.$request->Warehouse_street.'","'.$request->Warehouse_city.'",'.$request->Warehouse_CountryID.','.$request->Warehouse_StateID.',"'.$request->Warehouse_Zipcode.'",1)');

	

	

	$customers = DB::table('customers')->orderBy('id', 'desc')->first();

	

	$LastInsertId = $customers->id;

	$password =Hash::make('Password12');

    $addressID=0;

    $firstName='';

    $lastName='';

    $phone='';               

               

    $adrian_userinsert = User::create(['customerID'=>$LastInsertId,'userTypeID' => 7,'countryID' => 1,'addressID'=>$addressID,'is_sys_admin'=>0,'userName'=>'AdrianL','email'=>'adrianl@theuniquegroup.com','password'=>$password ,'firstName'=>$firstName,'lastName'=>$lastName,'phone'=>$phone,'status'=>1]);



   $adrian_userinsert->save(); 



   $emma_userinsert = User::create(['customerID'=>$LastInsertId,'userTypeID' => 7,'countryID' => 1,'addressID'=>$addressID,'is_sys_admin'=>0,'userName'=>'emmas','email'=>'emmas@theuniquegroup.com','password'=>$password ,'firstName'=>$firstName,'lastName'=>$lastName,'phone'=>$phone,'status'=>1]);

                

    $emma_userinsert->save(); 

					

	$request->session()->flash('success', 'Customer was successful added!');  

	} else{



    $request->session()->flash('failure', 'Customer name already exits!');  

    }

	 

	return redirect(url(route('admin.customers'))); 

	

	} 

	

	}

	

public function edit(Request $request ,$id)

{ 



$user = Auth::user();

$customers = Customers::where('id','=',$id)->first();



$countries_details = DB::table('country')->join('state', function ($join) {

            $join->on('country.id', '=', 'state.CountryID');})->groupBy('state.CountryID')->get();

$state=State::where('status','=',1)->get();

$edit_val = 1;


$usertype = UserType::where('id', '=', $user->userTypeID)->first();
return view('admin.addcustomers', compact('user','customers','countries_details','edit_val','state','usertype'));	                                   



}



public function selectCustomer(Request $request ,$id)

    {

        $customerDetail = Customers::where('id', '=', $id)->first();

		 return json_encode(["success" => true, $customerDetail]);

    }

	

public function delete(Request $request ,$id)

{

       $user = Auth::user();

        

      $customer_delete = Customers::find($id);

	  $customer_delete->delete();

	   

	  $user_delete = DB::table('users')->where('customerID', '=', $id)->delete();

	   

	  $customeruser_delete = DB::table('customerusers')->where('customerID', '=', $id)->delete();



        

        $request->session()->flash('failure', 'Customer deleted successfully.');     



        return redirect(url(route('admin.customers')));   

}



public function selectState (Request $request ,$id)

    {

        $stateDetail = State::where('CountryID', '=', $id)->orderBy('StateName', 'asc')->get();

		 return json_encode(["success" => true, $stateDetail]);

    }



public function getLogo(Request $request, $id) {



    $customer = Customers::find($id);

	

      $filePath = base_path()."/storage/app/".$customer->CustomerLogo; 



        header('Content-type: image/jpeg');



        $img = Image::make($filePath);





        return $img->response('jpg');





  }



 public static function getCountryName($id) {



     $CountryName = Country::where('id', $id)->first();

     

       return $CountryName;

   } 

}

?>