<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Quiz;
use App\Choice;
use Auth;

class QuizController extends Controller
{
    public function viewQuizzes($lessonId){

        $quizzes = Lesson::find($lessonId)->quizzes;

        return view('quiz.viewQuizzes', ['lesson_id' => $lessonId , 'quizzes' => $quizzes]);
    }
    
    public function addQuiz($lessonId){

        return view('quiz.addQuiz', ['lesson_id' => $lessonId]);
    }

    public function storeQuiz($lessonId){

        $quiz = Lesson::find($lessonId)->quizzes()->create(['question' => request()->question,
                                                            'answer_id' => 0]); // 0 as initial value

        foreach(request()->choice as $index=>$value){

            $choice = $quiz->choices()->create(['choice' => $value]);

            if($index == request()->answer){
                $answer = $choice->id ;
            }
        }

        $quiz->answer_id = $answer;
        $quiz->save();

        if(request()->file('image')){

            request()->validate([
                'image' => 'mimes:jpeg,bmp,png',
                'image' => 'max:2048'
            ]);

            $file = request()->file('image')->getClientOriginalName(); 

            request()->file('image')->storeAs('public/images', $file); 
            
            $user = User::find($id);
            $user->avatar = '/storage/images/'.$file;
            $user->save();
        }
        
        return redirect('/user/viewQuizzes/'.$lessonId);
    }

    public function editQuiz($quizId){
        $quiz = Quiz::find($quizId); 

        return view('quiz.editQuiz', ['quiz' => $quiz]);
    }

    public function updateQuiz($quizId){

        $quiz = Quiz::find($quizId)->update(['question' => request()->question, 
                                            'answer_id' => request()->answer]);

        foreach(request()->choice as $key => $choice){
            Choice::find($key)->update([
                'choice' => $choice
            ]);
        }

        $quiz = Quiz::find($quizId);
        
        return redirect('/user/viewQuizzes/'.$quiz->lesson->id);

    }

    public function deleteQuiz($quizId){
        Quiz::where('id', $quizId)->delete(); 
        return redirect()->back();
    }
}
