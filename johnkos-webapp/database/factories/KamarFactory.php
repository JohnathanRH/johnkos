<?php

namespace Database\Factories;

use App\Models\Kamar;
use App\Models\Kost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kamar>
 */
class KamarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kost_id'   => Kost::factory(),
            'tenant_id' => null,
            'name'      => 'Room ' . $this->faker->bothify('#??'),
            'width'     => $this->faker->randomFloat(1, 2.5, 5.0),
            'length'    => $this->faker->randomFloat(1, 3.0, 6.0),
        ];
    }
}