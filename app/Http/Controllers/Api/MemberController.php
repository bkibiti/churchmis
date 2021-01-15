<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Person;
use App\Http\Resources\Member;
use Auth;
use Validator;

class MemberController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function show($member_id)
    {
        $person = Person::find($member_id);
        return new Member($person);
    }

    public function dependants($member_id)
    {
        $person = Person::find($member_id);
        return new Member($person);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,60',
            'gender' => 'required',
            'mobile_phone' => 'required|string|between:9,15',
            'partner_phone' => 'max:20',
            'email' => 'string|email|max:100',
            'address' => 'max:100',
            'dob' => 'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $person = new Person;
        $person->fill($request->all());
        $person->dob = toDbDateFormat($request->dob);
        $person->date_baptism = toDbDateFormat($request->date_baptism);
        $person->date_confirmation = toDbDateFormat($request->date_confirmation);
        $person->date_marriage = toDbDateFormat($request->date_marriage);
        $person->form_return_date = toDbDateFormat($request->form_return_date);
        $person->services = array2String($request->services);
        $person->status = 0;
        $person->created_by = Auth::user()->id;
        $person->updated_by = Auth::user()->id;
        $person->save();

        return response()->json([
            'message' => 'Member successfully registered',
            'member' => $person
        ], 201);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,60',
            'gender' => 'required',
            'mobile_phone' => 'required|string|between:9,15',
            'partner_phone' => 'max:20',
            'email' => 'string|email|max:100',
            'address' => 'max:100',
            'dob' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $person = Person::findorfail($id);
        $person->fill($request->all());
        $person->dob = toDbDateFormat($request->dob);
        $person->date_baptism = toDbDateFormat($request->date_baptism);
        $person->date_confirmation = toDbDateFormat($request->date_confirmation);
        $person->date_marriage = toDbDateFormat($request->date_marriage);
        $person->form_return_date = toDbDateFormat($request->form_return_date);
        $person->services = array2String($request->services);
        $person->status = 0;
        $person->created_by = Auth::user()->id;
        $person->updated_by = Auth::user()->id;
        $person->save();

        return response()->json([
            'message' => 'Member successfully updated',
            'member' => $person
        ], 201);
    }




}
