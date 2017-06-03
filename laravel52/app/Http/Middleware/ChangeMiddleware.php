<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class ChangeMiddleware
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
        $stuid = $request->stuid;
        $email = substr($stuid, 0, -11);
        $id = substr($stuid, -10);

        $inf = DB::table('users')->where('email', '=', $email)->get();

        if(!$inf)  
        {  
            echo '请使用注册时使用的邮箱';
            die();  
        }

        $search = DB::table('binding')->where('email', '=', $email)->get();

        if (!$search)
        {   
            $data = [
                'email' => $email,
                'number' => $id
            ];
            $input = DB::table('binding')->insert($data);
        }

        $judge = DB::table('binding')->where('email', '=', $email)->value('number');

        if ($judge != $id)
        {
            echo '邮箱已绑定';
            die();
        }

        return $next($request);
    }
}
