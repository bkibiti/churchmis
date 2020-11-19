<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $timestamps = false;


    public function members()
    {
        return $this->belongsToMany('App\Person', 'group_members')->withPivot('position_id');
    }

    public function countMembers()
    {
        return $this->members()->count();
    }
}
