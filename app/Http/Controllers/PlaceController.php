<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\PlaceImage;

class PlaceController extends Controller
{
    protected $place;

    public function __construct()
    {
        $this->place = new Place;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::with(['placeImages', 'reviews'])
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json([
            'status' => true,
            'places' => $places
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:25', 'unique:places,name'],
            'about' => ['required', 'string'],
            'placetype_id' => ['required', 'integer', 'exists:placetypes,id'],
            'town_id' => ['required', 'integer', 'exists:towns,id'],
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
            'images' => ['required'],
            'images.*' => ['image|mimes:jpeg,png,jpg,gif,svg|max:2048']
        ]);

        $createdPlace = $this->place->create([
            "name" => $request->name,
            "about" => $request->about,
            "placetype_id" => $request->placetype_id,
            "town_id" => $request->town_id,
            "lat" => $request->lat,
            "lng" => $request->lng
        ]);

        $images = $request->file(['images']);
        $image_details = array();

        if ($images) {

            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $path = $image->store('public/placeImages');
                $exploded_string = explode("/", $path);
                $image_details[] = new PlaceImage(
                    [
                        'name' => $name,
                        'url' => asset("storage/{$exploded_string[1]}/{$exploded_string[2]}")
                    ]
                );
            }
        }

        $createdPlace->placeImages()->saveMany($image_details);

        return response()->json([
            'success' => true,
            'place' => $createdPlace
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
    }
}
