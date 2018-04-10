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
use Illuminate\Support\Facades\Crypt;

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
	  
	  //$uniqueusers = DB::select('call sp_selectuniqueusers(2,0,1)');
	  
	   $uniqueusers = DB::select('call sp_selectuniqueusers(4,0,0)');
	  
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
//vidhya-31-03-2018
//show password
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
			   if($request->OfficeFactoryName!="")
			  {
				 $OfficeFactoryName=$request->OfficeFactoryName;
			  }
			  else
			  {
				 $OfficeFactoryName=0; 
			  }

              $user_update = DB::select('call sp_CRUDuniqueusers(2,'.$request->editID.','.$customerID.','.$OfficeFactoryName.','.$request->userType.',"'.$checkBox11.'","'.$request->firstName.'","'.$request->lastName.'","'.$request->title.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->userName.'","'.$password->password.'",1)');
			  
			  
			 $loginupdate = DB::table('users')->where('id', $request->editID)->update(['customerID'=>1,'userTypeID' => $request->userType,'countryID' => $countryID,'addressID'=>$addressID,'is_sys_admin'=>$is_sys_admin,'userName'=>$request->userName,'email'=>$request->email,'password'=>$password->password ,'firstName'=>$request->firstName,'lastName'=>$request->lastName,'phone'=>$request->phoneNumber,'status'=>1]);
			  
			  
                

              $request->session()->flash('success', 'Unique user updated successfully.');    

            }else{

                 $request->session()->flash('failure', 'Unique user name already exits!');  
            }    

            
            return redirect(url(route('admin.uniqueusers'))); 

        }else{ 
		
		    

              $user = UniqueUsers::where('userName','=', $request->userName)->where('CustomerID', '=',1)->first();
            
            if ($user === null) {

            	$pwd = $request->password;
            	$value = Crypt::encrypt($pwd);
              $password =Hash::make($request->password);
                    
			  if($request->OfficeFactoryName!="")
			  {
				 $OfficeFactoryName=$request->OfficeFactoryName;
			  }
			  else
			  {
				 $OfficeFactoryName=0; 
			  }
			  
                    
            $user_insert = DB::select('call sp_CRUDuniqueusers(1,0,'.$customerID.','.$OfficeFactoryName.','.$request->userType.',"'.$checkBox11.'","'.$request->firstName.'","'.$request->lastName.'","'.$request->title.'","'.$request->phoneNumber.'","'.$request->email.'","'.$request->userName.'","'.$password.'","'.$value.'",1)');  
				
				
				 $logininsert = User::create(['customerID'=>1,'userTypeID' => $request->userType,'countryID' => $countryID,'addressID'=>$addressID,'is_sys_admin'=>$is_sys_admin,'userName'=>$request->userName,'email'=>$request->email,'password'=>$password ,'Visible_password'=>$value,'firstName'=>$request->firstName,'lastName'=>$request->lastName,'phone'=>$request->phoneNumber,'status'=>1]);
                
    			$logininsert->save(); 

	  
                $request->session()->flash('success', 'Unique user was successful added!');  

            }else{

                $request->session()->flash('failure', 'Unique user name already exits!');  
            }

           return redirect(url(route('admin.uniqueusers')));
        } 

}	
//vidhya-31-03-2018
//show password
public function uniqueusersDetails(Request $request)
	 {
	  $user = Auth::user();
      $uniqueusersid=$request->id;
   
      $uniqueusersviewlist = DB::select('call sp_selectuniqueusers(1,'.$uniqueusersid.',1)');
	     //print_r($uniqueusersviewlist);exit;
	
	$usertype = UserType::where('id', '=', $user->userTypeID)->first();
	foreach($uniqueusersviewlist as $list)
	//print_r($list->Visible_password);
$pwd =$list->Visible_password;
	
	      $output = Crypt::decrypt($pwd);    
   return view('admin.uniqueusersdetails', compact('user','uniqueusersviewlist','usertype','output'));	                                 
	                       
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
//deactive
 public function deActivate(Request $request)
     {
       
        $user = Auth::user();       
		
		$id=$request->id;

        /*foreach ($request->ChkEvent as $key => $id) {                

            $officer_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"uniqueusers")');
			
			$uniqueUsers=UniqueUsers::where('id','=',$id)->first();
			
			
			$uniqueusersemail=$uniqueUsers->Email;
			
			//exit;
			 //$user_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"users")');
			 $productdetailsupdate=DB::table('users')
            ->where('email',$uniqueusersemail)
            ->update(['status' =>0 ]);
 
         }*/
		  $officer_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"uniqueusers")');
			
			$uniqueUsers=UniqueUsers::where('id','=',$id)->first();
			
			
			$uniqueusersemail=$uniqueUsers->Email;
			
			//exit;
			 //$user_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"users")');
			 $productdetailsupdate=DB::table('users')
            ->where('email',$uniqueusersemail)
            ->update(['status' =>0 ]);
        
		
        $request->session()->flash('success', 'UniqueUser(s) deactivated successfully.');     

        return redirect(url(route('admin.uniqueusers')));   

     }

//active	 
	 
public function activate(Request $request)
     {
       
        $user = Auth::user();
		$id=$request->id;

        /*foreach ($request->ChkEvent as $key => $id) {      
           
            $officer_activate = DB::select('call sp_commonprocedure(1,'.$id.',"uniqueusers")');
		
		    $uniqueUsers=UniqueUsers::where('id','=',$id)->first();
			
			
			$uniqueusersemail=$uniqueUsers->Email;
			
			//exit;
			 //$user_deactivate = DB::select('call sp_commonprocedure(2,'.$id.',"users")');
			 $productdetailsupdate=DB::table('users')
            ->where('email',$uniqueusersemail)
            ->update(['status' =>1 ]);
			

        }*/
		 $officer_activate = DB::select('call sp_commonprocedure(1,'.$id.',"uniqueusers")');
		
		    $uniqueUsers=UniqueUsers::where('id','=',$id)->first();
			
			$uniqueusersemail=$uniqueUsers->Email;
			
			 $productdetailsupdate=DB::table('users')
            ->where('email',$uniqueusersemail)
            ->update(['status' =>1 ]);
        
        $request->session()->flash('success', 'UniqueUser(s) activated successfully.');     

        return redirect(url(route('admin.uniqueusers')));   

     }


/*public function delete(Request $request)
{
       $user = Auth::user();
	   $uniqueuserid=$request->id; 
	   $uniqueUsers =UniqueUsers::where('id','=',$uniqueuserid)->first();
	   
	   
	   $uniqueuser_delete = DB::table('uniqueusers')->where('id', '=', $uniqueuserid)->delete();
	   
	   $user_delete = DB::table('users')->where('userName', '=', $uniqueUsers->userName)->where('customerID', '=', $uniqueUsers->CustomerID)->delete();

        $request->session()->flash('failure', 'Unique User deleted successfully.');     

        return redirect(url(route('admin.uniqueusers')));   
}*/
 public function delete(Request $request)
     {
       $user = Auth::user();

        foreach ($request->ChkEvent as $key => $id) {        
          

         $officer_delete = DB::select('call sp_commonprocedure(3,'.$id.',"uniqueusers")'); 

        }
        
        $request->session()->flash('failure', 'UniqueUser(s) deleted successfully.');     

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