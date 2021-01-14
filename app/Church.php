<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $table = 'churches';
    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo('App\District', 'district_id','id');
    }
}
