<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    Protected $table = 'persons';

    protected $guarded = ["date_baptism","date_eucharist","date_confirmation","date_marriage","dob","membership_date","created_by"];
    
}
