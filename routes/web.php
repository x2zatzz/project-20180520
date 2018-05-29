<?php

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

Route::get('/', 'ViewController@indexPage');

Route::get('auth', 'AuthController@form');

Route::post('authcheck', 'AuthController@check');
Route::get('authcheck', 'AuthController@check');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

