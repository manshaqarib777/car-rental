<?php

use Illuminate\Http\Request;

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




Route::get('searchcars','APIController@search_cars');
Route::get('get_cars_across_category','APIController@get_cars_across_category');
Route::get('view_car','APIController@view_car');
