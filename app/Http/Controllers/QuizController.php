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

        $quizzes = Lesson::find($lessonId)->quizzes()->paginate(10);

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
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
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

        //add validation 

        $quiz = Quiz::find($quizId)->update(['question' => request()->question, 
                                            'answer_id' => request()->answer]);

        foreach(request()->choice as $key => $choice){
            Choice::find($key)->update([
                'choice' => $choice
            ]);
        }

        if(request()->file('image')){

            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
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
        ->updateOrCreate([
                'lesson_taken_id' => request()->lesson_taken_id
                ],
                [
                    'choice_id' => request()->answer
                ]
        );
        
        $lesson = Lesson::find($lessonId); //lesson which user is taking
        
        $quizzes = $lesson->quizzes()->where('id', '>' , $quizId); // get all the lessons' quizzes which is less than the current $quizId 
        $next_id = $quizzes->min('id'); // set the lowest quizId from above quizzes 
        
        $lessonTaken = LessonTaken::find(request()->lesson_taken_id);

        $quiz = Quiz::find($next_id); // set the $next_id to $quiz 

        $quiz_number = $lesson->quizzes->search($quiz) + 1;
        // return $quiz_number;

        //if there's no more quiz update is_complete value and return the result view
        if($next_id == ''){

            $lessonTaken->update([
                "is_complete" => 1
            ]);

            
            if($lessonTaken){
                $correct = 0;

                foreach($lessonTaken->userAnswers as $answer){
                    
                    if($answer->choice_id == $answer->quiz->answer_id){
                        $correct++;
                    }
                }
            }
            
          $lessonTaken->activities()->create([
                'user_id' =>  $lessonTaken->user_id,
                'message' => auth()->user()->name.' answered '.$correct.'/'.$lessonTaken->userAnswers()->count().' questions correctly '.'of lesson ('.$lessonTaken->lesson->title. ')']);    
        

            return redirect('/user/showResult/'.request()->lesson_taken_id);
        }

        return view('quiz.answerQuiz', compact('quiz' , 'lessonId', 'lessonTaken' , 'quiz_number'));

        
    }

}
