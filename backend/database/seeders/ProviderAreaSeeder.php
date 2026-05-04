<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderAreaSeeder extends Seeder
{
    public function run(): void
    {
        // Get providers with township + city in ONE query
        $providers = DB::table('users')
            ->join('townships', 'users.township_id', '=', 'townships.id')
            ->where('users.role', 'service_provider')
            ->select(
                'users.id as provider_id',
                'users.township_id',
                'townships.city_id'
            )
            ->get();

        foreach ($providers as $provider) {

            $providerId = $provider->provider_id;
            $townshipId = $provider->township_id;
            $cityId = $provider->city_id;

            // -----------------------------
            // 1. Always insert own township
            // -----------------------------
            DB::table('provider_areas')->updateOrInsert(
                [
                    'provider_id' => $providerId,
                    'township_id' => $townshipId,
                ]
            );

            // -----------------------------
            // 2. Get same-city townships
            // -----------------------------
            $otherTownships = DB::table('townships')
                ->where('city_id', $cityId)
                ->where('id', '!=', $townshipId)
                ->pluck('id')
                ->toArray();

            if (empty($otherTownships)) {
                continue;
            }

            shuffle($otherTownships);

            $max = min(2, count($otherTownships));
            $count = rand(0, $max);

            $selectedTownships = array_slice($otherTownships, 0, $count);

            // -----------------------------
            // 3. Insert selected areas
            // -----------------------------
            foreach ($selectedTownships as $tId) {

                DB::table('provider_areas')->updateOrInsert(
                    [
                        'provider_id' => $providerId,
                        'township_id' => $tId,
                    ]
                );
            }
        }

        $this->command->info("Provider areas seeded successfully!");
    }
}