<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\ProviderService;
use App\Models\User;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $customers = User::where('role', 'customer')
            ->with('township.city')
            ->get();

        $providerServices = ProviderService::with(['provider.township.city'])
            ->get();

        foreach ($customers as $customer) {

            $count = rand(1, 2);

            $customerCityId = optional($customer->township->city)->id;

            if (!$customerCityId) continue;

            $available = $providerServices->filter(function ($ps) use ($customerCityId) {
                return optional($ps->provider->township->city)->id == $customerCityId;
            });

            if ($available->isEmpty()) continue;

            for ($i = 0; $i < $count; $i++) {

                $ps = $available->random();

                $start = now()->subDays(rand(1, 7));
                $end = (clone $start)->addHours(2);

                Booking::create([
                    'customer_id' => $customer->id,
                    'provider_service_id' => $ps->id,
                    'scheduled_start' => $start,
                    'scheduled_end' => $end,
                    'service_address' => 'Sample Address',
                    'status' => rand(0, 1) ? 'completed' : 'pending',
                ]);
            }
        }
    }
}