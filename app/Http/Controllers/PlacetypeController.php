<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlacetypeRequest;
use App\Http\Requests\UpdatePlacetypeRequest;
use App\Models\Placetype;

class PlacetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlacetypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlacetypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Placetype  $placetype
     * @return \Illuminate\Http\Response
     */
    public function show(Placetype $placetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Placetype  $placetype
     * @return \Illuminate\Http\Response
     */
    public function edit(Placetype $placetype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlacetypeRequest  $request
     * @param  \App\Models\Placetype  $placetype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlacetypeRequest $request, Placetype $placetype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Placetype  $placetype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Placetype $placetype)
    {
        //
    }
}
