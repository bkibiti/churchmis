<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $guarded = ["end","start"];

    public function type()
    {
        return $this->belongsTo('App\EventType', 'type_id','id');
    }

    public function attendance()
    {
        return $this->hasMany('App\AttendanceTotal', 'event_id');
    }

}
