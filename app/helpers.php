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

