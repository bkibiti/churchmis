<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\PersonRelations;
use App\FundActivity;
use App\Pledge;
use Carbon\Carbon;

use Auth;
use DB;


class MemberController extends Controller
{
    public function index()
    {
        $person = Person::find(Auth::user()->person_id);

        $dependants = [];
        $relations = []; //relation of dependants

        if ($person <> '') { 
            foreach ($person->dependats as $dep) {
                array_push($dependants,$dep->dependant_id);
                $relations['K'.$dep->dependant_id] = $dep->relation_id;
            }
        }
      

        $members = Person::whereIn('id',$dependants)->get();
        $allRelations = PersonRelations::all();

        return view('members.index',compact("person","members",'relations','allRelations'));
    }

    public function pending()
    {
        return view('members.pending');
    }

    public function pledges()
    {
        $pledges = DB::table('vw_pledges_and_payments')->whereNotNull('pledge_id')->where('person_id',Auth::user()->person_id)->get();
        return view('members.pledges', compact("pledges"));
    }

    public function create()
    {
        $FundActivity = FundActivity::where('status','1')->get();

        return view('members.new_pledge', compact("FundActivity"));
    }

    public function pledgeStore(Request $request)
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
    
    public function payments()
    {
        $payments = DB::table('vw_pledges_and_payments')->whereNotNull('pay_id')->where('person_id',Auth::user()->person_id)->get();
        return view('members.payment', compact("payments"));
    }

}

