<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => collect(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5'])->random(),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(5, 250),
            'price_from' => $this->faker->boolean() ? $this->faker->numberBetween(5, 250) : null
        ];
    }
}
