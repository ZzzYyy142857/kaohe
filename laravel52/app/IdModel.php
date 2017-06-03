<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class IdModel extends Model
{

    public function putInfo($data) {

        $tdata = [
            'number' => $data[0],
            'name' => $data[1],
            'sex' => $data[2],
            'class' => $data[3],
            'major_number' => $data[4],
            'major_name' => $data[5],
            'college' => $data[6],
            'rank' => $data[7],
            'school_status' => $data[8],
            'create_at' => time(),
            'uptimed_at' => time()
        ];

        $inf = DB::table('studentInfo')->insert($tdata);
    }

    public function selectInfo($tid) {

        $userInfo = DB::table('studentInfo')->where('number', '=', $tid)->get();

        return $userInfo;
    }

    public function changeInfo($t1needinfo,$t2needinfo,$changeid) {
        if ($t1needinfo == '姓名') {
            $add = DB::table('studentInfo')->where('number', '=', $changeid)->update(['name'=>$t2needinfo]);
        }
        else {
            $add = DB::table('studentInfo')->where('number', '=', $changeid)->update(['sex'=>$t2needinfo]);
        }

        echo '<script> 
        window.location.href="http://localhost/laravel52/public/home"; 
        </script> ';
    }
}