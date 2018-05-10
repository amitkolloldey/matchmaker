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

Route::get( '/', 'front\HomeController@showregform' )->name( '/' );
Route::post( '/sendregister', 'front\HomeController@register' )->name( 'front.register' );
Route::get( '/user/activate/{token}', 'front\HomeController@activateuser' )->name( 'user.activate' );


//parvez route start
Route::get( '/matchmaker/login', 'back\MatchMaker@index' )->name( 'matchmaker.login' );
Route::post( '/matchmaker/loginCheck', 'back\MatchMaker@login' )->name( 'matchmaker.login.check' );
Route::get( '/matchmaker/create', 'back\MatchMaker@create' )->name( 'matchmaker.create' );
Route::post( '/matchmaker/store', 'back\MatchMaker@store' )->name( 'matchmaker.store' );
Route::get( '/matchmaker/profile/{id}', 'back\MatchMaker@show' )->name( 'matchmaker.profile' );
Route::get( '/matchmaker/edit/{id}', 'back\MatchMaker@edit' )->name( 'matchmaker.edit' );
Route::post( '/matchmaker/update/{id}', 'back\MatchMaker@update' )->name( 'matchmaker.update' );
//Route::get( '/matchmaker/compare/{id}/{compare_id?}', 'back\CompareController@compareTo' )->name( 'matchmaker.compare' );
Route::get( '/matchmaker/compare/{id}', 'back\CompareController@compareTo' )->name( 'matchmaker.compare' );
Route::post( '/matchmaker/getusers', 'back\CompareController@getUsers' )->name( 'matchmaker.users' );
Route::post( '/matchmaker/matched', 'back\CompareController@matched' )->name( 'matchmaker.matched' );
Route::post( '/matchmaker/getuser', 'back\CompareController@getUser' )->name( 'matchmaker.user' );
Route::post( '/image/upload', 'UploadImage@uploadThumb' )->name( 'image.upload' );
//Route::get( '/admin/matchmaker/request/{id}', 'back\MatchMaker@requestMatching' )->name( 'admin.matchmaker.request' );
//parvez route end

Route::group( [ 'middleware' => 'userauth' ], function () {
	Route::get( '/profile/{id}', 'front\UserProfileController@profile' )->name( 'user.profile' );
	Route::post( '/profile/update/{id}', 'front\UserProfileController@update' )->name( 'user.profile.update' );
	Route::get( '/profile/show/{id}', 'front\UserProfileController@show' )->name( 'user.profile.show' );
	Route::post( '/profile/image/{id}', 'front\UserProfileController@profileimage' )->name( 'profile.image.post' );
	Route::get( '/profile/user/changepassword/{id}', 'front\UserProfileController@passwordchangeform' )->name( 'password.change' );
	Route::post( '/profile/password/{id}', 'front\UserProfileController@passwordchange' )->name( 'profile.password.change' );
	Route::get( '/profile/public/share/{id}', 'front\UserProfileController@shareprofile' )->name( 'profile.share' );
} );

Route::group( [ 'middleware' => 'guest' ], function () {
	Route::get( 'admin/login', 'admin\AdminHomeController@login' )->name( 'admin.login' );
} );

Route::group( [ 'middleware' => 'adminauth' ], function () {
	Route::get( 'admin/dashboard', 'admin\AdminHomeController@index' )->name( 'admin.home' );
	Route::resource( '/admin/roles', 'admin\AdminRolesController' );
	Route::resource( '/admin/users', 'admin\AdminUsersController' );
} );


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


