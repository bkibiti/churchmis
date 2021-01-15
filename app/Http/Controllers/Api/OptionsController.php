<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MarriageStatus;
use App\PersonPosition;
use App\Community;
use App\Service;

class OptionsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function getMarriageStatus()
    {
        return MarriageStatus::all();
    }

    public function getPosition()
    {
        return PersonPosition::all();
    }

    public function getcommunities()
    {
        return Community::all();
    }

    public function getServices()
    {
        return Service::select('id','name')->get();
    }

    
}
