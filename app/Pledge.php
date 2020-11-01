<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    public function person()
    {
        return $this->belongsTo('App\Person', 'person_id','id');
    }

    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id','id');
    }
    public function family()
    {
        return $this->belongsTo('App\Family', 'family_id','id');
    }

    public function activity()
    {
        return $this->belongsTo('App\FundActivity', 'activity_id','id');
    }
}
