<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\W80', 'middleware' => 'auth'], function () {
    //Danh sach phong hop
    Route::any('/W76F2200/{task?}', 'W76F2200Controller@index');
    Route::any('/W76F2201/{task?}', 'W76F2201Controller@index');

    //Quan lý phong hop
    Route::any('/W76F2230/{task?}', 'W76F2230Controller@index'); //Đang làm
    Route::any('/W76F2231/{task?}', 'W76F2231Controller@index'); //Đang làm
});

