<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Resources\Tier3Resource;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tier3Resource::collection(City::paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $city->load(['parent', 'barangays']);
        return new Tier3Resource($city);
    }
}
