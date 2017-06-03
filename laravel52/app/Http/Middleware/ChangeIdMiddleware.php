<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class ChangeIdMiddleware
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
        $theinfo = $request->theinfo;
        $changeid = substr($theinfo, -10);
        $needinfo = substr($theinfo, 0, -11);

        $judge = DB::table('studentInfo')->where('number', '=', $changeid)->get();
        if (!$judge) {
            echo '权限不足';
            die();
        }

        if (!preg_match("/^姓名|^性别/", $needinfo, $matches)) {
            echo '权限不足';
            die();
        }

        return $next($request);
    }
}
