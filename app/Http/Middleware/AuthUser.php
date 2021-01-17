<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\DB;

class AuthUser
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

        if ((empty($request->input('name')))) {
            return redirect()->route('register.page')->with('error', 'Name cannot be empty');
        } else if (empty($request->input('email'))) {
            return redirect()->route('register.page')->with('error', 'Email cannot be empty');
        } else if (empty($request->input('password'))) {
            return redirect()->route('register.page')->with('error', 'Password cannot be empty');
        }

        if (DB::table('users')->where('email', $request->email)->count() === 1) {
            return redirect()->route('register.page')->with('error', 'This email already exist');
        }

        return $next($request);
    }
}
