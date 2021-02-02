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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['namespace' => 'api', 'prefix' => 'v1'], function () {
    //album
    Route::get('albums', 'AlbumController@index')->name('album');
    Route::get('images' , 'ImageController@index')->name('image');
    //blog
    Route::get('blogs' , 'BlogController@index')->name('blog');



});
