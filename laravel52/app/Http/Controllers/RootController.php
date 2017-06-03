<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RootController extends Controller
{   
    public function view() {
        echo '<form action="/laravel52/public/tpower.php" method="POST">
        添加教师权限:
        <input type="text" name="root" placeholder="输入邮箱"><br>
        <input type="submit"><hr>
        添加管理员权限:
        <input type="text" name="roots" placeholder="输入邮箱"><br>
        <input type="submit">
        </form>';
    }

    public function input($email) {

        DB::table('power')->insert(['email'=>$email]);

        echo '<script> 
        window.location.href="http://localhost/laravel52/public/home"; 
        </script> ';
    }

    public function inputs($email) {

        DB::table('root')->insert(['email'=>$email]);

        echo '<script> 
        window.location.href="http://localhost/laravel52/public/home"; 
        </script> ';
    }

}