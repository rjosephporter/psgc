<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tier3Resource;
use App\Municipality;

class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tier3Resource::collection(Municipality::paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function show(Municipality $municipality)
    {
        $municipality->load(['parent', 'barangays']);
        return new Tier3Resource($municipality);
    }
}
