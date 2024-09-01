<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerAddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'street' => $this->faker->word(),
            'number' => $this->faker->numberBetween(1, 1000),
            'neighborhood' => $this->faker->word(),
            'complement' => $this->faker->word(),
            'cep' => $this->faker->word(),
            'city' => $this->faker->word(),
            'state' => $this->faker->word(),
            'country' => 'BR',
        ];
    }
}
