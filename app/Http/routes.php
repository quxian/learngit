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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/set','TestController@set');
Route::get('/get','TestController@get');
Route::get('/view','TestController@view');
Route::get('/upload','TestController@upload');

Route::auth();

Route::get('/home', 'HomeController@index');
