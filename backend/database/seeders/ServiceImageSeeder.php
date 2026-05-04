<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class ServiceImageSeeder extends Seeder
{
    public function run(): void
    {
        $services = Service::all();

        if ($services->isEmpty()) {
            $this->command->error("No services found!");
            return;
        }

        foreach ($services as $service) {

            $imageCount = rand(1, 3);

            $primaryIndex = rand(0, $imageCount - 1);

            for ($i = 0; $i < $imageCount; $i++) {

                DB::table('service_images')->insert([
                    'service_id' => $service->id,
                    'image' => $this->fakeImage($service->id, $i),
                    'is_primary' => $i === $primaryIndex,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info("Service images seeded successfully!");
    }

    private function fakeImage(int $serviceId, int $index): string
    {
        // You can replace this with real storage path later
        return "services/service_{$serviceId}_{$index}.jpg";
    }
}