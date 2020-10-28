<?php

namespace App\Http\Controllers;

use App\Person;
use App\Family;
use App\FamilyMember;
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
        $request->validate([
            'member_ids' => 'required',
        ]);
       
        $member_ids = json_decode($request->member_ids,true);
       
        $family = new Family;
        $family->fill($request->all());
        $family->wedding_date = toDbDateFormat($request->wedding_date);
        $family->status = 1;
        $family->created_by = Auth::user()->id;
        $family->updated_by = Auth::user()->id;
        $family->save();

        for($i= 0; $i < count($member_ids); $i++){
            $familyMember = new FamilyMember;
            $familyMember->family_id= $family->id;
            $familyMember->person_id = $member_ids[$i];
            $familyMember->save();
        }

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('family.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit(Family $family)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Family $family)
    {
        //
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
