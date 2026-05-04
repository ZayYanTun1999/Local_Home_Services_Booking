<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\LocationSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\ServiceImageSeeder;
use Database\Seeders\ProductSeeder;

use Database\Seeders\FaqSeeder;
use Database\Seeders\UserSeeder;

use Database\Seeders\ProviderServiceSeeder;
use Database\Seeders\ProviderAreaSeeder;

use Database\Seeders\BookingSeeder;
use Database\Seeders\BookingProductSeeder;
use Database\Seeders\BookingImageSeeder;

use Database\Seeders\ReviewSeeder;
use Database\Seeders\NotificationSeeder;
use Database\Seeders\ContactMessageSeeder;

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

            // 5. BOOKINGS (depends on everything above)
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