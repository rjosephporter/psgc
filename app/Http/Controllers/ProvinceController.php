<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tier2Resource;
use App\Province;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tier2Resource::collection(Province::paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        $province->load('region');
        if($province->cities()->count())
            $province->load('cities');
        if($province->municipalities()->count())
            $province->load('municipalities');
        return new Tier2Resource($province);
    }
}
