<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Person;
use App\Family;
use App\Group;
use App\PaymentMethod;
use App\FundActivity;
use App\Pledge;
use Auth;
use Illuminate\Http\Request;
use DB;

class PaymentController extends Controller
{
   
    public function index()
    {
        $payments = DB::table('vw_pledges_and_payments')->whereNotNull('pay_id')->get();
        return view('payments.index', compact("payments"));

    }

 
    public function create()
    {
        $fundActivity = FundActivity::where('type','Pledgeable')->where('status','1')->get();
        $pledges = DB::table('vw_pledges_and_payments')->whereNotNull('pledge_id')->get();
        $person = Person::select('id','first_name','middle_name','last_name','address')->where('status','1')->get();
        $family = Family::select('id','name','address')->where('status','1')->get();
        $group = Group::select('id','name')->get();
        $paymentMethod = PaymentMethod::all();
        return view('payments.create', compact("pledges","fundActivity","family","group","person","paymentMethod"));
    }

 
    public function store(Request $request)
    {
        // dd($request->all());
        $payment = new Payment;

        if ($request->pledged == "1") { // Payment for non pledged
            if ($request->pledger =="Person") {
                $payment->person_id = $request->person_id;
            }
            if ($request->pledger =="Family") {
                $payment->family_id = $request->family_id;
            }
            if ($request->pledger =="Group") {
                $payment->group_id = $request->group_id;
            }
        }

        if ($request->pledged == "2") { // Payment for pledges
            $pledge = Pledge::find($request->pledge_id);
            // dd($pledge);
            $payment->pledge_id = $request->pledge_id;
            $payment->group_id = $pledge->group_id;
            $payment->family_id = $pledge->family_id;
            $payment->person_id = $pledge->person_id;
        }

        $payment->activity_id = $request->activity_id;
        $payment->pay_date = toDbDateFormat($request->pay_date);
        $payment->amount = $request->amount;
        $payment->payment_method_id = $request->payment_method_id;
        $payment->comment = $request->comment;
        $payment->created_by = Auth::user()->id;
        $payment->updated_by = Auth::user()->id;
        $payment->save();

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('payments.index');
    }

  
    public function show(Payment $payment)
    {
        //
    }

   
    public function edit(Payment $payment)
    {
        //
    }

  
    public function update(Request $request, Payment $payment)
    {
        //
    }

  
    public function destroy(Payment $payment)
    {
        //
    }

    public function getPledges(Request $request){
        $pledges = DB::table('vw_pledges_and_payments')
                    ->where('activity_id',$request->activity_id)->orderByRaw('name')
                    ->get();
    
        $output = '<option value="">--Select Pledge--</option>';
        foreach($pledges as $row)
        {
            $output .= '<option value="'.$row->pledge_id.'">'. $row->name. ' - Pledge: '.number_format($row->pledge_amount, 2, '.', ','). '</option>';
        }
        return $output;
    }

}
