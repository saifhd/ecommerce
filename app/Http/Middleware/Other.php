<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Admin;
class Other
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
        if($admin->other==1){
            return $next($request);
        }
        else{
            return Redirect()->back();
        }
    }
}
