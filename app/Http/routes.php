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
    Route::get('dashboard/book/{id}', 'AdminController@book');
    Route::get('dashboard/settings', 'AdminController@settings');
    Route::get('dashboard/images', 'AdminController@images');
    Route::post('dashboard/images', 'AdminController@uploadImage');
    Route::get('dashboard/images/{id}', 'AdminController@image');
    
});