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
use App\CustomerUsers;
use App\Customers;
use App\Country;
use App\Vendors;
use App\VendorUsers;
use App\OfficeFactoryAddress;
use App\UserType;

class VendorUsersController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

    // Office/Region List used in officeregions.blade to list using stored procedure

public function vendorusersList()
 {
	  $user = Auth::user();
	  $vendorusers = DB::select('call sp_selectvendorusers(2,0,1)');
	  
		$usertype = UserType::where('id', '=', $user->userTypeID)->first();
	  return view('admin.vendorusers', compact('user','vendorusers','usertype'));	                                   
	                       
}
public function vendorusersListid(Request $request)
 {
 	$vendorid = $request->id;
	  $user = Auth::user();
	  $vendorusers = DB::select('call sp_selectvendorusers(3,'.$vendorid.',1)');
	  $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		//print_r($vendorusers);exit;
	  return view('admin.vendorusers', compact('user','vendorusers','usertype'));	                                   
	                       
}

   
 public function viewvendorusers(Request $request)
 { 
	 $user = Auth::user();
	 //$customers = DB::select('call sp_selectCustomers(2,0,1)');
	 $accountmanagerID=$user->id;
	 $usertypeID=$user->userTypeID;
$customers = DB::select('call sp_selectCustomers(2,0,1,'.$accountmanagerID.','.$usertypeID.')');
	 $userType = DB::select('call sp_selectUserTypes(1,0,"")');
	 $vendors=Vendors::where('status','=',1)->get();
	 $factory=OfficeFactoryAddress::where('status','=',1)->get();
	 $edit_val = 0;
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	return view('admin.addvendorusers',compact('user','customers','userType','vendors','factory','edit_val','usertype'));
	
       
	  
	} 

public function addnewusers(Request $request) {
	//echo "dfgdf";exit;
	 $user = Auth::user();
     $addressID=0;
     $is_sys_admin=0;
	 $token=0;
	 $countryID=0;
		
		if($request->editID!='')
        {
          $user = User::where('userName', '=', $request->userName)->first(); 
		   
		$vendoruser = VendorUsers::where('id', '!=', $request->editID)->where('userName', '=', $request->userName)->first();    
		   

            if ($vendoruser === null) {
			
			  $password=User::where('userName','=',$request->userName)->first();

              $user_update = DB::select('call sp_CRUDvendorusers(2,'.$request->editID.','.$request->customerName.','.$request->companyName.','.$request->factoryName.','.$request->userType.',"'.$request->firstName.'","'.$request->lastName.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->userName.'","'.$password->password.'",1)');
			  
			  $loginupdate = DB::table('users')->where('userName', $request->userName)->update(['customerID'=>$request->customerName,'userTypeID'=>$request->userType,'countryID' => $countryID,'addressID'=>$addressID,'is_sys_admin'=>$is_sys_admin,'userName'=>$request->userName,'email'=>$request->email,'password'=>$password->password ,'firstName'=>$request->firstName,'lastName'=>$request->lastName,'phone'=>$request->phoneNumber,'status'=>1]);
			  
			  
                

              $request->session()->flash('success', 'Vendor user updated successfully.');    

            }else{

                 $request->session()->flash('failure', 'Vendor user name already exits!');  
            }    

            
            return redirect(url(route('admin.vendorusers'))); 

        }else{ 

             $user = User::where('userName', '=', $request->userName)->first();       
            
            if ($user === null) {
              $password=Hash::make($request->password);
                    
                $user_insert = DB::select('call sp_CRUDvendorusers(1,0,'.$request->customerName.','.$request->companyName.','.$request->factoryName.','.$request->userType.',"'.$request->firstName.'","'.$request->lastName.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->userName.'","'.$password.'",1)');  
				
				$logininsert = User::create(['customerID'=>$request->customerName,'userTypeID' => $request->userType,'countryID' => $countryID,'addressID'=>$addressID,'is_sys_admin'=>$is_sys_admin,'userName'=>$request->userName,'email'=>$request->email,'password'=>$password ,'firstName'=>$request->firstName,'lastName'=>$request->lastName,'phone'=>$request->phoneNumber,'status'=>1]);
                
    			$logininsert->save(); 

	  
                $request->session()->flash('success', 'Vendor user was successful added!');  

            }else{

                $request->session()->flash('failure', 'Vendor user name already exits!');  
            }

           return redirect(url(route('admin.vendorusers')));
        } 

}	

public function vendorusersDetails(Request $request)
	 {
	     
	  $user = Auth::user();
      $vendorusersid=$request->id;
   
      $vendorusersviewlist = DB::select('call sp_selectvendorusers(1,'.$vendorusersid.',1)');
	
	
	
   return view('admin.vendorusersdetails', compact('user','vendorusersviewlist'));	                                 
	                       
	 }
	 
public function edit(Request $request ,$id)
{ 

$user = Auth::user();
//$customers = DB::select('call sp_selectCustomers(2,0,1)');
$accountmanagerID=$user->id;
$usertypeID=$user->userTypeID;
$customers = DB::select('call sp_selectCustomers(2,0,1,'.$accountmanagerID.','.$usertypeID.')');
$vendors=Vendors::where('status','=',1)->get();
$userType = DB::select('call sp_selectUserTypes(1,0,"")');
$vendorUsers=VendorUsers::where('id','=',$id)->first();
$factory=OfficeFactoryAddress::where('status','=',1)->get();
$edit_val = 1;
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
return view('admin.addvendorusers', compact('user','customers','vendors','edit_val','userType','vendorUsers','factory','usertype'));	                                   

}



public function delete(Request $request ,$id)
{
       $user = Auth::user();
	   $vendorUsers =VendorUsers::where('id','=',$id)->first();
	   
	   
	   $vendoruser_delete = DB::table('vendorusers')->where('id', '=', $id)->delete();
	   
	   $user_delete = DB::table('users')->where('userName', '=', $vendorUsers->userName)->where('customerID', '=', $vendorUsers->CustomerID)->delete();

        $request->session()->flash('failure', 'Vendor User deleted successfully.');     

        return redirect(url(route('admin.vendorusers')));   
}

//Defect: new users.pdf
         //Name: Bala-php Team
         //change customer name depends upon change vendor and factory names as alphabetic order
		 
public function selectVendors (Request $request ,$id)

    {

        $vendorDetail = Vendors::where('CustomerID', '=', $id)->orderBy('CompanyName', 'asc')->groupBy('CompanyName')->get();
		

		 return json_encode(["success" => true, $vendorDetail]);

    }
	public function selectFactory (Request $request ,$id)

    {

        $factoryDetail = OfficeFactoryAddress::where('id', '=', $id)->orderBy('factoryName', 'asc')->groupBy('factoryName')->get();
		

		 return json_encode(["success" => true, $factoryDetail]);

    }
public function userCheck(Request $request ,$id)
    {
	if($id!=0) {
	return 'true';
	} else {
	  $user = User::where('userName',$_REQUEST['userName'])->count();
	  if($user>0){return json_encode('User name already taken');}
	  else{return 'true';}
	}
    }
}


?>