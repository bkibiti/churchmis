<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceTotal extends Model
{
    protected $table = 'event_attendace_totals';
    public $timestamps = false;
    protected $guarded = ["date"];

}
