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
Route::get('/','HomeController@index')->name('home');
Route::get('post','HomeController@post');
Auth::routes();
//User Panel Routes
Route::prefix('user-panel')->group(function(){
    Route::get('user-panel/login','user\LoginController@index');
    //user Panel Post Routes
    Route::get('/', 'user\UserController@index');
    Route::get('/add-post','user\PostController@add_post')->name('user-panel.add-post');
    Route::post('/add-post','user\PostController@add_post_store')->name('user-panel.add-post.submit');
    Route::get('/list-post','user\PostController@list_post')->name('user-panel.list-post');
    Route::get('/edit-post','user\PostController@edit_post')->name('user-panel.edit-post');
    Route::post('/edit-post','user\PostController@edit_post_store')->name('user-panel.edit-post.submit');
    Route::post('/delete-post','user\PostController@delete_post')->name('user-panel.delete-post');
    //User Panle Profile Routes
    Route::get('/profile','user\ProfileController@profile')->name('user-panel.profile');
});
//Admin Panel Routes
Route::prefix('admin-panel')->group(function(){
    Route::get('login','Auth\AdminLoginController@ShowLoginForm');
    Route::post('login','Auth\AdminLoginController@login')->name('admin-panel.login.submit');
    Route::get('/','admin\AdminController@index');
});




//Route::get('/home', 'HomeController@index')->name('home');
