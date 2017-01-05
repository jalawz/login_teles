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

/**
 * Home
 */

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

/**
 * Autenticação
 */

Route::get('/registrar', [
	'uses' => 'AuthController@getSignup',
	'as' => 'auth.signup',
	'middleware' => ['guest']
]);

Route::post('/registrar', [
	'uses' => 'AuthController@postSignup',
	'middleware' => ['guest']
]);

Route::get('/login', [
	'uses' => 'AuthController@getSignin',
	'as' => 'auth.signin',
	'middleware' => ['guest']
]);

Route::post('/login', [
	'uses' => 'AuthController@postSignin',
	'middleware' => ['guest']
]);

Route::get('/logout', [
	'uses' => 'AuthController@getSignout',
	'as' => 'auth.signout'
]);

/**
 * Perfil
 */
 Route::get('/perfil/{id}', [
     'uses' => 'ProfileController@getProfile'
 ]);

 Route::post('perfil/update', [
     'uses' => 'ProfileController@postProfile',
     'as' => 'profile.update'
 ]);
