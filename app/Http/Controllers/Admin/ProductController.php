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
use App\ProductGroup;
use App\ProductSubGroup;
Use Session;

class ProductController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
	 public function index() 
	 {
         $user = Auth::user();
		$usertype = UserType::where('id', '=', $user->userTypeID)->first();
        return view('admin.producthome', compact('user','usertype'));
    }



}
?>