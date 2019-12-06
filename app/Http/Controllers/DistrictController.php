<?php

namespace App\Http\Controllers;

use App\District;
use App\Http\Resources\Tier2Resource;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tier2Resource::collection(District::paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        $district->load('region');
        if($district->cities()->count())
            $district->load('cities');
        if($district->municipalities()->count())
            $district->load('municipalities');
        return new Tier2Resource($district);
    }
}
