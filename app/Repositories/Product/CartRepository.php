<?php

namespace App\Repositories\Product;

use App\Models\Product\Cart;

class CartRepository implements ICartRepository
{
    public function add($cart): Cart
    {
        return Cart::create($cart);
    }
}
