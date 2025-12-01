<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Product\ICategoryService;
use App\Services\Product\ICartService;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = $this->categoryService->getAll();        
        return view('home', compact('categories'));
    }
}
