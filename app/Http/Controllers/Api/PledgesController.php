<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FundActivity;
use App\Pledge;
use App\Http\Resources\PledgeType;
use DB;

class PledgesController extends Controller
{
    public function show($member_id)
    {
        $pledges = DB::table('vw_pledges_and_payments')->whereNotNull('pledge_id')->where('person_id',$member_id)->get();
        return $pledges;
    }

    public function pledgeTypes()
    {
        $types = FundActivity::all();
        return PledgeType::collection($types);
    }

    public function store(Request $request)
    {
        $pledge = new Pledge;
        $pledge->activity_id = $request->activity_id;
        $pledge->person_id = Auth::user()->person_id;
        $pledge->pledge_date = Carbon::now();
        $pledge->amount = $request->amount;
        $pledge->comment = $request->comment;
        $pledge->created_by = Auth::user()->id;
        $pledge->updated_by = Auth::user()->id;
        $pledge->save();

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('member.pledges');
    }
}
