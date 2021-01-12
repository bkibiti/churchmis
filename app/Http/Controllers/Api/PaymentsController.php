<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class PaymentsController extends Controller
{
    public function show($member_id)
    {
        $payments = DB::table('vw_pledges_and_payments')->whereNotNull('pay_id')->where('person_id',$member_id)->get();
        return $payments;
    }

}
