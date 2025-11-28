<?php

namespace App\Repositories\Product;

class CartRepository implements ICartRepository
{
    public function Add($cart): Cart
    {
        return Cart::create($cart);
    }
}
