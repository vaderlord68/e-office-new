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


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;


Route::get('/login', 'User\AuthenticateController@index')->name('login');
Route::post('/login/post', 'User\AuthenticateController@loginPost');
Route::any('/logout/post', 'User\AuthenticateController@logoutPost');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'Core\IndexController@index');
});

//Danh muc xe cong tac
Route::group(['namespace' => 'Module\W77','middleware' => 'auth'], function () {
    Route::any('/W77F1000/{task?}', 'W77F1000Controller@index');
    Route::any('/W77F1001/{task?}', 'W77F1001Controller@index');
});
//end-Danh muc xe cong tac
//Back pages
Route::group(['namespace' => 'Admin'], function() {
    Route::any('/administrator', function(){
        return Redirect::to('/admin/home');
    });
    Route::any('/adminlogin', function(){
        return Redirect::to('/admin/home');
    });
});
Route::group(['namespace' => 'Admin'], function() {
    Route::any('/admin/home', 'AuthController@home');
    Route::any('/admin/login/{task?}', 'AuthController@login');
    Route::any('/admin/logout', 'AuthController@logout');
    Route::any('/admin/W00F0001/{task?}', 'W00F0001Controller@index');
    Route::any('/admin/W00F0002/{task?}', 'W00F0002Controller@index');
    Route::any('/admin/W00F0003/{task?}', 'W00F0003Controller@index');
});

$routePartials = ['W76','W77', 'W78', 'W79', 'W80', 'W81', 'W82', 'W83', 'W84', 'W85', 'W86', 'W87', 'W88', 'W89','W90'];
foreach ($routePartials as $route) {
    $file = __DIR__.'/modules/'.$route.'.php';
    if ( ! file_exists($file))
    {
        $msg = "Route partial [{$route}] not found.";
        throw new \Illuminate\Filesystem\FileNotFoundException($msg);
    }
    require_once $file;
}











