<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            [
                'name' => 'Center',
                'lng' => 0,
                'lat' => 0,
                'country_id' => 1

            ],
            [
                'name' => 'South-West',
                'lng' => 0,
                'lat' => 0,
                'country_id' => 1

            ],
            [
                'name' => 'North-West',
                'lng' => 0,
                'lat' => 0,
                'country_id' => 1

            ],
            [
                'name' => 'Littoral',
                'lng' => 0,
                'lat' => 0,
                'country_id' => 1

            ],
            [
                'name' => 'Ngaoundere',
                'lng' => 0,
                'lat' => 0,
                'country_id' => 1

            ],
            [
                'name' => 'Adamawa',
                'lng' => 0,
                'lat' => 0,
                'country_id' => 1

            ],
            [
                'name' => 'Far-north',
                'lng' => 0,
                'lat' => 0,
                'country_id' => 1

            ],
            [
                'name' => 'East',
                'lng' => 0,
                'lat' => 0,
                'country_id' => 1

            ],
            [
                'name' => 'Center',
                'lng' => 0,
                'lat' => 0,
                'country_id' => 1

            ],
            [
                'name' => 'Center',
                'lng' => 0,
                'lat' => 0,
                'country_id' => 1
            ],
        ];

        foreach ($regions as $region) {
            $newRegion = new Region($region);
            $newRegion->save();
        }
    }
}
