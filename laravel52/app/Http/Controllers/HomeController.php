<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        echo '<form action="./power.php" method="POST">
            管理员功能:
            <input type="text" name="root" placeholder="请输入管理员权限邮箱">
            <input type="submit">
            教师功能:
            <input type="text" name="teacher" placeholder="请输入教师权限邮箱">
            <input type="submit">
            *提供管理员邮箱17726680984@163.com供测试<hr>
            <p>个人信息查询:</p>
            班级:
            <input type="text" name="classinfo" placeholder="请输入班级"><br>
            学号:
            <input type="text" name="idinfo" placeholder="请输入学号">
            <input type="submit"><hr>
            <a href="http://localhost/laravel52/public/notice">查看公告</a><hr>
            课表查询:
            <input type="text" name="stunum" placeholder="请输入学号">
            <input type="submit">
            </form>';
    }
}
