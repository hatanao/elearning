<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LessonController extends Controller
{
    public function addLessons(){
        return view('lessons.addLessons');
    }

    public function storeLessons(){
            $lessons = Auth::user()->lessons()->create(request()->all());        
            return redirect('/user/showLessons');
        }

        public function showLessons(){
            $lessons = Auth::user()->lessons;
            return view('lessons.showLessons', compact('lessons'));
        }
}
