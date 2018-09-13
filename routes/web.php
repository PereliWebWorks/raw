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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('is_authorized')->group(function () {
	Route::resource('clients', 'ClientController');
});

Route::middleware('is_admin')->group(function () {
	Route::resource('user_authorizations', 'UserAuthorizationController')
		->only(['index']);
});