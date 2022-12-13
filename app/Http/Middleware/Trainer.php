<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Trainer
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
    //     if ( Auth::check() && $request->user()->hasRole('Trainer'))
    //    {
    //        return $next($request);
    //    }
    //    else
    //     {
    //         abort(403,'Unauthorized action.');
    //     }
    // }

}
}
