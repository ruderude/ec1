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

Route::get('/root', 'RootController@index');

Route::get('/rootitems', 'RootController@items');
Route::post('/rootitems', 'RootController@store');
Route::get('/rootshow', 'RootController@show');
Route::get('/rootedit', 'RootController@edit');
Route::post('/rootedit', 'RootController@update');
Route::get('/rootdel', 'RootController@del');
Route::post('/rootdel', 'RootController@remove');
Route::get('/rootcategory', 'RootController@category');
Route::post('/rootcategory', 'RootController@categorystore');
Route::get('/rootcategoryedit', 'RootController@categoryedit');
Route::post('/rootcategoryedit', 'RootController@categoryupdate');
Route::get('/rootcategorydel', 'RootController@categorydel');
Route::post('/rootcategorydel', 'RootController@categoryremove');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
