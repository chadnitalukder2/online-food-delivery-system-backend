<?php

namespace Database\Seeders;

use App\Models\Delivery;
use App\Models\DeliveryPerson;
use App\Models\DeliveryPersonnel;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Restaurant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Restaurant::factory(10)->create();
        Menu::factory(50)->create();
        Order::factory(30)->create();
        OrderDetails::factory(40)->create();
        Payment::factory(30)->create();
        DeliveryPersonnel::factory(20)->create();
       Delivery::factory(50)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RestaurantSeeder::class,
            MenuSeeder::class,
        ]);
    
        
    }
}
