<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationResource;
use App\SubMunicipality;
use Illuminate\Http\Request;

class SubMunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LocationResource::collection(SubMunicipality::paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubMunicipality  $subMunicipality
     * @return \Illuminate\Http\Response
     */
    public function show(SubMunicipality $subMunicipality)
    {
        return new LocationResource($subMunicipality);
    }
}
