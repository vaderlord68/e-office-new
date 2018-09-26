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

Route::group(['namespace' => 'Modules\W78', 'middleware' => 'auth'], function () {
    //Quản lý họp đồng
    Route::any('/W76F2130/{task?}', 'W76F2130Controller@index');
    Route::any('/W76F2131/{task?}', 'W76F2131Controller@index');
});

