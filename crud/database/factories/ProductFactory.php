<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "company_id"=> $this->faker->numberBetween(1, 10),
            "name"=> $this->faker->name,
            "description"=> $this->faker->text,
            "price"=> $this->faker->randomFloat(2, 1, 100),
            "count"=> $this->faker->numberBetween(1, 100),
        ];
    }
}
