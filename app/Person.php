<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    Protected $table = 'persons';

    protected $guarded = ["date_baptism","date_eucharist","date_confirmation","date_marriage","dob","membership_date","created_by"];
    
    public function personRole()
    {
        return $this->belongsTo('App\PersonRole', 'person_role_id','id');
    }

    public function classification()
    {
        return $this->belongsTo('App\PersonClassification', 'classification_id','id');
    }

    public function notes()
    {
        return $this->hasMany('App\Note', 'person_id','id');
    }

    public function group()
    {
        return $this->belongsToMany('App\Group', 'group_members');

    }

}
