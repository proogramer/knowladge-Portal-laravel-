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
//Frontend Routes
Route::get('/','HomeController@index');
Route::get('post','HomeController@post');

//User Panel Routes
Route::get('user-panel/login','user\LoginController@index');
Route::get('user-panel', 'user\UserController@index');

//Admin Panel Routes
Route::get('admin-panel/login','admin\LoginController@index');
Route::get('admin-panel','admin\AdminController@index');
