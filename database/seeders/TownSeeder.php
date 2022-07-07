<?php

namespace Database\Seeders;

use App\Models\Town;
use Illuminate\Database\Seeder;

class TownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $towns = [
            [
                'name' => 'Yaoundé',
                'lng' => 0,
                'lat' => 0,
                'region_id' => 1

            ],
            [
                'name' => 'Buea',
                'lng' => 0,
                'lat' => 0,
                'region_id' => 2

            ],
            [
                'name' => 'Bamenda',
                'lng' => 0,
                'lat' => 0,
                'region_id' => 3

            ],
            [
                'name' => 'Douala',
                'lng' => 0,
                'lat' => 0,
                'region_id' => 4

            ],
            [
                'name' => 'Bafoussam',
                'lng' => 0,
                'lat' => 0,
                'region_id' => 5

            ],
            [
                'name' => 'Ngaoundere',
                'lng' => 0,
                'lat' => 0,
                'region_id' => 6

            ],
            [
                'name' => 'Maroua',
                'lng' => 0,
                'lat' => 0,
                'region_id' => 7

            ],
            [
                'name' => 'Bertoua',
                'lng' => 0,
                'lat' => 0,
                'region_id' => 8

            ],
            [
                'name' => 'Garoua',
                'lng' => 0,
                'lat' => 0,
                'region_id' => 9

            ],
            [
                'name' => 'Eboolowa',
                'lng' => 0,
                'lat' => 0,
                'region_id' => 10
            ]
        ];

        foreach ($towns as $town) {
            $newTown = new Town($town);
            $newTown->save();
        }
    }
}
