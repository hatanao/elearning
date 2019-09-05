<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $guarded = [];

    public function activity(){
        return $this->morphMany('App\ActivityLog');
    }
}
