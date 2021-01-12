<?php

namespace App\Http\Controllers;

use App\Person;
use App\Service;
use App\PersonPosition;
use App\PersonRole;
use App\PersonRelations;
use App\PersonDependant;
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
        $position = PersonPosition::all();
        $members = Person::select('id','name','position_id','gender')->get();
        $service = Service::all();
        $allRelations = PersonRelations::all();

        return view('people.create',compact('position','members','service','allRelations'));
    }

   
    public function store(StorePersonRequest $request)
    {
      
        $person = new Person;
        $person->fill($request->all());
        $person->dob = toDbDateFormat($request->dob);
        $person->date_baptism = toDbDateFormat($request->date_baptism);
        $person->date_confirmation = toDbDateFormat($request->date_confirmation);
        $person->date_marriage = toDbDateFormat($request->date_marriage);
        $person->form_return_date = toDbDateFormat($request->form_return_date);
        $person->services = array2String($request->services);
        $person->status = 1;
        $person->created_by = Auth::user()->id;
        $person->updated_by = Auth::user()->id;
        $person->save();

        $dependantsIds = json_decode($request->dependant_ids,true);
        $relationIds = json_decode($request->relation_ids,true);

        for($i= 0; $i < count($dependantsIds); $i++){
            $dependants = new PersonDependant;
            $dependants->person_id= $person->id;
            $dependants->dependant_id= $dependantsIds[$i];
            $dependants->relation_id= $relationIds[$i];
            $dependants->save();
        }

        session()->flash("alert-success", "Record Saved Successfully!");
        return redirect()->route('people.index');
    }

 
    public function show(Person $person)
    {
        $dependants = [];
        $relations = []; //relation of dependants

        foreach ($person->dependats as $dep) {
            array_push($dependants,$dep->dependant_id);
            $relations['K'.$dep->dependant_id] = $dep->relation_id;
        }

        $members = Person::whereIn('id',$dependants)->get();
        $allRelations = PersonRelations::all();

        return view('people.show',compact("person","members",'relations','allRelations'));
    }

   
    public function edit(Person $person)
    {
        $dependants = [];
        $relations = []; //relation of dependants

        foreach ($person->dependats as $dep) {
            array_push($dependants,$dep->dependant_id);
            $relations[$dep->dependant_id] = $dep->relation_id;
        }

        $position = PersonPosition::all();
        $dependants = Person::whereIn('id',$dependants)->get();
        $service = Service::all();
        $allRelations = PersonRelations::all();
        $members = Person::select('id','name','position_id','gender')->get();

        return view('people.edit',compact('position','dependants','service','person','allRelations','relations','members'));
    }

 
    public function update(Request $request, Person $person)
    {
        $person->fill($request->all());
        $person->dob = toDbDateFormat($request->dob);
        $person->date_baptism = toDbDateFormat($request->date_baptism);
        $person->date_confirmation = toDbDateFormat($request->date_confirmation);
        $person->date_marriage = toDbDateFormat($request->date_marriage);
        $person->form_return_date = toDbDateFormat($request->form_return_date);
        $person->services = array2String($request->services);
        $person->status = 1;
        $person->updated_by = Auth::user()->id;
        $person->save();
        
        $dependantsIds = json_decode($request->dependant_ids,true);
        $relationIds = json_decode($request->relation_ids,true);

        for($i= 0; $i < count($dependantsIds); $i++){
            $dependants = new PersonDependant;
            $dependants->person_id= $person->id;
            $dependants->dependant_id= $dependantsIds[$i];
            $dependants->relation_id= $relationIds[$i];
            $dependants->save();
        }
        
        session()->flash("alert-success", "Record Updated Successfully!");
        return redirect()->route('people.index');
    }

 
    public function destroy(Person $person)
    {
        //
    }
}
