<?php

namespace App\Http\Controllers;

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

    public function StorePage()
    {
        return view('store');
    }
}
