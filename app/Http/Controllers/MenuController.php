<?php 
namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Resources\MenuResource;
use App\Http\Resources\MenuCollection;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct()
    {
        $this->menuService = new MenuService();
    }

    // Get all menus with optional filtering and pagination
    public function index(Request $request)
    {
        $filters = $request->only(['availability', 'restaurant_id', 'price_min', 'price_max']);
        $menus = $this->menuService->getFilteredMenus($filters);
        return new MenuCollection($menus);
    }

    // Get a specific menu by ID
    public function show($id)
    {
        $menu = $this->menuService->getMenuById($id);
        return new MenuResource($menu);
    }

    // Create a new menu
    public function store(MenuRequest $request)
    {
        $menu = $this->menuService->createMenu($request->validated());
        return new MenuResource($menu);
    }

    // Update an existing menu
    public function update(MenuRequest $request, $id)
    {
        $menu = $this->menuService->getMenuById($id);
        $updatedMenu = $this->menuService->updateMenu($menu, $request->validated());
        return new MenuResource($updatedMenu);
    }

    // Delete a menu
    public function destroy($id)
    {
        $menu = $this->menuService->getMenuById($id);
        $this->menuService->deleteMenu($menu);
        return response()->json(null, 204);
    }
}
