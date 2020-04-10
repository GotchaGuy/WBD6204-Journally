<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('posts', 'ApiPostsController@index');
Route::middleware('auth:api')->post('posts', 'ApiPostsController@store');
Route::middleware('auth:api')->put('posts/{id}', 'ApiPostsController@update');
Route::middleware('auth:api')->delete('posts/{id}', 'ApiPostsController@delete');


Route::middleware('auth:api')->get('categories', 'ApiCategoriesController@index');
Route::middleware('auth:api')->post('categories', 'ApiCategoriesController@store');
Route::middleware('auth:api')->put('categories/{id}', 'ApiCategoriesController@update');
Route::middleware('auth:api')->delete('categories/{id}', 'ApiCategoriesController@delete');


Route::middleware('auth:api')->get('events', 'ApiCalendarController@index');
Route::middleware('auth:api')->post('events', 'ApiEventsController@store');
Route::middleware('auth:api')->put('events/{id}', 'ApiEventsController@update');
Route::middleware('auth:api')->delete('events/{id}', 'ApiEventsController@delete');

Route::middleware('auth:api')->get('statuses', 'ApiStatusesController@index');

Route::middleware('auth:api')->post('/image/upload', 'ApiImageUploadController@uploadImage');

