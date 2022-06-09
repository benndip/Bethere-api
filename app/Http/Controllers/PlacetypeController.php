<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $placeTypes = Placetype::all();
        return response()->json([
            'success' => true,
            'placeTypes' => $placeTypes
        ], 200);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * @param  \App\Models\Placetype  $placetype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Placetype $placetype)
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
