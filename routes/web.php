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

Route::get('/', 'TopController@index');
Route::get('/list', 'ItemController@index');
Route::get('/show', 'ItemController@show');
Route::get('/search', 'ItemController@search');
Route::post('/search', 'ItemController@keyword');



Route::get('/company', 'InfoController@company');
Route::get('/info', 'InfoController@info');
Route::get('/form', 'InfoController@form');
Route::post('/form', 'InfoController@send');


Route::get('/root', 'RootController@index');
// Route::get('/root', 'RootController@index')->middleware('auth');


Auth::routes();

/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/root/items', 'RootController@items');
Route::post('/root/items', 'RootController@store');
Route::get('/root/show', 'RootController@show');
Route::get('/root/edit', 'RootController@edit');
Route::post('/root/edit', 'RootController@update');
Route::get('/root/del', 'RootController@del');
Route::post('/root/del', 'RootController@remove');
Route::get('/root/category', 'RootController@category');
Route::post('/root/category', 'RootController@categorystore');
Route::get('/root/categoryedit', 'RootController@categoryedit');
Route::post('/root/categoryedit', 'RootController@categoryupdate');
Route::get('/root/categorydel', 'RootController@categorydel');
Route::post('/root/categorydel', 'RootController@categoryremove');
Route::get('/root/search', 'RootController@search');
