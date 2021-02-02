<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('test' , function (){
    return view('panel.test.test');
})->name('test');
Route::post('test' , 'TestController@index');






Route::group(['prefix' => 'admin' , 'middleware' => 'PanelMiddleware' , 'namespace' => 'panel'], function (){
    //profile
    Route::get('/' , 'ProfileController@index')->name('profile.index');
    Route::get('profile/edit' , 'ProfileController@edit')->name('profile.edit');
    Route::post('profile/edit' , 'ProfileController@update');
    //user
    Route::get('user/create' , 'UserController@create')->name('user.create');
    Route::post('user/create' , 'UserController@store');
    Route::get('user/table', 'UserController@show')->name('user.show');
    Route::get('destroy/user/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('edit/user/{id}', 'UserController@edit')->name('user.edit');
    Route::post('edit/user/{id}', 'UserController@update');
    //blog
    Route::get('blog/create' , 'BlogController@create')->name('blog.create');
    Route::post('blog/create' , 'BlogController@store');
    Route::get('blog/table' , 'BlogController@show')->name('blog.show');
    Route::get('destroy/blog/{blog_id}' , 'BlogController@destroy')->name('blog.delete');
    Route::get('edit/blog/{blog_id}' , 'BlogController@edit')->name('blog.edit');
    Route::post('edit/blog/{blog_id}' , 'BlogController@update');
    //gallery & slider
    Route::get('album/create' , 'GalleryController@create')->name('image.create');
    Route::post('album/create' , 'GalleryController@store');
    Route::get('album/show' , 'GalleryController@show')->name('image.show');
    Route::get('album/destroy/{album_id}' , 'GalleryController@destroy')->name('album.delete');
    Route::get('album/edit/{album_id}' , 'GalleryController@edit')->name('album.edit');
    Route::post('album/edit/{album_id}' , 'GalleryController@update');
    //images
    Route::get('image/show/{album_id}' , 'ImageController@index')->name('gallery.show');
    Route::get('image/destroy/{img_id}' , 'ImageController@destroy')->name('gallery.destroy');

});

Route::group(['namespace' => 'template'] , function (){
    Route::get('login' , 'LoginController@Login')->name('user.login');
    Route::post('login' , 'LoginController@doLogin');
    Route::get('logout' , 'LoginController@logout')->name('user.logout');
});



Route::get('/c', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cleared Cache";
});


