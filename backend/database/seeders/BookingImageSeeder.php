<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookingImage;
use App\Models\Booking;

class BookingImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            $count = rand(1, 3);

            for ($i = 0; $i < $count; $i++) {
                BookingImage::create([
                    'booking_id' => $booking->id,
                    'image' => 'sample.jpg'
                ]);
            }
        }
    }
}
