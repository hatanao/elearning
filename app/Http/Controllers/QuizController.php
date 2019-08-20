<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class QuizController extends Controller
{
    public function viewQuizzes(){
        return view('quiz.viewQuizzes');
    }
    
    public function addQuiz(){
        $quizzes = Auth::user()->quizzes;
        return view('quiz.addQuiz', compact('quizzes'));
    }

    public function storeLessons(){
            $lessons = Auth::user()->lessons()->create(request()->all());        
            return redirect('/user/showLessons');
        }


    public function delete($id){
        Lesson::where('id', $id)->delete(); 
        return redirect('/user/showLessons');
    }
}
