<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RestaurantService;
use App\Collections\RestaurantCollection;

class RestaurantController extends Controller
{

    protected $RestaurantService;

    public function __construct()
    {
        $this->RestaurantService = new RestaurantService();
    }


    public function index(Request $request){
       $filters =$request->only('name', 'address');
       $restaurants = $this->RestaurantService->getFilteredRestaurant($filters);
       return new RestaurantCollection($restaurants);


    }
}
