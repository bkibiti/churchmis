<?php

namespace App\Http\Controllers;

use App\Event;
use App\AttendanceTotal;
use Illuminate\Http\Request;


class EventAttendanceController extends Controller
{

    public function index()
    {
        $event = Event::all();
        return view('events_attendance.index', compact("event"));
    }


    public function create()
    {
        $event = Event::all();
        return view('events_attendance.create', compact("event"));
    }


    public function store(Request $request)
    {
        $event = new AttendanceTotal;
        $event->fill($request->all());
        $event->date = toDbDateFormat($request->date);
        $event->save();

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('events-attendance.index');
    }


    public function show($id)
    {
        //
    }

 
    public function edit(AttendanceTotal $eventsAttendance)
    {
        $event = Event::all();
        return view('events_attendance.edit', compact("event","eventsAttendance"));
    }

 
    public function update(Request $request, AttendanceTotal $eventsAttendance)
    {
        $eventsAttendance->fill($request->all());
        $eventsAttendance->date = toDbDateFormat($request->date);
        $eventsAttendance->save();

        session()->flash("alert-success", "Record Updated Successfully!");
        return redirect()->route('events-attendance.index');
    }

    public function destroy(Request $request)
    {
        try {
            AttendanceTotal::destroy($request->id);
            session()->flash("alert-success", "Record Deleted successfully!");
            return back();
        } catch (Exception $exception) {
            session()->flash("alert-danger", "Something went wrong!");
            return back();
        }
    }
}
