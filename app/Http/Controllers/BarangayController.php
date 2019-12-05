<?php

namespace App\Http\Controllers;

use App\Barangay;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LocationResource::collection(Barangay::paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function show(Barangay $barangay)
    {
        $barangay->load('parent.parent.region');
        return new LocationResource($barangay);
    }
}
