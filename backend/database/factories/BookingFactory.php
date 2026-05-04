<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('-7 days', 'now');
        $end = (clone $start)->modify('+1 hour');

        return [
            'customer_id' => \App\Models\User::where('role','customer')->inRandomOrder()->first()->id,
            'provider_service_id' => \App\Models\ProviderService::inRandomOrder()->first()->id,
            'scheduled_start' => $start,
            'scheduled_end' => $end,
            'status' => fake()->randomElement(['pending','completed']),
        ];
    }
}
