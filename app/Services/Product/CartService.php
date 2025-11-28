<?php

namespace App\Services\Product;

use App\Models\Product\Cart;
use App\Repositories\Product\ICartRepository;
use Illuminate\Support\Str;

class CartService implements ICartService
{
    protected ICartRepository $cartRepository;

    public function __construct(ICartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function add(Cart $cart): Cart
    {
        $cart->cart_id= Str::uuid()->toString();
        return $this->cartRepository->add($cart);
    }
}
