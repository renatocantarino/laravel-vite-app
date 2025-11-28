<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Product\ICartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{

    protected ICartService $cartService;

    public function __construct(ICartService $cartService)
    {
        $this->cartService = $cartService;
    }


    public function addToCart(Request $request)
    {
        
        $request->merge([
            'user_id' => Auth::user()->id
        ]);
       
        $addedCart = $this->cartService->add($request);
        return Redirect::route('single.product',$request->pro_id)->with(['success' => 'Product added to cart  successfully']);
    }
    
}
