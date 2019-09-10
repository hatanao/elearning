<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $guarded = [];

    protected $table = 'user_answer';

    public function lessonTaken(){
        return $this->belongsTo('App\LessonTaken');
    }
    public function quiz(){
        return $this->belongsTo('App\Quiz');
    }
    public function choice(){
        return $this->belongsTo('App\Choice');
    }
}
