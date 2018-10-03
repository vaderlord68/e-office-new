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

Route::group(['namespace' => 'Modules\W77', 'middleware' => 'auth'], function () {
    Route::any('/W77F1000/{task?}', 'W77F1000Controller@index');
    Route::any('/W77F1001/{task?}', 'W77F1001Controller@index');

    //Quan ly xe
    Route::any('/W77F2000/{task?}', 'W77F2000Controller@index');
    Route::any('/W77F2001/{task?}', 'W77F2001Controller@index');
});

