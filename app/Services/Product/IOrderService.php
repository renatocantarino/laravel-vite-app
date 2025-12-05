<?php

namespace App\Services\Product;

use App\Models\Product\Order;
use Illuminate\Http\Request;



interface IOrderService
{
    public function create(Request $request): Order;
}
