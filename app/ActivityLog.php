<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $guarded = [];


    public function activityable(){
        return $this->morphTo();
    }
}
