<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),  // Creates or references an Order
            'amount' => $this->faker->numberBetween(100, 10000), // Random amount between 100 and 10,000
            'payment_method' => $this->faker->randomElement(['credit card', 'cash', 'paypal', 'bank transfer']), // Random payment method
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
        ];
    }
}
