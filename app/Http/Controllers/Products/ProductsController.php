<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Product\IProductsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{

    protected IProductsService $productService;

    public function __construct(IProductsService $productService)
    {
        $this->middleware('auth');
        $this->productService = $productService;
    }


    public function singleCategory($id)
    {
        $products = $this->productService->getByCategory($id);
        return view('products.singlecategory',compact('products'));
    }

    public function singleProduct($id)
    {
        $product = $this->productService->getById($id);
        return view('products.singleProduct',compact('product'));
    }

}
