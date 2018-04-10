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
use App\UserType;

use App\User;
use App\CustomerUsers;
use App\Customers;
use App\Country;
use App\State;


use Illuminate\Support\Facades\Crypt;

class CustomerUsersController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

    // Office/Region List used in officeregions.blade to list using stored procedure

public function customerusersList(Request $request)
 {
	 

	  $user = Auth::user();
	  $accountmanagerID=$user->id;
	  $usertypeID=$user->userTypeID;
	  $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	  //$customerusers = DB::select('call sp_selectcustomerusers(2,0,1,'.$accountmanagerID.','.$usertypeID.')');
	  
	   $customerusers = DB::select('call sp_selectcustomerusers(5,0,0,'.$accountmanagerID.','.$usertypeID.')');
		
	  return view('admin.customerusers', compact('user','customerusers','usertype'));	                                   
	                       
}
public function customerusersid(Request $request)
 {
 	  $customid = $request->id;
	  $user = Auth::user();
	  $accountmanagerID=$user->id;
	  $usertypeID=$user->userTypeID;
//print_r($customid);
	  //$customerusers = DB::select('call sp_selectcustomerusers(2,0,1)');
	  $customerusers = DB::select('call sp_selectcustomerusers(4,'.$customid.',1,'.$accountmanagerID.','.$usertypeID.')');
$usertype = UserType::where('id', '=', $user->userTypeID)->first();
	
	  return view('admin.customerusers', compact('user','customerusers','usertype'));	                                   
	                       
}

   
 public function viewcustomerusers (Request $request)
 { 
	 $user = Auth::user();
	 $accountmanagerID=$user->id;
	 $usertypeID=$user->userTypeID;
	 $customers = DB::select('call sp_selectCustomers(2,0,1,'.$accountmanagerID.','.$usertypeID.')');
	 //$customers = DB::select('call sp_selectCustomers(2,0,1)');
	 $userType = DB::select('call sp_selectUserTypes(1,0,"")');
	 //$countries_details=Country::where('status','=',1)->get();
	 $edit_val = 0;
	 	 $countries_details = DB::table('country')->join('state', function ($join) {
            $join->on('country.id', '=', 'state.CountryID');})->groupBy('state.CountryID')->get();
			
	 $state=State::where('status','=',1)->get();
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();

	return view('admin.addcustomerusers',compact('user','customers','userType','countries_details','edit_val','state','usertype'));
	
       
	  
	} 
//vidhya-31-03-2018
	//encrypt and decrypt password
public function addnewusers (Request $request) {
	 $user = Auth::user();
     $addressID=0;
     $is_sys_admin=0;
	 $token=0;
	 //vidhya-31-03-2018
//show password
				if($request->editID!='')
        {
           $customeruser = CustomerUsers::where('UserName', '=', $request->userName)->where('id', '!=', $request->editID)->first();       

            if ($customeruser === null) {
			
			  $password=User::where('userName','=',$request->userName)->first();
              $user_update = DB::select('call sp_CRUDcustomerusers(2,'.$request->editID.','.$request->customerName.','.$request->country.','.$request->state.','.$request->userType.',"'.$request->firstName.'","'.$request->lastName.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->suite.'","'.$request->street.'","'.$request->city.'","'.$request->zipcode.'","'.$request->userName.'","'.$password->password.'","'.$token.'",'.$is_sys_admin.',1)');
			  
			  $loginupdate = DB::table('users')->where('userName', $request->userName)->update(['customerID'=>$request->customerName,'userTypeID' => $request->userType,'countryID' => $request->country,'addressID'=>$addressID,'is_sys_admin'=>$is_sys_admin,'userName'=>$request->userName,'email'=>$request->email,'password'=>$password->password ,'firstName'=>$request->firstName,'lastName'=>$request->lastName,'phone'=>$request->phoneNumber,'status'=>1]);
			  
			  
                

              $request->session()->flash('success', 'Customer user updated successfully.');    

            }else{

                 $request->session()->flash('failure', 'Customer user name already exits!');  
            }    

            
            return redirect(url(route('admin.customerusers'))); 

        }else{ 

              $user = User::where('userName', '=', $request->userName)->first();
            
            if ($user === null) {
            	//print_r($request->password);exit;
            	$pwd = $request->password;
            	$value = Crypt::encrypt($pwd);
            	
            	$password =Hash::make($request->password);
                    
                $user_insert = DB::select('call sp_CRUDcustomerusers(1,0,'.$request->customerName.','.$request->country.','.$request->state.','.$request->userType.',"'.$request->firstName.'","'.$request->lastName.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->suite.'","'.$request->street.'","'.$request->city.'","'.$request->zipcode.'","'.$request->userName.'","'.$password.'","'.$value.'","'.$token.'",'.$is_sys_admin.',1)');
				
				 $logininsert = User::create(['customerID'=>$request->customerName,'userTypeID' => $request->userType,'countryID' => $request->country,'addressID'=>$addressID,'is_sys_admin'=>$is_sys_admin,'userName'=>$request->userName,'email'=>$request->email,'password'=>$password ,'Visible_password'=>$value,'firstName'=>$request->firstName,'lastName'=>$request->lastName,'phone'=>$request->phoneNumber,'status'=>1]);
                
    			$logininsert->save(); 

	  
                $request->session()->flash('success', 'Customer user was successful added!');  

            }else{

                $request->session()->flash('failure', 'Customer user name already exits!');  
            }

           return redirect(url(route('admin.customerusers')));
        } 



}	
	public function selectCustomerUsers(Request $request ,$id)
    {
        $customerDetail = Customers::where('id', '=', $id)->first();
		 return json_encode(["success" => true, $customerDetail]);
    }
     public function myformAjax($id)
    {
	
        $statedetails = DB::table("state")
                    ->where("CountryID",$id)
                    ->pluck("StateName","id");
			$data=$statedetails;
        return json_encode($data);
    }
	  public function customerusersDetails(Request $request)
	 {
	   //vidhya-31-03-2018
//show password  
	  $user = Auth::user();
      $customerusersid=$request->id;
    $accountmanagerID=$user->id;
    $usertypeID=$user->userTypeID;
      $customerusersviewlist = DB::select('call sp_selectcustomerusers(1,'.$customerusersid.',1,'.$accountmanagerID.','.$usertypeID.')');
	
	$usertype = UserType::where('id', '=', $user->userTypeID)->first();
foreach($customerusersviewlist as $list)
	//print_r($list->Visible_password);
$pwd =$list->Visible_password;
	
	      $output = Crypt::decrypt($pwd);     	
            	
            	
	
   return view('admin.customerusersdetails', compact('user','customerusersviewlist','usertype','output'));	                                 
	                       
	 }

