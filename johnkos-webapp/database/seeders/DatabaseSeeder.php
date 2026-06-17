<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kost;
use App\Models\Kamar;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create your explicit Test User with 1 Kost containing 5 Kamar
        User::factory()
            ->create([
                'name' => 'DebugAccount',
                'email' => 'a@a.com',
            ])
            ->each(function ($user) {
                $kost = Kost::factory()->create(['user_id' => $user->id]);
                
                // Create 5 rooms for this Kost
                $rooms = Kamar::factory()->count(5)->create(['kost_id' => $kost->id]);

                // Randomly assign tenants to some of the rooms
                foreach ($rooms as $room) {
                    if (rand(0, 1)) { // 50% chance the room is occupied
                        $tenant = Tenant::factory()->create();
                        $room->update(['tenant_id' => $tenant->id]);
                    }
                }
            });

        // 2. Create 9 additional random users, each owning 1 Kost with 3-6 Kamar
        User::factory(9)->create()->each(function ($user) {
            $kost = Kost::factory()->create(['user_id' => $user->id]);
            
            $rooms = Kamar::factory()->count(rand(3, 6))->create(['kost_id' => $kost->id]);

            // Randomly assign tenants to some of the rooms
            foreach ($rooms as $room) {
                if (rand(0, 1)) {
                    $tenant = Tenant::factory()->create();
                    $room->update(['tenant_id' => $tenant->id]);
                }
            }
        });
    }
}