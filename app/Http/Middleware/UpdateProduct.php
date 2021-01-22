<?php

namespace App\Http\Middleware;

use Closure;

class UpdateProduct
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

        if (!$request->file('image')->isValid()) {
            return redirect()->route('admin.product.update')->with('error', 'Invalid image');
        }       
        
        if (!in_array($request->image->getMimeType(), $validType)) {
            return redirect()->route('admin.product.update')->with('error', 'Invalid image, only png, jpg and jpeg');
        }

        return $next($request);
    }
}
