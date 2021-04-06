<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Admin;

class Product
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
        if($admin->product==1){
            return $next($request);
        }
        else{
            return Redirect()->back();
        }
    }
}
