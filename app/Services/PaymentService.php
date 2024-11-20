<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Payment;
use GuzzleHttp\Psr7\Request;

class PaymentService
{
    // Get all menus with optional filtering and pagination
    public function getFilteredPayment(array $filters, $perPage = 10)
    {
        $query = Payment::query();

        if (isset($filters['amount'])) {
            $query->where('amount', $filters['amount']);
        }
        if (isset($filters['payment_method'])) {
            $query->where('payment_method', $filters['payment_method']);
        }
        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
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
