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
        Placetype::factory(5)->create();
    }
}
