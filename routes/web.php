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

Route::get('/', function () {
    return redirect(route('posts.index'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts','PostsController');
Route::resource('/comments','CommentController');
Route::group(['middleware'=>'auth','prefix'=>'admin'],function () {
    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('/posts','AdminController@posts')->name('admin.posts.all');
    Route::get('/add_post','AdminController@postsForm')->name('admin.posts.add');
    Route::post('/posts','AdminController@postsSave')->name('admin.posts.save');
    Route::get('/posts/{post_id}','AdminController@postEditForm')->name('admin.posts.edit');
    Route::post('/posts/{post_id}','AdminController@postUpdateForm')->name('admin.posts.update');
    Route::post('/posts/{post_id}/delete','AdminController@postsDelete')->name('admin.posts.delete');
});