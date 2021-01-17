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
        if (Auth::check() === true) {
            return view('admin.dashboard');
        }

        return redirect()->route('login.page');
    }

    public function LoginPage()
    {
        return view('login');
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
