<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Dtos\OrderDto;

interface IOrderService
{
    public function create(array $data): OrderDto;

    public function getAll(): Collection;    
}
