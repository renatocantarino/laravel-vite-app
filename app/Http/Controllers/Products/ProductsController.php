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


    private const CATEGORY_ID_MEATS = 1;
    private const CATEGORY_ID_FISH = 2;
    private const CATEGORY_ID_FROZEN = 4;
    private const CATEGORY_ID_VEGS = 3;

    // Constante para limite padrão de produtos por categoria
    private const DEFAULT_LIMIT_PER_CATEGORY = 5;

    public function __construct(IProductsService $productService,
                                ICategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->productService  = $productService;
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

        //dump($most);

        $meatsprods = $this->productService->getByCategory(self::CATEGORY_ID_MEATS,self::DEFAULT_LIMIT_PER_CATEGORY);
        $fishprods = $this->productService->getByCategory(self::CATEGORY_ID_FISH,self::DEFAULT_LIMIT_PER_CATEGORY);
        $frozenprods = $this->productService->getByCategory(self::CATEGORY_ID_FROZEN,self::DEFAULT_LIMIT_PER_CATEGORY);
        $vegsprods = $this->productService->getByCategory(self::CATEGORY_ID_VEGS,self::DEFAULT_LIMIT_PER_CATEGORY);
        $packsprods = $this->productService->getByCategory(self::CATEGORY_ID_VEGS,self::DEFAULT_LIMIT_PER_CATEGORY);

        return view('products.shop',
                    compact('categories','most','meatsprods','fishprods','frozenprods','vegsprods', 'packsprods'));
    }


}