public function selectState (Request $request ,$id)
    {
        $stateDetail = State::where('CountryID', '=', $id)->first();
		 return json_encode(["success" => true, $stateDetail]);
    }
	 
public function edit(Request $request ,$id)
{ 

$user = Auth::user();
$accountmanagerID=$user->id;
$usertypeID=$user->userTypeID;
$customers = DB::select('call sp_selectCustomers(2,0,1,'.$accountmanagerID.','.$usertypeID.')');
//$customers = DB::select('call sp_selectCustomers(2,0,1)');
//$countries_details=Country::where('status','=',1)->get();
$userType = DB::select('call sp_selectUserTypes(1,0,"")');
$customersUsers = CustomerUsers::where('id','=',$id)->first();
$edit_val = 1;
	 $countries_details = DB::table('country')->join('state', function ($join) {
            $join->on('country.id', '=', 'state.CountryID');})->groupBy('state.CountryID')->get();
			
	 $state=State::where('status','=',1)->get();
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();

return view('admin.addcustomerusers', compact('user','customers','countries_details','edit_val','userType','customersUsers','state','usertype'));	                                   

}
//Defect:27-03-2018
	//Bala-Uniquegroup team
	//active,deactive and delete
	
//deactive
 public function deActivate(Request $request)
     {
       
        $user = Auth::user(); 
		$id=$request->id;      

       /* foreach ($request->ChkEvent as $key => $id) {                

            $officer_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"customerusers")');
			
			$customerUsers=CustomerUsers::where('id','=',$id)->first();
			
			
			$customerusersemail=$customerUsers->Email;
			
			//exit;
			 //$user_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"users")');
			 $productdetailsupdate=DB::table('users')
            ->where('email',$customerusersemail)
            ->update(['status' =>0 ]);
 
         }*/
		 $officer_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"customerusers")');
			
			$customerUsers=CustomerUsers::where('id','=',$id)->first();
			
			
			$customerusersemail=$customerUsers->Email;
			
			//exit;
			 //$user_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"users")');
			 $productdetailsupdate=DB::table('users')
            ->where('email',$customerusersemail)
            ->update(['status' =>0 ]);
        
		
        $request->session()->flash('success', 'CustomerUser(s) deactivated successfully.');     

        return redirect(url(route('admin.customerusers')));   

     }

//active	 
	 
public function activate(Request $request)
     {
       
        $user = Auth::user();
		$id=$request->id;

        /*foreach ($request->ChkEvent as $key => $id) {      
           
            $officer_activate = DB::select('call sp_commonprocedure(1,'.$id.',"customerusers")');
		
		    $customerUsers=CustomerUsers::where('id','=',$id)->first();
			
			
			$customerusersemail=$customerUsers->Email;
			
			 $productdetailsupdate=DB::table('users')
            ->where('email',$customerusersemail)
            ->update(['status' =>1 ]);
			

        }*/
		 $officer_activate = DB::select('call sp_commonprocedure(1,'.$id.',"customerusers")');
		
		    $customerUsers=CustomerUsers::where('id','=',$id)->first();
			
			
			$customerusersemail=$customerUsers->Email;
			
			 $productdetailsupdate=DB::table('users')
            ->where('email',$customerusersemail)
            ->update(['status' =>1 ]);
        
        $request->session()->flash('success', 'CustomerUser(s) activated successfully.');     

        return redirect(url(route('admin.customerusers')));   

     }

//delete
 public function delete(Request $request)
     {
       $user = Auth::user();

        foreach ($request->ChkEvent as $key => $id) {        
          

         $officer_delete = DB::select('call sp_commonprocedure(3,'.$id.',"customerusers")'); 

        }
        
        $request->session()->flash('failure', 'CustomerUser(s) deleted successfully.');     

        return redirect(url(route('admin.customerusers')));   
    }

/*public function delete(Request $request ,$id)
{
       $user = Auth::user();
	   $customersUsers = CustomerUsers::where('id','=',$id)->first();
	   
	   $customeruser_delete = DB::table('customerusers')->where('id', '=', $id)->delete();
	   
	   $user_delete = DB::table('users')->where('userName', '=', $customersUsers->UserName)->where('customerID', '=', $customersUsers->CustomerID)->delete();

        $request->session()->flash('failure', 'Customer User deleted successfully.');     

        return redirect(url(route('admin.customerusers')));   
}
*/
}


?>