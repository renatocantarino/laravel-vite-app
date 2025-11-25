<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Product\IProductsService;
use App\Services\Product\ICategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{

    protected IProductsService $productService;
    protected ICategoryService $categoryService;

    public function __construct(IProductsService $productService, ICategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }


    public function singleCategory($id)
    {
        $products = $this->productService->getByCategory($id);
        return view('products.singlecategory',compact('products'));
    }

    public function singleProduct($id)
    {
        $product = $this->productService->getById($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);
        return view('products.singleProduct',compact('product', 'relatedProducts'));
    }
     
    public function shop()
    {
        $categories = $this->categoryService->getAll();
        $most = $this->productService->getAll(5);
        
        return view('products.shop',compact('categories','most'));        
    }
}