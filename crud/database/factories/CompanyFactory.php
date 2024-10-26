<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=> $this->faker->name,
            "user_id"=> $this->faker->numberBetween(1, 10),
            "description"=> $this->faker->text,
            "website"=> $this->faker->url,
            "logo"=> $this->faker->imageUrl(640, 480, 'cats', true),
        ];
    }
}
