<?php

$needinfo = $_POST['needinfo'];$changeid = $_POST['changeid'];
$theinfo = $needinfo . '+' . $changeid;

$root = $_POST['root'];
$roots = $_POST['roots'];

$teaneedinfo = $_POST['teaneedinfo'];$teachangeid = $_POST['teachangeid'];
$teainfo = $teaneedinfo . '+' . $teachangeid;


$add = 'Location: change/' . $theinfo;

$add1 = 'Location: ' . $root . '/input';
$add2 = 'Location: ' . $roots . '/rootinput';

$add3 = 'Location: teachange/' . $teainfo;

if (($needinfo && $changeid)) {header($add);}

if ($root) {header($add1);}
if ($roots) {header($add2);}

if (($teaneedinfo && $teachangeid)) {header($add3);}