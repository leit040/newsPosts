<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(random_int(35,47)),
            'body' => $this->faker->text(random_int(400, 600)),
            'created_at' => $this->faker->dateTimeBetween('-7 years'),
        ];
    }
}
