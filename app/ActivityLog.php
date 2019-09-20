<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $guarded = [];


    public function activityable(){
        return $this->morphTo();
    }

    public function user(){
       return $this->belongsTo(User::class); 
    }
}
