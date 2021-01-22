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

    public function updateProduct (Request $request) {
        $userId = Auth::user()->id;

        $searchProduct = Product::where('user_id', '=', $userId)->where('id', '=', $request->id);
        if ($searchProduct->count() === 0) {
            return redirect()->route('admin.dashboard'); 
        }

        $position = strpos($searchProduct->get()->first()->price, '$');
        $price = substr($searchProduct->get()->first()->price, $position+1);
        $price = str_replace(',', "" ,$price);
       
        return view('admin.edit', [
            'userInfo' => Auth::user(),
            'productInfo' => $searchProduct->get()->first(),
            'priceProduct' => $price
        ]);
    }

    public function updateProductMake(Request $request) {

        $userId = Auth::user()->id;

        $getProduct = Product::where('id', '=', $request->id)->where('user_id', '=', $userId);        

        if ($request->hasFile('image')) {
            $this->middleware('UpdateProduct');

            $currentImage = $getProduct->get()->first()->fileName;
            $uniqName = uniqid(date('HisYmd'));
            $type = $request->image->extension();

            $fileName = "{$uniqName}.{$type}";

            $uploadImage = $request->image->storeAs('products', $fileName);

            if (!$uploadImage) {
                return redirect()->route('admin.update.product')->with('error', 'Failed to upload');
            }

            Storage::delete(['/products/'.$currentImage]);

            $getProduct->update([
                'fileName' => $fileName
            ]);

        }

        $getProduct->update([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount
        ]);
        
        return redirect()->route('admin.dashboard');
    }
    
}
