<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->country(),
            'bandera' => $this->faker->country(),
            'acronimo' => $this->faker->countryCode(),
            'codigo' => '+54'
        ];
    }
}
