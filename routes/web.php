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
    Route::get('category/list','CategoryController@listCategories');
    Route::post('category/delete','CategoryController@delCategories');
    Route::get('post/list','PostController@listPosts');
    Route::get('media/list','MediasController@listMedias');
    Route::any('settings/slider','Admin\AdminController@slider');
    Route::post('media/deleteimage','MediasController@deleteimage');
    Route::post('post/searchfilter','PostController@searchfilter');
    Route::get('post/featured','PostController@featured');
    Route::post('post/delete','PostController@delPosts');
    Route::post('post/publish','PostController@publish');
    Route::post('post/setfeatured','PostController@setfeatured');
    Route::post('post/get_cat_ids','PostController@catIds');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::resource('comment', 'CommentController');
    Route::resource('posttag', 'PostTagController');
    Route::resource('tag', 'TagController');
});
