<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');
Route::get('about', 'HomeController@getAbout');
//Route::get('login', 'LoginController@getIndex');
Route::post('user/authenticate', 'UserController@postAuthenticate');
Route::get('dashboard/index', 'DashboardController@postIndex');
Route::get('user/logout', 'UserController@postLogout');
Route::post('photo/upload', 'PhotoController@upload');

Route::filter('auth', function() {
    if (Auth::guest()) return Redirect::to('home');
});

Route::filter('nonauth', function() {
    if (Auth::guest() == false) return Redirect::to('dashboard');
});