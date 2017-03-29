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



Auth::routes();

Route::group(['prefix'=>'admin'],function(){
    Route::get('/','Admin\AdminController@index');
    Route::get('/dashboard','Admin\AdminController@index');
    Route::get('category/list','CategoryController@listCategories');
    Route::post('category/delete','CategoryController@delCategories');
    Route::get('/page','PageController@index');
    Route::get('/page/list','PageController@index');
    Route::any('/page/create/{id?}','PageController@create');
    Route::post('/page/delete','PageController@delete');
    Route::get('post/list','PostController@listPosts');
    Route::post('post/savetags','PostController@savetags');
    Route::post('post/savemeta','PostController@savemeta');
    Route::post('product/savemeta','ProductController@savemeta');
    Route::get('product/list','ProductController@listPosts');
    Route::post('product/savetags','ProductController@savetags');
    Route::post('product/savemeta','ProductController@savemeta');
    Route::post('product/saveprice','ProductController@saveprice');
    Route::get('product/list','ProductController@listPosts');
    Route::get('media/list','MediasController@listMedias');
    Route::any('settings/slider','Admin\AdminController@slider');
    Route::any('settings/profile','Admin\AdminController@profile');
    Route::any('settings/site','Admin\AdminController@site');
    Route::any('settings/menu','Admin\AdminController@frontmenu');
    Route::any('settings/module','Admin\AdminController@module');
    Route::post('media/deleteimage','MediasController@deleteimage');
    Route::post('post/searchfilter','PostController@searchfilter');
    Route::get('post/featured','PostController@featured');
    Route::post('post/delete','PostController@delPosts');
    Route::post('post/publish','PostController@publish');
    Route::post('post/setfeatured','PostController@setfeatured');
    Route::post('post/get_cat_ids','PostController@catIds');
    Route::post('product/searchfilter','ProductController@searchfilter');
    Route::get('product/featured','ProductController@featured');
    Route::post('product/delete','ProductController@delPosts');
    Route::post('product/publish','ProductController@publish');
    Route::post('product/setfeatured','ProductController@setfeatured');
    Route::post('product/get_cat_ids','ProductController@catIds');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::resource('product', 'ProductController');
    Route::resource('comment', 'CommentController');
    Route::resource('posttag', 'PostTagController');
    Route::resource('tag', 'TagController');
    Route::get('sitemap','Admin\AdminController@sitemap');
});
Route::group(['prefix'=>'/'],function(){
    Route::get('/',function(){
        echo "Site under Contruction!";
    });
    //Route::get('/', 'HomeController@index');
    //Route::get('/search', 'HomeController@search');
    //Route::get('/crawl', 'HomeController@crawl');
    //Route::get("/{category}","HomeController@cats");
    //Route::get("/{category}/{alias}","HomeController@posts");
});