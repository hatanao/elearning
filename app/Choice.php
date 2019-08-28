<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $guarded = [];

    public function quiz(){
        return $this->belongsTo('App\Quiz');
    }   
    public function users(){
        return $this->hasMany('App\User');
    }   
}
