<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id' => Restaurant::factory(),  // Create a related restaurant or use existing one
            'name' => $this->faker->word(),            // Generate a random word for the menu item name
            'description' => $this->faker->sentence(10), // Generate a 10-word random description
            'price' => $this->faker->randomFloat(2, 10, 100), // Random price between 10 and 100
            'image' => $this->faker->imageUrl(640, 480, 'food'), // Generate a random image URL
            'availability' => $this->faker->randomElement(['in stock', 'out of stock']),
        ];
    }
}
