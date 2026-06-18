<?php

namespace Database\Seeders;

use App\Models\Kamar;
use App\Models\Tenant;
use App\Models\Occupancy;
use Illuminate\Database\Seeder;

class OccupancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all rooms and shuffle them to randomize occupancy across different Kosts
        $rooms = Kamar::all()->shuffle();
        
        // Fetch all the 20 tenants you generated in DatabaseSeeder and shuffle them
        $tenants = Tenant::all()->shuffle();

        foreach ($rooms as $room) {
            // Stop if we run out of tenants to assign
            if ($tenants->isEmpty()) {
                break;
            }

            // 60% chance to occupy the room to leave some rooms empty/vacant
            if (rand(1, 10) <= 6) {
                // Take the last tenant off the shuffled stack
                $tenant = $tenants->pop();

                // Create the occupancy record linking the existing room and existing tenant
                Occupancy::factory()->create([
                    'kamar_id'  => $room->id,
                    'tenant_id' => $tenant->id,
                ]);
            }
        }
    }
}