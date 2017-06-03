<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::any('/stu/putinfo', 'ChangeController@putInfo');

Route::any('/stu/{stuid}', 'StuController@changeInfo')->middleware('change');

Route::any('/notice', 'TeaController@notice');

Route::any('/{id}', 'StuController@judgeInfo')->middleware('id');

Route::any('/change/{theinfo}', 'StuController@tchangeInfo')->middleware('changeid');

Route::any('/{email}/teacher', 'TeaController@view')->middleware('teacher');

Route::any('/{root}/root', 'RootController@view')->middleware('root');

Route::any('/{input}/input', 'RootController@input')->middleware('input');

Route::any('/{inputs}/rootinput', 'RootController@inputs')->middleware('inputs');

Route::any('/teachange/{teainfo}', 'TeaController@changeInfo')->middleware('teachange');

Route::any('/class/{num}', 'StuController@classtimet')->middleware('class');
