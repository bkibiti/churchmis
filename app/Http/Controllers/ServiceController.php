<?php

namespace App\Http\Controllers;

use App\Service;
use App\GroupPosition;
use App\Person;
use App\GroupMember;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $group = Service::all();
        return view('group.index', compact("group"));
    }
  
    public function create()
    {
        $position = GroupPosition::all();
        $people = Person::select('id','name','address','gender')->get();
        return view('group.create',compact("people","position"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_ids' => 'required',
        ]);

        $memberIDs = json_decode($request->member_ids,true);
        $positionIDs = json_decode($request->position_ids,true);

        $group = new Service;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        for($i= 0; $i < count($memberIDs); $i++){
            $gmember = new GroupMember;
            $gmember->service_id= $group->id;
            $gmember->person_id= $memberIDs[$i];
            $gmember->position_id= $positionIDs[$i];
            $gmember->save();
        }

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('groups.index');
    }

    public function show(Service $service)
    {
        $position = GroupPosition::all();
        return view('group.show',compact("position","service"));
    }

 
    public function edit(Service $service)
    {
        $position = GroupPosition::all();
        $people = person::select('id','name','address','gender')->get();
        return view('group.edit',compact("people","position","service"));
    }


    public function update(Request $request, Service $service)
    {
        $request->validate([
            'member_ids' => 'required',
        ]);

        $memberIDs = json_decode($request->member_ids,true);
        $positionIDs = json_decode($request->position_ids,true);
        
        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();
        
        //delete members
        GroupMember::where('service_id', $service->id)->delete();

        for($i= 0; $i < count($memberIDs); $i++){
            $gmember = new GroupMember;
            $gmember->service_id= $service->id;
            $gmember->person_id= $memberIDs[$i];
            $gmember->position_id= $positionIDs[$i];
            $gmember->save();
        }

        session()->flash("alert-success", "Record Updated Successfully!");
        return redirect()->route('services.index');
    }

    public function destroy(Group $group)
    {
        
    }
}
