<?php

namespace App\Http\Controllers;

use App\Collections\DeliveryPersonnelCollection;
use App\Services\DeliveryPersonnelService;
use Illuminate\Http\Request;

class DeliveryPersonnelController extends Controller
{
    protected $DeliveryPersonnelService;
    public function __construct(){
        $this->DeliveryPersonnelService = new DeliveryPersonnelService();
    }

    public function index(Request $request){
        $filters = $request->only(['availability']);
        $person = $this->DeliveryPersonnelService->getFilteredPerson($filters);
        return new DeliveryPersonnelCollection($person);
    }

    
}
