<?php

namespace App\Services;

use App\Models\Category;
use GuzzleHttp\Psr7\Request;

class CategoriesService
{
    public function getCategories()
    {
        $query = Category::query();
        return $query->get();

    }
    public function getCategoryById($id){
        return Category::findOrFail($id);

    }

    public function createRestaurant(array $data){
        return Category::create($data);

    }

    public function updatedRestaurant(Category $restaurant, array $data)
    {
        $restaurant->update($data);
        return $restaurant;
    }

    // Delete a menu
    public function deleteRestaurant(Category $restaurant)
    {
        $restaurant->delete();
    }


}
