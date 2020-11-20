<?php

namespace App\Http\Controllers;

use App\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
   
    public function index()
    {
        $etype = EventType::all();
        return view('event_types.index', compact("etype"));
    }

    public function create()
    {
        return view('event_types.create');
    }
    
    public function store(Request $request)
    {

        $etype = new EventType;
  
        if ($request->occurance =="weekly") {
            $etype->occurance_dow = $request->occurance_dow;
        }
        if ($request->occurance =='monthly') {
            $etype->occurance_dom = $request->occurance_dom;
        }
        if ($request->occurance =='yearly') {
            $etype->occurance_doy = toDbDateFormat($request->occurance_doy);
        }
        
        $etype->name= $request->name;
        $etype->occurance= $request->occurance;
        $etype->color= $request->color;
        $etype->save();

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('event-types.index');
    }

    public function edit(EventType $eventType)
    {
        return view('event_types.edit',compact('eventType'));
    }

    public function show(EventType $eventType)
    {
       
    }
  
    public function update(Request $request, EventType $eventType)
    {

        if ($request->occurance =="weekly") {
            $eventType->occurance_dow = $request->occurance_dow;
        }
        if ($request->occurance =='monthly') {
            $eventType->occurance_dom = $request->occurance_dom;
        }
        if ($request->occurance =='yearly') {
            $eventType->occurance_doy = toDbDateFormat($request->occurance_doy);
        }

        $eventType->name= $request->name;
        $eventType->occurance= $request->occurance;
        $eventType->color= $request->color;
        $eventType->save();

        session()->flash("alert-success", "Record Updated Successfully!");
        return redirect()->route('event-types.index');
    }
 
    public function destroy(Request $request)
    {
        try {
            EventType::destroy($request->id);
            session()->flash("alert-success", "Record Deleted successfully!");
            return back();
        } catch (Exception $exception) {
            session()->flash("alert-danger", "Something went wrong!");
            return back();
        }
    }
}
