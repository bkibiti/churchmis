<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundActivity extends Model
{
    protected $table = 'fund_activities';
    public $timestamps = false;
    protected $fillable = ["name","type","schedule","status"];
}
