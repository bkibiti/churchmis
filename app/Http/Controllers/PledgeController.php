<?php

namespace App\Http\Controllers;

use App\Pledge;
use App\Person;
use App\Family;
use App\Group;
use App\FundActivity;
use Auth;

use Illuminate\Http\Request;
class PledgeController extends Controller
{
  
    public function index()
    {
        // DB::enableQueryLog();//enable query logging

        $personPledge = Pledge::with('Person')->where('pledger','=','Person')->get();


        // dd(DB::getQueryLog());//print sql query

        $familyPledge = Pledge::with('Family')->where('pledger','=','Family')->get();
        $groupPledge = Pledge::with('Group')->where('pledger','=','Group')->get();
      
        return view('pledges.index', compact("personPledge","familyPledge","groupPledge"));

    }

   
    public function create()
    {
        $FundActivity = FundActivity::where('type','Pledgeable')->where('status','1')->get();
        $person = Person::select('id','first_name','middle_name','last_name','address')->where('status','1')->get();
        $family = Family::select('id','name','address')->where('status','1')->get();
        $group = Group::select('id','name')->get();

        return view('pledges.create', compact("FundActivity","person","family","group"));
    }

   
    public function store(Request $request)
    {
        $pledge = new Pledge;

        if ($request->pledger =="Person") {
            $pledge->person_id = $request->person_id;
        }
        if ($request->pledger =="Family") {
            $pledge->family_id = $request->family_id;
        }
        if ($request->pledger =="Group") {
            $pledge->group_id = $request->group_id;
        }

        $pledge->activity_id = $request->activity_id;
        $pledge->pledger = $request->pledger;
        $pledge->pledge_date = toDbDateFormat($request->pledge_date);
        $pledge->amount = $request->amount;
        $pledge->comment = $request->comment;
        $pledge->created_by = Auth::user()->id;
        $pledge->updated_by = Auth::user()->id;
        $pledge->save();

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('pledges.index');
    }

   
    public function show(Pledge $pledge)
    {
        //
    }


    public function edit(Pledge $pledge)
    {
        $FundActivity = FundActivity::where('type','Pledgeable')->where('status','1')->get();
        $person = Person::select('id','first_name','middle_name','last_name','address')->where('status','1')->get();
        $family = Family::select('id','name','address')->where('status','1')->get();
        $group = Group::select('id','name')->get();

        return view('pledges.edit', compact("FundActivity","person","family","group","pledge"));
    }


    public function update(Request $request, Pledge $pledge)
    {
        if ($request->pledger =="Person") {
            $pledge->person_id = $request->person_id;
        }
        if ($request->pledger =="Family") {
            $pledge->family_id = $request->family_id;
        }
        if ($request->pledger =="Group") {
            $pledge->group_id = $request->group_id;
        }

        $pledge->activity_id = $request->activity_id;
        $pledge->pledger = $request->pledger;
        $pledge->pledge_date = toDbDateFormat($request->pledge_date);
        $pledge->amount = $request->amount;
        $pledge->comment = $request->comment;
        $pledge->updated_by = Auth::user()->id;
        $pledge->save();

        session()->flash("alert-success", "Record Updated Successfully!");
        return redirect()->route('pledges.index');
    }

 
    public function destroy(Pledge $pledge)
    {
        //
    }
}
