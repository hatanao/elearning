<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonTaken extends Model
{
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }
    public function userAnswers(){
        return $this->hasMany('App\UserAnswer');
    }
    public function activities(){
        return $this->morphMany('App\ActivityLog', 'activityable');
    }
}
