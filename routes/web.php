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

Route::get( '/', function () {
	return view( 'welcome' );
} );

Auth::routes();

Route::get( '/home', 'HomeController@index' );

Route::group( [ 'middleware' => 'auth' ], function () {


	Route::get( '/profile/edit/info', [
		'uses' => 'ProfilesController@edit',
		'as'   => 'profile.edit'
	] );

	Route::post( '/profile/update/info', [
		'uses' => 'ProfilesController@update',
		'as'   => 'profile.update'
	] );


	Route::get( '/profile/{slug}', [
		'uses' => 'ProfilesController@index',
		'as'   => 'profile'
	] );


} );
