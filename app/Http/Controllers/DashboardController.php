<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('authLogged');
    }

    public function Dashboard()
    {
        $userId = Auth::user()->id;

        $Products = Product::where('user_id', '=', $userId)->get();

        return view('admin.dashboard', [
            'userInfo' => Auth::user(),
            'Products' => $Products
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

    public function updateAmount(Request $request) {
        $userId = Auth::user()->id;
        Product::where('id', '=', $request->id)->where('user_id', '=', $userId)->update([
            'amount' => $request->amount
        ]);
        
        return redirect()->route('admin.dashboard');
    }

    public function deleteProduct(Request $request) {
        $userId = Auth::user()->id;

        $getProduct = Product::where('user_id', '=', $userId)->where('id', '=', $request->id);

        $nameFile = $getProduct->get()->first()->fileName;
        Storage::delete(['/products/'.$nameFile]);

        $getProduct->delete();

        return redirect()->route('admin.dashboard');
                
    }
    
}
