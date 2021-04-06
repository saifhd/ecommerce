<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Request;

class EditProfile
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
        $url=explode('/',$request->url());
        $value=$url[count($url)-1];
        // dd($value);
        // $admin=Admin::find($user);
        if($value==$user){
            // dd(1);
            return $next($request);
        }
        else{
            // dd(2);
            return Redirect()->back();
        }
    }
}
