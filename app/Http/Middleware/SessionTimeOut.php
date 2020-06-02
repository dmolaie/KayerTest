<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Auth;
use Laravel\Passport\Passport;
use Session;

class SessionTimeOut
{
    protected $session;
    protected $timeout;

    public function __construct(Store $session){
        $this->session = $session;
        $this->timeout = 600;
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
        $isLoggedIn = $request->path() != 'user/#/logout';
        if(! session('lastActivityTime'))
            $this->session->put('lastActivityTime', time());
        elseif(time() - $this->session->get('lastActivityTime') > $this->timeout){
            $this->session->forget('lastActivityTime');
            $cookie = cookie('intend', $isLoggedIn ? url()->current() : '/');
            if(auth()->user()){
                Auth::user()->tokens->each(function($token, $key) {
                    $token->delete();
                });
            }
            auth()->logout();
        }
        $isLoggedIn ? $this->session->put('lastActivityTime', time()) : $this->session->forget('lastActivityTime');
        return $next($request);
    }
}
