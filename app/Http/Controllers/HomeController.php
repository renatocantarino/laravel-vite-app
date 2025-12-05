<?php

namespace App\Http\Controllers;

use App\Services\Product\ICategoryService;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected ICategoryService $categoryService;


    public function __construct(ICategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->categoryService = $categoryService;
    }
   
    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('home', compact('categories'));
    }
}
