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

//https://laracasts.com/series/how-to-be-awesome-in-phpstorm


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('posts', 'ApiPostsController@index');
Route::middleware('auth:api')->post('post-form', 'PostFormController@store');
Route::middleware('auth:api')->post('posts', 'ApiPostsController@store');