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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/quotes', [
    'uses' => 'QuoteController@get'
]);

Route::post('/quotes', [
    'uses' => 'QuoteController@post'
]);

Route::put('/quotes/{id}', [
    'uses' => 'QuoteController@put'
]);

Route::delete('/quotes/{id}', [
    'uses' => 'QuoteController@delete'
]);
