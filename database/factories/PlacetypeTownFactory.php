<?php

namespace Database\Factories;

use App\Models\Placetype;
use App\Models\Town;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlacetypeTown>
 */
class PlacetypeTownFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'placetype_id' => $this->faker->randomElement([1, 2, 3]),
            'town_id' => $this->faker->randomElement([1, 2, 3])
        ];
    }
}
