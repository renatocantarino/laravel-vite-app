<?php

namespace App\Services\Product;

use App\Models\Product\Cart;

interface ICartService
{
    public function add(Cart  $cart): Cart;
}
