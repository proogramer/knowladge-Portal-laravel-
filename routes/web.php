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

//User Panel Routes
Route::get('user-panel', 'user\UserController@index');

//Admin Panel Routes
Route::get('admin-panel','admin\AdminController@index');
