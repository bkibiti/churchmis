<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupType;
use App\GroupPosition;
use App\Person;
use App\GroupMember;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $group = Group::all();
        return view('group.index', compact("group"));
    }
  
    public function create()
    {
        $position = GroupPosition::all();
        $groupType = GroupType::all();
        $people = person::select('id','first_name','middle_name','last_name','address','gender')->get();
        return view('group.create',compact("people","groupType","position"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_ids' => 'required',
        ]);

        $memberIDs = json_decode($request->member_ids,true);
        $positionIDs = json_decode($request->position_ids,true);

        $group = new Group;
        $group->group_type_id= $request->group_type_id;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        for($i= 0; $i < count($memberIDs); $i++){
            $gmember = new GroupMember;
            $gmember->group_id= $group->id;
            $gmember->person_id= $memberIDs[$i];
            $gmember->position_id= $positionIDs[$i];
            $gmember->save();
        }

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('groups.index');
    }

    public function show(Group $group)
    {
     
    //    foreach ($group->members as $g) {
    //        dd($g->pivot->position_id);
    //    }
        $position = GroupPosition::all();
        return view('group.show',compact("position","group"));
    }

 
    public function edit(Group $group)
    {
        $position = GroupPosition::all();
        $groupType = GroupType::all();
        $people = person::select('id','first_name','middle_name','last_name','address','gender')->get();
        return view('group.edit',compact("people","groupType","position","group"));
    }


    public function update(Request $request, Group $group)
    {
        $request->validate([
            'member_ids' => 'required',
        ]);

        $memberIDs = json_decode($request->member_ids,true);
        $positionIDs = json_decode($request->position_ids,true);

        $group->group_type_id= $request->group_type_id;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();
        
        //delete members
        GroupMember::where('group_id', $group->id)->delete();

        for($i= 0; $i < count($memberIDs); $i++){
            $gmember = new GroupMember;
            $gmember->group_id= $group->id;
            $gmember->person_id= $memberIDs[$i];
            $gmember->position_id= $positionIDs[$i];
            $gmember->save();
        }

        session()->flash("alert-success", "Record Updated Successfully!");
        return redirect()->route('groups.index');
    }

    public function destroy(Group $group)
    {
        
    }
}
