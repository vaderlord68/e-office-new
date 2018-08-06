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

Route::get('/', 'Core\IndexController@index');
Route::get('/login', 'User\AuthenticateController@index');
Route::post('/login/post', 'User\AuthenticateController@loginPost');
Route::get('/logout/post', 'User\AuthenticateController@logoutPost');
Route::get('/bi', 'Module\Bi\IndexController@index');