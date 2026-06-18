<?php

namespace Database\Seeders;

use App\Models\Kost;
use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kosts = Kost::all();

        foreach ($kosts as $kost) {
            Notification::factory()
                ->count(rand(2, 10))
                ->create([
                    'kost_id' => $kost->id,
                ]);
        }
    }
}