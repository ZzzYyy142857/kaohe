<?php

namespace App\Http\Middleware;

use Closure;

class InputMiddleware
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

        $email = $request->input;
        return $next($request);
    }
}
