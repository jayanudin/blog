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

//fronend

Route::get('/blog/home', [
    'uses' => 'BlogController@index',
    'as' => 'home'
]);

Route::get('/blog/detail/{slug}', [
    'uses' => 'BlogController@detail',
    'as' => 'blog.detail'
]);


//dashboard 

Route::get('/', [
    'uses' => 'DashboardController@index',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::get('/dashboard', [
    'uses' => 'DashboardController@index',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

// article

Route::get('/post', [
    'uses' => 'PostController@index',
    'as' => 'post',
    'middleware' => 'auth'
]);

Route::get('/post/create', [
    'uses' => 'PostController@create',
    'as' => 'post.create',
    'middleware' => 'auth'
]);

Route::post('/post/store', [
    'uses' => 'PostController@store',
    'as' => 'post.store',
    'middleware' => 'auth'
]);

Route::get('/post/edit/{id}', [
    'uses' => 'PostController@edit',
    'as' => 'post.edit',
    'middleware' => 'auth'
]);

Route::post('/post/update/{id}', [
    'uses' => 'PostController@update',
    'as' => 'post.update',
    'middleware' => 'auth'
]);


Route::get('/post/destroy/{id}', [
    'uses' => 'PostController@destroy',
    'as' => 'post.destroy',
    'middleware' => 'auth'
]);

//category 

Route::get('/category', [
    'uses' => 'CategoryController@index',
    'as' => 'category',
    'middleware' => 'auth'
]);

Route::get('/category/create', [
    'uses' => 'CategoryController@create',
    'as' => 'category.create',
    'middleware' => 'auth'
]);

Route::post('/category/store', [
    'uses' => 'CategoryController@store',
    'as' => 'category.store',
    'middleware' => 'auth'
]);

Route::get('/category/edit/{id}', [
    'uses' => 'CategoryController@edit',
    'as' => 'category.edit',
    'middleware' => 'auth'
]);

Route::post('/category/update/{id}', [
    'uses' => 'CategoryController@update',
    'as' => 'category.update',
    'middleware' => 'auth'
]);


Route::get('/category/destroy/{id}', [
    'uses' => 'CategoryController@destroy',
    'as' => 'category.destroy',
    'middleware' => 'auth'
]);

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
