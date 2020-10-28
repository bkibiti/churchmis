<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $guarded = ["wedding_date","status","created_by","updated_by"];
}
