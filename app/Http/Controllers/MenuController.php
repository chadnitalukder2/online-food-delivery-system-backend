<?php

namespace App\Http\Controllers;

use App\Collections\MenusCollection;
use App\Http\Resources\MenusResource;
use App\Services\MenusService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct()
    {
        $this->menuService = new MenusService();
    }

    // Get all menus with optional filtering and pagination
    public function index(Request $request)
    {
        $filters = $request->only(['availability', 'restaurant_id', 'price_min', 'price_max']);
        $menus = $this->menuService->getFilteredMenus($filters);
        return new MenusCollection($menus);
    }

    public function show($id)
    {
        $menu = $this->menuService->getMenuById($id);
        return new MenusResource($menu);
    }

}
