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
Route::get('post/{title}','HomeController@view_post');
Auth::routes();
//User Panel Routes
Route::prefix('user-panel')->group(function(){
    //user Panel Post Routes
    Route::get('/', 'user\UserController@index')->name('user-panel.dashboard');;
    Route::get('/add-post','user\PostController@add_post')->name('user-panel.add-post');
    Route::post('/add-post','user\PostController@add_post_store')->name('user-panel.add-post.submit');
    Route::get('/list-post','user\PostController@list_post')->name('user-panel.list-post');
    Route::get('/edit-post/{title}','user\PostController@edit_post');
    Route::post('/edit-post','user\PostController@edit_post_store')->name('user-panel.edit-post.submit');
    Route::post('/delete-post','user\PostController@delete_post')->name('user-panel.delete-post');
    //User Panle Profile Routes
    Route::get('/profile','user\ProfileController@profile')->name('user-panel.profile');
});
//Admin Panel Routes
Route::prefix('admin-panel')->group(function(){
    //Admin Login Routes
    Route::get('login','Auth\AdminLoginController@ShowLoginForm');
    Route::post('login','Auth\AdminLoginController@login')->name('admin-panel.login.submit');
    //Dashboard Routes
    Route::get('/','admin\AdminController@index')->name('admin-panel.dashboard');
    //Admin Post Routes
    Route::get('/add-category','admin\CategoryController@add_category')->name('admin-panel.add-category');
    Route::post('/add-category','admin\CategoryController@add_category_store')->name('admin-panel.add-category.submit');
    Route::get('/list-category','admin\CategoryController@list_category')->name('admin-panel.list-category');
    Route::post('/edit-category','admin\CategoryController@edit_category')->name('admin-panel.edit-category');
    Route::post('/edit-category-submit','admin\CategoryController@edit_category_store')->name('admin-panel.edit-category.submit');
    Route::post('/delete-category','admin\CategoryController@delete_category')->name('admin-panel.delete-category');
    //Admin Post Routes
    Route::get('/add-post','admin\PostController@add_post')->name('admin-panel.add-post');
    Route::post('/add-post','admin\PostController@add_post_store')->name('admin-panel.add-post.submit');
    Route::get('/list-post','admin\PostController@list_post')->name('admin-panel.list-post');
    Route::get('/edit-post/{title}','admin\PostController@edit_post');
    Route::post('/edit-post','admin\PostController@edit_post_store')->name('admin-panel.edit-post.submit');
    Route::post('/delete-post','admin\PostController@delete_post')->name('admin-panel.delete-post');
    //Admin User Routes
    Route::get('/add-user','admin\UserController@add_user')->name('admin-panel.add-user');
    Route::post('/add-user','admin\UserController@add_user_store')->name('admin-panel.add-user.submit');
    Route::get('/list-user','admin\UserController@list_user')->name('admin-panel.list-user');
    Route::post('/view-user','admin\UserController@view_user')->name('admin-panel.view-user');
    Route::post('/edit-user','admin\UserController@edit_user')->name('admin-panel.edit-user');
    Route::post('/edit-user-submit','admin\UserController@edit_user_store')->name('admin-panel.edit-user.submit');
    Route::post('/delete-user','admin\UserController@delete_user')->name('admin-panel.delete-user');
    //User Panle Profile Routes
    Route::get('/profile','admin\ProfileController@profile')->name('admin-panel.profile');
});




//Route::get('/home', 'HomeController@index')->name('home');
