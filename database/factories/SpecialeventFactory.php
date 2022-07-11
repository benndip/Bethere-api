<?php

namespace Database\Factories;

use App\Models\Town;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specialevent>
 */
class SpecialeventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'town_id' => $this->faker->randomElement([1, 2, 3]),
            'date' => $this->faker->date(),
            'details' => $this->faker->sentence(15)
        ];
    }
}
