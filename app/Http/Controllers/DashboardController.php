<?php

namespace App\Http\Controllers;

use App\Product;
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

    public function createMake(Request $request)
    {
        $uniqName = uniqid(date('HisYmd'));
        $type = $request->image->extension();

        $fileName = "{$uniqName}.{$type}";
        
        $userId = Auth::user()->id;

        Product::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'price' => $request->price,
            'fileName' => $fileName,
            'user_id' => $userId
        ]);

        $uploadImage = $request->image->storeAs('products', $fileName);

        if (!$uploadImage) {
            return redirect()->route('admin.create')->with('error', 'Failed to upload');
        }

        return redirect()->route('admin.create')->with('success', 'Product sucessfully created');

    }
    
}
