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

Route::namespace('api')->group(function() {
    Route::get('brands', 'BrandController@index');
    Route::get('products', 'ProductController@index');
    Route::get('products/{id}', 'ProductController@show');
    Route::get('brands/{id}', 'BrandController@show');
    Route::get('brands/{id}/search', 'BrandController@search');
    Route::get('products/search', 'ProductController@search');

});


Route::get('/', 'HomeController@index');
Route::get('/sendmail', 'HomeController@SendReminderEmail');