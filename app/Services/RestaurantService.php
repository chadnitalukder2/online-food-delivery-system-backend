<?php

namespace App\Services;

use App\Models\Restaurant;
class RestaurantService
{
    public function getFilteredRestaurant(array $filters, $perPage = 10)
    {
        $query = Restaurant::query();

        if (isset($filters['name'])) {
            $query->where('name', $filters['name']);
        }

        if (isset($filters['address'])) {
            $query->where('address', $filters['address']);
        }

        return $query->get();

    }
}
