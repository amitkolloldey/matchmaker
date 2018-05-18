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
Route::prefix( 'matchmaker' )->group( function () {
	Route::get( '/login', 'Auth\MatchMakerLoginController@showLoginForm' )->name( 'matchmaker.login' );
	//Route::get( '/logout', 'Auth\MatchMakerLoginController@logout' )->name( 'matchmaker.logout' );
	Route::post( '/loginCheck', 'Auth\MatchMakerLoginController@login' )->name( 'matchmaker.login.check' );
	Route::get( '/create', 'back\MatchMaker@create' )->name( 'matchmaker.create' );
	Route::post( '/store', 'back\MatchMaker@store' )->name( 'matchmaker.store' );
	Route::get( '/profile/{id}', 'back\MatchMaker@show' )->name( 'matchmaker.profile' );
	Route::get( '/profile', 'back\MatchMaker@showAuth' )->name( 'matchmaker.profile.auth' );
	Route::get( '/edit/{id}', 'back\MatchMaker@edit' )->name( 'matchmaker.edit' );
	Route::post( '/update/{id}', 'back\MatchMaker@update' )->name( 'matchmaker.update' );
//Route::get( '/matchmaker/compare/{id}/{compare_id?}', 'back\CompareController@compareTo' )->name( 'matchmaker.compare' );
	Route::get( '/compare/{id}', 'back\CompareController@compareTo' )->name( 'matchmaker.compare' );
	Route::post( '/getusers', 'back\CompareController@getUsers' )->name( 'matchmaker.users' );
	Route::post( '/matched', 'back\CompareController@matched' )->name( 'matchmaker.matched' );
	Route::post( '/getuser', 'back\CompareController@getUser' )->name( 'matchmaker.user' );

	// Password reset routes
	Route::post('/password/email', 'Auth\MatchMakerForgotPasswordController@sendResetLinkEmail')->name('matchmaker.password.email');
	Route::get('/password/reset', 'Auth\MatchMakerForgotPasswordController@showLinkRequestForm')->name('matchmaker.password.request');
	Route::post('/password/reset', 'Auth\MatchMakerResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Auth\MatchMakerResetPasswordController@showResetForm')->name('matchmaker.password.reset');
} );

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


