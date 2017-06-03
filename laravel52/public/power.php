<?php

//接受
$root = $_POST['root'];
$teacher = $_POST['teacher'];

$classinfo = $_POST['classinfo'];$idinfo = $_POST['idinfo'];
$tidinfo = $classinfo . '+' . $idinfo;

$stuid = $_POST['stuid'];$stuemail = $_POST['stuemail'];
$tstuid = $stuemail . '+' . $stuid;

$stunum = $_POST['stunum'];

//转路由
$add1 = 'Location: ' . $root . '/root';
$add2 = 'Location: ' . $teacher . '/teacher';

$add3 = 'Location: ' . $tidinfo;

$add4 = 'Location: stu/' . $tstuid;

$add5 = 'Location: class/' . $stunum;

if ($root) {header($add1);}

if ($teacher) {header($add2);}

if (($classinfo && $idinfo)) {header($add3);}

if (($stuid && $stuemail)) {header($add4);}

if ($stunum) {header($add5);}
