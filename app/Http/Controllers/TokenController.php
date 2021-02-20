<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{

    public function __construct()
    {
        $this->middleware('authLogged');
    }

    public function TokenPage() {
        return view('admin.tokenPage', [
            'userInfo' => Auth::user(),
        ]);
    }
}
