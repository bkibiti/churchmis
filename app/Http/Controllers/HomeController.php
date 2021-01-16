<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Family;
use App\Service;
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
        $personCount = Person::groupBy('gender')->selectRaw('gender,count(*) as count')->orderBy('gender')->get();
        
        $groupCount = Service::count();
        $upcoming = Event::whereDate('start', '>', Carbon::now())->count();
        $ongoing = Event::whereDate('start', '<', Carbon::now())->whereDate('end', '>', Carbon::now())->count();
        $event = $upcoming + $ongoing;

        $classification = DB::select("SELECT cl.name,count(persons.id) total FROM persons 
        JOIN person_position cl ON cl.id = position_id
        GROUP BY position_id");

        $dependants = DB::select("SELECT gender,count(gender) total FROM person_dependants
        GROUP BY gender ORDER BY gender");


        $ageCategory = DB::select("SELECT gender,
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) < 10,1,0)) as '0 - 9',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 10 and 19,1,0)) as '10 - 19',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 20 and 29,1,0)) as '20 - 29',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 30 and 39,1,0)) as '30 - 39',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 40 and 49,1,0)) as '40 - 49',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 50 and 59,1,0)) as '50 - 59',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 60 and 69,1,0)) as '60 - 69',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 70 and 79,1,0)) as '70 - 79',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) >=80, 1, 0)) as '80 - 99'
            FROM persons group by gender order by gender");

        $attendance = DB::select("SELECT t.date,e.id, title, (t.male + t.female + t.children) total FROM events e
        JOIN event_attendace_totals t ON e.id=t.event_id
        ORDER BY date");

        return view('dashboard',compact("personCount","groupCount","event","classification","ageCategory","dependants","attendance"));
    }
}
