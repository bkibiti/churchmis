<?php

use Illuminate\Support\Facades\DB;

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