<?php

namespace App\Http\Controllers\EcommerceMaintenance;

use Illuminate\Http\Request; 

use App\Http\Requests; 

use App\Http\Controllers\Controller;

use Response;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\Eloquent\Model;

use Auth,Validator,Stroage,Log,View,App;

use App\User;

use DB;

use App\UserType;

use App\Symbol;

use App\Symbolimage;

use App\Customers;

use Session;

use Illuminate\Support\Facades\Input;

use Intervention\Image\Facades\Image as Image;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;



class EcommerceController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }

 public function index() {
	 

         $user = Auth::user();

        $usertype = UserType::where('id', '=', $user->userTypeID)->first();

        return view('ecommercemaintenance.home', compact('user','usertype'));

    }
  
	
	


}

?>
