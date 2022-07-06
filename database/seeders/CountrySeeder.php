<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'name' => 'Cameroon',
                'lat' => 7.3697,
                'lng' => 12.3547
            ],
        ];

        foreach ($countries as $country) {
            $newCountry = new Country($country);
            $newCountry->save();
        }
    }
}
