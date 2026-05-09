<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([

            // 1. BASE LOCATION DATA (NO DEPENDENCIES)
            LocationSeeder::class,

            // 2. SERVICE STRUCTURE
            CategorySeeder::class,
            ServiceSeeder::class,
            ServiceImageSeeder::class,
            ProductSeeder::class,

            // 3. USERS
            UserSeeder::class,

            // 4. PROVIDER RELATIONSHIPS
            ProviderServiceSeeder::class,
            ProviderAreaSeeder::class,

            // 5. BOOKINGS
            BookingSeeder::class,
            BookingProductSeeder::class,
            BookingImageSeeder::class,

            // 6. SOCIAL / SYSTEM DATA
            ReviewSeeder::class,
            NotificationSeeder::class,
            ContactMessageSeeder::class,

            // 7. STATIC CONTENT
            FaqSeeder::class,
        ]);
    }
}