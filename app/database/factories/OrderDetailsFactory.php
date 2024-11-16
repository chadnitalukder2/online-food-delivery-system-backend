<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetails>
 */
class OrderDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),        
            'menu_id' => Menu::factory(),            
            'quantity' => $this->faker->numberBetween(1, 10), 
            'price' => $this->faker->numberBetween(100, 1000),
            'created_at' => now(), 
            'updated_at' => now(),
        ];
    }
}
