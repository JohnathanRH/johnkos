<?php

namespace Database\Factories;

use App\Models\Occupancy;
use App\Models\Kamar;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Occupancy>
 */
class OccupancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kamar_id'  => Kamar::factory(),
            'tenant_id' => Tenant::factory(),
            'deadline'  => $this->faker->dateTimeBetween('+1 week', '+1 month')->format('Y-m-d'),
        ];
    }
}