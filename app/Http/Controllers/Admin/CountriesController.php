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

use App\UserType;

use App\Exceptions\Handler;

use Illuminate\Support\Facades\DB;

use App\Country;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Input;

use Hash;

use Validator;

class CountriesController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

    
    public function countriesList()
    {

        $user = Auth::user();
       
        $countries = Country::all();

        $usertype = UserType::where('id', '=', $user->userTypeID)->first();

		return view('admin.countries', compact('user','countries','usertype'));	
    }
	
    public function viewcountries(Request $request)
	{
	
	 $user = Auth::user();
	
	 $countries=Country::where('status','=',1)->get();
     $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	 
	 return view('admin.addcountry',compact('user','countries','usertype'));	  
	}


    public function addCountry(Request $request)
    {
     
    	$user = Auth::user();

        if($request->editID!='')
        {


            $chain = Countries::where('country', '=', $request->country)                
                ->where('id', '!=', $request->editID)
                ->first(); 

            if ($chain === null) {

                $chain_update = Countries::find($request->editID);

                $chain_update->country = $request->country;
                $chain_update->save();


             $request->session()->flash('success', 'Country updated successfully.');    

            }else{

                 $request->session()->flash('error', 'Country name already exits!');  
            }    

            return redirect(url(route('admin.countries')));   
        }else {
        
            $chain = Countries::where('country', '=', $request->country)->first();
            
            if ($chain === null) {

                    $chaininsert = Countries::create([
                    'country' => $request->country,
                    'status' => 1]);
                    
                $chaininsert->save();        

                $LastInsertId = $chaininsert->id;

               

                $request->session()->flash('success', 'Country was successful added!');  

            }else{

                $request->session()->flash('error', 'Country name already exits!');  
            }
            
            return redirect(url(route('admin.countries')));
       } 
    }



     public function delete(Request $request)
     {
       $user = Auth::user();

        foreach ($request->ChkEvent as $key => $value) {
        
            $chain_delete = Countries::find($value);

            $chain_delete->delete();    

        }
        
        $request->session()->flash('success', 'Country(s) deleted successfully.');     

        return redirect(url(route('admin.countrieslist')));   
    }

    public function countrySelect(Request $request ,$id)
    { 
       
        $chain_data = Countries::where('id', '=', $id)->first();

        return json_encode(["success" => true, $chain_data]);

    }

    
}
