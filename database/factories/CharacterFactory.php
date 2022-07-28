<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "race" => "default",
            "price" => $this->faker->randomNumber(2),
            "image_path" => $this->faker->word. $this->faker->randomNumber(2)
        ];
    }
}
