<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];
    
    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }

    public function choices(){
        return $this->hasMany('App\Choice');
    }
    public function userAnswers(){
        return $this->hasMany('App\UserAnswer');
    }
}
