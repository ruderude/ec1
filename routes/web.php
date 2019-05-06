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


Auth::routes();

Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\Auth\LoginController@login')->name('admin.login');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
