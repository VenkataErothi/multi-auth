<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NonAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
         public function handle($request, Closure $next)
    {
        if( Auth::check() )
        { 
            if (auth()->user()->role == 'nonadmin' ) {
                 return $next($request);
            }
            elseif(auth()->user()->role == 'user'  ) {
                   return redirect(route('user.home'));
            }
        }
        abort(404);  
    }
}

