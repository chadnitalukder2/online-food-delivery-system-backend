<?php

namespace Database\Factories;

use App\Models\DeliveryPersonnel;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),  // Create or reference an Order
            'delivery_personnel_id' => DeliveryPersonnel::factory(),  // Create or reference Delivery Personnel
            'estimated_time' => $this->faker->time('H:i'),  // Generate a random time in HH:MM format
            'status' => $this->faker->randomElement(['pending', 'on the way', 'delivered', 'failed']),
        ];
    }
}
