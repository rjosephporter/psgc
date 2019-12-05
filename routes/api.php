<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('regions', 'RegionController')->only(['index', 'show']);
Route::resource('provinces', 'ProvinceController')->only(['index', 'show']);
Route::resource('districts', 'DistrictController')->only(['index', 'show']);
Route::resource('cities', 'CityController')->only(['index', 'show']);
Route::resource('municipalities', 'MunicipalityController')->only(['index', 'show']);
Route::resource('subMunicipalities', 'SubMunicipalityController')->only(['index', 'show']);
Route::resource('barangays', 'BarangayController')->only(['index', 'show']);
