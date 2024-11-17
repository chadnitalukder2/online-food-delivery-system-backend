<?php

namespace App\Http\Controllers;

use App\Collections\CategoriesCollection;
use App\Services\CategoriesService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $CategoriesService;

    public function __construct()
    {
        $this->CategoriesService = new CategoriesService();
    }

    public function index(Request $request)
    {
        $categories = $this->CategoriesService->getCategories();
        return new CategoriesCollection($categories);
    }

}
