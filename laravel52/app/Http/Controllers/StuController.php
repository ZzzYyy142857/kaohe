<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\IdModel;

class StuController extends Controller
{
    public function judgeInfo($id) {

        $tid = substr($id, 9);

        $user = new IdModel();
        $num = $user ->selectInfo($tid);

        if ($num) {

            $stInfo = new IdModel();
            $tstInfo = $stInfo ->selectInfo($tid);
            $t = get_object_vars($tstInfo[0]);
            $tclassinfo = [
            '0' => $t['number'],
            '1' => $t['name'],
            '2' => $t['sex'],
            '3' => $t['class'],
            '4' => $t['major_number'],
            '5' => $t['major_name'],
            '6' => $t['college'],
            '7' => $t['rank'],
            '8' => $t['school_status'],
            '9' => time(),
            '10' => time()
        ];

            $this->view($tclassinfo);
        }
        else {
            $this->getInfo($id);
        }

    }

    public function getInfo($id) {

        $class = substr($id, 0, 8);
        $tid = substr($id, 9);

        $add = "http://jwzx.cqupt.edu.cn/jwzxtmp/showBjStu.php?bj=" . $class;

        $curl = curl_init();  

        curl_setopt($curl, CURLOPT_URL, $add);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded;charset=utf-8;"));

        $curlopt = curl_exec($curl);
        curl_close($curl);

        $keywords = preg_match_all("/<td[^>]*>([^<>]+)<\/td>/", $curlopt, $classinfo);

        //处理数组

        array_splice($classinfo, 0, 1);

        for ($i=0; $i<count($classinfo[0]); $i++) { 
            $tclassinfo[$i] = $classinfo[0][$i];
        }

        for ($m=0; $m<1000; $m++) { 
            array_splice($tclassinfo, 0, 1);
            if ($tclassinfo[0] == $tid) {break;}
        }

        //数据库

        $data = array_slice($tclassinfo, 0, 9);

        $addinfo = new IdModel();
        $addinfo ->putInfo($data);

        $this->view($tclassinfo);

    }

    public function view($tclassinfo) {

        $title = [
            '0' => '学号', '1' => '姓名',
            '2' => '性别', '3' => '班级',
            '4' => '专业号', '5' => '专业名',
            '6' => '学院', '7' => '年级',
            '8' => '学籍状态'];

        for ($n=0; $n<9; $n++) {
            echo $title[$n] . ':';
            echo $tclassinfo[$n];
            echo '<br>';
        }

        echo '<hr>';
        echo '<a href="http://localhost/laravel52/public/stu/putinfo">修改个人信息</a><br>';
        echo '警告!第一次修改个人信息后,将不能修改其他学号对应的个人信息';

    }

    public function changeInfo($stuid) {

        $email = substr($stuid, 0, -11);
        $id = substr($stuid, -10);

        echo '<form action="/laravel52/public/tpower.php" method="POST">
        <p>修改个人信息:</p>
        <p>格式:XX=>XXX</p>
        <p>关键字:姓名,性别</p>
        <input type="text" name="changeid" placeholder="输入你的学号"><br>
        <input type="text" name="needinfo" placeholder="例:姓名=>尹政">
        <input type="submit"><hr>
        <p>学生仅能修改姓名,性别</p>
        提示:一次只能修改一条信息
        </form>';
    }

    public function tchangeInfo($theinfo) {
        $needinfo = substr($theinfo, 0, -11);
        $t1needinfo = substr($needinfo, 0, 6);
        $t2needinfo = substr($needinfo, 8);
        $changeid = substr($theinfo, -10);

        $inf = new IdModel();
        $inf -> changeInfo($t1needinfo,$t2needinfo,$changeid);
    }

    public function classtimet($id) {

        $add = "http://jwzx.cqupt.edu.cn/jwzxtmp/kebiao/kb_stu.php?xh=" . $id;

        $curl = curl_init();  
        curl_setopt($curl, CURLOPT_URL, $add);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded;charset=utf-8;"));

        $curlopt = curl_exec($curl);
        curl_close($curl);

        $keywords = preg_match_all("/<td[^>]*>([^<>]+)<\/td>/", $curlopt, $classinfo);
        //处理数组
        array_splice($classinfo, 0, 1);

        for ($i=0; $i < count($classinfo[0]); $i++) { 
            $classtimet[$i] = $classinfo[0][$i];
        }

        for ($m=0; $m < count($classtimet); $m++) { 
            if ($classtimet[0] == "备注") {break;}
            array_splice($classtimet, 0, 1);
        }

        array_splice($classtimet, 0, 1);

        for ($n=0; $n < count($classtimet); $n++) { 
            if (preg_match("/^[A-Z]+/", $classtimet[$n], $matches)) {
                echo "<hr>";
            }
        echo $classtimet[$n];
        echo '        ';
        }

    }
}
