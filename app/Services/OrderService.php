<?php

namespace App\Services;

use App\Models\Order;
use GuzzleHttp\Psr7\Request;

class OrderService
{
    // Get all menus with optional filtering and pagination
    public function getFilteredOrder(array $filters, $perPage = 10)
    {
        $query = Order::query();

        if (isset($filters['total_amount'])) {
            $query->where('total_amount', $filters['total_amount']);
        }

        if (isset($filters['payment_method'])) {
            $query->where('payment_method', $filters['payment_method']);
        }
        if (isset($filters['order_date'])) {
            $query->where('order_date', $filters['order_date']);
        }
        if (isset($filters['delivery_address'])) {
            $query->where('delivery_address', $filters['delivery_address']);
        }

       

        return $query->get();
    }

    public function getOrderById($id)
    {
        return Order::findOrFail($id);
    }

    public function createMenu(array $data)
    {
        return Order::create($data);
    }

    public function updateMenu(Order $menu, array $data)
    {
        $menu->update($data);
        return $menu;
    }
}