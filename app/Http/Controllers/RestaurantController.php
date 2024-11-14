<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\restaurantService;
use App\Collections\RestaurantCollection;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\RestaurantResource;

class RestaurantController extends Controller
{

    protected $restaurantService;

    public function __construct()
    {
        $this->restaurantService = new restaurantService();
    }


    public function index(Request $request){
       $filters =$request->only('name', 'address');
       $restaurants = $this->restaurantService->getFilteredRestaurant($filters);
       return new RestaurantCollection($restaurants);
    }

    public function show($id){
        $restaurants = $this->restaurantService->getRestaurantById($id);
         return new RestaurantResource($restaurants);
    }

    public function store(RestaurantRequest $request)
    {
        $restaurant = $this->restaurantService->createRestaurant($request->validated());
        return new RestaurantResource($restaurant);
    }

    // Update an existing menu
    public function update(RestaurantRequest $request, $id)
    {
        $restaurant = $this->restaurantService->getRestaurantById($id);
        $updatedRestaurant = $this->restaurantService->updatedRestaurant($restaurant, $request->validated());
        return new RestaurantResource($updatedRestaurant);
    }

}
