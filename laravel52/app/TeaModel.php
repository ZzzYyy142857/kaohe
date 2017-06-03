<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TeaModel extends Model
{
    public function judge($id) {
        $inf = DB::table('studentInfo')->where('number', '=', $id)->value('number');
        return $inf;
    }

    public function input($id,$info) {
        switch ($info[0]) {
            case '学号':
                $add = DB::table('studentInfo')->where('number', '=', $id)->update(['number'=>$info[1]]);break;
            case '姓名':
                $add = DB::table('studentInfo')->where('number', '=', $id)->update(['name'=>$info[1]]);break;
            case '性别':
                $add = DB::table('studentInfo')->where('number', '=', $id)->update(['sex'=>$info[1]]);break;
            case '班级':
                $add = DB::table('studentInfo')->where('number', '=', $id)->update(['class'=>$info[1]]);break;
            case '专业号':
                $add = DB::table('studentInfo')->where('number', '=', $id)->update(['major_number'=>$info[1]]);break;
            case '专业名':
                $add = DB::table('studentInfo')->where('number', '=', $id)->update(['major_name'=>$info[1]]);break;
            case '学院':
                $add = DB::table('studentInfo')->where('number', '=', $id)->update(['college'=>$info[1]]);break;
            case '年级':
                $add = DB::table('studentInfo')->where('number', '=', $id)->update(['rank'=>$info[1]]);break;
            case '学籍状态':
                $add = DB::table('studentInfo')->where('number', '=', $id)->update(['school_status'=>$info[1]]);break;
            default: echo '字段不存在';
        }

        echo '<script> 
        window.location.href="http://localhost/laravel52/public/home"; 
        </script> ';
    }
}
