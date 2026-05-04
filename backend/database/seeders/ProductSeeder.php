<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    public function run(): void
    {
        echo "Seeding Products...\n";

        $products_by_service = [
            // Plumbing Services
            'Leak Repair Service' => [
                ['product_name' => 'Leak Sealant Tape', 'price' => 3000, 'description' => 'Waterproof tape to seal minor pipe leaks.'],
                ['product_name' => 'Pipe Clamp', 'price' => 5000, 'description' => 'Clamp to fix leaking joints temporarily.'],
                ['product_name' => 'Adjustable Wrench', 'price' => 8000, 'description' => 'Essential tool for pipe tightening.'],
            ],
            'Pipe Installation' => [
                ['product_name' => 'PVC Pipe 1 inch', 'price' => 4000, 'description' => 'Durable PVC pipe for installations.'],
                ['product_name' => 'Pipe Cutter Tool', 'price' => 9500, 'description' => 'For cleanly cutting PVC and metal pipes.'],
                ['product_name' => 'Pipe Glue', 'price' => 3500, 'description' => 'Adhesive for strong pipe connections.'],
            ],

            // Electrical Services
            'Socket & Switch Installation' => [
                ['product_name' => 'Switch Cover Plate', 'price' => 2000, 'description' => 'White plastic cover for dual switches.'],
                ['product_name' => 'Standard Socket', 'price' => 3500, 'description' => 'Wall socket with 3-pin support.'],
                ['product_name' => 'Wire Clips', 'price' => 1200, 'description' => 'Clips for wire management.'],
            ],
            'Lighting Installation' => [
                ['product_name' => 'LED Bulb 10W', 'price' => 3000, 'description' => 'Energy-efficient bulb for indoor use.'],
                ['product_name' => 'Lamp Holder', 'price' => 1500, 'description' => 'Socket holder for wall lamps.'],
                ['product_name' => 'Switch Box', 'price' => 2000, 'description' => 'Plastic switch box for installation.'],
            ],

            // Air Conditioner Services
            'AC Cleaning & Maintenance' => [
                ['product_name' => 'AC Cleaning Spray', 'price' => 4000, 'description' => 'Foam spray for AC coil cleaning.'],
                ['product_name' => 'Dust Filter', 'price' => 6000, 'description' => 'AC filter replacement mesh.'],
                ['product_name' => 'Fin Comb', 'price' => 2500, 'description' => 'Tool to straighten AC fins.'],
            ],
            'AC Gas Refill' => [
                ['product_name' => 'R410A Refrigerant Canister', 'price' => 15000, 'description' => 'Gas for newer AC systems.'],
                ['product_name' => 'R22 Refrigerant Canister', 'price' => 12000, 'description' => 'Legacy AC gas type.'],
                ['product_name' => 'AC Pressure Gauge', 'price' => 8500, 'description' => 'Gauge to measure refrigerant pressure.'],
            ],

            // Appliance Repair
            'Refrigerator Repair' => [
                ['product_name' => 'Thermostat Sensor', 'price' => 6000, 'description' => 'Sensor for fridge temperature control.'],
                ['product_name' => 'Door Seal Gasket', 'price' => 8000, 'description' => 'Replacement rubber for door seal.'],
                ['product_name' => 'Coolant Pipe', 'price' => 7000, 'description' => 'Copper pipe for coolant flow.'],
            ],
            'Washing Machine Repair' => [
                ['product_name' => 'Drain Pump', 'price' => 10000, 'description' => 'Pump for removing used water.'],
                ['product_name' => 'Water Inlet Valve', 'price' => 5500, 'description' => 'Controls water intake during wash.'],
                ['product_name' => 'Drum Belt', 'price' => 3000, 'description' => 'Drum motor belt for spinning.'],
            ],

            // Cleaning Services
            'Deep Home Cleaning' => [
                ['product_name' => 'Multipurpose Cleaner', 'price' => 5000, 'description' => 'All-surface liquid cleaner.'],
                ['product_name' => 'Mop Head Refill', 'price' => 2000, 'description' => 'Reusable mop head.'],
                ['product_name' => 'Scrub Brush', 'price' => 1500, 'description' => 'Brush for tough grime removal.'],
            ],
            'Sofa & Carpet Cleaning' => [
                ['product_name' => 'Upholstery Shampoo', 'price' => 4500, 'description' => 'Liquid shampoo for fabric surfaces.'],
                ['product_name' => 'Lint Remover Roller', 'price' => 1200, 'description' => 'Removes hair and dust.'],
                ['product_name' => 'Fabric Protector Spray', 'price' => 3000, 'description' => 'Repels dirt after cleaning.'],
            ],

            // Pest Control
            'Termite Treatment' => [
                ['product_name' => 'Termite Bait Stations', 'price' => 10000, 'description' => 'Bait traps for termite colonies.'],
                ['product_name' => 'Wood Sealant Spray', 'price' => 3500, 'description' => 'Protects wood from infestations.'],
                ['product_name' => 'Chemical Injector', 'price' => 8000, 'description' => 'Injects termiticide into walls.'],
            ],
            'Cockroach Control' => [
                ['product_name' => 'Cockroach Gel', 'price' => 2500, 'description' => 'Attracts and kills roaches.'],
                ['product_name' => 'Roach Spray', 'price' => 3000, 'description' => 'Fast-action insecticide.'],
                ['product_name' => 'Sticky Traps', 'price' => 1500, 'description' => 'Non-toxic trapping sheets.'],
            ],

            // Painting Services
            'Interior Wall Painting' => [
                ['product_name' => 'Emulsion Paint (1L)', 'price' => 10000, 'description' => 'Premium paint for interior use.'],
                ['product_name' => 'Paint Roller Set', 'price' => 4000, 'description' => 'Roller, tray, and brushes combo.'],
                ['product_name' => 'Wall Putty', 'price' => 3000, 'description' => 'For smoothing wall surface.'],
            ],
            'Exterior Wall Painting' => [
                ['product_name' => 'Weatherproof Paint (1L)', 'price' => 12000, 'description' => 'Paint for external walls.'],
                ['product_name' => 'Ladder Rental (1 Day)', 'price' => 5000, 'description' => 'Rental of ladder for painting work.'],
                ['product_name' => 'Safety Harness', 'price' => 7000, 'description' => 'Used for painting at height.'],
            ],

            // Carpentry Services
            'Door Repair Service' => [
                ['product_name' => 'Wood Glue', 'price' => 2500, 'description' => 'Glue for minor door cracks.'],
                ['product_name' => 'Hinge Set', 'price' => 4000, 'description' => 'Steel door hinge set.'],
                ['product_name' => 'Wood Filler', 'price' => 3000, 'description' => 'Fills dents in wood.'],
            ],
            'Furniture Assembly' => [
                ['product_name' => 'Screwdriver Kit', 'price' => 5000, 'description' => 'Basic tools for assembly.'],
                ['product_name' => 'Wood Screws Set', 'price' => 1500, 'description' => 'Box of assorted screws.'],
                ['product_name' => 'Allen Key Set', 'price' => 2000, 'description' => 'Hex keys for modern furniture.'],
            ],

            // Gardening & Landscaping
            'Garden Maintenance' => [
                ['product_name' => 'Grass Trimmer Line', 'price' => 2000, 'description' => 'Spare line for trimming.'],
                ['product_name' => 'Fertilizer Pack', 'price' => 4000, 'description' => 'All-purpose garden fertilizer.'],
                ['product_name' => 'Gardening Gloves', 'price' => 1500, 'description' => 'Protective gloves for work.'],
            ],
            'Landscape Design' => [
                ['product_name' => 'Pebbles (5kg)', 'price' => 5000, 'description' => 'Decorative pebbles for paths.'],
                ['product_name' => 'Plant Pots Set', 'price' => 6000, 'description' => 'Decorative plastic pots.'],
                ['product_name' => 'Mini Shovel Set', 'price' => 3000, 'description' => 'Tool set for planting.'],
            ],

            // Moving & Packing
            'House Moving Service' => [
                ['product_name' => 'Packing Tape (3 rolls)', 'price' => 2000, 'description' => 'Strong tape for sealing boxes.'],
                ['product_name' => 'Bubble Wrap Roll', 'price' => 3500, 'description' => 'Wraps fragile items securely.'],
                ['product_name' => 'Cardboard Boxes Set', 'price' => 6000, 'description' => '5 large boxes for packing.'],
            ],
            'Office Relocation' => [
                ['product_name' => 'Label Stickers Pack', 'price' => 1000, 'description' => 'Labels for box identification.'],
                ['product_name' => 'Trolley Rental', 'price' => 8000, 'description' => 'Wheeled trolley for heavy items.'],
                ['product_name' => 'Desktop Covers', 'price' => 3000, 'description' => 'Plastic sheets for dust protection.'],
            ],

            // Generator Installation & Servicing
            'Generator Maintenance' => [
                ['product_name' => 'Engine Oil (1L)', 'price' => 6000, 'description' => 'Oil for generator engine.'],
                ['product_name' => 'Spark Plug', 'price' => 2500, 'description' => 'Ignition part replacement.'],
                ['product_name' => 'Oil Filter', 'price' => 4000, 'description' => 'Maintains oil cleanliness.'],
            ],
            'Generator Installation' => [
                ['product_name' => 'Power Cable (10m)', 'price' => 8000, 'description' => 'Heavy duty wiring.'],
                ['product_name' => 'Earthing Rod', 'price' => 5000, 'description' => 'Safety grounding rod.'],
                ['product_name' => 'Fuel Tank Pipe', 'price' => 3500, 'description' => 'Pipe from tank to engine.'],
            ],

            // Mosquito Net Installation
            'Window Mosquito Net Installation' => [
                ['product_name' => 'Aluminum Frame Kit', 'price' => 7000, 'description' => 'Pre-cut frame for nets.'],
                ['product_name' => 'Net Mesh Roll', 'price' => 4000, 'description' => 'Fiber net for windows.'],
                ['product_name' => 'Hook & Loop Tape', 'price' => 1500, 'description' => 'Easy-to-remove mounting tape.'],
            ],
            'Bed Mosquito Net Installation' => [
                ['product_name' => 'Canopy Net', 'price' => 6000, 'description' => 'Round net for beds.'],
                ['product_name' => 'Bed Pole Kit', 'price' => 5000, 'description' => 'Support frame for nets.'],
                ['product_name' => 'Wall Hook Set', 'price' => 1000, 'description' => 'For mounting net poles.'],
            ],

            // Car/Motorbike Wash
            'Car Exterior & Interior Wash' => [
                ['product_name' => 'Car Shampoo', 'price' => 3500, 'description' => 'Foam wash for vehicle body.'],
                ['product_name' => 'Microfiber Cloth Pack', 'price' => 2500, 'description' => 'Soft cloths for wiping.'],
                ['product_name' => 'Dashboard Polish', 'price' => 4000, 'description' => 'Gloss polish for interiors.'],
            ],
            'Motorbike Wash' => [
                ['product_name' => 'Bike Cleaning Spray', 'price' => 2000, 'description' => 'Quick clean for metal parts.'],
                ['product_name' => 'Chain Lubricant', 'price' => 2500, 'description' => 'Lube for smoother ride.'],
                ['product_name' => 'Bike Sponge', 'price' => 1000, 'description' => 'Sponge for cleaning curves.'],
            ],

            // Satellite Dish Tuning
            'Dish Realignment & Tuning' => [
                ['product_name' => 'Coaxial Cable (10m)', 'price' => 3500, 'description' => 'Signal cable for dish setup.'],
                ['product_name' => 'Signal Finder Meter', 'price' => 8000, 'description' => 'Helps align the satellite dish.'],
                ['product_name' => 'Dish Mount Bracket', 'price' => 5000, 'description' => 'Mount for holding satellite dish.'],
            ],
            'New Dish Installation' => [
                ['product_name' => 'Satellite Dish Kit', 'price' => 25000, 'description' => 'Complete dish setup.'],
                ['product_name' => 'LNB Head', 'price' => 6000, 'description' => 'Signal receiving head.'],
                ['product_name' => 'Wall Clamp Bolts', 'price' => 1500, 'description' => 'Strong bolts for dish mounts.'],
            ],

            // Small Handyman Tasks
            'Wall Mount Installation' => [
                ['product_name' => 'TV Wall Mount', 'price' => 10000, 'description' => 'Supports up to 50 inch TVs.'],
                ['product_name' => 'Drill Bit Set', 'price' => 3000, 'description' => 'For mounting on walls.'],
                ['product_name' => 'Wall Anchor Screws', 'price' => 1500, 'description' => 'Secure mounts in concrete.'],
            ],
            'Minor Repairs' => [
                ['product_name' => 'Instant Adhesive', 'price' => 1200, 'description' => 'Quick glue for fixes.'],
                ['product_name' => 'Wall Crack Filler', 'price' => 2500, 'description' => 'Paste for wall patching.'],
                ['product_name' => 'Mini Tool Kit', 'price' => 6000, 'description' => 'Screwdriver and pliers set.'],
            ],

            // Basic Appliance Repairs
            'Electric Fan Repair' => [
                ['product_name' => 'Fan Motor', 'price' => 9000, 'description' => 'Replacement motor for fans.'],
                ['product_name' => 'Blade Replacement', 'price' => 3500, 'description' => 'Plastic blades for table fans.'],
                ['product_name' => 'Fan Switch Panel', 'price' => 2000, 'description' => 'Speed control switch board.'],
            ],
            'Iron Repair' => [
                ['product_name' => 'Thermostat', 'price' => 4000, 'description' => 'Heat control unit for irons.'],
                ['product_name' => 'Power Cord', 'price' => 1500, 'description' => 'High heat-resistant cord.'],
                ['product_name' => 'Iron Soleplate', 'price' => 6000, 'description' => 'Non-stick replacement plate.'],
            ],
        ];

        foreach ($products_by_service as $service_title => $products) {

            $service = DB::table('services')
                ->where('title', $service_title)
                ->first();

            if (!$service) {
                continue;
            }

            foreach ($products as $product) {
                Product::firstOrCreate(
                    [
                        'product_name' => $product['product_name'],
                        'service_id' => $service->id,
                    ],
                    [
                        'price' => $product['price'],
                        'description' => $product['description'],
                        'image' => null,
                    ]
                );
            }
        }

        echo "Products seeded successfully.\n";
    }
}