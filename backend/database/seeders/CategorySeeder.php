<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        echo "Seeding Categories...\n";

        $category_data = [
            [
                'name' => 'Plumbing Services',
                'description' => 'Professional plumbing services including leak repairs, pipe installations, and water pump maintenance for your home.',
                'image_path' => 'img/categories/plumbing.png'
            ],
            [
                'name' => 'Electrical Services',
                'description' => 'Certified electricians for wiring, socket repairs, lighting installations, and electrical troubleshooting.',
                'image_path' => 'img/categories/electrical.png'
            ],
            [
                'name' => 'Air Conditioner Services',
                'description' => 'AC cleaning, gas refilling, installation, and maintenance to keep your cooling systems efficient.',
                'image_path' => 'img/categories/airconditioner.png'
            ],
            [
                'name' => 'Appliance Repair',
                'description' => 'Quick and reliable repair for refrigerators, washing machines, rice cookers, and other home appliances.',
                'image_path' => 'img/categories/appliance.png'
            ],
            [
                'name' => 'Cleaning Services',
                'description' => 'Thorough home cleaning services including general cleaning, deep cleaning, and sofa or carpet cleaning.',
                'image_path' => 'img/categories/cleaning.png'
            ],
            [
                'name' => 'Pest Control',
                'description' => 'Effective termite, cockroach, mosquito, and rodent control treatments for homes and offices.',
                'image_path' => 'img/categories/pestcontrol.png'
            ],
            [
                'name' => 'Painting Services',
                'description' => 'High-quality interior and exterior painting services to refresh and protect your property.',
                'image_path' => 'img/categories/painting.png'
            ],
            [
                'name' => 'Carpentry Services',
                'description' => 'Woodwork services including door repairs, furniture fixes, and custom carpentry projects.',
                'image_path' => 'img/categories/carpentry.png'
            ],
            [
                'name' => 'Gardening & Landscaping',
                'description' => 'Professional gardening, landscaping, and plant maintenance services for homes and offices.',
                'image_path' => 'img/categories/gardening.png'
            ],
            [
                'name' => 'Moving & Packing',
                'description' => 'Reliable packing and moving services for apartments, houses, and offices.',
                'image_path' => 'img/categories/moving.png'
            ],
            [
                'name' => 'Generator Installation & Servicing',
                'description' => 'Installation, maintenance, and repair of home and office generators to ensure uninterrupted power.',
                'image_path' => 'img/categories/generator.png'
            ],
            [
                'name' => 'Mosquito Net Installation',
                'description' => 'Installation of mosquito nets for beds and windows to keep your home safe from insects.',
                'image_path' => 'img/categories/mosquito.png'
            ],
            [
                'name' => 'Car/Motorbike Wash',
                'description' => 'Convenient and thorough car and motorbike washing services at your doorstep.',
                'image_path' => 'img/categories/carwash.png'
            ],
            [
                'name' => 'Satellite Dish Tuning',
                'description' => 'Satellite dish installation, alignment, and tuning services for clear TV reception.',
                'image_path' => 'img/categories/satellite.png'
            ],
            [
                'name' => 'Small Handyman Tasks',
                'description' => 'General handyman services including mounting, fixing, and minor household repairs.',
                'image_path' => 'img/categories/handyman.png'
            ],
            [
                'name' => 'Basic Appliance Repairs',
                'description' => 'Quick repairs for small appliances like electric fans, rice cookers, and irons.',
                'image_path' => 'img/categories/basicappliance.png'
            ],
        ];

        foreach ($category_data as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }

        echo "Categories seeded successfully.\n";
    }
}