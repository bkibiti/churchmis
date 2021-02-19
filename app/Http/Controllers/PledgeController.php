<?php

namespace App\Http\Controllers;

use App\Pledge;
use App\Person;
use App\Family;
use App\Group;
use App\FundActivity;
use Auth;
use DB;

use Illuminate\Http\Request;
class PledgeController extends Controller
{
  
    public function index()
    {
        $pledges = DB::table('vw_pledges_and_payments')->whereNotNull('pledge_id')->get();
        return view('pledges.index', compact("pledges"));
    }


    public function create()
    {
        $FundActivity = FundActivity::where('status','1')->get();
        $person = Person::select('id','name','address')->where('status','1')->get();

        return view('pledges.create', compact("FundActivity","person"));
    }

   
    public function store(Request $request)
    {
        $pledge = new Pledge;
        $pledge->activity_id = $request->activity_id;
        $pledge->person_id = $request->person_id;
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
        
    }


    public function edit(Pledge $pledge)
    {
        $FundActivity = FundActivity::where('status','1')->get();
        $person = Person::select('id','name','address')->where('status','1')->get();
      
        return view('pledges.edit', compact("FundActivity","person","pledge"));
    }


    public function update(Request $request, Pledge $pledge)
    {
        $pledge->activity_id = $request->activity_id;
        $pledge->person_id = $request->person_id;
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
