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

Route::group(['namespace' => 'Modules\W76', 'middleware' => 'auth'], function () {
    //Danh mục dùng chung
    Route::any('/W76F1555/{task?}', 'W76F1555Controller@index');
    //Quản lý văn bản
    Route::any('/W76F2250/{task?}', 'W76F2250Controller@index');
    //Thêm mới văn bản
    Route::any('/W76F2251/{task?}', 'W76F2251Controller@index');

    //Quan tri he thong
    Route::any('/W76F3000/{task?}', 'W76F3000Controller@index');
    Route::any('/W76F3001/{task?}', 'W76F3001Controller@index');
    Route::any('/W76F3002/{task?}', 'W76F3002Controller@index');
});


