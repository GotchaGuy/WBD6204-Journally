<?php

use Illuminate\Support\Facades\Route;

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
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->get('/posts/{id}', 'PostsController@show')->name('posts');
Route::middleware('auth')->get('/posts/{id}/edit', 'PostsController@edit')->name('post-edit');
Route::middleware('auth')->put('/posts/{id}', 'PostsController@update')->name('post-update');

Route::middleware('auth')->get('/calendar', 'CalendarController@index')->name('calendar');

Route::middleware('auth')->get('/home/{id}', 'CategoriesController@show')->name('categories');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/post', 'PostsController@index')->name('post');

