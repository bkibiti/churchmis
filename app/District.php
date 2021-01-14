<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;

    public function diocese()
    {
        return $this->belongsTo('App\Diocese', 'diocese_id','id');
    }

}
