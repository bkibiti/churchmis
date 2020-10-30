<?php

namespace App\Http\Controllers;

use App\Person;
use App\Family;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreFamilyRequest;

class FamilyController extends Controller
{
 
    public function index()
    {
        $family = Family::all();
        return view('family.index', compact("family"));
    }

    public function create()
    {
        $people = person::select('id','first_name','middle_name','last_name','address','gender')->get();
        return view('family.create',compact('people'));
    }


    public function store(StoreFamilyRequest $request)
    {
        $member_ids = json_decode($request->member_ids,true);
       
        $family = new Family;
        $family->fill($request->all());
        $family->wedding_date = toDbDateFormat($request->wedding_date);
        $family->status = 1;
        $family->created_by = Auth::user()->id;
        $family->updated_by = Auth::user()->id;
        $family->save();

        for($i= 0; $i < count($member_ids); $i++){
            $person = Person::findOrFail($member_ids[$i]);
            $person->family_id= $family->id;
            $person->save();
        }

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('family.index');
    }

 
    public function show(Family $family)
    {
        return view('family.show',compact("family"));
    }


    public function edit(Family $family)
    {
        $memberList = $family->members;
        $people = person::select('id','first_name','middle_name','last_name','address','gender')->get();
        return view('family.edit',compact("family","people","memberList"));
    }


    public function update(Request $request, Family $family)
    {
        $request->validate([
            'member_ids' => 'required',
        ]);
 
        $member_ids = json_decode($request->member_ids,true);

        $family->fill($request->all());
        $family->wedding_date = toDbDateFormat($request->wedding_date);
        $family->status = 1;
        $family->updated_by = Auth::user()->id;
        $family->save();
        
        //clear members list first
        foreach ($family->members as $members) {
            $person = Person::findOrFail($members->id);
            $person->family_id= NULL;
            $person->save();
        }
        //update members
        for($i= 0; $i < count($member_ids); $i++){
            $person = Person::findOrFail($member_ids[$i]);
            $person->family_id= $family->id;
            $person->save();
        }


        session()->flash("alert-success", "Record Updated Successfully!");
        return redirect()->route('family.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(Family $family)
    {
        //
    }
}
