<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        }

        return redirect()->route('login.page');
    }

    public function LoginPage()
    {
        return view('login');
    }

    public function LoginMake(Request $request)
    {
        $UserInfo = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($UserInfo)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login.page')->with('error', 'Invalid fields');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.page');
    }

    public function RegisterPage()
    {
        return view('store');
    }

    public function RegisterMake(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password)
        ]);

        return redirect()->route('register.page')->with('success', 'User successfully registed');
    }
    
}
