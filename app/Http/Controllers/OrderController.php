<?php

namespace App\Http\Controllers;

use App\Collections\OrderCollection;
use App\Http\Requests\OrdersRequest;
use App\Http\Resources\OrdersResource;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $OrderService;

    public function __construct()
    {
        $this->OrderService = new OrderService();
    }

    // Get all menus with optional filtering and pagination
    public function index(Request $request)
    {
        $filters = $request->only(['total_amount', 'status', 'payment_method', 'order_date', 'delivery_address']);
        $menus = $this->OrderService->getFilteredOrder($filters);
        return new OrderCollection($menus);
    }
    public function show($id){
        $order = $this->OrderService->getOrderById($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        // return response()->json($order, 200);
        return new OrdersResource($order);
    }
}
