<?php

namespace App\Services\Product;

use App\Models\Product\Cart;
use App\Repositories\Product\ICartRepository;

class CartService implements ICartService
{
    protected ICartRepository $cartRepository;

    public function __construct(ICartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function add(Cart $cart): Cart
    {      
        dd($cart);  
        return $this->cartRepository->add($cart);
    }
}
