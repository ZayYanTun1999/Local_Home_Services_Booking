<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Booking;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $completedBookings = Booking::where('status', 'completed')->get();

        $comments = [
            5 => ['Excellent service', 'Very professional', 'Highly recommended'],
            4 => ['Good service', 'Satisfied', 'Will hire again'],
            3 => ['Average service', 'Okay work', 'Can improve'],
            2 => ['Poor timing', 'Needs improvement'],
            1 => ['Not satisfied', 'Bad experience'],
        ];

        foreach ($completedBookings as $booking) {

            if (rand(1, 100) > 90) continue;

            $rating = rand(1, 5);

            Review::create([
                'booking_id' => $booking->id,
                'reviewer_id' => $booking->customer_id,
                'rating' => $rating,
                'comment' => $comments[$rating][array_rand($comments[$rating])],
                'review_date' => now()->subDays(rand(0, 5)),
            ]);
        }
    }
}