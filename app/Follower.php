<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $guarded = [];


    
    public function activities(){
        return $this->morphMany('App\ActivityLog', 'activityable');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function follower(){
        return $this->belongsTo('App\User');
    }
}
