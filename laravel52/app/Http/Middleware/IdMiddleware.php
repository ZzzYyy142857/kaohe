<?php

namespace App\Http\Middleware;

use Closure;

class IdMiddleware
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
        $id = $request->id;
        $class = substr($id, 0, 8);
        $tid = substr($id, 9);

        $checkclass = preg_match('/^[0-9]{8}$/', $class);
        $checktid = preg_match('/^[0-9]{10}$/', $tid);

        if(!($checkclass && $checktid))  
        {  
            echo '不和要求';  
            die();  
        }  

        return $next($request);
    }
}
