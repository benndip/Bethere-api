<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaceImageRequest;
use App\Http\Requests\UpdatePlaceImageRequest;
use App\Models\PlaceImage;

class PlaceImageController extends Controller
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
     * @param  \App\Http\Requests\StorePlaceImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlaceImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlaceImage  $placeImage
     * @return \Illuminate\Http\Response
     */
    public function show(PlaceImage $placeImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlaceImage  $placeImage
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaceImage $placeImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlaceImageRequest  $request
     * @param  \App\Models\PlaceImage  $placeImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlaceImageRequest $request, PlaceImage $placeImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlaceImage  $placeImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaceImage $placeImage)
    {
        //
    }
}
