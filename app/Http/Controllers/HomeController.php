<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showUsers()
    {
        $users = User::where("id" , "!=" , Auth::user()->id)->paginate(3);

        return view('users.usersList', compact('users'));
    }

    public function showAllLessons(){
        
        
        $adminlessons = Lesson::has('quizzes' , '>' , 0 )->whereHas('user' , function($query){
             $query->where('is_admin' , '=' , 1);
        })->orderByDesc('created_at')->get();

        $userlessons = Lesson::has('quizzes' , '>' , 0 )->whereHas('user' , function($query){
            $query->where('is_admin' , '=' , 0);
       })->orderByDesc('created_at')->get();

        $sortedLessons =  $adminlessons->merge($userlessons);

        return view('lessons.lessons', compact('sortedLessons'));
    }
}
