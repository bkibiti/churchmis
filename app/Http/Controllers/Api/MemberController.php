<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Person;
use App\Http\Resources\Member;

class MemberController extends Controller
{
    public function show($member_id)
    {
        $person = Person::find($member_id);
        return new Member($person);
    }

    public function dependants($member_id)
    {
        $person = Person::find($member_id);
        return new Member($person);
    }
}
