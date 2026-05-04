<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Product;

class BookingProductSeeder extends Seeder
{
    public function run(): void
    {
        $bookings = Booking::all();
        $products = Product::all();

        if ($bookings->isEmpty() || $products->isEmpty()) {
            $this->command->error("No bookings or products found!");
            return;
        }

        foreach ($bookings as $booking) {

            $count = rand(1, 3);

            $selectedProducts = $products->random($count);

            foreach ($selectedProducts as $product) {

                DB::table('booking_products')->updateOrInsert(
                    [
                        'booking_id' => $booking->id,
                        'product_id' => $product->id,
                    ],
                    [
                        'quantity' => rand(1, 5),
                    ]
                );
            }
        }

        $this->command->info("Booking products seeded successfully!");
    }
}