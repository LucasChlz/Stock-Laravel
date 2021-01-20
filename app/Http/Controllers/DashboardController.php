<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('authLogged');
    }

    public function Dashboard()
    {
        return view('admin.dashboard', [
            'userInfo' => Auth::user()
        ]);
    }

    public function createPage()
    {
        return view('admin.create', [
            'userInfo' => Auth::user()
        ]);
    }
    
}
