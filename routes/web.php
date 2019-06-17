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
Route::get('accounts', 'ViewController@accountsPage');
Route::post('adduser', 'AuthController@check');


Route::post('authcheck', 'AuthController@check');
Route::get('authcheck', 'AuthController@check');

Route::post('checkout', 'InventoryController@checkout');
Route::post('checkin', 'InventoryController@checkin');
Route::post('newitem', 'InventoryController@newitem');
Route::post('updateitem', 'InventoryController@updateitem');


Route::post('fetch_itemdetail', 'FetchController@itemdetail');
Route::post('fetch_name', 'FetchController@itemname');
Route::post('fetch_brand', 'FetchController@itembrand');
Route::post('fetch_itemupdate', 'FetchController@itemupdate');
Route::post('fetch_username', 'FetchController@username');


