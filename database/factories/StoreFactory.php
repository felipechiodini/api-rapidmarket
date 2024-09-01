<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => collect(['Mercado 1', 'Mercado 2', 'Mercado 3', 'Mercado 4', 'Mercado 5'])->random(),
        ];
    }
}
