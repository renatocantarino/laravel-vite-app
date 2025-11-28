<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use App\Models\Product\Cart;

interface ICartService
{
    public function add(Request  $request): Cart;
}
