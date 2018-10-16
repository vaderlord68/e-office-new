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

Route::group(['namespace' => 'Modules\W83', 'middleware' => 'auth'], function () {
    //Quản lý bản tin
    Route::any('/W76F2140/{task?}', 'W76F2140Controller@index'); //news management
    Route::any('/W76F2141/{task?}', 'W76F2141Controller@index');//news management
    Route::any('/W76F2142/{component?}', 'W76F2142Controller@index');//display news
    Route::any('/W76F2150/{type?}', 'W76F2150Controller@index');//document
});

