<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Session\Store;

class SessionTimeout {

    protected $session;
    protected $timeout = 1;

    public function __construct(Store $session){
        $this->session = $session;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Auth::user() != null) {
        if(! session('lastActivityTime')) {
          $this->session->put('lastActivityTime', time());
        }
        elseif(time() - $this->session->get('lastActivityTime') > 5 * 60 * 1000) {
            $this->session->forget('lastActivityTime');
            Auth::logout();
            return redirect('/login')->with('error', 'Please login again your session expiry.');
        }
        $this->session->put('lastActivityTime', time());
      }
      return $next($request);
    }

}
