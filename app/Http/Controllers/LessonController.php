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
            return redirect('/user/myLessons/'.auth()->user()->id);
        }

    public function deleteLesson($lessonId){
        Lesson::where('id', $lessonId)->delete(); 
        return redirect()->back(); 
    }

    public function editLesson($id){
        $lesson = Lesson::find($id); 
        return view('lessons.addLesson', compact('lesson'));
    }

    public function updateLesson($lessonId){

        $lesson = Lesson::find($lessonId)->update(request()->all());
        
        return redirect('/user/myLessons/'.auth()->user()->id);

    }
    
    public function showMyLessons($id){
        $lessons = Auth::user()->lessons;
        return view('lessons.showMyLessons', compact('lessons'));
    }
        
}
