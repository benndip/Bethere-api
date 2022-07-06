<?php

namespace Database\Seeders;

use App\Models\Placetype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlacetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $placetypes = [
            [
                'name' => 'Hotels',
                'icon' => asset('storage/placetypeImages/hotels.png')
            ],
            [
                'name' => 'Museums',
                'icon' => asset('storage/placetypeImages/museums.png')
            ],
            [
                'name' => 'Beaches',
                'icon' => asset('storage/placetypeImages/beaches.png')
            ],
            [
                'name' => 'Airports',
                'icon' => asset('storage/placetypeImages/airports.png')
            ],
            [
                'name' => 'Naturals',
                'icon' => asset('storage/placetypeImages/nature.png')
            ],
            [
                'name' => 'Stadia',
                'icon' => asset('storage/placetypeImages/hotels.png')
            ],
            [
                'name' => 'Bus stations',
                'icon' => asset('storage/placetypeImages/buses.png')
            ],
            [
                'name' => 'Shops',
                'icon' => asset('storage/placetypeImages/shops.png')
            ],
            [
                'name' => 'Restaurants',
                'icon' => asset('storage/placetypeImages/restaurants.png')
            ],
            [
                'name' => 'Churches',
                'icon' => asset('storage/placetypeImages/churches.png')
            ]
        ];

        foreach ($placetypes as $placetype) {
            $newPlacetype = new Placetype($placetype);
            $newPlacetype->save();
        }
    }
}
