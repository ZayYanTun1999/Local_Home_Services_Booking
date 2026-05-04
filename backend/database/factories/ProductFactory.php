<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->words(3, true),
            'price' => $this->faker->numberBetween(1000, 20000),
            'description' => $this->faker->sentence(),
            'image' => null,
            'service_id' => null,
        ];
    }

    /**
     * Create product for a specific service
     */
    public function forService($serviceId, $product)
    {
        return [
            'product_name' => $product['product_name'],
            'price' => $product['price'],
            'description' => $product['description'] ?? '',
            'image' => null,
            'service_id' => $serviceId,
        ];
    }
}