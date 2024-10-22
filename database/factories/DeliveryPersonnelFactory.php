<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryPersonnel>
 */
class DeliveryPersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),   // Generate a random name
            'phone' => $this->faker->phoneNumber(), // Generate a random phone number
            'email' => $this->faker->unique()->safeEmail(), // Generate a unique random email
            'vehicle_type' => $this->faker->randomElement(['car', 'bike', 'van', 'truck']), // Random vehicle type
            'availability' => $this->faker->randomElement(['available', 'unavailable']),
        ];
    }
}
