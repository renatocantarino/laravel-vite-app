<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use App\Models\Product\Cart;
use App\Models\Product\CartItem;
use App\Dtos\CartItemDto;
use App\Dtos\CartDto;

use Illuminate\Support\Collection; 

interface ICartService
{
    public function create(Request  $request): CartDto;

    public function addItem($cartId,Request  $request): CartItemDto;

    public function getByUserIdWithItems(int $userId): CartDto;

    public function countByUserId(int $userId): int;

    public function remove(int $userId, int $idProduct): bool;

    //public function checkout(CartDto $cart): CartDto;
}
