<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLoginMiddleware
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

        if(Auth::check()){
            $cdv = Auth::user();
            if($cdv->cdv_quyen == 1){
                return $next($request);    
            }else{
                return redirect()->route('trangchu');
            }
        }else{
            return redirect()->route('formLogin');
        }
        
    }
}
