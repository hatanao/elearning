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

Route::group(['middleware'=>'auth'], function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/update/{id}', 'UserController@update');
Route::get('/users', 'HomeController@showUsers');
Route::get('/users/followingList', 'UserController@showFollowing');
Route::get('/users/followerList', 'UserController@showFollowers');
Route::get('/user/profile/{id}', 'UserController@showUserProfile');
Route::get('/user/follow/{id}', 'UserController@follow');
Route::get('/user/unfollow/{id}', 'UserController@unfollow');
Route::get('/lessons/{id}', 'HomeController@showLessons');
});