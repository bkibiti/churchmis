<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Diocese;
use App\District;
use App\Church;
use App\Http\Resources\Diocese as DioceseResource;
use App\Http\Resources\District as DistrictResource;
use App\Http\Resources\Church as ChurchResource;


class ChurchController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function getDioceses()
    {
        return DioceseResource::collection(Diocese::all());
    }

    public function getDiocese($id)
    {
        return new DioceseResource(Diocese::find(1));
    }

    public function getDistricts()
    {
        return DistrictResource::collection(District::all());
    }

    public function getDistrict($id)
    {
        return new DistrictResource(District::find($id));
    }

    public function getchurches()
    {
        return ChurchResource::collection(Church::all());
    }

    public function getchurche($id)
    {
        return new ChurchResource(Church::find($id));
    }
    
}
