<?php

namespace Database\Factories;

use App\Models\Kost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kost>
 */
class KostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name'    => $this->faker->company() . ' Stay',
            'address' => $this->faker->address(),
            'floors'  => $this->faker->numberBetween(1, 3),
        ];
    }
}