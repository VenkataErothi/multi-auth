<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
{

    public function handle($request, Closure $next)
    {
        if( Auth::check() )
        {  
             if (auth()->user()->role == 'admin') {
                 return $next($request);
                 
            }
             elseif(auth()->user()->role == 'nonadmin'  ) {
                  return redirect(route('nonadmin.home'));
            }       
        }
        abort(404);  
    }
}
