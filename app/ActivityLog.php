<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $guarded = [];


    public function follower(){
        return $this->morphTo('App\Follwer');
    }
}
