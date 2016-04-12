<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'FrontController@home');
//Route::get('/book/{id}', 'FrontController@book');
//Route::get('/info', 'FrontController@info');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// only logged in users
Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', 'AdminController@home');
    Route::get('dashboard/book', 'AdminController@bookManage');
    Route::post('dashboard/book', 'AdminController@bookCreate');
    Route::get('dashboard/bookDelete/{id}', 'AdminController@bookDelete');
    Route::get('dashboard/book/{id}/edit', 'AdminController@bookEdit');
    Route::get('dashboard/book/{id}', 'AdminController@book');
    Route::post('dashboard/book/{id}', 'AdminController@bookSave');
    Route::get('dashboard/settings', 'AdminController@settings');
    Route::post('dashboard/settings', 'AdminController@settingsSave');
    Route::get('dashboard/images', 'AdminController@images');
    Route::post('dashboard/images', 'AdminController@uploadImage');
    Route::get('dashboard/images/{id}', 'AdminController@image');
    Route::get('dashboard/slides', 'AdminController@slides');
	Route::get('dashboard/slide/create/{id}', 'AdminController@slideCreate');
	Route::get('dashboard/slide/{id}/delete', 'AdminController@slideDelete');
	Route::post('dashboard/slide/{id}/edit', 'AdminController@slideEdit');

    Route::get('/dashboard/albums', array('as' => 'index','uses' => 'AlbumsController@getList'));
    Route::get('/dashboard/orderalbums', array('as' => 'album_order','uses' => 'AlbumsController@order'));
    Route::post('/dashboard/orderalbums', array('as' => 'album_order','uses' => 'AlbumsController@orderSet'));
    Route::get('/createalbum', array('as' => 'create_album_form','uses' => 'AlbumsController@getForm'));
    Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@postCreate'));
    Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete'));
    Route::get('/album/{id}', array('as' => 'show_album','uses' => 'AlbumsController@getAlbum'));
    Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImagesController@getForm'));
    Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImagesController@postAdd'));
    Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImagesController@getDelete'));
    Route::post('/moveimage', array('as' => 'move_image', 'uses' => 'ImagesController@postMove'));
});
