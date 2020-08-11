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
    $users = App\User::with('user_detail')->get();
    return view('welcome',compact('users'));
});

Route::get('/otpcheck', function () {
    return view('otpcheck');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/editprofile/{id}', 'HomeController@editProfile');

Route::post('/updateprofile/{id}', 'HomeController@updateProfile');

Route::post('/checkotp', 'HomeController@checkOtp');

Route::get('/logout', 'Auth\LoginController@logout');


