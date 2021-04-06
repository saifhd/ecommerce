<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $url=$request->url();
            $array=explode('/',$url);
            if(in_array('admin',$array) || in_array('Admin',$array)){
                // dd($array);
                return route('admin.login');
                
            }
            else{
                
                return route('login');
            }
            
        }
    }
}
