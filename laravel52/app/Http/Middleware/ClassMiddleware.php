<?php

namespace App\Http\Middleware;

use Closure;

class ClassMiddleware
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
        
        $id = $request->num;
        $check = preg_match('/^[0-9]{10}$/', $id);
        if(!$check)  
        {  
            echo '不和要求';  
            die();  
        }  
        return $next($request);
    }
}
