<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\Kost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kost_id'     => Kost::factory(), 
            'title'       => $this->faker->randomElement([
                'Pembayaran Diterima',
                'Tagihan Baru Dibuat',
                'Komplain Fasilitas',
                'Penyewa Baru Bergabung',
                'Masa Sewa Hampir Habis'
            ]),
            'description' => $this->faker->sentence(8),
            'tags'        => $this->faker->randomElement(['Lunas', 'Tidak Bayar', 'Detail']), 
        ];
    }
}