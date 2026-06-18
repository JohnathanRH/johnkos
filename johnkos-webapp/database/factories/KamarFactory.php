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
        $availableFacilities = ['AC', 'Free Wi-Fi', 'Kamar Mandi Dalam', 'Kasur Springbed', 'Lemari Pakaian', 'Meja Belajar'];

        $selected = $this->faker->randomElements($availableFacilities, rand(2, 4));

        return [
            'kost_id'    => Kost::factory(),
            'name'       => 'Kamar ' . $this->faker->numberBetween(100, 500) . '-' . $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'facilities' => $this->faker->randomElements($availableFacilities, rand(2, 4)),
            'floor'      => 1,
            'price'      => $this->faker->numberBetween(500000, 3000000), 
            'width'      => $this->faker->randomFloat(1, 2.5, 5.0),
            'length'     => $this->faker->randomFloat(1, 3.0, 6.0),
        ];
    }
}