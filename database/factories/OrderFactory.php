<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),              // Creates a related user or use an existing one
            'restaurant_id' => Restaurant::factory(),  // Creates a related restaurant
            'total_amount' => $this->faker->numberBetween(100, 5000), // Random total amount between 100 and 5000
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']), // Random status
            'payment_method' => $this->faker->randomElement(['credit card', 'cash', 'paypal']), // Random payment method
            'order_date' => $this->faker->dateTimeThisYear()->format('Y-m-d H:i:s'), // Random date in current year
            'delivery_address' => $this->faker->address(),
        ];
    }
}
