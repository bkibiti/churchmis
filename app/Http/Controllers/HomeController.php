<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Family;
use App\Group;
use App\Event;
use Carbon\Carbon;

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


        return view('dashboard',compact("personCount","familyCount","groupCount","event"));
    }
}
