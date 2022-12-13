<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperAdmin
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
        // $roles = $this->getRequiredRoleForRoute($request->route());
        if ( Auth::check())
        
        {
            // if($request->user()->hasRole('Super Admin') || $request->user()->hasRole('User')|| $request->user()->hasRole('Trainer'))
            // {
                return $next($request);

            // }
            // else{

            //     abort(403,'Unauthorized action.');

            // }
                
           
       }
       else
        {
            abort(403,'Unauthorized action.');
        }
    }
    // private function getRequiredRoleForRoute($route)
    // {
    //     $actions = $route->getAction();
    //     return isset($actions['roles']) ? $actions['roles'] : null;
    // }

}
