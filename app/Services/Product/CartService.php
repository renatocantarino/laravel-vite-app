<?php

namespace App\Services\Product;

use App\Models\Product\Cart;
use App\Repositories\Product\ICartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class CartService implements ICartService
{
    protected ICartRepository $cartRepository;

    public function __construct(ICartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function add(Request $request): Cart
    {      
        
        $cart = new Cart([
            "name" => $request->name,
            "price" => $request->price,
            "qty" => $request->qty,
            "image" => $request->image,
            "prod_id" => $request->prod_id,
            "user_id" => $request->user_id,
            "subtotal" => $request->qty * $request->price,
        ]);
        
        return $this->cartRepository->add($cart);
    }
}
