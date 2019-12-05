<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tier1Resource;
use App\Region;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tier1Resource::collection(Region::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        $region->load(['provinces', 'districts']);
        return new Tier1Resource($region);
    }
}
