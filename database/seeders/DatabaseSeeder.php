<?php

namespace Database\Seeders;

use App\Models\PlaceImage;
use App\Models\PlacetypeTown;
use App\Models\Specialevent;
use App\Models\Threed;
use Database\Factories\NewsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            RegionSeeder::class,
            TownSeeder::class,
            AgentSeeder::class,
            PlacetypeSeeder::class,
            ReviewSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            NewsSeeder::class,
            PlaceSeeder::class,
            SpecialeventSeeder::class,
            PlaceImageSeeder::class,
            PlacetypeTownSeeder::class,
            PanoSeeder::class,
            ThreedSeeder::class
        ]);
    }
}
