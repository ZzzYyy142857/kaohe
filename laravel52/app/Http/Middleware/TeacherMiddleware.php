<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class TeacherMiddleware
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
        $email = $request->email;
        $judge = DB::table('power')->where('email', '=', $email)->value('email');
        if ($judge != $email) {
            echo '邮箱错误';
            die();
        }

        return $next($request);
    }
}
