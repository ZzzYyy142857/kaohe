<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\TeaModel;
use Illuminate\Support\Facades\DB;

class TeaController extends Controller
{   
    public function view() {
        echo '<form action="/laravel52/public/tpower.php" method="POST">
        <p>修改学生信息:</p>
        <p>格式:XX=>XXX</p>
        <p>关键字:学号,姓名,性别,班级,专业号,专业名,学院,年级,学籍状态</p>
        <input type="text" name="teachangeid" placeholder="输入学生学号"><br>
        <input type="text" name="teaneedinfo" placeholder="例:姓名=>尹政">
        <input type="submit">
        提示:一次只能修改一条信息
        </form><hr>
        <form action="/laravel52/public/spower.php" method="POST" id="input">
        <p>发布公告:</p>
        <input type="text" name="title" placeholder="输入标题"><br>
        <textarea name="content" form="input" placeholder="输入内容"
        style="width:450px;height:130px"></textarea>
        <input type="submit" value="发布">
        </form>';
    }

    public function changeInfo($changeinfo) {

        $id = substr($changeinfo, -10);
        $finfo = substr($changeinfo, 0, -11);
        $info = preg_split("/=>/", $finfo);

        $judge = new TeaModel();
        $tjudge = $judge -> judge($id);

        if ($tjudge) {

            $input = new TeaModel();
            $input -> input($id,$info);
        }
        else {
            echo '<a href="http://localhost/laravel52/public/home">请先使用学生功能获取信息</a>';
        }
    }

    public function notice() {

        $add = DB::select('select max(id) from content');
        $info = get_object_vars($add[0]);

        for ($i=0;$i<10;$i++) {
            $num = $info['max(id)']-$i;
            $info1 = DB::table('content')->where('id', '=', $num)->value('title');
            $info2 = DB::table('content')->where('id', '=', $num)->value('content');
            echo $info1;
            echo '<br>';
            echo $info2;
            echo '<hr>';
        }
    }
}