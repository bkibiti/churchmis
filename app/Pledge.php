<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    public function person()
    {
        return $this->belongsTo('App\Person', 'person_id','id');
    }

    public function activity()
    {
        return $this->belongsTo('App\FundActivity', 'activity_id','id');
    }
}
