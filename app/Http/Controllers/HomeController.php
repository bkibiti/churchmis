<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Family;
use App\Group;
use App\Event;
use Carbon\Carbon;
USE DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $personCount = Person::count();
        $familyCount = Family::count();
        $groupCount = Group::count();
        $upcoming = Event::whereDate('start', '>', Carbon::now())->count();
        $ongoing = Event::whereDate('start', '<', Carbon::now())->whereDate('end', '>', Carbon::now())->count();
        $event = $upcoming . ' / ' . $ongoing;

        $classification = DB::select("SELECT cl.name,count(persons.id) total FROM persons 
        JOIN person_classification cl ON cl.id = classification_id
        GROUP BY classification_id");

        return view('dashboard',compact("personCount","familyCount","groupCount","event","classification"));
    }
}
