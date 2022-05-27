<?php

namespace Database\Seeders;

use App\Models\PlacetypeTown;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlacetypeTownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlacetypeTown::factory(5)->create();
    }
}
