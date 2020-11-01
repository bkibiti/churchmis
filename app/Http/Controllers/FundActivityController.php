<?php

namespace App\Http\Controllers;

use App\FundActivity;
use Illuminate\Http\Request;

class FundActivityController extends Controller
{
 
    public function index()
    {
        $fundActivity = FundActivity::all();
        return view('fund_activities.index', compact("fundActivity"));
    }


  
    public function store(Request $request)
    {
        $FundActivity = new FundActivity;
        $FundActivity->fill($request->all());
        $FundActivity->save();
        
        session()->flash("alert-success", "Record Saved Successfully!");
        return back();
    }

 
    public function update(Request $request)
    {
        // dd($request->all());
        $FundActivity = FundActivity::find($request->id);
        $FundActivity->fill($request->all());
        $FundActivity->save();

        session()->flash("alert-success", "Record Updated Successfully!");
        return back();
    }

 
    public function destroy(Request $request)
    {
        try {
            FundActivity::destroy($request->id);
            session()->flash("alert-success", "Record Deleted successfully!");
            return back();
        } catch (Exception $exception) {
            session()->flash("alert-danger", "Something went wrong!");
            return back();
        }
    }
}
