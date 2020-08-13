<?php

namespace App\Http\Middleware;

use Closure;

class Writer
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
        if (auth()->user() && auth()->user()->getRoleNames()->first() == 'writer') {

            return $next($request);
        
        }
        else {
        
            return redirect('login');
        
        }
    }
}
