<?php

namespace App\Http\Middleware;

use Closure;

class Administrator
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
        if(auth()->check()){
            // dd(config('app'));
             if(in_array(auth()->user()->email, config('app.administrators'))){
                dd('You\'re an Administrator');
            }else{
                dd ('You don\'t have access');
            }
        }else{
            dd('Please login');
        }
       
        return $next($request);
    }
}
