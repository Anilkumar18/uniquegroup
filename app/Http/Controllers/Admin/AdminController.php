<?php



namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;



use Illuminate\Http\Request;



use Illuminate\Foundation\Auth\AuthenticatesUsers;



use Illuminate\Database\Eloquent\Model;



//Auth facade

use Auth, Log, View, App;



use App\User;



use App\Exceptions\Handler;

use Illuminate\Support\Facades\DB;



use Hash;

use App\UserType;

use Validator;





class AdminController extends Controller

{

    public function __construct()



    {



        $this->middleware('auth');



    }



    public function index() {



        //$users = User::where('is_sys_admin', false)->paginate(20);

         $user = Auth::user();

        $usertype = UserType::where('id', '=', $user->userTypeID)->first();

        return view('admin.home', compact('user','usertype'));

    }



    /*public function chainsList()

    {



    	$user = Auth::user();



        $chains_list = DB::table('chains')->get();



    	return view('admin.chainlist', ['chains' => $chains_list,'user' =>$user]);

    }*/



     public function passwordChange(Request $request)

    {



        $user = Auth::user();        

        

        $user = User::find(Auth::id());



        $hashedPassword = $user->password;



        if (Hash::check($request->oldpassword, $hashedPassword)) {

            //Change the password

            $user->fill([

                'password' => Hash::make($request->password)

            ])->save();



            $request->session()->flash('success', 'Your password has been changed.');



            return back();

        }



        $request->session()->flash('failure', 'Your password has not been changed.');



        return back();





     }   



    



    

}

