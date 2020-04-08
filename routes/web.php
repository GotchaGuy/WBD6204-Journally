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

Route::middleware('auth')->get('home/categories/{id}', 'CategoriesController@show')->name('category-posts');
Route::middleware('auth')->get('/categories', 'CategoriesController@index')->name('categories');
Route::middleware('auth')->get('/categories/{id}/edit', 'CategoriesController@edit')->name('category-edit');
Route::middleware('auth')->put('/categories/{id}', 'CategoriesController@update')->name('category-update');
Route::middleware('auth')->delete('/categories/{id}', 'CategoriesController@destroy')->name('category-delete');

Route::middleware('auth')->get('/calendar/{id}/edit', 'EventsController@edit')->name('event-edit');
Route::middleware('auth')->put('/calendar/{id}', 'EventsController@update')->name('event-update');
Route::middleware('auth')->delete('/calendar/{id}', 'EventsController@destroy')->name('event-delete');


Route::get('/', function () {
    return view('home');
});

Auth::routes();

//Route::get('/post', 'PostsController@index')->name('post');

