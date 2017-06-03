<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class ChangeController extends Controller
{
    public function putInfo () {
        echo '<form action="/laravel52/public/power.php" method="POST">
        <p>绑定邮箱和学号:</p>
        <input type="text" name="stuemail" placeholder="请输入注册时使用的邮箱"><br>
        <input type="text" name="stuid" placeholder="请输入学号">
        <input type="submit"><hr>
        警告:每个邮箱仅能绑定一个学号
        </form>';
    }

}