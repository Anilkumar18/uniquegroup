<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth,App;
use Session;
//use App\Chain;
use App\Customers;
use Illuminate\Support\Facades\Input;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	public function showLoginForm()
    {
       $customers = Customers::all();

       return view('auth.login',compact('customers'));
    }

    public function username()
    {
        return 'userName';
    }

    public function authenticate()
    {
        //update
        $userName = Input::get('userName'); 
        $password = Input::get('password');
        $customerID = Input::get('customerID');

        if($userName=='superadmin')
        {
            if (Auth::attempt(['userName' => $userName, 'password' => $password, 'status' => 1 ])) {
            // Authentication passed...            
                return redirect()->intended('dashboard');
            }else{
            return redirect('/login')->with('error', 'Check your login details...');

            }

        }
		elseif($userName=='uniqueadministrator')
		{
		 if (Auth::attempt(['userName' => $userName, 'password' => $password, 'status' => 1 ])) {
            // Authentication passed...            
                return redirect()->intended('dashboard');
            }else{
            return redirect('/login')->with('error', 'Check your login details...');

            }
		}
		else{

            if (Auth::attempt(['userName' => $userName, 'password' => $password, 'customerID' => $customerID, 'status' => 1 ])) {
            // Authentication passed...
                Session::put('customerID', $customerID);
                
                $customer_data = Customers::where('id', '=', $customerID)->first();

                Session::put('customerData', $customer_data);

                return redirect()->intended('dashboard');
                
            }
			  if (Auth::attempt(['userName' => $userName, 'password' => $password, 'status' => 1 ])) {
            // Authentication passed...
                Session::put('customerID', $customerID);
                
                $customer_data = Customers::where('id', '=', $customerID)->first();

                Session::put('customerData', $customer_data);

                return redirect()->intended('dashboard');
                
            }
			else{

            return redirect('/login')->with('error', 'Check your login details...');

            }
        }
    }

    public function logout()
    {
       Auth::logout();
       Session::flush();
       return redirect('/login')->with('info', 'You have been logged out');
    }
}
