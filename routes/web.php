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

Route::get('/users/{id}', 'UserController@users');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::post('/users/edit', 'UserController@update');


Route::get('/category', 'ItemController@category');
Route::get('/show', 'ItemController@show');
Route::get('/search', 'ItemController@search');
Route::post('/search', 'ItemController@keyword');


Route::get('/company', 'InfoController@company');
Route::get('/info', 'InfoController@info');
Route::get('/info2', 'InfoController@info2');
Route::get('/form', 'InfoController@form');
Route::post('/form', 'InfoController@send');


Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@in');
Route::post('/update', 'CartController@update');
Route::delete('/del', 'CartController@del');
// Route::get('/order', 'CartController@order');
Route::post('/order', 'CartController@order');
Route::post('/finish', 'CartController@finish');

// メール送信
Route::post('forms/send', 'InfoController@send');
Route::post('thanks/send', 'CartController@send');


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

    Route::get('/', 'RootController@index');
    Route::get('/items', 'RootController@items');
    Route::post('/items', 'RootController@store');
    Route::get('/show', 'RootController@show');
    Route::get('/edit', 'RootController@edit');
    Route::post('/edit', 'RootController@update');
    Route::get('/del', 'RootController@del');
    Route::post('/del', 'RootController@remove');
    Route::get('/category', 'RootController@category');
    Route::post('/category', 'RootController@categorystore');
    Route::get('/categoryedit', 'RootController@categoryedit');
    Route::post('/categoryedit', 'RootController@categoryupdate');
    Route::get('/categorydel', 'RootController@categorydel');
    Route::post('/categorydel', 'RootController@categoryremove');
    Route::get('/search', 'RootController@search');
});

Route::get('/home', 'HomeController@index')->name('home');
