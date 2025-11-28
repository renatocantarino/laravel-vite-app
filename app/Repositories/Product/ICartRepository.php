<?php

namespace App\Repositories\Product;

use App\Models\Product\Cart;

interface  ICartRepository
{
    public function add($cart): Cart;
}
