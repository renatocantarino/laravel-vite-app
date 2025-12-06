<?php

namespace App\Services\Product;

use App\Models\Product\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


interface IOrderService
{
    public function create(Request $request): Order;

    public function getAll(): Collection;    
}
