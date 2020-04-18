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

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->get('/posts/{id}', 'PostsController@show')->name('posts');
Route::middleware('auth')->get('/posts/{id}/edit', 'PostsController@edit')->name('post-edit');

Route::middleware('auth')->get('/calendar', 'CalendarController@index')->name('calendar');
Route::middleware('auth')->get('/calendar/{id}/edit', 'EventsController@edit')->name('event-edit');

Route::middleware('auth')->get('/categories', 'CategoriesController@index')->name('categories');
Route::middleware('auth')->get('home/categories/{id}', 'CategoriesController@show')->name('category-posts');


Route::middleware('auth')->get('/favorites', 'FavoritesController@index')->name('favorites');


Auth::routes();

