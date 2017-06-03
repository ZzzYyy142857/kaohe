<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class RootMiddleware
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
        $email = $request->root;
        $judge = DB::table('root')->where('email', '=', $email)->value('email');
        if ($judge != $email) {
            echo '邮箱错误';
            die();
        }
        return $next($request);
    }
}
