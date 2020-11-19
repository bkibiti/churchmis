<?php

use Illuminate\Support\Facades\DB;
use App\Person;
use App\PersonRole;
use App\GroupPosition;
use App\Service;

function toDbDateFormat($val)
{   
    if ($val==""){
        $value= NULL;
    }
    else{
        $date = DateTime::createFromFormat('d/m/Y', $val);
        $value = $date->format('Y-m-d');
    }

    return $value;
}

function toDbDateTimeFormat($val)
{   
    if ($val==""){
        $value= NULL;
    }
    else{
        $date = DateTime::createFromFormat('d/m/Y h:i A', $val);
        $value = $date->format('Y-m-d H:i:s');
    }

    return $value;
}


function getPersonRole($role_id)
{   
    $role = PersonRole::find($role_id);
    return $role->name;
}

function getPosition($id)
{   
    $position = GroupPosition::find($id);
    return $position->name;
}
function getStatus($stat)
{   
    if ($stat == 1) {
        return "Yes";
    }
    if ($stat == 0) {
        return "No";
    }
}

function myDateTimeFormat($value){
    if ($value == ""){
       return "";
    }
    return date_format(date_create($value),"d M Y  H:i");
}

function myDateFormat($value){
    if ($value == "" or $value == "null"){
       return "";
    }
    return date_format(date_create($value),"d M Y");
}

function getRoles(){
    return DB::table('roles')
        ->select('id','name')
        ->orderBy('name')
        ->get();
}

function array2String($val)
{
    if(is_array($val)){
       $str = implode(',', $val);
    }else{
       $str = "";
    }
    return $str;
}


function getPersonName($id){
    $person = Person::find($id);
    if ($person == null) {
       return "";
    } else {
        return $person->name;
    }
}

 function getPersonServices($services)
{
    $serviceArray = explode(',', $services);
    $service = Service::select('name')->whereIn('id', $serviceArray)->get()->implode('name',', ');
    return  $service;
}