<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => collect(['Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5'])->random(),
        ];
    }
}
