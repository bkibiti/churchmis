<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo('App\GroupType', 'group_type_id','id');
    }

    public function members()
    {
        return $this->belongsToMany('App\Person', 'group_members')->withPivot('position_id');
    }

    public function countMembers()
    {
        return $this->members()->count();
    }
}
