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
Use Session;
use App\UserType;
use App\ProductGroup;

class PdmController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
	 public function index() 
	 {
         $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
		
        return view('admin.pdmhome', compact('user','usertype'));
    }

     public function indexdevlopment() 

     {
        //echo "dfgbdf";exit;
         $user = Auth::user();
         $usertype = UserType::where('id', '=', $user->userTypeID)->first();
         $productgrouplist=ProductGroup::where('status','=',1)->orderBy('id','ASC')->get();
        
        return view('admin.develop_home', compact('user','usertype','productgrouplist'));
    }




}
?>