<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Lesson;
use App\LessonTaken;

class LessonController extends Controller
{
    public function addLesson(){
        return view('lessons.addLesson');
    }

    public function storeLesson(){
            $lessons = Auth::user()->lessons()->create(request()->all());        
            return redirect('/user/myLessons');
        }

    public function deleteLesson($lessonId){
        Lesson::where('id', $lessonId)->delete(); 
        return redirect()->back(); 
    }

    public function editLesson($lessonId){
        $lesson = Lesson::find($lessonId); 

        return view('lessons.addLesson', compact('lesson'));
    }

    public function updateLesson($id){

        $lesson = Lesson::find($id)->update(request()->all());

        if(request()->file('image')){

            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $file = request()->file('image')->getClientOriginalName(); 

            request()->file('image')->storeAs('public/images', $file); 
            
            $lesson = Lesson::find($id);
            $lesson->image = '/storage/images/'.$file;
            $lesson->save();
        }
        
        return redirect('/user/myLessons');

    }
    
    public function showMyLessons(){
        $lessons = Auth::user()->lessons()->orderBy('created_at','desc')->paginate(9);
        
        return view('lessons.showMyLessons', compact('lessons'));
    }

    public function answerQuiz($lessonId){
        $quiz = Lesson::find($lessonId)->quizzes()->first();

        $lessonTaken = Auth::user()->lessonTakens()
                                    ->create([
                                        'lesson_id' => $lessonId
                                        ]); 
                                     
        // if the user click start which doesn't have quiz, it'll return to the original page                                         
        if($quiz == ''){
            return redirect()->back();
        }

        return view('quiz.answerQuiz', compact('quiz' , 'lessonId', 'lessonTaken'));
    }

    public function showResult($lessonTakenId){
        $lessonTaken = LessonTaken::with(['userAnswers'])->find($lessonTakenId); 
        
        
        $results = $lessonTaken->userAnswers->pagination(10);
             
        return view('lessons.showLessonResult' ,compact('results'));
    }
        
}
