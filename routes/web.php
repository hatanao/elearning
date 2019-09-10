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

    Route::group(['prefix'=>'user'], function () {
        Route::get('edit/{id}', 'UserController@edit');
        Route::post('update/{id}', 'UserController@update');
        Route::get('/', 'HomeController@showUsers');
        Route::get('followingList', 'UserController@showFollowing');
        Route::get('followerList', 'UserController@showFollowers');
        Route::get('profile/{id}', 'UserController@showUserProfile');
        Route::get('follow/{id}', 'UserController@follow');
        Route::get('unfollow/{id}', 'UserController@unfollow');
        Route::get('lessons/{id}', 'HomeController@showLessons');
        Route::get('addLessons/{id}', 'LessonController@addLessons');
        Route::post('storeLessons/{id}', 'LessonController@storeLessons');
        Route::get('showLessons', 'LessonController@showLessons');
    });
});