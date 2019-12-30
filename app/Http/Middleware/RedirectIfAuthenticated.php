<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->intended('/home');
        }else{
            return redirect()->action('adminController@login')->with('flash_message_error','Reikia prisijungti!');
        }

        return $next($request);
    }
}
