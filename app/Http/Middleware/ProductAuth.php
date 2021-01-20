<?php

namespace App\Http\Middleware;

use Closure;

class ProductAuth
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

        $validType = [
            'image/png',
            'image/jpg',
            'image/jpeg'
        ];

        if (empty($request->name) || empty($request->amount) || empty($request->price)) {
            return redirect()->route('admin.create')->with('error', 'Fill all fields ');
        }

        if (!$request->hasFile('image')) {
            return redirect()->route('admin.create')->with('error', 'You need to put an image');
        } else if (!$request->file('image')->isValid()) {
            return redirect()->route('admin.create')->with('error', 'Invalid image');
        }       
        
        if (!in_array($request->image->getMimeType(), $validType)) {
            return redirect()->route('admin.create')->with('error', 'Invalid image, only png, jpg and jpeg');
        }

        return $next($request);
    }
}
