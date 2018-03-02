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
use App\UniqueOffices;
use App\Vendors;
use App\UniqueUsers;
use App\UserType;

class UniqueUsersController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

    // Office/Region List used in officeregions.blade to list using stored procedure

public function uniqueusersList()
 {
	  $user = Auth::user();
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	  
	  $uniqueusers = DB::select('call sp_selectuniqueusers(2,0,1)');
	  
	 // print_r($uniqueusers);exit;
		
	  return view('admin.uniqueusers', compact('user','uniqueusers','usertype'));	                                   
	                       
}

   
 public function viewuniqueusers (Request $request)
 { 
	 $user = Auth::user();
	 $userType = DB::select('call sp_selectUserTypes(1,0,"")');
	 $uniqueoffices=UniqueOffices::where('status','=',1)->get();
	 $edit_val = 0;
	 $uniquecustomers = Customers::where('status','=',1)->get();
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	return view('admin.adduniqueusers',compact('user','userType','uniqueoffices','edit_val','uniquecustomers','usertype'));
	
       
	  
	} 

public function addnewusers (Request $request) {
	 $user = Auth::user();
     $addressID=0;
     $is_sys_admin=0;
	 $token=0;
	 $countryID=0;
	 $customerID=1;
	 /*$customercheck=$_REQUEST['customercheckID'];
	 $check="";
	 foreach($customercheck as $checklist)
	 	$check.=$checklist.",";*/

	 //print_r($customercheck);exit;
	 	//$checkBox11 = implode('$', $_REQUEST['customercheckID']);
	 	if($request['customercheckID'])
	 	{

	 	$checkBox11 = implode(',', $request['customercheckID']);
	 	}
	 	else
	 	{
	 		$checkBox11 = $request['customercheckID'];
	 	}


	 	//print_r($checkBox11);exit;
	 
		
		if($request->editID!='')
        {
			
			 $customerID=1;
           $user = UniqueUsers::where('userName', '=', $request->userName)->where('id', '!=', $request->editID)->where('CustomerID', '=',1)->first();       

            if ($user === null || $user=='') {
			
			  $password=UniqueUsers::where('id','=',$request->editID)->first();

              $user_update = DB::select('call sp_CRUDuniqueusers(2,'.$request->editID.','.$customerID.','.$request->OfficeFactoryName.','.$request->userType.',"'.$request->customercheckID.'","'.$request->firstName.'","'.$request->lastName.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->userName.'","'.$password->password.'",1)');
			  
			  
			 $loginupdate = DB::table('users')->where('id', $request->editID)->update(['customerID'=>1,'userTypeID' => $request->userType,'countryID' => $countryID,'addressID'=>$addressID,'is_sys_admin'=>$is_sys_admin,'userName'=>$request->userName,'email'=>$request->email,'password'=>$password->password ,'firstName'=>$request->firstName,'lastName'=>$request->lastName,'phone'=>$request->phoneNumber,'status'=>1]);
			  
			  
                

              $request->session()->flash('success', 'Unique user updated successfully.');    

            }else{

                 $request->session()->flash('failure', 'Unique user name already exits!');  
            }    

            
            return redirect(url(route('admin.uniqueusers'))); 

        }else{ 
		
		    

              $user = UniqueUsers::where('userName','=', $request->userName)->where('CustomerID', '=',1)->first();
            
            if ($user === null) {
              $password =Hash::make($request->password);
                    
              $user_insert = DB::select('call sp_CRUDuniqueusers(1,0,'.$customerID.','.$request->OfficeFactoryName.','.$request->userType.',"'.$checkBox11.'","'.$request->firstName.'","'.$request->lastName.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->userName.'","'.$password.'",1)');  
				
				
				 $logininsert = User::create(['customerID'=>1,'userTypeID' => $request->userType,'countryID' => $countryID,'addressID'=>$addressID,'is_sys_admin'=>$is_sys_admin,'userName'=>$request->userName,'email'=>$request->email,'password'=>$password ,'firstName'=>$request->firstName,'lastName'=>$request->lastName,'phone'=>$request->phoneNumber,'status'=>1]);
                
    			$logininsert->save(); 

	  
                $request->session()->flash('success', 'Unique user was successful added!');  

            }else{

                $request->session()->flash('failure', 'Unique user name already exits!');  
            }

           return redirect(url(route('admin.uniqueusers')));
        } 

}	

public function uniqueusersDetails(Request $request)
	 {
	  $user = Auth::user();
      $uniqueusersid=$request->id;
   
      $uniqueusersviewlist = DB::select('call sp_selectuniqueusers(1,'.$uniqueusersid.',1)');
	     //print_r($uniqueusersviewlist);exit;
	
	$usertype = UserType::where('id', '=', $user->userTypeID)->first();
	
   return view('admin.uniqueusersdetails', compact('user','uniqueusersviewlist','usertype'));	                                 
	                       
	 }
	 
public function edit(Request $request ,$id)
{ 
$user = Auth::user();

$userType = DB::select('call sp_selectUserTypes(1,0,"")');
$uniqueUsers=UniqueUsers::where('id','=',$id)->first();
$uniqueoffices=UniqueOffices::where('status','=',1)->get();
//print_r($uniqueUsers->FactoryID);exit;

$uniquecustomers = Customers::where('status','=',1)->get();
$edit_val = 1;
$usertype = UserType::where('id', '=', $user->userTypeID)->first();

return view('admin.adduniqueusers', compact('user','customers','uniqueoffices','edit_val','userType','uniqueUsers','uniquecustomers','usertype'));	                                   

}

public function delete(Request $request)
{
       $user = Auth::user();
	   $uniqueuserid=$request->id; 
	   $uniqueUsers =UniqueUsers::where('id','=',$uniqueuserid)->first();
	   
	   
	   $uniqueuser_delete = DB::table('uniqueusers')->where('id', '=', $uniqueuserid)->delete();
	   
	   $user_delete = DB::table('users')->where('userName', '=', $uniqueUsers->userName)->where('customerID', '=', $uniqueUsers->CustomerID)->delete();

        $request->session()->flash('failure', 'Unique User deleted successfully.');     

        return redirect(url(route('admin.uniqueusers')));   
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