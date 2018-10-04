<?php

use Illuminate\Http\Request;

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
});
*/

Route::middleware('auth:api')->group(function() {
	Route::middleware('is_admin')->group(function() {
		Route::apiResource('users', 'Api\UserController');
		Route::apiResource('user_authorizations', 'Api\UserAuthorizationController');
		Route::apiResource('properties', 'Api\PropertyController');
	});
	Route::apiResource('clients', 'Api\ClientController');
	Route::apiResource('referrant_orgs', 'Api\ReferrantOrganizationController');
	Route::apiResource('referrants', 'Api\ReferrantController');
});
