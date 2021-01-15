<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class PaymentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function show($member_id)
    {
        $payments = DB::select("SELECT p.activity_id,a.name AS activity,p.person_id AS member_id,ps.name AS name,
                p.pledge_id,p.id AS payment_id,p.pay_date AS payment_date,p.amount,pm.name AS payment_method
                FROM payments p
                JOIN persons ps ON ps.id = p.person_id
                JOIN fund_activities a ON a.id = p.activity_id
                JOIN payment_method pm ON pm.id = p.payment_method_id
                WHERE p.person_id = '" . $member_id  ."'");
        return $payments;
    }

}
