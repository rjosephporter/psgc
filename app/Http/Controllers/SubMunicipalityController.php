<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tier3Resource;
use App\SubMunicipality;

class SubMunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tier3Resource::collection(SubMunicipality::paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubMunicipality  $subMunicipality
     * @return \Illuminate\Http\Response
     */
    public function show(SubMunicipality $subMunicipality)
    {
        $subMunicipality->load(['parent', 'barangays']);
        return new Tier3Resource($subMunicipality);
    }
}
