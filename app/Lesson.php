<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function quizzes(){
        return $this->hasMany('App\Quiz');
    }
    public function lessonTakens(){
        return $this->hasMany('App\LessonTaken');
    }
}
