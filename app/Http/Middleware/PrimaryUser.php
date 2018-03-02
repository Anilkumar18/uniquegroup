<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class PrimaryUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
       // if (!$user->is_sys_admin==0) {

        if ($user=='') {
            Auth::logout();
           return redirect('/login')->with('error', 'Please login and access user the pages.');
        }
        return $next($request);
    }
}
