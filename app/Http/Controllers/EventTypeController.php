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

        if ($request->occurance =="none") {
            $etype->name= $request->name;
            $etype->occurance= $request->occurance;
            $etype->start_time= date("h:i", strtotime( $request->start_time ));
        }
        if ($request->occurance =="weekly") {
            $etype->name= $request->name;
            $etype->occurance= $request->occurance;
            $etype->start_time= date("h:i", strtotime( $request->start_time ));
            $etype->occurance_dow = $request->occurance_dow;
        }
        if ($request->occurance =='monthly') {
            $etype->name= $request->name;
            $etype->occurance= $request->occurance;
            $etype->start_time= date("h:i", strtotime( $request->start_time ));
            $etype->occurance_dom = $request->occurance_dom;
        }
        if ($request->occurance =='yearly') {
            $etype->name= $request->name;
            $etype->occurance= $request->occurance;
            $etype->start_time= date("h:i", strtotime( $request->start_time ));
            $etype->occurance_doy = toDbDateFormat($request->occurance_doy);
        }
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
        if ($request->occurance =="none") {
            $eventType->name= $request->name;
            $eventType->occurance= $request->occurance;
            $eventType->start_time= date("h:i", strtotime( $request->start_time ));
        }
        if ($request->occurance =="weekly") {
            $eventType->name= $request->name;
            $eventType->occurance= $request->occurance;
            $eventType->start_time= date("h:i", strtotime( $request->start_time ));
            $eventType->occurance_dow = $request->occurance_dow;
        }
        if ($request->occurance =='monthly') {
            $eventType->name= $request->name;
            $eventType->occurance= $request->occurance;
            $eventType->start_time= date("h:i", strtotime( $request->start_time ));
            $eventType->occurance_dom = $request->occurance_dom;
        }
        if ($request->occurance =='yearly') {
            $eventType->name= $request->name;
            $eventType->occurance= $request->occurance;
            $eventType->start_time= date("h:i", strtotime( $request->start_time ));
            $eventType->occurance_doy = toDbDateFormat($request->occurance_doy);
        }
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
