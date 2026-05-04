<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        echo "Seeding Services...\n";

        $services_data = [
            // Plumbing Services
            ['category_name' => 'Plumbing Services', 'title' => 'Leak Repair Service', 'description' => 'Fixing pipe leaks and faucet drips quickly.', 'price' => 15000],
            ['category_name' => 'Plumbing Services', 'title' => 'Pipe Installation', 'description' => 'Installing new water and drainage pipes professionally.', 'price' => 30000],

            // Electrical Services
            ['category_name' => 'Electrical Services', 'title' => 'Socket & Switch Installation', 'description' => 'Professional installation of electrical sockets and switches.', 'price' => 12000],
            ['category_name' => 'Electrical Services', 'title' => 'Lighting Installation', 'description' => 'Indoor and outdoor lighting fixture installations.', 'price' => 18000],

            // Air Conditioner Services
            ['category_name' => 'Air Conditioner Services', 'title' => 'AC Cleaning & Maintenance', 'description' => 'Full cleaning and routine checkup for air conditioners.', 'price' => 25000],
            ['category_name' => 'Air Conditioner Services', 'title' => 'AC Gas Refill', 'description' => 'Refilling refrigerant gas for efficient cooling.', 'price' => 35000],

            // Appliance Repair
            ['category_name' => 'Appliance Repair', 'title' => 'Refrigerator Repair', 'description' => 'Diagnosing and repairing refrigerator cooling issues.', 'price' => 20000],
            ['category_name' => 'Appliance Repair', 'title' => 'Washing Machine Repair', 'description' => 'Fixing washing machine drainage and motor issues.', 'price' => 22000],

            // Cleaning Services
            ['category_name' => 'Cleaning Services', 'title' => 'Deep Home Cleaning', 'description' => 'Thorough cleaning for your entire home including floors, kitchens, and bathrooms.', 'price' => 30000],
            ['category_name' => 'Cleaning Services', 'title' => 'Sofa & Carpet Cleaning', 'description' => 'Deep cleaning for sofas, carpets, and upholstery.', 'price' => 25000],

            // Pest Control
            ['category_name' => 'Pest Control', 'title' => 'Termite Treatment', 'description' => 'Effective termite control treatment for homes.', 'price' => 40000],
            ['category_name' => 'Pest Control', 'title' => 'Cockroach Control', 'description' => 'Cockroach extermination and prevention services.', 'price' => 35000],

            // Painting Services
            ['category_name' => 'Painting Services', 'title' => 'Interior Wall Painting', 'description' => 'Painting interior walls with premium paint.', 'price' => 35000],
            ['category_name' => 'Painting Services', 'title' => 'Exterior Wall Painting', 'description' => 'Painting exterior walls for protection and aesthetics.', 'price' => 40000],

            // Carpentry Services
            ['category_name' => 'Carpentry Services', 'title' => 'Door Repair Service', 'description' => 'Fixing broken or misaligned wooden doors.', 'price' => 18000],
            ['category_name' => 'Carpentry Services', 'title' => 'Furniture Assembly', 'description' => 'Assembling wooden furniture like tables and cabinets.', 'price' => 20000],

            // Gardening & Landscaping
            ['category_name' => 'Gardening & Landscaping', 'title' => 'Garden Maintenance', 'description' => 'Regular maintenance and trimming of your garden plants.', 'price' => 25000],
            ['category_name' => 'Gardening & Landscaping', 'title' => 'Landscape Design', 'description' => 'Designing and setting up landscape gardens.', 'price' => 50000],

            // Moving & Packing
            ['category_name' => 'Moving & Packing', 'title' => 'House Moving Service', 'description' => 'Full packing and moving service for your house relocation.', 'price' => 80000],
            ['category_name' => 'Moving & Packing', 'title' => 'Office Relocation', 'description' => 'Professional packing and moving for offices.', 'price' => 100000],

            // Generator
            ['category_name' => 'Generator Installation & Servicing', 'title' => 'Generator Maintenance', 'description' => 'Routine maintenance for home and office generators.', 'price' => 50000],
            ['category_name' => 'Generator Installation & Servicing', 'title' => 'Generator Installation', 'description' => 'Installing new generators with proper wiring.', 'price' => 80000],

            // Mosquito Net
            ['category_name' => 'Mosquito Net Installation', 'title' => 'Window Net Installation', 'description' => 'Installing mosquito nets for windows.', 'price' => 10000],
            ['category_name' => 'Mosquito Net Installation', 'title' => 'Bed Net Installation', 'description' => 'Fitting mosquito nets for beds.', 'price' => 12000],

            // Car Wash
            ['category_name' => 'Car/Motorbike Wash', 'title' => 'Car Wash', 'description' => 'Complete car exterior and interior wash.', 'price' => 15000],
            ['category_name' => 'Car/Motorbike Wash', 'title' => 'Motorbike Wash', 'description' => 'Motorbike cleaning and polishing.', 'price' => 8000],

            // Satellite
            ['category_name' => 'Satellite Dish Tuning', 'title' => 'Dish Tuning', 'description' => 'Adjusting satellite dish for clear reception.', 'price' => 12000],
            ['category_name' => 'Satellite Dish Tuning', 'title' => 'Dish Installation', 'description' => 'Installing new satellite dishes.', 'price' => 25000],

            // Handyman
            ['category_name' => 'Small Handyman Tasks', 'title' => 'Wall Mounting', 'description' => 'Mounting TVs and shelves.', 'price' => 10000],
            ['category_name' => 'Small Handyman Tasks', 'title' => 'Minor Repairs', 'description' => 'General household repairs.', 'price' => 12000],

            // Basic Appliance
            ['category_name' => 'Basic Appliance Repairs', 'title' => 'Fan Repair', 'description' => 'Repair electric fans.', 'price' => 8000],
            ['category_name' => 'Basic Appliance Repairs', 'title' => 'Iron Repair', 'description' => 'Fix heating issues in irons.', 'price' => 9000],
        ];

        foreach ($services_data as $service) {

            $category = Category::where('name', $service['category_name'])->first();

            if (!$category) {
                continue; // skip if category not found
            }

            Service::updateOrCreate(
                [
                    'title' => $service['title'],
                    'category_id' => $category->id
                ],
                [
                    'description' => $service['description'],
                    'price' => $service['price']
                ]
            );
        }

        echo "Services seeded successfully.\n";
    }
}