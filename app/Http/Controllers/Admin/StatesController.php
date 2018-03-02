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

use App\User;

use App\Exceptions\Handler;

use Illuminate\Support\Facades\DB;

use App\Country;

use App\State;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Input;

use Hash;
use App\UserType;

use Validator;

class StatesController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

    
    public function statesList()
    {

        $user = Auth::user();
       
        $states = State::all();
        $usertype = UserType::where('id', '=', $user->userTypeID)->first();

		return view('admin.states', compact('user','states','usertype'));	
    }

	public function viewstates(Request $request)
	{
	
	 $user = Auth::user();
	
	 $countries=Country::where('status','=',1)->get();
	 $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 return view('admin.addstate',compact('user','countries','usertype'));	  
	}
	
    public function addnewState(Request $request)
    {
	$user = Auth::user();  
	
	$state = State::where('StateName', '=', $request->stateName)->where('CountryID', '=', $request->country)->first();
            
    if ($state === null) {

	$state_insert=DB::select('call sp_CRUDstates(1,0,'.$request->country.',"'.$request->stateName.'",1)');

    $request->session()->flash('success', 'State was successful added!');  

    }else{

    $request->session()->flash('success', 'State name already exits!');  
    }

	 
	return redirect(url(route('admin.states')));  
	
	}


   public function stateDetails(Request $request)
   { 
   $user = Auth::user(); 
   $stateid=$request->id; 
   
    $stateDetails = DB::select('call sp_selectStates(1,'.$stateid.',1)');
	
   return view('admin.statedetails', compact('user','stateDetails'));	
   }
   
     public function delete(Request $request)
     {
       $user = Auth::user();
	   $stateid=$request->id; 
        
            $state_delete = State::find($stateid);

            $state_delete->delete();    

        
        $request->session()->flash('success', 'State deleted successfully.');     

        return redirect(url(route('admin.states')));   
    }

    public function countrySelect(Request $request ,$id)
    { 
       
        $chain_data = Countries::where('id', '=', $id)->first();

        return json_encode(["success" => true, $chain_data]);

    }

    
}
