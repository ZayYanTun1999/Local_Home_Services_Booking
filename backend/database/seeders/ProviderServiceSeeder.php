<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Get ONLY service providers
        $providers = DB::table('users')
            ->where('role', 'service_provider')
            ->pluck('id')
            ->toArray();

        // Get all services
        $services = DB::table('services')
            ->pluck('id')
            ->toArray();

        if (empty($providers) || empty($services)) {
            $this->command->error("Providers or Services not found!");
            return;
        }

        foreach ($providers as $providerId) {

            // random 1–3 services per provider
            $count = rand(1, 3);
            $count = min($count, count($services));

            $randomKeys = array_rand($services, $count);
            $randomKeys = (array) $randomKeys;

            foreach ($randomKeys as $key) {

                $serviceId = $services[$key];

                DB::table('provider_services')->updateOrInsert(
                    [
                        'provider_id' => $providerId,
                        'service_id'  => $serviceId,
                    ],
                    []
                );
            }
        }

        $this->command->info("Provider services seeded successfully!");
    }
}