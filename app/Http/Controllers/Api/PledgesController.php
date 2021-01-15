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
    public function __construct() {
        $this->middleware('auth:api');
    }

    
    public function show($member_id)
    {
        $pledges = DB::select("SELECT p.activity_id,a.name AS activity,p.person_id AS member_id,ps.name, p.id AS pledge_id, p.pledge_date,p.amount
                    FROM  pledges p 
                    JOIN persons ps ON ps.id = p.person_id 
                    JOIN fund_activities a ON a.id = p.activity_id
                    WHERE p.person_id = '" . $member_id  ."'");
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
