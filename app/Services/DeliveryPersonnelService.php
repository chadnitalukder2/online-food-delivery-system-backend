<?php

namespace App\Services;

use App\Models\Category;
use App\Models\DeliveryPersonnel;
use App\Models\Menu;
use GuzzleHttp\Psr7\Request;

class DeliveryPersonnelService
{
    // Get all menus with optional filtering and pagination
    public function getFilteredPerson(array $filters, $perPage = 10)
    {
        $query = DeliveryPersonnel::query();

        if (isset($filters['availability'])) {
            $query->where('availability', $filters['availability']);
        }

        return $query->get();
    }

    public function getMenuById($id)
    {
        return Menu::findOrFail($id);
    }

    public function createMenu(array $data)
    {
        return Menu::create($data);
    }

    public function updateMenu(Menu $menu, array $data)
    {
        $menu->update($data);
        return $menu;
    }

    public function deleteMenu(Menu $menu)
    {
        $menu->delete();
    }
}
