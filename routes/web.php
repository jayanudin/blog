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

Route::get('/', [
    'uses' => 'BlogController@index',
    'as' => 'home'
]);

Route::get('/showall', [
    'uses' => 'BlogController@showAll',
    'as' => 'all'
]);

Route::get('/detail/{slug}', [
    'uses' => 'BlogController@detail',
    'as' => 'blog.detail'
]);

Route::post('/blog/postComment', [
    'uses' => 'BlogController@postComment',
    'as' => 'comment.postComment'
]);



//dashboard 

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

Route::get('/post/tags', [
    'uses' => 'PostController@loadTags',
    'as' => 'tags',
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

//tag

Route::get('/tag', [
    'uses' => 'TagController@index',
    'as' => 'tag',
    'middleware' => 'auth'
]);

Route::get('/tag/create', [
    'uses' => 'TagController@create',
    'as' => 'tag.create',
    'middleware' => 'auth'
]);

Route::post('/tag/store', [
    'uses' => 'TagController@store',
    'as' => 'tag.store',
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

//comment

Route::get('/comment', [
    'uses' => 'CommentController@index',
    'as' => 'comment',
    'middleware' => 'auth'
]);

Route::get('/comment/create', [
    'uses' => 'CommentController@create',
    'as' => 'comment.create',
    'middleware' => 'auth'
]);

Route::post('/comment/store', [
    'uses' => 'CommentController@store',
    'as' => 'comment.store',
    'middleware' => 'auth'
]);

Route::get('/comment/edit/{id}', [
    'uses' => 'CommentController@edit',
    'as' => 'comment.edit',
    'middleware' => 'auth'
]);

Route::post('/comment/update/{id}', [
    'uses' => 'CommentController@update',
    'as' => 'comment.update',
    'middleware' => 'auth'
]);


Route::get('/comment/destroy/{id}', [
    'uses' => 'CommentController@destroy',
    'as' => 'comment.destroy',
    'middleware' => 'auth'
]);

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
