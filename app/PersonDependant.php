<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PersonDependant extends Model
{
    Protected $table = 'person_dependants';
    public $timestamps = false;

    public function relationship()
    {
        return $this->belongsTo('App\PersonRelations', 'relation_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Person', 'person_id', 'id');
    }


 

}
