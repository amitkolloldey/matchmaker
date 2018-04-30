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

Route::get( '/', 'front\HomeController@showregform' );
Route::post( '/sendregister', 'front\HomeController@register' )->name( 'front.register' );
Route::get( '/user/activate/{token}', 'front\HomeController@activateuser' )->name( 'user.activate' );

Route::get( '/matchmaker/create', 'back\MatchMaker@create' )->name( 'matchmaker.create' );
Route::post( '/matchmaker/store', 'back\MatchMaker@store' )->name( 'matchmaker.store' );
Route::get( '/matchmaker/profile/{id}', 'back\MatchMaker@show' )->name( 'matchmaker.profile' );
Route::get( '/matchmaker/edit/{id}', 'back\MatchMaker@edit' )->name( 'matchmaker.edit' );
Route::post( '/matchmaker/update/{id}', 'back\MatchMaker@update' )->name( 'matchmaker.update' );
Route::post( '/image/upload', 'UploadImage@uploadThumb' )->name( 'image.upload' );
//Route::get( '/admin/matchmaker/request/{id}', 'back\MatchMaker@requestMatching' )->name( 'admin.matchmaker.request' );


Route::group( [ 'prefix' => 'user' ], function () {
	Route::get( '/profile/{id}', 'front\UserProfileController@profile' )->name( 'user.profile' );
	Route::post( '/profile/update/{id}', 'front\UserProfileController@update' )->name( 'user.profile.update' );
	Route::get( '/profile/show/{id}', 'front\UserProfileController@show' )->name( 'user.profile.show' );
	Route::post( '/profile/image/{id}', 'front\UserProfileController@profileimage' )->name( 'profile.image.post' );
	Route::get( '/profile/user/changepassword/{id}', 'front\UserProfileController@passwordchangeform' )->name( 'password.change' );
	Route::post( '/profile/password/{id}', 'front\UserProfileController@passwordchange' )->name( 'profile.password.change' );
	Route::get( '/profile/public/share/{id}', 'front\UserProfileController@shareprofile' )->name( 'profile.share' );
} );
Auth::routes();


