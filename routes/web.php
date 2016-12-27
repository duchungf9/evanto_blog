<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['prefix'=>'admin'],function(){
    Route::get('/dashboard','Admin\AdminController@index');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::resource('comment', 'CommentController');
    Route::resource('posttag', 'PostTagController');
    Route::resource('tag', 'TagController');
});
