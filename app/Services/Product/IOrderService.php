<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Dtos\OrderDto;

interface IOrderService
{
    public function create(Request $request): OrderDto;

    public function getAll(): Collection;    
}
