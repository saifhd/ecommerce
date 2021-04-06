<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Admin\Product;
use Auth;

class Stock
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
        $user=Auth::user()->id;
        $admin=Admin::find($user);
        if($admin->stock==1){
            return $next($request);
        }
        else{
            return Redirect()->back();
        }
    }
}
