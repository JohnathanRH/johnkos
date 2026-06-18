<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kost;
use App\Models\Kamar;
use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                
                // Generate rooms explicitly on valid floors for this property
                for ($i = 0; $i < 5; $i++) {
                    Kamar::factory()->create([
                        'kost_id' => $kost->id,
                        'floor'   => rand(1, $kost->floors), 
                    ]);
                }
            });

        // 2. Create 9 additional random users, each owning 1 Kost with 3-6 Kamar
        User::factory(9)->create()->each(function ($user) {
            $kost = Kost::factory()->create(['user_id' => $user->id]);
            
            $roomCount = rand(3, 6);
            for ($i = 0; $i < $roomCount; $i++) {
                Kamar::factory()->create([
                    'kost_id' => $kost->id,
                    'floor'   => rand(1, $kost->floors),
                ]);
            }
        });
        
        // 3. Create an explicit Test Tenant for debugging the tenant side
        Tenant::factory()->create([
            'name'  => 'DebugTenant',
            'email' => 'tenant@tenant.com',
            'phone' => '081234567890',
            'password' => Hash::make('password'),
        ]);

        // Create the remaining 19 random tenants to total up to 20
        Tenant::factory()->count(19)->create();

        // 4. Run the Occupancy Seeder to link them up
        $this->call([
            OccupancySeeder::class,
            NotificationSeeder::class,
        ]);
    }
}