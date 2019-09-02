<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Quiz;
use App\Choice;
use App\LessonTaken;
use Auth;

class QuizController extends Controller
{
    public function viewQuizzes($lessonId){

        $quizzes = Lesson::find($lessonId)->quizzes()->paginate(6);

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

        
        if(request()->file('image')){

            request()->validate([
                'image' => 'mimes:jpeg,bmp,png',
                'image' => 'max:2048'
                ]);
                
                $file = request()->file('image')->getClientOriginalName(); 
                
                request()->file('image')->storeAs('public/quizzes/images', $file); 
                
                $quiz->image = '/storage/quizzes/images/'.$file;
            }
            $quiz->save();
        
        return redirect('/user/viewQuizzes/'.$lessonId);
    }

    public function editQuiz($quizId){
        $quiz = Quiz::find($quizId); 

        return view('quiz.editQuiz', ['quiz' => $quiz]);
    }

    public function updateQuiz($quizId){

        // $quiz = Quiz::find($quizId)->update(['question' => request()->question, 
        //                                     'answer_id' => request()->answer]);

        // foreach(request()->choice as $key => $choice){
        //     Choice::find($key)->update([
        //         'choice' => $choice
        //     ]);
        // }

        if(request()->file('image')){

            request()->validate([
                'image' => 'mimes:jpeg,bmp,png',
                'image' => 'max:2048'
            ]);

            $file = request()->file('image')->getClientOriginalName(); 

            request()->file('image')->storeAs('public/quizzes/images', $file); 
            
            $quiz = Quiz::find($quizId);
            $quiz->image = '/storage/quizzes/images/'.$file;
            $quiz->save();
        }

        $quiz = Quiz::find($quizId);
        
        return redirect('/user/viewQuizzes/'.$quiz->lesson->id);

    }

    public function deleteQuiz($quizId){
        Quiz::where('id', $quizId)->delete(); 
        return redirect()->back();
    }

    public function submitQuiz($lessonId, $quizId){

        
        //insert answer and lesson_taken_id to user_answer table
        $userAnswer = Quiz::find($quizId)->userAnswers()
        ->create(['choice_id' => request()->answer,
        'lesson_taken_id' => request()->lesson_taken_id]);
        
        $lesson = Lesson::find($lessonId); //lesson which user is taking
        
        $quizzes = $lesson->quizzes()->where('id', '>' , $quizId); // get all the lessons' quizzes which is less than the current $quizId 
        $next_id = $quizzes->min('id'); // set the lowest quizId from above quizzes 
        
        $lessonTaken = LessonTaken::find(request()->lesson_taken_id);
        $quiz = Quiz::find($next_id); // set the $next_id to $quiz  
        // return $quiz;

        //if there's no more quiz return the result view
        if($next_id == ''){
            $lessonTaken = LessonTaken::with(['userAnswers'])->find(request()->lesson_taken_id); 
            
            // return $lessonTaken;
            
             $results = $lessonTaken->userAnswers; 

             
            //  return $results;
            return view('lessons.showLessonResult' ,compact('quiz', 'results'));
        }

        return view('quiz.answerQuiz', compact('quiz' , 'lessonId', 'lessonTaken'));

        
    }
}
