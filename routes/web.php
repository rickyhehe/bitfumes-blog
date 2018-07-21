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
Route::group(['namespace' => 'user'], function () {
  Route::get('post', 'PostController@index')->name("post");
  Route::get('post/{post}', 'PostController@single')->name("post.single");
  // Route::get('/', 'HomeController@index');
});

Route::group(['namespace' => 'admin','prefix' => 'admin'], function () {
  Route::resource('user', 'UserController',['as'=>'admin']);
  Route::resource('post', 'PostController',['as'=>'admin']);
  Route::resource('tag', 'TagController',['as'=>'admin']);
  Route::resource('category', 'CategoryController',['as'=>'admin']);
});



Route::get('test', function () {
  echo str_slug("halo nama saya","-");
});
