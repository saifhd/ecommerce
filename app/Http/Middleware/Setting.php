<?php

namespace App\Http\Middleware;

use Closure;
use AUth;
use App\Admin;

class Setting
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
        $user=auth()->user()->id;
        $admin=Admin::find($user);
        if($admin->setting==1){
            return $next($request);
        }
        else{
            return Redirect()->back();
        }
    }
}
