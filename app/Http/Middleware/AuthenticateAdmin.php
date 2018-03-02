<?php

namespace App\Http\Middleware;

use Closure;

//Auth Facade
use Auth;

use Illuminate\Session\Store;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Store $session){
        $this->session = $session;
    }

     public function handle($request, Closure $next)
     {
          //If request does not comes from logged in seller
          //then he shall be redirected to Seller Login page

     /* $user = Auth::user();

      if ($user == null ) {

            Auth::logout();            
            return redirect('/login')->with('error', 'Please login and access the pages.');
         
        }  */

         $user = Auth::user();
        if ($user != null) {
            if (!$user->is_sys_admin) {
                Auth::logout();
                return redirect('/login')->with('error', 'Please login and access the pages.');
            }
        }

      return $next($request);
      
     }
}
