<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => \App\Models\Booking::where('status','completed')->inRandomOrder()->first()->id,
            'reviewer_id' => \App\Models\User::where('role','customer')->inRandomOrder()->first()->id,
            'rating' => fake()->numberBetween(1,5),
            'comment' => fake()->sentence(),
            'review_date' => now(),
        ];
    }
}
