<?php

namespace App\Http\Middleware;

use Closure;

class LoginAuth
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
        
        if (empty($request->input('email'))) {
            return redirect()->route('register.page')->with('error', 'Email cannot be empty');
        } else if (empty($request->input('password'))) {
            return redirect()->route('register.page')->with('error', 'Password cannot be empty');
        }

        return $next($request);
    }
}
