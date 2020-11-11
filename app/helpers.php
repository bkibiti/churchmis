<?php

use Illuminate\Support\Facades\DB;
use App\PersonRole;
use App\GroupPosition;

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
    if ($value == ""){
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

