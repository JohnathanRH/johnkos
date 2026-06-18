<?php

namespace Database\Factories;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'              => $this->faker->name(),
            'phone'             => $this->faker->unique()->phoneNumber(),
            'email'             => $this->faker->unique()->safeEmail(),
            'password'          => Hash::make('password'), // Sets a default password for generated fakes
            'remember_token'    => Str::random(10),
            'email_verified_at' => now(),
        ];
    }
}