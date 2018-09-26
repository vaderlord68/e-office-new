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

Route::group(['namespace' => 'Modules\W82', 'middleware' => 'auth'], function () {
    Route::get('/bi', 'IndexController@index');
    Route::get('/bi/folder/view', 'Folder\ViewController@index');
    Route::post('/bi/folder/share', 'Folder\ViewController@share');
    Route::post('/bi/folder/share/execute', 'Folder\ViewController@shareExecute');
    Route::get('/bi/folder/create/index', 'Folder\CreateController@index');
    Route::post('/bi/folder/create/execute', 'Folder\CreateController@execute');
    Route::get('/bi/folder/rename/index', 'Folder\RenameController@index');
    Route::post('/bi/folder/rename/execute', 'Folder\RenameController@execute');
    Route::get('/bi/folder/delete/execute', 'Folder\DeleteController@execute');
    Route::post('/bi/folder/search/', 'Folder\SearchController@execute');

    Route::get('/bi/document/create/index', 'Document\CreateController@index');
    Route::post('/bi/document/create/execute', 'Document\CreateController@execute');
    Route::get('/bi/document/view', 'Document\ViewController@index');
    Route::get('/bi/document/edit', 'Document\EditController@index');
    Route::post('/bi/document/edit/execute', 'Document\EditController@execute');
    Route::get('/bi/document/deleteAttachment/{documentID}/{fileName}', 'Document\DeleteAttachmentController@index');

    Route::get('/news/{task?}', 'Module\News\NewsController@index');
    Route::get('/news/manage', 'Module\News\ManageNewsController@index');
    Route::get('/news/manage/filter', 'Module\News\ManageNewsController@filter');
    Route::get('/news/create', 'Module\News\CreateNewsController@index');
    Route::post('/news/create/save', 'Module\News\CreateNewsController@execute');
    Route::get('/news/edit/{newsid}', 'Module\News\EditNewsController@index');
    Route::post('/news/edit/save', 'Module\News\EditNewsController@execute');
    Route::get('/news/delete', 'Module\News\DeleteNewsController@execute');
    Route::get('/news/search/title', 'Module\News\SearchNewsController@searchTitle');
});

