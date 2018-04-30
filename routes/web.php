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

Route::get('/', 'front\HomeController@showregform');
Route::post('/sendregister', 'front\HomeController@register')->name('front.register');
Route::get('/user/activate/{token}', 'front\HomeController@activateuser')->name('user.activate');


Route::group(['middleware' => 'userauth'], function () {
    Route::get('/profile/{id}', 'front\UserProfileController@profile')->name('user.profile');
    Route::post('/profile/update/{id}', 'front\UserProfileController@update')->name('user.profile.update');
    Route::get('/profile/show/{id}', 'front\UserProfileController@show')->name('user.profile.show');
    Route::post('/profile/image/{id}', 'front\UserProfileController@profileimage')->name('profile.image.post');
    Route::get('/profile/user/changepassword/{id}', 'front\UserProfileController@passwordchangeform')->name('password.change');
    Route::post('/profile/password/{id}', 'front\UserProfileController@passwordchange')->name('profile.password.change');
    Route::get('/profile/public/share/{id}', 'front\UserProfileController@shareprofile')->name('profile.share');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('admin/login', 'admin\AdminHomeController@login')->name('admin.login');
});

Route::group(['middleware' => 'adminauth'], function () {
    Route::get('admin/dashboard', 'admin\AdminHomeController@index')->name('admin.home');
    Route::resource('/admin/roles','admin\AdminRolesController');
    Route::resource('/admin/users','admin\AdminUsersController');
});


Auth::routes();


