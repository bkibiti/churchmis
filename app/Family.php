<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $guarded = ["wedding_date","status","created_by","updated_by"];

    public function members(){
        return $this->hasMany('App\Person', 'family_id', 'id');
    }

    
}
