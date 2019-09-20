<?php

use Illuminate\Support\Facades\Input;
use App\User;

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

Route::group(['middleware'=>['auth', 'revalidate']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/search',function(){
        $q = Input::get ( 'q' );
        if($q != ''){
            $user = User::where('name', 'LIKE', '%' .$q. '%')->get();
        }
            return 'no data';
        // $user = User::where('name','LIKE','%'.$q.'%')->get();
        // if(count($user) > 0)
        //     return view('welcome')->withDetails($user)->withQuery ( $q );
        // else return view ('welcome')->withMessage('No Details found. Try to search again !');
    });

    Route::group(['prefix'=>'user'], function () {
        Route::get('edit/{id}', 'UserController@edit');
        Route::post('update/{id}', 'UserController@update');
        Route::get('/', 'HomeController@showUsers');
        Route::get('followingList', 'UserController@showFollowing');
        Route::get('followerList', 'UserController@showFollowers');
        Route::get('followingList/{id}', 'UserController@showOtherUserFollowing');
        Route::get('followerList/{id}', 'UserController@showOtherUserFollowers');
        Route::get('profile/{id}', 'UserController@showUserProfile');
        Route::get('follow/{id}', 'UserController@follow');
        Route::get('unfollow/{id}', 'UserController@unfollow');
        Route::get('lessons', 'HomeController@showAllLessons');
        Route::get('addLesson/{userId}', 'LessonController@addLesson');
        Route::post('storeLesson/{id}', 'LessonController@storeLesson');
        Route::get('editLesson/{lessonId}', 'LessonController@editLesson');    
        Route::post('updateLesson/{lessonId}', 'LessonController@updateLesson');    
        Route::get('delete/{lessonId}', 'LessonController@deleteLesson');    
        Route::get('myLessons', 'LessonController@showMyLessons');    
        Route::get('viewQuizzes/{lessonId}', 'QuizController@viewQuizzes');    
        Route::get('addQuiz/{lessonId}', 'QuizController@addQuiz');    
        Route::post('storeQuiz/{lessonId}', 'QuizController@storeQuiz');
        Route::get('editQuiz/{quizId}', 'QuizController@editQuiz');
        Route::post('updateQuiz/{quizId}', 'QuizController@updateQuiz');
        Route::get('deleteQuiz/{quizId}', 'QuizController@deleteQuiz');
        Route::get('answerQuiz/{lessonId}', 'LessonController@answerQuiz');
        Route::post('{lessonId}/quiz/{quizId}/answer/submit', 'QuizController@submitQuiz');
        Route::post('/home', 'HomeController@showActivityLog');

        Route::get('showResult/{lessonTakenId}', 'LessonController@showResult');
    });

});
    Route::group(['prefix'=>'admin'], function () {

        //
        Route::group(['middleware' => ['admin', 'revalidate']], function(){
            Route::get('home', 'AdminController@index')->name('adminhome');
            Route::get('users', 'AdminController@showUsers');
            Route::get('delete/{lessonId}', 'AdminController@deleteUser');
            Route::get('create/admin', 'AdminController@createAdmin')->middleware('master.admin');
            Route::post('store/admin', 'AdminController@storeAdmin');
            Route::get('/admin/delete/userId', 'AdminController@deleteUser');
        });

        //if you're logout
        Route::group(['middleware' => 'guest'], function(){
        });
    });