<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuthenticated
{
    public function handle($request, Closure $next)
    {
        if( Auth::check() )
        {     
            if (auth()->user()->role == 'user' || auth()->user()->role == 'admin') {
                 return $next($request);
            }
           
            else{
                return redirect(route('user.home'));
            }
        }
        abort(404);  
    }
}