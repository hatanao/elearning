<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Lesson;

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

    public function updateLesson($lessonId){

        $lesson = Lesson::find($lessonId)->update(request()->all());
        
        return redirect('/user/myLessons');

    }
    
    public function showMyLessons(){
        $lessons = Auth::user()->lessons;
        return view('lessons.showMyLessons', compact('lessons'));
    }

    public function startQuiz($lessonId){
        $quizzes = Lesson::find($lessonId)->quizzes()->paginate(1);

        return view('quiz.answerQuiz', compact('quizzes' , 'lessonId'));
    }
        
}
