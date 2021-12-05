<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\PostController@index')->name('home');
Route::get('/article/{slug}', 'App\Http\Controllers\PostController@show')->name('posts.single');
Route::get('/category/{slug}', 'App\Http\Controllers\CategoryController@show')->name('categories.single');
Route::get('/tag/{slug}', 'App\Http\Controllers\TagController@show')->name('tags.single');


Route::match(['get', 'post'], '/contact', 'App\Http\Controllers\ContactController@index')->name('contact');


Route::get('/search', 'App\Http\Controllers\SearchController@index')->name('search');

Route::group(['prefix' => 'admin', /*'namespace' => 'App\Http\Controllers\Admin'*/ 'middleware' => 'admin'],
    function () {
        Route::get('/', 'App\Http\Controllers\Admin\MainController@index')->name('admin.index');
        Route::resource('/categories', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('/tags', 'App\Http\Controllers\Admin\TagController');
        Route::resource('/posts', 'App\Http\Controllers\Admin\PostController');
    });
Route::group(['middleware'=> 'guest'], function (){
    Route::get('/register', 'App\Http\Controllers\UserController@create')->name('register.create');
    Route::post('/register', 'App\Http\Controllers\UserController@store')->name('register.store');
    Route::get('/login', 'App\Http\Controllers\UserController@loginForm')->name('login.create');
    Route::post('/login', 'App\Http\Controllers\UserController@login')->name('login');
});

Route::group(['middleware'=> 'auth'], function () {
    Route::get('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');/*->middleware('auth')*/
});
//Route::get('/admin', 'App\Http\Controllers\Admin\MainController@index')->name('admin.index');
