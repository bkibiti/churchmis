<?php

namespace App\Http\Controllers;

use App\Person;
use App\PersonClassification;
use App\PersonRole;
use App\PersonSalutation;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StorePersonRequest;

class PersonController extends Controller
{
   
    public function index()
    {
        $people = person::all();
        return view('people.index', compact("people"));
    }

 
    public function create()
    {
        $role = PersonRole::all();
        $classification = PersonClassification::all();
        $salute = PersonSalutation::all();
        return view('people.create',compact("role","classification","salute"));
    }

   
    public function store(StorePersonRequest $request)
    {

        $person = new Person;
        $person->fill($request->all());
        $person->dob = toDbDateFormat($request->dob);
        $person->date_baptism = toDbDateFormat($request->date_baptism);
        $person->date_eucharist = toDbDateFormat($request->date_eucharist);
        $person->date_confirmation = toDbDateFormat($request->date_confirmation);
        $person->date_marriage = toDbDateFormat($request->date_marriage);
        $person->membership_date = toDbDateFormat($request->membership_date);
        $person->status = 1;
        $person->created_by = Auth::user()->id;
        $person->updated_by = Auth::user()->id;
        $person->save();

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('people.index');
    }

 
    public function show(Person $person)
    {
        //
    }

   
    public function edit(Person $person)
    {
        $role = PersonRole::all();
        $classification = PersonClassification::all();
        $salute = PersonSalutation::all();
        return view('people.edit',compact("person","role","classification","salute"));
    }

 
    public function update(Request $request, Person $person)
    {
        $person->fill($request->all());
        $person->dob = toDbDateFormat($request->dob);
        $person->date_baptism = toDbDateFormat($request->date_baptism);
        $person->date_eucharist = toDbDateFormat($request->date_eucharist);
        $person->date_confirmation = toDbDateFormat($request->date_confirmation);
        $person->date_marriage = toDbDateFormat($request->date_marriage);
        $person->membership_date = toDbDateFormat($request->membership_date);
        $person->status = 1;
        $person->updated_by = Auth::user()->id;
        $person->save();
        
        session()->flash("alert-success", "Record Updated Successfully!");
        return redirect()->route('people.index');
    }

 
    public function destroy(Person $person)
    {
        //
    }
}
