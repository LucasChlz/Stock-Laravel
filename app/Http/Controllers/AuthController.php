<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

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
