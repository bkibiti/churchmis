<?php

namespace App\Http\Controllers;

use App\Event;
use App\Person;
use App\Family;
use DB;
use App\EventType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEvent;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return view('events.index', compact("event"));
    }

    public function create()
    {
        $etype = EventType::all();
         return view('events.create', compact("etype"));
    }

    public function store(StoreEvent $request)
    {
        $event = new Event;
        $event->fill($request->all());
        $event->start = toDbDateTimeFormat($request->start);
        $event->end = toDbDateTimeFormat($request->end);
        $event->save();

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('events.index');
    }

    public function show(Event $event)
    {
        return view('events.show',compact('event'));
    }


    public function edit(Event $event)
    {
        $etype = EventType::all();
        return view('events.edit', compact("etype","event"));
    }


    public function update(StoreEvent $request, Event $event)
    {
        $event->fill($request->all());
        $event->start = toDbDateTimeFormat($request->start);
        $event->end = toDbDateTimeFormat($request->end);
        $event->save();

        session()->flash("alert-success", "Record Updated Successfully!");
        return redirect()->route('events.index');
    }

  
    public function destroy(Request $request)
    {
        try {
            Event::destroy($request->id);
            session()->flash("alert-success", "Record Deleted successfully!");
            return back();
        } catch (Exception $exception) {
            session()->flash("alert-danger", "Something went wrong!");
            return back();
        }
    }

    public function calender()
    {
        $bdays = Person::select(DB::raw('id,name,MONTH(dob) month, DAY(dob) day'))
                        ->whereNotNull('dob')->get();
        $anniversary = Family::select(DB::raw('id,name,MONTH(wedding_date) month, DAY(wedding_date) day'))
                        ->whereNotNull('wedding_date')->get();
        $events = Event::select('title','start','end','type_id')->get();
        
        $etype = EventType::all();
                        
// dd($anniversary);
        return view('calender.index', compact("bdays","anniversary","events","etype"));
    }

}
